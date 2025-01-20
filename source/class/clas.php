<?php 


public function prod($tams,$nbr)
	{
		
		$bloc=$tams->query(" SELECT * FROM product_ws   ORDER BY RAND() LIMIT ".$nbr."  ");
		  
		  while($done=$bloc->fetch())
		 		  {
					    echo '
					
			<li>
		<div class="wid_98 mar_auto">
		<div class="imgbook">
			<a href="index.php?sheet=product&model=uno&id='.$done['id_pro'].'">
				<img src="/source/img/store/'.$done['img_pro'].'"  alt=""/>
				
			<div class="titove">'.$done['tit_pro'].'</div>
			</a>
			</div>
			<div class="titbook">'.$done['tit_pro'].'</div>
        </div>
    </li>			
		  ';
					  
					  
				  }
		
	}
	
	public function prod1($tams,$nbr)
	{
		
		$bloc=$tams->query(" SELECT * FROM product_ws  WHERE  id_pro=".$nbr."  ");
		  
		  while($done=$bloc->fetch())
		 		  {
					    echo '
					
		
	<ul class="ulpro after">
			<li><img class="imi" src="/source/img/store/'.$done['img_pro'].'"  alt=""/>
			<p class="pimin"><img class="imin" src="/source/img/store/'.$done['img_pro'].'"  alt=""/>
			<img class="imin" src="/source/img/store/'.$done['img2_pro'].'"  alt=""/></p>
			</li>
			<li class="prodes">
			  <p>'.$done['tit_pro'].'</p>
			  <p><strong>Auteur:</strong> '.$done['aut_pro'].'</p>
			  <p><strong>Catégorie:</strong> '.$done['id_cat_pro'].'</p>
			  <p><strong>Mise en ligne:</strong> '.$done['date_pro'].'</p>
				
			  <p>'.$done['desc_pro'].'</p>
			  
			  </li>
			
			</ul>
			
		  ';
					  
					  
				  }
		
	}
	
	
	
		//compte nb co,entai et reaction forum
	public function coun($tams,$tab)
	{
									//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(*) nbr FROM $tab " ) ;
           $nbr_pseudo->execute(array());
           $chif_pse=$nbr_pseudo->fetch();
   
			   echo $chif_pse['nbr'];
				
				   
	}
	
	//compte nbr forum
	public function counf($tams,$tab)
	{
									//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(DISTINCT categori_deba ) nbr FROM $tab  " ) ;
           $nbr_pseudo->execute(array());
           $chif_pse=$nbr_pseudo->fetch();
   
			   echo $chif_pse['nbr'];
				
				   
	}
	
	//AFFICHE forum
	public function sforum($tams,$tab)
	{
					
		$bloc2=$tams->query(" SELECT DISTINCT categori_deba FROM $tab ORDER BY categori_deba ASC  ");
		  
		  while($done2=$bloc2->fetch())
		 		  {
					   
			  
			  								//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(*) nbr FROM $tab
		   WHERE categori_deba=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>$done2['categori_deba']));
           $chif_pse=$nbr_pseudo->fetch();
   
			   
			  
			  	echo '
					
		<li>
			<ul class="ullinefo after">
			  <li><a href="index.php?b=forum.sujet.forum&idcat='.$done2['categori_deba'].'">'.$done2['categori_deba'].'</a></li>
			  <li>'.$chif_pse['nbr'].'</li>
				<li>- - -</li>
				<li>By Admin</li>
			  </ul>
			
			</li>
			
			
		  ';
			  
					  
					  
				  }
	}
	
	//AFFICHE sujet
	public function ssujet($tams,$tab,$cham,$tab2)
	{
					
		$bloc2=$tams->query(" SELECT * FROM $tab WHERE categori_deba='".$cham."' ORDER BY id_deba DESC  ");
		  
		  while($done2=$bloc2->fetch())
		 		  {
					   
			  
			  								//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(*) nbr FROM $tab2
		   WHERE id_deba_react=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>$done2['id_deba']));
           $chif_pse=$nbr_pseudo->fetch();
   
			   
			  
			  	echo '
					
		<li>
			<ul class="ullinefo after">
			  <li><a href="index.php?b=forum.post.forum&idpost='.$done2['id_deba'].'">'.$done2['titre_deba'].'</a></li>
			  <li>- - -</li>
				<li>'.$chif_pse['nbr'].'</li>
				<li>By Admin</li>
			  </ul>
			
			</li>
			
			
		  ';
			  
					  
					  
				  }
	}
	
	//show one post
	public function showpost($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_deba) nbr FROM post_ws WHERE id_deba=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
				   
									
				   $bloc=$tams->query('SELECT * FROM post_ws LEFT JOIN user ON post_ws.id_user_deba=user.id WHERE id_deba="'.$id.'"  ');
									while($done=$bloc->fetch())
									{
										$dat=$done['date_deba']; 
										$dat=$defaultClass_OB->goodate($dat,'Le','à');
										echo '
			
		<h1 class="hifo"><strong>SUJET:</strong>  '.$done['titre_deba'].'</h1>
		  
	
		  
	    <div class="hpo after"> 
	      <div class="flo_lef wid_50">POST</div>
	      <div class="flo_rig wid_40">'.$dat.'</div>
	    </div>
		  
	    <div class="ppost after">
		  
		  <div class="flo_lef wid_20">
			  <i class="fa fa-user"></i>
			<strong>'.$done['nom'].'</strong><br>
           '.$done['dates'].'  
			</div>
			<div class="flo_lef wid_80">
			'.$done['desc_deba'].'
			</div>
        </div>
				';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Rien à afficher</li>';
					
				}
		
	}
	
	//show REACTION  one post
	public function showreact($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_deba_react) nbr FROM reaction_ws WHERE id_deba_react=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
				   
				   
									
				   $bloc=$tams->query('SELECT * FROM reaction_ws LEFT JOIN user ON reaction_ws.id_user_react=user.id WHERE id_deba_react="'.$id.'"  ');
				   
				   echo ' <div class="hpo after"> 
	      <div class="flo_lef wid_50">Commentaires [ '.$chif_pse['nbr'].' ]</div>
	    </div>';
									while($done=$bloc->fetch())
									{
										
										
										echo '
		
	
		<div class="ppost2 after">
		  
		  <div class="flo_lef wid_20">
			  <i class="fa fa-user"></i>
			<strong>'.$done['nom'].'</strong><br>
            '.$done['date_react'].'  
			</div>
			<div class="flo_lef wid_80">
			'.$done['reaction_react'].'
			</div>
        </div>
				';
									}
				   
				}
			else
				{
				echo '  <div class="hpo after"> 
	      <div class="flo_lef wid_50">Commentaires [ 00 ]</div>
	    </div>
		
		<li class="stop_form"> Aucune réaction...</li>';
					
				}
		
	}
	
	//dsn le forum
	public function danfo($tams,$nbr)
	{
		
		$bloc=$tams->query(" SELECT * FROM post_ws   ORDER BY RAND() LIMIT ".$nbr."  ");
		  
		  while($done=$bloc->fetch())
		 		  {
					    echo '
					
			<li>
			    <div class="wid_95 mar_auto">
				  <a href="index.php?b=forum.post.forum&idpost='.$done['id_deba'].'" ><i class="fa fa-newspaper-o"></i></a>
					<p>'.$done['date_deba'].'</p>
				  <h3>'.$done['titre_deba'].'</h3>
				  <div class="catfoo after">
					<div class="flo_lef wid_50"><i class="fa fa-folder"></i> '.$done['categori_deba'].'</div>
					<div class="flo_rig wid_50 tex_rig"><i class="fa fa-comment"></i></div>
                  </div>
                </div>
              </li>
		  ';
					  
					  
				  }
		
	}
	
	//nbr sujet user
	public function usersuj($tams,$tab,$cham,$id)
	{
									//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(* ) nbr FROM $tab WHERE $cham=$id " ) ;
           $nbr_pseudo->execute(array());
           $chif_pse=$nbr_pseudo->fetch();
   
			   echo $chif_pse['nbr'];
				
				   
	}
	
	//show user account post
	public function showupost($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_deba) nbr FROM post_ws WHERE id_user_deba=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
				   
									
				   $bloc=$tams->query('SELECT * FROM post_ws WHERE id_user_deba="'.$id.'" ORDER BY id_deba DESC');
									while($done=$bloc->fetch())
									{
										$dat=$done['date_deba']; 
										$dat=$defaultClass_OB->goodate($dat,'Le','à');
										echo '
		<li class="pos_rel"><a href="index.php?sheet=post&model=uno&idpost='.$done['id_deba'].'">'.$done['titre_deba'].'</a>  <a id="asup" href="index.php?sheet=profile&model=user&folderpage=user&sup='.$done['id_deba'].'">Supprimer</a></li>
				';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Vous n\'avez aucun sujet</li>';
					
				}
		
	}
	
	//AFFICHE catego forum in form user
	public function ssforum($tams,$tab)
	{
					
		$bloc2=$tams->query(" SELECT DISTINCT name_en_catv FROM $tab ORDER BY name_en_catv ASC  ");
		  
		  while($done2=$bloc2->fetch())
		 		  {
				
			  echo '
	<option value="'.$done['name_en_catv'].'">'.$done2['name_en_catv'].'</option>
	';	  
				  }
	}

?>