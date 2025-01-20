<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");


   
	 $mai=$_POST['data'];
   $id=htmlspecialchars($_POST['id']);

   $data=htmlspecialchars($_POST['data']);
   $myData=explode(" HHH ",$data);

     $token=@$BClas->toKen(6,'1');
     $autor="Facop";
     $url="www.facop.academy";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://TEFconnect.com/app/img/logo.png" alt="" width="160" height="160"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Bienvenue</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Bienvenue <strong>'.$mai.'</strong>,<br><br>
                              Nous avons bien réçu votre inscription. Veuillez utiliser ce code <strong style="font-size: 20px;">'.$token.'</strong> pour valider votre email.<br><br>

                               Notre équipe est ravie de vous compter parmi les membres de notre application.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Douala, Cameroun</div>
                                    <p>contact@TEFconnect.com - www.TEFconnect.net</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2022 TEFconnect.com All rights reserved</p>
                                </div>
                              </div>
';
   
$minRetrait="";
$solde=0;

$blocA=$tams->query(" SELECT * FROM  _webapp_info  WHERE id=1 ");
                   
                                $outils = array();
                         while($outilA=$blocA->fetch())
                           {

                              $minRetrait=$outilA["minRetrait"];
                            
                           }


                           $nbr_pseudoPA=$tams->prepare("SELECT * FROM user_bonus
                           WHERE id_user_bnk=:pse " ) ;
                           $nbr_pseudoPA->execute(array('pse'=>$id));
                           $chif_psePA=$nbr_pseudoPA->fetch();

                           $solde=$chif_psePA['amount_bnk'];
                           $soldePending=$chif_psePA['pending_bnk'];

   
                    if($soldePending>0)
                    {
                      exit("retrait-encours");
                    }
                else if($myData[0]>=$minRetrait AND $myData[0]<=$solde)
                {
                  $date=$BClas->phpDate();
                  $solde2=$solde-$myData[0];
                  $soldeRetrait=$myData[0];

                            $stmt = $tams->prepare("UPDATE user_bonus SET  amount_bnk='$solde2', pendingsold_bnk='$solde', pending_bnk='$soldeRetrait', pendistatu_bnk=0, pendidate_bnk='$date'  WHERE id_user_bnk='$id' ");
                            // execute the query
                            $upd=$stmt->execute();


                          if($upd)
                            { 

                                //envoi email comfirm email
                                //$reSu=@$BClas->senMailWhois("Welcome on TEFconnect",$autor,$mai,"no_reply@tefconnect.net",$mai,$conn,$message_html1,$message_txt1);
                
                                 // isertion de l inscription dans l historique retrait du user
                              $req=$tams->prepare('INSERT INTO user_historic_retrai (id_user_his, suj_his, desc_his, cost_his, someout_his, somenew_his, etat_his, phpdate_his, sqldate_his ) 
                              VALUES (?,?,?,?,?,?,?,?,NOW()) ');
                              $inser=$req->execute(array($id,"Retrait bonus","Demande de retrait: RSOLDE; nouveau solde: NSOLDE" ,  $data, $soldeRetrait, $solde2, 0, $BClas->phpDate() ));

                               //isertion welcome
                               $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti, someout_noti, somenew_noti,	phpdate_noti,	sqldate_noti ) 
                               VALUES (?,?,?,?,?,?,?,NOW()) ');
                               $inser=$req->execute(array( $id, 0, "Retrait bonus", "Vous avez fait une demande de retrait: RSOLDE; nouveau solde: NSOLDE", $soldeRetrait, $solde2, $BClas->phpDate() ));


                              // isertion de l inscription dans l historique de la db
                              $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                        VALUES (?,?,?,?,?,?,?,NOW()) ');
                                $inser=$req->execute(array(0,$_POST['id'],$_POST['data'],$_SERVER["REMOTE_ADDR"],"DEMANDE RETRAIT", $_POST['id'].", demande un retrait:".$soldeRetrait." FCFA (ANDROID)",0));

                                $result="true";
                            }
                            else
                            {
                              $result="false";
                            }


                 }
                 else
                 {
                   $result="montant";	
                 }

   
echo $result;
?>