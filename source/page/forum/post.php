
	<?php 
				if(empty($_SESSION['id']))
				{
					$iid="0";
			 
				}
				else
				{
					//$iid=$_SESSION['id'];
                    $iid="0";
                }
				?>
<!--service-->
	
  <div class="bac_vice">
	<div class="fenetre">
	  <div class="theus after">
		
		  <?php $forum->showpost($tams,$_GET['idpost'],$defaultClass_OB); ?>
		  
		
          
		  <?php if(!empty($_SESSION['id']))
         { echo '
	<div class="eta_form"></div>
 <form class="fofor Tfom_2 mar_bot_10" method="post" action="/source/js/forum_js/ins_reaction_sql.php">
		  <textarea name="rea" placeholder="Laissez un commentaire..."></textarea>
			   <input type="hidden" name="use" value="'.$_SESSION['id'].'">
			   <input type="hidden" name="deba" value="'.$_GET["idpost"].'">
			 <input type="submit" value="Envoyer">
		  </form>
		  '; }
         else{ echo '<a href="index.php?b=login.login.login" class="mcfor col1">Connectez-vous pour réagir</a>';} 
    ?>
		  
		  
		   <!--reply-->
		   <?php $forum->showreact($tams,$_GET['idpost'],$defaultClass_OB); ?>
		 
		  
		  
	   