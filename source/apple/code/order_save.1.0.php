<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");


//$_POST['custom']="0-idtransa HHH 1-iduser HHH 2-pseudo HHH 3-codeid HHH 4-email HHH 5-parraindirect HHH 6-parrainindirect HHH 7-idpack HHH 8-codenbrpack HHH 9-codenamepack HHH 10-nompack HHH 11-prixpack";
/*  $_POST['custom']="1709715589702 HHH 738 HHH juli HHH 87726 HHH sylvainledeveloppeur@gmail.com HHH balo35 HHH wini45 HHH 11 HHH 2 HHH facop_a2 HHH Pack: Facop A2 HHH 100 HHH FLUTER HHH cm";
$_POST['result']="";
$_POST['statu']="";  */

$_POST['result']=htmlspecialchars($_POST['result']);
$_POST['statu']=htmlspecialchars($_POST['statu']);
$_POST['custom']=htmlspecialchars($_POST['custom']);

$custom=explode(" HHH ",$_POST['custom']);


		 $mai=$custom[4];
     $tran_id=$custom[0];
     $token="";
     $autor="Autodataplus";
     $url="www.autodataplus.com";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://autodataplus.com/app/img/logo.png" alt="" width="160" height="160"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Votre commande</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Félicitation <strong>'.$mai.'</strong>,<br><br>
                             Votre commande à bien été enregistré.<br><br>

                               Profitez des meilleurs formation sur notre application et merci de nous fair confiance.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Douala, Cameroun</div>
                                    <p>contact@autodataplus.com - www.autodataplus.com</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2021 autodataplus.com All rights reserved</p>
                                </div>
                              </div>
