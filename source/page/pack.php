<div id="pg_testi">
	
<!-- top -->	
<div class="bac_bla">
  <div class="fenetre">
	
   
	   <div class="facfor after col_2_to_1" >
		
		   
		<div class="flo_lef wid_70" >
		 <?php 
$blocw=$tams->query(' SELECT * FROM _webapp_info  WHERE id =1 ');
				
while($donew=$blocw->fetch())
{$YVtype=$donew['webVideo'];}
			

			if(!empty($_GET['d']) AND $_GET['d']!="facop_a3")
			{
				$packname=htmlspecialchars($_GET['d']);
				$allow=0;
				
				$sql = 'SELECT * FROM pack WHERE  codeName = :packname ';
								$stmt = $tams->prepare($sql);
								$stmt->bindParam(':packname', $packname, PDO::PARAM_STR);
								$stmt->execute();
								if($stmt->rowCount())
								{
			
									if($packname=="facop_a0")
									{
										$allow=1;
									}
									elseif(!empty($_SESSION['achat']) AND in_array($packname, $_SESSION['achat']))
									{
										$allow=1;
									}
									
									
									
									 $bloc=$tams->query(" SELECT * FROM pack WHERE codeName='$packname' ");
                            
                                        
                                  while($done=$bloc->fetch())
                                    {
											  if($allow==1)
												{
													$nbrVu=$done['vu'];
												    $nbrId=$done['id_pk'];

												  $uup=$tams->query(" UPDATE pack SET vu=$nbrVu+1 WHERE id_pk=$nbrId ");
													$uup->execute();
												}
									  
									  //recherche du themes
										 $nbr_pseudoTH=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson
										 WHERE id_pack=:pse AND actif=1  " ) ;
										 $nbr_pseudoTH->execute(array('pse'=>$done['id_pk']));
										 $chif_pseTH=$nbr_pseudoTH->fetch();
                                         $nbrTH=$chif_pseTH['nbr'];
									    //recherche du pdf
										 $nbr_pseudoPDF=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_pdf
										 WHERE id_pk_pf=:pse AND actif_pf=1  " ) ;
										 $nbr_pseudoPDF->execute(array('pse'=>$done['id_pk']));
										 $chif_psePDF=$nbr_pseudoPDF->fetch();
                                         $nbrPDF=$chif_psePDF['nbr'];
									  //recherche du AUDIO
										 $nbr_pseudoAUDIO=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_audio
										 WHERE id_pk_pf=:pse AND actif_pf=1  " ) ;
										 $nbr_pseudoAUDIO->execute(array('pse'=>$done['id_pk']));
										 $chif_pseAUDIO=$nbr_pseudoAUDIO->fetch();
                                         $nbrAUDIO=$chif_pseAUDIO['nbr'];
									  //recherche du LINK
										 $nbr_pseudoLINK=$tams->prepare("SELECT COUNT(id_pf) nbr FROM pack_link
										 WHERE id_pk_pf=:pse AND actif_pf=1  " ) ;
										 $nbr_pseudoLINK->execute(array('pse'=>$done['id_pk']));
										 $chif_pseLINK=$nbr_pseudoLINK->fetch();
                                         $nbrLINK=$chif_pseLINK['nbr'];
											 
									  $idpack=$done['id_pk'];
											 
									  $done['prix']=$done['codeName']=="facop_a0" ? 0:$done['prix'];
									  $prequi=array(
									  "facop_a0"=>"Aucun pré-requis",
									  "facop_a1"=>'pour suivre ce cours, vous devez d\'abord suivre la formation FACOP A0. Pour cela, vous pouvez aller ici <a href="index.php?b=uno.pack&d=facop_a0">FACOP A0</a>.',
									  "facop_a2"=>'pour suivre ce cours, vous devez d\'abord suivre la formation FACOP A1. Pour cela, vous pouvez aller ici <a href="index.php?b=uno.pack&d=facop_a1">FACOP A1</a>.',
									  "facop_a3"=>'pour suivre ce cours, vous devez d\'abord suivre la formation FACOP A2. Pour cela, vous pouvez aller ici <a href="index.php?b=uno.pack&d=facop_a2">FACOP A2</a>.',
									  )
			?>
			<div class="facopPlayer pos_rel">
			<div class="facopPlayertop" style="position: absolute;width: 100%;height: 13%;top: 0;left: 0;background-color: #f5f5dc00;z-index: 2000;"></div>
			<?php 

			

			if($YVtype=="vimeo")
			{
				$theVid=!empty($_GET['yid']) ? $_GET['yid']: $done['introFR']; 

				echo'<div id="plyr-youtube" data-plyr-provider="vimeo" data-plyr-embed-id="'.$theVid.'" ></div>';
			}
			else
			{
				$theVid=!empty($_GET['yid']) ? $_GET['yid']: $done['youtube_FR']; 

				echo'<div id="plyr-youtube" data-plyr-provider="youtube" data-plyr-embed-id="'.$theVid.'" ></div>';
			}
			  
			
			?>
				</div>	
					
			<p class="wow pulse animated finvid hide" data-wow-iteration="infinite" >Après cette vidéo, consultez ci-dessous, les rubriques "Vidéos - PDFs - Audios - Liens" <i class="ifinvide ion-android-close" title="Fermez"></i></p>
			
		     <h2 class="h1 mar_top_35 pos_rel"><?php echo $done['titre']; ?> <span class="vupac"><i class="ion-eye"></i><?php echo $done['vu']." Vues"; ?></span></h2>
			<p class="thelec"></p>
			<p class="mar_top_20 wid_80"><?php echo $done['des']; ?></p>
			<div class="icipani"></div>
			<?php if($done['prix']!=0  )
			{
					 if(!empty($_SESSION['achat']) AND in_array($done['codeName'], $_SESSION['achat']))
					  {

						 echo '<p class="fon_siz_30 tex_cen col_3 pad_top_bot_20">Formation Abonnée</p>';
					  }
				   else{
			?>
			 <ul class="ul_lis_hor_pai mar_top_10 after Q_cols_2_1col">
				  <li><p class="Ppri"><?php echo $done['prix']; ?> FCFA</p></li>
				  <li><a href="index.php?b=uno.cart" class="Ppay fon_siz_15"><i class="ion-android-add"></i> Acheter maintenant</a></li>
				  <li><p class="Pcar carttai fon_siz_15" 
					data-img="source/img/pack/<?php echo $done['img']; ?>" 
					data-des="<?php echo $done['titre']; ?>" 
					data-pri="<?php echo $done['prix']; ?>" 
					data-qua="<?php echo $done['id_pk']; ?>" 
					data-exp="<?php echo $done['codeNbr']; ?>" 
					data-mail="<?php echo $done['codeName']; ?>" 
					data-souto="000"><i class="ion-android-cart"></i> Ajouter au panier</p></li>
		     </ul>
			   
			<?php 
			         }
				}
				  else
				  {
					  echo '<p class="fon_siz_30 tex_cen col_3 pad_top_bot_20">Formation gratuite</p>';
				  }
			?>
			<aside class="asi_pre">
			<p class="pre_req"><strong>Prérequis :</strong>&nbsp; <?php echo $prequi[$done['codeName']]; ?></p>
			</aside>
			
			<aside class="asi_inf">
			<p class="pre_req"><strong>Infos :</strong>&nbsp;A la fin de la formation, n'oubliez pas de tester vos connaissance dans la rubrique "quiz" ci-dessous.</p>
			</aside>
			
		     <ul class="ul_lis_hor_i mar_top_10 after">
				  <li class="blo_show Seli" data-blo="bloc_the"><p><i class="ion-social-youtube-outline"></i><?php echo $nbrTH; ?> 
					  <span class="Q_block_320">.</span>Vidéos</p></li>
				  <li class="blo_show" data-blo="bloc_pdf"><p><i class="ion-document-text"></i><?php echo $nbrPDF; ?>
					  <span class="Q_block_320">.</span> PDFs</p></li>
				  <li class="blo_show" data-blo="bloc_aud"><p><i class="ion-ios-musical-notes"></i> <?php echo $nbrAUDIO; ?> 
					  <span class="Q_block_320">.</span>Audios</p></li>
				  <li class="blo_show" data-blo="bloc_lin"><p><i class="ion-link"></i> <?php echo $nbrLINK; ?> 
					  <span class="Q_block_320">.</span>Liens</p></li>
		     </ul>
			  <div class="bloc_con" >
				  
				  <div class="bloc_the  el_blo" >
				  <ul class="ul_the mar_top_35">
					  
					  
					   <?php 
							  if($nbrTH!=0)
								 {
									
								  $blocL=$tams->query(" SELECT * FROM lesson WHERE id_pack=$idpack AND actif=1 ORDER BY titre ASC");
                                 
								  
                                  while($doneL=$blocL->fetch())
                                    {
									  
									       
									  
									  
									  $idles=$doneL['id_les'];
									  echo '<li class="after">';
									  echo '<div class="btn_the after cliNexTog pad_top_bot_10">
						  <div class="flo_lef wid_15" ><img src="source/img/lesson/'.$doneL['img'].'"  alt=""/></div>
						  <div class="flo_lef wid_80" >'.$doneL['titre'].': '.$doneL['des'].'</div>
						  <div class="flo_lef wid_3" ><i class="ion-android-arrow-dropdown-circle"></i></div>
						 </div>
						 
						 <ul class="ul_pat">';
									  
							   ?>
					           <?php
									 
									  
									   $blocV=$tams->query(" SELECT * FROM video WHERE id_les_vi=$idles AND actif_vi=1 ORDER BY titre ASC");
                                 
								      $con="";
									  $bouton="";
										  while($doneV=$blocV->fetch())
											{
											 
											  if(!empty($_SESSION['id']))
											  {
												  
												 $user=$_SESSION['id'];
												 $pack=$doneL['id_pack'];
											  
											    $blocT=$tams->query(" SELECT * FROM achat WHERE iduser_cha=$user AND  idpack_cha =$pack  ");
                            
												while($outilT=$blocT->fetch())
													{ 

													  if (!empty($outilT['theme_cha']) AND str_contains($outilT['theme_cha'], $doneL['id_les'])) 
														{ 
															$bouton='<span class="tercour" >Thème déja terminé</span>';
														}
													    else
														{
															$bouton='<span class="okcour" data-cou="'.$doneL['id_les'].'" data-pa="'.$doneL['id_pack'].'">J\'ai terminé ce thème</span>';
														}


													 }
											  }
											  else
											  {
												  
													
											  }
											    
											  
											  
											  
											  $alinkC="";
											  $alink="";
											  
											  if($doneV['titre']=="Conclusion")
											  {
												  $alinkC=$allow==0 ? '#':'index.php?b=uno.pack&d='.$done['codeName'].'&yid='.$doneV['youtube_FR'];
												  $yidC=$allow==0 ? '0':$doneV['youtube_FR'];
												  
												 $con='<li class="after elvid" >
												 <p class="myVid"  data-thelec="'.$doneL['titre'].' ('.$doneV['titre'].')" data-read="'.$yidC.'" >
												 <i class="ion-ios-videocam"></i> '.$doneV['titre'].' </p></li>'; 
												  continue;
											  }
											  
											  $alink=$allow==0 ? '#':'index.php?b=uno.pack&d='.$done['codeName'].'&yid='.$doneV['youtube_FR'];
											  $yid=$allow==0 ? '0':  $doneV['youtube_FR'];

											  if($yid!="0")
											  {
												$yid=$YVtype=="vimeo"? $doneV['link']: $doneV['youtube_FR'];
											  }
											  
											  echo '<li class="after elvid" >
											  <p class="myVid" data-thelec="'.$doneL['titre'].' ('.$doneV['titre'].')" data-read="'.$yid.'" >
											  <i class="ion-ios-videocam"></i> '.$doneV['titre'].'</p></li>';

											}
									  
									   echo  $con.$bouton.' 
									   
									   </ul>  </li>';
								    }
								  
								  
								  
								 }
							  else
							     {
								  echo '<li class="after"><i class="ion-ios-videocam"></i> Aucun résultat </li>';
							     }
							 ?>
					  
					  <li class="after">
						  
						 <div class="btn_the after cliNexTog pad_top_bot_10">
						  <div class="flo_lef wid_15" ><img src="source/img/quiz.png"  alt=""/></div>
						  <div class="flo_lef wid_80" ><a href="<?php echo $allow==0? '#':'index.php?b=uno.qcm&f='.$done['codeName']; ?>">Quiz: Test de connaissances</a></div>
						  <div class="flo_lef wid_3" ><i class="ion-android-arrow-dropright-circle"></i></div>
						 </div>
						  
					  </li>
					  <?php
						if($done['codeName']!="facop_a0")
								  {
									 echo '<li class="after">
						  
									 <div class="btn_the after cliNexTog pad_top_bot_10">
									  <div class="flo_lef wid_15" ><img src="source/img/lesson/1714151179.png"  alt=""/></div>
									  <div class="flo_lef wid_80" ><a href="index.php?b=user.certificat.user&f='.$done['codeName'].'">Certification: Télécharger</a></div>
									  <div class="flo_lef wid_3" ><i class="ion-android-arrow-dropright-circle"></i></div>
									 </div>

									   </li>  ';
								  }			  
						
					  ?>
					 
		         </ul>
				 </div>
				  
				  <div class="bloc_pdf el_blo hide" ><!--pdf-->
				 
						 <ul class="ul_pat ">
							  <?php 
							  if($nbrPDF!=0)
								 {
									
								  $blocL=$tams->query(" SELECT * FROM pack_pdf WHERE id_pk_pf=$idpack AND actif_pf=1");
                                 
                                  while($doneL=$blocL->fetch())
                                    {
									  $alinkPDF=$allow==0 ? '#':'index.php?b=uno.pdf&n='.$doneL['titre'].'&np='.$doneL['pg'].'&p='.$doneL['link'];
									  echo '<li class="after">
									  <i class="ion-document-text"></i> <a href="'.$alinkPDF.'" target="_blank">'.$doneL['titre'].'</a> <br/> '.$doneL['pg'].' Pages </li>';
								    }
								 }
							  else
							     {
								  echo '<li class="after"><i class="ion-document-text"></i> Aucun résultat </li>';
							     }
							 ?>
						 </ul>
				  
			
				  </div> 
				  
				  <div class="bloc_aud  el_blo hide" ><!--audio-->
							 
						 <ul class="ul_pat ">
							 <?php 
							  if($nbrAUDIO!=0)
								 {
									
								  $blocL=$tams->query(" SELECT * FROM pack_audio WHERE id_pk_pf=$idpack AND actif_pf=1");
                                 $i=1;
                                  while($doneL=$blocL->fetch())
                                    {
									  $alinkAUDIO=$allow==0 ? 'source/sound/pack/no_audio.mp3':'source/sound/pack/'.$doneL['link'];
									  echo '<li class="after zik" data-type="mp3" data-wik="'.$doneL['link'].'">
									  <i class="ion-ios-musical-notes"></i> '.$doneL['titre'].' <br/> '.$doneL['pg'].'
									  
									       <audio id="plyr-audio-'.$i.'" controls>
							                <source id="player-sou" src="'.$alinkAUDIO.'" type="audio/mp3" />
							               </audio>
							          </li>';
									  $i++;
								    }
								 }
							  else
							     {
								  echo '<li class="after"><i class="ion-ios-musical-notes"></i> Aucun résultat </li>';
							     }
							 ?>
						 </ul>
				  
			
				  </div>
				  
				  <div class="bloc_lin  el_blo hide" ><!--lien-->
				 
						 <ul class="ul_pat ">
							 <?php 
							  if($nbrLINK!=0)
								 {
									
								  $blocL=$tams->query(" SELECT * FROM pack_link WHERE id_pk_pf=$idpack AND actif_pf=1");
                                 
                                  while($doneL=$blocL->fetch())
                                    {
									  $alinkLINK=$allow==0 ? '#':$doneL['link'];
									  echo '<li class="after"><i class="ion-link"></i> <a href="'.$alinkLINK.'" target="_blank">'.$doneL['titre'].'</a> </li>';
								    }
								 }
							  else
							     {
								  echo '<li class="after"><i class="ion-link"></i> Aucun résultat </li>';
							     }
							 ?>
						 </ul>
				  
			
				  </div>
			</div>
				 <?php 
									  }
				
									}
				else
				{
					echo '<div class="no_form no_result">
					<img src="source/img/achat.png"  alt=""/>
					Formation introuvable</div>';
				}
			}
			else
			{
				echo '<div class="no_form no_result">
				<img src="source/img/achat.png"  alt=""/>
				Cette formation sera bientôt disponible...</div>';
			}
			?>
			<div class="after abo_coa mar_top_40" >
			<div class="flo_lef wid_20" ><img src="source/img/staff/team_1.jpg"  alt=""/></div>
				<div class="flo_lef wid_80" >
					<strong>A propos du coach</strong>
					<p><strong>Lucas Kamdem:</strong> En tant que Président du Conseil d'Administration du groupe MTA-DC, j'ai quitté ma carrière de fonctionnaire d'État pour me lancer avec succès dans l'entrepreneuriat. Aujourd'hui, je mets mon expérience à profit en consacrant mon temps à former de jeunes entrepreneurs africains à travers le programme FACOP. </p>
				</div>
			</div>
			
			
        </div>
		<div class="flo_rig wid_30 pad_lef_40" >
			
		     <h2 class="h1">Nos formations</h2>
		    <ul class="ul_lis_pac mar_top_35">
				  <li class="after"><a href="index.php?b=uno.pack&d=facop_a0" >
					  <div class="flo_lef wid_50" ><img src="source/img/pack/facop_a0.png"  alt=""/></div>
					  <div class="flo_lef wid_50" ><strong>Facop A0</strong><p>Pourquoi je dois m’intéresser à 
l’entrepreneuriat et me former ?</p></div></a>
		          </li>
				  <li class="after"><a href="index.php?b=uno.pack&d=facop_a1" >
					  <div class="flo_lef wid_50" ><img src="source/img/pack/facop_a1.png"  alt=""/></div>
					  <div class="flo_lef wid_50" ><strong>Facop A1</strong><p>Tu as décidé de créer ton entreprise ? Voici 
comment faire !</p></div></a>
		          </li>
				  <li class="after"><a href="index.php?b=uno.pack&d=facop_a2" >
					  <div class="flo_lef wid_50" ><img src="source/img/pack/facop_a2.png"  alt=""/></div>
					  <div class="flo_lef wid_50" ><strong>Facop A2</strong><p>Voici comment gérer et développer ton entreprise.</p></div></a>
		          </li>
				  <li class="after"><a href="index.php?b=uno.pack&d=facop_a3" >
					  <div class="flo_lef wid_50" ><img src="source/img/pack/facop_a3.png"  alt=""/></div>
					  <div class="flo_lef wid_50" ><strong>Facop A3</strong><p>Au large ! L’accès à l’autoroute de l’abondance.</p></div></a>
		          </li>
		     </ul>
        </div>
		   
      </div>
	  
    
    </div>
</div> <!-- End -->

 <!--APP store-->
	 <div class="bac_gre_2 pad_bot_0">
		<div class="fenetre">
			
  <div class="sec-app dis_fle_2 Q_cols_2_1col">
		<div class="info">
				<h2 class="h2 tex_cen">Transportez vos connaissances dans votre poche</h2>
				
					<p class="mar_top_10 tex_cen">Téléchargez gratuitement l'application pour accéder rapidement aux formations FACOP.</p>
				
				<div class="mar_top_30">
					<img class="qrcode mar_bot_20" alt="QR Code - Baixar Cursa - Cursos Online" src="source/img/qrcodes.png" >
					<a href="https://play.google.com/store/apps/details?id=com.bee4tech.facopappli" target="_blank">
					<img class="app" alt="Get it on Google Play, Facop online" src="source/img/google_play_en.webp" width="165" height="50" loading="lazy">
					</a>
					<a href="https://apps.apple.com/en/app/id153" target="_blank">
					<img class="app" alt="Get it on App Store, Facop online" src="source/img/apple_store_en.webp" width="165" height="49" loading="lazy">
					</a> 
			     </div>
			</div>
		<img class="main" src="source/img/footer-app.webp" width="800px" height="500px" alt="Téléchargez l'application Facop online. Il existe des centaines de cours gratuits disponibles, avec un certificat d'achèvement gratuit qui est enregistré dans votre galerie d'images mobile." loading="lazy">
</div>
	
	   </div> </div>
    <!--h1 for app-->
	
</div>
