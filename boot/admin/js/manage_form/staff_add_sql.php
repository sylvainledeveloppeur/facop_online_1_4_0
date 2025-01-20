<?php @session_start(); 
$_SESSION["admin"]=1;
if($_SESSION["updat"]==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
	{
	 
    require_once('../db_2_js.class.php');
	require_once('../../class/Bee.class.php');
	require_once('../../class/default.class.php');

if(!empty($_POST['nom'])   AND !empty($_POST['tac'])   AND !empty($_POST['desc'])   AND !empty($_POST['adr'])   /*AND !empty($_POST['desc']) */)
{
	
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_sta) nbr FROM staff
		     WHERE nom=:pse  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['nom']));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
			   //$reSu=@$defaultClass_OB->addFil($_FILES['video'],1000000,'../../../../app/img/video/',array('mp4'));
			   
        // A list of permitted file extensions
		$allowed = array("jpg","jpeg","png");
	
		if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 )
		{

	     $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed) )
			{
				/*if($_FILES['aimg']['size']<=1000000  )
			   {*/
				  $Gimg=time().'.'.$extension;//nom grande img
				  // $Video=$_POST['video'];//nom min img
				   
				  if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../../source/img/staff/'.$Gimg ) )
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
						  
					
					  $req=$tams->prepare('INSERT INTO staff ( ava, nom, pos, adr, tac, des, date ) 
							   VALUES (?,?,?,?,?,?,NOW()) ');


                       
							  
							 $inser=$req->execute(array($Gimg, $_POST['nom'], $_POST['pos'], $_POST['adr'], $_POST['tac'], $_POST['desc']));
								
								
								
								 if($inser)
								{
									
									echo '<div id="okadtat">Successfully saved</div>';


								}
								else
								{ echo '<div id="noadtat">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
								
								
							}



		}
		else
		{
		echo  '<div id="noadtat">Veuilez selectionner une image </div>';
		
		}
	
}
	
		   }

}
else
{
	
	echo '<div id="noadtat">Veuillez completer correctement tous les champs</div>';
}



}
else
{ echo '<td colspan="5" class="stop_form">Impossible! You don\'t have the rights</td>';}

?>