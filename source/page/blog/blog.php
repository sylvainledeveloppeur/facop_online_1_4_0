	
				  
	 <?php 
  $num=$tams->query('SELECT COUNT(*) n FROM blog   ');
  $nu=$num->fetch();

if($nu['n']!=0)
{
 //------afficher les pages
		 
		  $nbr_ParPage = 10; 
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
		
		$bloc =$tams->query('SELECT * FROM blog ORDER BY id_arti DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
		
		echo ' <ul class="lilistblog after">';							  
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
		  
		    echo '  <ul class="ulnbr">';
		  for ($i = 1 ; $i <= $nb_DePages ; $i++)
		  {
		  echo '<li class="'.$i.'"  ><a href="index.php?b=blog.blog.blog&page=' . $i . '">' . $i . '</a></li> ';
		  }
		  echo '</ul>';
		  
}
      
  ?>  	  
		  
