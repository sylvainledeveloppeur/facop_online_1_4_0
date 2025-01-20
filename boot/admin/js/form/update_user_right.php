<?php @session_start(); 

require_once('../db_2_js.class.php');

//require_once('../function/fun_notifi_historique.php');



//$upd=$tams->query(' UPDATE _admin_team SET pass=\''.sha1('tams').'\' WHERE id=\''.$_SESSION['id_admin'].'\' ');



			

					   if(!empty($_POST['pas']))

										{

										 //notification

	$upd1=$tams->query(' UPDATE _admin_team SET pass=\''.sha1($_POST['pas']).'\'  WHERE id=\''.$_POST['leid'].'\' ');	

										}



								

								$upd=$tams->query(' UPDATE _admin_team SET 

								admin=\''.$_POST['admin'].'\',selec=\''.$_POST['sel'].'\',delet=\''.$_POST['del'].'\',inser=\''.$_POST['ins'].'\',updat=\''.$_POST['upd'].'\' , page=\''.$_POST['pag'].'\' WHERE id=\''.$_POST['leid'].'\'

										 ');





									if($upd)

										{
                                          
										 //notification

	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");

    $inser=$bloc->execute(array($_SESSION['pseu'],$_SESSION['id_admin'],$_SESSION['pseu']." have updated '".$_POST['psee']."' informations",0));

	

	//historiq								

	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");

    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],'Vous avez envoyé un message.',$_SERVER['HTTP_USER_AGENT']));

		

										

										

											echo '<div class="ok_form">Action done</div>';	

										}

							  

					   

				

?>