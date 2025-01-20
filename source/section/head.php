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
<a href="javascript:void(0)" class="go-top bg_1" title="Go to top">
   <i class="fa fa-angle-up"></i>
  </a>
<!--end top-->
<!--lieu pop-->
<div class="bac_pop" id="pop2">
  <div class="clipop"></div>
<div class="co_pop">
	<img src="source/img/logo/logo.png" class="gifload1"  alt=""/>
	<img src="source/img/load_2.gif" class="gifload"  alt=""/>	
</div>
</div>
<!--end lieu pop-->
<!--lieu pop-->
<div id="popnoti">
<div class="co_pop">
    <i class="clospo ion-android-cancel"></i>
  <div id="poptex">Notification</div>
</div>
</div>

</div>
<!--end pop up-->
<header>
  <div id="head" class="wow">
<!--<picture>
  <source
    srcset="source/img/background/to.webp"
    type="image/webp">

    <img src="buzut.jpg" alt="Buzut AFK IRL">
</picture>-->
<div class="headd wow zoomIn">
<div class="head after fenetre">
  <div class="logo flo_lef wid_20 pos_rel">
	   <div class="Mphone after">
		 <div class="MphMen flo_lef wid_20"><i class="fa fa-align-justify Q_show_menu"></i></div>  
		 <div class="MphLog flo_lef wid_60"><a href="index.php" ><img src="source/img/logo/logo.png" alt="Logo Facop" class="logBlan" > </a> </div>  
		 <div class="MphAva flo_rig wid_20">
			 <?php
			if(!empty($_SESSION['pseudo']))
			{
			  $avaChem=empty($_SESSION['ava'])? 'avatar/avatar.png':'avatar/user/'.$_SESSION['ava']; 
				echo '<a href="index.php?b=user.profil.user" class="topUserall col1" title="'.$_SESSION['pseudo'].'"><img src="source/img/'.$avaChem.'" alt="user photo"></a>';	
			}
			else
			{
				echo '<a href="index.php?b=loguser.login.loguser" class="accoun"><i class="ion-android-person"></i>Compte</a>';
			}
			
			?>
			 
			  </div>  
	  
	  </div>
	  <a href="index.php" >
		  <img src="source/img/logo/logo.png" alt="Logo Facop" class="logBlan" >
		  <img src="source/img/logo/logo_foot.png" alt="Logo Facop" class="logNoi hide" >
	  </a> 
	      <i class="ion-navicon-round hcate hide"></i>
            
      <i class="fa fa-align-justify Q_show_menu1 hide"></i> 
	</div>
    <div class="ulAllMenu flo_rig wid_35 after Q_hide">
      <ul class="ulmenu flo_lef wid_70 after">
		 <li><a href="index.php?b=uno.train">Formations</a> </li>
		 <li><a href="index.php?b=uno.mlm">MLM</a></li>
		 <li><a href="index.php?b=uno.faq">Aide</a></li>
		 <li class="pos_rel"><a href="index.php?b=uno.cart"><i class="ion-android-cart"></i> <span class="cabul"><?php echo compterArticles(); ?></span></a> </li>
		</ul>
		<div class="mcompt flo_rig wid_30">
			<?php
			if(!empty($_SESSION['pseudo']))
			{
			  $avaChem=empty($_SESSION['ava'])? 'avatar/avatar.png':'avatar/user/'.$_SESSION['ava']; 
				echo '<a href="index.php?b=user.profil.user" class="topUserall col1" title="'.$_SESSION['pseudo'].'"><img src="source/img/'.$avaChem.'" alt="user photo"></a>';	
			}
			else
			{
				echo '<a href="index.php?b=loguser.login.loguser" class="accoun"><i class="ion-android-person"></i>Compte</a>';
			}
			
			?>
			
		</div>
      </div>
</div>
</div>
  
 </div>
<!--phone menu-->
  <div class="Q_menu">
	  <div class="Q_logo pos_rel"><img src="source/img/logo/logo.png" alt=""><i class="fa fa-times Q_hide_menu"></i></div>
	<ul class="ulmenuPho">
		  
     <li>
		<?php
			if(!empty($_SESSION['pseudo']))
			{
			  $avaChem=empty($_SESSION['ava'])? 'avatar/avatar.png':'avatar/user/'.$_SESSION['ava']; 
				echo '<a href="index.php?b=user.profil.user" class="topUserall col1 tex_cen" title="'.$_SESSION['pseudo'].'"><img src="source/img/'.$avaChem.'" alt="user photo">'.$_SESSION['pseudo'].'</a>
				<a href="source/outu.php" class="btn_3 mar_top_20">Déconnexion</a>';	
			}
			else
			{
				echo '<a href="index.php?b=loguser.login.loguser" class="accoun"><i class="ion-android-person"></i>Compte</a>';
			}
			
			?>
		</li>
		 <li><a href="index.php"><i class="ion-android-home"></i> Accueil</a> </li>
		 <li><a href="index.php?b=uno.train"><i class="ion-android-bulb"></i> Formations</a> </li>
		 <li><a href="index.php?b=uno.mlm"><i class="ion-ios-people"></i> MLM</a></li>
		 <li class="pos_rel"><a href="index.php?b=uno.cart"><i class="ion-android-cart"></i> Panier <span class="cabul"><?php echo compterArticles(); ?></span></a> </li>
		 <li><a href="index.php?b=uno.faq"><i class="ion-help-circled"></i> Aide</a></li>
		
      <!-- <li><a href="index.php?b=uno.filter.store" class="faq" >Boutique</a> -->
      <!--  
          <ul class="ulmenu2">
            <li><a class="filter" href="index.php?b=uno.filter.store&cat=26" >Agences Immobilières </a></li>
            <li><a class="filter" href="#" >Les Fournisseurs</a>
                   <ul class="ulmenu3">
                    <li><a class="filter" href="index.php?b=uno.filter.store&cat=28" >Equipements</a></li>
                    <li><a class="filter" href="index.php?b=uno.filter.store&cat=29" >Matériaux de construction</a></li>

                  </ul>
              
            </li>
            <li><a class="filter" href="index.php?b=uno.filter.store&cat=27" >Lieux de séjours</a></li>

          </ul>-->
        
        
       <!-- </li> -->
        
		  
      </ul>
	    
	
	
	</div>
	
	<div id="group_socio" class="bs">
		<p><a href="https://www.facebook.com/facop/" title="Facop sur Facebook" class="s_f col_1" target="_blank"><i class="ion-social-facebook-outline"></i></a></p>
		<p><a href="https://twitter.com/facop" class="s_t col_1" target="_blank"><i class="ion-social-instagram-outline"></i></a></p>
		<p><a href="https://plus.google.com/115546059032071924351/posts" class="s_g col_1" target="_blank"><i class="ion-social-linkedin-outline"></i></a></p>
		<p><a href="https://www.youtube.com/channel/UCkASkvdCmvgyDU4M98NjS9A" class="s_y col_1" target="_blank"><i class="ion-social-youtube-outline"></i></a></p>
		<p><a href="https://wa.me/237676933230" class="s_jsp col_1"><i class="ion-social-whatsapp-outline"></i></a></p> 
	</div>
	
	
</header>

<!--site map-->
