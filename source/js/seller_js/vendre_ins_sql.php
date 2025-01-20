<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");


if(!empty($_POST['cat']) AND !empty($_POST['tit']) AND !empty($_POST['pri']) AND !empty($_POST['des']))
{
	
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pro) nbr FROM store
		     WHERE tit_pro=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['tit']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
        // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
	
		if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0 AND isset($_FILES['aimg2']) && $_FILES['aimg2']['error'] == 0)
		{

			$extension = pathinfo($_FILES['aimg']['name'], PATHINFO_EXTENSION);
			$extension2 = pathinfo($_FILES['aimg2']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) AND in_array(strtolower($extension2), $allowed))
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $Gimg=time().'.jpg';//nom grande img
				   $Mimg=time().'_min.jpg';//nom min img
				   
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../../source/img/store/'.$Gimg ) AND move_uploaded_file($_FILES['aimg2']['tmp_name'], '../../../source/img/store/'.$Mimg ))
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
						  
					
					  $req=$tams->prepare('INSERT INTO store (admin_pro,actif_pro,id_aut_pro,id_cat_pro,id_soucat_pro,img_pro,img2_pro,tit_pro,aut_pro,nprice_pro,oprice_pro,desc_pro,date_pro ) 
							   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');


							  
							 $inser=$req->execute(array(0,0,$_SESSION['id'],$_POST['cat'],0,$Gimg,$Mimg,$_POST['tit'],0,$_POST['pri'],0,nl2br($_POST['des']) ));
								
								
								
								 if($inser)
								{
									
                                             $BClas->redirectPgT("index.php?b=seller.mesarticle.seller",3000);
									
                                     echo '<div class="ok_form">Article ajouté</div>';
 
                                             $BClas->showInfo('<h2>Felicitation</h2><p>Vous venez d\'ajouter un article en vente. Verifiez-le dans votre menu <span>Mes articles</span></p> ');
                                             $BClas->resetFo2("resfo");

								}
								else
								{ echo '<div class="stop_form">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
								
								
							}


				  }
			  
			
			else
			{
			echo  '<div class="stop_form">Veuilez selectionner des images au format "image.jpg"</div>';

			}

		}
		else
		{
		echo  '<div class="stop_form">Veuilez selectionner 2 images</div>';
		
		}
	
}
else
{
	
	echo '<div class="stop_form">Ce titre est déjà utilisé</div>';
}	
	
}
else
{
	
	echo '<div class="stop_form">Veuillez completer correctement tous les champs</div>';
}
?>