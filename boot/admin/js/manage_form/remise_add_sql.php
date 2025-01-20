<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();

if(!empty($_POST['user'])  AND !empty($_POST['remi'])  /*AND !empty($_POST['desc']) */)
{
	$user=explode(" HHH ",$_POST['user']);
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_remi) nbr FROM user_remise
		     WHERE id_user=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$user[0]));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
			   //$reSu=@$defaultClass_OB->addFil($_FILES['video'],1000000,'../../../../app/img/video/',array('mp4'));
			   
        // A list of permitted file extensions
		/*$allowed = array("jpg","jpeg","png");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 )
		{

	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) )
			{
				if($_FILES['aimg']['size']<=1000000  )
			   {
				  $Gimg=time().'.'.$extension;//nom grande img
				  // $Video=$_POST['video'];//nom min img
				   
				  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../img/matiere/'.$Gimg ) )
				  {	
				  

						  //redimention avatar
						$max = 378;
						$source=imagecreatefromjpeg('../../../../source/img/store/'.$Gimg); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x = imagesx($source);
						$y = imagesy($source);

						if($x!=600 or $y!=600)
						{
							
						exit('<div id="noadtat">Your picture must have this size (600 x 600) px</div>');

						}
					  $tatu=true;
				  }

		//save base de donnée
				
					  if($tatu)
							{*/
						  
					
								$req=$tams->prepare('INSERT INTO user_remise  ( id_user, remise, actif_remi, phpdate_remi, sqldate_remi ) 
								VALUES (?,?,?,?,NOW()) ');
								$inser=$req->execute(array(  $user[0], $_POST["remi"], 0, $Beclas->phpDate() ));

								
								
								 if($inser)
								{
									
									$Beclas->echoo1(1,"Successfully saved");
									$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, Rémise ".$_POST["remi"]."%", $user[1]); //notification 1709722171347 HHH 727 HHH foca30 HHH 87726 HHH sylvainledeveloppeur@gmail.com HHH balo35 HHH wini45 HHH 12 HHH 3 HHH facop_a3 HHH Pack: Facop A3 HHH 100 HHH FLUTTERWAVE_MOBILE HHH FLUTTERWAVE_MOBILE_CM_XAF

									 //isertion user notification
									 $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti, lu_noti, suj_noti, desc_noti,  someout_noti, somenew_noti, phpdate_noti,	sqldate_noti ) 
									 VALUES (?,?,?,?,?,?,?,NOW()) ');
									 $inser=$req->execute(array( $user[0], 0, "Offre", "Facop vous à offer une rémise de (".$_POST["remi"]."%) sur vos achat d'au moins deux packs ",0,0, $Beclas->phpDate() ));

									  // isertion de achat dans l historique admin de la db
									  $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu, user, emai, ip ,type, messag,lu,dates ) 
									  VALUES (?,?,?,?,?,?,?,NOW()) ');
									  $inser=$req->execute(array($user[0], $user[1], "---", $_SERVER["REMOTE_ADDR"],"OFFRE REMISE", $_SESSION['pseu'].", a offert une rémise de (".$_POST["remi"]."%) à ".$user[1].". Parrain direct:---. Parrain indirect:--- _(ANDROID)",0));



								}
								else
								{
								  $Beclas->echoo1(0,"ERROR: contact the developer"); 
								  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Added, Classe: Matière ", $_POST['user']);
								}
								
								
							/*}



		}
		else
		{ 
			$Beclas->echoo1(0,"ERROR: Veuilez selectionner une image"); 
		
		}
	
}*/
	
		   }
		   else
		   {
			   $Beclas->echoo1(2,"INFO: élément déja enregistré, existant"); 
		   
		   }

}
else
{
	$Beclas->echoo1(0,"ERROR: Veuillez completer correctement tous les champs"); 
}



?>