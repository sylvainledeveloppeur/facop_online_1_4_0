<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();
	
if(!empty($_POST['nom']) AND !empty($_POST['nomen'])  AND !empty($_POST['nivo'])  AND !empty($_POST['dur'])  AND !empty($_POST['desc']) AND !empty($_POST['descen'])  /*AND !empty($_POST['desc']) */)
{
	$nivo=explode(" HHH ",$_POST['nivo']);
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pdf
		     WHERE titre=:pse  AND id_les_pf=:les  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['nom'] , 'les'=>$nivo[0]));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
				if(!is_file("../../../../source/pdf/lesson/".$_POST['desc']) AND !is_file("../../../../source/pdf/lesson/".$_POST['descen']))
									{

			   //$reSu=@$defaultClass_OB->addFil($_FILES['video'],1000000,'../../../../app/img/video/',array('mp4'));
			   
        // A list of permitted file extensions
		$allowed = array("pdf","pdf","pdf");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 AND isset($_FILES['img2']) && $_FILES['img2']['error'] == 0 )
		{

	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		 $extension2 = pathinfo($_FILES['img2']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) AND in_array(strtolower($extension2), $allowed) )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $Gimg=time().'.'.$extension;//nom grande img
				  // $Video=$_POST['video'];//nom min img
				   
				  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../source/pdf/lesson/'.$_POST['desc'] ) AND move_uploaded_file($_FILES['img2']['tmp_name'], '../../../../source/pdf/lesson/'.$_POST['descen'] ) )
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
									
									       $req=$tams->prepare('INSERT INTO pdf (actif_pf, id_les_pf, lesson,lesson_code,titre,titreEN, link, linkEN, pg,datephp,datesql ) 
											VALUES (?,?,?,?,?, ?,?,?,?,?,NOW()) ');


									
											
											$inser=$req->execute(array(0, $nivo[0], $nivo[1], 0, $_POST['nom'], $_POST['nomen'], $_POST['desc'],  $_POST['descen'], $_POST['dur'],  time()));
												
												
												
												if($inser)
												{
													$Beclas->echoo1(1,"Successfully saved");
													$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, PDF ", $_POST['nom']); //notification

												}
												else
												{
												$Beclas->echoo1(0,"ERROR: contact the developer"); 
												$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, PDF: ERROR ", $_POST['nom']);
												}
												
								
								
							}



		}
		else
		{
		$Beclas->echoo1(0,"ERROR: Veuilez selectionner une image"); 
		
		}
	
}
					
				}
												
				else
				{
				$Beclas->echoo1(0,"ERROR: Fichiers PDF existe déjà avec ce nom sur le serveur!!"); 

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