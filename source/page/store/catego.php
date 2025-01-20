<div id="pg_store">

	<!--bac top-->
	  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Les catégories </h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	
	<!--us-->
  <div class="bac_ex">
	<div class="fenetre">
	  
		<?php $Store->categoPG($tams,$defaultClass_OB); ?>  
		
		
    </div>
  </div>
	<!---->
 


	
</div>
