<?php @session_start(); $_SESSION["admin"]=1;
if($_SESSION["updat"]==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
	{
require_once('../db_2_js.class.php');

if( !empty($_POST['nom']) AND !empty($_POST['pos'])  AND !empty($_POST['tac'])  AND !empty($_POST['adr']) AND !empty($_POST['desc'])    )
{
					 
							
	$upd=$tams->query(" UPDATE staff SET 
	nom=\"".$_POST['nom']."\", pos=\"".$_POST['pos']."\", tac=\"".$_POST['tac']."\", adr=\"".$_POST['adr']."\", des=\"".$_POST['desc']."\" WHERE id_sta=\"".$_POST['id']."\" ");


									if($upd)
										{
										 //notification
	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
    $inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"You have updated Staff infos '".$_POST['nom']."'",0));
	
	//historiq								
	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");
    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],"You have updated Staff infos  '".$_POST['nom']."'",$_SERVER['HTTP_USER_AGENT']));
		
										
										
											echo '<div class="ok_form">Updated</div>';	
										}
								
			
	
	
}
else
{
	
	echo '<div id="noadtat">All fields are required</div>';
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
				
				@unlink('../../../../source/img/staff/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../../source/img/staff/'.$Gimg2 ))
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
					  
					 
				echo '<div class="ok_form">Image 1 Modifiée</div>';	
				  }
			
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une image au format "image.png ou image.jpg"</div>';

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

	}
else
{ echo '<td colspan="5" class="stop_form">Impossible! You don\'t have the rights</td>';}

?>