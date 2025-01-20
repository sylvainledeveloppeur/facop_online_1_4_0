<?php session_start();
 //require_once("../../db.php");
/**************definir langue en session si le useur le choisi***************************************/
if(isset($_GET['lang']))
{
	
    $_SESSION['langue_wt']=htmlentities($_GET['lang']);//definir nouvelle lang
	//mise a jour de la langue du user
	/*if(isset($_SESSION['id_jsp']))
	{
	  $JSP->query(' UPDATE user_jsp SET lang_user="'.$_SESSION['langue_wt'].'" WHERE id_user='.$_SESSION['id_jsp'].' ');
	  
	}*/
	
}/*
header('location: '.$_SERVER['HTTP_REFERER'].'');*/
 echo '<script type="text/javascript"> window.setTimeout("location=(\''.$_SERVER['HTTP_REFERER'].'\');") </script>';

?>
