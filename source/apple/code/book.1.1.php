<?php require_once("../class/db_app.class.php");
require_once("../class/Bee.class.php");

//insert visite***************************************************************************
	if(!empty($_SERVER['REMOTE_ADDR']))
				{
					//$BClas->InserVisite($tams,$BClas,$_SERVER['REMOTE_ADDR'],"Home","Phone","Android","App");
				}
				else{
					
					//$BClas->InserVisite($tams,"0","Home","Phone","Android","App");
				}
        //$_POST["lang"]="fr";
				//$_POST['id']="733";

				$id=$_POST['id'];
        $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";

        $nbr_pseudo=$tams->prepare("SELECT COUNT(id_ubk) nbr FROM user_book  WHERE actif_ubk=1 AND id_user_ubk=$id
                                        " ) ;
                                       $nbr_pseudo->execute();
                                       $chif_pse=$nbr_pseudo->fetch();
      
                                     if ($chif_pse['nbr']!=0)
                                      {
        $query = $tams->query("Select * from user_book WHERE actif_ubk=1  AND id_user_ubk=$id "); 
        $outils = array(); 
        while ($outil = $query->fetch())
        {
          $iid=$outil["id_book_ubk"];
          $reqUni=$tams->prepare("SELECT * FROM book  WHERE id_bk=$iid  " ) ;
                                       $reqUni->execute();
                                       $reqUniData=$reqUni->fetch();
                                      

          array_push($outils, array(
            "lang_data"=> $lang,
            "id_data"=> $outil["id_ubk"],
            "titre_data"=> $lang=="fr" ? $reqUniData["titreFR_bk"] : $reqUniData["titreEN_bk"],
            "desc_data"=>  $lang=="fr" ? $reqUniData["descFR_bk"] : $reqUniData["descEN_bk"],
            "img1_data"=>  $reqUniData["img_bk"],
            "img2_data"=> "0",
            "video1_data"=> "0", 
            "duree_data"=> $reqUniData["duree_bk"]." \n".$reqUniData["pg_bk"]." pages \n".$reqUniData["auteur_bk"],  
            "pdf1_data"=>  $lang=="fr" ? $reqUniData["linkFR_bk"] : $reqUniData["linkEN_bk"], 
            "prix_data"=> "0",
            "nbpage_data"=> $reqUniData["pg_bk"], 
            "certi_data"=> "", 
            "packname_data"=> "0",
            "packcodename_data"=> "0", 
            "packcodenumber_data"=> "0", 
            "total_data"=> "0",
            "date_data"=> "0"
                    )); 
        } 
         
        echo(json_encode($outils));
      }
      else
      {
        echo "nothing";
      } 
?>