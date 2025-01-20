<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();
	
if(!empty($_POST['nom']) AND !empty($_POST['nomen'])  AND !empty($_POST['pri'])  AND !empty($_POST['dur']) AND isset($_POST['cer']) AND !empty($_POST['desc']) AND !empty($_POST['descen']) AND !empty($_POST['img1']) AND !empty($_POST['img2']) AND !empty($_POST['img3']) AND !empty($_POST['img4']) /*AND !empty($_POST['desc']) */)
{
	
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pk) nbr FROM pack
		     WHERE titre=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['nom']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			 

				// A list of permitted file extensions
		$allowed = array("jpg","jpeg","png");
		$allowed2 = array("mp4");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0    )
		{

	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed)  )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $time=time();
				  $Gimg=$time.'.'.$extension;//nom grande img
				  $Video1=$time.'_fr.mp4';//nom min img
				  $Video2=$time.'_en.mp4';//nom min img  
				   
				  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../source/img/pack/'.$Gimg) )
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
						  
					$codnam=@$defaultClass_OB->toKen(3,'a1A');
					$codnum=@$defaultClass_OB->toKen(6,'1');
						  
					  $req=$tams->prepare('INSERT INTO pack (actif,	certificat,	codeName, codeNbr, 	img, introFR,  introEN, youtube_FR, youtube_EN, titre, titreEN,prix,dure, des, desEN,cible,etudiant, vu,datephp, datesql ) 
							   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');


                       
							  
							 $inser=$req->execute(array(0, $_POST['cer'], $codnam, $codnum, $Gimg, $_POST['img3'], $_POST['img4'], $_POST['img1'], $_POST['img2'], $_POST['nom'], $_POST['nomen'],  $_POST['pri'], $_POST['dur'], $_POST['desc'],  $_POST['descen'],"fr", 0, 0, $Beclas->phpDate()));
								
								
								
								 if($inser)
								{
									$Beclas->echoo1(1,"Successfully saved");
									$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Added, pack ", $_POST['nom']); //notification

								}
								else
								{
								  $Beclas->echoo1(0,"ERROR: contact the developer"); 
								  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Added, pack: ERROR ", $_POST['nom']);
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
			   $Beclas->echoo1(2,"INFO: élément déja enregistré, existant"); 
		   
		   }

}
else
{
	$Beclas->echoo1(0,"ERROR: Veuillez completer correctement tous les champs"); 
}

?>