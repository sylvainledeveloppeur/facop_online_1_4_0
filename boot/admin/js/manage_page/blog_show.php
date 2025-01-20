<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();
?> 

	   <!--555555555-->
               <?php 
	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_arti) nbr FROM blog " );
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   	 //------afficher les pages
							  $nbr_ParPage = $nbr_ParPage; //1; 
							  $nb_resulta=$chif_pse['nbr'];
							  // On calcule le nombre de pages à créer
							  $nb_DePages = ceil($nb_resulta / $nbr_ParPage);
							  // Puis on fait une boucle pour écrire les liens vers chacune des pages


							  if (isset($_GET['pg']))
					{
					$page = $_GET['pg']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
					}
					else // La variable n'existe pas, c'est la première fois qu'on charge la page
					{
					$page = 1; // On se met sur la page 1 (par défaut)
					}


							// On calcule le numéro du premier message qu'on prend pour leLIMIT de MySQL
							$premierMessageAafficher = ($page - 1) * $nbr_ParPage;
			   
	      
				 echo  '
					   <table width="100%" border="0" class="utable2 utable_2">
                       <tbody>

						<tr>
						   <td scope="col" align="center" colspan="1"><input name="aok" id="aok" type="submit" value="Ajouter blog"  class="linkp btnUp0" data-page="blog_add" data-title="Ajouter article" data-parametre="id=1&type=1" ></td>
						</td>
						<td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter blog"  class="linkp btnUp0" data-page="blog_add" data-title="Ajouter article" data-parametre="id=1&type=1" ></td>
						</td>
						
						</tr>

						<tr>
						<td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">TOTAL: '.$chif_pse['nbr'].'</div></td>
						</tr>

					</tbody>
						</table>	
	  	                 ';

			 echo '
					<table width="100%" border="1" class="utable utable_1">
							<tbody>
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Photo</th>
										<th scope="col">Titre</th>
										<th scope="col">Auteur</th>
										<th scope="col">Date</th>
									</tr>
								</thead> 
				  ';
			   
			   	$bloc=$tams->query(' SELECT * FROM blog  ORDER BY  id_arti DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
					
					
				/*$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */

				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br> '.$Beclas->onlineShow($done['actif_arti']).' </td>
      <td data-title="Preview"><img src="../../source/img/blog/'.$done['img_arti'].'"  alt=""/></td>
      <td data-title="Title">'.$done['titre_arti'].'</td>
      <td data-title="Leçon">Admin</td>
      <td data-title="Date">'.$done['date_arti'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';
		 
	/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
						
				  $iii=1;
				while($done2=$bloc2->fetch())
				{
					
				echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
					
					
				} */
		 
			
				
			
       echo'<br/>Texte :<br/>'.nl2br($done['text_arti']).'<br/>
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>
		<ul class="supedit">
			 <li><a href="ddf" data-table="blog" data-champid="id_arti" data-champ="actif_arti HHH '.$done['actif_arti'].' HHH Page=blog; Titre='.$done['titre_arti'].'; id='.$done['id_arti'].'"  data-action="activer_sql"    data-id="'.$done['id_arti'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="blog_update" data-title="Mise à jour blog " data-parametre="id='.$done['id_arti'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  <li><a href="5d5ed" class="linkp" data-page="blog_update" data-title="Mise à jour blog" data-parametre="id='.$done['id_arti'].'&type=1" ><i class="fa fa-edit" title="Update "></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="blog" data-champid="id_arti" data-champ="../../../../source/img/blog/'.$done['img_arti'].' HHH ../../../../source/img/blog/'.$done['img_min_arti'].' HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Article; Titre='.$done['titre_arti'].'; id='.$done['id_arti'].'"  data-action="delete_sql"   data-id="'.$done['id_arti'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
		  </ul></td>
    </tr>
			';	
					$ii++;

				}
			   	   echo '  </div> </tbody>
                         </table>';
			   	echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
			   
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="linkNB '.$i.'" data-page="blog_show" data-title="Le blog page('.$i.')" data-para="page=blog_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '
			        <input name="aok" id="aok" type="submit" value="Ajouter article"  class="linkp btnUp" data-page="article_add" data-title="Ajouter article" data-parametre="id=1&type=1" >
			   
			        <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>