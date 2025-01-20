<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =isset($_POST["lang"]) ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat  WHERE iduser_cha='$packid'
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from achat WHERE iduser_cha='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_cha"],
                              "titre" => $outil["nompack_cha"] ,
                              "des" =>  $outil["datesql_cha"],
                              "dure" => $outil["nompack_cha"], 
                              "img" => $outil["codenamepack_cha"],
                              "video" => $outil["nompack_cha"], 
                              "prix" => 0, 
                              "certi" => "0", 
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