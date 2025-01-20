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
            $query = $tams->query("SELECT * FROM pack WHERE actif=1"); 
            $outils = array(); 
            while ($outil = $query->fetch()) 
            {
                  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE id_pack=".$outil["id_pk"]." AND actif=1 " ) ;
                  $nbr_pseudo->execute();
                  $chif_pse=$nbr_pseudo->fetch(); 
                  $lesson=$chif_pse['nbr'];

                    array_push($outils, array(
                      "lang_data"=> $lang,
                      "id_data"=> $outil["id_pk"],
                      "titre_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "desc_data"=>  $lang=="fr" ? $outil["des"] : $outil["desEN"],
                      "img1_data"=> $outil["img"],
                      "img2_data"=> "0",
                      "video1_data"=> $lang=="fr" ? $outil["youtube_FR"] : $outil["youtube_EN"],
                      "duree_data"=> $outil["dure"]." . ".$outil["etudiant"]." Etudiants",  
                      "pdf1_data"=> $outil["vu"], 
                      "prix_data"=> $outil["prix"],
                      "nbpage_data"=> $lesson, 
                      "certi_data"=> $outil["certificat"], 
                      "packname_data"=> $lang=="fr" ? $outil["titre"] : $outil["titreEN"],
                      "packcodename_data"=> $outil["codeName"], 
                      "packcodenumber_data"=> $outil["codeNbr"], 
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