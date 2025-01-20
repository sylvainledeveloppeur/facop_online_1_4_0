<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

if(!empty( $_SESSION['BEEusertype']) AND  $_SESSION['BEEusertype']=="USER")
{
    
if(!empty($_POST['pro']) AND !empty($_SESSION['id']))
{
	
					
					  $req=$tams->prepare('INSERT INTO mesachat (id_aut_acha,id_pro_acha,ven_acha,date_acha ) 
							   VALUES (?,?,?,NOW()) ');


							  
							 $inser=$req->execute(array($_SESSION['id'],$_POST['pro'],0 ));
								
								
								
								 if($inser)
								{
									
									echo '<div class="ok_form">Article sauvegardé</div>';
 
                                       echo '<script>
                                              document.getElementById("poptex").innerHTML="<h2>Felicitation</h2><p>Vous venez de passer votre commande. Verifiez-la dans votre menu <span>Mes achats</span></p> ";
                                              document.getElementById("popnoti").style.display="block";
                                              
                                              </script>';

								}
								else
								{ echo '<div class="stop_form">Impossible d\'enregistrer, veuillez contacter le webmaster SVP</div>';}
								
								
}
else
{
	
	echo '<div class="stop_form">Connexion requise</div>';
}
    }
else
{
	
	echo '<div class="stop_form">Seul un compte client peut éffectuer cette action</div>';
    $BClas->showInfo('<h3>Impossible! </h3><p>Seul un compte client peut éffectuer cette action, Veuillez-vous connecter à un compte client<span></span></p> ');
}
?>