<div id="search">


<?php 
//require_once('db.php');


$_POST["artistejs"]=$_POST["wblog"];


/****resultats debats*******************************************************************************/
	   if(!empty($_POST["artistejs"])  )
		{
		   
			$msc=$tams;
			function sear_pict($msc,$alpagl,$defaultClass_OB)
	  {
	   
	  if(isset($_POST["artistejs"])  AND  $_POST["artistejs"]!='' )
	  {
	  
	  
	  //on récupère le ou les mots-clés saisis (chaîne de caractères)
	  $mot = htmlspecialchars($_POST["artistejs"]);
	  
	  //on supprime les éventuels espaces de début et fin de chaîne
	  $chercher = trim($mot);
	  $chercher = str_replace("\t", " ", $chercher);
	  $chercher = preg_replace("#[ ]+#", " ", $chercher);
	  
	  if (preg_replace("#[a-z0-9]#i", " ", $chercher))
	  {
	  //on transforme cette chaîne en array
	  $elts = explode(" ", $chercher);
	  
	  //on définit une recherche par rapport au premier mot-clé choisi
	  $premier = "%".$elts[0]."%";
	  //le symbole % placé avant et après le mot-clé permet de rechercher n'importe quelle chaîne de caractères contenant ce mot
	  
	  //on met en forme la clause pour l'interrogation de la base de données
	  $recherche = "titre_arti LIKE '".$premier."' OR text_arti LIKE '".$premier."'";
	  
	  //on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
	  for ( $i = 1 ; $i < count($elts) ; $i++ )
	  {
	  $elt_suivant = "%".$elts[$i]."%";
	  
	  //on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
	  $recherche.= " OR titre_arti LIKE '".$elt_suivant."' OR text_arti LIKE '".$premier."'";
	  }
	  
	  // requete SQL,
	  $requete = $msc->query("SELECT COUNT(*) nbr FROM blog WHERE $recherche");
	  $bloc= $msc->query("SELECT * FROM blog WHERE $recherche ORDER BY id_arti DESC LIMIT 50 ");
	  //nombre de fichiers trouvés
	  $reponses = $requete->fetch();
	  if($reponses['nbr'] == 0) 
	  { 
			echo '<div class="s_resul">00 '.mot2($alpagl,43).' "'.$mot.'" </div>'; 
			 
	  }
	  else 
	  {
			echo '<div class="s_resul">'.$reponses['nbr'].' '.mot2($alpagl,44).' "'.$mot.'"  </div>';
		   
		echo ' <ul class="lilistblog">';							  
		  while($done=$bloc->fetch())
		  { 
              
                     $done['text_arti']=strip_tags($done['text_arti']);
                     $comment=$defaultClass_OB->cut_mot($done['text_arti'], 0, 150,'...');
              
              $bdate=explode(" ",$done['date_arti']);
              
              $mtit=$defaultClass_OB->format_url($done['titre_arti']);
                                                $murl=''.$mtit.'_'.$done['id_arti'].'_blog';
   echo ' 
   
   <li>
			  <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>
				
				    <div class="wid_95 mar_auto after">
						<div class="after">
						  <div class="flo_lef wid_100">
							<h2>'.$done['titre_arti'].'</h2>
						    <div class="autblog">
							  <i class="fa fa-clock-o"></i>'.$bdate[0].'
							  <i class="fa fa-folder"></i> Catégorie: '.$done['id_catego_arti'].'</div>
                          </div>
                        </div>
<div class="pblog">'.$comment.'</div>
						<a href="'.$murl.'">Lire plus <i class="fa fa-arrow-right"></i></a>
					  
				    </div>
                  </li>
   ';
    
		  
		  }	
	 echo '   </ul>';		  
			  
		  
		  
	  }
	  
	  }
	  else
	  {
		  
		  echo '<div class="s_resul">'.mot2($alpagl,45).'</div>';
	  }
	  }
	  else 
	  {
		  
	  echo '<div class="s_resul">'.mot2($alpagl,45).'</div>';	
	  }
	  
	  
	  
	  }
	  
		  sear_pict($msc,$alpagl,$defaultClass_OB);
		   
		}
		else
		{
			echo '<div class="s_resul">Le formulaire est vide</div>';
		}
		
	 



?>







</div>
