
<!--service-->
	
  <div class="bac_vice">
	<div class="fenetre">
	  <div class="theus after">
		
		<h1 class="hifo"><strong>FORUM:</strong>  <?php echo $_GET['idcat'];?></h1>
		  
	
		  
		  
	    <ul class="ullefo">
		  <li>
			<ul class="ullinefo ullinefo2 after">
			  <li>Les sujets</li>
				<li><i class="fa fa-comments"> Réactions</i></li>
			  <li><i class="fa fa-calendar"></i> Date</li>
				<li><i class="fa fa-user"></i> Auteur</li>
			  </ul>
			
			
			</li>
			
			<?php $forum->ssujet($tams,"forum",$_GET['idcat'],"forum_reaction",$defaultClass_OB); ?>
			
		
		 </ul>
		  
		 
		