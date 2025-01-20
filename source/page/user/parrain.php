<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mon parrain</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
            <?php 
		  $id=$_SESSION['id'];
		  $pseudo=$_SESSION['pseudo'];
		  $parrain=$_SESSION['parrain'];
				
            
		 if (!empty($_SESSION['parrain']))
		  {
										  echo '<h2 class="h2 tex_cen mar_bot_30">Total : 1</h2>';
				$query = $tams->query("Select * FROM user WHERE pseudo='$parrain' "); 

				while ($outil = $query->fetch())
				{
					echo '<div class="after line_bk">
						  <div class="flo_lef wid_20 tex_cen fon_bol fon_siz_18">
						  <img id="cpimg" src="source/img/avatar/avatar.png" alt="book"><br/>
						  '.$outil['pseudo'].'</div>
						   
						  </div>';
				} 
         
       
      }
      else
      {
        echo '<div class="after tex_cen wid_50 mar_auto col_1 fon_bol">
		<img id="cpimg" src="source/img/no_result.jpg" alt="book">
		<p>Aucun résultat'.$parrain.'</p>
		</div>';
      } 
             
              ?>
           
          </div>
        </div>
   
	<!---->
	
</div>
