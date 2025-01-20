<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");


	 $mail=$_POST['mail'];
	 $pass=$_POST['pass'];
     //$token=@$BClas->toKen(6,'1');
     $autor="FACOP";
     $url="www.facop.training";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
     <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
       <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
         <img src="https://facop.wypforun.org/source/img/logo/logo.png" alt="" width="160" height="160"> 
         <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Nouveau Mot de passe</h1>
         </div>
     <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

         Félicitation <strong>'.$mail.'</strong>,<br><br>
     Votre mot de passe a bien été modifié.<br><br>

      Nous restons à votre disposition.<br><br>

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


	// $_POST['username']="one@gmail.com";
	// $_POST['code']="ffffff";

	 // Check whether username or password is set from android	
     if(isset($mail) && isset($pass) )
     {
		  // Innitialize Variable
		  $result='';
          $passSha=sha1($pass);
		 
	  //recherche du mail

               $stmt = $tams->prepare("UPDATE user SET pass='$passSha'  WHERE email='$mail' ");
               // execute the query
               $inser=$stmt->execute();

          if($inser)
          {

             //envoi email comfirm email
             $reSu=@$BClas->senMail("Mot de passe modifié",$autor,$mai,"no_reply@wypforun.org",$mai,$tams,$message_html1,$message_txt1);
                   

			        //isertion de l inscription dans l historique de la db
                                  $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates )
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                  $inser=$req->execute(array(0,$mail,$mail,$_SERVER["REMOTE_ADDR"],"Mot de passe", $mail.", a réinitialiser son mot de passe",0));


                                    $stmt = $tams->prepare("UPDATE user_passforgot SET valid=1  WHERE email='$mail' ");
                                     // update
                                     $inser=$stmt->execute();

                                  $result="true";

          }  
          else
          {
			  	$result="false";
          }

		  
         // send result back to android
   	 echo $result;
      }
	
?>