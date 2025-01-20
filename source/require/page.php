<?php 
//---------------------inclusion de page-----------------------------------------------------------------------------

if(!empty($_GET['sheet']) AND !empty($_GET['model']) )
{
	$_GET['sheet']=htmlspecialchars($_GET['sheet']);
	$_GET['model']=htmlspecialchars($_GET['model']);
	
		if(!empty($_GET['path'])  )
		{
			$_GET['folderpage']=htmlspecialchars($_GET['path']);
			$_GET['folderpage']=str_replace('.','/',$_GET['folderpage']);
		}
}
else
{
	$_GET['sheet']="hi";//accueil
	$_GET['model']="uno";//template model	
}
//------
		 $page=!empty($_GET['folderpage'])? 'source/page/'.$_GET['folderpage'].'/'.$_GET['sheet'].'.php':'source/page/'.$_GET['sheet'].'.php';
	     $model='source/'.$_GET['model'].'.php';

	     $topCss='source/style/top_css/topCss_'.$_GET['sheet'].'.php';
	     $footJs='source/js/foot_js/footJs_'.$_GET['sheet'].'.js';
	     $footPhpJs='source/js/foot_php_js/footPhpJs_'.$_GET['sheet'].'.php';
	
	 
	
		  if(is_file($page))//existence de la page
		  {

				  if(is_file($model))//existence du model de la page
				  {

					 ob_start();

				     require_once($page); 

					 $partie = str_replace("\r\n",'',trim(ob_get_clean()));
					  
					  is_file($topCss)? include_once($topCss):'';//inclu styl css pr page personaliser
					  require_once($model);//inclure le model de page qui inclura la page
				 echo is_file($footJs)? '<script src="'.$footJs.'"></script>':'';//inclu script js pr page personaliser
					  is_file($footPhpJs)? include_once($footPhpJs):'';//inclu js en php pr page personaliser
					  include_once('source/section/end.php');//inclu fin page /body

				  } 
				  else
				  {
					  echo '<div class="stop_form">Page model not found...</div>';
				  }
			  
		  } 
		  else
		  {
			  echo '<div class="stop_form">Page not found...</div>';
		  }
//fin inclusion de page ---------------------------------------------------------------------------
