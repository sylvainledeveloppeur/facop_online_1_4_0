<?php @session_start();
require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);
$update="";

    $blocA=$tams->query(" SELECT * FROM  _webapp_info  WHERE id=1 ");
                      
            //$outils = array();
    while($outilA=$blocA->fetch())
      {

          $update=$outilA["android_noupdate"];
        
      }

   
	if($update==1)
	{
      $BClas->showInfo('<h2>Mise à jour en cours</h2><p>SVP revenez plus tard <span>...</span></p>');
	  exit('<div class="no_form">Mise à jour en cours... SVP revenez plus tard</div>');
	}
	else
	{
			 if(!empty($mai) )
				{
				  if(!empty($pas))
					{

									$username =$mai;
									$password = sha1($pas);

							// Query database for row exist or not
								$sql = 'SELECT * FROM user WHERE  email = :username AND pass = :password';
								$stmt = $tams->prepare($sql);
								$stmt->bindParam(':username', $username, PDO::PARAM_STR);
								$stmt->bindParam(':password', $password, PDO::PARAM_STR);
								$stmt->execute();
								if($stmt->rowCount())
								{
									
									 $bloc=$tams->query(" SELECT * FROM user WHERE email='$username' ");
                            
                                         $outils = array();
                                  while($outil=$bloc->fetch())
                                    {

                                      if($outil["valid"]==1)
										  {
										  
										     if($outil["bloc"]==0)
                                               {
												 
												 session_unset();session_destroy();//supprimer ttes session precedente
												  @session_start();
												  $_SESSION['BEEuser']=1;
												  $_SESSION['BEEusertype']="USER";
												  $_SESSION['id']=$outil['id'];
												  $_SESSION['codeid']=$outil['codeId'];
												  $_SESSION['pseudo']=$outil['pseudo'];
												  $_SESSION['mai']=$outil['email'];
												  $_SESSION['nam']=$outil['nom'];
												  $_SESSION['namE']=explode(" ",$_SESSION['nam']); 
												  $_SESSION['ava']=$outil['ava'];
												  $_SESSION['tel']=$outil['tel'];
												  $_SESSION['sex']=$outil['sex'];
												  $_SESSION['pay']=$outil['pays'];
												  $_SESSION['vil']=$outil['vil'];
												  $_SESSION['adr']=$outil['adr'];
												  $_SESSION['datnais']=$outil['datnais'];
												  $_SESSION['parrain']=$outil['parrain'];
												  $_SESSION['niveau']=$outil['niveau'];
												  $_SESSION['date']=$outil['datephp'];
												 
													 $nbr_pseudo=$tams->prepare("SELECT COUNT(id_bnk) nbr FROM user_bonus
														  WHERE id_user_bnk=:pse  " ) ;
														  $nbr_pseudo->execute(array('pse'=>$outil["id"]));
														  $chif_pse=$nbr_pseudo->fetch();

														if ($chif_pse['nbr']==0)
														  {
															//offre facopA0
														$req=$tams->prepare('INSERT INTO achat  (idtransaction, iduser_cha, pseudo_cha, idpack_cha, codenbrpack, codenamepack_cha, nompack_cha, prixpack_cha, methodpaie_cha, statu_cha, datapai_cha, theme_cha, datephp_cha, datesql_cha ) 
								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');
								$inser=$req->execute(array( 100001, $outil["id"], $outil["pseudo"], 9, 0, "facop_a0", "Facop A0", 0, "ADMIN_WEB", 1, "100001 HHH ".$outil["id"]." HHH ".$outil["pseudo"]." HHH codeuser HHH email HHH 0 HHH 0 HHH 9 HHH 0 HHH facop_a0 HHH Facop A0 HHH 0 HHH ADMIN HHH ADMIN", "", $BClas->phpDate() ));
															
															//creation bank bonus
															$req=$tams->prepare('INSERT INTO user_bonus  (id_user_bnk, user_bnk, amount_bnk,	pendingsold_bnk, pending_bnk,	pendistatu_bnk,	pendidate_bnk,	phpdate_bnk,	sqldate_bnk) 
															  VALUES (?,?,?,?,?,?,?,?,NOW()) ');
															  $inser=$req->execute(array( $outil["id"], $outil["pseudo"], 0, 0, 0, 0, $BClas->phpDate(), $BClas->phpDate() ));


															//isertion welcome
															$req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti, someout_noti, somenew_noti,	phpdate_noti,	sqldate_noti ) 
															VALUES (?,?,?,?,?,?,?,NOW()) ');
															$inser=$req->execute(array( $outil["id"], 0, "Welcome", "Bienvenue ".$outil["pseudo"]."... FACOP", 0, 0, $BClas->phpDate() ));
															$inser=$req->execute(array( $outil["id"], 0, "Offre", "FACOP vous à offert le livre 'De la misère à l'abondance'... Suite à votre inscription", 0, 0, $BClas->phpDate() ));

															//isertion miser abonda
															$req=$tams->prepare('INSERT INTO user_book  ( id_user_ubk, pseudo_user_ubk, id_book_ubk, actif_ubk, datephp, datesql ) 
															VALUES (?,?,?,?,?,NOW()) ');
															$inser=$req->execute(array( $outil["id"], $outil["pseudo"], 3, 1, $BClas->phpDate() ));

														  }
														  
												   $BClas->redirectPg("index.php?b=user.profil.user");
												   echo  '<div class="ok_form">Connecté</div>';
												   $BClas->showInfo('<h2>Connecté</h2><p>Bienvenue <span>'.$_SESSION['pseudo'].'</span></p>');
												   $BClas->resetFo();
												
											   }
									         else
										       {
										  
											     $BClas->showInfo('<h2>Compte bloqué</h2><p>Votre Compte est bloqué <span>...</span></p>');
										         exit('<div class="no_form">Erreur "Votre Compte est bloqué"</div>');
										       }

										  }
									  else
										  {
										  
											$BClas->showInfo('<h2>Address email</h2><p>Veuillez valider votre address email <span>...</span></p>');
										  
										    $BClas->redirectPg("index.php?b=loguser.signup.loguser&cu=".$outil['pseudo']."&cm=".$outil['email']."");
										    exit('<div class="no_form">Erreur "Veuillez valider votre address email"</div>');
										  }
                                    }
									
								

								}
								else
								{
								echo '<div class="no_form">Erreur "Utilisateur inconnu"</div>';	
								}
					}
					else
					{
						echo '<div class="no_form">Erreur "Mot de passe" </div>';

					}
				}
			 else
				{
					echo '<div class="stop_form">Erreur "Email" </div>';
				}   
    }
	

?>