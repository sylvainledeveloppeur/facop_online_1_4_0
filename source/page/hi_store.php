<div class="hi_pg">
  <div class="slider">
	  
	   <!-- Insert to your webpage where you want to display the slider -->
    <img src="source/img/slider/1.jpg" alt="Slider, la REFERENCE DOCUMENTAIRE"/>    
    <!-- End of body section HTML codes -->
	</div>
    <!--h1 for boot-->
	<h1 class="dis_non">LA REFERENCE DOCUMENTAIRE est une librairie. Vente de textes de lois et de livres en ligne</h1>

    <!--les catego-->
    <?php $Store->categoHI($tams,$defaultClass_OB); ?>  
	
		
	<!--show product-->
  <div class="bac_ex the_bac bg_3">
	<div class="fenetre">
	  <div class="after Q_cols_2_1col">
          
          <?php 
	   $nbr_pseudo1=$tams->prepare("SELECT COUNT(id_pro) nbr FROM store  WHERE actif_pro=1 " );
           $nbr_pseudo1->execute();
           $chif_pse1=$nbr_pseudo1->fetch();
	  
	 if($chif_pse1['nbr']!=0)
     { 
		$Store->prodHome($tams,$defaultClass_OB);  
     }
          else{
              echo '<div class="stop_form">Aucun article en vente</div>';
          }
	 
	  
	  ?> 
   
    
      </div>
    </div>
  </div>

   <!--BLOG-->
	 <div class="bac_ship bg_blanc">
	<div class="fenetre">
        <h2 class="hh22 tex_center">Dans le blog</h2>
        <?php $blog->blogHI($tams,$defaultClass_OB,'<ul class="ulblog pad_top_30 after">','</ul>');?>
	
        
		</div>
  </div>

   <!--BLOG-->
	 <div class="bac_ship ">
	<div class="fenetre">
        <h2 class="hh22 tex_center">Témognages</h2>
	 
        <?php $Store->testimo($tams,$defaultClass_OB,4,'<ul class="ultesti pad_top_30 after">','</ul>');?>
        
		</div>
  </div>
		
	<!--text-->
  <div class="bac_ex the_bac bg_3">
	<div class="fenetre">
	  <div class="after Q_cols_2_1col">
	<h2 class="hh22 after tex_center"><strong>FAQ</strong>  <a href="index.php?sheet=faq&model=uno">Tout afficher</a></h2>
   
          <?php $defaultClass_OB->faq($tams,4,'<ul class="ulfaq after pad_top_40" >','</ul>');?>
          
      
      </ul>
   
		  
		  
		  
      </div>
    </div>
  </div>
    
    <!--shipping-->
	 <div class="bac_ship">
	<div class="fenetre">
	<ul class="ulship after">
		<li class="after">
		  <div class="flo_lef wid_10"><i class="fa fa-undo"></i></div>
		  <div class="flo_lef wid_80">
			 <strong> Expédition Rapide</strong>
              Expédition dans les brefs delais
			</div>
        </li>
		<li class="after">
		  <div class="flo_lef wid_10"><i class="fa fa-phone"></i></div>
		  <div class="flo_lef wid_80">
			  <strong>24/7 Heurs Support</strong>
              Nous sommes disponible
			</div>
        </li>
		<li class="after">
		  <div class="flo_lef wid_10"><i class="fa fa-money"></i></div>
		  <div class="flo_lef wid_80">
			 <strong> 100% Payments securisé </strong>
              Payez en ligne ou hors ligne
			</div>
        </li>
	
	</ul>
		</div>
      </div>
  <!---->
</div>
