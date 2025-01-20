<div id="pg_us">

<div class="bac_top">
   <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Blog</h1>
		    <strong class="">Actualités, nos actions en vue</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->

	
	<!--us-->
  <div class="bac_bla">
	<div class="fenetre">
	  <div class="in_even after Q_cols_2_1col mar_top_40">
		
		  <div class="flo_lef wid_75 bg_blanc">
			  
			  <?php 
  $num=$tams->query('SELECT COUNT(*) n FROM blog WHERE actif_arti=1  ');
  $nu=$num->fetch();

if($nu['n']!=0)
{
 //------afficher les pages
		 
		  $nbr_ParPage = 5; 
		  $nb_resulta=$nu['n'];
		  // On calcule le nombre de pages à créer
		  $nb_DePages = ceil($nb_resulta / $nbr_ParPage);
		  // Puis on fait une boucle pour écrire les liens vers chacune des pages
		
		  
		  if (isset($_GET['page']))
{
$page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
$page = 1; // On se met sur la page 1 (par défaut)
}


		// On calcule le numéro du premier message qu'on prend pour leLIMIT de MySQL
		$premierMessageAafficher = ($page - 1) * $nbr_ParPage;
		
		$bloc =$tams->query('SELECT * FROM blog WHERE actif_arti=1  ORDER BY id_arti DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
		
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
		  
		    echo ' <ul class="ulnbr">';
		  for ($i = 1 ; $i <= $nb_DePages ; $i++)
		  {
		  echo '<li class="'.$i.'"  ><a href="index.php?sheet=blog&model=uno&page=' . $i . '">' . $i . '</a></li> ';
		  }
		  echo '</ul>';
		  
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
