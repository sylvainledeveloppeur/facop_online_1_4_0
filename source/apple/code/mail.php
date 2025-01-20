<?php 
require_once("../class/Bee2.class.php");
require_once("../class/db_app.class.php");

   $mai="fotsoweb@gmail.com";
   $token=@$BClas->toKen(6,'1');
   $autor="WYPFORUN";
   $url="www.wypforun.org";
   $thelink='';
   $message_txt1 = "Message from ".$url;
   $message_html1 = '
                            <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                              <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                <img src="https://wypforun.org/source/img/logo/logo.png" alt="" width="160" height="160"> 
                                <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Bienvenue</h1>
                                </div>
                            <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                Bienvenue <strong>'.$mai.'</strong>,<br><br>
                            Nous avons bien réçu votre inscription. Veuillez utiliser ce code <strong style="font-size: 20px;">'.$token.'</strong> pour valider votre email.<br><br>

                             Notre équipe est ravie de vous compter parmi les membres de notre organisation.<br><br>

                                Cordialement,<br><br>

                                <strong>'.$autor.'</strong>
                                </div>
                              <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                <div>Genève, Suisse</div>
                                  <p>contact@wypforun.org - www.wypforun.org</p>
                                  <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                  <p>Copyright (C) 2022 wypforun.org All rights reserved</p>
                              </div>
                            </div>
';

 //envoi email comfirm email
                       $reSu=$BClas->senMail("Inscription",$autor,$mai,"no_reply@wypforun.org",$mai,$tams,$message_html1,$message_txt1);

                       echo $reSu;


                       $to      = 'fotsoweb@gmail.com';
                       $subject = 'le sujet';
                       $message = 'Bonjour !';
                       $headers = 'From: webmaster@example.com' . "\r\n" .
                       'Reply-To: webmaster@example.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();
                  
                       mail($to, $subject, $message, $headers);