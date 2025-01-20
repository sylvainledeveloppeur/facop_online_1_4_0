<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE id_pack='$packid' AND actif=1  
                                  " ) ;
    $nbr_pseudo->execute();
    $chif_pse=$nbr_pseudo->fetch();

  if ($chif_pse['nbr']!=0)
    {
        $query = $tams->query("SELECT * FROM lesson WHERE id_pack='$packid' AND actif=1  "); 
        $outils = array(); 
        while ($outil = $query->fetch()) 
            {
                  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_vi) nbr FROM video  WHERE id_les_vi=".$outil["id_les"]." AND actif_vi=1 " ) ;
                  $nbr_pseudo->execute();
                  $chif_pse=$nbr_pseudo->fetch(); 
                  $VIDEO=$chif_pse['nbr'];

                  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pdf  WHERE id_les_pf=".$outil["id_les"]." AND actif_pf=1 " ) ;
                  $nbr_pseudo->execute();
                  $chif_pse=$nbr_pseudo->fetch(); 
                  $PDF=$chif_pse['nbr'];

                  $reqUni=$tams->prepare("SELECT * FROM video  WHERE id_les_vi=".$outil["id_les"]." AND titre='Introduction' AND actif_vi=1   " ) ;
                                       $reqUni->execute();
                                       $reqUniData=$reqUni->fetch();
                                       $reqUniData["link"]=!empty($reqUniData["link"])? $reqUniData["link"]:"no_video.mp4";
                                       $reqUniData["linkEN"]=!empty($reqUniData["linkEN"])? $reqUniData["linkEN"]:"no_video.mp4";

                    array_push($outils, array(
                      "lang_data"=> $lang,
                      "id_data"=> $outil["id_les"],
                      "titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "desc_data"=>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
                      "img1_data"=> $outil["img"],
                      "img2_data"=> "0",
                      "video1_data"=> $lang=="fr" ? $reqUniData["link"] : $reqUniData["linkEN"], 
                      "duree_data"=> $outil["dure"],  
                      "pdf1_data"=> "0", 
                      "prix_data"=> $outil["prix"],
                      "nbpage_data"=> $VIDEO, 
                      "certi_data"=> $outil["facile"], 
                      "packname_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "packcodename_data"=> $outil["lesson_code"], 
                      "packcodenumber_data"=> $PDF, 
                      "total_data"=> $chif_pse['nbr'],
                      "date_data"=> $outil["datephp"]
                    ));

            }
        echo(json_encode($outils));
    }
    else
    {
      echo "nothing";
    } 

?>