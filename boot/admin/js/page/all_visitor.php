 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ip Adress </th>
      <th scope="col">Online</th>
      <th scope="col">Device</th>
      <th scope="col">Page view</th>
	  <th scope="col">First Date</th>
      <th scope="col" >Last Date</th>
      <th scope="col" >OS</th>
      <th scope="col" >Browser</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_vis) nbr FROM _admin_visite
		    " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_visite  ORDER BY datevist2_vis DESC ');
				
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
					$online=($done['online_vis']< $timestamp_5min) ? 'Offline':'<mark>Online</mark>';
				echo '
				 <tr>
      <td data-title="No">'.$ii.'</td>
      <td data-title="ip Adress"> <a href="https://www.ip2location.com/'.$done['ip_vis'].'" target="_blank" >'.$done['ip_vis'].'</a></td>
      <td data-title="Online">'.$online.'</td>
      <td data-title="Device">'.$done['devise_vis'].'</td>
      <td data-title="Page view">'.$done['page_vis'].'</td>
      <td data-title="First Date">'.$done['datevist1_vis'].'</td>
      <td data-title="Last Date">'.$done['datevist2_vis'].'</td>
      <td data-title="OS">'.$done['os_vis'].'</td>
      <td data-title="Browser">'.$done['bs_vis'].'</td>
    </tr>
			';	
					$ii++;

				}
			   
		    }
			else
			{
			echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			}
	  
	  
	  
	  
	  
	  //insert visite***************************************************************************
	/*if(!empty($_SERVER['REMOTE_ADDR']))
				{
					
					$defaultClass_OB->InserVisite($tams,$defaultClass_OB,$_SERVER['REMOTE_ADDR'],dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
				}
				else{
					
					//$defaultClass_OB->InserVisite($tams,$defaultClass_OB,0);
				}*/
	/*public function InserVisite($tams,$defaultClass_OB,$ip,$page)
	{
				if(!empty($ip) AND !empty($page))				
				{
					// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
				
		   $nbr_pseudo1=$tams->prepare("SELECT COUNT(id_vis) nbr FROM _admin_visite WHERE ip_vis=:ip  " );
           $nbr_pseudo1->execute(array("ip"=>$ip));
           $chif_pse1=$nbr_pseudo1->fetch();
					

								  if ($chif_pse1['nbr'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
								  {
								  $req=$tams->prepare('INSERT INTO _admin_visite (ip_vis,datevist1_vis,datevist2_vis,page_vis) 
												   VALUES (?,NOW(),NOW(),? ) ');

									 $inser=$req->execute(array($ip,$page));

								  }
								  else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
								  {
								   $tams->query('UPDATE _admin_visite SET datevist2_vis=NOW(),page_vis=\'' .$page. '\' WHERE ip_vis=\'' . $ip. '\' ');
								  }
									
				}
		
	}*/
			?>
	  
	  
  </tbody>
</table>