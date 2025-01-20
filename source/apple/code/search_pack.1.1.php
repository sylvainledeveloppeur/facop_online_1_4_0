<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");
/* $_POST["lang"]="fr";
$_POST["catego"]="Unimogs"; */

$lang= htmlspecialchars($_POST["lang"]);
$_POST['query']= htmlspecialchars($_POST["packid"]);

 
//$_POST['query']="QC190357";
$query=$_POST['query'];

if(!empty($_POST['query']))
{
	
	  //on récupère le ou les mots-clés saisis (chaîne de caractères)
	  $mot = htmlspecialchars($_POST["query"]);
	  
	  //on supprime les éventuels espaces de début et fin de chaîne
	  $chercher = trim($mot);
	  $chercher = str_replace("\t", " ", $chercher);
	  $chercher = preg_replace("#[ ]+#", " ", $chercher);
	  
	 
	  //on transforme cette chaîne en array
	  $elts = explode(" ", $chercher);
	  
	  //on définit une recherche par rapport au premier mot-clé choisi
	  $premier = "%".$elts[0]."%";
	  //le symbole % placé avant et après le mot-clé permet de rechercher n'importe quelle chaîne de caractères contenant ce mot
	  
	  //on met en forme la clause pour l'interrogation de la base de données
	  $recherche = " titre LIKE '".$premier."' OR titreEN LIKE '".$premier."' OR des LIKE '".$premier."'  OR desEN LIKE '".$premier."'";
	  
	  //on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
	  for ( $i = 1 ; $i < count($elts) ; $i++ )
	  {
	  $elt_suivant = "%".$elts[$i]."%";
	  
	  //on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
	  $recherche.= " OR titre LIKE '".$elt_suivant."' OR titreEN LIKE '".$elt_suivant."' OR des LIKE '".$elt_suivant."'  OR desEN LIKE '".$elt_suivant."'";
	  }
	  
	  // requete SQL,
	  $requete = $tams->query("SELECT COUNT(*) nbr FROM pack WHERE $recherche AND actif=1   ");
	  $bloc= $tams->query("SELECT * FROM pack WHERE $recherche  AND actif=1  ORDER BY id_pk DESC LIMIT 200 ");
	  //nombre de fichiers trouvés
	  $reponses = $requete->fetch();
	  $tota_resul=$reponses['nbr'];
	  if($tota_resul== 0) 
	  { 

        echo "nothing";

	  }
	  else 
	  {
		    $outils = array(); 
			while ($outil = $bloc->fetch()) 
			{
					$nbr_pseudo=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE id_pack=".$outil["id_pk"]." AND actif=1 " ) ;
					$nbr_pseudo->execute();
					$chif_pse=$nbr_pseudo->fetch(); 
					$lesson=$chif_pse['nbr'];

						array_push($outils, array(
							"lang_data"=> $lang,
							"id_data"=> $outil["id_pk"],
							"titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
							"desc_data"=>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
							"img1_data"=> $outil["img"],
							"img2_data"=> "0",
							"video1_data"=> $lang=="fr" ? $outil["youtube_FR"] : $outil["youtube_EN"],
							"duree_data"=> $outil["dure"]." . ".$outil["etudiant"]." Etudiants",  
							"pdf1_data"=> "0", 
							"prix_data"=> $outil["prix"],
							"nbpage_data"=> $lesson, 
							"certi_data"=> $outil["certificat"], 
							"packname_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
							"packcodename_data"=> $outil["codeName"], 
							"packcodenumber_data"=> $outil["codeNbr"], 
							"total_data"=> $tota_resul,
							"date_data"=> $outil["datephp"]
						));

			}

		echo(json_encode($outils));   
	  }

}
?>