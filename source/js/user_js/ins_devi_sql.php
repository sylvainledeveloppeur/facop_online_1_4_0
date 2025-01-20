<?php @session_start();
 require_once('../db_2_js.class.php');


if(!empty($_POST['cat']) AND !empty($_POST['tit'])  AND !empty($_POST['des']))
{
	
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_devi) nbr FROM mesdevis
		     WHERE titre_devi=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['tit']));
           $chif_pse=$nbr_pseudo->fetch();
    
        // A list of permitted file extensions
		$allowed = array('pdf');
	
		if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0 )
		{

			$extension = pathinfo($_FILES['aimg']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $Gimg=time().'.pdf';//nom grande img
				   $Mimg=time().'_min.jpg';//nom min img
				   
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../source/doc/devis/'.$Gimg ))
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
						  
					
					  $req=$tams->prepare('INSERT INTO mesdevis (id_user_devi,titre_devi,desc_devi,categori_devi,doc_devi,doc2_devi,date_devi ) 
							   VALUES (?,?,?,?,?,?,NOW()) ');


							  
							 $inser=$req->execute(array($_SESSION['id'],$_POST['tit'],$_POST['des'],$_POST['cat'],$Gimg,0));
								
								
								
								 if($inser)
								{
									
									echo '<div class="ok_form">Devi ajouté</div>';
 
                                       echo '<script>
                                              document.getElementById("poptex").innerHTML="<h2>Felicitation</h2><p>Vous venez d\'ajouter un devi. Verifiez-le dans votre menu <span>Mes devis</span></p> ";
                                              document.getElementById("popnoti").style.display="block";
                                              document.getElementById("resfo").reset();
                                              </script>';

								}
								else
								{ echo '<div class="stop_form">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
								
								
							}


				  }
			  
			
			else
			{
			echo  '<div class="stop_form">Veuilez selectionner un fichier au format "fichier.pdf"</div>';

			}

		}
		else
		{
		echo  '<div class="stop_form">Veuilez selectionner un fichier pdf</div>';
		
		}

}
else
{
	
	echo '<div class="stop_form">Veuillez completer correctement tous les champs</div>';
}
?>