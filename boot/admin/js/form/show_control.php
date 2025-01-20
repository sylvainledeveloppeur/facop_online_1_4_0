<?php @session_start(); 
require_once('../db_2_js.class.php');
//require_once('../function/fun_notifi_historique.php');

//$upd=$tams->query(' UPDATE _admin_team SET pass=\''.sha1('tams').'\' WHERE id=\''.$_SESSION['id_admin'].'\' ');

			
								 		
								$upd=$tams->query(' UPDATE _admin_control SET 
								namver=\''.$_POST['namver'].'\',version=\''.$_POST['ver'].'\',logout=\''.$_POST['log'].'\',rowspag=\''.$_POST['row'].'\',back=\''.$_POST['back'].'\' WHERE id=\''.$_POST['leid'].'\'
										 ');


									if($upd)
										{
										
			   echo '<script type="text/javascript"> window.setTimeout("location=(\'dashboard.php?sheet=home\');",1000) </script>';
										 //notification
	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
    $inser=$bloc->execute(array($_SESSION['pseu'],$_SESSION['id_admin'],$_SESSION['pseu']." have updated Control settings ",0));
	
	//historiq								
	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");
    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],'Vous avez mise à jour la page control ',$_SERVER['HTTP_USER_AGENT']));
		
										
										
											echo '<div class="ok_form">Action done</div>';	
										}
							  
					   
				
?>