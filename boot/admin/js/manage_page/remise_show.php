<?php   @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();

	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	 
	 	  
		   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_remi) nbr FROM user_remise " );
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
      <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Ajouter rémise"  class="linkp btnUp0" data-page="remise_add" data-title="Ajouter rémise" data-parametre="id=1&type=1" ></td>
     
    </tr>

	<tr>
      <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
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
					<th scope="col">Preview</th>
					<th scope="col">Rémise</th>
					<th scope="col">Pack</th>
					<th scope="col">Pseudo</th>
					<th scope="col">Date</th>
				</tr>
					</thead> 
					';
			   
			   	$bloc=$tams->query(' SELECT * FROM user_remise LEFT JOIN user ON user_remise.id_user=user.id  ORDER BY  id_remi DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
           
				echo '
				 <tr>
      <td data-title="No">'.$ii.'  
	  </br> </br> '.$Beclas->onlineState($done['actif_remi'], "Activé", "Désactivé").' </td>
      <td data-title="Preview"><img src="../../source/img/money.png"  alt=""/></td>
      <td data-title="Rémise">'.$done['remise'].' %</td>
      <td data-title="Pack">--- </td>
      <td data-title="Pseudo"> Pseudo: '.$done['pseudo'].' <br/> ID:'.$done['id'].' </td>
      <td data-title="Date">'.$done['phpdate_remi'].'

		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>
		 </br> ---: </br>'.$done['phpdate_remi'].'';
		 
	/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
						
				  $iii=1;
				while($done2=$bloc2->fetch())
				{
					
				echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
					
					
				} */
		 
			
				
			
       echo'<br/><br/>
	 
	 
	   </div>
		 
		 <div class="detapop">Detail</div>


		<ul class="supedit">
			 <li><a href="gfg" data-table="user_remise" data-champid="id_remi" data-champ="actif_remi HHH '.$done['actif_remi'].' HHH Page=Les Rémises; Utilisateur='.$done['pseudo'].'; ---='.$done['id_remi'].'"  data-action="activer_sql"    data-id="'.$done['id_remi'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp0" data-page="remise_update" data-title="Edit product" data-parametre="id='.$done['id_remi'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li> 
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="user_remise" data-champid="id_remi" data-champ="../../../../source/pdf/certificat/user/'.$done['id_remi'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Les Rémises; Utilisateur='.$done['pseudo'].'; ---='.$done['id_remi'].'" data-action="delete_sql"  data-id="'.$done['id_remi'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="remise_show" data-title="Les rémises page('.$i.')" data-para="page=remise_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '<table width="100%" border="0" class="utable2 utable_2">
			   <tbody>
			 
				 <tr>
				   <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Ajouter rémise"  class="linkp btnUp0" data-page="remise_add" data-title="Ajouter rémise" data-parametre="id=1&type=1" ></td>
				  
				 </tr>
			 
				 </tbody>
					 </table>
					 
					 <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>