<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">MON PROFIL</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
          
          <form name="userfo" id="userfo" class="Tfom_ after" method="post" action="index.php?b=seller.settings.seller_information">
					  
        <div class="eta_form"></div>
              <?php 
              
              $adr=!empty($_SESSION['adr']) ? 'value="'.$_SESSION['adr'].'"':' placeholder="Address" ';
              $sex=!empty($_SESSION['sex']) ? 'value="'.$_SESSION['sex'].'"':' placeholder="Sexe" ';
              $tel=!empty($_SESSION['tel']) ? 'value="'.$_SESSION['tel'].'"':' placeholder="Téléphone" ';
              $vil=!empty($_SESSION['vil']) ? 'value="'.$_SESSION['vil'].'"':' placeholder="Ville" ';
              
              echo '
              <div class="profimg"><img src="source/img/avatar/seller/'.$_SESSION['ava'].'" alt="Logo Moguez"></div>
          <div class="loginp"><input type="text" name="nam" value="'.$_SESSION['nam'].'" disabled ><i class="ion-android-person"></i></div>
          <div class="loginp"><input type="text" name="mai" value="'.$_SESSION['mai'].'" disabled ><i class="ion-email"></i></div>
          <div class="loginp"><input type="text" name="sex" '.$sex.' disabled ><i class="ion-transgender"></i></div>
          <div class="loginp"><input type="text" name="adr" '.$adr.' disabled ><i class="ion-android-send"></i></div>
          <div class="loginp"><input type="text" name="tel" '.$tel.' disabled ><i class="ion-ios-telephone"></i></div>
          <div class="loginp"><input type="text" name="vil" '.$vil.' disabled ><i class="ion-ios-location"></i></div>
          <div class="loginp"><input type="text" name="pay" value="'.$_SESSION['pay'].'" disabled ><i class="ion-ios-world"></i></div>
          <div class="loginp"><input type="text" name="date" value="Incription: '.$BClas->goodate($_SESSION['date'],'Le','à').'" disabled ><i class="ion-wand"></i></div>
         
        <input type="submit" class="btnlog bg_1" value="Mettre à jour">
           ';?>
         
     
			</form>
        
          
        
        </div>
    </div>
  </div>
	<!---->

	
</div>
