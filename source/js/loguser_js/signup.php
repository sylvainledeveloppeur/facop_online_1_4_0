<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);

   $mai=$mai;
   $_POST['pseudo']=htmlspecialchars($nam);
   $_POST['pseudo']=trim($_POST['pseudo']);
   $_POST['pseudo']=strtolower($_POST['pseudo']);

   
   $_POST['prain']=htmlspecialchars($par);
   $_POST['prain']=trim($_POST['prain']);
   $_POST['prain']=strtolower($_POST['prain']);

    $tokenLink=@$defaultClass_OB->toKen(10,'a1A');
    $token=@$BClas->toKen(6,'1');
    $autor="Facop Online";
    $url="www.facop.training";
     $thelink='https://www.facop.training/index.php?b=loguser.login.loguser&token='.$token.'&email='.$mai.'';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
							    <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                              <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                <img src="https://www.facop.training/source/img/logo/logo-344x344.png" alt="" width="160" height="160"> 
                                <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;/*! border: solid aliceblue; */color: #383d42;">Bienvenue</h1>
                                </div>
                            <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                Bienvenue <strong>'.$mai.'</strong>,<br><br>
                            Nous avons bien réçu votre inscription. Veuillez utiliser ce code <strong style="font-size: 20px;">'.$token.'</strong> pour valider votre email.<br><br>
							
							Ou en cliquant sur ce lien <a href="'.$thelink.'" style="display: inline-block;background-color: #3d90fb;padding: 4px 6px;border-radius: 5px;color: white;text-decoration: none;font-weight: bold;">Confirmer mon address email</a> ou en utilisant le lien suivant dans votre navigateur  <em>'.$thelink.'</em> <br><br>

                             Notre équipe est ravie de vous compter parmi les membres de notre organisation.<br><br>

                                Cordialement,<br><br>

                                <strong>'.$autor.'</strong>
                                </div>
                              <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                <div>Elig-sono, Yaoundé</div>
                                  <p>info@facop.training - www.facop.training</p>
                                  <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                  <p>Copyright (C) 2023 facop.training All rights reserved</p>
                              </div>
                            </div>
';
    
/*-----------------signup--------------------------------------------------------*/ 

