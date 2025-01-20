<?php @session_start(); 
require_once('../db_2_js.class.php');
	
if (!empty($_SESSION['id_admin']))
			{
/*
      if(!empty($_POST['typechat']) AND $_POST['typechat']!="null" AND $_POST['typechat']!=$_SESSION['id_admin'])//verifier si le dialogue est entre 2 membres (sinon c est le groupe)
	  {
		  
		$nbr_pseudo=$tams->prepare("SELECT COUNT(id_dis) nbr FROM _admin_discussion" ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			  
			$bloc=$tams->query('SELECT * FROM _admin_discussion LEFT JOIN _admin_team  ON _admin_discussion.id_te_dis=_admin_team.id WHERE
			id_te_dis=0 AND   ORDER BY id_dis ASC LIMIT 100 ');
						
				 
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
		  
	  }
else
{*/
	$nbr_pseudo=$tams->prepare("SELECT COUNT(id_dis) nbr FROM _admin_discussion" ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			  
			$bloc=$tams->query('SELECT * FROM _admin_discussion LEFT JOIN _admin_team  ON _admin_discussion.id_te_dis=_admin_team.id WHERE lu_dis=0 AND id_te_dis!=1  ORDER BY id_dis ASC LIMIT 100 ');
						
				 
				while($done=$bloc->fetch())
				{
					$ava=is_file('../../img/team/'.$done['img_team']) ? 'img/team/'.$done['img_team']: 'img/avatar.png';
				
					if($done['id_te_dis']==$_SESSION['id_admin'])
					{
						echo '
						<li class="after">
			  
			  <div class="flo_lef wid_70 tex_center fon_siz_14">
				<p> '.$done['mes_dis'].'</p>

				</div>
                   <div class="flo_lef wid_40d bmnom"><img src="'.$ava.'" alt=""></div>
				  </li>
					';	
					
                    }
					else{
						echo '
						<li class="after">
			  <div class="flo_lef wid_40d bmnom"><img src="'.$ava.'" alt=""></div>
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
	
/*}*/



			 echo  '<script>element = document.getElementById("ulchat");
element.scrollTop = element.scrollHeight;</script>'; 

}
			else
			{
			     echo '<script type="text/javascript"> window.setTimeout("location=(\'log-out.php\');",1000) </script>';
			
			}
			  ?>