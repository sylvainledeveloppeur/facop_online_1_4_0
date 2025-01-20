<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];
  $totalDay=365;
     
  //nbr pack user achat
  $req_nbr=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat  WHERE iduser_cha=?  " );
  $req_nbr->bindParam(1, $packid, PDO::PARAM_INT);
  $req_nbr->execute();
  $req_fetct=$req_nbr->fetch(); 
  $found_nbr=$req_fetct['nbr'];

  if ($found_nbr!=0)
    {
          $query = $tams->query("SELECT * FROM achat INNER JOIN pack ON achat.idpack_cha=pack.id_pk  WHERE iduser_cha='$packid' "); 
          $outils = array(); 
          while ($outil = $query->fetch())
                { 
                  //nbr lesson
                  $req_nbr=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE id_pack=? AND actif=1 " );
                  $req_nbr->bindParam(1, $outil["id_pk"], PDO::PARAM_INT);
                  $req_nbr->execute();
                  $req_fetct=$req_nbr->fetch(); 
                  $found_nbr=$req_fetct['nbr'];

                  //progression
                  if(!empty($outil["theme_cha"]))
                  {
					  //$outil["theme_cha"]=substr($outil["theme_cha"],0,-5);
                    $progres=explode(" ", trim($outil["theme_cha"]));
                    
					
					 $percen=count($progres);
					  //$cc=count($progres);
					  
					  //$percen=100*$percen/$found_nbr;
					  $percen=(int) $percen;
                  }
                  else
                  {
                    $percen=0;
                  }

                       $temps_restant=timeEnd($totalDay, strtotime($outil["datephp_cha"]));//restant
			           $temps_coule=$totalDay-$temps_restant;
			       
			        if($temps_coule>=0 AND $temps_coule<=$totalDay)
                    array_push($outils, array(
                                              "lang_data"=> $lang,
                                              "id_data"=> $outil["id_pk"],
                                              "titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                                              "desc_data"=>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
                                              "img1_data"=> $outil["img"],
                                              "img2_data"=> "0",
                                              "video1_data"=> $lang=="fr" ? $outil["youtube_FR"] : $outil["youtube_EN"],
                                              "duree_data"=> $outil["dure"]." . ".$outil["etudiant"]." Etudiants",  
                                              "pdf1_data"=> $temps_coule, 
                                              "prix_data"=> $outil["prix"],
                                              "nbpage_data"=> $found_nbr, 
                                              "certi_data"=> $totalDay, 
                                              "packname_data"=> $outil["nompack_cha"],
                                              "packcodename_data"=> $outil["codenamepack_cha"], 
                                              "packcodenumber_data"=> $outil["codenbrpack"], 
                                              "total_data"=> $percen,
                                              "date_data"=> $outil["datephp_cha"]
                                              ));
			  
			  
                }
	  if(empty($outils))
		  exit("nothing");
	  else
          echo(json_encode($outils));
  }
  else
  {
    echo "nothing";
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