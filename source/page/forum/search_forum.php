
<!--service-->
	
  <div class="bac_vice">
	<div class="fenetre">
	  <div class="theus after">
		  
	
		  
		  
	    <ul class="ullefo">
		  
			
			<?php 

$_POST["artistejs"]=$_POST["search_word"];




/****resultats personne********************************************************************************/
	 if(isset($_POST["artistejs"])  )
	  {
		 
		  $msc=$tams;
		  function sear_pict($msc,$alpagl)
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
	$recherche = "titre_deba LIKE '".$premier."' OR desc_deba LIKE '".$premier."' OR categori_deba LIKE '".$premier."'";
	
	//on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
	for ( $i = 1 ; $i < count($elts) ; $i++ )
	{
	$elt_suivant = "%".$elts[$i]."%";
	
	//on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
	$recherche.= " OR titre_deba LIKE '".$elt_suivant."' OR desc_deba LIKE '".$elt_suivant."' OR categori_deba LIKE '".$elt_suivant."'";
	}
	
	// requete SQL,
	$requete = $msc->query("SELECT COUNT(*) nbr FROM post_ws WHERE $recherche");
	$bloc= $msc->query("SELECT * FROM post_ws WHERE $recherche ORDER BY id_deba DESC LIMIT 50 ");
	//nombre de fichiers trouvés
	$reponses = $requete->fetch();
	if($reponses['nbr'] == 0) 
	{ 
		  echo '<div class="s_resul pad_top_30">00 '.mot2($alpagl,43).' "'.$mot.'" </div>'; 
		   
	}
	
	else 
	{
		  echo '<div class="s_resul mar_bot_15 pad_top_30">'.$reponses['nbr'].' '.mot2($alpagl,44).' "'.$mot.'" </div>';
		 
		while($done=$bloc->fetch())
	{ 
	echo '
					
		<li>
			<ul class="ullinefo after">
			  <li><a href="index.php?b=forum.post.forum&idpost='.$done['id_deba'].'">'.$done['titre_deba'].'</a></li>
			  <li>- - -</li>
				<li>By Admin</li>
				<li>'.$done['date_deba'].'</li>
			  </ul>
			
			</li>
			
			
		  ';
			
	}
				
			
		
		
	}
	
	}
	else
	{
		
		echo '<div class="s_resul"> '.mot2($alpagl,45).' </div>';
	}
	}
	else 
	{
		
	echo '<div class="s_resul">'.mot2($alpagl,45).' </div>';	
	}
	
	
	
	}
	
		  
	  }
	  else
	  {
		  echo mot2($alpagl,46);
	  }
	  
	 sear_pict($msc,$alpagl);
	



?>
			
		
		 </ul>
		  
		 

