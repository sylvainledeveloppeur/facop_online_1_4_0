<?php session_start();?> 
<div class="after abotDiv">
		      <div class="flo_lef wid_30"><img src="img/tamstechn_logo.png" alt=""/></div>
		      <div class="flo_lef wid_60 about">
				<p>
        <?php  
         echo $_SESSION['namversion'].' '.$_SESSION['version'];?></p>
				  <p>BeeAdmin is build and developed by <strong> 
				  <?php if(!empty($_SESSION['bee']))	 
         echo ''.$_SESSION['bee'].'';
	 ?></strong> a group of independent computer programmer, that work together for the love of the technology...</p>
				  <p>Developers (Fotso Sylvain; Nsangou Rahim; Henri Yhacent) </p>
				  <p>
<i class="fa fa-map-marker"></i> Address (Freedom Boulevard, Akwa, Douala-Cameroon) <br>
<i class="fa fa-phone"></i> +237 676 93 32 30 / 694 81 58 91 / 677 11 97 19 / 691 27 22 92 <br>
<i class="fa fa-envelope"></i>  info@bee4tech.com <br>
<i class="fa fa-globe"></i> www.bee4tech.com<br>
<i class="fa fa-facebook"></i> https://facebook.com/bee4tech
				  </p>
				  <p>Do you wish help? You can <a href="http://www.bee4tech.com">Donate</a> or <a href="http://www.bee4tech.com">participate</a>.</p>
				
				</div>
	        </div>