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
            "lang" => $lang,
            "id" => $outil["id_ubk"],
            "titre" => $lang=="fr" ? $reqUniData["titreFR_bk"] : $reqUniData["titreEN_bk"],
            "des" =>  $lang=="fr" ? $reqUniData["descFR_bk"] : $reqUniData["descEN_bk"],
            "dure" => $reqUniData["duree_bk"]." . ".$reqUniData["pg_bk"]." pages", 
            "img" => $reqUniData["img_bk"],
            "video" => $lang, 
            "prix" => 0, 
            "certi" => $reqUniData["linkFR_bk"], 
            "ressou" => $reqUniData["linkEN_bk"], 
            "nbr" => $outil["id_ubk"], 
            "fin" => "2")); 
        } 
         
        echo(json_encode($outils));
      }
      else
      {
        echo "nothing";
      } 
?>