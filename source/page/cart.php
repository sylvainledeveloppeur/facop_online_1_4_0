<div id="pg_us">

	<div class="bac_top">
  <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Panier</h1>
		    <strong class="">Votre commande</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->
	
	
 <div class="bac_bla">
	<div class="fenetre ">
		  <div class="after Q_cols_2_1col pos_rel">
				  <?php
					   
					 			if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['produit_cus']);
	   if ($nbArticles <= 0)
	  { 
		   echo '
		        <!-- empty cart-->
                <div class="wid_50 mar_auto tex_center pad_1 mar_top_30 fon_siz_18 cart0 stop_form">
		        <span class="step size-32"> <i class="icon ion-android-cart"></i> </span>Ton panier est vide </div>';
	   }
	   else
	   {
		   echo '
			  <div class="flo_lef wid_50 after pad_rig_20">
				    <h2 class="hh22 mar_bot_20 bigh2_sci tex_cen"> Ton panier </h2>';
		   
		   
		   
		   
		   
				   echo '<table  border="1" class="tab_pan">
					  <thead>
					<tr>
					  <th scope="col">Photo</th>
					  <th scope="col">Nom</th>
					  <th scope="col">Prix</th>
					</tr>
					 </thead>
				  <tbody>';
		   
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
			  $ii=$i+1;
	         echo '
			 <tr class="pos_rel">
			  <td><img src="'.htmlspecialchars($_SESSION['panier']['img_cus'][$i]).'"  alt=""/> </td>
			  <td>'.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'</td>
			  <td>'.htmlspecialchars($_SESSION['panier']['priuni_cus'][$i]).' FCFA
			  <a href="index.php?b=uno.cart&sc='.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'" class="fa fa-remove osup" title="Remove"></a></td>
			</tr>';
	        
	      }
			
			?>
         </tbody>
				</table>

   					<aside class="asi_inf mar_top_80">			
						<p class="pre_req">L'abonnement à chaque formation est valide pendant 12 mois (1 an), à compter de la date d'achat.</p>			
				  </aside>
				 
			  </div>
			  <div class="flo_lef wid_50 bac_gre_2">
				    <h2 class="hh22 mar_bot_20 bigh2_sci tex_cen"> Paiement </h2>
				  
				   <table  border="1" class="tab_pan">
				  <tbody>
					<tr>
					  <th scope="col">Quantité:</th>
					  <td><?php echo compterArticles(); ?></td>
					</tr>
					<tr>
					  <th scope="col">Montant:</th>
					  <td><?php echo $defaultClass_OB->cinder_nombre(MontantGlobalEtReduction(),'.'); ?> FCFA</td>
					</tr>
					<tr>
					  <th scope="col">Réduction:</th>
					  <td><?php if(!empty($_SESSION['reduction']))
									{
										

									  if(compterArticles()>1)
							            echo $reduction=!empty($_SESSION['reduction'])? $_SESSION['reduction']:0;
							          else
								        echo $reduction=0;

									}
		                        else
								    {
									echo 0;
									 }?>%</td>
					</tr>
					<tr>
					  <th scope="col">Net à payer:</th>
					  <td><?php echo $defaultClass_OB->cinder_nombre(MontantGlobalEtReduction(),'.'); ?> FCFA</td>
					</tr>
				  </tbody>
				</table>

				  <input type="submit" name="okfo" id="okfo" value="Payer" class="input_send mycart">
				  
				  
				 <!--<form>
				  <div>
					Your order is ₦2,500
				  </div>
				  <button type="button" id="start-payment-button" onclick="makePayment()">Pay Now</button>
				</form>-->
				   <div class="mypan"> </div>
			  </div>
	
	
	
	
		<?php 
		   
	     }
	}
	?>
       
				  
				
		  </div>
    </div>
  </div>
	<!----> 		
		


	
</div>
