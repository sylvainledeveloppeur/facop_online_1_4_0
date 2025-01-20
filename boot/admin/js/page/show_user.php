<?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
 <div class="backadmin btn linkd" data-page="settings" data-title="Edit settings"><i class="fa fa-arrow-circle-o-left"></i>Go back</div>

<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Picture</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
      <th scope="col">Date</th>
    </tr>
	   </thead>
	   <!--555555555-->
               <?php 
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team
		   WHERE droit_team!=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>2));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<div class="ok_form tex_center mar_top_40">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query('SELECT * FROM _admin_team WHERE droit_team!=2 ORDER BY id DESC LIMIT 100 ');
						
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$ava=is_file('../../img/team/'.$done['img_team']) ? 'img/team/'.$done['img_team']: 'img/avatar.png';
				echo '
				 <tr>
      <td data-title="No" >'.$ii.'</td>
      <td data-title="Picture"><img src="'.$ava.'" alt=""></td>
      <td data-title="Username">'.$done['pseudo'].'</td>
      <td data-title="Role">'.$done['role_team'].'</td>
      <td  data-title="Date">'.$done['date_team'].'
		 
		<ul class="supedit">
			<li class="hide"><a href="ddf" data-table="_lescomand" data-champid="id_and" data-champ="livre_and" data-action="desactif"  data-id="'.$done['id'].'" class="action"><i class="fa fa-check" title="Disactivate product"></i></a></li>
		  <li class="linkd" data-id="'.$done['id'].'" data-page="show_1_user" data-title="Update user informations"><i class="fa fa-edit" title="Edit product"></i></li>
			<li class="Udelet"><i class="fa fa-remove" title="Delete product"></i></li>
			<a href="gf" data-table="_admin_team" data-champid="id" data-champ="../../img/team/'.$done['img_team'].'" data-action="delete_sql"   data-id="'.$done['id'].'" class="Uconfirm action"><i class="fa fa-remove" title="Delete product">Confirm</i></a>
			
			<li class="linkd" data-id="'.$done['id'].'" data-page="show_1_user" data-title="One user informations"><i class="fa fa-eye" title="See user informations"></i></li>
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