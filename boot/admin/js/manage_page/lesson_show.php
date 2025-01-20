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
      <th scope="col">Pack</th>
      <th scope="col">Durée</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson " );
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
	  
							<input name="aok" id="aok" type="submit" value="Ajouter thème"  class="linkp btnUp" data-page="lesson_add" data-title="Ajouter thème" data-parametre="id=1&type=1" >
							   '; 
	      
			   
			   	$bloc=$tams->query(' SELECT * FROM lesson  ORDER BY  id_les DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
					
					
				/*$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */

				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br> '.$Beclas->onlineShow($done['actif']).' </td>
      <td data-title="Preview"><img src="../../source/img/lesson/'.$done['img'].'"  alt=""/></td>
      <td data-title="Title">'.$done['titre'].'</td>
      <td data-title="Pack">'.$done['name_pack'].'</td>
      <td data-title="Durée"> '.$done['dure'].' </br>'.$done['facile'].'</td>
      <td data-title="Date">'.$done['datephp'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';	
			
       echo'<br/>Description :<br/>'.nl2br($done['des']).'<br/> <br/>
		   
	   <strong>Liste des vidéos:</strong> <br/><br/> ';


	 
	   $bloc2=$tams->query(' SELECT * FROM video WHERE id_les_vi =\''.$done['id_les'].'\' ORDER BY  id_vi DESC ');
					  
				$iii=1;
			  while($done2=$bloc2->fetch())
			  {
				  
			  echo '-> '.$done2['titre'].'<br/><br/>';
				  
				  
			  } 
	 
   
	echo '<br/><br/> <strong>Liste des PDF:</strong> <br/><br/> ';

	$bloc2=$tams->query(' SELECT * FROM pdf WHERE id_les_pf =\''.$done['id_les'].'\' ORDER BY  id_pf DESC ');
				   
			 $iii=1;
		   while($done2=$bloc2->fetch())
		   {
			   
		   echo '-> '.$done2['titre'].'<br/><br/>';
			   
			   
		   } 
  

 echo ' </div>
		 
         <div class="detapop">Detail</div>
		<ul class="supedit">
			 <li><a href="ddf" data-table="lesson" data-champid="id_les" data-champ="actif HHH '.$done['actif'].' HHH Page=lesson; Nom='.$done['titre'].'; Prix='.$done['prix'].'"  data-action="activer_sql"    data-id="'.$done['id_les'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="lesson_update" data-title="Update thème" data-parametre="id='.$done['id_les'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="lesson" data-champid="id_les" data-champ="../../../../source/img/lesson/'.$done['img'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Lesson; Nom='.$done['titre'].'; Prix='.$done['prix'].'"  data-action="delete_sql"   data-id="'.$done['id_les'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="lesson_show" data-title="Les leçons page('.$i.')" data-para="page=lesson_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '
			        <input name="aok" id="aok" type="submit" value="Ajouter leçon"  class="linkp btnUp" data-page="lesson_add" data-title="Ajouter leçon" data-parametre="id=1&type=1" >
			   
			        <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>