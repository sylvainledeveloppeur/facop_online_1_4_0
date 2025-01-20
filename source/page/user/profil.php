<?php @session_start();?>
<div id="pg_user">

	
	<h1 class="h1 tex_center mar_bot_15">MON PROFIL</h1>
	<!--us-->
	  <div class="baccuser head_shado mar_auto bg_blanc">
          
          <form name="userfo" id="userfo" class="Tfom_ after wid_95 mar_auto" method="post" action="index.php?b=user.information.user">
					  
             <div class="eta_form"></div>
              <?php 
             $ava=!empty($_SESSION['ava']) ? 'source/img/avatar/user/'.$_SESSION['ava'].'':'source/img/avatar/avatar.png';
              echo '
              <div class="profimg"><img src="'. $ava.'" alt="Logo"></div>
			  
			   <a href="index.php?b=user.information.user" class="btn_3 mar_top_10 mar_auto dis_blo mar_top_20 wid_50" >Mettre à jour</a>
			   
          <div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-ios-person"></i>Pseudo: </span> '.$_SESSION['pseudo'].'</div>
          <div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-android-person"></i>Nom: </span> '.$_SESSION['nam'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-email"></i>Email: </span> '.$_SESSION['mai'].'</div>
<div class="loginpro ma_top_20 hide"><span class="spanpro"><i class="ion-transgender"></i>Sexe: </span> '.$_SESSION['sex'].'</div>
<div class="loginpro ma_top_20 hide"><span class="spanpro"><i class="ion-android-send"></i>Adress: </span> '.$_SESSION['adr'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-android-phone-portrait"></i>Téléphone: </span> '.$_SESSION['tel'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-ios-location-outline"></i>Ville: </span> '.$_SESSION['vil'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-android-calendar"></i>Naissance: </span> '.$_SESSION['datnais'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-earth"></i>Pays: </span> '.$_SESSION['pay'].'</div>
<div class="loginpro ma_top_20"><span class="spanpro"><i class="ion-android-calendar"></i>Inscription: </span> '.$_SESSION['date'].'</div>
         
       
           ';?>
         
     
			</form>
        
          
        
        </div>
  
	<!---->

	
</div>
