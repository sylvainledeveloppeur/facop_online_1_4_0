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

		   $nbr_pseudo12=$tams->prepare("SELECT SUM(some_cp) nbr FROM _admin_comptabilite  WHERE type_cp=0 AND actif=1 " );
           $nbr_pseudo12->execute();
           $chif_pse12=$nbr_pseudo12->fetch();
		   $amountotalPD=$chif_pse12['nbr'];

		   $nbr_pseudo13=$tams->prepare("SELECT SUM(some_cp) nbr FROM _admin_comptabilite  WHERE type_cp=1  AND actif=1  " );
           $nbr_pseudo13->execute();
           $chif_pse13=$nbr_pseudo13->fetch();
		   $amountotalPI=$chif_pse13['nbr'];
				  
			$nbr_pseudo=$tams->prepare("SELECT COUNT(id_cp) nbr FROM _admin_comptabilite " );
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
			   
							//calcule des depenses
							$entree=$amountotal+$amountotalPI;
							$sortie=$amountotalPD;

							$resteSome=$entree-$sortie;

							echo  '
							<table width="100%" border="0" class="utable2 utable_2">
  <tbody>

	<tr>
      <td scope="col" align="center" colspan="3"><input name="aok" id="aok" type="submit" value="Retrait"  class="linkp btnUp0" data-page="compta_add" data-title="Retrait comptabilité" data-parametre="id=1&type=0" ></td>
      <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Dépot"  class="linkp btnUp0" data-page="compta_add" data-title="Dépot comptabilité" data-parametre="id=1&type=1" ></td>
     
    </tr>

	<tr>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
      <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Facop: '.$resteSome.' XAF</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Total retrait: '.$amountotalPD.' XAF</div></td>
      <td scope="col" align="center" colspan="1"><div class="coltota tex_center mar_top_40">Total dépot: '.$amountotalPI.' XAF</div></td>
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
					<th scope="col">Opération</th>
					<th scope="col">Montant</th>
					<th scope="col">Motif</th>
					<th scope="col">Date</th>
				</tr>
					</thead> 
					';
			   
			   	$bloc=$tams->query(' SELECT * FROM _admin_comptabilite ORDER BY  id_cp DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
					$img=$done['type_cp']==0 ? "out.png":"in.png";
					$type=$done['type_cp']==0 ? "Retrait":"Dépot";
        
				echo '
				 <tr>
      <td data-title="No">'.$ii.'</br> '.$Beclas->onlineState($done['actif'],"Inclu", "Exclu").' </td>
      <td data-title="Preview"><img src="../../source/img/'.$img.'"  alt=""/></td>
      <td data-title="Opération">'.$type.'</td>
      <td data-title="Montant"> '.$done['some_cp'].' XAF  </td>
      <td data-title="Motif">'.$done['motif_cp'].' </td>
      <td data-title="Date">'.$done['phpdate'].'
		  
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
			 <li><a href="f" data-table="_admin_comptabilite" data-champid="id_cp" data-champ="actif HHH '.$done['actif'].' HHH Page=Facop comptabilite; type='.$type.'; Motif='.$done['mot'].'; Montant='.$done['mon'].' XAF"  data-action="activer_sql"    data-id="'.$done['id_cp'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="#" class="linkp0" data-page="plat_upd" data-title="Edit product" data-parametre="id='.$done['id_cp'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li> 
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="#" data-table="_admin_comptabilite" data-champid="id_cp" data-champ="../../../../source/pdf/certificat/user/'.$done['id_cp'].' HHH 1 HHH 2 HHH 3 HHH 4 HHH 5 HHH Page=Facop comptabilité; type='.$type.'; Motif='.$done['mot'].'; Montant='.$done['mon'].' XAF" data-action="delete_sql"  data-id="'.$done['id_cp'].'" class="Uconfirm action0"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="compta_show" data-title="Facop comptabilité page('.$i.')" data-para="page=compta_show&pg='.$i.'">
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