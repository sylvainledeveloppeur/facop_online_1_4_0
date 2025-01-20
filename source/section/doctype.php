<?php @session_start();
ob_start('ob_gzhandler');
$lang=isset($_SESSION['lang'])? $_SESSION['lang']:"fr";
	if(!empty($_GET['sheet']) AND $_GET['sheet']=="information")
	{
		if(empty($_SESSION['id']))
		{
			header('Location: index.php?b=login.login.login&in=1');

		}

	}
?>
<!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">
<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JDQFREY8QC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JDQFREY8QC');
</script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta chasit="utf8" />
<meta name="robots" content="index,follow" />
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

<?php 
             if(!empty($_GET['b']) AND $_GET['b']=="uno.pack0")
		{
		   echo '<link rel="stylesheet" href="https://cdn.plyr.io/2.0.15/plyr.css" />';
		}
             else
                {
                   echo '<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />';
		 
		}
?>

<link href="source/style/beestrap.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="icon" type="image/x-icon"  href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.ico">


<link rel="canonical" href="https://www.facop.training/" />

<!--direct all language link-->
<link rel="alternate" hreflang="<?php echo $lang; ?>" href="https://www.facop.training?lang=en">
	
<!--<link rel="stylesheet" type="text/css" href="source/js/slider/hi/sliderengine/amazingslider-1.css">-->
<?php 
	
	if(!empty($_SESSION['responsive']) AND $_SESSION['responsive']=="pc")
	   {
		
	}
	   else
	   {
		
echo '<link href="source/style/query.css" rel="stylesheet" type="text/css">';
		   $_SESSION['responsive']="mobile";
	}
	

	
	
	
	?>

