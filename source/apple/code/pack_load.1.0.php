<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pk) nbr FROM pack  WHERE actif=1
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from pack WHERE actif=1"); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => $outil["id_pk"],
                              "titre" => $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                              "des" =>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
                              "dure" => $outil["dure"]." . ".$outil["etudiant"]." étudiants", 
                              "img" => $outil["img"],
                              "video" => $lang, 
                              "prix" => $outil["prix"], 
                              "certi" => $outil["certificat"], 
                              "ressou" => $outil["codeName"], 
                              "nbr" => $outil["codeNbr"], 
                              "fin" => "8")); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>