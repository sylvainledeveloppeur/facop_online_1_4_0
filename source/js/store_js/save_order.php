<?php session_start();
require_once('../db_2_js.class.php');
require_once('../../function/fun-panier/fonctions-panier.php');

extract($_POST);

if(!empty($mail) AND !empty($nom) AND !empty($tel)  AND !empty($adr) AND !empty($tel2) AND !empty($mail2) AND !empty($vil2) AND !empty($mail2) AND !empty($adr2)   )
{
	  if(!empty($monam) AND !empty($mopay)   )
          {
                               /*enregistre token de la commande *************************/	
                                      $tab1=array("a","b","c","d","e","f","g","h","i","j","k","l","n","m","o","p","q","r","s","t","u","v","w","x","y","z");
                                      $tab2=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","T","U","V","W","X","Y","Z");
                                      $tab3=array(0,1,2,3,4,5,6,7,8,9);

                                      $token="";
                                      for($i=0;$i<15;$i++)
                                      {
                                          $token.=$tab1[rand(0,24)];
                                          $token.=$tab3[rand(0,8)];
                                          $token.=$tab2[rand(0,24)];
                                      }
          
                                /*enregistre  la commande du client*************************/	
                                      $letter="A,B,C,D,E,F,G,H,I,J,K,L,M,N,,O,P,Q,R,S,T,U,V,W,X,Y,Z";
                                      $letter_exp=explode(",",$letter);
                                      $ranlet=rand(0,26);
                                      $ranlet2=rand(0,26);

                                           $u=$letter_exp[$ranlet].$letter_exp[$ranlet2];
                                           $d=rand(10,99);
                                           $t=rand(10,99);
                                           $q=rand(10,99);
                                           $s=rand(10,99);
                                           $numero_comande=$u.$d.$t.date('Y');
                                           $_SESSION['nbcomand']=$numero_comande;
          
                         //envoi email comfirm email
                         //senMail("Comfirmez votre address email","www.moguez.com","Moguez",$nam,"no_reply@moguez.com",$mai,$tams);
 
              creatOderfile($_SESSION['nbcomand'],$_SESSION['id'],$nom,"Pays",$tel,$mail,$nom,$mail2,$adr2,$vil2,"---",'Pays',$tel2,$monam,'0','€');
          
                         $req=$tams->prepare('INSERT INTO _order (id_aut_ord,mail_ord,mode_ord,amount_ord, numero_ord, pay_ord, livre_ord, token_ord, date_ord) 
                                    VALUES (?,?,?,?,?,?,?,?,NOW()) ');
                         $inser=$req->execute(array($_SESSION['id'],$mail,$mopay,intval(MontantGlobalEtReduction()),$_SESSION['nbcomand'],0,0,$token));

                             if($inser)
                              { 
                              
                                  $_SESSION['STORE_MODE']=$mopay;
                                 $_SESSION['STORE_MODE2']=$monam;
                                  $_SESSION['STORE_TOKEN']=$token;
                             																 //notification
                                  $bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
                                  $inser=$bloc->execute(array($_SESSION['nam'],$_SESSION['id'],"Nouvelle commande enregistrée",0));

                                 if(!empty($_SESSION['STORE_MODE']) AND !empty($_SESSION['STORE_ORDER']) AND !empty($_SESSION['STORE_TOKEN']))
                                 {
                                     if($_SESSION['STORE_MODE']=="western")
                                     {
                                        echo '<script>
                                        document.getElementById("poptex").innerHTML="<h2>Felicitation! Commande enregistrée</h2><p>Faites votre paiement</p> ";
                                        document.getElementById("popnoti").style.display="block";
                                         window.location.assign("index.php?b=user.achat.user&or=1");
                                        </script>';  
                                     }
                                     else if($_SESSION['STORE_MODE']=="mtn")
                                     {
                                       echo '<script>
                                        document.getElementById("poptex").innerHTML="<h2>Felicitation! Commande enregistrée</h2><p>Faites votre paiement</p> ";
                                        document.getElementById("popnoti").style.display="block";
                                         window.location.assign("index.php?b=pay.mtn.pay");
                                        </script>';   
                                     }
                                     
                                     
                                 }
                                 else
                              {
                               echo '<div class="stop_form">Erreur </div>';
                              }
                                 
                                   

                              }
                              else
                              {
                               echo '<div class="stop_form">Erreur "sauvegarde impossible" </div>';
                              }

          }
          else{
              echo '<div class="stop_form">Errer "Sélectionnez un moyen de paiement"</div>';
          }  
}
else{
	echo '<div class="stop_form">Tous les champs sont obligatoires</div>';
}
										


      /*-----------------sent email--------------------------------------------------------*/                                 

     function senMail($sujet,$url,$autor,$clien,$mailSender,$mailClien,$tams)
            {
                                      $tab1=array("a","b","c","d","e","f","g","h","i","j","k","l","n","m","o","p","q","r","s","t","u","v","w","x","y","z");
                                      $tab2=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","T","U","V","W","X","Y","Z");
                                      $tab3=array(0,1,2,3,4,5,6,7,8,9);

                                      $token="";
                                      for($i=0;$i<15;$i++)
                                      {
                                          $token.=$tab1[rand(0,24)];
                                          $token.=$tab3[rand(0,8)];
                                          $token.=$tab2[rand(0,24)];
                                      }

                $thelink='http://moguez.bee4tech.com/index.php?b=login.login.login&token='.$token.'&email='.$mailClien.'';
                

                        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailClien)) // On filtre les serveurs qui rencontrent des bogues.
                        {
                            $passage_ligne = "\r\n";
                        }
                        else
                        {
                            $passage_ligne = "\n";
                        }
                        //=====Déclaration des messages au format texte et au format HTML.
                        $message_txt = "Message from ".$url;
                        $message_html = '<!doctype html>
                              <html data-lt-installed="true"><head>
                              <meta charset="utf-8">
                              <title>Email</title>
                              <meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202">
                               <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                               <style> @media screen and (max-width:480px)
                                    {
                                        #thebod{
                                           width: 93% !important;
                                        }
                                        
                                    }</style>
                              </head>

                              <body cz-shortcut-listen="true" style="padding-top: 30px;padding-bottom: 50px;background-color: #e6e6e6;">

                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://moguez.bee4tech.com/source/img/logo/logo.png" alt="" width="199" height="60"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Bienvenue</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Bienvenue <strong>'.$clien.'</strong>,<br><br>
                              Nous avons bien reçu votre inscription. Cependant, veuillez comfirmer votre 
                              address email en clickant sur ce lien <a href="'.$thelink.'" style="display: inline-block;background-color: #3d90fb;padding: 4px 6px;border-radius: 5px;color: white;text-decoration: none;font-weight: bold;">Comfirmer mon address email</a> ou en utilisant le lien suivant dans votre navigateur  <em>'.$thelink.'</em> <br><br>

                               Notre équipe est ravi de vous compter parmis les membres de notre site web.<br><br>

                                  Cordialement,<br><br>

                                  '.$autor.'
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Berlin, Allemagne</div>
                                    <p>info@moguez.com - www.moguez.com</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2021 Moguez.com All rights reserved</p>
                                </div>
                              </div>

                              </body></html>';
                        //==========

                        //=====Création de la boundary
                        $boundary = "-----=".sha1(rand());
                        //==========

                        //=====Définition du sujet.
                        $sujet = $sujet;
                        //=========

                        //=====Création du header de l'e-mail.
                        $header = "From: \"".$autor."\"<".$mailSender.">".$passage_ligne;//Le nom de l’expéditeur de dois pas présenter d'espace, c'est surement pour cette raison que ton code ne marchais pas.
                        $header.= "Reply-to: \"".$autor."\" <".$mailSender.">".$passage_ligne;
                        $header.= "MIME-Version: 1.0".$passage_ligne;
                        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
                        //==========

                        //=====Création du message.
                        $message = $passage_ligne.$boundary.$passage_ligne;
                        //=====Ajout du message au format texte.
                        $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_txt.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary.$passage_ligne;
                        //=====Ajout du message au format HTML
                        $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_html.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        //==========

                        //=====Envoi de l'e-mail.
                        $eta=mail($mailClien,$sujet,$message,$header);
                        //==========


                           if($eta)
                            {
                                 echo '<div class="ok_form">Veuillez confirmer votre address email</div>';//Message Sent, thank
                               
                                      
                                      //isertion de token rest pass de la db
                                       $reqt=$tams->prepare('INSERT INTO emailvalidat (email ,token,dates ) 
                                                                           VALUES (?,?,NOW()) ');
                                       $insert=$reqt->execute(array($mailClien,$token));

                                        //isertion de l inscription dans l historique de la db
                                       $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,dates ) 
                                                                           VALUES (?,?,?,?,?,?,NOW()) ');
                                       $inser=$req->execute(array(0,$clien,$mailClien,"1.1.1.1","INSCRIPTION",$clien." Vient de créer son compte utilisateur"));
                            }
                            else
                            {

                                echo '<div class="stop_form">'.$_SESSION['indexjax'][2].'</div>';//Error
                            }


            }
		
