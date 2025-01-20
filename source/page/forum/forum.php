
	
<!--service-->
	
  <div class="bac_vice">
	<div class="fenetre">
	  <div class="theus after">
		<?php 
				if(empty($_SESSION['user']))
				{
				?>
		  <ul class="ultofor bg_3 after  Q_cols_2_1col">
		  <li class="lifor">
			<div class="wid_90 mar_auto">
			  <h2>REJOIGNEZ NOTRE FORUM !</h2>

<p>
Parlez de tout ce que vous pensez et voyez ce que les autres pensent. En tant qu'invité de notre forum, vous ne pouvez que consulter les messages. Lorsque vous vous inscrivez au forum, vous pouvez participer à des sujets, commencer de nouveaux sujets et généralement faire partie du premier niveau de notre communauté.</p>
<br>
<br>
<?php if(!empty($_SESSION['id']))
         { echo ''; }
         else{ echo '<a href="index.php?b=login.login.login" class="mcfor col1">Connectez-vous pour réagir</a>';} 
    ?>

			  
			  
		    </div>
          </li>
		  <li>.</li>
		  </ul>
		  <?php 
				}
				?>
	    <ul class="ulnbfoo after  Q_cols_2_1col">
	    <li>
	    <div class="wid_50 flo_lef"><i class="fa fa-bullhorn"></i></div>
	    <div class="wid_50 flo_lef">
			<p>forum</p>
		<strong><?php $forum->counf($tams,"forum"); ?></strong></div>
        </li> 
	    <li>
	    <div class="wid_50 flo_lef"><i class="fa fa-bullhorn"></i></div>
	    <div class="wid_50 flo_lef">
			<p>Sujets</p>
		<strong><?php $forum->coun($tams,"forum"); ?></strong></div>
        </li> 
	    <li>
	    <div class="wid_50 flo_lef"><i class="fa fa-bullhorn"></i></div>
	    <div class="wid_50 flo_lef">
			<p>Commentaires</p>
		<strong><?php $forum->coun($tams,"forum_reaction"); ?></strong></div>
        </li> 
     </ul>
		  
		  
	    <ul class="ullefo">
		  <li>
			<ul class="ullinefo ullinefo2 after">
			  <li>Liste des forums</li>
			  <li><i class="fa fa-comment"> Sujets</i></li>
				<li><i class="fa fa-user"></i> Auteur</li>
				<li>---</i></li>
			  </ul>
			
			
			</li>
			
			<?php $forum->sforum($tams,"forum"); ?>
		 
		  
		 </ul>
		  
		 

