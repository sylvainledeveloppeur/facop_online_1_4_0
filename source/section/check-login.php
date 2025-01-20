<?php @session_start();
if (isset($_SESSION['login']) && $_SESSION['login']=='user') {
	
}else{
	echo "<script>window.location.assign('index.php')</script>";
}




 ?>