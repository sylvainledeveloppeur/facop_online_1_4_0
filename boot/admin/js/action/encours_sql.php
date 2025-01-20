<?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');

$Beclas->checkUpd();

      $champ=explode(" HHH ",$_GET['champ']);
      $valeur=$champ[1];

      if($valeur=="0")
      $action=" a mis en cours"; 
      else if($valeur=="1")
      $action=" a Effectuée"; 
      else if($valeur=="2")
      $action=" a Annulé";
      else 
      $action=" oops";  

      $actionText=!empty($champ[2]) ? $champ[2]:" --- ";

       $eta=$tams->query('UPDATE '.$_GET['table'].' SET '.$champ[0].'="'.$valeur.'" WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');
     
     if($eta)
     { 
        if($valeur=="1")
        {
            $eta=$tams->query('UPDATE user_bonus SET pending_bnk=0 WHERE id_user_bnk='.$champ[3].'  ');
            //isertion welcome
            $req=$tams->prepare('INSERT INTO user_notification  (id_user_noti,	lu_noti,	suj_noti,	desc_noti, someout_noti, somenew_noti,	phpdate_noti,	sqldate_noti ) 
            VALUES (?,?,?,?,?,?,?,NOW()) ');
            $inser=$req->execute(array( $champ[3], 0, "Retrait bonus", "Votre demande de retrait a été éffectuée.", 0, 0, $Beclas->phpDate() ));

        }

      $Beclas->echoo(1);
      $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], $_SESSION['pseu']." " .$action."  ".$actionText, $_SESSION['pseu']); //notification
     }
    else
       $Beclas->echoo(0);
	
