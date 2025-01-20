<?php @session_start();
ob_start('ob_gzhandler');
$_SESSION['bee']="BeeTech";
$_SESSION['name']="BeeAdmin";
$_SESSION['version']="Version 6.1.0";
$_SESSION['name_version']="BeeAdmin 6.1.0";
$lang=!empty($_SESSION['lang'])? $_SESSION['lang']:"en";
?>
<!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">
<meta property="og:type" content="website">
<meta property="og:url" content="http://www.bee4tech.com">
<meta property="og:image" content="http://www.bee4tech.com/img/logo/logo.png">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<!--<link rel="stylesheet" href="style/bootstrap/bootstrap.min.css">-->
<link rel="stylesheet" href="style/font/font-awesome-4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="style/font/capicon/font/style.css">
<link rel="stylesheet" href="style/animate/anicollection.css">
<link rel="stylesheet" href="style/animate/animate.css">
<link rel="stylesheet" href="style/framework/hover.css">
<link rel="stylesheet" href="style/framework/normalize.css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/x-icon"  href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.ico">
<?php 
	
	if(!empty($_SESSION['responsive']) AND $_SESSION['responsive']=="pc")
	   {
		
	}
	   else
	   {
		
echo '<link href="style/query.css" rel="stylesheet" type="text/css">';
		   $_SESSION['responsive']="mobile";
	}
	
	?>

