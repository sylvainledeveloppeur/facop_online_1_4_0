<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">VENDRE</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
        <h2 class="s_resul">Bientôt</h2>
          <div class="after loginp">
            <div class="flo_lef wid_40"><img id="cpimg" name="aimg" src="source/img/other/house.jpg" alt=""/></div>
            <div class="flo_rig wid_40"><img id="cpimg2" class="aimg2" src="source/img/other/land.jpg"  alt=""/></div>
          </div>
<!--<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/user_js/vendre_ins_sql.php"  >-->
<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/seller_js/vendre_ins_sql"  > 
    
		  <div class="eta_form"></div>
	 <div class="loginp"><select  name="cat" ><option value="0" selected>- -Type dé vente- -</option>
         <?php $Store->categoStoUser($tams,"_category_sto"); ?>
	</select></div>
         <div class="loginp"><p class="tex_cen fon_siz_20 col1"> Photo de face (800 x 600 px) </p><input type="file" name="aimg" id="avafi" placeholder="Photo de face " ></div>
         <div class="loginp"><p class="tex_cen fon_siz_20 col1">Photo autre (800 x 600 px)</p><input type="file" name="aimg2" id="avafi2"  placeholder="Photo autre" ></div>
          <div class="loginp"><input type="text" name="tit"  placeholder="Titre " ></div>
          <div class="loginp"><input type="number" name="pri"  placeholder="Prix en $ (dollar)" ></div>
		

		<div class="loginp"><textarea name="des" placeholder="Description "></textarea></div>
		
		  <div class="loginp"><input type="submit" class="okpub" value="Publier"></div>
		
		 
	

      </form>
      
      </div>
    </div>
  </div>
	<!---->

	
</div>
