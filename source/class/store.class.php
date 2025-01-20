<?php 
/*****last modify: 07-01-2022*/
/*****website: DTACAMEROUN*/
class Store
{
	/*public function prodtop($tam,$defaultClass_OB,$nbr)
	{
		$bloc=$tam->query(" SELECT * FROM _category_sto LEFT JOIN produit_bao  ON categorie_bao.id_cat=produit_bao.id_cat_pro AND actif_pro=1  ORDER BY RAND() LIMIT ".$nbr."
		 ");
		  
		  while($done=$bloc->fetch())
		 		  {
					   echo '
		 	<li>
		  	<h2>'.$done['fr_cat'].'</h2>
		  <a href="index.php?sheet=fiche&model=uno&ipro='.$done['id_pro'].'"><img src="source/img/articles/'.$done['img1_pro'].'" alt=""/></a>
		  	<p class="priarti">'.$done['pri_pro'].' '.$defaultClass_OB->devise.'</p>
		  	</li>
		 
					  ';
					  
					  
				  }
		
	}
	
	public function prod($tam,$defaultClass_OB,$id_cat,$nbr)
	{
		$bloc=$tam->query(" SELECT * FROM produit_bao WHERE id_cat_pro=".$id_cat." AND actif_pro=1  ORDER BY RAND() LIMIT ".$nbr."  
		 ");
		  
		  while($done=$bloc->fetch())
		 		  {
					  $des=$defaultClass_OB->cut_mot($done['des_pro'], 0, 80,'');
					   echo '
		 	<li>
		  	<a href="index.php?sheet=fiche&model=uno&ipro='.$done['id_pro'].'"  >
			<img src="source/img/articles/'.$done['img1_pro'].'" alt=""/>
			</a>
		  	<p class="desarti">'.$des.'</p>
		  	<p class="priarti">'.$done['pri_pro'].' '.$defaultClass_OB->devise.'</p>
		  	</li>
					  ';
					  
					  
				  }
		
	}
	
	public function prodsoucat($tam,$defaultClass_OB,$id_soucat,$nbr)
	{
		$bloc=$tam->query(" SELECT * FROM produit_bao WHERE id_soucat_pro=".$id_soucat." AND actif_pro=1  ORDER BY RAND() LIMIT ".$nbr."  
		 ");
		  
		  while($done=$bloc->fetch())
		 		  {
					  $des=$defaultClass_OB->cut_mot($done['des_pro'], 0, 80,'');
					   echo '
		 	<li>
		  	<a href="index.php?sheet=fiche&model=uno&ipro='.$done['id_pro'].'"  >
			<img src="source/img/articles/'.$done['img1_pro'].'" alt=""/>
			</a>
		  	<p class="desarti">'.$des.'</p>
		  	<p class="priarti">'.$done['pri_pro'].' '.$defaultClass_OB->devise.'</p>
		  	</li>
					  ';
					  
					  
				  }
		
	}
	*/
	public function catego($tams,$defaultClass_OB,$sheet)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY name_fr_cats ASC ");
        
			$hidd=$sheet!='hi' ? 'style="display: none;"' : 'style="" '; 
        
