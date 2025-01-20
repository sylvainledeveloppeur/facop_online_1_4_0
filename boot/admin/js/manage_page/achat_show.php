<?php   @session_start(); 
require_once('../db_2_js.class.php');
	require_once('../../class/default.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();

	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	  $bloc=$tams->query(' SELECT * FROM  user ORDER BY id  ASC ');
						
	  $ii=1;
	while($done=$bloc->fetch())
	{
		//$cat[$done['id']]=$done['name_fr_maqs'];
	
	}
	

	        $nbr_pseudo1=$tams->prepare("SELECT SUM(prixpack_cha) nbr FROM achat " );
           $nbr_pseudo1->execute();
           $chif_pse1=$nbr_pseudo1->fetch();
		   $amountotal=$chif_pse1['nbr']; 
				  
			$nbr_pseudo=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat " );
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
      <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Les Achats initialisés"  class="linkp btnUp0" data-page="achatpending_show" data-title="Les Achats initialisés" data-parametre="id=1&type=1" ></td>
      <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter achat"  class="linkp btnUp0" data-page="achat_add" data-title="Ajouter achat" data-parametre="id=1&type=1" ></td>
     
    </tr>

	<tr>
      <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
      <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Montant total:'.$amountotal.' XAF</div></td>
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
					<th scope="col">Niveau</th>
					<th scope="col">Prix</th>
					<th scope="col">Pseudo</th>
					<th scope="col">Date</th>
				</tr>
					</thead> 
					';
			   
			   	$bloc=$tams->query(' SELECT * FROM achat LEFT JOIN user ON achat.iduser_cha=user.id  ORDER BY  id_cha DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
           
			$ava=is_file('../../../../source/img/avatar/user/'.$done['ava']) ? '../../source/img/avatar/user/'.$done['ava'] : "../../source/img/avatar/avatar.png";
			
			      $nber=$BClas->timeEnd(365,strtotime($done['datephp_cha']));
				  $expi=$nber<0 ? '<span class="orange_1">Expiré</span>' : '<span class="vert_1">'.$nber.' jours restants</span>';

				echo '
				 <tr>
      <td data-title="No">'.$ii.'  
	  </br> </br> '.$Beclas->onlineState($done['statu_cha'], "Payé", "En cours").' 
	  </br>  ID transaction: </br>'.$done['idtransaction'].'</td>
      <td data-title="Preview"><img src="../../source/img/pack/'.$done['codenamepack_cha'].'.png"  alt=""/></td>
      <td data-title="Niveau">'.$done['nompack_cha'].' </td>
      <td data-title="Prix">'.$done['prixpack_cha'].' XAF </td>
      <td data-title="Pseudo"> Pseudo: '.$done['pseudo'].' <br/> ID:'.$done['id'].'   
	  </br></br> Metode paiement: </br>'.$done['methodpaie_cha'].'
	   </br></br> Expiration: </br>'.$expi.'</td>
      <td data-title="Date">'.$done['datephp_cha'].'

		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide"> Informations:<br/>
		 </br> Paiement data: </br>'.$done['datapai_cha'].'';
		 
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
			 <li><a href="#" data-table="recus" data-champid="id_rec" data-champ="actif HHH '.$done['id_cha'].' HHH Page=Les Réçus; Elève='.$done['id_cha'].'; Reçu='.$done['id_cha'].'"  data-action="activer_sql"    data-id="'.$done['id_cha'].'" class="action0"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp0" data-page="plat_upd" data-title="Edit product" data-parametre="id='.$done['id_cha'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li> 
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="achat" data-champid="id_cha" data-champ="../../../../source/pdf/certificat/user/'.$done['id_cha'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Les achats; Utilisateur='.$done['pseudo'].'; Niveau='.$done['nompack_cha'].'" data-action="delete_sql"  data-id="'.$done['id_cha'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="achat_show" data-title="Les achats page('.$i.')" data-para="page=achat_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '<table width="100%" border="0" class="utable2 utable_2">
			   <tbody>
			 
				 <tr>
				   <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Les Achats initialisés"  class="linkp btnUp0" data-page="achatpending_show" data-title="Les Achats initialisés" data-parametre="id=1&type=1" ></td>
				   <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Ajouter achat"  class="linkp btnUp0" data-page="achat_add" data-title="Ajouter achat" data-parametre="id=1&type=1" ></td>
				  
				 </tr>
			 
				 </tbody>
					 </table>
					 
					 <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>