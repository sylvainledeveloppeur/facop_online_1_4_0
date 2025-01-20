<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkUpd();

if(!empty($_POST['nom']) AND !empty($_POST['nomen']) AND !empty($_POST['nivo'])   AND !empty($_POST['dur']) AND !empty($_POST['desc']) AND !empty($_POST['descen'])  /*AND !empty($_POST['desc']) */)
{ 
	if(is_file("../../../../source/video/lesson/".$_POST['desc']) AND is_file("../../../../source/video/lesson/".$_POST['descen']))
				{

								$nivo=explode(" HHH ",$_POST['nivo']);

								$upd=$tams->query(" UPDATE video SET 
								titre=\"".$_POST['nom']."\", titreEN=\"".$_POST['nomen']."\",  id_les_vi=\"".$nivo[0]."\",  lesson=\"".$nivo[1]."\", dure=\"".$_POST['dur']."\", link=\"".$_POST['desc']."\", linkEN=\"".$_POST['descen']."\"   WHERE id_vi=\"".$_POST['id']."\" ");

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
				$Beclas->echoo1(0,"ERROR: Fichiers vidéos introuvable sur le serveur!!");
				
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




//*****************************image 2

	 // A list of permitted file extensions
		$allowed = array("mp4");
if(isset($_FILES['aimg2']) && $_FILES['aimg2']['error'] == 0)
		{

			$extension = pathinfo($_FILES['aimg2']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_POST['imag2'];//nom grande img
				   $tes='tes.jpg';
				
				@unlink('../../../../app/video/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg2']['tmp_name'], '../../../../app/video/'.$Gimg2 ))
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
					  
					 
				echo '<div class="ok_form">Vidéo modifiée</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une vidéo au format "vidéo.mp4"</div>';

			}

		}


?>