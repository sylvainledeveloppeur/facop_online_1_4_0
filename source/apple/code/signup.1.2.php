<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");
//require_once("../class/obitsms/obitsms.class.php");

$key ='bw6ameex62pugg30l6rawhxk9w1ane6o';
$sender='FACOP';

/* $_POST['mail']="fotsoweb@gmail.com";
$_POST['pseudo']="fotso";
$_POST['prain']="";
$_POST['pass']="ffffffff"; */

   
	 $mai=$_POST['mail'];
   $_POST['pseudo']=htmlspecialchars($_POST['pseudo']);
   $_POST['pseudo']=trim($_POST['pseudo']);
   $_POST['pseudo']=strtolower($_POST['pseudo']);

   
   $_POST['prain']=htmlspecialchars($_POST['prain']);
   $_POST['prain']=trim($_POST['prain']);
   $_POST['prain']=strtolower($_POST['prain']);

   $mai=$_POST['mail'];
   $token=@$BClas->toKen(6,'1');
   $autor="Facop Online";
   $url="www.facop.training";
   $thelink='';
   $message_txt1 = "Message from ".$url;
   $message_html1 = '
                            <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                              <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                <img src="https://www.facop.training/source/img/logo/logo.png" alt="" width="100%" height="160"> 
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
                                  <div>Yaoundé-Elig Essono; B.P: 3928; +327 222 21 98 70</div>
                                    <p>info@facop.training - www.facop.training</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2023 facop.training All rights reserved</p>
                                </div>
                              </div>
';
   
$result="";
$update="";
$signup="";

$blocA=$tams->query(" SELECT * FROM  _webapp_info  WHERE id=1 ");
                   
                                $outils = array();
                         while($outilA=$blocA->fetch())
                           {

                              $update=$outilA["android_noupdate"];
                              $signup=$outilA["android_nosignup"];
                            
                           }


   
                if($update==1)
                {

                  $result="android_noupdate";

                }
                else if($signup==1)
                {
                  
                  $result="android_nosignup";

                }
                else // go to sign up user
                {

                           //no space in pseudo
                         if ( preg_match('/\s/', $_POST['pseudo']) ){ exit("espace");} //no space in pseudo
                         if ( strlen($_POST['pseudo'])<2 OR  strlen($_POST['pseudo'])>10 ){ exit("short");} //gggggggggghghghgggh
                         if ( !preg_match("/^[a-zA-Z0-9]*$/", $_POST['pseudo']) ){ exit("special");}


                            $nbr_pseudo=$tams->prepare("SELECT COUNT(email) nbr FROM user
                            WHERE email=:pse  " ) ;
                            $nbr_pseudo->execute(array('pse'=>$_POST['mail']));
                            $chif_pse=$nbr_pseudo->fetch();

                          if ($chif_pse['nbr']==0)
                            {


                              $nbr_pseudoP=$tams->prepare("SELECT COUNT(pseudo) nbr FROM user
                              WHERE pseudo=:pse  " ) ;
                              $nbr_pseudoP->execute(array('pse'=>$_POST['pseudo']));
                              $chif_pseP=$nbr_pseudoP->fetch();
  
                            if ($chif_pseP['nbr']==0)
                              {
								     $_POST['prain']=empty($_POST['prain'])? "": trim($_POST['prain']);
								      /*$nbr_pseudoPA=$tams->prepare("SELECT COUNT(pseudo) nbr FROM user
									  WHERE pseudo=:pse " ) ;
									  $nbr_pseudoPA->execute(array('pse'=>$_POST['prain']));
									  $chif_psePA=$nbr_pseudoPA->fetch();

									  $nbrParain=$chif_psePA['nbr'];

									if (!empty($_POST['prain']) AND $nbrParain==1)
									   {*/
										
										     //max id SELECT * FROM table WHERE id = (SELECT MAX(id) FROM table);
                                    
											  $nbr_pseudo=$tams->prepare("SELECT * FROM user WHERE id = (SELECT MAX(id) FROM user) " ) ;
															  $nbr_pseudo->execute();
															  $chif_pse=$nbr_pseudo->fetch();

															$idmax=$chif_pse['id'];
											  $codeId=@$BClas->toKen(2,'1').$idmax;

											  $req=$tams->prepare('INSERT INTO user (codeId, pseudo, parrain, ava, nom, email, token, valid, sms, bloc, pass, conecte, niveau, enligne, tel, pays, sex, lienais, datnais, adr, vil, datephp, datesql) 
												VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');

											  $inser=$req->execute(array( $codeId, trim($_POST['pseudo']), $_POST['prain'], "0", "0", $_POST['mail'], $token, 0, 0, 0, sha1($_POST['pass']), 1, 0, $BClas->phpDate(), "0", "0", "0", "0", "0", "0", "0", $BClas->phpDate() ));



											  if($inser)
												{ 

													 //envoi email comfirm email
													  $reSu=@$BClas->senMail("Inscription",$autor,$mai,"noreply@facop.training",$mai,$tams,$message_html1,$message_txt1);

												  //send_sms($key, $sender, '694815891', 'Inscription Facop, Code: '.$token);

												   // isertion de l inscription dans l historique de la db
												   $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
																							VALUES (?,?,?,?,?,?,?,NOW()) ');
													$inser=$req->execute(array(0,$_POST['pseudo'],$_POST['mail'],$_SERVER["REMOTE_ADDR"],"Inscription", $_POST['pseudo'].", Vient de créer son compte (ANDROID)",0));

													$result="true";
												}
												else
												{
												  $result="false";
												}
											 
									  /* }
								   else
								       {
									      $result="prain_no";	
								       }*/
      

                                 }//PSEUDO
                                else
                                {
                                  $result="pseudo_use";	
                                }

                            }//email
                            else
                            {
                              $result="mail-use";	
                            }

                 }

   
echo $result;
?>