<?php   @session_start(); 
require_once('../db_2_js.class.php');

if (!empty($_SESSION['id_admin']))
			{
			     $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team
		   " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			  
			   // ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.
							$timestamp_5min = time() - (60 * 2); // 60 * 5 = nombre de secondes écoulées en 5 minutes
			                $tim=time();
			         
			     
			   $eta=$tams->query('UPDATE _admin_team SET online=1, online_time='.$tim.' WHERE  id=\''.$_SESSION['id_admin'].'\'');
               $eta=$tams->query('UPDATE _admin_team SET online=0 WHERE  online_time <' .$timestamp_5min);
			   
			$bloc=$tams->query('SELECT * FROM _admin_team WHERE id!=1 ORDER BY RAND() ');
						
				  $ii=1;
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
					$ii++;

				}
			   
		    }
			else
			{
			echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			}

}
			else
			{
			     echo '<script type="text/javascript"> window.setTimeout("location=(\'log-out.php\');",1000) </script>';
			
			}
			  
			  ?>