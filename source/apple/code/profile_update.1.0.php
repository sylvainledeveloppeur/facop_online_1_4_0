<?php
require_once("../class/db_app.class.php");
require_once("../class/Bee.class.php");

/* $_POST['id']="23";
$_POST['email']="abouchou@gmail.com";
$_POST['nom']="fotso";
$_POST['tel']="65555555";
$_POST['pays']="cmr"; */


		 $mai=$_POST['email'];
   $token="";
    $autor="Autodataplus";
    $url="www.autodataplus.com";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://autodataplus.com/app/img/logo.png" alt="" width="160" height="160"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Mise à jour de votre profil</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Felicitation <strong>'.$mai.'</strong>,<br><br>
                              Votre profil à bien été mis à jour.<br><br>

                               Notre équipe est ravie de vous compter parmi les membres de notre application.<br><br>

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
	 
$iid=intval($_POST['id']);

                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user
                                 WHERE id=:pse  " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$iid));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1 )
                                {

$mail=$_POST['email'];
$tel=$_POST['tel'];
$sex=$_POST['sex'];
$nom=$_POST['nom'];
$pay=$_POST['pays'];
$datnais=$_POST['datnais'];
$vil=$_POST['vil'];


$stmt = $tams->prepare("UPDATE user SET  nom='$nom', email='$mail', sex='$sex', tel='$tel', pays='$pay', datnais='$datnais', vil='$vil'  WHERE id='$iid' ");
// execute the query
  $inser=$stmt->execute();


                                   if($inser)
                                    { 
 //isertion de l inscription dans l historique de la db
                                       $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                       $inser=$req->execute(array(0,$_POST['email'],$_POST['email'],$_SERVER["REMOTE_ADDR"],"Mise à jour du profil",$_POST['nom'].", Vient de mettre son profil à jour",0));

 //envoi email comfirm email
            // $reSu=@$BClas->senMail("Mise à jour de votre profil",$autor,$mai,"no_reply@autodataplus.com",$mai,$conn,$message_html1,$message_txt1);

			

                                         $result="true";
                                    }
                                    else
                                    {
                                       $result="false";
                                    }

                                }

                                else
                                {
                                   $result="mail-use";	
                                }

   
echo $result;
?>
