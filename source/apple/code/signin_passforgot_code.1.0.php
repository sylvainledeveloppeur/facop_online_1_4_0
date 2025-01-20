<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");


	 $mai=$_POST['mail'];
     //$token=@$BClas->toKen(6,'1');
     $autor="TEFconnect";
     $url="www.tefconnect.net";
     $thelink='';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://autodataplus.com/app/img/logo.png" alt="" width="160" height="160"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Mot de passe oublié</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Hey <strong>'.$mai.'</strong>,<br><br>
                              Nous avons reçu une demande de modification de votre mot de passe. Veuillez poursuivre en utilisant ce code  Ce code est valable pour 24 heures.<br><br>

                               Nous restons à votre disposition.<br><br>

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


	// $_POST['username']="one@gmail.com";
	// $_POST['code']="ffffff";

	 // Check whether username or password is set from android	
     if(isset($_POST['mail']) && isset($_POST['code']) )
     {
		  // Innitialize Variable
		  $result='';
	   	  $username =$_POST['mail'];
	   	  $token=$_POST['code'];

		 
	  //recherche du mail
                                     $nbr_pseudo=$tams->prepare("SELECT COUNT(*) nbr FROM user_passforgot
                                     WHERE email=:pse AND token=:tok AND valid=0 " ) ;
                                     $nbr_pseudo->execute(array('pse'=>$username,'tok'=>$token));
                                     $chif_pse=$nbr_pseudo->fetch();


          if($chif_pse['nbr']==1)
          {
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