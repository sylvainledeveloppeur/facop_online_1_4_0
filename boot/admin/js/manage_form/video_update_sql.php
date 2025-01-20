<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkUpd();

if(!empty($_POST['nom']) AND !empty($_POST['nomen']) AND !empty($_POST['nivo'])   AND !empty($_POST['dur'])   /*AND !empty($_POST['desc']) */)
{ 
	

								$nivo=explode(" HHH ",$_POST['nivo']);

								$upd=$tams->query(" UPDATE video SET 
								titre=\"".$_POST['nom']."\", titreEN=\"".$_POST['nomen']."\",  id_les_vi=\"".$nivo[0]."\",  lesson=\"".$nivo[1]."\", lesson_code=\"".$nivo[2]."\",dure=\"".$_POST['dur']."\", link=\"".$_POST['img3']."\", linkEN=\"".$_POST['img4']."\", youtube_FR=\"".$_POST['img1']."\", youtube_EN=\"".$_POST['img2']."\"   WHERE id_vi=\"".$_POST['id']."\" ");

																if($upd)
										{
                                            $Beclas->echoo1(1,"Successfully Updated");
                                            $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, vidéo ", $_POST['nom']); //notification
										}
										else
										{ 
										  $Beclas->echoo1(0,"ERROR: contact the developer"); 
										  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, vidéo: ERROR", $_POST['nom']);
										}
				
	
}
else
{
	$Beclas->echoo1(0,"All fields are required");
}



//*****************************image 1
 // A list of permitted file extensions
 $allowed = array("jpg","jpeg","png");
 $allowed2 = array("mp4");
 
if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0) 
		{

			$extension = pathinfo($_FILES['aimg']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../source/img/video/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../../source/img/video/'.$Gimg2 ))
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
				
				@unlink('../../../../source/video/lesson/'.$video2);
				  if(move_uploaded_file($_FILES['aimg1']['tmp_name'], '../../../../source/video/lesson/'.$video2 ))
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
					  
					 
				echo '<div class="ok_form">Vidéo FR modifiée</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une vidéo au format "vidéo.mp4"</div>';

			}

		}

// video 2222222222222
	
		if(isset($_FILES['aimg2']) && $_FILES['aimg2']['error'] == 0)
		{

			// A list of permitted file extensions
			$allowed = array("mp4");
			$video2=$_POST['imag2'];

			$extension = pathinfo($_FILES['aimg2']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag2'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../source/video/lesson/'.$video2);
				  if(move_uploaded_file($_FILES['aimg2']['tmp_name'], '../../../../source/video/lesson/'.$video2 ))
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
					  
					 
				echo '<div class="ok_form">Vidéo EN modifiée</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une vidéo au format "vidéo.mp4"</div>';

			}

		}


?>