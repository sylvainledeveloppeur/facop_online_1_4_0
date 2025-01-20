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
                            "lang_data"=> $lang,
                            "id_data"=> $outil["id_cer"],
                            "titre_data"=> $outil["namepack_cer"] ,
                            "desc_data"=>  $outil["codenamepack_cer"],
                            "img1_data"=>  $outil["img_cer"], 
                            "img2_data"=> "0",
                            "video1_data"=> "0", 
                            "duree_data"=> "0",  
                            "pdf1_data"=>  $outil["pdf_cer"], 
                            "prix_data"=> "0",
                            "nbpage_data"=> "0", 
                            "certi_data"=> $outil["note_cer"], 
                            "packname_data"=> "0",
                            "packcodename_data"=> "0", 
                            "packcodenumber_data"=> "0", 
                            "total_data"=> "0",
                            "date_data"=> $outil["phpdate_cer"]
                              )); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>