<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();

if(!empty($_POST['user'])  AND !empty($_POST['nivo'])  /*AND !empty($_POST['desc']) */)
{
	$user=explode(" HHH ",$_POST['user']);
	$nivo=explode(" HHH ",$_POST['nivo']);
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_ubk) nbr FROM user_book
		     WHERE pseudo_user_ubk=:pse AND id_book_ubk=:pse2 " ) ;
           $nbr_pseudo->execute(array('pse'=>$user[1], 'pse2'=>$nivo[0]));
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
						  
					
								$req=$tams->prepare('INSERT INTO user_book  (id_user_ubk, pseudo_user_ubk, id_book_ubk, actif_ubk, datephp, datesql  ) 
								VALUES (?,?,?,?,?,NOW()) ');
								$inser=$req->execute(array( $user[0], $user[1], $nivo[0], 0, $Beclas->phpDate() ));

								
								
								 if($inser)
								{
									
									$Beclas->echoo1(1,"Successfully saved");
									$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, Livre utilisateur ".$nivo[1], $user[1]); //notification 1709722171347 HHH 727 HHH foca30 HHH 87726 HHH sylvainledeveloppeur@gmail.com HHH balo35 HHH wini45 HHH 12 HHH 3 HHH facop_a3 HHH Pack: Facop A3 HHH 100 HHH FLUTTERWAVE_MOBILE HHH FLUTTERWAVE_MOBILE_CM_XAF

									 //isertion user notification
									 $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti, suj_noti, desc_noti, phpdate_noti,	sqldate_noti ) 
									 VALUES (?,?,?,?,?,NOW()) ');
									 $inser=$req->execute(array( $user[0], 0, "Offre", "Facop vous à offer le livre (".$nivo[1].") ", $Beclas->phpDate() ));

									  // isertion de achat dans l historique admin de la db
									  $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu, user, emai, ip ,type, messag,lu,dates ) 
									  VALUES (?,?,?,?,?,?,?,NOW()) ');
									  $inser=$req->execute(array($user[0], $user[1], "---", $_SERVER["REMOTE_ADDR"],"OFFRE LIVRE", $_SESSION['pseu'].", a offert le Livre (".$nivo[1].") à ".$user[1]." _(ANDROID)",0));



								}
								else
								{
								  $Beclas->echoo1(0,"ERROR: contact the developer"); 
								  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Added, Classe: Matière ", $_POST['nom']);
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