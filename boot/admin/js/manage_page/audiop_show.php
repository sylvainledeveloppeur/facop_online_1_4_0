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

	 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_audio ");
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
						   <td scope="col" align="center" colspan="1"><input name="aok" id="aok" type="submit" value="Ajouter Audio (pack)"  class="linkp btnUp0" data-page="audiop_add" data-title="Ajouter audio (pack)" data-parametre="id=1&type=1" ></td>
						</td>
						   <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter Audio(FTP)"  class="linkp btnUp0" data-page="audiopftp_add" data-title="Ajouter audio(FTP)" data-parametre="id=1&type=1" ></td>
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
      <th scope="col">Nom</th>
      <th scope="col">Pack</th>
      <th scope="col">Durée</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
				  ';
	      
			   
			   	$bloc=$tams->query(' SELECT * FROM pack_audio  ORDER BY  id_pf DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
					
					
				/*$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
					 */

				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br> '.$Beclas->onlineShow($done['actif_pf']).' </td>
      <td data-title="Preview"><img src="../../source/img/audio.png"  alt=""/></td>
      <td data-title="Title">'.$done['titre'].'</td>
      <td data-title="Pack">'.$done['pack'].'</td>
      <td data-title="Durée"> '.$done['pg'].' </td>
      <td data-title="Date">'.$done['datesql'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>';
		 
	/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
						
				  $iii=1;
				while($done2=$bloc2->fetch())
				{
					
				echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
					
					
				} */
		 
			
				
			
       echo'<br/>PDF :<br/>
	   <a href="../../source/sound/pack/'.$done['link'].'" target="_blanc" class="petibtn">Télécharger  [fr]</a><br/>
	   <a href="../../source/sound/pack/'.$done['linkEN'].'" target="_blanc" class="petibtn">Télécharger  [en]</a>
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>
		<ul class="supedit">
			 <li><a href="ddf" data-table="pack_audio" data-champid="id_pf" data-champ="actif_pf HHH '.$done['actif_pf'].' HHH Page=audio(pack); Nom='.$done['titre'].'; Prix='.$done['titre'].'"  data-action="activer_sql"    data-id="'.$done['id_pf'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="audiop_update" data-title="Update audio(pack)" data-parametre="id='.$done['id_pf'].'&type=1" ><i class="fa fa-edit" title="Edit audio"></i></a></li>
		  
		  <li><a href="5d5ed" class="linkp" data-page="audiopftp_update" data-title="Update audio(ftp)" data-parametre="id='.$done['id_pf'].'&type=1" ><i class="fa fa-edit" title="Edit audio(ftp)"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="pack_audio" data-champid="id_pf" data-champ="../../../../source/sound/pack/'.$done['link'].' HHH ../../../../source/sound/pack/'.$done['linkEN'].' HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=audio(pack); Nom='.$done['titre'].'; id='.$done['id_pf'].'"  data-action="delete_sql"   data-id="'.$done['id_pf'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="pdfp_show" data-title="PDF (pack) page('.$i.')" data-para="page=pdfp_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		     }
			else
			{
			  
			   echo  '
			   <table width="100%" border="0" class="utable2 utable_2">
                       <tbody>
			 <tr>
						   <td scope="col" align="center" colspan="1"><input name="aok" id="aok" type="submit" value="Ajouter Audio (pack)"  class="linkp btnUp0" data-page="audiop_add" data-title="Ajouter audio (pack)" data-parametre="id=1&type=1" ></td>
						</td>
						   <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter Audio(FTP)"  class="linkp btnUp0" data-page="audiopftp_add" data-title="Ajouter audio(FTP)" data-parametre="id=1&type=1" ></td>
						</td>
						
						</tr>
			        <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>