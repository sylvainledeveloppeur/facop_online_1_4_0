<?php @session_start(); ?>
<div class="theteam">
	<i class="fa fa-remove flo_lef hteam" title="Hide team"></i>
  <h2 class="hh2">Members (online)</h2>
  
  <ul class="ulteam onligneDI">
    
    <?php 
			     $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team
		   " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			  
			   // ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.
							$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
			                $tim=time();
			         
			     
			   $eta=$tams->query('UPDATE _admin_team SET online=1, online_time='.$tim.' WHERE  id=\''.$_SESSION['id_admin'].'\'');
               $eta=$tams->query('UPDATE _admin_team SET online=0 WHERE  online_time <' .$timestamp_5min);
			   
			$bloc=$tams->query('SELECT * FROM _admin_team  WHERE id!=1 ORDER BY RAND() ');
						
				  
				while($done=$bloc->fetch())
				{
					$online=$done['online']!=0 ? '<div class="bgreen"></div>':'<div class="bred"></div>';
					$ava=is_file('../../img/team/'.$done['img_team']) ? 'img/team/'.$done['img_team']: 'img/avatar.png';
				echo '
				<li class="after typchat" data-id="'.$done['id'].'">
		     <div class="flo_lef wid_40d bmnom"><img src="'.$ava.'" alt=""></div>
		     <div class="flo_lef wid_70 tex_center fon_siz_14">
			 <p>'.$done['pseudo'].'</p>
			  <p>'.$done['role_team'].'</p>
			
			  </div>
            '.$online.'
          </li>
			';	
					

				}
			   
		    }
			else
			{
			echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			}
			  
			  ?>
    
    <!--  <li class="after">
		     <div class="flo_lef wid_40d bmnom"><img src="img/team/jeannette.jpg" alt=""></div>
		     <div class="flo_lef wid_70 tex_center fon_siz_14">
			 <p> Jeanette</p>
			  <p>Rédactrice</p>
		
			  </div>
              	<div class="bred"></div> 
		   </li>
		  -->
    
    </ul>
  <!-- <h2 class="hh2 gc typchat" data-id="null">Groupe chat</h2> 
		<h2 class="hh2">Chat</h2>-->
  <h2 class="hh2" data-id="null">Groupe chat</h2> 
  <div class="bchat">
    <ul id="ulchat" class="ulchat onmesDI">
      <?php 
			     $nbr_pseudo=$tams->prepare("SELECT COUNT(id_dis) nbr FROM _admin_discussion
		   " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			  
			$bloc=$tams->query('SELECT * FROM _admin_discussion LEFT JOIN _admin_team  ON _admin_discussion.id_te_dis=_admin_team.id  ORDER BY id_dis ASC LIMIT 60 ');
						
				 
				while($done=$bloc->fetch())
				{
				
					if($done['id_te_dis']==$_SESSION['id_admin'])
					{
						echo '
						<li class="after">
			  
			  <div class="flo_lef wid_70 tex_center fon_siz_14">
				<p> '.$done['mes_dis'].'</p>

				</div>
                   <div class="flo_lef wid_40d bmnom"><img src="img/team/'.$done['img_team'].'" alt=""></div>
				  </li>
					';	
					
                    }
					else{
						echo '
						<li class="after">
			  <div class="flo_lef wid_40d bmnom"><img src="img/team/'.$done['img_team'].'" alt=""></div>
			  <div class="flo_lef wid_70 tex_center fon_siz_14">
			  <p class="caut"> '.$done['pseudo'].'</p>
				<p> '.$done['mes_dis'].'</p>

				</div>

				  </li>
					';	
					
                    }
				}
			   
		    }
			else
			{
			echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			}
			  
			  ?>
      
      
      <!--<li class="after">
      <div class="flo_lef wid_40d bmnom"><img src="img/team/jeannette.jpg" alt=""></div>
      <div class="flo_lef wid_70 tex_center fon_siz_14">
        <p> Bonjour c comen gar</p>
        
        </div>
      
    </li>-->
      
    </ul>
    <textarea id="cmes" name="cmes" placeholder="Chat here..." data-id="null"></textarea>
    <div class="eta_dis"></div>
    </div>
</div>
