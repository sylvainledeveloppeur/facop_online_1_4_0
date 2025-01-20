<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkUpd();

if(!empty($_POST['nom']) AND !empty($_POST['nomen'])  AND !empty($_POST['pri'])  AND !empty($_POST['dur']) AND !empty($_POST['codnam']) AND isset($_POST['codnum']) AND isset($_POST['cer']) AND !empty($_POST['desc']) AND !empty($_POST['descen'])  /*AND !empty($_POST['desc']) */)
{ 
					 						
	$upd=$tams->query(" UPDATE pack SET 
	titre=\"".$_POST['nom']."\", titreEN=\"".$_POST['nomen']."\", prix=\"".$_POST['pri']."\", dure=\"".$_POST['dur']."\", codeName=\"".$_POST['codnam']."\", codeNbr=\"".$_POST['codnum']."\", certificat=\"".$_POST['cer']."\", des=\"".$_POST['desc']."\", desEN=\"".$_POST['descen']."\", introFR=\"".$_POST['img3']."\", introEN=\"".$_POST['img4']."\", youtube_FR=\"".$_POST['img1']."\", youtube_EN=\"".$_POST['img2']."\"   WHERE id_pk=\"".$_POST['id']."\" ");

									if($upd)
										{
                                            $Beclas->echoo1(1,"Successfully Updated");
                                            $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, Pack ", $_POST['nom']); //notification
										}
										else
										{ 
										  $Beclas->echoo1(0,"ERROR: contact the developer"); 
										  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, Pack: ERROR", $_POST['nom']);
										}
	
}
else
{
	$Beclas->echoo1(0,"All fields are required");
}



//*****************************image 1
 // A list of permitted file extensions
 $allowed = array("jpg","jpeg","png");
 
if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0) 
		{

			$extension = pathinfo($_FILES['aimg']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../source/img/pack/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../../source/img/pack/'.$Gimg2 ))
				  {	
				  

						 /* //redimention avatar
						$max = 378;
						$source=imagecreatefromjpeg('../../../../source/img/store/'.$tes); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x = imagesx($source);
						$y = imagesy($source);

						if($x!=560 or $y!=355)
						{
							
						exit('<div id="noadtat">Your picture must have this size (560 x 355) px</div>');

						}
					  
					      $nx=$x;
						  $ny=$y;
						

						$destination= imagecreatetruecolor($nx,$ny);
						$nx = imagesx($destination);
						$ny= imagesy($destination);
						//On crée l'avatar
						imagecopyresampled ($destination, $source, 0, 0, 0, 0,
						$nx, $ny, $x,
						$y);
						// On enregistre l'avatar avec le meme nom pour remplace l'ancien
							
						$tatu2=imagejpeg($destination, '../../../../source/img/gallery/'.$Gimg2);

					  
					  
  @unlink('../../../../source/img/gallery/'.$tes);*/
					  
					
                       $Beclas->echoo1(1,"Successfully: Image 1 updated"); 
				  }
			
			}
			else
			{
			   $Beclas->echoo1(0,"Veuilez selectionner une image au format: image.png, image.jpg"); 
			}

		}




//*****************************video 1

	 
if(isset($_FILES['aimg1']) && $_FILES['aimg1']['error'] == 0)
		{

			// A list of permitted file extensions
			$allowed = array("mp4");
			$video2=$_POST['imag1'];

			$extension = pathinfo($_FILES['aimg1']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag1'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../source/video/pack/'.$video2);
				  if(move_uploaded_file($_FILES['aimg1']['tmp_name'], '../../../../source/video/pack/'.$video2 ))
				  {	
				  

						 /* //redimention avatar
						$max = 378;
						$source=imagecreatefromjpeg('../../../../source/img/store/'.$tes); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x = imagesx($source);
						$y = imagesy($source);

						if($x!=560 or $y!=355)
						{
							
						exit('<div id="noadtat">Your picture must have this size (560 x 355) px</div>');

						}
					  
					      $nx=$x;
						  $ny=$y;
						

						$destination= imagecreatetruecolor($nx,$ny);
						$nx = imagesx($destination);
						$ny= imagesy($destination);
						//On crée l'avatar
						imagecopyresampled ($destination, $source, 0, 0, 0, 0,
						$nx, $ny, $x,
						$y);
						// On enregistre l'avatar avec le meme nom pour remplace l'ancien
							
						$tatu2=imagejpeg($destination, '../../../../source/img/gallery/'.$Gimg2);

					  
					  
  @unlink('../../../../source/img/gallery/'.$tes);*/
					  
					 
				echo '<div class="ok_form">Vidéo (fr) modifié</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une vidéo au format "video.mp4"</div>';

			}

		}

// video 2222222222222
	
		if(isset($_FILES['aimg2']) && $_FILES['aimg2']['error'] == 0)
		{

			// A list of permitted file extensions
			$allowed = array("mp4");
			$pdf2=$_POST['imag2'];

			$extension = pathinfo($_FILES['aimg2']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag2'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../source/video/pack/'.$pdf2);
				  if(move_uploaded_file($_FILES['aimg2']['tmp_name'], '../../../../source/video/pack/'.$pdf2 ))
				  {	
				  

						 /* //redimention avatar
						$max = 378;
						$source=imagecreatefromjpeg('../../../../source/img/store/'.$tes); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x = imagesx($source);
						$y = imagesy($source);

						if($x!=560 or $y!=355)
						{
							
						exit('<div id="noadtat">Your picture must have this size (560 x 355) px</div>');

						}
					  
					      $nx=$x;
						  $ny=$y;
						

						$destination= imagecreatetruecolor($nx,$ny);
						$nx = imagesx($destination);
						$ny= imagesy($destination);
						//On crée l'avatar
						imagecopyresampled ($destination, $source, 0, 0, 0, 0,
						$nx, $ny, $x,
						$y);
						// On enregistre l'avatar avec le meme nom pour remplace l'ancien
							
						$tatu2=imagejpeg($destination, '../../../../source/img/gallery/'.$Gimg2);

					  
					  
  @unlink('../../../../source/img/gallery/'.$tes);*/
					  
					 
				echo '<div class="ok_form">Vidéo (en) modifié</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une vidéo au format "vidéo.mp4"</div>';

			}

		}


?>