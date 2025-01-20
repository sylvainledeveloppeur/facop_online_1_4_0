<?php require_once("db_app.class.php");
require_once("../../class/Bee.class.php");
//$_POST=$_GET;



    // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
		$allowed2 = array('pdf');
		
	$iid=$_POST['id'];
	$ava=$_POST['ava'];
	
		if(isset($_FILES['logo']) && $_FILES['logo']['error'] == 0  )
		{

			$extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed)  )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $logo=time().'.'.$extension;//nom grande img
				   
				  if(move_uploaded_file($_FILES['logo']['tmp_name'],'../../../img/avatar/user/'.$logo ))
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
								
  
$stmt = $tams->prepare("UPDATE user SET  ava='$logo'  WHERE id='$iid' ");
// execute the query
  $inser=$stmt->execute();

                                   if($inser)
                                 { 
							  @unlink('../../../img/avatar/user/'.$ava );
									echo $logo;
								 }
								 else
									 
                                 { 
									echo '<div class="nofom">error </div>';
								 }

 }
								 else
									 
                                 { 
									echo '<div class="nofom">error file</div>';
								 }
								 
								 
								 } else
									 
                                 { 
									echo '<div class="nofom">PNG, JPG files only</div>';
								 }
} else
									 
                                 { 
									echo '<div class="nofom">PNG, JPG  files</div>';
								 }
?>