<?php @session_start(); 
require_once('../db_2_js.class.php');


$bloc=$tams->prepare(" INSERT INTO  _admin_discussion (id_te_dis,mes_dis,lu_dis,date_dis) 
					   VALUES (?,?,?,NOW())");

$inser=$bloc->execute(array($_SESSION['id_admin'],$_POST['mes'],0));


?>