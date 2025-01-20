<?php   @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();
$nbr_ParPage=$_SESSION['nbr_ParPage'];
	 

	      
				  
			$nbr_pseudo=$tams->prepare("SELECT COUNT(id_ubk) nbr FROM user_book " );
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
     <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter livre utilisateur"  class="linkp btnUp0" data-page="user_book_add" data-title="Ajouter livre utilisateur" data-parametre="id=1&type=1" ></td>
     
    </tr>

	<tr>
      <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
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
					<th scope="col">Utilisateur</th>
					<th scope="col">Titre</th>
					<th scope="col">Description</th>
					<th scope="col">Date</th>
				</tr>
					</thead> 
					';
			   
			   	$bloc=$tams->query(' SELECT * FROM user_book LEFT JOIN book ON user_book.id_book_ubk=book.id_bk  ORDER BY  id_ubk DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
           
			//$ava=is_file('../../../../source/img/avatar/user/'.$done['ava']) ? '../../source/img/avatar/user/'.$done['ava'] : "../../source/img/avatar/avatar.png";

				echo '
				 <tr>
      <td data-title="No">'.$ii.'  
	  </br> </br> '.$Beclas->onlineState($done['actif_ubk'], "En ligne", "Hors ligne").' </td>
      <td data-title="Preview"><img src="../../source/img/book/'.$done['img_bk'].'"  alt=""/></td>
      <td data-title="Utilisateur">'.$done['pseudo_user_ubk'].' </td>
      <td data-title="Titre">'.$done['titreFR_bk'].'  </td>
      <td data-title="Description"> --- </td>
      <td data-title="Date">'.$done['datephp'].'

		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>
		 </br> Date: </br>'.$done['datephp'].'';
		 
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
			 <li><a href="gtt" data-table="user_book" data-champid="id_ubk" data-champ="actif_ubk HHH '.$done['actif_ubk'].' HHH Page=Livres utilisateur; utilisateur='.$done['pseudo_user_ubk'].'; id='.$done['id_user_ubk'].'"  data-action="activer_sql"    data-id="'.$done['id_ubk'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp0" data-page="plat_upd" data-title="Edit product" data-parametre="id='.$done['id_ubk'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li> 
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="user_book" data-champid="id_ubk" data-champ="../../../../source/pdf/certificat/user/'.$done['id_ubk'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Les livres utilisateur; Utilisateur='.$done['pseudo_user_ubk'].'; Id='.$done['id_user_ubk'].'" data-action="delete_sql"  data-id="'.$done['id_ubk'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="user_book_show" data-title="Les Livres utilisateur page('.$i.')" data-para="page=user_book_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '<table width="100%" border="0" class="utable2 utable_2">
			   <tbody>
			 
				 <tr>
				 <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter livre utilisateur"  class="linkp btnUp0" data-page="user_book_add" data-title="Ajouter livre utilisateur" data-parametre="id=1&type=1" ></td>
     
				 </tr>
			 
				 </tbody>
					 </table>
					 
					 <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>