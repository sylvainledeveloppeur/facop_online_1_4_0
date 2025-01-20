<?php @session_start(); 
require_once('../db_2_js.class.php');


if(!empty($_POST['mes']) AND $_POST['des']!="null")
{
	
	 $allowed = array('jpg','jpeg','doc','docx','pdf','ppt','pptx','zip','rar');
	
		//img1							
		if(isset($_FILES['mg1']) && $_FILES['mg1']['error'] == 0 )
		{

			$extension = pathinfo($_FILES['mg1']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				   $filee=time().'.'.$extension;
				if(move_uploaded_file($_FILES['mg1']['tmp_name'], '../../document/'.$filee ) )
				  {
					
				     //echo '<div class="ok_form">Image modifié (rechargez la page SVP)</div>';
				}
				else
				{ exit( '<div class="stop_form">Impossible modifier </div>');}
   
			}
			else
			{
			exit( "<div class=\"stop_form\">Veuilez selectionner une fichier ('jpg','jpeg','doc','docx','pdf','ppt','pptx','zip','rar')</div>");

			}

		}
         else
		 {$filee='null';}
	
	
	
	
$bloc=$tams->prepare(" INSERT INTO  _admin_message (id_auteu_m,id_desti_m,mes_m,file_m,lu_m,date_m) 
					   VALUES (?,?,?,?,?,NOW())");

$inser=$bloc->execute(array($_SESSION['id_admin'],$_POST['des'],$_POST['mes'],$filee,0));

if($inser)
				  {
	  //notification
	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
    $inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"Vous avez envoyé un message.",0));
	
	//historiq								
	$bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");
    $bloc2->execute(array($_SESSION['id_admin'],$_SERVER['REMOTE_ADDR'],'Vous avez envoyé un message.',$_SERVER['HTTP_USER_AGENT']));
		
					
				     echo '<div class="ok_form">Send</div>';
				}
				else
				{ echo '<div class="stop_form">Impossible </div>';}
}
		
				

?>