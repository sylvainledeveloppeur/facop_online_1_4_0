<?php @session_start();

require_once("../db_2_js.class.php");


      
  $allowed = array('png');
	
		//img1							
		if(isset($_FILES['mg1']) && $_FILES['mg1']['error'] == 0 )
		{

			$extension = pathinfo($_FILES['mg1']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				/*if($_FILES['mg1']['size']<=1000000  )
			   {*/
				  @unlink('../../../../source/android/img/slider/'.$_POST['chemin']); 
				   
				if(move_uploaded_file($_FILES['mg1']['tmp_name'], '../../../../source/android/img/slider/'.$_POST['chemin'].'' ) )
				  {
					
				     echo '<div class="ok_form">Image modifié (rechargez la page SVP)</div>';
					 echo '<script> window.setTimeout("location.reload();",2000) </script>';
				}
				else
				{ echo '<div class="stop_form">Impossible modifier </div>';}

		
				   
			 
			}
			else
			{
			echo  '<div class="stop_form">Veuilez selectionner une image au format "image.png" (slider 1)</div>';

			}

		}



?>