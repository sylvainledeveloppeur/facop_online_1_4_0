<?php   @session_start(); 
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
      $idcla=$_GET['idclass'];
      $nomcla=$_GET['nomclass'];

	
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM eleve WHERE clas=$idcla " );
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
	 <div class="eta_form"></div>
		 <table width="100%" border="0" class="utable2 utable_2"> 
	 <tbody>
   
	   <tr> 
		 <td scope="col" align="center" colspan="3">
		 <select required="required" name="claELEV" class="SeletLoad" id="claELEV" data-loadpage="eleve_class_load">
		 <option value="0">-- Classe --</option>';
		 
		 
   
		$bloc =$tams->query('SELECT * FROM class  ORDER BY nom  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '<option value="'.$done['id_cla'].' HHH '.$done['nom'].'">'.$done['nom'].'</option> ';

							  }	
		
		
		 
		 echo '</select></td>
		 <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Générer le PDF"  class="linkBtn btnUp0" data-loadpage="eleve_genere_pdf" data-idclass="'.$idcla.'" data-nomclass="'.$nomcla.'" data-total="'.$chif_pse['nbr'].'" data-title="booton" data-parametre="id=1&type=1" ></td>
		
	   </tr>
   
	   <tr>
		 <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total élèves: '.$chif_pse['nbr'].'</div></td>
		 <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Classe: '.$nomcla.'</div></td>
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
      <th scope="col">Nom</th>
      <th scope="col">Contact</th>
      <th scope="col">Classe</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
					';
			   	//$bloc=$tams->query(' SELECT * FROM eleve  WHERE clas='.$idcla.'  ORDER BY  id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
			   	$bloc=$tams->query(' SELECT * FROM eleve  WHERE clas='.$idcla.'  ORDER BY  id ');
				
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
      <td data-title="No">'.$ii.'<br/> Matricule : '.$done['matricule'].' </td>
      <td data-title="Preview"><img src="../../img/avatar/avatar.png"  alt=""/> </td>
      <td data-title="nom">'.$done['nom'].'</td>
      <td data-title="contact">'.$done['email'].' <br/> '.$done['tel'].'</td>
      <td data-title="Classe">'.$Beclas->chamDta($tams, "class", "id_cla", $done['clas'], "nom").'</td>
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
		 
			
				
			
       echo'<br/>Description :<br/>'.nl2br($done['nom']).'<br/>
	   <br/>Matricule :<br/>'.$done['matricule'].'<br/>
	   <br/>Mot de passe :<br/>'.$done['pass'].'<br/>
	   
	   <br/>Moyenne sequence 1 :<br/>'.$done['mseq1'].'<br/>
	   <br/>Moyenne sequence 2 :<br/>'.$done['mseq2'].'<br/>
	   <br/>Moyenne  trimestre 1 :<br/>'.$done['mtrim1'].'<br/>
	   <br/>Moyenne sequence 3 :<br/>'.$done['mseq3'].'<br/>
	   <br/>Moyenne sequence 4 :<br/>'.$done['mseq4'].'<br/>
	   <br/>Moyenne  trimestre 2 :<br/>'.$done['mtrim2'].'<br/>
	   <br/>Moyenne sequence 5 :<br/>'.$done['mseq5'].'<br/>
	   <br/>Moyenne sequence 6 :<br/>'.$done['mseq6'].'<br/> 
	   <br/>Moyenne  trimestre 3 :<br/>'.$done['mtrim3'].'<br/>
	   <br/>absence :<br/>'.$done['abs'].'<br/>
	   <br/>absence justifiées :<br/>'.$done['abs_jus'].'<br/>
	   <br/>retard :<br/>'.$done['retard'].'<br/>
	   <br/>consigne :<br/>'.$done['consigne'].'<br/>
	   <br/>blame :<br/>'.$done['blame'].'<br/>
	   <br/>exclu :<br/>'.$done['exclu'].'<br/>
	 
	 
	   </div>
		 
         <div class="detapop">Detail</div>

         <a href="../../pdf/fiche/'.$done['matricule'].'_fiche.pdf" target="_blanc">Fiche Pré-inscription</i></a>

		<ul class="supedit">
			 <li><a href="ddf" data-table="store" data-champid="id_pro" data-champ="actif_pro"  data-action="'.$acti.'"    data-id="'.$done['id'].'" class="action"><i class="fa fa-check" title="activate product"></i></a></li>
			
		  <li><a href="5d5ed" class="linkp" data-page="plat_upd" data-title="Edit product" data-parametre="id='.$done['id'].'&type=1" ><i class="fa fa-edit" title="Edit product"></i></a></li>
		  
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="eleve" data-champid="id"  data-champ="" data-action="delete_sql"  data-id="'.$done['id'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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
							  echo '<li class="linkNB '.$i.'" data-page="prescrit_show" data-title="Les Pré-inscriptions page('.$i.')" data-para="page=prescrit_show&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			  
               echo  '
               <div class="eta_form"></div>
                   <table width="100%" border="0" class="utable2 utable_2"> 
               <tbody>
             
                 <tr> 
                   <td scope="col" align="center" colspan="3">
                   <select required="required" name="claELEV" class="SeletLoad" id="claELEV" data-loadpage="eleve_class_load">
                   <option value="0">-- Classe --</option>';
                   
                   
             
                  $bloc =$tams->query('SELECT * FROM class  ORDER BY nom  ASC ');
          
                                                                
                                        while($done=$bloc->fetch())
                                        { 
                                          
                                echo '<option value="'.$done['id_cla'].' HHH '.$done['nom'].'">'.$done['nom'].'</option> ';
          
                                        }	
                  
                  
                   
                   echo '</select></td>
                   <td scope="col" align="center" colspan="2"><input name="aok" id="aok" type="submit" value="Générer le PDF"  class="linkBtn btnUp0" data-loadpage="eleve_genere_pdf" data-idclass="'.$idcla.'" data-nomclass="'.$nomcla.'" data-total="'.$chif_pse['nbr'].'" data-title="booton" data-parametre="id=1&type=1" ></td>
                  
                 </tr>
             
                 <tr>
                   <td scope="col" align="center" colspan="3"><div class="coltota tex_center mar_top_40">Total élèves: '.$chif_pse['nbr'].'</div></td>
                   <td scope="col" align="center" colspan="2"><div class="coltota tex_center mar_top_40">Classe: '.$nomcla.'</div></td>
                 </tr>
             
                 </tbody>
                     </table>	 
                          ';

			   
			}
			?>