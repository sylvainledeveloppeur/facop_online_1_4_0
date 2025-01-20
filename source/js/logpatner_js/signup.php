<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);

    $token=@$defaultClass_OB->toKen(10,'a1A');
    $autor="PIDAF";
    $url="www.pidaf.org";
     $thelink='http://pidaf.org/index.php?b=logpatner.login.logpatner&token='.$token.'&email='.$mai.'';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://pidaf.org/source/img/logo/logo.png" alt="" width="199" height="60"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;color: #383d42;">Bienvenue</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Bienvenue <strong>'.$nam.'</strong>,<br><br>
                              Nous avons bien reçu votre inscription <strong>(compte partenaire)</strong>. Cependant, veuillez confirmer votre 
                              address email en clickant sur ce lien <a href="'.$thelink.'" style="display: inline-block;background-color: #3d90fb;padding: 4px 6px;border-radius: 5px;color: white;text-decoration: none;font-weight: bold;">Confirmer mon address email</a> ou en utilisant le lien suivant dans votre navigateur  <em>'.$thelink.'</em> <br><br>

                               Notre équipe est ravie de vous compter parmi les membres de notre site web.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Kinshasa, RDC</div>
                                    <p>hjc.sad@gmail.com - www.pidaf.org</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Instagram - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2021 Pidaf.org All rights reserved</p>
                                </div>
                              </div>
';
    
/*-----------------signup--------------------------------------------------------*/ 
if ((!empty($nam))  )
{
   if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mai) )
	{
       if(!empty($tel) )
         {
            if(!empty($pas) AND strlen($pas)>=6)
              {

                          if(!empty($pay)  )
                            {
                              if(isset($cgu) )
                                {
                                      //recherche du mail
                                     $nbr_pseudo=$tams->prepare("SELECT COUNT(mai) nbr FROM patner
                                     WHERE mai=:pse  " ) ;
                                     $nbr_pseudo->execute(array('pse'=>$mai));
                                     $chif_pse=$nbr_pseudo->fetch();

                                   if ($chif_pse['nbr']==0)
                                    {

                                        $req=$tams->prepare('INSERT INTO patner (ava,nam,mai,val,pas,sex,adr,tel,vil,pay,date) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?,NOW()) ');

                                       $inser=$req->execute(array("patner.png",$nam,$mai,0,sha1($pas),0,0,$tel,0,$pay));


                                       if($inser)
                                        { 
                                            
                                               //isertion de token rest pass de la db
                                       $reqt=$tams->prepare('INSERT INTO emailvalidat (email ,token,dates ) 
                                                                           VALUES (?,?,NOW()) ');
                                       $insert=$reqt->execute(array($mai,$token));

                                        //isertion de l inscription dans l historique de la db
                                       $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                       $inser=$req->execute(array(0,$nam,$mai,$_SERVER["REMOTE_ADDR"],"INSCRIPTION",$nam." Vient de créer son compte partenair",0));
                                       
                                         //envoi email comfirm email
                    $reSu=@$defaultClass_OB->senMail("Comfirmez votre address email",$autor,$nam,"no_reply@pidaf.org",$mai,$tams,$message_html1,$message_txt1);
                                       
                                       
                                       echo '<div class="ok_form">Veuillez confirmer votre address email</div>';//Message Sent, thank
                                       
                                        $BClas->showInfo('<h2>Felicitation</h2><p>Veuillez confirmer votre address email. clickez sur le lien contenu dans le message que nous venons de vous envoyer à votre boite email ci-après <span>'.$_POST['mai'].'</span>. Verifier aussi le dossier <span>spam</span></p> ');
                                        
                                         $BClas->resetFo();

                                        }
                                        else
                                        {
                                         echo '<div class="stop_form">Erreur "inscription  echoué" </div>';
                                        }
                                    }
                                    else
                                    {
                                     echo '<div class="stop_form">Erreur "Email déja utilisé"</div>';	
                                    }
                              }
                              else
                              {
                                 echo '<div class="stop_form">Erreur "Vous devez accepter les conditions d utilisations" </div>';
                              }
                            }
                            else
                            {
                                echo '<div class="stop_form">Erreur "Pays"  </div>';
                            }

              }
              else{
                  echo '<div class="stop_form">Erreur "Mot de passe 6 caractères minimum"</div>';
              }
         }
        else{
            echo '<div class="stop_form">Erreur "Téléphone"  </div>';
        }
	}
	else{
		echo '<div class="stop_form">Erreur "Email" </div>';
	}
}
else{
	echo '<div class="stop_form">Erreur "Nom complet" </div>';

    }

