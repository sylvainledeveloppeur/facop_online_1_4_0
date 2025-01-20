<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkUpd();

//$ins=empty($_POST['ins']) ? $_POST['ins']:0;

if( !empty($_POST['id'])  )
{ 
					 						
	$upd=$tams->query(" UPDATE _webapp_info SET 
	android_nosignup=\"".$_POST['ins']."\", android_noupdate=\"".$_POST['upd']."\", minRetrait=\"".$_POST['ret']."\", currency=\"".$_POST['cur']."\", android_ver=\"".$_POST['aver']."\", android_new=\"".$_POST['anew']."\", android_majObli=\"".$_POST['aob']."\", web_ver=\"".$_POST['wver']."\", web_new=\"".$_POST['wnew']."\", iphone_ver=\"".$_POST['iver']."\", iphone_new=\"".$_POST['inew']."\", iphone_majObli=\"".$_POST['iob']."\", pdirect=\"".$_POST['pdi']."\", pindirect=\"".$_POST['pidi']."\", frai_paie_mobile=\"".$_POST['fra']."\", remiseAchat=\"".$_POST['remi']."\", webVideo=\"".$_POST['vidsi']."\" WHERE id=\"".$_POST['id']."\" ");

									if($upd)
										{
                                            $Beclas->echoo1(1,"Successfully Updated");
                                            $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, setup ", $_POST['id']); //notification
										}
										else
										{ 
										  $Beclas->echoo1(0,"ERROR: contact the developer"); 
										  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, setup: ERROR", $_POST['id']);
										}
	
}
else
{
	$Beclas->echoo1(0,"All fields are required");
}