';
     
	 $result="";

                              
                if (isset($_POST['statu']))//**********************************************************************************************
                {

                         //isertion de l achat
                        $req=$tams->prepare('INSERT INTO achat  (idtransaction, iduser_cha, pseudo_cha, idpack_cha, codenbrpack, codenamepack_cha, nompack_cha, prixpack_cha, methodpaie_cha, statu_cha, datapai_cha, datephp_cha, datesql_cha ) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');
                        $inser=$req->execute(array( $custom[0], $custom[1], $custom[2], $custom[7], $custom[8], $custom[9], $custom[10], $custom[11], $custom[13], 1, $_POST['custom'], time() ));

                        if ($inser)
                          {
                                      //MAJ niveau user
                                      $ligneU=$tams->prepare("SELECT * FROM user
                                      WHERE id=:pse  " ) ;
                                      $ligneU->execute(array('pse'=>$custom[1]));
                                      $ligneAllU=$ligneU->fetch();

                                      if($ligneAllU['niveau']<$custom[8])
                                      {
                                          $uid=$custom[1];
                                          $univo=$custom[8];

                                          //upd 
                                          $stmt = $tams->prepare("UPDATE user  SET niveau=$univo  WHERE id=$uid ");
                                          // execute the query
                                          $stmt->execute();
                                      }
                                      
                                      //upd achat pending
                                      $stmt = $tams->prepare("UPDATE achat_pending  SET statu_cha=3  WHERE idtransaction=$tran_id ");
                                      // execute the query
                                      $stmt->execute();

                                      //isertion user notification
                                      $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti,	phpdate_noti,	sqldate_noti ) 
                                      VALUES (?,?,?,?,?,NOW()) ');
                                      $inser=$req->execute(array( $custom[1], 0, "Achat", "Vous avez achter le pack formation (".$custom[10].") ", $BClas->phpDate() ));


                                      if($custom[9]=="facop_a0")
                                      {
                                          //isertion livre la pyramide reussite facop A1
                                          $req=$tams->prepare('INSERT INTO user_book  (id_user_bk, actif_bk,	pdf_bk,	img_bk,	nom_bk,	nomEN_bk,	des_bk,	desEN_bk,	nivo_bk,	dure_bk,	nbpag_bk,	id_auteur_bk,	auteur_bk,	datephp, 	datesql 	 ) 
                                          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');
                                          $inser=$req->execute(array( $outil["id"], 1,  "pyramide.pdf", "pyramide.jpg", "La pyramide reussite", "La pyramide reussite", "Description", "Description", 2, "2 mois", 653, 0, "Lucas Kamdem",  $BClas->phpDate() ));
                                        
                                          //isertion user notification
                                          $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti,	phpdate_noti,	sqldate_noti ) 
                                          VALUES (?,?,?,?,?,NOW()) ');
                                          $inser=$req->execute(array( $custom[1], 0, "Offre", "Facop vous à offert le livre 'La pyramide de la reussite', suite à l'achat du pack (".$custom[10].") ", $BClas->phpDate() ));

                                      }
                                    

                                      //pdirect p indirect percentage
                                      $ligne=$tams->prepare("SELECT * FROM _webapp_info
                                      WHERE id=:pse  " ) ;
                                      $ligne->execute(array('pse'=>1));
                                      $ligneAll=$ligne->fetch();

                                      $costParainDirect=$ligneAll['pdirect'];
                                      $costParainInDirect=$ligneAll['pindirect'];
                                      $fraiPaiement=$ligneAll['frai_paie_mobile'];
                                      $money=intval($custom[11]);

                                      if(!empty($custom[5]) AND !empty($custom[6]))
                                      {

                                              // parrain direct ------------------------------------
                                              $userPD=trim($custom[5]);

                                              $MoneyParainDirect=$costParainDirect*$money/100;
                                              // $MoneyFacop=$money-$MoneyParainDirect;

                                              $blocA=$tams->query(" SELECT * FROM  user_bonus  WHERE user_bnk='$userPD'  ");
                              
                                              $outils = array();
                                              while($outilA=$blocA->fetch())
                                                {
                                                        $solde=$outilA["amount_bnk"]+$MoneyParainDirect;
                                                        $stmt = $tams->prepare("UPDATE user_bonus SET  amount_bnk=$solde  WHERE user_bnk='$userPD' ");
                                                        // execute the query
                                                        $upd=$stmt->execute();

                                                        //isertion parrain notification
                                                        $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti,	phpdate_noti,	sqldate_noti ) 
                                                        VALUES (?,?,?,?,?,NOW()) ');
                                                        $inser=$req->execute(array( $outilA["id_user_bnk"], 0, "Bonus", "Vous avez réçus: ".$MoneyParainDirect." FCFA, suite l\'achat du pack (".$custom[10].") par l'utilisateur: ".$custom[2].", Nouveau solde bonus: ".$solde." FCFA", $BClas->phpDate() ));
                                                      
                                                }	

                                                // parrain indirect ------------------------------------
                                                $userPD2=trim($custom[6]);

                                                $MoneyParainInDirect=$costParainInDirect*$money/100;
                                                $MoneyDesParain=$MoneyParainDirect+$MoneyParainInDirect;
                                                $MoneyFacop=$money-$MoneyDesParain;

                                                $blocA=$tams->query(" SELECT * FROM  user_bonus  WHERE user_bnk='$userPD2'  ");
                                
                                                  $outils = array();
                                                while($outilA=$blocA->fetch())
                                                  {
                                                          $solde2=$outilA["amount_bnk"]+$MoneyParainInDirect;
                                                          $stmt = $tams->prepare("UPDATE user_bonus SET  amount_bnk=$solde2  WHERE user_bnk='$userPD2' ");
                                                          // execute the query
                                                          $upd=$stmt->execute();

                                                          //isertion parrain notification
                                                          $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti,	phpdate_noti,	sqldate_noti ) 
                                                          VALUES (?,?,?,?,?,NOW()) ');
                                                          $inser=$req->execute(array( $outilA["id_user_bnk"], 0, "Bonus", "Vous avez réçus: ".$MoneyParainInDirect." FCFA, suite l\'achat du pack (".$custom[10].") par l'utilisateur: ".$custom[2].", Nouveau solde bonus: ".$solde2." FCFA", $BClas->phpDate() ));
                                                        
                                                  }	              

                                            
                                                //isertion bank facop
                                                $req=$tams->prepare('INSERT INTO _admin_bank  (some_bk,	pack_bk, user_bk,	padirect_bk,	paindirect_bk,	datephp_bk,	datesql_bk ) 
                                                VALUES (?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array( $MoneyFacop, $custom[10], $custom[2], $custom[5], $custom[6], $BClas->phpDate() ));



                                                // isertion de achat dans l historique admin de la db
                                                $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu, user, emai, ip ,type, messag,lu,dates ) 
                                                VALUES (?,?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array($custom[1], $custom[2], $custom[4], $_SERVER["REMOTE_ADDR"],"ACHAT PACK", $custom[2].", a acheté le pack (".$custom[10]."). Parrain direct:".$custom[5].". Parrain indirect:".$custom[6]." _(ANDROID)",0));


                                                $result="true";
                                      }
                                      else if(!empty($custom[5]))
                                      { 
                                                $userPD=trim($custom[5]);

                                                $MoneyParainDirect=$costParainDirect*$money/100;
                                                $MoneyFacop=$money-$MoneyParainDirect;

                                                $blocA=$tams->query(" SELECT * FROM  user_bonus  WHERE user_bnk='$userPD'  ");
                                
                                                $outils = array();
                                                while($outilA=$blocA->fetch())
                                                  {
                                                          $solde=$outilA["amount_bnk"]+$MoneyParainDirect;
                                                          $stmt = $tams->prepare("UPDATE user_bonus SET  amount_bnk=$solde  WHERE user_bnk='$userPD' ");
                                                          // execute the query
                                                          $upd=$stmt->execute();

                                                          //isertion parrain notification
                                                          $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti,	phpdate_noti,	sqldate_noti ) 
                                                          VALUES (?,?,?,?,?,NOW()) ');
                                                          $inser=$req->execute(array( $outilA["id_user_bnk"], 0, "Bonus", "Vous avez réçus: ".$MoneyParainDirect." FCFA, suite l\'achat du pack (".$custom[10].") par l'utilisateur: ".$custom[2].", Nouveau solde bonus: ".$solde." FCFA", $BClas->phpDate() ));
                                                        
                                                  }	

                                            
                                                //isertion bank facop
                                                $req=$tams->prepare('INSERT INTO _admin_bank  (some_bk,	pack_bk, user_bk,	padirect_bk,	paindirect_bk,	datephp_bk,	datesql_bk ) 
                                                VALUES (?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array( $MoneyFacop, $custom[10], $custom[2], $custom[5], 0, $BClas->phpDate() ));


                                                // isertion de achat dans l historique admin de la db
                                                $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu, user, emai, ip ,type, messag,lu,dates ) 
                                                VALUES (?,?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array($custom[1], $custom[2], $custom[4], $_SERVER["REMOTE_ADDR"],"ACHAT PACK", $custom[2].", a acheté le pack (".$custom[10].") . Parrain direct:".$custom[5].". Parrain indirect:".$custom[6]." _(ANDROID)",0));


                                        
                                                $result="true";
                                      }
                                      else
                                      {
                                                //isertion bank facop
                                                $req=$tams->prepare('INSERT INTO _admin_bank  (some_bk,	pack_bk, user_bk,	padirect_bk,	paindirect_bk,	datephp_bk,	datesql_bk ) 
                                                VALUES (?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array( $money, $custom[10], $custom[2], 'no', 'no', $BClas->phpDate() ));



                                                // isertion de achat dans l historique admin de la db
                                                $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu, user, emai, ip ,type, messag,lu,dates ) 
                                                VALUES (?,?,?,?,?,?,?,NOW()) ');
                                                $inser=$req->execute(array($custom[1], $custom[2], $custom[4], $_SERVER["REMOTE_ADDR"],"ACHAT PACK", $custom[2].", a acheté le pack (".$custom[10]."). Parrain direct: --- . Parrain indirect: ---  _(ANDROID)",0));


                                            
                                                $result="true"; 
                                      }

                              
                          }
                          else
                          {
                              $result="false";
                          }
                                                
                                    

              }
              else
              {
                      //isertion erreur inconnu
                      $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                          VALUES (?,?,?,?,?,?,?,NOW()) ');
                      $inser=$req->execute(array(0,'error user','no mail',$_SERVER["REMOTE_ADDR"],"Error payment "," Valeur (".$_POST['custom'].")",0));

                      $result="false";

              }

   
echo $result;
?>