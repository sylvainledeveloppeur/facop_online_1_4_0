<?php require_once("db_app.class.php");
require_once("../../class/Bee.class.php");
//$_POST=$_GET;



    // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
		$allowed2 = array('pdf');
	
		if(isset($_FILES['logo']) && $_FILES['logo']['error'] == 0 AND isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0 )
		{

			$extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
			$extension2 = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) AND in_array(strtolower($extension2), $allowed2) )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $logo=time().'.'.$extension;//nom grande img
				   $pdf=time().'.pdf';//nom min img
				   
				  if(move_uploaded_file($_FILES['logo']['tmp_name'],'../../../img/partner/'.$logo ) AND move_uploaded_file($_FILES['pdf']['tmp_name'],'../../../pdf/partner/'.$pdf  ))
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
								
    $req=$tams->prepare('INSERT INTO sponsor (actif_spo, logo_spo, nom_spo, type_spo, pdf_spo, mail_spo, tel_spo, phpdate_spo, sqldate_spo) 
                                    VALUES (?,?,?,?,?,?,?,?,NOW()) ');

                                   $inser=$req->execute(array(0,$logo,$_POST['name'],$_POST['type'],$pdf, $_POST['mail'], $_POST['tel'],time()));


                                   if($inser)
                                 { 
									echo '<div class="okfom"> Demande envoyée </div>';
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
									echo '<div class="nofom">bad  file</div>';
								 }
} else
									 
                                 { 
									echo '<div class="nofom">no  file</div>';
								 }
?>