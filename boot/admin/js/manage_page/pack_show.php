<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Photo</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Nbr inscris</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pk) nbr FROM pack " );
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
			   
							echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>
	  
							<input name="aok" id="aok" type="submit" value="Ajouter pack"  class="linkp btnUp" data-page="pack_add" data-title="Ajouter pack" data-parametre="id=1&type=1" >
							   '; 
	      
			   
			   	$bloc=$tams->query(' SELECT * FROM pack  ORDER BY  id_pk DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
					$nbr_pseudo=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat where idpack_cha='".$done['id_pk']."' " );
					$nbr_pseudo->execute();
					$chif_pse=$nbr_pseudo->fetch();
			        $nbele=$chif_pse['nbr'];
					
				/*$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */

				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br> '.$Beclas->onlineShow($done['actif']).' </td>
      <td data-title="Preview"><img src="../../source/img/pack/'.$done['img'].'"  alt=""/></td>
      <td data-title="Title">'.$done['titre'].'</td>
      <td data-title="Price">'.$done['prix'].' XAF</td>
      <td data-title="inscrit"> '.$nbele.'</td>
      <td data-title="Date">'.$done['datephp'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';
				
			
       echo'
	   </br> 
	   <a href="https://www.youtube.com/watch?v='.$done['youtube_FR'].'" target="_blanc" class="petibtn">Vidéo Youtube [fr]</a>
	   <a href="https://www.youtube.com/watch?v='.$done['youtube_EN'].'" target="_blanc" class="petibtn">Vidéo Youtube [en]</a><br/> 
	   
	   <a href="https://player.vimeo.com/video/'.$done['introFR'].'" target="_blanc" class="petibtn">Vidéo Viméo [fr]</a>
	   <a href="https://player.vimeo.com/video/'.$done['introEN'].'" target="_blanc" class="petibtn">Vidéo Viméo [en]</a>
	   
	   <br/><br/><strong>Description :</strong><br/>'.nl2br($done['des']).'<br/>
	   
	       <br/><strong>Certification :</strong><br/> '.$Beclas->onlineState($done['certificat'], "Oui", "Non").'<br/> 
	       <br/><strong>Durée  :</strong><br/> '.$done['dure'].'<br/>  
	       <br/><strong>Nbr étudiant :</strong><br/> '.$done['etudiant'].'<br/><br/> 
	       <br/><strong>Nbr vues :</strong><br/> '.$done['vu'].'<br/><br/> 
		   
		   <strong>Liste des Thèmes:</strong> <br/> ';


		 
		   $bloc2=$tams->query(' SELECT * FROM lesson WHERE id_pack =\''.$done['id_pk'].'\' ORDER BY  id_les DESC ');
						  
					$iii=1;
				  while($done2=$bloc2->fetch())
				  {
					  
				  echo '-> '.$done2['titre'].'<br/><br/>';
					  
					  
				  } 
		 
	 
   
	echo '<br/><br/> <strong>Liste des quiz:</strong> <br/><br/> ';

	$bloc2=$tams->query(' SELECT * FROM quiz WHERE idpack_q =\''.$done['id_pk'].'\' ORDER BY  id_q DESC ');
				   
			 $iii=1;
		   while($done2=$bloc2->fetch())
		   {
			   
		   echo '-> '.$done2['question_q'].' <br/><br/>';
			   
			   
		   } 
  

 echo '
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>
		<ul class="supedit">
			 <li><a href="ddf" data-table="pack" data-champid="id_pk" data-champ="actif HHH '.$done['actif'].' HHH Page=Pack; Nom='.$done['titre'].'; Prix='.$done['prix'].'"  data-action="activer_sql"    data-id="'.$done['id_pk'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="pack_update" data-title="Update pack" data-parametre="id='.$done['id_pk'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="pack" data-champid="id_pk" data-champ="../../../../source/img/pack/'.$done['img'].' HHH ../../../../source/video/pack/'.$done['introFR'].' HHH ../../../../source/video/pack/'.$done['introEN'].' HHH 3 HHH 4 HHH 5 HHH Page=Pack; Nom='.$done['titre'].'; Prix='.$done['prix'].'"  data-action="delete_sql"   data-id="'.$done['id_pk'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="pack_show" data-title="Les packs page('.$i.')" data-para="page=pack_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '
			        <input name="aok" id="aok" type="submit" value="Ajouter classe"  class="linkp btnUp" data-page="class_add" data-title="Ajouter classe" data-parametre="id=1&type=1" >
			   
			        <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>