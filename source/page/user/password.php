 <?php @session_start();?>
<div id="pg_user">

	
	<h1 class="h1 tex_center mar_bot_15">Modifier mot de passe</h1>
	<!--us-->
	  <div class="baccuser head_shado mar_auto bg_blanc">
            
          
            
             <form name="userfo" id="userfo" class="Tfom_1 after bg_bla pad_top_30" method="post" action="source/js/user_js/pass_upd.php">
					  
        <div class="eta_form tex_cen wid_80 mar_auto mar_bot_15"></div>
          <div class="loginp"><input type="password" name="pas" placeholder="Mot de passe actuel" required><i class="ion-android-unlock"></i></div>
          <div class="loginp"><input type="password" name="pas2" placeholder="Nouveau mot de passe" required><i class="ion-android-unlock"></i></div>
          <div class="loginp"><input type="password" name="pas3" placeholder="Comfirmer nouveau mot de passe" required><i class="ion-android-unlock"></i></div>
         
        <input type="submit" class="btnlog bg_1" value="Mettre à jour">
         
         
     
			</form>
 </div>
  
	<!---->

	
</div>