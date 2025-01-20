<?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');

$Beclas->checkUpd();

      $champ=explode(" HHH ",$_GET['champ']);
      $valeur=$champ[1]=="0" ? 1:0;
      $action=$valeur=="1" ? " a activé":" a désactivé"; 
      $actionText=!empty($champ[2]) ? $champ[2]:" --- ";

       $eta=$tams->query('UPDATE '.$_GET['table'].' SET '.$champ[0].'="'.$valeur.'" WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');
     	
     if($eta)
     {
		 
      $Beclas->echoo(1);
      $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], $_SESSION['pseu']." " .$action."  ".$actionText, $_SESSION['pseu']); //notification
     }
    else
       $Beclas->echoo(0);
	
