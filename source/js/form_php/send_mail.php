<?php session_start();
// require_once('../db_2_js.class.php');
 require("../../class/default.class.php");

extract($_POST);

$_POST['cap']=$_POST['cap'];

$mailDestination =  'info@facop.training,fotsodev@gmail.com ';
    $token=@$defaultClass_OB->toKen(10,'a1A');
    $autor="Facop Online";
    $url="www.facop.training";
     $thelink='http://facop.training/index.php?b=logseller.login.logseller&token='.$token.'&email='.$mail.'';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" https://facop.training/source/img/logo/logo.png" alt="" width="199" height="60"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;color: #383d42;">Formulaire de contact</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                               <table width="100%" border="0">
				<caption>
				  </caption>
				  <tbody>
					<tr>
					  <th scope="col" align="right">Nom :</th>
					  <th scope="col" align="left">'.$_POST['nom'].'</th>
					</tr>
					<tr>
					  <th scope="row" align="right">E-mail :</th>
					  <td align="left">'.$_POST['mail'].'</td>
					</tr>
					<tr>
					  <th scope="col" align="right">Telephone :</th>
					  <th scope="col" align="left">'.$_POST['tel'].'</th>
					</tr>
					<tr>
					  <th scope="col" align="right">Sujet :</th>
					  <th scope="col" align="left">'.$_POST['suj'].'</th>
					</tr>
						
					<tr>
					  <th scope="row" align="right">Message :</th>
					  <td scope="row" align="left">'.$_POST['mes'].'</td>
					</tr>

				  </tbody>
				</table><br><br>

                                  Cordialement,<br><br>

                                  '.$autor.'
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Yaoundé, Cameroun</div>
                                    <p>info@facop.training - www.facop.training</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2023 facop.training All rights reserved</p>
                                </div>
                              </div>
';
   

if(!empty($_POST['cap'])  AND $_POST['cap']==$_SESSION['cap']  )//verifier le calcule
				{
				if(!empty($_POST['nom']) AND strlen($_POST['nom'])>3  AND !empty($_POST['mail']) AND strlen($_POST['mail'])>3 AND !empty($_POST['tel']) AND strlen($_POST['tel'])>3  AND !empty($_POST['suj']) AND strlen($_POST['suj'])>3  AND !empty($_POST['mes']) AND strlen($_POST['mes'])>3   )
				{

                                        //isertion de contact dans l historique de la db
                                       //$req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,dates ) 
                                                                           //VALUES (?,?,?,?,?,?,NOW()) ');
                                       //$inser=$req->execute(array(0,$nom,$mail,$_SERVER["REMOTE_ADDR"],"Formulaire contact",$nom." Vient de laisser un message"));
                                       
                                         //envoi email comfirm email
                    $reSu=@$defaultClass_OB->senMail("Formulaire de contact",$autor,$nom,"noreply@facop.training",$mailDestination,$tams,$message_html1,$message_txt1);
                                       
                                       
                                       echo '<div class="ok_form">Merci de nous avoir contacté... A bientôt</div>';//Message Sent, thank
                                       
                                       /* $BClas->showInfo('<h2>Felicitation</h2><p>Veuillez confirmer votre address email. clickez sur le lien contenu dans le message que nous venons de vous envoyer à votre boite email ci-après <span>'.$_POST['mai'].'</span>. Verifier aussi le dossier <span>spam</span></p> ');
                                       */ 
                                         $BClas->resetFo(); 
          

				}
				else
				{

					echo '<div class="no_form">Veuillez completer correctement tous les champs</div>';
				}
  }
                else
				{

					echo '<div class="no_form">'.$_SESSION['indexjax'][4].'</div>';//Please complete all fields correctly
				}

?>
	 
	

