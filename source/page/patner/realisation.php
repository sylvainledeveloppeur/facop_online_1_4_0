<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">AJOUTER REALISATION</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
        <h2 class="s_resul fon_siz_20">Veuillez ajouter vos réalisation en remplissant le formulaire ci-dessous.  </h2>
          
<!--<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/user_js/vendre_ins_sql.php"  >-->
<form id="resfo" class="fosuj after Tfom_2 mar_top_15" method="post" action="/source/js/patner_js/realisation_ins_sql"  > 
    
		  <div class="eta_form"></div>
         <div class="loginp"><p class="tex_cen fon_siz_20 col1">Photo de la réalisation(479 x 300) </p><input type="file" name="aimg" placeholder="Photo de face " ></div>
         <div class="loginp"><input type="text" name="des" placeholder="Description de la réalistion" ></div> 
         <div class="loginp"><input type="text" name="dur" placeholder="durée de la réalistion" ></div> 
      
		
		  <div class="loginp"><input type="submit" class="okpub" value="Enregistrer"></div>
		
		 
	

      </form>
      
      </div>
    </div>
  </div>
	<!---->

	
</div>
