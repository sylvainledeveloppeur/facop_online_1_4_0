 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">IP Address </th>
      <th scope="col">Action</th>
      <th scope="col">Browser</th>
	  <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_his) nbr FROM _admin_historique WHERE id_te_his=:pse
		    " ) ;
           $nbr_pseudo->execute(array('pse'=>$_SESSION['id_admin']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total connection: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_historique WHERE id_te_his='.$_SESSION['id_admin'].' ORDER BY id_his DESC ');
						
				  $ii=1;
				while($done=$bloc->fetch())
				{
				echo '
				 <tr>
      <td data-title="IP Address" >'.$done['ip_his'].'</td>
      <td data-title="Action">'.$done['mes_his'].'</td>
      <td data-title="Browser">'.$done['navigateu_his'].'</td>
      <td data-title="Date">'.$done['date_his'].'
	  
		<ul class="supedit">
			<li  class="hide"><a href="ddf" data-table="_admin_historique" data-champid="id_8" data-champ="actif_8" data-action="desactif"  data-id="'.$done['id_his'].'" class="action"><i class="fa fa-check" title="Disactivate product"></i></a></li>
		  <li><a href="5d5ed"><i class="fa fa-edit" title="Edit product"></i></a></li>
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="_admin_historique" data-champid="id_his" data-champ="id_te_his" data-action="delete"  data-id="'.$done['id_his'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
		  </ul></td>
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