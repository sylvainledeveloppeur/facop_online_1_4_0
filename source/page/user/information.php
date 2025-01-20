<?php @session_start();?>
<div id="pg_user">

	
	<h1 class="h1 tex_center mar_bot_15">Mise à jour profil</h1>
	<!--us-->
	  <div class="baccuser head_shado mar_auto bg_blanc">
            
            <form name="userfo" id="userfo" class="Tfom_1 after wid_80 mar_auto pad_top_30" method="post" action="source/js/user_js/profil_upd.php">
					  
        
               <?php 
				
				$ava=!empty($_SESSION['ava']) ? 'source/img/avatar/user/'.$_SESSION['ava'].'':'source/img/avatar/avatar.png';
				$nam=!empty($_SESSION['nam']) ? 'value="'.$_SESSION['nam'].'"':'placeholder="Nom complet"';
				$tel=!empty($_SESSION['tel']) ? 'value="'.$_SESSION['tel'].'"':'placeholder="Téléphone"';
              $adr=!empty($_SESSION['adr']) ? 'value="'.$_SESSION['adr'].'"':'placeholder="Address"';
              $vil=!empty($_SESSION['vil']) ? 'value="'.$_SESSION['vil'].'"':' placeholder="Ville" ';
              $nais=!empty($_SESSION['datnais']) ? 'value="'.$_SESSION['datnais'].'"':' placeholder="Date de naissance" ';
              $pay=!empty($_SESSION['pay']) ? '<option value="'.$_SESSION['pay'].'">'.$_SESSION['pay'].'</option> ':' ';
              $sex=!empty($_SESSION['sex']) ? '':'<div class="insex after hide"><span><em class="nosex ion-android-checkbox-outline-blank osh0"></em><em class="oksex ion-android-checkbox osh1"></em> Homme</span>
          <span><em class="nosex ion-android-checkbox-outline-blank osf0"></em><em class="oksex ion-android-checkbox osf1"></em> Femme</span></div>';
                
                echo '
              <div class="profimg"><img id="cpimg" src="'.$ava.'" alt="Logo "><i class="ion-android-add"></i>
              <input type="file" accept="image/*" id="avafi" name="aimg"  ></div>
              <div class="eta_form"></div>
          <div class="loginp"><input type="text" name="nam" '.$nam.' required><i class="ion-android-person"></i></div>
          <div class="loginp hide"><input type="text" name="sex" value="'.$_SESSION['sex'].'" class="hide isexx" required>
          '.$sex.'
          </div>
          <div class="loginp hide"><input type="text" name="adr" '.$adr.' ><i class="ion-android-send"></i></div>
          <div class="loginp"><input type="text" name="tel" '.$tel.' required><i class="ion-ios-telephone"></i></div>
          <div class="loginp"><input type="text" name="vil" '.$vil.' required><i class="ion-ios-location"></i></div>
          <div class="loginp"><input type="date" name="nais" '.$nais.' required><i class="ion-android-calendar"></i></div>
		   <div class="loginp">
            <select name="pay"  >
			'.$pay.'
               <option value="0">- - Pays - -</option> ';
			   ?>
              <?php 
		$bloc =$tams->query('SELECT * FROM _countrys ORDER BY langFR  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '  <option value="'.$done['langFR'].'">'.$done['langFR'].'</option> ';

							  }	
		?>
              <?php echo ' </select>  
              
            <i class="ion-earth"></i></div>
          
          
         
        <input type="submit" class="btnlog bg_1" value="Mettre à jour">
           ';?>
         
       
     
			</form>
 </div>
  
	<!---->
	
</div>