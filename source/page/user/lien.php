<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mon lien</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
				
			
			echo '<div class="blobonus bg_2 blanc col_2_100">
            <span id="uLink" class="fon_siz_18">https://facop.training/parrain='.$_SESSION['pseudo'].'</pan>
			<textarea name="mes" id="uLink2" class="hide" >https://facop.training/parrain='.$_SESSION['pseudo'].'</textarea>
			<p class="faiRet hover" onclick="myFunction()">Copier</p>
			</div>
		
			
			<h2 class="h2 tex_cen mar_bot_30">NB:</h2>
       <div class="after tex_cen wid_50 mar_auto col_3 fon_bol col_2_100">
		<p>Vous devez envoyer ce lien à vos filleuls. En utilisant ce lien pour s\'inscrire, votre pseudo apparaîtra automatiquement dans le champ "Pseudo du parrain".</p>
		</div>';
				?>
           
          </div>
        </div>
   
	<!---->
	
</div>
