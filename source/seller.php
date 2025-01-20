<title> <?php echo $title; ?></title>

<meta property="og:title" content="<?php echo $title; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
</head>

<body>
<div id="body">
<div id="header">
  <?php 
  require_once("source/section/head_seller.php");	
    
    //deconec
    if(!empty($_GET['or']) AND $_GET['or']==1)
    {
         echo '<script>
              document.getElementById("poptex").innerHTML="<h2>Commande enregistré</h2><p>Votre commande No: <span>'.$_SESSION['STORE_ORDER'].'</span> a bien été enregistré, veuillez la payer par le moyen de payement que vous avez choisi <span>'.$_SESSION['STORE_MODE2'].'</span></p> ";
              document.getElementById("popnoti").style.display="block";
              </script>';
    }
    
    
  ?>
</div><!--fin header-->
<div id="corp">
<?php 
	
echo $partie;
	
?>



</div><!--fin corp-->
<div id="footer">
  <?php 
	require_once("source/section/foot.php");	
  ?>
</div><!--fin footer-->
</div><!--fin div body-->
<!--debut du code js-->
<script type="text/javascript" src="source/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="source/js/jquery_002.js"></script>