<?php  @session_start(); 
require_once('../db_2_js.class.php');

	if($_SESSION["delet"]==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
	{
$bloc=$tams->query('SELECT * FROM '.$_GET['table'].'  WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

while($done=$bloc->fetch())
	{
	     @unlink("../../document/".$done['file_m']);
	
		$eta=$tams->query('DELETE FROM '.$_GET['table'].'  WHERE '.$_GET['champid'].'=\''.$_GET['id'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

		if($eta)
{ echo '<td colspan="5" class="ok_form">Action done</td>';}
else
{ echo '<td colspan="5" class="stop_form">Impossible action</td>';}
}
			
		}
else
{ echo '<td colspan="5" class="stop_form">Impossible! You don\'t have the rights</td>';}

?>