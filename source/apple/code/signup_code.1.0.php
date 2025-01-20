<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

/*$_POST['mail']="fotsotrdev@gmail.com";
$_POST['token']="06573f5";*/
	 $mai=$_POST['mail'];
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

                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(email) nbr FROM user
                                 WHERE email=:pse AND token=:cod " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$_POST['mail'],'cod'=>$_POST['token']));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {


								                    $stmt = $tams->prepare("UPDATE user SET valid=1  WHERE email='$mai' ");
                                    // execute the query
                                      $inser=$stmt->execute();   


                                   if($inser)
                                    { 

                                       //envoi email comfirm email
                                       $reSu=@$BClas->senMail("Email validation",$autor,$mai,"no_reply@wypforun.org",$mai,$tams,$message_html1,$message_txt1);

			     //isertion de l inscription dans l historique de la db
                                  $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                  $inser=$req->execute(array(0,$_POST['mail'],$_POST['mail'],$_SERVER["REMOTE_ADDR"],"Confirmation Email", $_POST['mail'].", a confirmé son adress email (ANDROID)",0));

                                         $result="true";
                                    }
                                    else
                                    {
                                       $result="false";
                                    }

                                }
                                else
                                {
                                   $result="token";	
                                }

   
echo $result;
?>