<?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');

$Beclas->checkUpd();

	
    $eta=$tams->query('UPDATE '.$_GET['table'].' SET '.$_GET['champ'].'=2 WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

     if($eta)
       $Beclas->echoo(1);
    else
       $Beclas->echoo(0);
	
