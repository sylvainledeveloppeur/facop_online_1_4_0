<?php @session_start();	
require_once("../db_2_js.class.php");


$allowed = array('png','jpg','jpeg');
	
//img1							
if(isset($_FILES['file']) && $_FILES['file']['error'] == 0 )
{

    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if(in_array(strtolower($extension), $allowed))
    {
        /*if($_FILES['mg1']['size']<=1000000  )
       {*/
        $ava=time().".".$extension;
          @unlink('../../img/team/'.$_SESSION['img']); 
         

        if(move_uploaded_file($_FILES['file']['tmp_name'], '../../img/team/'.$ava ) )
        {
            
          $upd=$tams->query(' UPDATE _admin_team SET img_team=\''.$ava.'\' WHERE id=\''.$_SESSION['id_admin'].'\'
               ');


            if($upd) 
              {
                $_SESSION['img']=$ava;

                
             echo '<div class="ok_form">Image modifié (rechargez la page SVP)</div>';
             echo '<script> window.setTimeout("location.reload();",2000) </script>';

              $bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) 
       VALUES (?,?,?,?,NOW())");

$inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"Vous avez mis votre photo à jour",0));
              
              
              }
        }
        else
        { echo '<div class="stop_form">Impossible modifier </div>';}
 

           
     
    }
    else
    {
    echo  '<div class="stop_form">Veuilez selectionner une image au format "image.png" (slider 1)</div>';

    }

}
?>