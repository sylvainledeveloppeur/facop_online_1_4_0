<?php  @session_start();
 require_once('../db_2_js.class.php');

extract($_POST);

//-----------------infos
if(!empty($pas) AND strlen($pas)>=6)
{
   
		if(!empty($pas2) AND strlen($pas2)>=6)
		  {
        	 if(!empty($pas3) AND $pas2==$pas3 )
               {
				  
                 
                 //recherche du mail
                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user
                                 WHERE pass=:pse  " ) ;
                                 $nbr_pseudo->execute(array('pse'=>sha1($pas)));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {
                                   
                                   
                                      $upd=$tams->query(" UPDATE user SET 
                                                pass='".sha1($pas2)."'  WHERE id='".$_SESSION['id']."' ");


                                               if($upd)
                                                { 

                                                     echo '<div class="ok_form">Mot de passe mise à jour</div>';
                                                     echo '<script>
                                                          document.getElementById("poptex").innerHTML="<h2>Felicitation</h2><p>Le mot de passe est à jour</p> ";
                                                          document.getElementById("popnoti").style.display="block";
                                                          </script>';

                                                }
                                                else
                                                {
                                                 echo '<div class="no_form tex_cen">Erreur "Reéssayez" </div>';
                                                }
                       
                                    }
                                else
                                {
                                 echo '<div class="no_form tex_cen">Erreur "Mot de passe actuel incorrect"</div>';	
                                }
                   
                }
                else{
                    echo '<div class="no_form tex_cen">Erreur "les deux mots de passe sont differents"  </div>';
                }
		
		  }
		  else{
			 echo '<div class="no_form tex_cen">Erreur "Nouveau mot de passe 6 caractères minimum"</div>';
		  }
	
}
else{
	echo '<div class="no_form tex_cen">Erreur "Mot de passe actuel 6 caractères minimum"</div>';

    }
    
