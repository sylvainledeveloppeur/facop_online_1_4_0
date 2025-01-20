 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	  <?php 
	  
	  
				  function theSearch($site,$tams,$mot,$table,$champ1,$champ2)
			{
					  
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
							$bloc= $tams->query("SELECT * FROM ".$table." WHERE $recherche  ORDER BY RAND()  ");
							//nombre de fichiers trouvés
							$reponses = $requete->fetch();
							if($reponses['nbr'] == 0) 
							{ 
								
								  echo '<div class="stop_form">00 résultat dans "'.$ta[$site].'"</div>'; 

							}
							else 
							{
							
                                       $ii=1;
								 switch($site)
								 {
									 
									 case "article_tam":echo '<div class="ok_form">[ '.$reponses['nbr'].' ] résultats dans "'.$ta[$site].'"</div>';
										 while($done=$bloc->fetch())
				{
				echo '
				 <tr>
      <td>'.$ii.'</td>
      <td><img src="../../../../source/img/article/'.$done['img_min_arti'].'"  alt=""/></td>
      <td>'.$done['titre_arti'].'</td>
      <td>'.$done['nom_team'].'</td>
      <td>'.$done['date_arti'].'
		 
		
		 
		 
		<ul class="supedit">
			<li><a href="ddf" data-table="article_tam" data-champid="id_arti" data-champ="actif_arti" data-action="desactif"  data-id="'.$done['id_arti'].'" class="action"><i class="fa fa-check" title="Disactivate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="article_edit" data-title="Edite post" data-parametre="id='.$done['id_arti'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="article_tam" data-champid="id_arti" data-champ="id_arti" data-action="delete_1"  data-id="'.$done['id_arti'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
		  </ul></td>
    </tr>
			';	
					$ii++;

				}	
										 break;
									
										 
								 }//end switch
								
												
							}




							

					}
					else
					{

						//echo '<div class="s_resul"> '.mot2($alpagl,45).' </div>';
					}
			

			}
	  
/***************resultats personne*********************/
	 if(!empty($_GET['val']))
	  {
		 
			//theSearch("user",$tams,$_GET['val'],"user","code","mail");
		    theSearch("article_tam",$tams,$_GET['val'],"article_tam","titre_arti","text_arti");
	
		  
	  }
	  else
	  {
		  echo '
		   <tr class="stop_form">
           <td>La recherche est vide</td>
           </tr>
		  ';
	  }
	  
	  
	  
	  ?>
	 
	  
  </tbody>
</table>