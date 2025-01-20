<?php @session_start(); 
require_once('../db_2_js.class.php');

//$upd=$tams->query(' UPDATE _admin_team SET pass=\''.sha1('tams').'\' WHERE id=\''.$_SESSION['id_admin'].'\' ');


if(!empty($_POST['pse'])AND strlen($_POST['pse'])>1  )
{
	if(!empty($_POST['pas']) AND strlen($_POST['pas'])>=5 AND preg_match("#[0-9]{1,}#",$_POST['pas']) AND preg_match("#[a-z]{1,}#",$_POST['pas']) AND preg_match("#[A-Z]{1,}#",$_POST['pas']) )
      {
		
		if(!empty($_POST['nom']) AND strlen($_POST['nom'])>=1  )
           {
			
			if(!empty($_POST['pre']) AND strlen($_POST['pre'])>=1  )
           {
				
				if(!empty($_POST['bio']) AND strlen($_POST['bio'])>=1  )
           {
			
			//recherche du pseudo
					   $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team
					   WHERE pseudo=:pse  " ) ;
					   $nbr_pseudo->execute(array('pse'=>$_POST['pse']));
					   $chif_pse=$nbr_pseudo->fetch();

				   if ($chif_pse['nbr']==0)
					{
							
					   
								 //recherche du pseudo - pass
								   $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team
								   WHERE pseudo=:pse AND pass=:pas  " ) ;
								   $nbr_pseudo->execute(array('pse'=>$_SESSION['pseu'],'pas'=>sha1($_POST['pas0'])));
								   $chif_pse=$nbr_pseudo->fetch();

							   if ($chif_pse['nbr']!=0)
								{
								$upd=$tams->query(' UPDATE _admin_team SET 
								pseudo=\''.$_POST['pse'].'\',nom_team=\''.$_POST['nom'].'\',prenom_team=\''.$_POST['pre'].'\',pass=\''.sha1($_POST['pas']).'\',about_team=\''.$_POST['bio'].'\',date_team=NOW() WHERE id=\''.$_SESSION['id_admin'].'\'
										 ');


									if($upd)
										{
										
										$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) 
					   VALUES (?,?,?,?,NOW())");

$inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"Vous avez mis vos informations à jour",0));
										
											echo '<div class="ok_form">Action done (you must log-out and login again!)</div>';	
										}
							   }
								else
								{
								 echo '<div class="stop_form">The old password is incorrect</div>';	
								}
					   
					   
				   }
					else
					{
					 echo '<div class="stop_form">User\'s name is already used</div>';	
					}
					}
			else
			{
			echo '<div class="stop_form">Incorrect Biography</div>';	
			}
					}
			else
			{
			echo '<div class="stop_form">Incorrect First name</div>';	
			}
			}
			else
			{
			echo '<div class="stop_form">Incorrect name</div>';	
			}
	  }
      else
		{
		
		  echo '<ul class="stop_form ul">The password must contain at least:
						  
						  <li>More than 5 characters</li>
						  <li>Number</li>
						  <li>Minuscule character</li>
						  <li>Capital character</li>
						  </ul>';
		  
		}
	
}
else
{
echo '<div class="stop_form">Incorrect username</div>';	
}

?>