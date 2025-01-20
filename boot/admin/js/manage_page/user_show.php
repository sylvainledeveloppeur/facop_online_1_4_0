<?php   @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkSel();
?> 

	   <!--555555555-->
               <?php 
	  
	  $nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $_GET['nomclass']=!empty($_GET['nomclass']) ? $_GET['nomclass']:"Tous";
	  $cat=array(0=>"un");
	  //$_POST['pg']=2;

	  $bloc=$tams->query(' SELECT * FROM  user ORDER BY id  ASC ');
						
	  $ii=1;
	while($done=$bloc->fetch())
	{
		//$cat[$done['id']]=$done['name_fr_maqs'];
	
    }

	if(!empty($_GET['nomclass']) AND isset($_GET['idclass']) )
	{
		$NomNivo=$_GET['nomclass'];
		$Nivo=$_GET['idclass'] ? $_GET['idclass']  :0;
		$lenivo=' WHERE niveau='.$Nivo;
	}
	else
	{
		$NomNivo="";
		$Nivo="";
		$lenivo="";
	}
	
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user $lenivo " );
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
			   
						//page=user_show&nivo='.$Nivo.'

	 echo  '
	 <div class="eta_form"></div>
		 <table width="100%" border="0" class="utable2 utable_2 wow bounceInDown animated"> 
	 <tbody>
   
	   <tr> 
		 <td scope="col" align="center" colspan="3">
		 <select required="required" name="claELEV" class="SeletLoad" id="claELEV" data-loadpage="user_show">
		 <option value="0">-- Tous les niveaux --</option>';
		 
		 
   
		$bloc =$tams->query('SELECT * FROM pack  ORDER BY titre  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '<option value="'.$done['codeNbr'].' HHH '.$done['titre'].'">'.$done['titre'].'</option> ';

							  }	
		
		
		 
		 echo '</select></td>
		 <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Générer le PDF"  class="linkBtn btnUp0" data-loadpage="user_genere_pdf" data-idclass="'.$Nivo.'" data-nomclass="'.$NomNivo.'" data-total="'.$chif_pse['nbr'].'" data-title="booton" data-parametre="id=1&type=1" ></td>
		
	   </tr>
   
	   <tr>
		 <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
		 <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Niveau: '.$_GET['nomclass'].'</div></td>
	   </tr>
   
	   </tbody>
		   </table>	 
				';
	      
				echo '
				<table width="100%" border="1" class="utable utable_1 wow bounceInUp animated">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Preview</th>
      <th scope="col">Nom</th>
      <th scope="col">Contact</th>
      <th scope="col">Niveau</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
					';
			   	$bloc=$tams->query(' SELECT * FROM user '.$lenivo.' ORDER BY  id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					
			$ava=is_file('../../../../source/img/avatar/user/'.$done['ava']) ? '../../source/img/avatar/user/'.$done['ava'] : "../../source/img/avatar/avatar.png";
				
			echo '
				 <tr class="wow bounceInLeft animated">
      <td data-title="No">'.$ii.'<br/> ID : '.$done['id'].' 
	  </br> '.$Beclas->onlineState($done['valid'], "Email validé", "Email non validé").'
	  </br></br> '.$Beclas->onlineState($done['conecte'], "Compte Connecté", "Compte Déconnecté").'
	  </br></br> '.$Beclas->onlineBloc($done['bloc'], "Compte ouvert", "Compte bloqué").' </td>
      <td data-title="Preview"><img src="'.$ava.'"  alt=""/> </td>
      <td data-title="nom">'.$done['pseudo'].'</td>
      <td data-title="contact">'.$done['email'].' <br/> Tel: '.$done['tel'].'</td>
      <td data-title="Niveau">'.$Beclas->chamDta($tams, "pack", "codeNbr", $done['niveau'], "titre").'</td>
      <td data-title="Date">'.$done['datephp'].'
		  
		<div class="TBbtn foplus">Voir plus</div>
         <div class="TBbtn fomoin hide">Tous masquer</div>
         <div class="hide">Informations:<br/>
		
		 
		 <div class="btnState btnStateTE action" data-table="user" data-champid="id" data-champ="valid HHH '.$done['valid'].' HHH Page=User; utilisateur='.$done['pseudo'].'; Email='.$done['email'].'" data-action="activer_sql" data-id="'.$done['id'].'" >Activer/Désactiver Email</div>
		 <div class="btnState btnStateEN action" data-table="user" data-champid="id" data-champ="conecte HHH '.$done['conecte'].' HHH Page=User; utilisateur='.$done['pseudo'].'; Demande='.$done['email'].'" data-action="activer_sql" data-id="'.$done['id'].'" >Connecter/Déconnecter</div>
		 <div class="btnState btnStateAN action" data-table="user" data-champid="id" data-champ="bloc HHH '.$done['bloc'].' HHH Page=User; utilisateur='.$done['pseudo'].'; Demande='.$done['email'].'" data-action="activer_sql" data-id="'.$done['id'].'" >Bloquer/Débloquer</div>
		 ';
		 	
			
       echo'<br/>Parain :<br/><strong>'.nl2br($done['parrain']).'</strong><br/>
	   <br/>Nom :<br/><strong>'.$done['nom'].'</strong><br/>
	   <br/>code Mail :<br/><strong>'.$done['valid'].'</strong><br/> 
	   <br/>Sexe :<br/><strong>'.$done['sex'].'</strong><br/> 
	   <br/>Pays :<br/><strong>'.$done['pays'].'</strong><br/> 
	   <br/>Date naissance :<br/><strong>'.$done['datnais'].'</strong><br/> 
	   <br/>Adress :<br/><strong>'.$done['adr'].'</strong><br/> 
	   <br/>Ville :<br/><strong>'.$done['vil'].'</strong><br/><br/>  
	   
	   <strong>Les filleuls:</strong> <br/> ';


		 
	   $bloc2=$tams->query(' SELECT * FROM user WHERE parrain =\''.$done['pseudo'].'\' ORDER BY  id DESC ');
					  
				$iii=1;
			  while($done2=$bloc2->fetch())
			  {
				  
			  echo '-> '.$done2['pseudo'].'<br/><br/>';
				  
				  
			  } 
	 
 

echo ' </div>
		 
         <div class="detapop">Detail</div>
		 

		<ul class="supedit">
		
		<li class="noact0" title="Activer/désactiver Email"><a href="ddf" class="action" data-table="user" data-champid="id" data-champ="valid HHH '.$done['valid'].' HHH Page=User; utilisateur='.$done['pseudo'].'; Email='.$done['email'].'" data-action="activer_sql" data-id="'.$done['id'].'"  ><i class="fa fa-envelope"></i></a></li>
		<li class="noact" ><a href="ddf"><i class="fa fa-adjust " title="activate product"></i></a></li>
		<li class="noact0" ><a href="ddf" ><i class="fa fa-gavel" title="activate product"></i></a></li>
			
			 <li><a href="ddf" data-table="store" data-champid="id_pro" data-champ="actif_pro"  data-action=""    data-id="'.$done['id'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="prescrit_update" data-title="Elève mise à jour" data-parametre="id='.$done['id'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="user" data-champid="id"  data-champ="" data-action="delete_sql"  data-id="'.$done['id'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="user_show" data-title="Les utilisateurs page('.$i.')" data-para="page=user_show&pg='.$i.'&idclass='.$Nivo.'&nomclass='.$NomNivo.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
				echo'<div class="eta_form"></div>
				<table width="100%" border="0" class="utable2 utable_2 wow bounceInDown animated"> 
			<tbody>
		  
			  <tr> 
				<td scope="col" align="center" colspan="3">
				<select required="required" name="claELEV" class="SeletLoad" id="claELEV" data-loadpage="user_show">
				<option value="0">-- Tous les niveaux --</option>';
				
				
		  
			   $bloc =$tams->query('SELECT * FROM pack  ORDER BY titre  ASC ');
	   
															 
									 while($done=$bloc->fetch())
									 { 
									   
							 echo '<option value="'.$done['codeNbr'].' HHH '.$done['titre'].'">'.$done['titre'].'</option> ';
	   
									 }	
			   
			   
			    echo '</select></td>
		 <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Générer le PDF"  class="linkBtn btnUp0" data-loadpage="user_genere_pdf" data-idclass="'.$Nivo.'" data-nomclass="'.$NomNivo.'" data-total="'.$chif_pse['nbr'].'" data-title="booton" data-parametre="id=1&type=1" ></td>
		
	   </tr>
   
	   <tr>
		 <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total : '.$chif_pse['nbr'].'</div></td>
		 <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Niveau: '.$_GET['nomclass'].'</div></td>
	   </tr>
			        <div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>