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
	<ul class="ulctac after Q_cols_2_1col">
		<?php 	//moneyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy
	if( !empty($_SESSION['panier']))
{
	
    Monetbil::setAmount(10);
	
	
Monetbil::setCurrency('XAF');
Monetbil::setLocale('en'); // Display language fr or en
Monetbil::setPhone('');
Monetbil::setCountry('Cameroon');
Monetbil::setItem_ref(time());
Monetbil::setPayment_ref(time());
Monetbil::setUser("n");
Monetbil::setFirst_name("h");
Monetbil::setLast_name("g");
Monetbil::setEmail("g");
Monetbil::setLogo('http://moguez.bee4tech.com/source/img/logo/logo.png');

// This example show payment button
$payment_url = Monetbil::url();
	}
		else
		{
			exit('<div class="stop_form">votre panier est vide </div>');
		}
		?>
		
		<!--    <form name="sunfo" id="sunfo" class="Tfom_1d wid_50 mar_auto" method="get" action="index.php?sheet=pay2&model=uno&o=1" >
				<h1 class="hh2">Payez et finalisez votre commande</h1>
				<input type="hidden" name="sheet" value="pay2" >
				<input type="hidden" name="model" value="uno" >
				<input type="hidden" name="o" value="1" >-->
				<?php 
			/*	echo ' <input type="hidden" name="nom" value="'.$_SESSION['nom'].'" >';
				echo ' <input type="hidden" name="tel" value="'.$_SESSION['tel'].'" >';
				echo ' <input type="hidden" name="adr" value="'.$_SESSION['adr'].'" >';
				echo ' <input type="hidden" name="mail" value="'.$_SESSION['mail'].'" >';
				echo ' <input type="hidden" name="vil" value="'.$_SESSION['vil'].'" >';*/
				?>
            
      	<!--	<input type="submit" name="okfo" id="okfo" value="Payer" class="bg_">
      		<div class="eta_form"></div>
      	</form>-->
		
		<?php if (Monetbil::MONETBIL_WIDGET_VERSION_V2 == Monetbil::getWidgetVersion()): ?>
    <form action="<?php echo $payment_url; ?>" method="post" data-monetbil="form" class="fopay tex_center">
        
        <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
        <button type="submit" class="btnmnb bg_beetech" id="monetbil-payment-widget">Payer</button>
        
              <a href="index.php?b=pay.notifi.pay" class="bactoca">go</a>
         <a href="index.php?b=uno.information.store" class="bactoin">Retour</a>
       
    </form>
<?php else: ?>
    <a class="btnmnb bg_beetech" href="<?php echo $payment_url; ?>" id="monetbil-payment-widget">Payer</a>
        
         <a href="index.php?b=uno.information.store" class="bactoin">Retour</a>
<?php endif; ?>

<!-- To open widget, add JS files -->
<?php echo Monetbil::js(); ?>

<!-- To auto open widget, add JS files -->
<?php
//echo Monetbil::js(true); ?>
		
		
    </ul>
		
	  
		
    </div>
</div>
	<!---->
	 
	
</div>
