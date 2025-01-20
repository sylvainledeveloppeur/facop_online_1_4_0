<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();
	
if(!empty($_POST['nivo']) AND !empty($_POST['lan'])  AND !empty($_POST['ques'])  AND !empty($_POST['repo'])  AND !empty($_POST['repo1']) AND !empty($_POST['repo2'])  AND !empty($_POST['repo3'])  AND !empty($_POST['repo4'])  /*AND !empty($_POST['desc']) */)
{
	
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_q) nbr FROM quiz
		     WHERE question_q=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['ques']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
			   //$reSu=@$defaultClass_OB->addFil($_FILES['video'],1000000,'../../../../app/img/video/',array('mp4'));
			   
        // A list of permitted file extensions
	/* 	$allowed = array("jpg","jpeg","png");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 )
		{

	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) )
			{ */
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  //$Gimg=time().'.'.$extension;//nom grande img
				  // $Video=$_POST['video'];//nom min img
				   
				 /*  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../source/img/lesson/'.$Gimg ) )
				  {	
				   */

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
					/*   $tatu=true;
				  } */

		/*save base de donnée*/
		$tatu=true;

					  if($tatu)
							{
						  
								$nivo=explode(" HHH ",$_POST['nivo']);
					
					  $req=$tams->prepare('INSERT INTO quiz (idpack_q, lang_q, actif_q, question_q, reponse_q, reponse1_q, reponse2_q, reponse3_q, reponse4_q, datephp_q, datesql_q ) 
							   VALUES (?,?,?,?,?,?,?,?,?,?,NOW()) ');


                       
							  
							 $inser=$req->execute(array($nivo[0], $_POST['lan'], 0, $_POST['ques'], $_POST['repo'], $_POST['repo1'], $_POST['repo2'],  $_POST['repo3'],  $_POST['repo4'],$Beclas->phpDate()));
								
								
								
								 if($inser)
								{
									$Beclas->echoo1(1,"Successfully saved");
									$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, Quiz ", $_POST['ques']); //notification

								}
								else
								{
								  $Beclas->echoo1(0,"ERROR: contact the developer"); 
								  $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, Quiz: ERROR ", $_POST['ques']);
								}
								
								
								
							}



	/* 	}
		else
		{
		$Beclas->echoo1(0,"ERROR: Veuilez selectionner une image"); 
		
		}
	
} */
	
		   }
		   else
		   {
			   $Beclas->echoo1(2,"INFO: élément déja enregistré, existant"); 
		   
		   }

}
else
{
	$Beclas->echoo1(0,"ERROR: Veuillez completer correctement tous les champs"); 
}

?>