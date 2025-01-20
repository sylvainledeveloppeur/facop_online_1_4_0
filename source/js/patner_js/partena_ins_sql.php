<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");

extract($_POST);

if(!empty($nam) AND !empty($for) AND !empty($pay) )
{
	
	 			   
        // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
	
		if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0 AND isset($_FILES['aimg2']) && $_FILES['aimg2']['error'] == 0)
		{
           if($reSu=@$defaultClass_OB->addImg($_FILES['aimg'],1000000,'../../../source/img/partner/',400,400,300,200,1) AND
       $reSu2=@$defaultClass_OB->addFil($_FILES['aimg2'],5000000,'../../../source/pdf/patner/',array('pdf')) )
           {
               
			$req=$tams->prepare('INSERT INTO partenaria (id_aut_par,actif_par,logo_par,nom_par,statu_par,doc_par,pay_par,date_par ) 
							   VALUES (?,?,?,?,?,?,?,NOW()) ');


							  
							 $inser=$req->execute(array($_SESSION['id'],0,$reSu[1],$nam,$for,$reSu2[1],$pay));
								
								
								
								 if($inser)
								{
									
                                            $BClas->redirectPgT("index.php?b=patner.mesDemand.patner",3000);
									
                                     echo '<div class="ok_form">Demande enregistrée</div>';
 
                                             $BClas->showInfo('<h2>Felicitation</h2><p>Votre demande a bien été enregistrée. Verifiez-la dans votre menu <span>Mes demandes</span></p> ');
                                             $BClas->resetFo2("resfo");

								}
								else
								{ echo '<div class="stop_form">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
               
               
           }  
			else
			{
			echo  '<div class="stop_form">Impossible de télécharger les fichier, veuillez rééssayer plus tard</div>';

			}

				  }
			else
			{
			echo  '<div class="stop_form">Veuilez selectionner un logo et un document</div>';

			}	
	
}
else
{
	
	echo '<div class="stop_form">Veuillez completer correctement tous les champs</div>';
}
?>