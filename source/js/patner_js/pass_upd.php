<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");

extract($_POST);

//-----------------infos
if(!empty($pas) AND strlen($pas)>=6)
{
   
		if(!empty($pas2) AND strlen($pas2)>=6)
		  {
        	 if(!empty($pas3) AND $pas2==$pas3 )
               {
				  
                 
                 //recherche du mail
                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM patner
                                 WHERE pas=:pse AND id=:id " ) ;
                                 $nbr_pseudo->execute(array('pse'=>sha1($pas),'id'=>$_SESSION['id']));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {
                                   
                                   
                                      $upd=$tams->query(" UPDATE patner SET 
                                                pas='".sha1($pas2)."'  WHERE id='".$_SESSION['id']."' ");


                                               if($upd)
                                                { 

                                                     echo '<div class="ok_form">Votre mot de passe à été mis à jour</div>';
                                                   
                                                          $BClas->showInfo('<h2>Felicitation</h2><p>Votre mot de passe à été mis à jour<span></span></p> ');
                                                          $BClas->resetFo();
                                                }
                                                else
                                                {
                                                 echo '<div class="stop_form">Erreur "Reéssayez" </div>';
                                                }
                       
                                    }
                                else
                                {
                                 echo '<div class="stop_form">Erreur "Mot de passe actuel incorrect"</div>';	
                                }
                   
                }
                else{
                    echo '<div class="stop_form">Erreur "les deux mots de passe sont differents"  </div>';
                }
		
		  }
		  else{
			 echo '<div class="stop_form">Erreur "Nouveau mot de passe 6 caractères minimum"</div>';
		  }
	
}
else{
	echo '<div class="stop_form">Erreur "Mot de passe actuel 6 caractères minimum"</div>';

    }
    
