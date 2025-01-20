<?php session_start();

if(!empty($_GET['responsive']))
{
	
 echo   $_SESSION['responsive']=htmlentities($_GET['responsive']);//redefinir le divise pour inclure ou non le fichier css responsive 
	
	
}
header('location: '.$_SERVER['HTTP_REFERER'].'');
 //echo '<script type="text/javascript"> window.setTimeout("location=(\''.$_SERVER['HTTP_REFERER'].'\');") </script>';

?>
