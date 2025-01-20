<div id="pg_login">

    <ul class="ulcomp after"><li><a href="index.php?b=loguser.signup.loguser">Compte client</a></li> <li><a href="index.php?b=logseller.signup.logseller" >Compte vendeur</a></li> <li><a href="#" class="bg_1">Compte partenaire</a></li>   </ul>
    
    <ul class="ullog after Q_cols_2_1col">
       <li class="loimglef loimglef2">
           
       </li>
    <li>
        <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
      <h1 class="hh11 tex_center pad_bot_30">Créer un compte</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp">Compte Partenaire</p>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/logpatner_js/signup.php" >
        <div class="eta_form"></div>
          <div class="loginp"><input type="text" name="nam" placeholder="Nom complet" required><i class="ion-android-person"></i></div>
          <div class="loginp"><input type="email" name="mai" placeholder="Email" required><i class="ion-email"></i></div>
          <div class="loginp"><input type="password" name="pas" placeholder="Mot de passe" required><i class="ion-android-unlock"></i></div>
          <div class="loginp"><input type="number" name="tel" placeholder="Téléphone" required><i class="ion-ios-telephone"></i></div>
          <div class="loginp">
            <select name="pay"  required>
                <option value="0">- - Pays - -</option> 
              <?php 
		$bloc =$tams->query('SELECT * FROM _countrys ORDER BY langFR  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '  <option value="'.$done['langFR'].'">'.$done['langFR'].'</option> ';

							  }	
		?>
              </select>  
              
            <i class="ion-ios-location"></i></div>
         
       <p class="logfog"> <span class="okcgu"> <input name="cgu" type="checkbox"> J'accepte <a href="index.php?b=uno.cgu">les conditions d'utilisations</a></span></p>
         
        <input type="submit" class="btnlog bg_1" value="Inscription">
         
        <p class="crelog">Déjà inscrit ? <a href="index.php?b=logpatner.login.logpatner">Connexion</a></p>
         
     </form>
        
      </li>
    </ul>
    
	
</div>
