 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Author</th>
      <th scope="col">Message</th>
	  <th scope="col">File</th>
      <th >Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_m) nbr FROM _admin_message
		   WHERE id_desti_m=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>$_SESSION['id_admin']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_message LEFT JOIN _admin_team ON _admin_message.id_auteu_m=_admin_team.id WHERE id_desti_m=\''.$_SESSION['id_admin'].'\' ORDER BY id_m DESC ');
						
			   $tams->query('UPDATE _admin_message SET lu_m=1 WHERE id_desti_m=\''.$_SESSION['id_admin'].'\'  ');
					
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$fil=$done['file_m']!='null'? '<a href="document/'.$done['file_m'].'">Télécharger</a>' : 'No file';
				echo '
				 <tr>
      <td data-title="No">'.$ii.'</td>
      <td data-title="Author">'.$done['pseudo'].'</td>
      <td data-title="Message">'.$done['mes_m'].'</td>
      <td data-title="File">'.$fil.'</td>
      <td data-title="Date" colspan="2">
		 '.$done['date_m'].'
		<ul class="supedit">
			<li class="hide"><a href="ddf" data-table="_admin_message" data-champid="id_m" data-champ="actif_m" data-action="desactif"  data-id="'.$done['id_m'].'" class="action"><i class="fa fa-check" title="Disactivate product"></i></a></li>
		  <li><a href="#"><i class="fa fa-edit" title="Edit product"></i></a></li>
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="_admin_message" data-champid="id_m" data-champ="id_m" data-action="delete_file"  data-id="'.$done['id_m'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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