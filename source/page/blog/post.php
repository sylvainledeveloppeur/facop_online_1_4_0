	  <ul class="lilistblog lilistblog2">
			  
				  
				 
		 
		  <?php 
	
	$table="blog";
	$tams->query("UPDATE $table SET lu_arti=lu_arti+1 WHERE id_arti='".$_GET['id']."' ") ;

	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." WHERE id_arti=".$_GET['id']."");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." LEFT JOIN _admin_team  ON ".$table.".auteur_arti=_admin_team.id WHERE id_arti=".$_GET['id']."
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  $comment=$done['text_arti'];
				echo '
				 <li>
			  <img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>
				
				    <div class="wid_95 mar_auto after">
						<div class="after">
						 
						  <div class="flo_lef wid_100">
							<h2>'.$done['titre_arti'].'</h2>
						    <div class="autblog">
							  <i class="fa fa-clock-o"></i>'.$done['date_arti'].' 
								<i class="fa fa-user"></i> By: '.$done['nom_team'].'
							  <i class="fa fa-folder"></i> Catégorie: '.$done['id_catego_arti'].'</div>
                          </div>
                        </div>
<div class="pblog">'.$done['text_arti'].'</div>
						
						<br>
<br>

						
					<div class="after shareblob">
					  <div class="flo_lef wid_15"><i class="fa fa-tags"></i> Tag: </div>
						  <div class="flo_lef wid_85">
							<ul class="ultag">
								'.$done['motcle_arti'].'
						    </ul>
                          </div>
                        </div>
						
						
                        <div class="after shareblob pad_top_20">
                        <button class="fa fa-facebook sha_fb button share_facebook" data-url="'.$murl.'"></button>
                            
                            <button class="fa fa-twitter sha_tw button share_twitter" data-url="'.$murl.'"> </button>

                        <button class="fa fa-google-plus sha_go button share_gplus" data-url="'.$murl.'"> </button>
                        <button class="fa fa-linkedin sha_in button share_linkedin" data-url="'.$murl.'"> </button>
                        </div>
						<br>
<br>

						
					
					  
						
					 
                    </div>
                  </li>
				';
}
	
}
	else{
		
		echo " <script>window.location=('article_introuvable');</script>";
	}
	
	?>
  
		   <div class="blogcomt"></div>
		  
			  </ul>

<div class="blo_rea pad_top_30">
<?php if(!empty($_SESSION['id']))
         { echo '
	<div class="eta_form"></div>
 <form class="fofor Tfom_2 mar_bot_10" method="post" action="/source/js/blog_js/ins_reaction_sql.php">
		  <textarea name="rea" placeholder="Laissez un commentaire..."></textarea>
			   <input type="hidden" name="use" value="'.$_SESSION['id'].'">
			   <input type="hidden" name="deba" value="'.$_GET["id"].'">
			 <input type="submit" value="Envoyer">
		  </form>
		  '; }
         else{ echo '<a href="index.php?b=login.login.login" class="mcfor col1">Connectez-vous pour réagir</a>';} 
    ?>
		  
		  
		   <!--reply-->
		   <?php $blog->showreact($tams,$_GET["id"],$defaultClass_OB); ?>

</div>
