<?php @session_start(); /*
require_once('../db_2_js.class.php');*/

if(!empty($_POST['typ'])AND $_POST['typ']!="null"  )
{
	if(!empty($_POST['host'])AND strlen($_POST['host'])>1  )
	{

		if(!empty($_POST['db'])AND strlen($_POST['db'])>1  )
		{
			if(!empty($_POST['user'])AND strlen($_POST['user'])>1  )
			{
				if(!empty($_POST['pas'])AND strlen($_POST['pas'])>1  )
				{
					
				 $fichierRename=($_POST['typ']=="dev") ? "prod":"dev";
                
				 @rename("../../config/".$fichierRename.".ini","../../config/".$fichierRename."_0.ini");
               
				 @unlink("../../config/".$_POST['typ']."_0.ini");
					
					
					$fichier=fopen("../../config/".$_POST['typ'].".ini","w+");
					
					$tete="[BD] \n";
					fwrite($fichier,$tete);
					
					$host="host='mysql:host=".$_POST['host'].";dbname=".$_POST['db']."' \n";
					fwrite($fichier,$host);
					
					$user="login=".$_POST['user']." \n";
					fwrite($fichier,$user);
					
					$pass="pass=".$_POST['pas']." \n";
					
					if(fwrite($fichier,$pass))
						{
				        echo '<div class="ok_form">Done</div>';	
						echo '<script> window.setTimeout("location.reload();",1000) </script>';
				        }
					
					fclose($fichier);
					
					
				}
				else
				{
				echo '<div class="stop_form">Incorrect password</div>';	
				}


			}
			else
			{
			echo '<div class="stop_form">Incorrect username</div>';	
			}


		}
		else
		{
		echo '<div class="stop_form">Incorrect database</div>';	
		}

	}
	else
	{
	echo '<div class="stop_form">Incorrect host</div>';	
	}
	
	
}
else
{
echo '<div class="stop_form">Incorrect type</div>';	
}

?>