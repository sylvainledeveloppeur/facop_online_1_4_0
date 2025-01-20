	<div class="pg_cart">
		
		<!--bac top-->
  <div class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Panier</h1>
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
<div class="pg_cart">
  <div class="fenetre">
    <div class="bg_blanc min_hei_200 bord_1 pos_rel">
      
      
			<!-- <tr>
            <th scope="col"><img src="source/img/avatar.png"  alt=""/></th>
            <th scope="col">DELL Inspiron 15 6000 15.6" - Intel Pentium N3540-2.16GHz - 500Go HDD - 4Go RAM - Windows 10 - Noir - 12 Mois DELL Inspiron 15 6000 15.6"</th>
            <th scope="col"><input type="text" value="17"> </th>
            <th scope="col">2,295,200  FCFA </th>
            <th scope="col">Be-konekt</th>
            <th scope="col">54 295,200  FCFA 
              <span class="onb">1</span>
              <a href="ff" class="fa fa-remove osup" title="Remove"></a></th>
          </tr>-->
          <?php 
		
		//ajouterArticle('okaz/13_big.jpg',"333",650,6,'be-konekt',"ggg@g.com",0);
		
				if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['produit_cus']);
	   if ($nbArticles <= 0)
	  { 
		   echo '
		        <!-- empty cart-->
                <div class="wid_50 mar_auto tex_center pad_1 mar_top_30 fon_siz_18 cart0 stop_form">
		        <span class="step size-32"> <i class="icon ion-android-cart"></i> </span>Votre panier est vide </div>';
	   }
	   else
	   {
				   echo '<a href="index.php?b=uno.cart.store&dc=vider" class="vidcart opa_hov_04" title="Empty cart">
				  <em>V</em>
				  <em>i</em>
				  <em>d</em>
				  <em>e</em>
				  <em>r</em>
			  </a>
			  <table id="ocart" width="100%" border="1">

				<tbody>
				  <tr>	  
					<th scope="col">Image </th>
					<th scope="col">Article</th>
					<th scope="col">Quantité</th>
					<th scope="col">Prix unitaire</th>
					<th scope="col">Expéditeur</th>
					<th scope="col">Sous-total</th>
				  </tr>';
		   
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
			  $ii=$i+1;
	         echo '<tr>
            <th scope="col"><img src="source/img/store/'.htmlspecialchars($_SESSION['panier']['img_cus'][$i]).'"  alt=""/></th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'</th>
            <th scope="col"><input type="text" value="'.htmlspecialchars($_SESSION['panier']['qte_cus'][$i]).'"> </th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['priuni_cus'][$i]).'  FCFA </th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['expedi_cus'][$i]).'</th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['souto_cus'][$i]).'  FCFA 
              <span class="onb">'.$ii.'</span>
              <a href="index.php?b=uno.cart.store&sc='.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'" class="fa fa-remove osup" title="Remove"></a></th>
          </tr>';
	        
	      }
			
			?>
         
        </tbody>
      </table>
		
	  <div class="wid_90 mar_auto bord_ after linecapri pad_top_40">
		<ul class="flo_lef wid_30">
			
<li>Nombre de produit: <strong><?php echo compterArticles(); ?></strong></li>
<li>Net à payer: <strong><?php echo $defaultClass_OB->cinder_nombre(MontantGlobalEtReduction(),'.'); ?> FCFA</strong> </li>
<li>Sous-total: <strong><?php echo $defaultClass_OB->cinder_nombre(MontantGlobal(),'.'); ?> FCFA</strong> </li>
<li>Réduction(<?php if(!empty($_SESSION['reduction'])){echo $_SESSION['reduction'];}else{echo 0;}?> %): 
	<strong><?php echo $defaultClass_OB->cinder_nombre(MontantReduction(),'.');?> FCFA</strong> </li>
<li>[Frais de logistique non include]</li>

		  
		  </ul>
		<form method="post" action="source/js/form_php/sel_reduction_sql.php" name="formtique" id="formtique" class="Tfom_1 lique flo_lef wid_35 bg_gris_3 pad_top_bot_10 bor_gris_1">
		  
    <div class="lique tex_center fon_bol">Bon de reduction</div>
    <div class="lique tex_center">Entrée votre bon d'achat ici, si vous l'avez.</div>
		  <div class="eta_form"></div>
<div class="putbon">
  <input name="bontique" id="bontique" placeholder="000000" type="text">
      <input name="okmand" class="btnbao" id="okmand" value="Utiliser" type="submit">
  </div>
    <div id="eta_form" style="line-height: 1;margin: auto;width: 100%;"></div>
 
		  
	    </form>
		<div class="flo_lef wid_35">
<div class="cart_pri"><?php echo $defaultClass_OB->cinder_nombre(MontantGlobalEtReduction(),'.');?> <em>FCFA</em> </div>
<a href="index.php?b=uno.information.store" class="pas_cart okpop2 bg_1" data-fiche="pas_command.php">Passer ma commande</a> </div>
      </div>
		<?php 
		   
	     }
	}
	?>
		

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      </div>
  </div>
</div>
