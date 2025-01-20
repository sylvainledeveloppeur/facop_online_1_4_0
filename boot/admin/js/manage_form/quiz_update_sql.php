<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
$Beclas->checkUpd();

if(!empty($_POST['nivo']) AND !empty($_POST['lan'])  AND !empty($_POST['ques'])  AND !empty($_POST['repo'])  AND !empty($_POST['repo1']) AND !empty($_POST['repo2'])  AND !empty($_POST['repo3'])  AND !empty($_POST['repo4'])  /*AND !empty($_POST['desc']) */)
{ 
	$nivo=explode(" HHH ",$_POST['nivo']);

	$upd=$tams->query(" UPDATE quiz SET 
	idpack_q=\"".$nivo[0]."\", lang_q=\"".$_POST['lan']."\", question_q=\"".$_POST['ques']."\", reponse_q=\"".$_POST['repo']."\", reponse1_q=\"".$_POST['repo1']."\", reponse2_q=\"".$_POST['repo2']."\", reponse3_q=\"".$_POST['repo3']."\", reponse4_q=\"".$_POST['repo4']."\" WHERE id_q=\"".$_POST['id']."\" ");

									if($upd)
										{
                                            $Beclas->echoo1(1,"Successfully Updated");
                                            $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, Quiz ", $_POST['ques']); //notification
										}
										else
										{ 
										  $Beclas->echoo1(0,"ERROR: contact the developer"); 
										  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "Updated, Quiz: ERROR", $_POST['ques']);
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
				
				@unlink('../../../../source/img/lesson/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../../source/img/lesson/'.$Gimg2 ))
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