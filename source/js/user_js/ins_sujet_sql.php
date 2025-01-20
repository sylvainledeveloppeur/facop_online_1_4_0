<?php @session_start();
 require_once('../db_2_js.class.php');

if(!empty($_POST['tit']) AND !empty($_POST['des']) AND $_POST['cat']!="0")
										{
	//on enregistre la commande du client dans la base donne
							$req=$tams->prepare('INSERT INTO forum (id_user_deba,titre_deba,desc_deba,categori_deba,reaction_deba,moi_anne_deba,date_deba) 
							   VALUES (?,?,?,?,?,?,NOW()) ');

									   $inser=$req->execute(array($_SESSION['id'],$_POST['tit'],$_POST['des'],$_POST['cat'],0,0 )) or exit($tam->errorInfo());

										if($inser)
										{
										   echo '<div class="ok_form"><p>Sujet publié</div>';
										}
                                       else
                                       {
										   echo '<div class="stop_form"><p>Error</div>';
										}

}
                                       else
                                       {
										   echo '<div class="stop_form"><p>Tous les champs sont obligatoires</div>';
										}


?>