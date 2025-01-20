<?php require_once("../class/Bee.class.php");
require_once("../class/php_error.class.php");
require_once("../class/db_app.class.php");

// set to the user defined error handler
$old_error_handler = set_error_handler("myErrorHandler");

//$_POST=$_GET;
/* $_POST['id']=727;
$_POST["pseudo"]="foca30";
$_POST["parrain"]="balo35"; */
$_POST["id"]=htmlspecialchars($_POST["id"]);
$id=isset($_POST['id']) ? $_POST['id'] : 0;

$_POST["pseudo"]=htmlspecialchars($_POST["pseudo"]);
$_POST["pseudo"]=trim($_POST["pseudo"]);
$pseudo=isset($_POST['pseudo']) ? $_POST['pseudo'] : 0;

$_POST["parrain"]=htmlspecialchars($_POST["parrain"]);
$_POST["parrain"]=trim($_POST["parrain"]);
$Uparrain=!empty($_POST['parrain']) ? $_POST['parrain'] : "";

//insert visite***************************************************************************
	if(!empty($_SERVER['REMOTE_ADDR']))
				{
					$BClas->InserVisite($tams,$BClas,$_SERVER['REMOTE_ADDR'],"Home","Phone","Android","App");
				}
				else
				{			
					$BClas->InserVisite($tams,"0","Home","Phone","Android","App");
				}
				

  $outils = array();
 
                         
						//prix tranche 1 & 2, cotisation	
               $query8 =$tams->query('SELECT * FROM _webapp_info WHERE  id=1 ');
			        $Version=0;
					$Majobli=0; 
					$Currency="";
					$Appnews="";
					$minRetrait="";
					$remise_achat=0;
               while ($outil = $query8->fetch()) 
			   {$Version=$outil["android_ver"]; $Appnews=$outil["android_new"]; $Majobli=$outil["android_majObli"]; $Currency=$outil["currency"]; $minRetrait=$outil["minRetrait"]; $remise_achat=$outil["remiseAchat"];  }

		
			

			 //generation1
			  $generation1="";
			  $generation2="";

			  if ( !empty($_POST["pseudo"]) )
                            {

								$nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user  WHERE parrain=:pse 
													" ) ;
													$nbr_pseudo->execute(array('pse'=>$_POST["pseudo"]));
													$chif_pse=$nbr_pseudo->fetch();

												if ($chif_pse['nbr']!=0)
													{
													$query = $tams->query(" SELECT * FROM user WHERE parrain='$pseudo'  "); 
													
														while ($outil = $query->fetch())
															{
																
																	$generation1.=$outil["pseudo"]." ";
																	$sonPseudo=$outil["pseudo"];

																	//generation2
																	$query2 = $tams->query(" SELECT * FROM user WHERE parrain='$sonPseudo'  "); 
													
																	while ($outil2 = $query2->fetch())
																		{
																			
																				$generation2.=$outil2["pseudo"]." HHH ".$outil["pseudo"]." XXX ";
																				//generation2
																			
																				
																		}
																
																	
															}
													}

													
									$generation2=trim($generation2);
									$generation2=substr($generation2, 0, -4);

							}
							else
							{$generation1="0";$generation2="0";}
 
             //parrain
              $parrain=$Uparrain;
			  $parrain_nivo=0;
			  $parrain_img="";
			  $parrain_indirect="";

			  if ( !empty($Uparrain) )
                            {

								$nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user  WHERE pseudo=:pse 
													" ) ;
													$nbr_pseudo->execute(array('pse'=>$Uparrain));
													$chif_pse=$nbr_pseudo->fetch();

												if ($chif_pse['nbr']!=0)
													{
													$query = $tams->query(" SELECT * FROM user WHERE pseudo='$Uparrain'  "); 
													
														while ($outil = $query->fetch())
															{
																
																	$parrain_indirect=$outil["parrain"];
																	$parrain_img=$outil["ava"];

																	//nivo parrain
																	$query2 = $tams->query(" SELECT * FROM achat WHERE pseudo_cha='$Uparrain' ORDER BY codenbrpack DESC limit 1  "); 
													
																	while ($outil2 = $query2->fetch())
																		{
																			
																				$parrain_nivo=$outil2["codenbrpack"];
																				
																			
																				
																		}
																
																	
															}
													}

													

							}
							else
							{ $parrain_nivo=0; $parrain_indirect="";}


		//mes cours-----------------------------------------------------
        $TotalDay=365;
		$nbr_cours=0;
		$nivo_cours=0;
		$mes_cours="";
		$nbr_pseudo=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat  WHERE iduser_cha=:pse 
								" ) ;
								$nbr_pseudo->execute(array('pse'=>$id));
								$chif_pse=$nbr_pseudo->fetch();

								$nbr_cours= $chif_pse["nbr"];

							if ($chif_pse['nbr']!=0)
								{
									
										$nbr_pseudo=$tams->prepare("SELECT MAX(codenbrpack) max FROM achat  WHERE iduser_cha=:pse 
										" ) ;
										$nbr_pseudo->execute(array('pse'=>$id));
										$chif_pse=$nbr_pseudo->fetch();
										$nivo_cours= $chif_pse["max"];

										//les cour
										$query = $tams->query(" SELECT * FROM achat WHERE iduser_cha='$id'  "); 
													
											while ($outil = $query->fetch())
												{
												
												if($BClas->timeEnd($TotalDay, strtotime($outil["datephp_cha"]))>=0 AND 
												   $BClas->timeEnd($TotalDay, strtotime($outil["datephp_cha"]))<=$TotalDay )
														{
														   $mes_cours.=$outil["codenamepack_cha"]." ";
														}
													     
														
												}

								}

		//Bonus---------------------------------------------------------------------
		$solde=0;

		if ( !empty($id) )
					  {

						  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_bnk) nbr FROM user_bonus  WHERE id_user_bnk=:pse 
											  " ) ;
											  $nbr_pseudo->execute(array('pse'=>$id));
											  $chif_pse=$nbr_pseudo->fetch();

										  if ($chif_pse['nbr']!=0)
											  {
											  $query = $tams->query(" SELECT * FROM user_bonus WHERE id_user_bnk='$id'  "); 
											  
												  while ($outil = $query->fetch())
													  {
														  $solde=$outil["amount_bnk"];
															
													  }
											  }

											  

					  }	
	 //user_notification ---------------------------------------------------------------------
		$notifi_nbr=0;

		if ( !empty($id) )
					  {

						  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_noti) nbr FROM user_notification  WHERE id_user_noti=:pse AND lu_noti=0
											  " ) ;
											  $nbr_pseudo->execute(array('pse'=>$id));
											  $chif_pse=$nbr_pseudo->fetch();

											  $notifi_nbr=$chif_pse['nbr'];
	  
					  }	

		 //user_remise ---------------------------------------------------------------------
		$remise_user=0;

		if ( !empty($id) )
					  {

								$nbr_pseudo=$tams->prepare("SELECT COUNT(id_remi) nbr FROM user_remise  WHERE id_user=:pse AND actif_remi=1 
								" ) ;
								$nbr_pseudo->execute(array('pse'=>$id));
								$chif_pse=$nbr_pseudo->fetch();

							if ($chif_pse['nbr']!=0)
								{
									$query = $tams->query(" SELECT * FROM user_remise WHERE id_user='$id' AND actif_remi=1  "); 
									
										while ($outil = $query->fetch())
											{
												$remise_user=$outil["remise"];
												
											}
								}
	  
					  }				

array_push($outils, array("id" => $id,
                              "version" => $Version,
                              "appnews" =>$Appnews,
                              "majObli" =>$Majobli,
                              "currency" =>$Currency,
                              "minretrait" =>$minRetrait,
                              "parrain" =>$parrain,
                              "parrain_nivo" =>$parrain_nivo,
                              "parrain_img" =>$parrain_img,
                              "parrain_indirect" =>$parrain_indirect,
                              "nbr_cours" =>$nbr_cours,
                              "nivo_cours" =>$nivo_cours,
                              "mes_cours" =>trim($mes_cours),
                              "solde" =>$solde,
                              "notifi_nbr" =>$notifi_nbr,
                              "remise_achat" =>$remise_achat,
                              "remise_user" =>$remise_user,


                              "generation1" =>$generation1,
                              "generation2" =>$generation2));
					 echo(json_encode($outils));
		
					 

	function timeEnd($totalDay,$date)
{
	$start=$date;
    $end=time();
    $dif=$end-$start;
    $jou=$dif/86400;

    $jou= floor($jou);
	$resul=$totalDay-$jou;
	
 //return  $end."-".$start."-".$dif."-".$jou."-".$resul;
	
 return $resul;
}
?>