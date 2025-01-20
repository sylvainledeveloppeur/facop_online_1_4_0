<?php 	// On inclut l'entete'.
  require_once("source/section/doctype_loguser.php");//insertion du dotype html5 - style - vieport - compression de page
  require_once("source/section/page_title.php");//insertion des titres de page -balises meta
  require_once('source/class/db.class.php');//base donnéé
 require_once('source/class/default.class.php');//class utilitaire pr funtion rapide "couper mot; url...'
//detect mobile computer
 require_once("source/class/Mobile-Detect-master/Mobile_Detect.php");
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();
//end detect mobile computer
     //include_once('source/section/hide_error.php');//show php error
//monet bill
 require_once("source/class/monetbil/monetbil.php");
//function  langue
     require_once('source/function/fun-langage/fun-load-lang.php');//charger langue
    require_once('source/function/fun-langage/fun-exite-mot.php');//base donnéé
//charger function de panier
       require("source/function/fun-panier/fonctions-panier.php"); 
      require("source/function/fun-panier/panier_php.php"); 
     require("source/function/fun-panier/suppri_panier.php");
//insertion de class personalisé selon chaque page 
     //require_once('source/class/index.class.php');

	 $clasUno=!empty($_GET['sheet'])? htmlspecialchars($_GET['sheet']):'hi';

	 $topClass='source/class/top_class/'.$clasUno.'.class.php';
     is_file($topClass)? include_once($topClass):'';


//detect browser***************************************************************************
		if(!empty($_SERVER['HTTP_USER_AGENT']))
				{
					
					$TheBS=$defaultClass_OB-> DetectBS($tams,$defaultClass_OB,$_SERVER['HTTP_USER_AGENT']);
				}
				else{
					
					$TheBS=$defaultClass_OB->DetectBS($tams,$defaultClass_OB,0);
				}
//os **************************************************************************
if(!empty($_SERVER['HTTP_USER_AGENT']))
				{
					
					$TheOS=$defaultClass_OB-> DetectOS($tams,$defaultClass_OB,$_SERVER['HTTP_USER_AGENT']);
				}
				else{
					
					$TheOS=$defaultClass_OB->DetectOS($tams,$defaultClass_OB,0);
				}
//IP+ *****************************************************************
   if(!empty($_SERVER['REMOTE_ADDR']))
				{
					
					$defaultClass_OB->InserVisite($tams,$defaultClass_OB,$_SERVER['REMOTE_ADDR'],dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],$deviceType,$TheOS,$TheBS);
				}
				else{
					
					//$defaultClass_OB->InserVisite($tams,$defaultClass_OB,0);
				}

?>