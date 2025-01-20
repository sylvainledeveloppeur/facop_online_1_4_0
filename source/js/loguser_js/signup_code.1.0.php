<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);


/*$_POST['mail']="fotsotrdev@gmail.com";
$_POST['token']="06573f5";*/
	 $mai=$mai;
     //$token=@$BClas->toKen(6,'1');
     $autor="FACOP";
     $url="www.facop.training";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src="https://facop.wypforun.org/source/img/logo/logo.png" alt="" width="160" height="160"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Bienvenue</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Congratulation <strong>'.$mai.'</strong>,<br><br>
                              email validé. Veuillez-vous connecter<br><br>

                               Notre équipe est ravie de vous compter parmi les membres de notre organisation.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Bonanjo, Douala</div>
                                    <p>contact@facop.training - www.facop.training</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2022 facop.training All rights reserved</p>
                                </div>
                              </div>
';
     
	 $result="";

                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(pseudo) nbr FROM user
                                 WHERE pseudo=:pse AND token=:cod " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$pse,'cod'=>$code));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {


								      $stmt = $tams->prepare("UPDATE user SET valid=1  WHERE pseudo='$pse' ");
                                    // execute the query
                                      $inser=$stmt->execute();   


                                   if($inser)
                                    { 

                                       //envoi email comfirm email
                                       $reSu=@$BClas->senMail("Email validation",$autor,$mai,"no_reply@facop.training",$mai,$tams,$message_html1,$message_txt1);

			     //isertion de l inscription dans l historique de la db
                                  $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                  $inser=$req->execute(array(0,$pse,$mai,$_SERVER["REMOTE_ADDR"],"Confirmation Email", $pse.", a confirmé son adress email (WEB)",0));

                                          
									   echo '<div class="ok_form">Votre Address email a bien été validée. Veuillez vous connecter</div>';//Message Sent, thank

											$BClas->showInfo('<h2>Felicitation</h2><p>Votre Address email a bien été validée <span>Veuillez vous connecter</span></p> ');

										    //$BClas->redirectPg("index.php?b=loguser.signup.loguser&cu=$nam&cm=$mai");
										    $BClas->redirectPg("index.php?b=loguser.login.loguser&co=1");
											$BClas->resetFo();
                                    }
                                    else
                                    {
                                       echo '<div class="no_form">Erreur "Validation impossible" </div>';
                                    }

                                }
                                else
                                {
                                   echo '<div class="no_form">Erreur "Code incorrect" </div>';
                                }

   
echo $result;
?>