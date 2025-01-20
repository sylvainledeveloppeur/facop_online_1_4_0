<?php  @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php");

extract($_POST);

/*-----------------update img--------------------------------------------------------*/                                 

 // A list of permitted file extensions
		$allowed = array('jpg','jpeg',"png");
if(isset($_FILES['aimg']) && $_FILES['aimg']['error'] == 0)
		{

			$extension = pathinfo($_FILES['aimg']['name'], PATHINFO_EXTENSION);

			if(in_array(strtolower($extension), $allowed))
			{
				
				  $Gimg2=$_SESSION['ava']=="patner.png" ? $_SESSION['id'].time().'.jpg' : $_SESSION['ava'];//nom grande img
				 
				
				//@unlink('../../../../source/img/store/'.$Gimg2);
				  if(move_uploaded_file($_FILES['aimg']['tmp_name'], '../../img/avatar/patner/'.$Gimg2 ))
				  {	
				  
                      $upd=$tams->query(" UPDATE patner SET 
                                    ava='$Gimg2' WHERE id='".$_SESSION['id']."' ");


                                   if($upd)
                                    { 
                                       $_SESSION['ava']=$Gimg2;
                                        
                                        echo '<div class="ok_form">Photo modifié </div>';

                                    }
                                    else
                                    {
                                      exit('<div class="stop_form">Erreur "Reéssayez svp" </div>');
                                    }

				  	
				  }
			
              else
                  {
                    exit('<div class="stop_form">Impossible de télécharger la photo</div>');

                  }
			
            }
			else
			{
			exit(  '<div class="stop_form">Veuilez selectionner une image au format "image.jpg ou image.jpeg"</div>');

			}
}


//-----------------infos
if ((!empty($nam))  )
{
   
		if(!empty($sex))
		  {
        	 if(!empty($tel) )
               {
				  if(!empty($vil) )
					{
                      if(!empty($adr)  )
                        {

                          
                          $upd=$tams->query(" UPDATE patner SET 
                                    nam='$nam',sex='$sex',tel='$tel',vil='$vil',adr='$adr'  WHERE id='".$_SESSION['id']."' ");


                                   if($upd)
                                    { 
                                       $_SESSION['adr']=$adr;
                                       $_SESSION['sex']=$sex;
                                       $_SESSION['nam']=$nam;
                                       $_SESSION['tel']=$tel;
                                       $_SESSION['vil']=$vil;
                                        
                                         echo '<div class="ok_form">Vos informations ont été mis à jour</div>';
                                       
                                             $BClas->showInfo('<h2>Felicitation</h2><p>Vos informations ont été mis à jour<span></span></p> ');
                                             //$BClas->resetFo();
                                  $BClas->redirectPgT("index.php?b=patner.settings.patner_information",3000);

                                    }
                                    else
                                    {
                                     echo '<div class="stop_form">Erreur "Reéssayez" </div>';
                                    }
                                   
                              
                        }
                        else
                        {
                            echo '<div class="stop_form">Erreur "Address"  </div>';
                        }
                    }
					else
                    {
						echo '<div class="stop_form">Erreur "Ville"  </div>';
					}
                }
                else{
                    echo '<div class="stop_form">Erreur "Téléphone"  </div>';
                }
		
		  }
		  else{
			  echo '<div class="stop_form">Erreur "Sexe"</div>';
		  }
	
}
else{
	echo '<div class="stop_form">Erreur "Nom complet" </div>';

    }
    
