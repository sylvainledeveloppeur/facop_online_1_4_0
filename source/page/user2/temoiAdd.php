<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">AJOUTER UN TEMOIGNAGE</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
          <p class="s_resul">Dites-nous ce que vous resentez</p>
	<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/user_js/ins_temoi_sql.php">
		
			<div class="eta_form"></div>
		
		<div class="loginp"><textarea name="des" placeholder="Votre message"></textarea></div>
		
		  <div class="loginp"><input type="submit" class="okpub" value="Publier"></div>
		
		 
	

      </form>
	
	
	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
