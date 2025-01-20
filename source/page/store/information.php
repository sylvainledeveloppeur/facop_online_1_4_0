<div id="pg_service">

	<!--bac top-->
  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Payement</h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	

  <div class="bac_ex the_bac ">
	<div class="fenetre">
	<ul class="ulinpay after Q_cols_2_1col">
		
     <form name="sunfo" id="sunfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/store_js/save_order.php" >
		
          <li>
            <div class="wid_98 mar_auto bg_blanc after">
                          <h2 class="hh2">Informations personnels</h2><br>
                          <br>


                          <div class="fd">
                            <input type="text" name="nom" id="sunname" placeholder="Nom Complet " value="<?php echo $_SESSION['nam']; ?>">
                          </div>
                                  <div class="fd">
                          <input type="text" name="tel" id="sunphone" placeholder=" tel" value="<?php echo $_SESSION['tel']; ?>">
                                      </div>
                                      <div class="fd">
                          <input type="text" name="mail" id="sunmail" placeholder=" E-mail " value="<?php echo $_SESSION['mai']; ?>">
                                          </div>
                         
              <div class="fd">
                          <input type="text" name="adr" id="sunsuj" placeholder=" Adresse " value="<?php echo $_SESSION['adr']; ?>">
                              </div>

            </div>
          </li>
               <li>
                 <div class="wid_98 mar_auto bg_blanc after">
                          <h2 class="hh2">Address de livraison</h2><br>
                          <br>


                   <div class="fd">
                          <input type="text" name="tel2" id="sunphone" placeholder=" tel" value="<?php echo $_SESSION['tel']; ?>">
                                      </div>
                                      <div class="fd">
                          <input type="text" name="mail2" id="sunmail" placeholder=" E-mail " value="<?php echo $_SESSION['mai']; ?>">
                                          </div>
                          <div class="fd">
                          <input type="text"  id="sunsuj" placeholder=" Pays " disabled>
                              </div>
                          <div class="fd">
                          <input type="text" name="vil2" id="sunsuj" placeholder=" Ville " value="<?php echo $_SESSION['vil']; ?>">
                              </div>
                          <div class="fd">
                          <input type="text" name="adr2" id="sunsuj" placeholder=" Adresse " value="<?php echo $_SESSION['adr']; ?>">
                              </div>
                          <div class="fd">
                          <input type="text" name="mes" id="sunsuj" placeholder="Avez-vous un message?" >
                   </div>

                         
                 </div>
          </li>
               <li>
                 <div class="wid_98 mar_auto bg_blanc">
                          <h2 class="hh2">Moyen de payement</h2><br>
                          <br>

                   <p class="pmoy after">
                            <label data-moy="mtn" data-nam="MTN Mobile Money" >
                              <input type="radio" name="moypay" value="mtn" id="moypay_0">
                              <img src="source/img/mtn.png"  alt=""/></label>
                            
                            
                            <label data-moy="mtn" data-nam="Orange Money" >
                              <input type="radio" name="moypay" value="orange" id="moypay_1">
                              <img src="source/img/or.jpg"  alt=""/></label>
                            
                            
                            <label data-moy="western" data-nam="Western Union" >
                              <input type="radio" name="moypay" value="visa" id="moypay_2">
                              <img src="source/img/wes.jpg"  alt=""/></label>
                            
                            
                            <label data-moy="mtn" data-nam="mtn" >
                              <input type="radio" name="moypay" value="paypal" id="moypay_3">
                              <img src="source/img/paypal.png"  alt=""/></label>
                            <input type="hidden" name="mopay" class="mopay">
                            <input type="hidden" name="monam" class="monam">
                   </p>
                   </div>
          </li>
          <li>
                    <div class="wid_98 mar_auto bg_blanc">
                          <h1 class="hh2">Montant total</h1><br>
                          <br>

<p class="sommpay"><?php echo $defaultClass_OB->cinder_nombre(MontantGlobalEtReduction(),'.');?> €</p>
                          
                    </div>
                </li>
         
          <div class="after"></div>
         
          <div class="after">
         <a href="index.php?b=uno.cart.store" class="bactoca">Retour</a>
         
              <input type="submit" class="gotopay bg_1" value="Continuer">
              
              
            <div class="eta_form"></div>
          </div>
     </form>
        
        
        
		
    </ul>
		
	  
		
    </div>
</div>
	<!---->
	 
	
</div>
