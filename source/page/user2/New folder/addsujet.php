<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">AJOUTER SUJET</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
          
	<form class="fosuj after Tfom_2" method="post" action="/source/js/user_js/ins_sujet_sql.php">
		
			<div class="eta_form"></div>
          <div class="loginp"><input type="text" name="tit"  placeholder="Titre du sujet" ></div>
		
	 <div class="loginp"><select  name="cat" ><option value="0" selected>- -Sélection du Forum- -</option>
<?php
				
			$forum->ssforum($tams,"_category_for"); ?>
	</select></div>
		<div class="loginp"><textarea name="des" placeholder="Description du sujet"></textarea></div>
		
		  <div class="loginp"><input type="submit" class="okpub" value="Publier"></div>
		
		 
	

      </form>
	
	
	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
