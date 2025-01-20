<?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Photo</th>
      <th scope="col">Nom</th>
      <th scope="col">Poste</th>
      <th scope="col">Adress</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	  $bloc=$tams->query(' SELECT * FROM  staff ORDER BY id_sta  ASC ');
						
	  $ii=1;
	while($done=$bloc->fetch())
	{
		//$cat[$done['id']]=$done['name_fr_maqs'];
	
    }
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_sta) nbr FROM staff " );
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
	  
							<input name="aok" id="aok" type="submit" value="Ajouter staff"  class="linkp btnUp" data-page="staff_add" data-title="Ajouter staff" data-parametre="id=1&type=1" >
							   ';
	      
			   
			   	$bloc=$tams->query(' SELECT * FROM staff  ORDER BY  id_sta DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$acti=0;
            /*  $actif=$done['actif_pro']==0 ? '<span class="orange_1">Hors ligne</span>':'<span class="vert_1">En ligne</span>';
					    $acti=$done['actif_pro']==0 ? 'actif':'desactif';
					
				$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */

				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br>  </td>
      <td data-title="Preview"><img src="../../source/img/staff/'.$done['ava'].'"  alt=""/></td>
      <td data-title="Title">'.$done['nom'].'</td>
      <td data-title="Price">'.$done['pos'].'</td>
      <td data-title="Category"> '.$done['tac'].' <br/> '.$done['adr'].'</td>
      <td data-title="Date">'.$done['date'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';
		 
	/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
						
				  $iii=1;
				while($done2=$bloc2->fetch())
				{
					
				echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
					
					
				} */
		 
			
				
			
       echo'<br/>Description :<br/>'.nl2br($done['des']).'<br/> 
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>
		<ul class="supedit">
			 <li><a href="#" data-table="staff" data-champid="id_sta" data-champ="actif HHH '.$done['id_sta'].'"  data-action="activer_sql"      data-id="'.$done['id_sta'].'" class="action0"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp" data-page="staff_update" data-title="Staff (Update)" data-parametre="id='.$done['id_sta'].'&type=1" ><i class="fa fa-edit" title="Update"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="staff" data-champid="id_sta" data-champ="../../../../source/img/staff/'.$done['ava'].'" data-action="delete_sql"  data-id="'.$done['id_sta'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="staff_show" data-title="Staff page('.$i.')" data-para="page=staff_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '
			   <input name="aok" id="aok" type="submit" value="Ajouter staff"  class="linkp btnUp" data-page="staff_add" data-title="Ajouter staff" data-parametre="id=1&type=1" >
			   
			   <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>