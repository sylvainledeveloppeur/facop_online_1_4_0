<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE actif=1 AND id_pack='$packid'
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from lesson WHERE actif=1 AND id_pack='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_les"],
                              "titre" => $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                              "des" =>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
                              "dure" => $outil["dure"], 
                              "img" => $outil["img"],
                              "video" => "63", 
                              "prix" => $outil["prix"], 
                              "certi" => $outil["lesson_code"], 
                              "ressou" => $outil["facile"], 
                              "nbr" => "79", 
                              "fin" => "9")); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>