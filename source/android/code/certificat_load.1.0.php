<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_cer) nbr FROM user_certificat  WHERE actif_cer=1 AND iduser_cer='$packid'
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from user_certificat WHERE actif_cer=1 AND iduser_cer='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_cer"],
                              "titre" => $outil["namepack_cer"] ,
                              "des" =>  $outil["codenamepack_cer"],
                              "dure" => $outil["img_cer"], 
                              "img" => $outil["img_cer"],
                              "video" => $outil["pdf_cer"], 
                              "prix" => 0, 
                              "certi" => $outil["note_cer"], 
                              "ressou" => "0", 
                              "nbr" => "0", 
                              "fin" => "2")); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>