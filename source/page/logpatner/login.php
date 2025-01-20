<div id="pg_login">

    <ul class="ulcomp after"><li><a href="index.php?b=loguser.login.loguser">Compte client</a></li> <li><a href="index.php?b=logseller.login.logseller" >Compte vendeur</a></li> <li><a href="#" class="bg_1">Compte partenaire</a></li>   </ul>
    
    <ul class="ullog after Q_cols_2_1col">
       
    <li>
        <a href="index.php"> <img src="source/img/logo/logo.png" class="paylogo"  alt=""/></a>
        
      <h1 class="hh11 tex_center pad_bot_30">Connexion</h1>
        <p class="wid_50 mar_auto tex_cen col1 tex_upp">Compte Partenaire</p>
     <form name="logfo" id="logfo" class="Tfom_1  Q_cols_2_1col" method="post" action="source/js/logpatner_js/login.php" >
        <div class="eta_form"></div>
<div class="loginp"><input type="email" name="mai" placeholder="Email" required><i class="ion-android-person"></i></div>
          <div class="loginp"><input type="password" name="pas" placeholder="Mot de passe" required><i class="ion-android-unlock"></i></div>
         
       <p class="logfog"> <span> <input type="checkbox"> Rester connecté</span><span><a href="index.php?b=logpatner.forgot.logpatner&o=1">Mot de passe oublié</a></span></p>
         
        <input type="submit" class="btnlog bg_1" value="Connexion">
         
        <p class="crelog">Nouveau? <a href="index.php?b=logpatner.signup.logpatner">Créer mon compte</a></p>
         
        
     </form>
        
      </li>
        <li class="loimglef">
           
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

//validate mail
if(!empty($_GET['token']) AND !empty($_GET['email']))
{
	
           //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
           $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM emailvalidat 
           WHERE email=:pse AND token=:pas " ) ;
           $nbr_pseudo->execute(array('pse'=>$_GET['email'],'pas'=>$_GET['token']));
           $chif_pse=$nbr_pseudo->fetch();

              if ($chif_pse['nbr']==1)
               {

                      $reqe1 =$tams->exec("UPDATE patner SET val=1  WHERE mai='".$_GET['email']."'  ");
                  if($reqe1)
                  {   
                   echo '<script>
                    document.getElementById("poptex").innerHTML="<h2>Email validé</h2><p>Veuillez vous connecter</span></p> ";
                    document.getElementById("popnoti").style.display="block";
                    </script>';
                      //isertion de l inscription dans l historique de la db
                         $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,dates ) 
                                                             VALUES (?,?,?,?,?,?,NOW()) ');
                         $inser=$req->execute(array(0,"0",$_GET['email'],$_SERVER["REMOTE_ADDR"] ,"VALIDATION",$_GET['email']." Vient de valider son address email"));
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