//$result="";
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

	  //$result="android_noupdate";
		$BClas->showInfo('<h2>Mise à jour en cours</h2><p>SVP revenez plus tard <span>...</span></p>');
	  exit('<div class="no_form">Mise à jour en cours... SVP revenez plus tard</div>');

	}
	else if($signup==1)
	{

	  $BClas->showInfo('<h2>Inscription suspendue</h2><p>SVP revenez plus tard <span>...</span></p>');
	  exit('<div class="no_form">Inscription suspendue... SVP revenez plus tard</div>');

	}
	else // go to sign up user
	{
		if (!empty($nam) AND strlen($nam)>=2 AND strlen($nam)<=15 AND !preg_match('/\s/', $nam) AND preg_match("/^[a-zA-Z0-9]*$/", $nam) )//no space in pseudo
			{
			   
			   if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mai) )
				{
					if(!empty($pas) AND strlen($pas)>=6)
					  {
                         $par=empty($par)? "":trim($par);
						 /* if(!empty($par))
							{*/
								  if(isset($cgu) )
									  {
										  //recherche du mail
										 $nbr_pseudo=$tams->prepare("SELECT COUNT(email) nbr FROM user
										 WHERE email=:pse  " ) ;
										 $nbr_pseudo->execute(array('pse'=>$mai));
										 $chif_pse=$nbr_pseudo->fetch();

									     if ($chif_pse['nbr']==0)
										    {
											 
												  $nbr_pseudoP=$tams->prepare("SELECT COUNT(pseudo) nbr FROM user
												  WHERE pseudo=:pse  " ) ;
												  $nbr_pseudoP->execute(array('pse'=>$nam));
												  $chif_pseP=$nbr_pseudoP->fetch();

												 if ($chif_pseP['nbr']==0)
												    {
													 
														/*  $nbr_pseudoPA=$tams->prepare("SELECT COUNT(pseudo) nbr FROM user
														  WHERE pseudo=:pse " ) ;
														  $nbr_pseudoPA->execute(array('pse'=>$par));
														  $chif_psePA=$nbr_pseudoPA->fetch();

														  if ($chif_psePA['nbr']==1)
														     {*/

																	 //max id SELECT * FROM table WHERE id = (SELECT MAX(id) FROM table);
                                    
																	  $nbr_pseudo=$tams->prepare("SELECT * FROM user WHERE id = (SELECT MAX(id) FROM user) " ) ;
																	  $nbr_pseudo->execute();
																	  $chif_pse=$nbr_pseudo->fetch();
                                                                      $idmax=$chif_pse['id'];
															  
																	  $codeId=@$BClas->toKen(2,'1').$idmax;

																	  $req=$tams->prepare('INSERT INTO user (codeId, pseudo, parrain, ava, nom, email, token, valid, sms, bloc, pass, conecte, niveau, enligne, tel, pays, sex, lienais, datnais, adr, vil, datephp, datesql) 
																		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');

																	  $inser=$req->execute(array( $codeId, $nam, $par, "0", "0", $mai, $token, 0, 0, 0, sha1($pas), 1, 0, $BClas->phpDate(), "0", "0", "0", "0", "0", "0", "0", $BClas->phpDate() ));


																	   if($inser)
																		{ 

																		     // isertion de l inscription dans l historique de la db
																			   $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
																														VALUES (?,?,?,?,?,?,?,NOW()) ');
																				$inser=$req->execute(array(0,$nam,$mai,$_SERVER["REMOTE_ADDR"],"Inscription", $nam.", Vient de créer son compte (WEB)",0));

																			 //envoi email comfirm email
																				$reSu=@$defaultClass_OB->senMail("Comfirmez votre adresse e-mail",$autor,$nam,"noreply@facop.training",$mai,$tams,$message_html1,$message_txt1);


																		        echo '<div class="ok_form">Veuillez confirmer votre adresse e-mail</div>';//Message Sent, thank

																				$BClas->showInfo('<h2>Felicitation</h2><p>Veuillez confirmer votre adresse e-mail. Entrez le code ou cliquez sur le lien contenu dans le message que nous venons de vous envoyer à votre boite email ci-après <span>'.$mai.'</span>. Verifier aussi le dossier <span>spam</span></p> ');

																		   $BClas->redirectPg("index.php?b=loguser.signup.loguser&cu=$nam&cm=$mai");
																			    $BClas->resetFo();


															            }
																		else
																		{
																		 echo '<div class="no_form">Erreur "inscription  echoué" </div>';
																		}

															/* }
														  else
															 {
															 echo '<div class="no_form">Erreur "Pseudo du parrain introuvable"</div>';	
															 }*/
													 }
												  else
													 {
													 echo '<div class="no_form">Erreur "Pseudo déja utilisé", utilisez un autre</div>';	
													 }
										    }
										 else
											{
											 echo '<div class="no_form">Erreur "Email déja utilisé", utilisez un autre</div>';	
											}
								      }
								  else
									  {
										 echo '<div class="no_form">Erreur "Vous devez accepter les conditions d utilisations"</div>';
									  }
							/*}
							else
							{
								echo '<div class="no_form">Erreur "Pseudo du parrain" </div>';
							}*/


					  }
					  else{
						  echo '<div class="no_form">Erreur "Mot de passe 6 caractères minimum"</div>';
					  }

				}
				else{
					echo '<div class="no_form">Erreur "Email incorrect" </div>';
				}
		}
		else{
			echo '<div class="no_form">Erreur "Le pseudo doit avoir entre 2 et 15 caractères, sans espace, sans caractère special" </div>';

			}
    
    }
