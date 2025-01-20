<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");
 
  //$_POST["packid"]=823;
  $lang =isset($_POST["lang"]) ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pdf  WHERE actif_pf=1 AND id_les_pf='$packid'
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from pdf WHERE actif_pf=1 AND id_les_pf='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_pf"],
                              "titre" => $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                              "des" =>  "0",
                              "dure" => $outil["pg"], 
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