
<meta property="og:title" content="<?php echo $title;  ?>">
<meta name="keywords" content="<?php echo $keywords; echo $title_end; ?>">
<meta name="description" content="<?php echo $keywords; echo $title_end; ?>">
<meta name="author" content="<?php echo $author; ?>">

<title> <?php echo $title; echo $title_end; ?></title>
</head>

<body>
<div id="body">
<div id="header">
  <?php 
	require_once("source/section/head.php");	
  ?>
</div><!--fin header-->
<div id="corp">
<?php 
	
echo $partie;
	
?>



</div><!--fin corp-->
<div id="footer"><?php 
	require_once("source/section/foot.php");	
  ?>
</div><!--fin footer-->
</div><!--fin div body-->
<!--debut du code js-->
<script type="text/javascript" src="source/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="source/js/jquery.form.min.js"></script>
<script type="text/javascript" src="source/js/scroll_animate.js"></script>
<!--<script type="text/javascript" src="source/js/jquery.color.min.js"></script>-->
