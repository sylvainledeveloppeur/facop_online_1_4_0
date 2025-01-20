 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Author</th>
      <th scope="col">Notification</th>
      <th >Date</th>
    </tr>
		   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_n) nbr FROM _admin_notification
		   WHERE id_desti_n=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>$_SESSION['id_admin']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_notification  WHERE id_desti_n=\''.$_SESSION['id_admin'].'\' ORDER BY id_n DESC ');
						
			   $tams->query('UPDATE _admin_notification SET lu_n=1 WHERE id_desti_n=\''.$_SESSION['id_admin'].'\'  ');
					
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$colo=$done['lu_n']==0? 'class="newnotifi"':'';
					
				echo '
				 <tr '.$colo.'>
      <td data-title="No">'.$ii.'</td>
      <td data-title="Author">'.$done['auteu_n'].'</td>
      <td data-title="Notification">'.$done['mes_n'].'</td>
      <td data-title="Date" colspan="2">
		 '.$done['date_n'].'
		</td>
    </tr>
			';	
					$ii++;

				}
			   
		    }
			else
			{
			echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			}
			?>
	  
	  
  </tbody>
</table>