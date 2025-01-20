<?php @session_start();

 $nbr=rand(0,5);
$arra=array("Facop online est disponible sur Google play Store", "Facop online est aussi disponible sur Apple Store",
			"Facop A0 n'a pas de certification", "Toutes les formations vous donnent un certificat sauf FACOP A0",
			"La formation Facop A0 est totalement gratuite", "Vous pouvez gagner de l'argent sur Facop en parrainant vos proches");
$arraImg=array("lsv_0.jpg", "lsv_1.jpg", "lsv_2.jpg", "lsv_3.jpg", "lsv_4.jpg", "lsv_5.jpg");

	$color=!empty($_POST['pg']) AND $_POST['pg']=="user" ? "":"col_bla";
echo '<div class=" wid_70 mar_auto">
			  <div class=" tex_cen mar_top_40 mar_bot_20">  
	            <img src="source/img/background/'.$arraImg[$nbr].'" class="gifload1f"  alt=""/>
		      </div>
			 <div class="">
        <h2 class="'.$color.' tex_cen">Le saviez-vous!</h2>			 
        <p class="tex_cen">'.$arra[$nbr].'</p>
		      </div>
		   </div>';
	

?>