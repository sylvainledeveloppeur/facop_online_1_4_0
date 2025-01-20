<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);

   $token=$t;
    $autor="PIDAF";
    $url="www.pidaf.org";
     $thelink='http://pidaf.org/index.php?b=logpatner.login.logpatner';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                               <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://pidaf.org/source/img/logo/logo.png" alt="" width="199" height="60"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Mot de passe modifié</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Hey <strong>'.$m.'</strong>,<br><br>
                              Votre mot de passe a bien été modifié. Veuillez-vous connecter en clickant sur ce lien <a href="'.$thelink.'" style="display: inline-block;background-color: #3d90fb;padding: 4px 6px;border-radius: 5px;color: white;text-decoration: none;font-weight: bold;">Connexion</a> ou en utilisant le lien suivant dans votre navigateur  <em>'.$thelink.'</em>. .<br><br>

                               Nous restons à votre disposition.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Kinshasa, RDC</div>
                                    <p>hjc.sad@gmail.com - www.pidaf.org</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2021 Pidaf.org All rights reserved</p>
                                </div>
                              </div>
';

 if (!empty($t) AND !empty($m) )
	{
   if (!empty($pas) AND strlen($pas)>=6 )
	{
             if ($pas==$pas2 )
               {
		
                            $time_60min = time() - (60 * 24);
                 
                                  //recherche du mailpassword_forgot
                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM password_forgot
                                 WHERE email=:pse AND token=:to  AND valid=:va" ) ;
                                 $nbr_pseudo->execute(array('pse'=>$m,'to'=>$t,'va'=>0));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {
                                   
                                                    $reqe =$tams->exec("UPDATE patner SET pas='".sha1($pas)."'  WHERE mai='$m'  ");
                                                        
                                                    $reqe1 =$tams->exec("UPDATE password_forgot SET valid=1  WHERE email='$m'  ");

                                                       if($reqe1 AND $reqe)
                                                        { 
                                                            
                                                                                          //envoi email comfirm email
                    $reSu=@$defaultClass_OB->senMail("Mot de passe Modifié",$autor,$m,"no_reply@pidaf.org",$m,$tams,$message_html1,$message_txt1);
                                        

                                                           $BClas->showInfo('<h2>Felicitation</h2><p>Votre mot de passe à bien été modifié... Connectez-vous à présent<span></span></p>  ');
                                        
                                                           $BClas->resetFo();
                                                           
                                                        }
                                                        else
                                                        {
                                                         echo '<div class="stop_form">Erreur "echec" </div>';
                                                        }
                                           
                                   
                                }
                                else
                                {
                                 echo '<div class="stop_form">Erreur "Le lien a expiré"</div>';	
                                }
          }
        else{
            echo '<div class="stop_form">Erreur "Les 2 mot de passe sont differents" </div>';
        }                   
	}
	else{
		echo '<div class="stop_form">Erreur "6 caractères minimum pour le mot de passe" </div>';
	}
}

