<?php @session_start();
$id=$_SESSION['id'];
$bonus='';
	 $query = $tams->query("Select * FROM user_bonus WHERE  id_user_bnk=$id "); 
      
        while ($done = $query->fetch())
        {
			$bonus=$done['amount_bnk'];
		}
?>
<div id="pg_user">

	
	<h1 class="h1 tex_center mar_bot_15">Retrait bonus</h1>
	<!--us-->
	  <div class="baccuser head_shado mar_auto bg_blanc">
            
          
            <?php @session_start();

			echo '<div class="col_3 tex_cen"> Solde Bonus: '.$bonus.' FCFA</div>';
?>
             <form name="userfo" id="userfo" class="Tfom_1 after bg_bla pad_top_30" method="post" action="source/js/user_js/retrai_confi.php">
					  
        <div class="eta_form tex_cen wid_80 mar_auto mar_bot_15"></div>
          <div class="loginp"><input type="number" name="amo" placeholder="Montant" required><i class="ion-cash"></i></div> 
				 <div class="loginp">
            <select name="typ"  >
               <option value="0">- - Type de banque - -</option> 
               <option value="Carte de crédit (prépayée)">Carte de crédit (prépayée)</option> 
               <option value="Paiement mobile">Paiement mobile</option> 
              </select>  
            <i class="ion-earth"></i></div>
				 <div class="loginp">
            <select name="bnk"  >
               <option value="0">- - Nom de banque - -</option> 
               <option value="MTN mobile money(Cameroun)">MTN mobile money(Cameroun)</option> 
               <option value="Orange money(Cameroun)">Orange money(Cameroun)</option> 
               <option value="VISA (Internationnal)">VISA (Internationnal)</option> 
              </select>  
            <i class="ion-card"></i></div>
				 
          <div class="loginp"><input type="text" name="com" placeholder="Nom du compte" required><i class="ion-ios-person"></i></div>
          <div class="loginp"><input type="number" name="num" placeholder="Numéro de compte" required><i class="ion-android-phone-portrait"></i></div>
         
        <input type="submit" class="btnlog bg_1" value="Envoyer">
         
         
     
			</form>
 </div>
  
	<!---->

	
</div>