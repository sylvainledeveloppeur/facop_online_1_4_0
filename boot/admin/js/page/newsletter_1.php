 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
     <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">E-mail</th>
      <th scope="col">Activation</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id_new) nbr FROM _admin_newsletter
		   WHERE actif_new=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>1));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_newsletter WHERE actif_new=1 ORDER BY id_new DESC LIMIT 100 ');
						
				  $ii=1;
				while($done=$bloc->fetch())
				{
				echo '
				 <tr>
    <td data-title="No">'.$ii.'</td>
      <td data-title="E-mail">'.$done['mail_new'].'</td>
      <td data-title="Activation">'.$done['actif_new'].'</td>
      <td data-title="Date">'.$done['date_new'].'
		  
		<ul class="supedit">
			<li><a href="ddf" data-table="_admin_newsletter" data-champid="id_new" data-champ="actif_new" data-action="desactif"  data-id="'.$done['id_new'].'" class="action"><i class="fa fa-check" title="Disactivate product"></i></a></li>
		  <li><a href="5d5ed"><i class="fa fa-edit" title="Edit product"></i></a></li>
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="_admin_newsletter" data-champid="id_new" data-champ="id_new" data-action="delete"  data-id="'.$done['id_new'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
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