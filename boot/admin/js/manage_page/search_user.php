<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();
	
		    
			 $mot=$_GET['text'];
			 $table="user";
			 $champ1="pseudo";
			 $champ2="tel";
	
					  
$ta=array("article_tam"=>"La liste des article","user"=>"La liste des membres");
								
		
					//on récupère le ou les mots-clés saisis (chaîne de caractères)
					$mot = htmlspecialchars($mot);

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
							$recherche = $champ1." LIKE '".$premier."' OR ".$champ2." LIKE '".$premier."' ";

							//on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
							for ( $i = 1 ; $i < count($elts) ; $i++ )
							{
							$elt_suivant = "%".$elts[$i]."%";

							//on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
							$recherche.= " OR ".$champ1." LIKE '".$elt_suivant."' OR ".$champ2." LIKE '".$elt_suivant."' ";
							}

							// requete SQL,
							$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." WHERE ".$recherche);
							$bloc= $tams->query("SELECT * FROM ".$table." WHERE $recherche  ORDER BY RAND() LIMIT 200 ");
							//nombre de fichiers trouvés
							$reponses = $requete->fetch();
							if($reponses['nbr'] == 0) 
							{ 
								
								  echo '<div class="stop_form">00 result for "'.$mot.'" (User)</div>'; 

							}
							else 
							{
								 echo '<div class="ok_form">\''.$reponses['nbr'].'\' results for "'.$mot.'" (User)</div>'; 
								echo'<table width="100%" border="1" class="utable utable_1">
 
	   <thead>
	   <tr>
	   <th scope="col">No</th>
	   <th scope="col">Preview</th>
	   <th scope="col">Nom</th>
	   <th scope="col">Contact</th>
	   <th scope="col">Classe</th>
	   <th scope="col">Date</th>
	 </tr>
	   </thead>  
	     <tbody>
			 <div>';
							
                                       $ii=1;
							 while($done=$bloc->fetch())
				{
					
					$acti=0;
            /*  $actif=$done['actif_pro']==0 ? '<span class="orange_1">Hors ligne</span>':'<span class="vert_1">En ligne</span>';
					    $acti=$done['actif_pro']==0 ? 'actif':'desactif';
					
				$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */
			$ava=is_file('../../../../source/img/avatar/user/'.$done['ava']) ? '../../source/img/avatar/user/'.$done['ava'] : "../../source/img/avatar/avatar.png";
				echo '
				 <tr class="wow bounceInLeft animated">
      <td data-title="No">'.$ii.'<br/> ID : '.$done['id'].' </br> '.$Beclas->onlineShow($done['valid']).'</td>
      <td data-title="Preview"><img src="'.$ava.'"  alt=""/> </td>
      <td data-title="nom">'.$done['pseudo'].'</td>
      <td data-title="contact">'.$done['email'].' <br/> Tel: '.$done['tel'].'</td>
      <td data-title="Classe"></td>
      <td data-title="Date">'.$done['datephp'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';
		 
	/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
						
				  $iii=1;
				while($done2=$bloc2->fetch())
				{
					
				echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
					
					
				} */
		 
			
				
			
       echo'<br/>Description :<br/>'.nl2br($done['nom']).'<br/>
	   <br/>Matricule :<br/>'.$done['pseudo'].'<br/>
	   <br/>Mot de passe :<br/>'.$done['pass'].'<br/> 
	   
	   <br/>Moyenne sequence 1 :<br/>'.$done['pseudo'].'<br/>
	   <br/>Moyenne sequence 2 :<br/>'.$done['pseudo'].'<br/>
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>

		<ul class="supedit">
		
		<li class="noact0" title="Activer/désactiver Email"><a href="ddf" class="action" data-table="user" data-champid="id" data-champ="valid HHH '.$done['valid'].' HHH Page=User; utilisateur='.$done['pseudo'].'; Email='.$done['email'].'" data-action="activer_sql" data-id="'.$done['id'].'"  ><i class="fa fa-envelope"></i></a></li>
		<li class="noact" ><a href="ddf"><i class="fa fa-adjust " title="activate product"></i></a></li>
		<li class="noact0" ><a href="ddf" ><i class="fa fa-gavel" title="activate product"></i></a></li>
			
			 <li><a href="ddf" data-table="store" data-champid="id_pro" data-champ="actif_pro"  data-action=""    data-id="'.$done['id'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="prescrit_update" data-title="Elève mise à jour" data-parametre="id='.$done['id'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="user" data-champid="id"  data-champ="" data-action="delete_sql"  data-id="'.$done['id'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
		  </ul></td>
    </tr>
			';
					$ii++;
				}	
								
					 echo '  </tbody>
                         </table>';							
							}
					}

	
	
	
	?>
	