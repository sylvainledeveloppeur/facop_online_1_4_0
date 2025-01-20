<?php @session_start();

require_once("../db_2_js.class.php");

if(!empty($_POST['nlog']) AND !empty($_POST['plog']))

{

	   //recherche du pseudo

		   	   $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team

		   WHERE pseudo=:pse AND pass=:pas " ) ;

           $nbr_pseudo->execute(array('pse'=>$_POST['nlog'],'pas'=>sha1($_POST['plog'])));

           $chif_pse=$nbr_pseudo->fetch();

   

		   if ($chif_pse['nbr']!=0)

			{

		$bloc=$tams->query('SELECT * FROM _admin_team WHERE pseudo=\''.$_POST['nlog'].'\' ');

									

									while($done=$bloc->fetch())

									{

								

                                     @session_unset();@session_destroy();//supprimer ttes session precedente

									@session_start();

									$_SESSION['id_admin']=$done['id'];

									$_SESSION['droit']=$done['droit_team'];

									$_SESSION['pseu']=$done['pseudo'];

									$_SESSION['nom']=$done['nom_team'];

									$_SESSION['prenom']=$done['prenom_team'];

									$_SESSION['img']=$done['img_team'];

									$_SESSION['role']=$done['role_team'];

									$_SESSION['bio']=$done['about_team'];

									$_SESSION['date']=$done['date_team'];

										

									$_SESSION['idadmin']=$done['id_admin'];

									$_SESSION['actif']=$done['actif'];

									$_SESSION['admin']=$done['admin'];

									$_SESSION['selec']=$done['selec'];

									$_SESSION['updat']=$done['updat'];

									$_SESSION['delet']=$done['delet'];

									$_SESSION['inser']=$done['inser'];

									$_SESSION['page']=$done['page'];

										

									//historiq								

	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");

    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],'Connexion',$_SERVER['HTTP_USER_AGENT']));

		

									

									}

				

			   echo '<span class="ok_form">Connecting...</span><script type="text/javascript"> window.setTimeout("location=(\'dashboard.php?sheet=home\');",1000) </script>';

					

			}

			else

			{

			echo '<span class="stop_form">Username or incorrect password</span>';	

			}

	

	

}

else

			{

			echo '<span class="stop_form">Please complete all fields</span>';	

			}















?>