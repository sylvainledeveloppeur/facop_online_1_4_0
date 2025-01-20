<?php @session_start();
 require_once('../db_2_js.class.php');


$mail=$_POST['mail'];
if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mail))
{
			    //recherche du pseudo
		   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_new) nbr FROM newsletter
		   WHERE mail_new=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$mail));
           $chif_pse=$nbr_pseudo->fetch();
   
						   if ($chif_pse['nbr']==0)
							{
						       $req=$tams->prepare('INSERT INTO newsletter (nom_new,mail_new,actif_new,date_new) 
					   VALUES (?,?,?,NOW()) ');
					   
					           $inser=$req->execute(array("0",$mail,1));
					          
								if($inser)
								{
									
								       echo '<div class="ok_form blanc">Thank you</div>'.'';

								}
									
								else
								{
								 echo '<div class="stop_form blanc">Error</div>';
								}
							}
							else
							{
							 echo '<div class="stop_form blanc">Already subscribe</div>';	
							}

	
}
else{
	echo '<div class="stop_form blanc">Incorrect E-mail </div>';
}

?>
