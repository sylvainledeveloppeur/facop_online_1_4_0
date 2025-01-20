<?php @session_start();
require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

extract($_POST);
if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mai) )
    {
      if(!empty($pas))
        {

                        //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
                       $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM patner
                       WHERE mai=:pse AND pas=:pas " ) ;
                       $nbr_pseudo->execute(array('pse'=>$mai,'pas'=>sha1($pas)));
                       $chif_pse=$nbr_pseudo->fetch();

                       if ($chif_pse['nbr']==1)
                        {
                        $bloc=$tams->query(" SELECT * FROM patner WHERE mai='$mai' ");

                                            while($done=$bloc->fetch())
                                            {
                                                if($done['val']!=0)
                                                {
                                                      if($done['val']!=2)
                                                      {
                                                         session_unset();session_destroy();//supprimer ttes session precedente
                                                          @session_start();
                                                          $_SESSION['BEEuser']=3;
                                                          $_SESSION['BEEusertype']="PATNER";
                                                          $_SESSION['id']=$done['id'];
                                                          $_SESSION['mai']=$done['mai'];
                                                          $_SESSION['nam']=$done['nam'];
                                                          $_SESSION['namE']=explode(" ",$_SESSION['nam']); 
                                                          $_SESSION['ava']=$done['ava'];
                                                          $_SESSION['tel']=$done['tel'];
                                                          $_SESSION['sex']=$done['sex'];
                                                          $_SESSION['pay']=$done['pay'];
                                                          $_SESSION['vil']=$done['vil'];
                                                          $_SESSION['adr']=$done['adr'];
                                                          $_SESSION['val']=$done['val'];
                                                          $_SESSION['date']=$done['date'];


                                                           $BClas->redirectPg("index.php?b=patner.profil.patner");
                                                           echo  '<div class="ok_form">Connecté</div>';
                                                           $BClas->showInfo('<h2>Connecté</h2><p>Bienvenue <span>'.$_SESSION['nam'].'</span></p> ');
                                                           $BClas->resetFo();
                                                      }
                                                      else
                                                      {
                                                      echo '<div class="stop_form">Désolé "Votre compte à été blocké"</div>';	
                                                      }
                                                }
                                                else
                                                {
                                                echo '<div class="stop_form">Erreur "Veillez valider votre address email"</div>';	
                                                }
                                            }
                       
                                       

                    }
                    else
                    {
                    echo '<div class="stop_form">Erreur "Utilisateur inconnu"</div>';	
                    }
        }
        else
        {
            echo '<div class="stop_form">Erreur "Mot de passe" </div>';

        }
    }
 else
    {
		echo '<div class="stop_form">Erreur "Email" </div>';
    }    
	

?>