  <h2 class="s_resul">Modifier mes informations</h2>
          
          
            
            <form name="userfo" id="userfo" class="Tfom_1 after" method="post" action="source/js/seller_js/profil_upd.php">
					  
        
               <?php 
              $adr=!empty($_SESSION['adr']) ? 'value="'.$_SESSION['adr'].'"':'placeholder="Address"';
              $tel=!empty($_SESSION['tel']) ? 'value="'.$_SESSION['tel'].'"':' placeholder="Téléphone" ';
              $vil=!empty($_SESSION['vil']) ? 'value="'.$_SESSION['vil'].'"':' placeholder="Ville" ';
              $sex=!empty($_SESSION['sex']) ? '':'<div class="insex after"><span><em class="nosex ion-android-checkbox-outline-blank osh0"></em><em class="oksex ion-android-checkbox osh1"></em> Homme</span>
          <span><em class="nosex ion-android-checkbox-outline-blank osf0"></em><em class="oksex ion-android-checkbox osf1"></em> Femme</span></div>';
                
                echo '
              <div class="profimg"><img id="cpimg" src="source/img/avatar/seller/'.$_SESSION['ava'].'" alt="Logo "><i class="ion-android-add"></i>
              <input type="file" accept="image/*" id="avafi" name="aimg"  ></div>
              <div class="eta_form"></div>
          <div class="loginp"><input type="text" name="nam" value="'.$_SESSION['nam'].'" required><i class="ion-android-person"></i></div>
          <div class="loginp"><input type="text" name="sex" value="'.$_SESSION['sex'].'" class="hide isexx" required>
          '.$sex.'
          </div>
          <div class="loginp"><input type="text" name="adr" '.$adr.' required><i class="ion-android-send"></i></div>
          <div class="loginp"><input type="text" name="tel" '.$tel.' required><i class="ion-ios-telephone"></i></div>
          <div class="loginp"><input type="text" name="vil" '.$vil.' required><i class="ion-ios-location"></i></div>
          
          
         
        <input type="submit" class="btnlog bg_1" value="Mettre à jour">
           ';?>
         
       
     
			</form>
        
        
   