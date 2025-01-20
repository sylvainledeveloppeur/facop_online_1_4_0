<div id="pg_login">

    
    <ul class="ullog after Q_cols_2_1col">
       <li class="loimglef loimglef2 bg_ble lsv">
         <div class=" wid_70 mar_auto">
			  <div class=" tex_cen mar_top_40 mar_bot_20">  
	            <img src="source/img/background/lsv.jpg" class="gifload1f"  alt=""/>
		      </div>
			 <div class="">
        <h2 class="col_bla tex_cen">Le saviez-vous!</h2>			 
        <p class="tex_cen">Facop vous permet de voir... Facop vous permet de voir... Facop vous permet de voir... Facop vous permet de voir...Facop vous permet de voir...</p>
		      </div>
		   </div>
       </li>
		<?php 
		if(empty($_GET['cu']) AND empty($_GET['cm']))
		{
			if(!empty($_GET['parrain']))
				$vapar='value="'.htmlspecialchars($_GET['parrain']).'"';
			else
				$vapar="";
		?>
    <li class="bg_bla">
        
      <h1 class="hh11 tex_center pad_bot_30 mar_top_40">Créer un compte</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp hide">Compte Client</p>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/loguser_js/signup.php" >
        <div class="eta_form tex_cen mar_auto wid_90"></div>
          <div class="loginp pos_rel"><input type="text" name="nam" placeholder="Pseudo" required><i class="ion-android-person"></i></div>
          <div class="loginp pos_rel"><input type="email" name="mai" placeholder="Email" required><i class="ion-email"></i></div>
          <div class="loginp pos_rel"><input type="password" name="pas" placeholder="Mot de passe" required><i class="ion-android-unlock"></i></div>
          <div class="loginp pos_rel"><input type="text" name="par" placeholder="Pseudo du parrain (optionnel)" <?php echo $vapar; ?> ><i class="ion-android-people"></i></div>
          <div class="loginp pos_rel hide"><input type="number" name="tel" placeholder="Téléphone" ><i class="ion-ios-telephone"></i></div>
          <div class="loginp pos_rel hide">
            <select name="pay"  >
               <option value="0">- - Pays - -</option> 
              <?php 
		/*$bloc =$tams->query('SELECT * FROM _countrys ORDER BY langFR  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '  <option value="'.$done['langFR'].'">'.$done['langFR'].'</option> ';

							  }	*/
		?>
              </select>  
              
            <i class="ion-ios-location"></i></div>
         
       <p class="logfog"> <span class="okcgu"> <input name="cgu" type="checkbox"> J'accepte <a href="index.php?b=uno.cgu" style="float: none;">les conditions d'utilisations</a></span></p>
         
        <input type="submit" class="btnlog bg_1" value="Inscription">
         
        <p class="crelog">Déjà inscrit? <a href="index.php?b=loguser.login.loguser" style="float: none;">Connexion</a></p>
         
     </form>
          <!-- google_translate_element -->
          <div id="goolaan" class="goolaan" >
                 <div id="google_translate_element">
                  
                 </div>
             </div>
      </li>
			<?php 
		}
		else
		{
			$cu=htmlspecialchars($_GET['cu']);
			$cm=htmlspecialchars($_GET['cm']);
			$BClas->showInfo('<h2>Felicitation</h2><p>Veuillez confirmer votre address email. Entre le code ou cliquez sur le lien contenu dans le message que nous venons de vous envoyer à votre boite email ci-après <span>'.$cm.'</span>. Verifier aussi le dossier <span>spam</span></p> ');
		?>
    <li class="bg_bla">
        
      <h1 class="hh11 tex_center pad_bot_30 mar_top_40">Validation email</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp hide">Compte Client</p>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/loguser_js/signup_code.1.0.php" >
        <div class="eta_form"></div>
          <div class="loginp"><input type="number" name="code" placeholder="Code" required ><i class="ion-android-unlock"></i></div>
          <div class="loginp hide"><input type="text" name="pse" value="<?php echo $cu; ?>" ><i class="ion-ios-telephone"></i></div>
          <div class="loginp hide"><input type="text" name="mai" value="<?php echo $cm; ?>" ><i class="ion-ios-telephone"></i></div>
      
         
        <input type="submit" class="btnlog bg_1" value="Valider">
         
        <p class="crelog">Terminé? <a href="index.php?b=loguser.login.loguser"  hide>Connexion</a></p>
         
     </form>
          <!-- google_translate_element -->
          <div id="goolaan" class="goolaan" >
                 <div id="google_translate_element">
                  
                 </div>
             </div>
      </li>
			<?php 
		}
		?>
    </ul>
    
	
</div>
