<div id="pg_login">

    
    <ul class="ullog2 after">
             <?php 
if(!empty($_GET['o']) AND $_GET['o']==1 )
	   {

  ?>
    <li>
        <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
      <h1 class="hh11 tex_center pad_bot_30">Mot de passe oublié</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp">Compte Vendeur</p>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/logseller_js/pass_forgot.php" >
        <div class="eta_form"></div>
<div class="loginp"><input type="email" name="mai" placeholder="Votre email" required><i class="ion-email"></i></div>
         
        <input type="submit" class="btnlog bg_1" value="Valider">
         
              <p class="crelog">Retour à la <a href="index.php?b=logseller.login.logseller">Connexion</a></p>
         
     </form>
        
      </li>
        
              <?php
       }
else if(!empty($_GET['o']) AND $_GET['o']==2 AND  !empty($_GET['t']))
	   {

  ?> 
         <li>
        <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
      <h1 class="hh11 tex_center pad_bot_30">Nouveau mot de passe</h1>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/logseller_js/pass_reset.php" >
        <div class="eta_form"></div>
<div class="loginp"><input type="password" name="pas" placeholder="Mot de passe" required><i class="ion-android-unlock"></i></div>
<div class="loginp"><input type="password" name="pas2" placeholder="Comfirmer le mot de passe" required><i class="ion-android-unlock"></i></div>
<div class="loginp hide"><input type="hidden" name="t" value="<?php echo $_GET['t'];?>" required><i class="ion-android-unlock"></i></div>
<div class="loginp hide"><input type="hidden" name="m" value="<?php echo $_GET['m'];?>" required><i class="ion-android-unlock"></i></div>
         
        <input type="submit" class="btnlog bg_1" value="Valider">
         
            <p class="crelog"><a href="index.php?b=logseller.login.logseller">Connexion</a></p>   
         
     </form>
        
      </li> 
            <?php
       } 
        
       ?> 
        
    </ul>
    
	
</div>
