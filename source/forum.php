<title> <?php echo $title; ?></title>

<meta property="og:title" content="<?php echo $title; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
</head>

<body >
<div id="body">
<div id="header">
  <?php 
	require_once("source/section/head_forum.php");	
  ?>
</div><!--fin header-->
<div id="corp">
    
    <div id="pg_service">
	
	<!--bac top-->
  <div class="bac_dos2">
		<div class="fenetre">
			
	      <div class="divser divser2">
			  
		  <p>Bienvenue dans notre Forum</p>
	  <form class="foser after" method="post" action="index.php?b=forum.search_forum.forum">
		  <input type="text" class="woser flo_lef wid_88" placeholder="Rechercher: Sujet; forum..." name="search_word">
		  <div class="bouser flo_lef wid_10 pos_rel"><i class="fa fa-search"></i><input type="submit" class="goser"></div>
      </form>
		
          </div>
		
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
        
<?php 
	
echo $partie;
	
?>

		<!--forum-->
	
  <div class="bac_se">
	<div class="fenetre">
	  <div class="thefoo after">
	    <h2 class="h22">Dans le forum</h2>
	   
		  <ul class="ulfoo after Q_cols_2_1col">
			  
			  	    <?php 
	
	$forum->danfo($tams,3);
	
	?>
		  
		  </ul>
      </div>
    </div>  
		  
		  
		  
      </div>
  </div>
	<!---->
	
</div>

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