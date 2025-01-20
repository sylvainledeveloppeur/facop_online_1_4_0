<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();
	
if(!empty($_POST['nom']) AND !empty($_POST['nomen'])  AND !empty($_POST['nivo'])  AND !empty($_POST['dur'])   /*AND !empty($_POST['desc']) */)
{
	$nivo=explode(" HHH ",$_POST['nivo']);
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_vi) nbr FROM video
		     WHERE titre=:pse AND id_les_vi=:les " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['nom'] , 'les'=>$nivo[0]));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
			   //$reSu=@$defaultClass_OB->addFil($_FILES['video'],1000000,'../../../../app/img/video/',array('mp4'));
			   
        // A list of permitted file extensions
		$allowed = array("jpg","jpeg","png");
		$allowed2 = array("mp4");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 )
		{
			$tatu=false;
	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed)   )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				$time=time();
				  $Gimg=$time.'.'.$extension;//nom grande img
				  $Video1=$time.'_fr.mp4';//nom min img
				  $Video2=$time.'_en.mp4';//nom min img  AND move_uploaded_file($_FILES['img1']['tmp_name'], '../../../../source/video/lesson/'.$Video1 )  AND move_uploaded_file($_FILES['img2']['tmp_name'], '../../../../source/video/lesson/'.$Video2 ) 
				   
				  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../source/img/video/'.$Gimg) ) 
				  {	
				  

						  //redimention avatar
						/*$max = 378;
						$source=imagecreatefromjpeg('../../../../source/img/store/'.$Gimg); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x = imagesx($source);
						$y = imagesy($source);

						if($x!=600 or $y!=600)
						{
							
						exit('<div id="noadtat">Your picture must have this size (600 x 600) px</div>');

						}*/
					  $tatu=true;
				  }

		/*save base de donnée*/
					

					  if($tatu)
							{
							
										   $nivo=explode(" HHH ",$_POST['nivo']);
									
									       $req=$tams->prepare('INSERT INTO video (actif_vi, id_les_vi, lesson,lesson_code,titre,titreEN, link, linkEN, youtube_FR, youtube_EN, dure,img,datephp, datesql ) 
											VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');


									
											
											$inser=$req->execute(array(0, $nivo[0], $nivo[1], $nivo[2], $_POST['nom'], $_POST['nomen'], $_POST['img3'], $_POST['img4'], $_POST['img1'], $_POST['img2'],  $_POST['dur'], $Gimg, time()));
												
												
												
												if($inser)
												{
													$Beclas->echoo1(1,"Successfully saved");
													$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, vidéo ", $_POST['nom']); //notification

												}
												else
												{
												$Beclas->echoo1(0,"ERROR: contact the developer"); 
												$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, vidéo: ERROR ", $_POST['nom']);
												}
												
								
								
							}
							else
							{
							$Beclas->echoo1(0,"ERROR: Impossible de télécharger les vidéos"); 
							
							}



		}
		else
		{
		$Beclas->echoo1(0,"ERROR: Veuilez selectionner 1 image et 2 vidéos"); 
		
		}
	
} 

else
{
	$Beclas->echoo1(2,"ERROR: fichier: ".$_FILES["img"]["error"]); 

}
	
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