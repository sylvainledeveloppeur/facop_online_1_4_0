<?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');
 
 $Beclas->checkDel();

$bloc=$tams->query('SELECT * FROM '.$_GET['table'].'  WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

    while($done=$bloc->fetch())
	{
         $fil=explode(" HHH ",$_GET['champ']);
         $actionText=!empty($fil[6]) ? $fil[6]:" --- ";

            @$Beclas->deletFil($fil[0]);
            @$Beclas->deletFil($fil[1]);
            @$Beclas->deletFil($fil[2]);
            @$Beclas->deletFil($fil[3]);
            @$Beclas->deletFil($fil[4]);
            @$Beclas->deletFil($fil[5]);

            //  ../../../../source/img/store_category/'.$done['ava_maqs'].' HHH ../../../../source/img/store_category/'.$done['ava_maqs'].'
    
            $eta=$tams->query('DELETE FROM '.$_GET['table'].'  WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

     if($eta)
     {
      $Beclas->echoo(1);
      $Beclas->notify($tams, $_SESSION['id_admin'],$_SESSION['pseu'], $_SESSION['pseu']." a supprimé: ".$actionText, $actionText); //notification
     }
    else
       $Beclas->echoo(0);
    }  


   
  
?>