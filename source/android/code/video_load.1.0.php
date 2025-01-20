<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");
 
  //$_POST["packid"]=823;
  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_vi) nbr FROM video  WHERE actif_vi=1 AND id_les_vi='$packid'
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from video WHERE actif_vi=1 AND id_les_vi='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_vi"],
                              "titre" => $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                              "des" =>  $outil["lesson_code"],
                              "dure" => $outil["dure"], 
                              "img" => "0",
                              "video" => $lang=="fr" ? $outil["link"] : $outil["linkEN"], 
                              "prix" => 0, 
                              "certi" => "0", 
                              "ressou" => "0", 
                              "nbr" => "0", 
                              "fin" => "0")); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>