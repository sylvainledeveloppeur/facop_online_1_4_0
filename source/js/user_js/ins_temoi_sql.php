<?php @session_start();
 require_once('../db_2_js.class.php');

if(!empty($_POST['des']) )
										{
	//on enregistre la commande du client dans la base donne
    $req=$tams->prepare('INSERT INTO testimony (id_arti_tes,id_aut_tes,nam_tes,note_tes,mes_tes,date_tes ) 
       VALUES (?,?,?,?,?,NOW()) ');

               $inser=$req->execute(array(0,$_SESSION['id'],0,0,$_POST['des'])) or exit($tam->errorInfo());

                if($inser)
                {
                   echo '<div class="ok_form">Témoignage sauvegardé</div>';
 
                                       echo '<script>
                                              document.getElementById("poptex").innerHTML="<h2>Felicitation</h2><p>Vous venez d\'ajouter un témoignage. Verifiez-la dans votre menu <span>Mes témoignages</span></p> ";
                                              document.getElementById("popnoti").style.display="block";
                                              document.getElementById("resfo").reset();
                                              </script>';
                }
               else
               {
                   echo '<div class="stop_form"><p>Error</div>';
                }

}
 else
 {
     echo '<div class="stop_form"><p>Tous les champs sont obligatoires</div>';
  }


?>