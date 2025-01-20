<?php 

function notifi()
{
	
										 //notification
	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
    $inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"Vous avez modifier les droits de '".$_POST['psee']."'",0));
	}

function histo()
{
	//historiq								
	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");
    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],'Vous avez envoyé un message.',$_SERVER['HTTP_USER_AGENT']));
		
	
}


?>