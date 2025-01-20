<?php @session_start();
 require_once('../db_2_js.class.php');


if($_POST['use']!="0")
		{
             if(!empty($_POST['rea']) )
										{
	//on enregistre la commande du client dans la base donne
							$req=$tams->prepare('INSERT INTO forum_reaction (id_deba_react,id_user_react,reaction_react,date_react) 
							   VALUES (?,?,?,NOW()) ');

									   $inser=$req->execute(array($_POST['deba'],$_POST['use'],$_POST['rea'])) or exit($tam->errorInfo());

										if($inser)
										{
										   echo '<div class="ok_form">Félicitation</div>'.'
				   <script> window.setTimeout("location=(\'reload_'.$_POST['deba'].'_forum\');",3000) </script>';
	
											
										}
                                       else
                                       {
										   echo '<div class="stop_form"><p>Error</div>';
										}

}
                                       else
                                       {
										   echo '<div class="stop_form">Le champ est vide</div>';
										}
	}

   else
   {
       echo '<div class="stop_form"><p>Inscris-toi pour réagir</div>';
    }





?>