<div id="pg_service">

	<!--bac top-->
  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Notification</h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	

  <div class="bac_ex the_bac">
	<div class="fenetre">
	<ul class="ulpaynoti after Q_cols_2_1col">
	
         <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
        <?php 
if(!empty($_GET['n']) AND $_GET['n']==1 )
	   {


  ?>
    <li class="sucpa"> 
    <div><i class="ion-android-cloud-done"></i> <span>Felicitation</span></div>
        <p>Votre payement s'est éffectué avec success. Un email de confirmation contenant plus de details sur votre commande vient d'être envoyé à votre boite mail. Merci de nous faire confiance.</p>
    </li>
            <?php
       }
else if(!empty($_GET['n']) AND $_GET['n']==2 )
	   {


  ?> 
        <li class="echepa"> 
    <div><i class="ion-android-cancel"></i> <span>Echec</span></div>
        <p>Votre payement a échoué. Vous devez peut-être vérifier que vous avez des fonds suffissant dans votre compte . Merci de nous faire confiance.</p>
    </li>
               <?php
       }
else 
	   {


  ?>
       <li class="warpa"> 
    <div><i class="ion-android-warning"></i> <span>Erreur</span></div>
        <p>Désolé mais une erreur s'est passé pendant votre paiement. Veuillez recommencer l'opération. Merci de nous faire confiance.</p>
    </li> 
		       <?php
       }


  ?>
		
		
    </ul>
		
	  
		
    </div>
</div>
	<!---->
	 
	
</div>
