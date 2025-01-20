<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");
/*$_POST['mail']="begi25";
$_POST['pass']="bbbbbb";*/

$_POST['mail']=htmlspecialchars($_POST['mail']);
$_POST['pass']=htmlspecialchars($_POST['pass']);

$update="";

    $blocA=$tams->query(" SELECT * FROM  _webapp_info  WHERE id=1 ");
                      
            //$outils = array();
    while($outilA=$blocA->fetch())
      {

          $update=$outilA["android_noupdate"];
        
      }

   
        if($update==1)
        {

          exit("update");
        }
        else
        {
            // Check whether username or password is set from android	
              if(isset($_POST['mail']) && isset($_POST['pass']))
              {
                // Innitialize Variable
                $result='';
                  $username =$_POST['mail'];
                    $password = sha1($_POST['pass']);
                
                // Query database for row exist or not
                    $sql = 'SELECT * FROM user WHERE  pseudo = :username AND pass = :password';
                    $stmt = $tams->prepare($sql);
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                    $stmt->execute();
                    if($stmt->rowCount())
                    {

                                $bloc=$tams->query(" SELECT * FROM user WHERE pseudo='$username' ");
                            
                                          $outils = array();
                                  while($outil=$bloc->fetch())
                                    {

                                      if($outil["valid"]==1)
                                      {
                                    
                                if($outil["bloc"]==0)
                                      {
                                      array_push($outils, array("id" => $outil["id"],
                                        "codeid" => $outil["codeId"],
                                        "pseudo" => $outil["pseudo"],
                                        "mail" => $outil["email"],
                                        "fulname" => $outil["nom"],
                                        "ava" => $outil["ava"],
                                        "pay" => $outil["pays"],
                                        "tel" => $outil["tel"], 
                                        "sex" => $outil["sex"],
                                        "adres" => $outil["adr"],
                                        "vil" => $outil["vil"],
                                        "datnais" => $outil["datnais"],
                                        "parrain" => $outil["parrain"],
                                        "niveau" => 1,
                                        "niveautex" => "facopa1",
                                        "mescour" => 2,
                                        "bonus" => 2000,
                                        "bonustex" => "2.000",
                                        "filleul" => 5,

                                        "datphp" => $outil["datephp"]));
                                      

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
                                                        $req=$tams->prepare('INSERT INTO user_bonus  (id_user_bnk, user_bnk, amount_bnk, pendingsold_bnk, pending_bnk,	pendistatu_bnk,	pendidate_bnk,	phpdate_bnk, sqldate_bnk) 
                                                          VALUES (?,?,?,?,?,?,?,?,NOW()) ');
                                                          $inser=$req->execute(array( $outil["id"], $outil["pseudo"], 0, 0, 0, 0, $BClas->phpDate(), $BClas->phpDate() ));


                                                        //isertion welcome
                                                        $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti, someout_noti, somenew_noti,	phpdate_noti,	sqldate_noti ) 
                                                        VALUES (?,?,?,?,?,?,?,NOW()) ');
                                                        $inser=$req->execute(array( $outil["id"], 0, "Welcome", "Bienvenue ".$outil["pseudo"]."... FACOP", 0, 0, $BClas->phpDate() ));
                                                        $inser=$req->execute(array( $outil["id"], 0, "Offre", "FACOP vous à offert le livre 'De la misère à l'abondance'... Suite à votre inscription", 0, 0, $BClas->phpDate() ));
                                                        $inser=$req->execute(array( $outil["id"], 0, "Offre", "FACOP vous à offert la formation 'Facop A0'... Suite à votre inscription", 0, 0, $BClas->phpDate() ));

                                                        //isertion miser abondant Facop A0
                                                        $req=$tams->prepare('INSERT INTO user_book  ( id_user_ubk, pseudo_user_ubk, id_book_ubk, actif_ubk, datephp, datesql ) 
                                                        VALUES (?,?,?,?,?,NOW()) ');
                                                        $inser=$req->execute(array( $outil["id"], $outil["pseudo"], 3, 1, $BClas->phpDate() ));
                                                      
                                                      }
                                          
                                      }
                                        else
                                                  {
                                                  exit("block");
                                                  }
                                      
                                    
                                      }
                                        else
                                                  {
                                                  exit("code-".$outil["email"]);
                                                  }
                                    }
                              echo(json_encode($outils));
            
                    }  
                    elseif(!$stmt->rowCount())
                    {
                    $result="false";
                    }

                
                  // send result back to android
              echo $result;
                }
      }
	
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