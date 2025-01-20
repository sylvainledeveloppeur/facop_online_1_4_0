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
  $query = $tams->query("SELECT * FROM pdf WHERE actif_pf=1 AND id_les_pf='$packid' "); 
  $outils = array(); 
  while ($outil = $query->fetch()) 
    array_push($outils, array(
                      "lang_data"=> $lang,
                      "id_data"=> $outil["id_pf"],
                      "titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "desc_data"=>  $outil["lesson_code"],
                      "img1_data"=> "0",
                      "img2_data"=> "0",
                      "video1_data"=> "0", 
                      "duree_data"=> "0", 
                      "pdf1_data"=> $lang=="fr" ? $outil["link"] : $outil["linkEN"], 
                      "prix_data"=> "0",
                      "nbpage_data"=> $outil["pg"], 
                      "certi_data"=> "0",
                      "packname_data"=> "0",
                      "packcodename_data"=> "0",
                      "packcodenumber_data"=> "0",
                      "total_data"=> $chif_pse['nbr'],
                      "date_data"=> "0"
    )); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>