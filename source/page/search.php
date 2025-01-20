<div id="pg_us">

<div class="bac_top">
   <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Blog</h1>
		    <strong class="">La recherche</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->	
	
	<!--us-->
  <div class="bac_bla">
	<div class="fenetre">
	  <div class="in_even after Q_cols_2_1col mar_top_40">
		
		  <div class="flo_lef wid_75 bg_blanc">  
			  
<?php 
//require_once('db.php');


$_POST["artistejs"]=$_POST["texser"];


/****resultats debats*******************************************************************************/
	   if(!empty($_POST["artistejs"])  )
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
	  $recherche = "titre_arti LIKE '".$premier."' OR text_arti LIKE '".$premier."' AND actif_arti=1";
	  
	  //on traite les mots suivants (éventuels) à partir de $elts[1] (deuxième mot)
	  for ( $i = 1 ; $i < count($elts) ; $i++ )
	  {
	  $elt_suivant = "%".$elts[$i]."%";
	  
	  //on complète la recherche avec les mots-clés suivants et on introduit la clause OR (requete large) ou AND (requete stricte)
	  $recherche.= " OR titre_arti LIKE '".$elt_suivant."' OR text_arti LIKE '".$premier."' AND actif_arti=1";
	  }
	  
	  // requete SQL,
	  $requete = $msc->query("SELECT COUNT(*) nbr FROM blog WHERE $recherche ");
	  $bloc= $msc->query("SELECT * FROM blog WHERE $recherche  ORDER BY id_arti DESC LIMIT 50 ");
	  //nombre de fichiers trouvés
	  $reponses = $requete->fetch();
	  if($reponses['nbr'] == 0) 
	  { 
			echo '<h2>00 Résultats pour "'.$mot.'" </h2>'; 
			 
	  }
	  else 
	  {
			echo '<h2 class="s_resul">'.$reponses['nbr'].' Résultats pour "'.$mot.'"  </h2>';
		   
		echo ' <ul class="listblog">';							  
		  while($done=$bloc->fetch())
		  { 
			  
			  $done['text_arti']=strip_tags($done['text_arti']);
			$comment=substr($done['text_arti'], 0, 150);
					  $dernier_mot=strrpos($comment," ");
					  $comment=substr($comment,0,$dernier_mot);
					  $comment.="...";
			  
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
   echo '   <li class="after wow zoomIn"> 
			   
				  <div class="">
				  <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/></div>			   
				  <div class="lefblog">					
					  <h3>'.$done['titre_arti'].' </h3>					
					  <div><i class="ion-android-person"></i> Admin <i class="ion-android-calendar"></i> '.$done['date_arti'].' <i class="ion-folder"></i> Voyage</div>					
					  <p>'.$comment.'</p>					
					  <span ><a href="index.php?sheet=article&model=uno&id='.$done['id_arti'].'" class="Q_cols_2_1col"> Lire plus</a></span>				 
				  </div>
              </li>
	   
  
   ';
    
		  
		  }	
	 echo '   </ul>';
		  
		   
			  
		  
		  
	  }
	  
	  }
	  else
	  {
		  
		  echo '<div class="s_resul">Le formulaire est vide</div>';
	  }
	  }
	  else 
	  {
		  
	  echo '<div class="s_resul">Le formulaire est vide</div>';	
	  }
	  
	  
	  
	  }
	  
		  sear_pict($msc,$alpagl);
		   
		}
		else
		{
			echo '<div class="s_resul">Le formulaire est vide</div>';
		}
		
	 



?>
			  
		  
		  </div> 
	      <div class="flo_rig wid_23 blogRIT">
		  
		   <form class="bloser after" name="bloser" id="AN33"  method="post" action="index.php?b=uno.search">
				  <input type="search" name="texser" id="texser" class="texser flo_lef wid_78" placeholder="Recherche">
		    <input id="subser" type="submit"  >
		    <i id="okser" class="ion-android-search flo_rig wid_18  tex_cen" ></i>
		    </form>
		  
		  <div class="oneblog">
			  <?php $table="blog";
	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." ");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." ORDER BY RAND() LIMIT 1
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
			  $comment=substr($done['titre_arti'], 0, 50);
					  $dernier_mot=strrpos($comment," ");
					  $comment=substr($comment,0,$dernier_mot);
					  $comment.="...";
			  
				echo ' <a href="index.php?sheet=article&model=uno&id='.$done['id_arti'].'">			
			  <h3>'.$comment.'</h3>			 
			  <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>			</a>
				';
}
	
}
	else{
		
		echo " No post";
	}
			  ?>			
			</div>
			
		  <div class="someblog">
			<h3><span>Posts aléatoirs</span></h3>
			  
			  <ul>
				  
				  <?php $table="blog";
	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." ");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." ORDER BY RAND() LIMIT 4
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
			  $comment=substr($done['titre_arti'], 0, 50);
					  $dernier_mot=strrpos($comment," ");
					  $comment=substr($comment,0,$dernier_mot);
					  $comment.="...";
			  
				echo ' 
			  <li class="after"><a href="index.php?sheet=article&model=uno&id='.$done['id_arti'].'">				
				  <div class="flo_lef wid_35"> <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/></div>				
				  <div class="flo_rig wid_60">'.$comment.'</div></a>
              </li>';
}
	
}
	else{
		
		echo " No post";
	}
			  ?>	
			  
			  </ul>
			
			
			
			</div>
			
			 <div class="someblog">
			<h3><span>Tags</span></h3>
			  
			  <ul class="atagg">
				   <?php $table="blog";
	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." ");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." ORDER BY RAND() LIMIT 2
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
			  $comment=$done['text_arti'];
				echo ' 
			   '.$done['motcle_arti'].'';
}
	
}
	else{
		
		echo " No tags";
	}
			  ?>
			 
			  
			  </ul>
			
			
			
			</div>
			
			 <div class="oneblog">
			  <?php 
	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." ");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." ORDER BY RAND() LIMIT 1
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
			$comment=substr($done['titre_arti'], 0, 50);
					  $dernier_mot=strrpos($comment," ");
					  $comment=substr($comment,0,$dernier_mot);
					  $comment.="...";
			  
				echo ' <a href="index.php?sheet=article&model=uno&id='.$done['id_arti'].'">			
			  <h3>'.$comment.'</h3>			 
			  <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>			</a>
				';
}
	
}
	else{
		
		echo " No post";
	}
			  ?>			
			</div>
			
        </div>
	  </div>
    </div>
  </div>
	<!---->
	
	
</div>
