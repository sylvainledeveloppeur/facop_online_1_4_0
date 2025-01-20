<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");


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
                                        "niveau" => 1,
                                        "niveautex" => "facopa1",
                                        "mescour" => 2,
                                        "bonus" => 2000,
                                        "bonustex" => "2.000",
                                        "filleul" => 5,

                                        "datphp" => $outil["datephp"]));
                                      
                                    
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