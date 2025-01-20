<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel(); 
$nbr_ParPage=$_SESSION['nbr_ParPage'];
	 
				  
		   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_bk) nbr FROM book " );
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
										<td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Ajouter Livre"  class="linkp btnUp0" data-page="book_add" data-title="Ajouter Livre" data-parametre="id=1&type=1" ></td>
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
														<th scope="col">Description</th>
														<th scope="col">Durée</th>
														<th scope="col">Date</th>
													</tr>
												</thead> 
								';
							
								$bloc=$tams->query(' SELECT * FROM book  ORDER BY  id_bk DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
								
								$ii=1;
								while($done=$bloc->fetch())
								{
									
									
									
								/*$mycat=array_key_exists($done['id_marque_pro'],$cat) ? $cat[$done['id_marque_pro']] : "Null";
									*/

								echo '
								<tr>
					<td data-title="No">'.$ii.'</br> '.$Beclas->onlineShow($done['actif_bk']).' </td>
					<td data-title="Preview"><img src="../../source/img/book/'.$done['img_bk'].'"  alt=""/> <br/>[ID: '.$done['id_bk'].']</td>
					<td data-title="Title">'.$done['titreFR_bk'].'</td>
					<td data-title="Description">'.$done['descFR_bk'].'</td>
					<td data-title="Durée"> '.$done['duree_bk'].' <br/>'.$done['pg_bk'].' pages</td>
					<td data-title="Date">'.$done['datephp_bk'].'
						
						<div class="TBbtn foplus">Voir plus</div>
						<div class="TBbtn fomoin hide">Tous masquer</div>
						<div class="hide"> Informations:<br/>';
						
					/* 	 $bloc2=$tams->query(' SELECT * FROM _marque_sto WHERE id_maqs =\''.$done['id_marque_pro'].'\' ORDER BY  id_maqs DESC ');
										
								$iii=1;
								while($done2=$bloc2->fetch())
								{
									
								echo '<span class="fon_bole orange_1">'.$done2['name_fr_maqs'].'</span><br/>';
									
									
								} */
						
							
								
							
					echo'
					</br> 
					<a href="../../source/pdf/book/'.$done['linkFR_bk'].'" target="_blanc" class="petibtn">Télécharger livre [fr]</a>
					<a href="../../source/pdf/book/'.$done['linkEN_bk'].'" target="_blanc" class="petibtn">Télécharger livre [en]</a>
					</br> 
					
					<br/>Description :<br/>'.nl2br($done['descFR_bk']).'<br/>
					<br/>'.nl2br($done['descEN_bk']).'<br/>
					
					
					</div>
						
						<div class="detapop">Detail</div>
						
						<ul class="supedit">
							<li><a href="ddf" data-table="book" data-champid="id_bk" data-champ="actif_bk HHH '.$done['actif_bk'].' HHH page=livre; Nom='.$done['titreFR_bk'].'; pdf='.$done['linkFR_bk'].'"  data-action="activer_sql"    data-id="'.$done['id_bk'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
							
						<li><a href="5d5ed" class="linkp" data-page="book_update" data-title="Update livre" data-parametre="id='.$done['id_bk'].'&type=1" ><i class="fa fa-edit" title="Update"></i></a></li>
						<li><a href="5d5ed" class="linkp" data-page="book_update" data-title="Update livre" data-parametre="id='.$done['id_bk'].'&type=1" ><i class="fa fa-edit" title="Update"></i></a></li>
						
							<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
							<a href="gf" data-table="book" data-champid="id_bk" data-champ="../../../../source/img/book/'.$done['img_bk'].' HHH ../../../../source/pdf/book/'.$done['linkEN_bk'].' HHH ../../../../source/pdf/book/'.$done['linkFR_bk'].' HHH 3 HHH 4 HHH 5 HHH Page=Livre; Nom='.$done['titreFR_bk'].'; PDF='.$done['linkFR_bk'].'"  data-action="delete_sql"   data-id="'.$done['id_bk'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete">Confirm</i></a>
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
											echo '<li class="linkNB '.$i.'" data-page="book_show" data-title="Les livres page('.$i.')" data-para="page=book_show&pg='.$i.'">
											<a href="#">' . $i . '</a></li> ';
											}
											echo '</ul>'; 
			   
		    }
		else
			{
			  
			   echo  '
			        <input name="aok" id="aok" type="submit" value="Ajouter Livre"  class="linkp btnUp" data-page="book_add" data-title="Ajouter Livre" data-parametre="id=1&type=1" >
			   
			        <div class="stop_form tex_center mar_top_40">Aucun résultat</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>