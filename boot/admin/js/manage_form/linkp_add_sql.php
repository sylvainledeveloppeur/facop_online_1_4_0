<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
require_once('../../class/default.class.php');
$Beclas->checkIns();
	
if(!empty($_POST['nom']) AND !empty($_POST['nomen'])  AND !empty($_POST['nivo'])  AND !empty($_POST['desc']) AND !empty($_POST['descen'])  /*AND !empty($_POST['desc']) AND !empty($_POST['descen'])  AND !empty($_POST['desc']) */)/**/
{
	$nivo=explode(" HHH ",$_POST['nivo']);
		
	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_link
		     WHERE titre=:pse  AND id_pk_pf=:les  " ) ;
           $nbr_pseudo->execute(array('pse'=>$_POST['nom'] , 'les'=>$nivo[0]));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']==0)
			{
			   
								  $tatu=true;
						

					/*save base de donnée*/


								  if($tatu)
										{


													   $nivo=explode(" HHH ",$_POST['nivo']); 	

													   $req=$tams->prepare('INSERT INTO pack_link (actif_pf, id_pk_pf, pack,pack_code,titre,titreEN, link, linkEN, pg,datephp,datesql ) 
														VALUES (?,?,?,?,?, ?,?,?,?,?,NOW()) ');




														$inser=$req->execute(array(0, $nivo[0], $nivo[1], 0, $_POST['desc'], $_POST['descen'], $_POST['nom'], $_POST['nomen'] , '0',  time()));



															if($inser)
															{
																$Beclas->echoo1(1,"Successfully saved");
																$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, lien (pack) ", $_POST['nom']); //notification

															}
															else
															{
															$Beclas->echoo1(0,"ERROR: contact the developer"); 
															$Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], "A ajouter, lien (pack): ERROR ", $_POST['nom']);
															}



										}



					
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