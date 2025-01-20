<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_audio  WHERE id_pk_pf='$packid' AND actif_pf=1  
                                  " ) ;
    $nbr_pseudo->execute();
    $chif_pse=$nbr_pseudo->fetch();

  if ($chif_pse['nbr']!=0)
    {
        $query = $tams->query("SELECT * FROM pack_audio WHERE id_pk_pf='$packid' AND actif_pf=1  "); 
        $outils = array(); 
        while ($outil = $query->fetch()) 
            {
                 

                    array_push($outils, array(
                      "lang_data"=> $lang,
                      "id_data"=> $outil["id_pf"],
                      "titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "desc_data"=>  $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "img1_data"=> $outil["titre"],
                      "img2_data"=> "0",
                      "video1_data"=> $lang=="fr" ? $outil["link"] : $outil["linkEN"], 
                      "duree_data"=> $outil["pg"],  
                      "pdf1_data"=> 1, 
                      "prix_data"=> 1,
                      "nbpage_data"=> 1, 
                      "certi_data"=> $outil["titre"], 
                      "packname_data"=> $lang=="fr" ? $outil["pack"] : $outil["pack"],
                      "packcodename_data"=> $outil["pack_code"], 
                      "packcodenumber_data"=> $packid, 
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