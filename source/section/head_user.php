<div class="paratil">
<noscript><!--activ javascript-->
 </p>To access all the features of this website, you must enable JavaScript.
 Here are the instructions  
	<a href="http://www.enable-javascript.com/fr/" target="_blank">to enable JavaScript</a> in your web browser.
 </p>
</noscript>
<!--[if lt IE 10]>
 <p>
   Vous utilisez un navigateur obsolète, veuillez le <a href="https://browser-update.org/update.html">mettre à jour</a>.
 </p>
    
<![endif]-->
<div id="page-preloader" class="preloader-loaded preloader-loaded">
	<div class="page-preloader-spin"></div>
</div>
<!--notification-->
<div class="hide eta_notifie"> notiification js</div>

<div id="barcookie" class="col1 Q_wid_100">
	<!--cookie-->
  <div class="pad_top_15 pad_bot_15 tex_center bg_bla">
       Nous utilisons des cookies sur notre site Web pour améliorer votre expérience utilisateur. En utilisant ce site, vous acceptez l'utilisation de cookies 
	  <a href="index.php?b=uno.policy">En savoir plus</a>.
     <i class="okcookie btn_1">Accept</i>
  </div>
</div>
<!--end-->
<!--on click scroll top-->
<a href="javascript:void(0)" class="go-top bg_beetech" title="Go to top">
   <i class="fa fa-angle-up"></i>
  </a>
<!--end top-->
<div class="bac_pop" id="pop2">
  <div class="clipop"></div>
<div class="co_pop">
	<img src="source/img/logo/logo.png" class="gifload1"  alt=""/>
	<img src="source/img/load_2.gif" class="gifload"  alt=""/>	
	<!--lieu pop-->
	
	
</div>
</div>
<!--end lieu pop-->
<!--lieu pop noti-->
<div id="popnoti">
<div class="co_pop">
    <i class="clospo ion-android-cancel"></i>
  <div id="poptex">Notification</div>
</div>
</div>

</div>
<!--end pop up-->
<header>
  <div id="head" class="wow head_shado">

    <div class="headfor bg_blanc"> 
        
           <div class="fenetre after userheadphon"> 
               <ul>
				   <li  class="uhpmenu Q_show_menu"><a href="#"><i class="ion-android-apps"></i></a></li>
               <li class="uhplogo"><a href="index.php"><img src="source/img/logo/logo.png" alt="Logo" ></a> </li>
               
                <li  class="uhpava"><a href="#" class="col1"><?php $ava=!empty($_SESSION['ava']) ? 'source/img/avatar/user/'.$_SESSION['ava'].'':'source/img/avatar/avatar.png'; echo '<img src="'.$ava.'" alt="Logo "></a>';?>
                    
                   <ul class="ulsoumeuser after">
                   <li><a href="index.php?b=user.profil.user"><i class="ion-person"></i> PROFIL</a></li>
                   <li><a href="source/outu.php"><i class="ion-log-out"></i> DECONNEXION</a></li>
                </ul>
                    </li>
               
               
               </ul>
      </div><!--END HEAD PHOHE-->
      <div class="fenetre after  userheaddek"> 
        <div class=" after">
          <div class="logofor flo_lef wid_30"><a href="index.php"><img src="source/img/logo/logo.png" alt="Logo Moguez" ></a> </div>
            
            <ul class="ulmeuser flo_lef wid_30 after">
             <!--<li><a href="#"><i class="ion-android-apps"></i>MENU CLIENT</a>
                
                 <ul class="ulsoumeuser after">
                     
                   <li><a href="index.php?b=uno.filter.store"><i class="ion-android-playstore"></i>NOS OFFRES</a></li>
                   <li><a href="index.php?b=user.deviAdd.user"><i class="ion-ios-plus"></i>DEMANDER UN DEVIS</a></li>
                   <li><a href="index.php?b=user.achat.user"><i class="ion-bag"></i>MES ACHATS</a></li>
                   <li><a href="index.php?b=user.mesdevi.user"><i class="ion-android-compass"></i>MES DEVIS</a></li>
                   <li><a href="index.php?b=user.temoiAdd.user"><i class="ion-android-textsms"></i>AJOUT TEMOIGNAGE</a></li>
                   <li><a href="index.php?b=user.temoi.user"><i class="ion-android-textsms"></i>MES TEMOIGNAGES</a></li>
                </ul>
                
                </li>
           <li><a href="index.php?b=user.vendre.user"><i class="ion-cash"></i>VENDEUR</a>
                
                 <ul class="ulsoumeuser after">
                   <li><a href="index.php?b=user.vendre.user"><i class="ion-ios-heart-outline"></i>VENDRE</a></li>
                   <li><a href="index.php?b=user.mesarticle.user"><i class="ion-android-textsms"></i>MES ARTICLES</a></li>
                </ul>
                
                </li>-->
            </ul>
            
            <ul class="ulmeuser2 flo_rig wid_40 after">
            <li><a href="index.php?b=user.profil.user" class="col1"><?php echo '<img src="'.$ava.'" alt="Logo "><span>'.$_SESSION['pseudo'].'</span></a>';?></li>
            <li><a href="index.php?b=user.information.user" class=""> <i class="ion-android-settings"></i>Parametre</a></li>
            <li><a href="source/outu.php"><i class="ion-log-out"></i></a></li>
            </ul>
        </div>
      </div><!--end head deskt-->
    </div>
 </div>
