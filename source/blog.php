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
	require_once("source/section/head_blog.php");	
  ?>
</div><!--fin header-->

<div id="corp">
	

<div id="pg_blog">

	<!--bac top-->
  <div class="bac_dosblog">
		<div class="fenetre">
		  <h1 class="h1dos"><?php  echo $title_array[$_GET['sheet']];?></h1>
		
      </div></div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
<!--gallery-->
	<div class="bac_gal pad_top_40 pad_bot_40 bg_blanc">
	<div class="fenetre">
	<div class="thebloc after">
		<div class="flo_lef wid_70 blogbig">
          <div class="wid_95 mar_auto">
			  
			<?php 
	
echo $partie;
	
?>
            
          </div>
        </div>
		<div class="flo_lef wid_30 bloglef">
			
			<div class="wid_70 mar_auto">
		
			  <h2 class="h2lef">Rechercher <span>.</span></h2>
				
			  <form name="rblog" id="rblog" class="after" method="post" action="index.php?b=blog.search.blog">
					<div class="flo_lef wid_75">
			<input type="search" name="wblog" id="wblog" placeholder="Rechercher...">
						 </div>
						<div class="flo_lef wid_25 pos_rel">
							<i class="fa fa-search"></i>
				<input type="submit" name="blogok" id="blogok" value="Search">
				 </div>
			</form>
			
				
			  <h2 class="h2lef pad_top_40">Catégories <span>.</span></h2>
				
				<ul class="ulcatlef">
					
					
					<?php 
										 
		   $bloc=$tams->query(" SELECT DISTINCT(name_fr_cats) FROM _category_blo RIGHT JOIN blog ON _category_blo.id_cats=blog.id_catego_arti  ORDER BY name_fr_cats ASC 
			 ");
			
			  while($done=$bloc->fetch())
			  {	
				  $nbr_pseudo1=$tams->prepare("SELECT * FROM _category_blo WHERE name_fr_cats='".$done['name_fr_cats']."'  " );
           $nbr_pseudo1->execute();
           $chif_pse1=$nbr_pseudo1->fetch();
				  //nbr
				  $num=$tams->query(" SELECT COUNT(*) n FROM blog WHERE id_catego_arti='".$chif_pse1['id_cats']."'   " );
					  $nu=$num->fetch();
/*index.php?sheet=blog_uno&model=dos&idcat='.$chif_pse1['id_cat'].'&cat='.$chif_pse1['name_cat'].'*/
					
				  echo ' <li><i class="fa fa-space-shuttle"></i> <a href="index.php?b=blog.blog.blog&cat='.$chif_pse1['id_cats'].'">'.$chif_pse1['name_fr_cats'].' ('.$nu['n'].')</a>';
			  } 
					
					?>
					
				</ul>
				
			  <h2 class="h2lef pad_top_40">Dans le blog <span>.</span></h2>
				
		 
			
			  <ul class="uldsbloglef">
				  
				  <?php 
				  $bloc=$tams->query(" SELECT * FROM blog ORDER BY RAND() LIMIT 5 ");
		  
		  while($done=$bloc->fetch())
		 		  {
              
              $mtit=$defaultClass_OB->format_url($done['titre_arti']);
                                                $murl=''.$mtit.'_'.$done['id_arti'].'_blog';
					  echo '
					 
		<li>
					<a href="'.$murl.'">
						<img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>					
						<h3>'.$done['titre_arti'].'</h3>
					</a>
				</li>';
					  
					  
				  }
				  ?>
				  
				
			
				</ul>
				
				
				
			</div>
		
		</div>
    </div>
      </div></div>
	
	
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