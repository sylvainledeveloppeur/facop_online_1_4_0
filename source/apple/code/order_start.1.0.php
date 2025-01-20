<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

//$_POST['custom']="0-idtransa HHH 1-iduser HHH 2-pseudo HHH 3-codeid HHH 4-email HHH 5-parraindirect HHH 6-parrainindirect HHH 7-idpack HHH 8-codenbrpack HHH 9-codenamepack HHH 10-nompack HHH 11-prixpack";

$_POST['id_tran']=htmlspecialchars($_POST['id_tran']);
$_POST['statu']=htmlspecialchars($_POST['statu']);
$_POST['custom']=htmlspecialchars($_POST['custom']);

$custom=explode(" HHH ",$_POST['custom']);
  //update vote
$result="";
		 	
      if (isset($_POST['statu']))//**********************************************************************************************
        {
    
                                          //isertion de l inscription dans l historique de la db
            $req=$tams->prepare('INSERT INTO achat_pending  (idtransaction, iduser_cha, pseudo_cha, idpack_cha, codenbrpack, codenamepack_cha, nompack_cha, prixpack_cha, methodpaie_cha, statu_cha, datapai_cha, datephp_cha, datesql_cha ) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');
            $inser=$req->execute(array( $custom[0], $custom[1], $custom[2], $custom[7], $custom[8], $custom[9], $custom[10], $custom[11], $custom[13], 0, $_POST['custom'], time() ));

              if ($inser)
                {
                    //reenvoi methode de paiement
                    $result=$custom[12];
                }
                else
                {
                    $result="false";
                }
                                        
                           

      }
		 else
		 {
			        //isertion erreur inconnu
              $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                  VALUES (?,?,?,?,?,?,?,NOW()) ');
              $inser=$req->execute(array(0,'error user','no mail',$_SERVER["REMOTE_ADDR"],"Error payment "," Valeur (".$_POST['custom'].")",0));

							$result="false";

		 }

 
echo $result;
	
		 	 
?>