/*----------------creat order file (html)-----------------------------------------------*/
function creatOderfile($nb_order,$id_user,$nam_user,$pay_user,$tel_user,$mai_user,$nomlivrai,$maillivrai,$adreslivrai,$villivrai,$reglivrai,$paylivrai,$tellivrai,$moypay,$somelivrai,$devise)
   {


      $nompag=$nb_order;

      $texte='<!doctype html>
  <html>
  <head>
  <meta charset="utf-8">
  <title>Bon de commande N° '.$nb_order.'</title>
  <link href="../style/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="img/png"  href="../../favicon.ico" />
  <style type="text/css">
      strong {
      font-weight: bold;
  }
      .pagbon {
      border: solid thin;
      min-height: 600px;
      width: 90%;
      margin: 40px auto;
      background-color: white;
      border-radius: 15px;
      /* box-shadow: 0px 0px 2px #333; */
      padding: 50px 100px;
      font-size: 25px;
  }
      .blochead::after {
      content: "";
      display: block;
      clear: both;
  }
  .infosto {
      width: 50%;
      float: left;
      box-sizing: border-box;
      padding: 10px;
      margin-top: 115px;
  }
      .infocus {
      float: right;
      width: 40%;
      box-sizing: border-box;
      padding: 10px;
  }padding: 10px;
  }
      .blochead::after {
      content: "";
      display: block;
      clear: both;
  }
      .imgtop {
      width: 35%;
  }
      .bontop {
      border: solid thin;
      background-color: #f2f2f2;
      padding: 5px;
      box-sizing: border-box;
      margin-bottom: 15px;
  }
      .bonbot {
      /* background-color: aliceblue; */
      border: solid thin #d4e0ea;
      padding: 36px 10px;
      box-sizing: border-box;
  }
      .bontit {
      font-weight: bold;
      padding: 36px 5px 2px;
      font-size: 30px;
      border-bottom: solid 3px #d8dade;
      margin-bottom: 25px;
  }
      .blocdres {
      border: solid thin #616d7d;
      border-radius: 10px;
      padding: 15px 20px;
      margin: 56px auto;
  }
          .blocreg {
      border: solid thin #616d7d;
      border-radius: 10px;
      padding: 15px 20px;
      margin: 56px auto;
  }
      .blocprint {
      background-color: antiquewhite;
      /* color: wheat; */
      /* text-align: center; */
      padding-left: 15px;
      border: solid thin;
  }
      #print {
      background-color: #35e613;
      border-radius: 5px;
      color: white;
      padding: 1px 17px;
      cursor: pointer;
      border: solid thin black;
      font-size: 20px;
  }
      #print:hover {
      color: #000;
  }
  /*panier*/
      #ocart {
      font-size: 15px;
  }
  table#ocart tr th {
      border-left: solid thin #d7d7d7;
  }
  table#ocart tr {
      /* width: 25%; */
      border-bottom: solid thin #ecedf0;
      position: relative;
  }
  table#ocart tr th:nth-child(1) {
      width: 10%;
  }
  table#ocart tr th:nth-child(1) img {
      width: 70%;
  }
  table#ocart tr th:nth-child(2) {
      width: 30%;
  }
  table#ocart tr th:nth-child(3) {
      width: 10%;
  }
  table#ocart tr th:nth-child(4) {
      width: 10%;
  }
  table#ocart tr th:nth-child(5) {
      width: 15%;
  }
  table#ocart tr th:nth-child(6) {
      width: 20%;
  }
  table#ocart tbody tr:nth-child(1) {
      background-color: #a3abb3;
      padding: 6px 0 !important;
      color: white;
  }
  table#ocart tbody tr:nth-child(1) th {
      padding: 10px 0;
  }
  table#ocart tr:hover {
      background-color: #f3f6fb;
      opacity: 0.6;
  }
  .onb {
      display: block;
      position: absolute;
      top: 2px;
      left: 0;
      background-color: #edeeef;
      width: 30px;
      height: 30px;
      border-radius: 100%;
      line-height: 2;
      /* color: white; */
      border: solid thin;
      box-shadow: 0px 0px 6px 0px #0006;
  }
  .osup {
      display: block;
      position: absolute;
      top: 2px;
      right: 0;
      width: 30px;
      height: 30px;
      border-radius: 100%;
      line-height: 2;
      color: #ff3600;
      font-size: 20px;
      cursor: pointer;
  }
  .cart0 {
      color: red;
  }
  .linecapri li {
      list-style-type: none;
      border-bottom: solid thin #e9e9e9;
      padding: 10px 0;
      width: 90%;
  }
  .cart_pri {
      background-color: #f3f3f3;
      text-align: center;
      margin: auto;
      width: 95%;
      font-size: 45px;
      color: green;
      font-weight: bold;
      padding: 10px 0;
  }
  .pas_cart {
      display: block;
      /* margin: auto; */
      width: 70%;
      border: solid thin #234223;
      padding: 10px 2px;
      text-align: center;
      margin: 30px auto;
      background-color: #3b8705;
      color: white !important;
      border-radius: 3px;
  }
  .pas_cart:hover {
      opacity: .7;
  }
  #formtique div {
      padding: 5px 0;
  }
  .putbon {
      width: 90%;
      margin: auto;
      background-color: #565859;
      padding: 2px !important;
      border-radius: 3px;
  }
  .putbon input {
      display: block;
      width: 100%;
      border: transparent;
      text-align: center;
      padding: 10px 0;
  }
  .putbon input:nth-child(2) {
      background-color: inherit;
      color: white;
  }
  .putbon input:nth-child(2):hover {
      opacity: .7;
      background-color: #070707;
  }
  .vidcart {
      position: absolute;
      left: -23px;
      top: 0;
      z-index: 100;
      width: 20px;
      background-color: #d50404;
      color: white !important;
      font-size: 20px;
      text-align: center;
      border-radius: 3px;
      box-shadow: 0px 0px 6px 0px #0006;
  }
  .vidcart em {
      color: inherit;
      display: block;
      /* text-decoration: none; */
      font-style: normal;
  }
  table#ocart input {
      display: block;
      width: 83%;
      margin: auto;
      text-align: center;
      padding: 5px 0;
      border-radius: 5px;
      box-sizing: border-box;
      border: solid thin #d6dade;
      background-color: #f6f5f3;
  }

  @media screen and (max-width:768px)
  {

       .pagbon {
      width: 98%;
      padding: 50px 20px;
      margin: 10px auto;
  padding: 0px 20px;
  }
  .infosto {
      width: 98%;
  }
      .infocus {
      width: 98%;
  }
  .infosto {
      width: 98%;
      /* float: left; */
      box-sizing: border-box;
      padding: 10px;
      margin-top: 20px;
  }
  }

  @media print 
  {
  .blocprint {
      display:none;
  }
   .pagbon {
      width: 98%;
      padding: 50px 20px;
      margin: 10px auto;
  padding: 0px 20px;
  font-size: 15px;
  }
  #bloc_comand {
      width: 98%;
      margin: 50px auto;
  }
  #bloc_comand li {
      float: left;
      width: 50%;
  }


  }
  </style>


  </head>

  <body>

  <div class="pagbon">
  <div class="blocprint">Il est vivement conseillé d\'imprimer cette page (Mode:paysage)  <span id="print">Imprimer maintenant</span></div>
    <div class="blochead">
      <div class="infosto">
          <div class="bontit">Bon de commande </div>
      <div class="imgtop"><img src="../img/logo/logo.png" alt=""/></div>
  <p class="linesto">Moguez</p>
  <p class="linesto">BP : Berlin</p>
  <p class="linesto">Berlin</p>
  <p class="linesto">Allemagne</p>
  <p class="linesto"><strong>Tél :</strong> +237 699 46 81 64 / +237 674 03 70 04</p>
  <p class="linesto"><strong>Email :</strong>info@moguez.com</p>
  <p class="linesto"><strong>Site web :</strong> www.moguez.com</p>
  </div>
      <div class="infocus">
        <div class="bontop">
    <p class="linesto">	BON DE COMMANDE N° '.$nb_order.'</p>
    <p class="linesto">Date d\'émission : '.date('d-m-Y H:i:s').'</p>
        </div>
        <div class="bonbot">
    <p class="linesto">'.$nam_user.'</p>


    <p class="linesto">'.$pay_user.'</p>
    <p class="linesto"><strong>Tél:</strong> '.$tel_user.'</p>
    <p class="linesto"><strong>E-mail:</strong> '.$mai_user.'</p>
        </div>


      </div>
    </div>

    <div class="blocdres">

      <div class="bontit">Adresse de livraison </div>
  <p class="linesto"><strong>Destinataire :</strong> '.$nomlivrai.'</p>
  <p class="linesto"><strong>Address :</strong>'.$adreslivrai.'</p>
  <p class="linesto"><strong>Ville :</strong> '.$villivrai.'</p>
  <p class="linesto"><strong>Région :</strong> '.$reglivrai.'</p>
  <p class="linesto"><strong>Pays :</strong> '.$paylivrai.'</p>
  <p class="linesto"><strong>Téléphone :</strong> '.$tellivrai.'</p>
  <p class="linesto"><strong> Email :</strong> '.$maillivrai.'</p>
  <p class="linesto"><strong>Date de livraison :</strong> 72 heures (Max)  	</p>

    </div>

    <div class="bonpanier">
      <div class="wid_98 bg_blanc bor_gris_1 mar_top_15 mar_auto">
  <table id="ocart" width="100%" border="1">

                  <tbody>
                    <tr>	  
                      <th scope="col">Image </th>
                      <th scope="col">Article</th>
                      <th scope="col">Quantité</th>
                      <th scope="col">Prix unitaire</th>
                      <th scope="col">Expéditeur</th>
                      <th scope="col">Sous-total</th>
                    </tr>';

       for ($i=0 ;$i < count($_SESSION['panier']['produit_cus']) ; $i++)
            {
                $ii=$i+1;
           $lien=' A livrer' ;

              $texte.='<tr>
              <th scope="col"><img src="../img/store/'.htmlspecialchars($_SESSION['panier']['img_cus'][$i]).'"  alt=""/></th>
              <th scope="col">'.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'</th>
              <th scope="col"><input type="text" value="'.htmlspecialchars($_SESSION['panier']['qte_cus'][$i]).'"> </th>
              <th scope="col">'.htmlspecialchars($_SESSION['panier']['priuni_cus'][$i]).'  '.$devise.'</th>
              <th scope="col">  '.$lien.'</th>
              <th scope="col">'.htmlspecialchars($_SESSION['panier']['souto_cus'][$i]).'  '.$devise.' 
                <span class="onb">'.$ii.'</span>
                <a href="index.php?model=ultimate&sheet=cart&amp;panie_supp='.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'" class="fa fa-remove osup" title="Remove"></a></th>
            </tr>';

            }
        $Lareduction=!empty($_SESSION['reduction'])? $_SESSION['reduction']: 0;

      $texte .=' </tbody>
        </table>

       <div class="wid_90 mar_auto bord_ after linecapri pad_top_40">
          <ul class="flo_lef wid_30">

  <li>Nombre de colis: <strong>'.compterArticles().'</strong></li>
  <li>Net à payer: <strong>'.MontantGlobalEtReduction().' '.$devise.'</strong> </li>
  <li>Sous-total: <strong>'.MontantGlobal().' '.$devise.'</strong> </li>
  <li>Réduction('.$Lareduction.' %): 
      <strong>'.MontantReduction().' '.$devise.'</strong> </li>
  <li>Frais de livraison: <strong>'.$somelivrai.' '.$devise.'</strong></li>


            </ul>

          <div class="flo_lef wid_35">
  <div class="cart_pri totau">'.MontantGlobalEtReduction().' <em>'.$devise.'</em> </div>
        </div>
      </div>
      </div><!--fin bon panier-->

    <div class="blocreg">
      <div class="bontit">Réglement</div>
  <p class="linesto">- Date limite : 00-00-00 </p>
  <p class="linesto">- Paiement : '.$moypay.'</p>

      </div>
      <p class="bonfin">Pour toutes préoccupations, Veuillez contactez notre service client. E-mail: lareferencedocumentaire@gmail.com - Tél & whatsapp: +237 699 46 81 64</p>
  </div>

  <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
  <script>
          /*animer bouton patner*/	
          function paycolor(){

  var max=Math.max(42, 4, 38, 255, 105), 
      min=Math.min(42, 0, 38, 1337, 105),
      $coul1=Math.floor(Math.random() * (max - min) + min);

  var max=Math.max(42, 4, 38, 255, 105), 
      min=Math.min(42, 0, 38, 1337, 105),
      $coul2=Math.floor(Math.random() * (max - min) + min);

  var max=Math.max(42, 4, 38, 255, 105), 
      min=Math.min(42, 0, 38, 1337, 105),
      $coul3=Math.floor(Math.random() * (max - min) + min);


  $(\'.totau\').css(
      \'background-color\',\'rgba(\'+$coul1+\',\'+$coul2+\',\'+$coul3+\',1)\'
  );

  }

  setInterval(paycolor,500);


          $("#print").click(

     function (){
          window.print();
          return false;
      }
      );
      </script>

  </body>
  </html>';







        //supprimer le fichier
        if(is_file('../../commande/'.$nompag.'.html'))
            @unlink('../../commande/'.$nompag.'.html');

         if(is_file('../../commande/'.$nompag.'.zip'))
            @unlink('../../commande/'.$nompag.'.zip');

      // 1 : on ouvre le fichier
  $pag=$nompag.'.html';
      $monfichier=@fopen('../../commande/'.$pag, 'a');

      if($monfichier)
      {

         fputs($monfichier,$texte);

          fclose($monfichier);


          //zipper le fichier
          $zip = new ZipArchive();

          $fichierzip=$nompag.'.zip';

          if($zip->open('../../commande/'.$fichierzip, ZipArchive::CREATE) === true)
         {

            $zip->addFile('../../commande/'.$pag); // Ajout la page htm

            $zip->close(); // Et on referme l'archive
             
              $_SESSION['STORE_ORDER']=$nompag;

         }

                  /*********fin commande********************************************************************************************/


      }
      else{

          echo '<div class="stop_form">
            <p>Désolé votre commande n\'a pas été creée, Re-sélectionner vos produits s\'il vous plait !</p></div>';

      }

  // 3 : quand on a fini de l'utiliser, on ferme le fichier

      }




?>














