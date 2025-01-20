<?php   @session_start(); 
require_once('../db_2_js.class.php');
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
	

	       $nbr_pseudo1=$tams->prepare("SELECT SUM(some_bk) nbr FROM _admin_bank " );
           $nbr_pseudo1->execute();
           $chif_pse1=$nbr_pseudo1->fetch();
		   $amountotal=$chif_pse1['nbr']; 
		   
		   $nbr_pseudo12=$tams->prepare("SELECT SUM(somepd_bk) nbr FROM _admin_bank " );
           $nbr_pseudo12->execute();
           $chif_pse12=$nbr_pseudo12->fetch();
		   $amountotalPD=$chif_pse12['nbr'];

		   $nbr_pseudo13=$tams->prepare("SELECT SUM(somepi_bk) nbr FROM _admin_bank " );
           $nbr_pseudo13->execute();
           $chif_pse13=$nbr_pseudo13->fetch();
		   $amountotalPI=$chif_pse13['nbr'];
				  
			$nbr_pseudo=$tams->prepare("SELECT COUNT(id_bk) nbr FROM _admin_bank " );
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
      <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="BOUTON"  class="linkp btnUp0 hide" data-page="plat_add" data-title="booton" data-parametre="id=1&type=1" ></td>
      <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="BOUTON"  class="linkp btnUp0 hide" data-page="plat_add" data-title="booton" data-parametre="id=1&type=1" ></td>
     
    </tr>

	<tr>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Appli: '.$amountotal+$amountotalPD+$amountotalPI.' XAF</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Facop: '.$amountotal.' XAF</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Parain direct: '.$amountotalPD.' XAF</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Parain indirect: '.$amountotalPI.' XAF</div></td>
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
					<th scope="col">Montant</th>
					<th scope="col">Niveau</th>
					<th scope="col">Utilisateur</th>
					<th scope="col">Date</th>
				</tr>
					</thead> 
					';
			   
			   	$bloc=$tams->query(' SELECT * FROM _admin_bank ORDER BY  id_bk DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
        
				echo '
				 <tr>
      <td data-title="No">'.$ii.' </td>
      <td data-title="Preview"><img src="../../source/img/money.png"  alt=""/></td>
      <td data-title="Montant">Facop: '.$done['some_bk'].' XAF 
	  </br>P direct: '.$done['somepd_bk'].' XAF
	  </br>P indirect: '.$done['somepi_bk'].' XAF  </td>
      <td data-title="Niveau">'.$done['pack_bk'].' </td>
      <td data-title="Utilisateur"> user: '.$done['user_bk'].'
	   <br/><br/> Parain Direct:<br/>'.$done['padirect_bk'].'
	   <br/><br/> Parain Indirect:<br/>'.$done['paindirect_bk'].'</td>
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
		 
			
				
			
       echo'<br/><br/>
	 
	 
	   </div>
		 
		 <div class="detapop">Detail</div>


		<ul class="supedit">
			 <li><a href="#" data-table="recus" data-champid="id_rec" data-champ="actif HHH '.$done['id_bk'].' HHH Page=Les Réçus; Elève='.$done['id_bk'].'; Reçu='.$done['id_bk'].'"  data-action="activer_sql"    data-id="'.$done['id_bk'].'" class="action0"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp0" data-page="plat_upd" data-title="Edit product" data-parametre="id='.$done['id_bk'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li> 
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="_admin_bank" data-champid="id_bk" data-champ="../../../../source/pdf/certificat/user/'.$done['id_bk'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Facop benefice; Utilisateur='.$done['user_bk'].'; Montant='.$done['some_bk'].'" data-action="delete_sql"  data-id="'.$done['id_bk'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="benefice_show" data-title="Facop bénefices page('.$i.')" data-para="page=benefice_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>