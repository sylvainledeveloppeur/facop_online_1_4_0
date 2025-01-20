<div class="bac_map">
<div class="fenetre">
	<div class="sitemap_head"><?php echo mot($index,44);// Here you are ?> : <a href="index.php">Home</a>    
	 <?php 
	 
	 if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi')
	 { 
		 /*page de 2ème niveau si existante*/
		 if(!empty($_GET['sitemap2']))
			 { 
				 if(array_key_exists($_GET['sitemap2'],$title_array))
					 { 
						 echo '<i class="fa fa-angle-right mar_rig_8 mar_lef_8"></i>
						 <a href="index.php?model=uno&sheet='.$title_array[$_GET['sitemap2']].'" >';
						
					 echo $title_array[$_GET['sitemap2']];
					     
					 echo "</a>";
					 
					 }
				 else
					  { 
						 echo '<i class="fa fa-angle-right mar_rig_8 mar_lef_8"></i>';
						 echo "FALSE SITE MAP 2";
					 }
			 }
		 
		 /*2 ou 3 ème niveau*/
		 
		   if(array_key_exists($_GET['sheet'],$title_array))
			 { 
			     echo '<i class="fa fa-angle-right mar_rig_8 mar_lef_8"></i>';
				 echo $title_array[$_GET['sheet']];
			 }
		 else
			  { 
			     echo '<i class="fa fa-angle-right mar_rig_8 mar_lef_8"></i>';
				 echo "FALSE SITE MAP";
			 }
	 }
	 ?>
	</div>
	</div>
</div>