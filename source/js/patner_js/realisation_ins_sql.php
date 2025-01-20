<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");

extract($_POST);

if(!empty($des) AND !empty($dur)  )
{
	
	 			   
        // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
	
		if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0)
		{
           if($reSu=@$defaultClass_OB->addImg($_FILES['aimg'],2000000,'../../../source/img/projet/',479,300,479,300,1) )
           {
               
	
			$req=$tams->prepare('INSERT INTO realisation (id_aut_rea,actif_rea,img_rea,img2_rea,desc_rea,dure_rea,date_rea ) 
							   VALUES (?,?,?,?,?,?,NOW()) ');


							  
							 $inser=$req->execute(array($_SESSION['id'],0,$reSu[1],0,$des,$dur));
								
								
								
								 if($inser)
								{
									
                                            $BClas->redirectPgT("index.php?b=patner.mesrealisation.patner",3000);
									
                                     echo '<div class="ok_form">Enregistrée</div>';
 
									 //isertion de l inscription dans l historique de la db
                                       $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                       $inser=$req->execute(array($_SESSION['id'],$_SESSION['nam'],$_SESSION['mai'],$_SERVER["REMOTE_ADDR"],"AJOUT REALISATION",$_SESSION['nam']." Vient d'ajouter une réalisation (partenair)",0));
									 
                                             $BClas->showInfo('<h2>Felicitation</h2><p>Votre réalisation a bien été enregistrée. Verifiez-la dans votre menu <span>Mes réalisation</span></p> ');
                                             $BClas->resetFo2("resfo");

								}
								else
								{ echo '<div class="stop_form">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
               
               
           }  
			else
			{
			echo  '<div class="stop_form">Impossible de télécharger le fichier, veuillez rééssayer plus tard</div>';

			}

				  }
			else
			{
			echo  '<div class="stop_form">Veuilez selectionner une photo de réalisation</div>';

			}	
	
}
else
{
	
	echo '<div class="stop_form">Veuillez completer correctement tous les champs</div>';
}
?>