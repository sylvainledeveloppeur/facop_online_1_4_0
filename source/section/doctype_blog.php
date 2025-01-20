<?php @session_start();
ob_start('ob_gzhandler');
$lang=isset($_SESSION['lang'])? $_SESSION['lang']:"fr";
	if(!empty($_GET['model']) AND $_GET['model']=="user")
	{
		if(empty($_SESSION['id']))
		{
			header('Location: index.php');

		}

	}
?>
<!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta chasit="utf8" />
<meta name="robots" content="index,follow" />
    <?php if(!empty($_GET['id'])){
     $nbr_pseudo=$tams->prepare("SELECT COUNT(id_arti) nbr FROM blog
                                 WHERE id_arti=:pse  " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$_GET['id']));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {
                                   $thearti=1;
                                     $bloc=$tams->query(" SELECT * FROM blog WHERE id_arti='".$_GET['id']."' ");

                                            while($done=$bloc->fetch())
                                            {
                                                $mtit=$defaultClass_OB->format_url($done['titre_arti']);
                                                $murl='https://www.facop.training/'.$mtit.'_'.$_GET['id'].'_blog';
                                                $done['motcle_arti']=str_replace("</li><li>",", ",$done['motcle_arti']);
                                                $done['motcle_arti']=str_replace("<li>","",$done['motcle_arti']);
                                                $done['motcle_arti']=str_replace("</li>","",$done['motcle_arti']);
                                                
echo '<meta property="og:type" content="website">
<meta property="og:title" content="'.$done['titre_arti'].'" />
<meta property="og:url" content="'.$murl.'">
<meta property="og:site_name" content="facop online" />
<meta property="og:image" itemprop="image" content="https://www.facop.training/source/img/blog/'.$done['img_arti'].'">
<meta property="og:description" content="'.$done['titre_arti'].'" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@facoponline" />
<meta name="twitter:title" content="'.$done['titre_arti'].'" />
<meta name="twitter:image" content="https://www.facop.training/source/img/blog/'.$done['img_arti'].'" />
<meta name="twitter:description" content="'.$done['titre_arti'].'" />

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta name="description" content="'.$done['motcle_arti'].'"/>

<link rel="icon" href="https://www.facop.training/source/img/logo/logo-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.facop.training/source/img/logo/logo-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://www.facop.training/source/img/logo/logo-180x180.png" />
<meta name="msapplication-TileImage" content="https://www.facop.training/source/img/logo/logo-270x270.png" /> ';
                                            }
                                }
                            else
                               {
                                 $thearti=0;  
                               }
    
    
    
    
    
    
}else{?>
<meta property="og:type" content="website">
<meta property="og:title" content="FACOP ONLINE: Formation en entrepreneuriat et leadership en ligne" />
<meta property="og:url" content="https://www.facop.training/">
<meta property="og:site_name" content="facop online " />
<meta property="og:image" itemprop="image" content="https://www.facop.training/source/img/logo/logo-270x270.png">
<meta property="og:description" content="FACOP ONLINE: Formation en entrepreneuriat et leadership en ligne" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@facoponline" />
<meta name="twitter:title" content="FACOP ONLINE: Formation en entrepreneuriat et leadership en ligne" />
<meta name="twitter:image" content="https://www.facop.training/source/img/logo/logo-270x270.png" />
<meta name="twitter:description" content="FACOP ONLINE: Formation en entrepreneuriat et leadership en ligne" />

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta name="description" content="FACOP ONLINE: Formation en entrepreneuriat et leadership en ligne"/>

<link rel="icon" href="https://www.facop.training/source/img/logo/logo-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.facop.training/source/img/logo/logo-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://www.facop.training/source/img/logo/logo-180x180.png" />
<meta name="msapplication-TileImage" content="https://www.facop.training/source/img/logo/logo-270x270.png" />


<!--<link rel="stylesheet" href="style/bootstrap/bootstrap.min.css">-->
<link rel="stylesheet" href="source/style/font/font-awesome-4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="source/style/font/ionicons-2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="source/style/font/capicon/font/style.css">
<link rel="stylesheet" href="source/style/font/typicons.font-2.0.7/font/typicons.min.css">
<link rel="stylesheet" href="source/style/animate/anicollection.css">
<link rel="stylesheet" href="source/style/animate/animate.css">
<link rel="stylesheet" href="source/style/framework/hover.css">
<link rel="stylesheet" href="source/style/framework/normalize.css">
<link href="source/js/slider/splide/splide.min.css" rel="stylesheet" type="text/css">
  <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.plyr.io/2.0.15/plyr.css">
<link href="source/style/beestrap.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="icon" type="image/x-icon"  href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.ico">


<link rel="canonical" href="https://www.facop.training/" />

<!--direct all language link-->
<link rel="alternate" hreflang="<?php echo $lang; ?>" href="https://www.facop.training?lang=en">
<!--<link rel="stylesheet" type="text/css" href="source/js/slider/home/sliderengine/amazingslider-1.css">-->
<?php 
	
	if(!empty($_SESSION['responsive']) AND $_SESSION['responsive']=="pc")
	   {
		
	}
	   else
	   {
		
echo '<link href="source/style/query.css" rel="stylesheet" type="text/css">';
		   $_SESSION['responsive']="mobile";
	}
	

	
	
}
	?>
<!--<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=607f2c72c8c11300183050ed&product=inline-share-buttons" async="async"></script>-->
