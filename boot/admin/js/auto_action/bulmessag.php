<?php @session_start(); 
require_once('../db_2_js.class.php');

if (!empty($_SESSION['id_admin']))
			{
$nbr_pseudo=$tams->prepare("SELECT COUNT(id_m) nbr FROM _admin_message
		   WHERE id_desti_m=:pse AND lu_m=:pas " ) ;
           $nbr_pseudo->execute(array('pse'=>$_SESSION['id_admin'],'pas'=>0));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<span class="bul">'.$chif_pse['nbr'].'</span>';
		   }
				
			}
			else
			{
			     echo '<script type="text/javascript"> window.setTimeout("location=(\'log-out.php\');",1000) </script>';
			
			}
				?>