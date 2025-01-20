<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">PARAMETRE</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc after">
        <div class="flo_lef wid_30 mpara">
            <a href="index.php?b=seller.settings.seller_email"><i class="ion-email"></i>Modifier mon address email</a>
            <a href="index.php?b=seller.settings.seller_password"><i class="ion-android-lock"></i>Modifier mot de passe</a>
            <a href="index.php?b=seller.settings.seller_information"><i class="ion-information-circled"></i>Modifier mes informations</a>
           <!-- <a href="hhu"><i class="ion-android-globe"></i>fuseau horraire</a>-->
          
          
          </div>
        <div class="flo_lef wid_60"> 
            
           <?php 
            if(is_file("source/page/seller/".$_GET['path2'].".php"))
	   {
	    require_once("source/page/seller/".$_GET['path2'].".php");
       }
            else{echo "Page introuvable"; }
            
            ?> 
            
            
            
            
            
            
          
          
          
          </div>
      </div>
    </div>
  </div>
	<!---->

	
</div>
