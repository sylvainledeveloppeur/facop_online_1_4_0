<?php 
if(!empty($_POST['desti']) AND strlen($_POST['desti'])>2 AND !empty($_POST['suj']) AND strlen($_POST['suj'])>2 AND !empty($_POST['mes']) AND strlen($_POST['mes'])>2)
				{

	
	
	//=====Définition du sujet.
	$sujet = $_POST['suj'];
	//=====nom auteur.
    $_POST['auteur']="Be-konekt";
	//=====mail auteur.
    $_POST['mail_auteur']="info@be-konekt.com";
	//=====mail destinataire. a qui on envoi
	$mail= $_POST['desti']; // Déclaration de l'adresse de destination.
	
	
//--------------------------- fichier ou piece jointe ---------------------------------------
	
					
				//verifier si pdf existe . modifier immage A list of permitted file extensions
		$allowed = array('jpg','jpeg','pdf','doc','docx','rar','zip');
	
		if(!empty($_FILES['cahier']) && $_FILES['cahier']['error'] == 0)
		{

			$extension = pathinfo($_FILES['cahier']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				/*if($_FILES['cahier']['size']<=1000000  )
			   {*/
				
				    $le_chemin_fichier="../../document/newsletter_fichier/";
					$nom_fichier=time().'_newsletter.'.$extension;
					$chemin_et_nom_fichier=$le_chemin_fichier.$nom_fichier;
				 
				   
						  if(move_uploaded_file($_FILES['cahier']['tmp_name'], $le_chemin_fichier.$nom_fichier ) )
						  {	


						  }
						   else
							{

							}
				  /*  }
				else
				{
				exit('<div class="stop_form">Veuilez selectionner un fichier de moin de 1 Mo</div>');

				}*/
			}
			else
			{
			exit('<div class="stop_form">Veuilez selectionner un fichier correct: ".jpg",".jpeg",".pdf",".doc",".docx",".rar",".zip"</div>');

			}

		}
	
					
				   
//------------------email debut-----------------------------------------
				   

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.4
		{
			$passage_ligne = "\r\n";
		}
		else
		{   
			$passage_ligne = "\n";
		}

//=====Déclaration des messages au format texte et au format HTML.
	
  $message_txt = "Newsletter be-konekt";
  $message_html = '<html><head><title>'.$_POST['suj'].': Be-konekt</title></head><body>

				<table width="80%" border="0">
				<caption>
				  Ce message vient de www.be-konekt.com (Newsletter)
				  </caption>
				  <tbody>
					
				
					<tr>
					  <td align="center">'.$_POST['mes'].'</td>
					</tr>

				  </tbody>
				</table>
				</body></html>';
  

 
//=====Lecture et mise en forme de la pièce jointe.		 
		if(!empty($_FILES['cahier']) && $_FILES['cahier']['error'] == 0)
		{
	$fichier   = fopen($chemin_et_nom_fichier, "r");
	$attachement = fread($fichier, filesize($chemin_et_nom_fichier));
	$attachement = chunk_split(base64_encode($attachement));
	fclose($fichier);
		}
	 
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
    $boundary_alt = "-----=".md5(rand());

	//=====Création du header de l'e-mail.
	$header = "From: \"".$_POST['auteur']."\"<".$_POST['mail_auteur'].">".$passage_ligne;
	$header.= "Reply-to: \"".$_POST['auteur']."\" <".$_POST['mail_auteur'].">".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

   //=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========48 
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne; 

   //=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	
   //=====On ferme la boundary alternative.
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
   //==========60 61 62 
	$message.= $passage_ligne."--".$boundary.$passage_ligne; 
					
					
					
					
				   //=====Ajout de la pièce jointe si elle existe.
		if(!empty($_FILES['cahier']) && $_FILES['cahier']['error'] == 0)
		{
	$message.= "Content-Type: image/jpeg; name=\"".$nom_fichier."\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
	$message.= "Content-Disposition: attachment; filename=\"".$nom_fichier."\"".$passage_ligne;
	$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
		}

	//=====Envoi de l'e-mail.
	$eta=mail($mail,$sujet,$message,$header);
				//==========


					if($eta)
						{

					echo '<div class="ok_form" >Newsletter envoyé</div>';
				   }
					else
					{

						echo '<div class="stop_form">Error: échec de l\'envoi</div>';
					}		   


//email fin		   
			  

				}
       else
				{

					echo '<div class="stop_form">Veuillez completer correctement tous les champs</div>';
				}
?>
	 
	

