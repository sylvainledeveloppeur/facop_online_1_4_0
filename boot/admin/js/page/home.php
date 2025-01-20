 <?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
?> 


<div class="lehome wow bounceInDown animated">
	
<div  class="linehome after"><!--start linehome-->
			<?php 			
					$Beclas->BlocHome($tams,"Utilisateurs", "user", "id", "1", "bounceInLeft");
					$Beclas->BlocHome($tams,"Vente", "achat", "id_cha", "2", "bounceInLeft");	
					$Beclas->BlocHome($tams,"Packs", "pack", "id_pk", "3", "bounceInRight");	
					$Beclas->BlocHome($tams,"Leçons", "lesson", "id_les", "4", "bounceInRight");	

			?>

	</div><!--end linehome-->

	<div  class="linehome after"><!--start linehome-->
			<?php 			
					$Beclas->BlocHome($tams,"Vidéos", "video", "id_vi", "5", "bounceInLeft");
					$Beclas->BlocHome($tams,"PDF", "pdf", "id_pf", "6", "bounceInLeft");	
					$Beclas->BlocHome($tams,"Quiz", "quiz", "id_q", "7", "bounceInRight");	
					$Beclas->BlocHome($tams,"Certification", "user_certificat", "id_cer", "8", "bounceInRight");	
			?>

	</div><!--end linehome--> 

<div  class="linehome after"><!--start linehome-->
		<?php 			
				$Beclas->BlocHomeSum($tams,"Bonus utilisateurs (XAF)", "user_bonus", "amount_bnk", "10", "bounceInLeft");	
				$Beclas->BlocHomeSum($tams,"Demande retrait (XAF)", "user_bonus", "pending_bnk", "11", "bounceInRight");	
		?>

</div><!--end linehome--> 

<div  class="linehome after"><!--start linehome-->
		<?php 				
				$Beclas->BlocHomeSum($tams,"Ventes Total (XAF)", "achat", "prixpack_cha", "13", "bounceInLeft");
				$Beclas->BlocHomeSum($tams,"Facop bénefice (XAF)", "_admin_bank", "some_bk", "14", "bounceInLeft");	
				$Beclas->BlocHomeSum($tams,"Parrain Direct (XAF)", "_admin_bank", "somepd_bk", "15", "bounceInRight");	
				$Beclas->BlocHomeSum($tams,"Parrain  Indirect (XAF)", "_admin_bank", "somepi_bk", "16", "bounceInRight");	
		?>

</div><!--end linehome--> 


</div><!--end lehome-->	 
