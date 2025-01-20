<div id="pg_us">

<div class="bac_top dis_non">
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
            <div class="wid_95 mar_auto onearti">
					  <?php  
	
	$table="blog";
	$tams->query("UPDATE ".$table." SET lu_arti=lu_arti+1 WHERE id_arti=".$_GET['id']." ") ;

	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(*) nbr FROM ".$table." WHERE id_arti=".$_GET['id']."");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table."  WHERE id_arti=".$_GET['id']."
		 ");
	
		  while($done=$bloc->fetch())
		    {
			  if(!is_file('source/img/blog/'.$done['img_arti']))
				  $done['img_arti']="no_picture_blog.png";
			  
			  $comment=$done['text_arti'];
				echo '
				  <div class="after">
                    <h2>'.$done['titre_arti'].'</h2>
                    <div class="autblog">
                      <i class="fa fa-user"></i> Admin 
                      <i class="fa fa-folder"></i> Voyage
                      <i class="fa fa-clock-o"></i> '.$done['date_arti'].'  </div>
                  
                  </div>
				
				<img src="source/img/blog/'.$done['img_arti'].'"  alt=""/>
              
              <div class=" after">
                
  <div class="pblog">'.$comment.'
  </div>
                
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
                
                
                <br>
  <br>
                
                
                </div>
				';
}
	
}
	else{
		
		echo " <script>window.location=('404');</script>";
	}
	
	?>
				
              
            </div>
          </div> 
	    <div class="flo_rig wid_23 blogRIT">
		  
		  <form class="bloser after" name="bloser" id="AN33"  method="post" action="index.php?b=uno.search">
				  <input type="search" name="texser" id="texser" class="texser flo_lef wid_78" placeholder="Recherche">
		    <input id="subser" type="submit"  >
		    <i id="okser" class="ion-android-search flo_rig wid_18  tex_cen" ></i>
		    </form>
		  
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
			
		  <div class="someblog">
			<h3><span>Posts aléatoirs</span></h3>
			  
			  <ul>
				  
				  <?php 
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
				   <?php 
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
