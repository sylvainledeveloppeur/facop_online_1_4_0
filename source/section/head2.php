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
<div id="barcookie" class="col_beetech">
	<!--cookie-->
  <div class="pad_top_5 pad_bot_8 tex_center">
  <!--We use cookies that are necessary for the website to function properly, that provide content from third parties, that collect usage statistics to optimize site functionality, and that deliver marketing content based on your preferences. By using this website, you agree to the use of cookies. Learn more-->
  We use cookies to improve your experience. By clicking OK, you allow us such use.
  
     <i class="okcookie ion-android-cance bg_beetech">Ok</i>
  </div>
</div>
<!--end-->
<!--on click scroll top-->
<a href="javascript:void(0)" class="go-top bg_beetech" title="Go to top">
   <i class="fa fa-angle-up"></i>
  </a>
<!--end top-->
<!--lieu pop-->
<div class="bac_pop" id="pop2">
  <div class="clipop"></div>
<div class="co_pop">
	<img src="source/img/logo/logo_load.png" class="gifload1"  alt=""/>
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
  <div id="head" class="wow head_shado">
<!--<picture>
  <source
    srcset="source/img/background/to.webp"
    type="image/webp">

    <img src="buzut.jpg" alt="Buzut AFK IRL">
</picture>-->
<div class="headd">
  <div class="head after fenetre">
    <div class="logo flo_lef wid_30 pos_rel"><a href="index.php"><img src="source/img/logo/logo.png" alt="Logo Moguez" ></a> <i class="ion-navicon-round hcate hide"></i><i class="fa fa-align-justify Q_show_menu"></i> </div>
    <form  method="post" class="fsearch flo_lef wid_50" action="index.php?sheet=search&model=uno&path=store"  >
      <div class="sgroup1"> 
        <input type="search" class="search" name="s" value="" placeholder="Rechercher..." autocomplete="off">
        </div>
      <div class="sgroup2 pos_rel"> <p class="incat">Catégories <i class="ion-android-arrow-dropdown"></i></p>
        <select name="typ_search" id="es_product_cat" class="categories">
          <option value="">Catégories</option>
          <option class="level-0" value="livre">Livre</option>
          <option class="level-0" value="texte">Texte de lois</option>
          </select>
        </div>
      <div class="sgroup3"> 
        <button type="submit" class="search-btn bg_1"></button> 
        </div>
      </form>
    <ul class="ctac flo_lef wid_20 after">
      
        <?php if(!empty($_SESSION['ava']) ) {echo '<li><a href="index.php?b=user.profil.user" class="bulbig col1"><img src="source/img/avatar/'.$_SESSION['ava'].'" alt="Logo "></a></li>';}
             else{  echo ' <li><a href="index.php?b=login.login.login" class="bulbig"><i class="ion-android-person"></i></a></li>'; }?>
      <li><a href="#" class="bulbig"><i class="ion-ios-heart-outline"></i><i class="bulnb bg_1">12</i></a></li>
      <li><a href="index.php?b=uno.cart.store" class="bulbig"><i class="ion-ios-cart"></i><i class="bulnb bg_1"><?php echo compterArticles(); ?></i></a></li>
      </ul>
  </div>
</div>
    <div class="linered"> 
      <div class="fenetre after"> 
        <div class="menul flo_lef wid_20 pos_rel"><p class="bcat"><i class="fa fa-align-justify scate"></i> Catégories </p><a href="index.php?b=uno.catego.store">Tous</a>
		
              <?php $Store->catego($tams,$defaultClass_OB,$_GET['sheet']); ?>
              
        
		  </div>
	    <div class="menur flo_rig wid_30">
		  <nav> <ul class="ulmenu after">
			  <li><a href="index.php">ACCUEIL</a><i class=""></i></li>
			  <li><a href="index.php?b=blog.blog.blog">BLOG</a><i class=""></i></li>
			  <li><a href="index.php?b=forum.forum.forum">FORUM</a><i class=""></i></li>
			  	</ul></nav>
		  
		  </div>
        <div class="menua flo_rig wid_30">
		  <ul class="ulapp after">
			  <li><a href="index.php?b=user.vendre.user"><i class="ion-happy-outline"></i>Devenir Vendeur</a></li>
			  <li><a href="indeyx.php?sheet=us&model=uno"><i class="ion-iphone"></i>Appli Mobile</a></li>
	  	  </ul>
		  
		  </div>
      </div>
    </div>
 </div>
<!--phone menu-->
  <div class="Q_menu">
	  <div class="Q_logo pos_rel"><img src="source/img/logo/logo.png" alt=""><i class="fa fa-times Q_hide_menu"></i></div>
	<ul class="">
			  <li><a href="index.php">HOME</a><i class=""></i></li>
			  <li><a href="index.php?sheet=us&model=uno">A PROPOS</a><i class=""></i></li>
			  <li><a href="index.php?sheet=us&model=uno#service">SERVICE</a><i class=""></i></li>
			  <li class="pos_rel">
			    <div class="nbrp"><?php echo compterArticles(); ?></div>
		      <a href="index.php?sheet=cart&model=uno">PANIER</a><i class=""></i></li>
			  <li><a href="index.php?sheet=contact&model=uno">CONTACT</a><i class=""></i></li>
		  </ul>
	    
	
	
	</div>
</header>

<!--site map-->
