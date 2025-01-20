<?php @session_start();
 require_once('../db_2_js.class.php');



if (!empty($_POST['nom'])  AND !empty($_POST['tel']) AND !empty($_POST['mes']))
{
			   
						       $req=$tams->prepare('INSERT INTO testimony (nom_tes, tel_tes, mes_tes, actif_tes, date_tes) 
					   VALUES (?,?,?,?,NOW()) ');
					   
					           $inser=$req->execute(array($_POST['nom'], $_POST['tel'], $_POST['mes'], 1));
					          
								if($inser)
								{
									
								       echo '<div class="ok_form blanc">Thank you</div>'.'';

								}
									
								else
								{
								 echo '<div class="no_form blanc">Error</div>';
								}
							

	
}
else{
	echo '<div class="no_form blanc">Champs Incorrects</div>';
}

?>
