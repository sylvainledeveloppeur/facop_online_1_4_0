	<div class="pg_cart">
		
		<!--bac top-->
  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Recherche</h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
<!--us-->
<div class="pg_cart">
  <div class="fenetre">
    <div class="bg_blanc min_hei_200 bord_1 pos_rel">
      

<ul class="ulpro after pad_top_40 Q_cols_2_2col" >

<?php 



$_POST["artistejs"]=$_POST["s"];

if(!empty($_POST["artistejs"]) AND !empty($_POST["typ_search"]) )
{
	


if($_POST["typ_search"]=='livre')
{
/****resultats personne********************************************************************************/
	 if(isset($_POST["artistejs"])  )
	  {
		 
		  $msc=$tams;
		  function sear_pict($msc,$alpagl)
	{
	 
	if(isset($_POST["artistejs"])  AND  $_POST["artistejs"]!='' )
	{
	
	
	//on récupère le ou les mots-clés saisis (chaîne de caractères)
	$mot = htmlspecialchars($_POST["artistejs"]);
	
	//on supprime les éventuels espaces de début et fin de chaîne
	$chercher = trim($mot);
	$chercher = str_replace("\t", " ", $chercher);
	$chercher = preg_replace("#[ ]+#", " ", $chercher);
	
	if (preg_replace("#[a-z0-9]#i", " ", $chercher))
	{
	//on transforme cette chaîne en array
	$elts = explode(" ", $chercher);
	
	//on définit une recherche par rapport au premier mot-clé choisi
	$premier = "%".$elts[0]."%";
	//le symbole % placé avant et après le mot-clé permet de rechercher n'importe quelle chaîne de caractères contenant ce mot
	
	//on met en forme la clause pour l'interrogation de la base de données
	$recherche = "tit_pro LIKE '".$premier."' OR aut_pro LIKE '".$premier."' OR desc_pro LIKE '".$premier."'";
	
	//on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
	for ( $i = 1 ; $i < count($elts) ; $i++ )
	{
	$elt_suivant = "%".$elts[$i]."%";
	
	//on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
	$recherche.= " OR tit_pro LIKE '".$elt_suivant."' OR aut_pro LIKE '".$elt_suivant."' OR desc_pro LIKE '".$elt_suivant."'";
	}
	
	// requete SQL,
	$requete = $msc->query("SELECT COUNT(*) nbr FROM store WHERE $recherche");
	$bloc= $msc->query("SELECT * FROM store WHERE $recherche ORDER BY id_pro DESC LIMIT 50 ");
	//nombre de fichiers trouvés
	$reponses = $requete->fetch();
	if($reponses['nbr'] == 0) 
	{ 
		  echo '<div class="s_resul">00  Résultat pour "'.$mot.'" </div>'; 
		   
	}
	else if($reponses['nbr'] != 0) 
	{ 
			 echo '  <div class="s_resul">'.$reponses['nbr'].' Résultats pour "'.$mot.'" </div>';
			 
			 while($done=$bloc->fetch())
	{ 
				  if(strlen($done['tit_pro'])>59)
								  {
								 $titlee=substr($done['tit_pro'], 0, 59);
//										  $dernier_mot=strrpos($comment," ");
//										  $titlee=substr($comment,0,$dernier_mot);
										  $titlee.="...";
								  }
								  else
								  {
									  $titlee=$done['tit_pro'];
								  }
					  echo '
          
          <li>
                <a href="index.php?b=uno.fiche.store&id='.$done['id_pro'].'">
                  <div class="pimg"><img src="source/img/store/'.$done['img_pro'].'"  alt="'.$titlee.' la REFERENCE DOCUMENTAIRE" /></div>
                  <p class="pti">'.$titlee.'</p>
           <!-- <p class="petoi"> <i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></p>-->
                  <p class="ppri">'.$done['nprice_pro'].' &#8364;</p>
                 
                </a>
            </li> 
			 ';
				 
	}
				 
			 
	}
	
	
	}
	else
	{
		
		echo '<div class="s_resul"> '.mot2($alpagl,45).' </div>';
	}
	}
	else 
	{
		
	echo '<div class="s_resul">'.mot2($alpagl,45).' </div>';	
	}
	
	
	
	}
	
		  
	  }
	  else
	  {
		  echo mot2($alpagl,46);
	  }
	  
	 sear_pict($msc,$alpagl);
	
}



}
		
		else{
			
			echo '<div class="stop_form"> Vous devez saissir un mot et sélectionner une catégorie!! </div>';
		}
?>


</ul>




</div>
  </div>
</div>