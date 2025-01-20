<div id="pg_us">

	<!--bac top-->
	  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Fiche produit </h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	
	<!--us-->
  <div class="bac_ex the_bac">
	<div class="fenetre">
	  <div class="lineinfo after itemscope itemtype="https://schema.org/Product"">
		<div class="flo_lef wid_80">
		  <div class="blo_boo after">
		    <div class="icipani"></div>
			  <?php 
			  $geet=$_GET['id'];
			  	$bloc =$tams->query('SELECT * FROM store WHERE id_pro='. $geet);

							echo ' <ul class="after Q_cols_2_1col ulbook">';							  
							  while($done=$bloc->fetch())
							  { 
								 $comment=substr($done['tit_pro'], 0, 30);
										  $dernier_mot=strrpos($comment," ");
										  $comment=substr($comment,0,$dernier_mot);
										  //$comment.="...";
					  echo '
		
		  
		  <div class="flo_lef wid_55">
			  <div class="imgboo"><img itemprop="image" src="source/img/store/'.$done['img_pro'].'"  alt=""/></div>
			  <div class="minboo"><img src="source/img/store/'.$done['img_pro'].'"  alt=""/><img src="source/img/store/'.$done['img2_pro'].'"  alt=""/></div>
             
           <!--  <ul class="ulfisha after pad_top_20">
            <li><i class="ion-social-facebook-outline"></i> Share</li>
            <li><i class="ion-social-twitter-outline"></i> Share</li>
            <li><i class="ion-social-youtube-outline"></i> Share</li>
            <li><i class="ion-social-instagram-outline"></i> Share</li>
        
        </ul>-->
            </div>
		    <div class="flo_lef wid_45 desbook">
				<h1 class="hh11" itemprop="name">'.$done['tit_pro'].'</h1>
			  
			  <ul class="priboo">
               
				 <li class="pi" itemprop="price">'.$defaultClass_OB->cinder_nombre($done['nprice_pro'],'.').' F CFA</li>
				  <li>'.$done['desc_pro'].'</li>
				  <li> </li>
				  <li class="co_pop1">
					  <a href="https://wa.me/237693971267?text=Je suis interesé par ce véhicule: '.$defaultClass_OB->format_url($done['tit_pro']).'" class="Taddcart1 adca10 bpay0 btn_3" data-img="'.$done['img_pro'].'" data-des="'.$done['tit_pro'].'" data-pri="'.$done['nprice_pro'].'" data-qua="0" data-exp="Livre" data-mail="buy@baobab.cm" data-souto="livre" data-pro="'.$done['id_pro'].'">Je suis interesé </a>
				 
				  </li>
				 <div class="iof">Garantie assurée sur toutes nos ventes</div>
				</ul>
			 ';

							  }
			  
			  
			  
			  ?>

			  
            </div>
          </div>
        </div>
	    <div class="flo_lef wid_20 sideM">
		  <div class="seller">
			<img src="source/img/logo/logo.png"  alt=""/> 
			
			  <p>DTACAMEROUN</p>
			<p>DOUALA - CAMEROUN</p>
			  <p>00237 693 971 267 / 681 279 614<br>
                dtacameroun@gmail.com</p>
			
			
			</div>
			
			<ul class="ulcal">
				<li class="okkk0"><a href="tel:00237681279614" class="btn_3"><i class="fa fa-phone"></i>Appelez-nous</a></li>
				<li class="okkk0"><a href="https://wa.me/237693971267?text=Je suis interesé" class="btn_3"><i class="fa fa-whatsapp"></i>WhatsApp</a></li>
				<li class="okkk0"><a href="mailto:dtacameroun@gmail.com" class="btn_3"><i class="fa fa-envelope"></i>Ecrivez-nous</a></li>
                <h2 class="pad_bot_20"><!--Payement--></h2>
                <div class="paye wid_90 mar_auto">
                    <!--<img src="source/img/mtn.png"  alt=""/> <img src="source/img/or.jpg" alt=""/>--> <!--<img src="source/img/wes.jpg" alt=""/> <img src="source/img/mogra.jpg" alt=""/>--></div>
		     
                
            </ul>
            
            
        </div>
      </div>
    </div>
  </div>
	<!---->
 <!--BLOG-->
	 <div class="bac_ship ">
	<div class="fenetre">
        
       <?php //$Store->testimoID($tams,$defaultClass_OB,20,'<ul class="ultesti pad_top_30 after">','</ul>',$_GET['id']);?>
  
		</div>
  </div>
<!--livre-->
  <div class="bac_ex the_bac bg_3">
	<div class="fenetre">
	  <div class="after Q_cols_2_1col">
	<h2 class="hh2 after"><strong>Nos recommandations</strong>  <a href="index.php?b=uno.filter.store">Tout afficher</a></h2>
   
    
   <?php $Store->prodRand($tams,$defaultClass_OB,3,'<ul class="ulpro after pad_top_40 Q_cols_2_2col">','</ul>');?>
		  
		  
		  
      </div>
    </div>
  </div>


	
</div>
