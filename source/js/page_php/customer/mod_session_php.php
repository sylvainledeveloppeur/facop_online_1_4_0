<?php @session_start(); 

			
			if(!empty($_POST['nom']) AND $_POST['nom']!="..." AND !empty($_POST['prenom']) AND $_POST['prenom']!="..." AND !empty($_POST['tel']) AND $_POST['tel']!="..." AND !empty($_POST['mail']) AND $_POST['mail']!="..." AND !empty($_POST['vil']) AND $_POST['vil']!="..." AND !empty($_POST['adres']) AND $_POST['adres']!="..." AND !empty($_POST['pays']) AND $_POST['pays']!="..." AND !empty($_POST['moy']) AND $_POST['moy']!="...")
			{

				$_SESSION['Cnom']=$_POST['nom'];
				$_SESSION['Cprenom']=$_POST['prenom'];
				$_SESSION['Ctel']=$_POST['tel'];
				$_SESSION['Cmail']=$_POST['mail'];
				$_SESSION['Cvil']=$_POST['vil'];
				$_SESSION['Cadres']=$_POST['adres'];
				$_SESSION['Cpays']=$_POST['pays'];
				$_SESSION['Cmoy']=$_POST['moy'];

				echo  '<div class="ok_form">En cour...</div>';
						   echo '<script type="text/javascript"> window.setTimeout("location=(\'index.php?sheet=cart_pay&model=uno\');",3000) </script>';
			}
			else
			{
				echo '<div class="stop_form">Veuillez éffectuer tous les actions requises</div>';
			}
     


?>

