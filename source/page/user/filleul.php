<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes Filleuls</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto after">
        
               <?php 
		  $id=$_SESSION['id'];
		  $pseudo=$_SESSION['pseudo'];
				
              $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user  WHERE parrain='$pseudo'  " ) ;
                                       $nbr_pseudo->execute();
                                       $chif_pse=$nbr_pseudo->fetch();
      
                                     if ($chif_pse['nbr']!=0)
                                      {
										  echo '<h2 class="h2 tex_cen mar_bot_30">Total : '.$chif_pse['nbr'].'</h2>';
        $query = $tams->query("Select * FROM user WHERE parrain='$pseudo' "); 
       
        while ($outil = $query->fetch())
        {
			echo '<div class="after line_fieul">
			      <div class=""><img id="cpimg" src="source/img/avatar/avatar.png" alt="book"></div>
			      <div class="psefil">
				  '.$outil['pseudo'].'
				  <strong>'.$outil['datesql'].' </strong>
				  </div> 
				  </div>';
		} 
         
       
      }
      else
      {
        echo '<div class="after tex_cen wid_50 mar_auto col_1 fon_bol">
		<img id="cpimg" src="source/img/no_result.jpg" alt="book">
		<p>Aucun résultat</p>
		</div>';
      } 
             
              ?>
           
          </div>
        </div>
   
	<!---->
	
</div>
