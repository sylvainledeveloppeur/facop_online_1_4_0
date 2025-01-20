<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);

//-----------------infos
 if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mai) )
{
   
		if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mai2))
		  {
        	 if(!empty($mai3) AND $mai2==$mai3 )
               {
				  
                 
                 //recherche du mail
                                 $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM seller
                                 WHERE mai=:pse  " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$mai));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']==1)
                                {
                                   
                                   
                                      $upd=$tams->query(" UPDATE seller SET 
                                                mai='".$mai2."'  WHERE id='".$_SESSION['id']."' ");


                                               if($upd)
                                                { 

                                                     echo '<div class="ok_form">Votre email à été mis à jour</div>';
                                                   
                                                          $BClas->showInfo('<h2>Felicitation</h2><p>Votre email à été mis à jour<span></span></p> ');
                                                          $BClas->resetFo();
                                                }
                                                else
                                                {
                                                 echo '<div class="stop_form">Erreur "Reéssayez" </div>';
                                                }
                       
                                    }
                                else
                                {
                                 echo '<div class="stop_form">Erreur "Email actuel inconnu"</div>';	
                                }
                   
                }
                else{
                    echo '<div class="stop_form">Erreur "les deux nouveau email sont differents"  </div>';
                }
		
		  }
		  else{
			 echo '<div class="stop_form">Erreur "Nouveau email incorrect"</div>';
		  }
	
}
else{
	echo '<div class="stop_form">Erreur "Email actuel est incorrect"</div>';

    }
    
