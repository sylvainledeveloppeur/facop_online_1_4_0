<?php @session_start(); 
require_once('../db_2_js.class.php');

if (!empty($_SESSION['id_admin']))
			{
$nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_historique_user
		   WHERE  lu=:pas " ) ;
           $nbr_pseudo->execute(array('pas'=>0));
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
		      