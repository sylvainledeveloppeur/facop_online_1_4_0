<?php include_once('../../../../../section/hide_error.php');
// A list of permitted file extensions
		$allowed = array('jpg','jpeg');
        $allowed_png = array('png');
        $allowed_gif = array('gif');

if(isset($_FILES['img']) && $_FILES['img']['error'] == 0)
		{

			$extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

/******créer img a partir du jpeg***************************************************************************************/
			if(in_array(strtolower($extension), $allowed))
			{
				/*if($_FILES['img']['size']<=1000000  )
			   {*/
					$img_nom=time();
				    $origine=$img_nom.".jpg";
				   move_uploaded_file($_FILES['img']['tmp_name'], '../../img/'.$origine);
				  
				   
				   
				    //dimention img
						$x =400 ;
				        $y =400 ;
						$source=imagecreatefromjpeg( '../../img/'.$origine); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x2 = imagesx($source);
						$y2 = imagesy($source);
				   
				  if($x2>$x AND $y2>$y )
			    {
					 
				$miniature1=$img_nom."_min.jpg";
					  
			//redimention avatar************************************
				$max = 400;
				$source=imagecreatefromjpeg('../../img/'.$origine); // La photo  source
				//Dimension de l'image pr savoir comment crée la miniatur
				$x = imagesx($source);
				$y = imagesy($source);
				
				if($x>$max or $y>$max)
                {
                    if($x>$y)
					{
						$nx = $max;
					    $ny = $y/($x/$max);
					}
					else
					{
						$nx = $x/($y/$max);
					    $ny = $max;
					}
		

                }
			    else
			    {
				  $nx=$x;
				  $ny=$y;
			    }

                $destination= imagecreatetruecolor($nx,$ny);
				$nx = imagesx($destination);
				$ny= imagesy($destination);
				//On crée l'avatar
				imagecopyresampled ($destination, $source, 0, 0, 0, 0,
				$nx, $ny, $x,
				$y);
				// On enregistre l'avatar avec le meme nom pour remplace l'ancien
					
				$save_min=imagejpeg($destination, '../../img/'.$miniature1);
					  
				//fin redimention et sauvegarde*****************************
					 if($save_min) 
					 {
						 unlink('../../img/'.$origine);
						 
						$last_min=imagecreatefromjpeg('../../img/'.$miniature1); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$mx = imagesx($last_min);
						$my = imagesy($last_min); 

							if($mx>200 AND $my>200) 
							 {

														
echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&crop='.$img_nom.'\');",1000) </script>';

		
							 }
						 else
							{
							echo  '<div id="noadtat">Veuilez selectionner une image plus grande</div>';

							 unlink('../../img/'.$miniature1);
							}
					  
					 }
				 

				} 
			 else
				{
				
				   unlink('../../img/'.$origine);
					  
				 echo  '<div id="noadtat">Veuilez selectionner une image aux dimentions supérieur à 400 x 400 px</div>';

				}
				   
			  // }
			/*	else
				{
				echo  '<div id="noadtat">Veuilez selectionner une image de moin de 1 Mo</div>';

				}*/
			}
	
/******créer img a partir du png***************************************************************************************/
			elseif(in_array(strtolower($extension), $allowed_png))
			{
				/*if($_FILES['img']['size']<=1000000  )
			   {*/
					$img_nom=time();
				    $origine=$img_nom.".png";
				   move_uploaded_file($_FILES['img']['tmp_name'], '../../img/'.$origine);
				  
				   
				   
				    //dimention img
						$x =400 ;
				        $y =400 ;
						$source=@imagecreatefrompng( '../../img/'.$origine); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x2 = imagesx($source);
						$y2 = imagesy($source);
				   
				  if($x2>$x AND $y2>$y )
			    {
					 
				$miniature1=$img_nom."_min.png";
					  
			//redimention avatar************************************
				$max = 400;
				$source=@imagecreatefrompng('../../img/'.$origine); // La photo  source
				//Dimension de l'image pr savoir comment crée la miniatur
				$x = imagesx($source);
				$y = imagesy($source);
				
				if($x>$max or $y>$max)
                {
                    if($x>$y)
					{
						$nx = $max;
					    $ny = $y/($x/$max);
					}
					else
					{
						$nx = $x/($y/$max);
					    $ny = $max;
					}
		

                }
			    else
			    {
				  $nx=$x;
				  $ny=$y;
			    }

                $destination= imagecreatetruecolor($nx,$ny);
				$nx = imagesx($destination);
				$ny= imagesy($destination);
				//On crée l'avatar
				imagecopyresampled ($destination, $source, 0, 0, 0, 0,
				$nx, $ny, $x,
				$y);
				// On enregistre l'avatar avec le meme nom pour remplace l'ancien
					
				$save_min=imagepng($destination, '../../img/'.$miniature1);
					  
				//fin redimention et sauvegarde*****************************
					 if($save_min) 
					 {
						 unlink('../../img/'.$origine);
						 
						$last_min=imagecreatefrompng('../../img/'.$miniature1); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$mx = imagesx($last_min);
						$my = imagesy($last_min); 

							if($mx>200 AND $my>200) 
							 {

														
echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&crop='.$img_nom.'\');",1000) </script>';

		
							 }
						 else
							{
							echo  '<div id="noadtat">Veuilez selectionner une image plus grande</div>';

							 unlink('../../img/'.$miniature1);
							}
					  
					 }
				 

				} 
			 else
				{
				
				   unlink('../../img/'.$origine);
					  
				 echo  '<div id="noadtat">Veuilez selectionner une image aux dimentions supérieur à 400 x 400 px</div>';

				}
				   
			  // }
			/*	else
				{
				echo  '<div id="noadtat">Veuilez selectionner une image de moin de 1 Mo</div>';

				}*/
			}
	
/******créer img a partir du gif***************************************************************************************/
			elseif(in_array(strtolower($extension), $allowed_gif))
			{
				/*if($_FILES['img']['size']<=1000000  )
			   {*/
					$img_nom=time();
				    $origine=$img_nom.".gif";
				   move_uploaded_file($_FILES['img']['tmp_name'], '../../img/'.$origine);
				  
				   
				   
				    //dimention img
						$x =400 ;
				        $y =400 ;
						$source=imagecreatefromgif( '../../img/'.$origine); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$x2 = imagesx($source);
						$y2 = imagesy($source);
				   
				  if($x2>$x AND $y2>$y )
			    {
					 
				$miniature1=$img_nom."_min.gif";
					  
			//redimention avatar************************************
				$max = 400;
				$source=imagecreatefromgif('../../img/'.$origine); // La photo  source
				//Dimension de l'image pr savoir comment crée la miniatur
				$x = imagesx($source);
				$y = imagesy($source);
				
				if($x>$max or $y>$max)
                {
                    if($x>$y)
					{
						$nx = $max;
					    $ny = $y/($x/$max);
					}
					else
					{
						$nx = $x/($y/$max);
					    $ny = $max;
					}
		

                }
			    else
			    {
				  $nx=$x;
				  $ny=$y;
			    }

                $destination= imagecreatetruecolor($nx,$ny);
				$nx = imagesx($destination);
				$ny= imagesy($destination);
				//On crée l'avatar
				imagecopyresampled ($destination, $source, 0, 0, 0, 0,
				$nx, $ny, $x,
				$y);
				// On enregistre l'avatar avec le meme nom pour remplace l'ancien
					
				$save_min=imagegif($destination, '../../img/'.$miniature1);
					  
				//fin redimention et sauvegarde*****************************
					 if($save_min) 
					 {
						 unlink('../../img/'.$origine);
						 
						$last_min=imagecreatefromgif('../../img/'.$miniature1); // La photo  source
						//Dimension de l'image pr savoir comment crée la miniatur
						$mx = imagesx($last_min);
						$my = imagesy($last_min); 

							if($mx>200 AND $my>200) 
							 {

														
echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&crop='.$img_nom.'\');",1000) </script>';

		
							 }
						 else
							{
							echo  '<div id="noadtat">Veuilez selectionner une image plus grande</div>';

							 unlink('../../img/'.$miniature1);
							}
					  
					 }
				 

				} 
			 else
				{
				
				   unlink('../../img/'.$origine);
					  
				 echo  '<div id="noadtat">Veuilez selectionner une image aux dimentions supérieur à 400 x 400 px</div>';

				}
				   
			  // }
			/*	else
				{
				echo  '<div id="noadtat">Veuilez selectionner une image de moin de 1 Mo</div>';

				}*/
			}
			else
			{
			echo  '<div id="noadtat">Veuilez selectionner une image au format "jpg, png ou gif"</div>';

			}

		}
		else
		{
		echo  '<div id="noadtat">Veuilez selectionner une image</div>';
		
		}



?>