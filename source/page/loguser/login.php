<div id="pg_login">
    
    <ul class="ullog after Q_cols_2_1col">
       
    <li class="bg_bla">
        
      <h1 class="hh11 tex_center pad_bot_30 mar_top_40">Connexion</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp hide">Compte Client</p>
        
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/loguser_js/login.php" >
        <div class="eta_form tex_cen mar_auto wid_90"></div>
<div class="loginp pos_rel"><input type="text" name="mai" placeholder="E-mail" required><i class="ion-email"></i></div>
          <div class="loginp pos_rel"><input type="password" name="pas" placeholder="Mot de passe" required><i class="ion-android-unlock"></i></div>
         
       <p class="logfog"> <span> <input type="checkbox"> Rester connecté</span><span><a href="index.php?b=loguser.forgot.loguser&o=1">Mot de passe oublié</a></span></p>
         
        <input type="submit" class="btnlog bg_1" value="Connexion">
         
        <p class="crelog">Nouveau? <a href="index.php?b=loguser.signup.loguser">Créer mon compte</a></p>
         
        
     </form>
     
         <!-- google_translate_element -->
         <div id="goolaan" class="goolaan" >
                 <div id="google_translate_element">
                  
                 </div>
             </div>

      </li>
        <li class="loimglef bg_ble lsv">
			
		   .
       </li>
    </ul>
    
	
</div>

<?php 
//deconec
    if(!empty($_GET['d']) AND $_GET['d']==1)
    {
         echo '<script>
              document.getElementById("poptex").innerHTML="<h2>Deconnecté</h2><p>A très bientôt...</span></p> ";
              document.getElementById("popnoti").style.display="block";
              </script>';
    }
//deconec
    else if(!empty($_GET['in']) AND $_GET['in']==1)
    {
         echo '<script>
              document.getElementById("poptex").innerHTML="<h2>Veuillez-vous connecter</h2><p>Inscrivez-vous ou connectez-vous avant de pouvoir passer votre commande...</span></p> ";
              document.getElementById("popnoti").style.display="block";
              </script>';
    }
//mail valide, log
    else if(!empty($_GET['co']) AND $_GET['co']==1)
    {
      $BClas->showInfo('<h2>Felicitation</h2><p>Votre Address email a bien été validée <span>Veuillez vous connecter</span></p> ');
	}
//validate mail
if(!empty($_GET['token']) AND !empty($_GET['email']))
{
	$_GET['token']=htmlspecialchars($_GET['token']);
	$_GET['email']=htmlspecialchars($_GET['email']);
	
           //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
           $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user 
           WHERE email=:pse AND token=:pas " ) ;
           $nbr_pseudo->execute(array('pse'=>$_GET['email'],'pas'=>$_GET['token']));
           $chif_pse=$nbr_pseudo->fetch();

           if ($chif_pse['nbr']==1)
               {

                      $reqe1 =$tams->exec("UPDATE user SET valid=1  WHERE email='".$_GET['email']."'  ");
                  if($reqe1)
                  {   
                   echo '<script>
                    document.getElementById("poptex").innerHTML="<h2>Votre Adresse email a bien été validée</h2><p>Veuillez vous connecter</span></p> ";
                    document.getElementById("popnoti").style.display="block";
                    </script>';
                      //isertion de l inscription dans l historique de la db
                        $req=$tams->prepare('INSERT INTO _admin_historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                                           VALUES (?,?,?,?,?,?,?,NOW()) ');
                                  $inser=$req->execute(array(0,$_GET['email'],$_GET['email'],$_SERVER["REMOTE_ADDR"],"Confirmation Email", $_GET['email'].", a confirmé son adress email (WEB)",0));
                   }
                    else
                   {

                     echo '<script>
                        document.getElementById("poptex").innerHTML="<h3>Impossible de valider</h3><p>Veuillez le refaire</span></p> ";
                        document.getElementById("popnoti").style.display="block";
                        </script>';
                   }

               }
            else
               {

                 echo '<script>
                    document.getElementById("poptex").innerHTML="<h3>Erreur de validation</h3><p>Veuillez le refaire</span></p> ";
                    document.getElementById("popnoti").style.display="block";
                    </script>';
               }

	
}


?>