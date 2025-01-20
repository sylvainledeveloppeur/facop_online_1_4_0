<title> <?php echo $title; ?></title>

<meta property="og:title" content="<?php echo $title; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
</head>

<body id="bodylog">
<div id="body">
<div id="header">
    
  <?php 
	require_once("source/section/head_logseller.php");	
  ?>
</div><!--fin header-->
<div id="corp">
<?php 
	
echo $partie;
	
?>



</div><!--fin corp-->
<div id="footer">
  <?php 
	//require_once("source/section/foot.php");	
  ?>
</div><!--fin footer-->
</div><!--fin div body-->
     <div id="goolaan" class="goolaan hide" >
                 <div id="google_translate_element">
                      <script type="text/javascript">
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'fr', includedLanguages: 'fr,en,es,pt', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
                        }
                      </script>
                      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                 </div>
             </div>
<!--debut du code js-->
<script type="text/javascript" src="source/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="source/js/jquery_002.js"></script>