<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");



if(!empty($_SESSION['amo']) AND !empty($_SESSION['typ'])  AND !empty($_SESSION['bnk'])  AND !empty($_SESSION['com'])  AND !empty($_SESSION['num']))
{
	$id=$_SESSION['id'];
	$solde=0;
	
	$nbr_pseudoPA=$tams->prepare("SELECT * FROM user_bonus
                           WHERE id_user_bnk=:pse " ) ;
                           $nbr_pseudoPA->execute(array('pse'=>$id));
                           $chif_psePA=$nbr_pseudoPA->fetch();

                           $solde=$chif_psePA['amount_bnk'];
                           $soldePending=$chif_psePA['pending_bnk'];
	
	 $date=$BClas->phpDate();
                  $solde2=$solde-$_SESSION['amo'];
                  $soldeRetrait=$_SESSION['amo'];
	
	$data=$_SESSION['amo']." HHH ".$_SESSION['num']." HHH ".$_SESSION['com']." HHH ".$_SESSION['typ']." HHH ".$_SESSION['bnk'];
	
   $stmt = $tams->prepare("UPDATE user_bonus SET  amount_bnk='$solde2', pendingsold_bnk='$solde', pending_bnk='$soldeRetrait', pendistatu_bnk=0, pendidate_bnk='$date'  WHERE id_user_bnk='$id' ");
                            // execute the query
                            $upd=$stmt->execute();


                          if($upd)
                            { 

                                //envoi email comfirm email
                                //$reSu=@$BClas->senMailWhois("Welcome on TEFconnect",$autor,$mai,"no_reply@tefconnect.net",$mai,$conn,$message_html1,$message_txt1);
                
                                 // isertion de l inscription dans l historique retrait du user
                              $req=$tams->prepare('INSERT INTO user_historic_retrai (id_user_his, suj_his, desc_his, cost_his, someout_his, somenew_his, etat_his, phpdate_his, sqldate_his ) 
                              VALUES (?,?,?,?,?,?,?,?,NOW()) ');
                              $inser=$req->execute(array($id,"Retrait bonus","Demande de retrait: RSOLDE; nouveau solde: NSOLDE" ,  $data, $soldeRetrait, $solde2, 0, $BClas->phpDate() ));

                               //isertion welcome
                               $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti, someout_noti, somenew_noti,	phpdate_noti,	sqldate_noti ) 
                               VALUES (?,?,?,?,?,?,?,NOW()) ');
                               $inser=$req->execute(array( $id, 0, "Retrait bonus", "Vous avez fait une demande de retrait: RSOLDE; nouveau solde: NSOLDE", $soldeRetrait, $solde2, $BClas->phpDate() ));


                              // isertion de l inscription dans l historique de la db
                              $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                        VALUES (?,?,?,?,?,?,?,NOW()) ');
                                $inser=$req->execute(array(0,$id,$data,$_SERVER["REMOTE_ADDR"],"DEMANDE RETRAIT", $id.", demande un retrait:".$soldeRetrait." FCFA (SITEWEB)",0));

                               echo '<div class="ok_form tex_cen">Felicitation: demande de retrait enregistré, elle sera traitée aussitôt que possible</div>';
                            }
                            else
                            {
                              $result="false";
                            }
	
	
}
else
{
	echo '<div class="no_form tex_cen">Information introuvables</div>';
}




?>