		echo '<ul class="ulcate head_shado" '.$hidd.'> ';
				  while($done=$bloc->fetch())
				  {	
					  switch($done['id_cats'])
					  {
						  case 1:	$ifa='<i class="fa fa-frown-o"></i>';
							  break;
						  case 2:	$ifa='<i class="fa fa-bug"></i>';
							  break;
						  case 3:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 4:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;	  
						  case 5:	$ifa='<i class="fa fa-user-secret"></i>';
						      break;
						  case 6:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 7:	$ifa='<i class="fa fa-music"></i>';
							  break;
						  case 8:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 9:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 10:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 11:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 12:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
						  case 13:	$ifa='<i class="fa fa-toggle-right"></i>';
							  break;
							  
						  default: $ifa='<i class="fa fa-toggle-right"></i>';
							  break;
					  }
					  
				echo  '
				<li>'.$ifa.'<a href="index.php?b=uno.filter.store&pg=1&cat='.$done['id_cats'].'">'.$done['name_fr_cats'].'</a>
				 ';
                          $nbrcat=$defaultClass_OB->compte1($tams,"_sous_category_sto","id_soucats","id_cat_soucats", $done['id_cats']);
						
							  if($nbrcat!=0)
								  {
									echo '<ul class="ulsoucatop">';
								  $bloc2=$tams->query(" SELECT * FROM _sous_category_sto WHERE id_cat_soucats='".$done['id_cats']."'  ORDER BY name_fr_soucats ASC ");


									  while($done2=$bloc2->fetch())
									  {	
										   echo  '
										   <li><i class="fa fa-long-arrow-right"></i>
										   <a href="index.php?b=uno.filter.store&pg=1&scat='.$done2['id_soucats'].'">'.$done2['name_fr_soucats'].'</a></li>';

									  }
								echo "  </ul>";
								}
					  	 
	   
	            echo "</li>";  
					  
				  } 
         echo "</ul>"; 
}
    
     //shaow category in category pag
    public function categoHI($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY name_fr_cats ASC ");
        
        
		echo '	<ul class="ullocat after wid_98 mar_auto pad_top_30">
        <h2 class="hh22 hsho pos_rel">Les catégories <a href="index.php?b=uno.catego.store">Afficher plus</a></h2></h2>';
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
                    <li class="after">
             <a href="index.php?b=uno.filter.store&pg=1&cat='.$done['id_cats'].'">
		  <div class=""><img src="source/img/store_category/'.$done['ava_cats'].'" alt=""/></div>
              <p class="">
               '.$done['name_fr_cats'].'
              </p>
           </a>   
        </li>';
                       	
	    
					  
				  } 
         echo "</ul>"; 
}
    //shaow category in category pag
    public function categoPG($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY name_fr_cats ASC ");
        
        
		echo '<ul class="ullocat2 after" >
              <div class="lineban"><img src="source/img/banner/1.png"  alt=""/></div>';
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
                    <li class="after">
             <a href="index.php?b=uno.filter.store&pg=1&cat='.$done['id_cats'].'">
		  <div class=""><img src="source/img/store_category/'.$done['ava_cats'].'" alt=""/></div>
              <p class="">
               '.$done['name_fr_cats'].'
              </p>
           </a>   
        </li>';
                       	
	    
					  
				  } 
         echo "</ul>"; 
}
       //shaow category in filter pag
    public function categoFilter($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY name_fr_cats ASC ");
        
      
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
             <li data-va="id_cat_pro='.$done['id_cats'].'" class="ulfili" ><label><input type="radio" name="catego" value="radio"> '.$done['name_fr_cats'].'</label></li>';
                       	
	    
					  
				  } 
      
}
	  public function categoFilter1($tams,$defaultClass_OB,$typ)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1 AND id_aut_cats=$typ ORDER BY name_fr_cats ASC ");
        
      
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
             <li data-va="id_cat_pro='.$done['id_cats'].'" class="ulfili" ><label><input type="radio" name="catego" value="radio"> '.$done['name_fr_cats'].'</label></li>';
                       	
	    
					  
				  } 
      
}
         //shaow sous category in filter pag
    public function SoucategoFilter($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _sous_category_sto WHERE actif_soucats=1  ORDER BY name_fr_soucats ASC ");
        
      
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
             <li data-va="id_soucat_pro='.$done['id_soucats'].'" class="ulfili" ><label><input type="radio" name="catego" value="radio"> '.$done['name_fr_soucats'].'</label></li>';
                       	
	    
					  
				  } 
      
}
    //show prod list home
	public function prodHome($tams,$defaultClass_OB)
	{
		  $bloc=$tams->query(" SELECT DISTINCT(name_fr_cats) FROM _category_sto RIGHT JOIN store ON _category_sto.id_cats=store.id_cat_pro WHERE actif_cats=1  ORDER BY name_fr_cats ASC 
			 ");
			
			  while($done=$bloc->fetch())
			  {	
				  $nbr_pseudo1=$tams->prepare("SELECT * FROM _category_sto WHERE name_fr_cats='".$done['name_fr_cats']."'  " );
           $nbr_pseudo1->execute();
           $chif_pse1=$nbr_pseudo1->fetch();
					

									  
		    echo  '
      
      <ul class="ulpro after Q_cols_2_2col" >
      
	<h2 class="hh22 after"><strong>'.$done['name_fr_cats'].'</strong>  <a href="index.php?b=uno.filter.store&pg=1&cat='.$chif_pse1['id_cats'].'" class="ashow">Tout afficher</a></h2>
          ';
			
		  $bloc2=$tams->query(" SELECT * FROM store WHERE id_cat_pro='".$chif_pse1['id_cats']."' AND actif_pro=1  ORDER BY RAND() LIMIT 4 
					 ");
					  
				 
					  while($done2=$bloc2->fetch())
					  {	
					  echo ' 
		  
          <li>
                <a href="index.php?b=uno.fiche.store&id='.$done2['id_pro'].'">
                  <div class="pimg"><img src="source/img/store/'.$done2['img_pro'].'"  alt="moguez" /></div>
                  <p class="pti">'.$done2['tit_pro'].'</p>
            <p class="petoi"> <i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></p>
                  <p class="ppri">'.$done2['nprice_pro'].' &#8364;</p>
                 
                </a>
            </li>';
					  }
				  echo ' </ul>';
			  } 
		
	}
	   //show store testimony : $Store->testimo($tams,$defaultClass_OB,4,'<ul class="ultesti pad_top_30 after">','</ul>');
	public function testimo($tams,$defaultClass_OB,$nbr,$tag1,$tag2)
	{
		  $bloc=$tams->query(" SELECT * FROM testimony LEFT JOIN user ON testimony.id_aut_tes=user.id  ORDER BY RAND() LIMIT $nbr  ");
			
        echo $tag1;
			  while($done=$bloc->fetch())
			  {	
					  
                  echo  '
                        <li class="after">
                      <div  class="bactesti after">
                        <p class="imgtesti"><img src="source/img/avatar/user/'.$done['ava'].'"  alt=""/></p>
                        <div class="cortesti">
                            <p class="qotesti">«  </p>
                          <p class="notesti">'.$done['nam'].'</p>
                          <p class="textesti">'.$defaultClass_OB->cut_mot($done['mes_tes'], 0, 80,'').'</p>
                         <p class="qotesti2">»   </p>
                          </div>
                      </div>
                    </li>';
			  } 
		 echo $tag2;
	}
	
    	   //show store testimony : $Store->testimo($tams,$defaultClass_OB,4,'<ul class="ultesti pad_top_30 after">','</ul>');
	public function testimoID($tams,$defaultClass_OB,$nbr,$tag1,$tag2,$id)
	{
		  $bloc=$tams->query(" SELECT * FROM testimony LEFT JOIN user ON testimony.id_aut_tes=user.id  WHERE id_arti_tes='$id' ORDER BY RAND() LIMIT $nbr  ");
			
        echo $tag1;
			  while($done=$bloc->fetch())
			  {	
$etoi=array(
   1=>'<i class="ion-android-star"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i>',
   2=>'<i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i>',
    3=>'<i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star-outline"></i><i class="ion-android-star-outline"></i>',
    4=>'<i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star-outline"></i>',
    5=>'<i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i>',

);
					  
                  echo  '
                        <li class="after">
                      <div  class="bactesti after">
                        <p class="imgtesti"><img src="source/img/avatar/'.$done['ava'].'"  alt=""/></p>
                        <div class="cortesti">
                            <p class="qotesti">«  </p>
                          <p class="notesti">'.$done['nam'].'</p>
                           <p class="toitesti tex_center">'.$etoi[$done['note_tes']].'</p>
                          <p class="textesti">'.$done['mes_tes'].'</p>
                         <p class="qotesti2">»   </p>
                          </div>
                      </div>
                    </li>';
			  } 
		 echo $tag2;
	}
    
     	   //show product by cat or soucat in filter pg: $Store->filterSC($tams,$defaultClass_OB,'<ul class="ulpro2 after">','</ul>',"cat",$_GET['cat'],'id_cat_pro',10);
	public function filterSC($tams,$defaultClass_OB,$tag1,$tag2,$get,$cat,$cham,$nbr_ParPage)
	{
		 if(!empty($cat)  AND is_numeric($cat)  )
	  {
		 	 $num=$tams->query('SELECT COUNT(*) n FROM store WHERE '.$cham.'="'.$cat.'" AND actif_pro=1  ');
					  $nu=$num->fetch();

					if($nu['n']!=0)
					{
					 //------afficher les pages
							  $nbr_ParPage = $nbr_ParPage; //1; 
							  $nb_resulta=$nu['n'];
							  // On calcule le nombre de pages à créer
							  $nb_DePages = ceil($nb_resulta / $nbr_ParPage);
							  // Puis on fait une boucle pour écrire les liens vers chacune des pages


							  if (isset($_GET['pg']))
					{
					$page = $_GET['pg']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
					}
					else // La variable n'existe pas, c'est la première fois qu'on charge la page
					{
					$page = 1; // On se met sur la page 1 (par défaut)
					}


							// On calcule le numéro du premier message qu'on prend pour leLIMIT de MySQL
							$premierMessageAafficher = ($page - 1) * $nbr_ParPage;

							$bloc =$tams->query('SELECT * FROM store WHERE '.$cham.'="'.$cat.'" AND actif_pro=1  ORDER BY id_pro DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);

							echo $tag1;							  
							  while($done=$bloc->fetch())
							  { 
								 $comment=substr($done['tit_pro'], 0, 30);
										  $dernier_mot=strrpos($comment," ");
										  $comment=substr($comment,0,$dernier_mot);
										  //$comment.="...";
					  echo '
             <li>
                <a href="index.php?b=uno.fiche.store&id='.$done['id_pro'].'">
                  <div class="pimg"><img src="source/img/store/'.$done['img_pro'].'"  alt="moguez" /></div>
                  <p class="pti">'.$defaultClass_OB->cut_mot($done['tit_pro'], 0, 80,'').' </p>
          
                  <p class="ppri">'.$defaultClass_OB->cinder_nombre($done['nprice_pro'],'.').' F CFA</p>
                 
                </a>
            </li> ';

							  }	
						 echo '   </ul>';

								echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="'.$i.'" ><a href="index.php?b=uno.filter.store&'.$get.'='.$cat.'&pg=' . $i . '">' . $i . '</a></li> ';
							  }
							  echo $tag2;

					}
				else
				    {
				    	 echo '<div class="stop_form">Sorry, nothing to show</div>';

					}
		  
	  }
	  else
	  {
		  	 $num=$tams->query('SELECT COUNT(*) n FROM store WHERE  actif_pro=1  ');
					  $nu=$num->fetch();

					if($nu['n']!=0)
					{
					 //------afficher les pages
							  $nbr_ParPage = $nbr_ParPage; //1; 
							  $nb_resulta=$nu['n'];
							  // On calcule le nombre de pages à créer
							  $nb_DePages = ceil($nb_resulta / $nbr_ParPage);
							  // Puis on fait une boucle pour écrire les liens vers chacune des pages


							  if (isset($_GET['pg']))
					{
					$page = $_GET['pg']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
					}
					else // La variable n'existe pas, c'est la première fois qu'on charge la page
					{
					$page = 1; // On se met sur la page 1 (par défaut)
					}


							// On calcule le numéro du premier message qu'on prend pour leLIMIT de MySQL
							$premierMessageAafficher = ($page - 1) * $nbr_ParPage;

							$bloc =$tams->query('SELECT * FROM store WHERE  actif_pro=1  ORDER BY id_pro DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);

							echo $tag1;							  
							  while($done=$bloc->fetch())
							  { 
								 $comment=substr($done['tit_pro'], 0, 30);
										  $dernier_mot=strrpos($comment," ");
										  $comment=substr($comment,0,$dernier_mot);
										  //$comment.="...";
					  echo '
             <li>
                <a href="index.php?b=uno.fiche.store&id='.$done['id_pro'].'">
                  <div class="pimg"><img src="source/img/store/'.$done['img_pro'].'"  alt="moguez" /></div>
                  <p class="pti">'.$defaultClass_OB->cut_mot($done['tit_pro'], 0, 60,'...').' </p>
           
                  <p class="ppri">'.$defaultClass_OB->cinder_nombre($done['nprice_pro'],'.').'  F CFA</p>
                 
                </a>
            </li> ';

							  }	
						 echo '   </ul>';

								echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="'.$i.'" ><a href="index.php?b=uno.filter.store&'.$get.'='.$cat.'&pg=' . $i . '">' . $i . '</a></li> ';
							  }
							  echo $tag2;

					}
				else
				    {
				    	 echo '<div class="stop_form">Sorry, nothing to show</div>';

					}
	  }
	}
    
      //show prod by rand : $Store->prodRand($tams,$defaultClass_OB,4,'<ul class="ulpro after pad_top_40 Q_cols_2_2col">','</ul>');
	public function prodRand($tams,$defaultClass_OB,$nbr,$tag1,$tag2)
	{
		  $bloc=$tams->query(" SELECT * FROM store WHERE  actif_pro=1  ORDER BY RAND() LIMIT $nbr  ");
			
        echo $tag1;
			  while($done2=$bloc->fetch())
			  {	
					  
                    echo ' 
		  
                      <li>
                            <a href="index.php?b=uno.fiche.store&id='.$done2['id_pro'].'">
                              <div class="pimg"><img src="source/img/store/'.$done2['img_pro'].'"  alt="DTA CAMEROUN" /></div>
                              <p class="pti">'.$defaultClass_OB->cut_mot($done2['tit_pro'], 0, 60,'...').'</p>
                       
                              <p class="ppri">'.$defaultClass_OB->cinder_nombre($done2['nprice_pro'],'.').'  F CFA</p>

                            </a>
                        </li>';
                  
			  } 
		 echo $tag2;
	}
    
    public function categoStoUser($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY name_fr_cats ASC ");
        
		
                    while($done2=$bloc->fetch())
                    {	
                         echo  '<option value="'.$done2['id_cats'].'">'.$done2['name_fr_cats'].'</option>';

                    }

       
     }
    //show user account articles
	public function showuArticle($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pro) nbr FROM store WHERE id_aut_pro=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Articles</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Titre</li>
                                <li>Supprimer</li>
                                <li>Activation</li>
                                <li>Vendu</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM store WHERE id_aut_pro="'.$id.'" ORDER BY id_pro DESC');
									while($done=$bloc->fetch())
									{
                                         $mtit=$defaultClass_OB->format_url($done['tit_pro']);
                                         $murl=''.$mtit.'_'.$done['id_pro'].'_store';
                    $etact=empty($done['actif_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                    $etaven=empty($done['vendu_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
										    $dali=explode(" ",$done['date_pro']);
                                        
                                                 echo '<ul class="usacha after">
          <li style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/store/'.$done['img_pro'].'" alt=""/></li>
          <li><a href="'.$murl.'">'.$done['tit_pro'].'</a></li>
          <li><a class="rouge_1" href="index.php?b=user.mesarticle.user&sup='.$done['id_pro'].'">Supprimer</a></li>
          <li>'.$etact.'</li>
          <li>'.$etaven.'</li>
               <li>'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucun sujet trouvé!</li>';
					
				}
		
	}
     //show seller account articles
	public function showSArticle($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_pro) nbr FROM store WHERE id_aut_pro=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Articles</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Titre</li>
                                <li>Supprimer</li>
                                <li>Activation</li>
                                <li>Vendu</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM store WHERE id_aut_pro="'.$id.'" ORDER BY id_pro DESC');
									while($done=$bloc->fetch())
									{
                                         $mtit=$defaultClass_OB->format_url($done['tit_pro']);
                                         $murl=''.$mtit.'_'.$done['id_pro'].'_store';
                    $etact=empty($done['actif_pro']) ? '<i class="nopay ion-android-cancel"></i> En attente...':'<i class="okpay ion-android-done"></i>';
                    $etaven=empty($done['ven_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
										    $dali=explode(" ",$done['date_pro']);
                                        
                                                 echo '<ul class="usacha after">
          <li data-title="Aperçus" style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/store/'.$done['img_pro'].'" alt=""/></li>
          <li data-title="Titre"><a href="'.$murl.'">'.$done['tit_pro'].'</a></li>
          <li data-title="Supprimer"><a class="rouge_1" href="index.php?b=seller.mesarticle.seller&sup='.$done['id_pro'].'">Supprimer</a></li>
          <li data-title="Activation">'.$etact.'</li>
          <li data-title="Vendu">'.$etaven.'</li>
               <li data-title="Date">'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucun sujet trouvé!</li>';
					
				}
		
	}
	   //show user account devis
	public function showuDevi($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_devi) nbr FROM mesdevis WHERE id_user_devi=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Devis</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Titre</li>
                                <li>Fichier</li>
                                <li>Description</li>
                                <li>Traité</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM mesdevis WHERE id_user_devi="'.$id.'" ORDER BY id_devi DESC');
									while($done=$bloc->fetch())
									{
                                 /*        $mtit=$defaultClass_OB->format_url($done['tit_pro']);
                                         $murl=''.$mtit.'_'.$done['id_pro'].'_store';
                    $etact=empty($done['actif_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                    $etaven=empty($done['vendu_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';*/
										    $dali=explode(" ",$done['date_devi']);
                                        $reto=empty($done['doc2_devi']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                                        
                                                 echo '<ul class="usacha after">
          <li data-title="Aperçus" style="font-size: 32px;text-align: center;"><i class="ion-android-textsms"></i>
          <a class="rouge_1" href="index.php?b=user.mesdevi.user&sup='.$done['id_devi'].'">Supprimer</a></li>
          <li data-title="Titre">'.$done['titre_devi'].'
         <p class="col1">"'.$done['categori_devi'].'"</p>
          </li>
          <li data-title="Fichier"><a href="source/doc/devis/'.$done['doc_devi'].'">'.$done['doc_devi'].'</a></li>
          <li data-title="Description">'.$done['desc_devi'].'</li>
          <li data-title="Traité">'.$reto.'</li>
               <li data-title="Date">'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucun devi trouvé!</li>';
					
				}
		
	}
	   //show user account testimony
	public function showuAchat($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_acha) nbr FROM mesachat WHERE id_aut_acha=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Achat(s)</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Titre</li>
                                <li>Prix</li>
                                <li>Acheté</li>
                                <li>Voir</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM mesachat LEFT JOIN store ON mesachat.id_pro_acha=store.id_pro WHERE id_aut_acha="'.$id.'" ORDER BY id_acha DESC');
									while($done=$bloc->fetch())
									{
                                 /*        $mtit=$defaultClass_OB->format_url($done['tit_pro']);
                                         $murl=''.$mtit.'_'.$done['id_pro'].'_store';
                    $etact=empty($done['actif_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                    $etaven=empty($done['vendu_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';*/
										    $dali=explode(" ",$done['date_acha']);
                                        
                    $etaven=empty($done['ven_acha']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                                                 echo '<ul class="usacha after">
          <li data-title="Aperçus" style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/store/'.$done['img_pro'].'" alt=""/></li>
          <li data-title="Titre">'.$done['tit_pro'].'
          </li>
          <li data-title="Prix">'.$done['nprice_pro'].'$</li>
          <li data-title="Acheté">'.$etaven.'</li>
          <li data-title="Voir"><a href="index.php?b=uno.fiche.store&id='.$done['id_pro'].'">Voir</a></li>
               <li data-title="Date">'.$dali[0].'
          <a class="rouge_1" href="index.php?b=user.achat.user&sup='.$done['id_acha'].'">Supprimer</a></li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucun achat trouvé!</li>';
					
				}
		
	}
     //show user account devis
	public function showUtemoi($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_tes) nbr FROM testimony WHERE id_aut_tes=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Temoignages</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Message</li>
                                <li>Date</li>
                                <li>Supprimer</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM testimony WHERE id_aut_tes="'.$id.'" ORDER BY id_tes DESC');
									while($done=$bloc->fetch())
									{
                                 /*        $mtit=$defaultClass_OB->format_url($done['tit_pro']);
                                         $murl=''.$mtit.'_'.$done['id_pro'].'_store';
                    $etact=empty($done['actif_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                    $etaven=empty($done['vendu_pro']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';*/
										    $dali=explode(" ",$done['date_tes']);
                                      
                                                 echo '<ul class="usacha after">
          <li data-title="Aperçus" style="font-size: 32px;text-align: center;"><i class="ion-android-textsms"></i>
         </li>
          <li data-title="Message">'.$done['mes_tes'].'</li>
               <li data-title="Date">'.$dali[0].'</li>
               <li data-title="Supprimer"> <a class="rouge_1" href="index.php?b=user.temoi.user&sup='.$done['id_tes'].'">Supprimer</a></li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucune entrée trouvé!</li>';
					
				}
		
	}
    
	/*//produit recomander vertical
	public function prod_recomand_verti($tam,$defaultClass_OB,$nbr)
	{
		$bloc=$tam->query(" SELECT * FROM produit_bao  WHERE actif_pro=1  ORDER BY RAND() LIMIT ".$nbr."  
		 ");
		  
		  while($done=$bloc->fetch())
		 		  {
					    echo '
		 
		 <li>
		  <a href="index.php?sheet=fiche&model=uno&ipro='.$done['id_pro'].'">
		  <img src="source/img/articles/'.$done['img1_pro'].'" alt=""/></a>
		  	<p class="priarti">'.$done['pri_pro'].' '.$defaultClass_OB->devise.'</p>
		  	</li>
					  ';
					  
					  
				  }
		
	}
	
	//liste catego
	public function listcatego($tam,$defaultClass_OB)
	{
	
	$bloc=$tam->query(" SELECT * FROM _category_sto WHERE actif_cats=1  ORDER BY FR_cat ASC ");
			
		
				  while($done=$bloc->fetch())
				  {	
				echo  '
				<option value="'.$done['id_cats'].'">'.$done['fr_cat'].'</option>';  
					  
				  } 
}
	
	//liste soucatego
	public function listsoucatego($tam,$defaultClass_OB)
	{
	
	$bloc=$tam->query(" SELECT * FROM sous_categorie_bao  ORDER BY FR_soucat ASC ");
			
		
				  while($done=$bloc->fetch())
				  {	
				echo  '
				<option value="'.$done['id_soucat'].'">'.$done['fr_soucat'].'</option>';  
					  
				  } 
}
	
	//produit recomander
	public function prod_recomand($tam,$nbr)
	{
		$bloc=$tam->query(" SELECT * FROM produit_sto WHERE actif_pro=1   ORDER BY RAND() LIMIT ".$nbr."  
		 ");
		  
		  while($done=$bloc->fetch())
		 		  {
					  echo '<li>
					  <div class="upprod">
		<div class="imgano"><a href="tams.php?sheet=fiche&amp;ipro='.$done['id_pro'].'"><img src="img/produits/'.$done['img1_pro'].'" alt=""/></a></div>
        <p class="nom_prod pad_top_bot_6">'.$done['nom_pro'].' </p>
        <p class="pri_prod">Fcfa '.$done['priok_pro'].' <span class="uni_prod">/'.$done['uni_pro'].'</span></p>
         
		 </div>
		 <div class="bg"><div class="actions">
		 <a href="tams.php?sheet=fiche&amp;ipro='.$done['id_pro'].'" class="btnstorfish" >Voir la fiche</a>
		 </div></div>
		 
		 </li> 
					  ';
					  
					  
				  }
		
	}
	*/
	  //shaow marque in filter pag
    public function marqueFilter($tams,$defaultClass_OB)
	{
	
	$bloc=$tams->query(" SELECT * FROM _marque_sto WHERE actif_maqs=1  ORDER BY name_fr_maqs ASC ");
        
      
				  while($done=$bloc->fetch())
				  {	
					
					  
				echo  '
             <li data-va="id_soucat_pro='.$done['id_maqs'].'" class="ulfili0" ><label><input type="radio" name="maqso" value="radio"> '.$done['name_fr_maqs'].'</label></li>';
                       	
	    
					  
				  } 
      
}
	
}


 $Store=new Store($tams);
?>