<!--phone menu-->
</header>

<!--phone menu-->
  <div class="Q_menu">
	  <div class="Q_logo pos_rel">
		  	
		  <i class="fa fa-times Q_hide_menu"></i></div>
	<ul class="ulmenuPho">
		  
     <li>
	<?php
			$avaChem=empty($_SESSION['ava'])? 'avatar/avatar.png':'avatar/user/'.$_SESSION['ava']; 
				echo '<a href="index.php?b=user.profil.user" class="topUserall col1 tex_cen" title="'.$_SESSION['pseudo'].'"><img src="source/img/'.$avaChem.'" alt="user photo"><span>'.$_SESSION['pseudo'].'</span></a>';
			
			?>
		</li>
	<li><a href="index.php"><i class="ion-home"></i>Accueil</a></li>
		<li><a href="index.php?b=user.profil.user"><i class="ion-android-person"></i>Profil</a></li>
		<li><a href="index.php?b=user.password.user"><i class="ion-arrow-expand"></i>Mot de passe</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=user.notifi.user"><i class="ion-ios-bell"></i>Notification</a></li>
		<li><a href="index.php?b=user.bonus.user"><i class="ion-lightbulb"></i>Bonus</a></li>
		<li><a href="index.php?b=user.retrait.user"><i class="ion-reply-all"></i>Retrait</a></li>
		<li><a href="index.php?b=user.parrain.user"><i class="ion-android-person-add"></i>Parrain</a></li>
		<li><a href="index.php?b=user.filleul.user"><i class="ion-android-people"></i>Filleul</a></li>
		<li><a href="index.php?b=user.lien.user"><i class="ion-link"></i>Mon lien</a></li>
		<li><a href="index.php?b=user.tree.user"><i class="ion-ios-flower"></i>Mon arbre</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=user.cours.user"><i class="ion-filing"></i>Mes cours</a></li>
		<li><a href="index.php?b=user.certificat.user"><i class="ion-document-text"></i>Certification</a></li>
		<li><a href="index.php?b=user.book.user"><i class="ion-ios-book"></i>Mes livres</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=uno.faq"><i class="ion-help-circled"></i>Aide</a></li>
		<li><a href="source/outu.php" class="btn_uout"><i class="ion-log-out"></i>Déconnexion</a></li>
        
		  
      </ul>
	    
	
	
	</div>
<!--site map-->
