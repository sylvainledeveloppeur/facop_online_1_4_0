<?php 

class Index
{
	private $_atri=0;
	 //show realisation pg:  $Index->nosReali($tams,$defaultClass_OB,'<ul class="ulproj Q_cols_2_2col imghei after">','</ul>',"id_aut_rea",$_GET['rea'],'id_rea',8);
	public function nosReali($tams,$defaultClass_OB,$tag1,$tag2,$get,$cat,$cham,$nbr_ParPage)
	{
		 if(!empty($cat)  AND is_numeric($cat) AND  $cat!=1 )
	  {
		 	 $num=$tams->query('SELECT COUNT(*) n FROM realisation WHERE '.$cham.'!=1 AND actif_rea=1  ');
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

							$bloc =$tams->query('SELECT * FROM realisation WHERE '.$cham.'!=1 AND actif_rea=1  ORDER BY id_rea DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);

							echo $tag1;							  
							  while($done=$bloc->fetch())
							  { 
								 $comment=substr($done['desc_rea'], 0, 30);
										  $dernier_mot=strrpos($comment," ");
										  $comment=substr($comment,0,$dernier_mot);
										  //$comment.="...";
				  echo ' <li><img src="source/img/projet/'.$done['img_rea'].'"  alt=""/>
            <div class="ovepro">
              <p>"'.$done['desc_rea'].'"</p>
                '.$done['dure_rea'].'
              </div>
          </li>
          ';

							  }	
						 echo '   </ul>';

								echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="'.$i.'" ><a href="index.php?b=uno.project&'.$get.'='.$cat.'&pg=' . $i . '">' . $i . '</a></li> ';
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
		  	 $num=$tams->query('SELECT COUNT(*) n FROM realisation WHERE '.$cham.'=1 AND actif_rea=1  ');
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

							$bloc =$tams->query('SELECT * FROM realisation WHERE  '.$cham.'=1 AND actif_rea=1  ORDER BY RAND()  LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);

							echo $tag1;							  
							  while($done=$bloc->fetch())
							  { 
								 $comment=substr($done['desc_rea'], 0, 30);
										  $dernier_mot=strrpos($comment," ");
										  $comment=substr($comment,0,$dernier_mot);
										  //$comment.="...";
					  echo ' <li><img src="source/img/projet/'.$done['img_rea'].'"  alt=""/>
            <div class="ovepro">
              <p>"'.$done['desc_rea'].'"</p>
                '.$done['dure_rea'].'
              </div>
          </li>
          ';

							  }	
						 echo '   </ul>';

							/*	echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="'.$i.'" ><a href="index.php?b=uno.filter.store&'.$get.'='.$cat.'&pg=' . $i . '">' . $i . '</a></li> ';
							  }
							  echo $tag2;*/

					}
				else
				    {
				    	 echo '<div class="stop_form">Sorry, nothing to show</div>';

					}
	  }
	}

	  //show patner account demandarticles
	public function showuArticle($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_par) nbr FROM partenaria WHERE id_aut_par=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' demandes</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Logo</li>
                                <li>Entreprise</li>
                                <li>Supprimer</li>
                                <li>Certification</li>
                                <li>Pays</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM partenaria WHERE id_aut_par="'.$id.'" ORDER BY id_par DESC');
									while($done=$bloc->fetch())
									{
                                        
                    $etact=empty($done['actif_par']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
										    $dali=explode(" ",$done['date_par']);
                                        
                                                 echo '<ul class="usacha after">
          <li data-title="Logo" style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/partner/'.$done['logo_par'].'" alt=""/></li>
          <li data-title="Entreprise">'.strtoupper($done['nom_par']).'  ('.$done['statu_par'].')</li>
          <li data-title="Supprimer"><a class="rouge_1" href="index.php?b=patner.mesDemand.patner&sup='.$done['id_par'].'">Supprimer</a></li>
          <li data-title="Certification">'.$etact.'</li>
          <li data-title="Pays">'.$done['pay_par'].'</li>
               <li data-title="Date">'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucune entreé trouvé!</li>';
					
				}
		
	}
	
      //show user account articles
	public function showPatnerCertif($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_par) nbr FROM partenaria WHERE actif_par=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Partenaires</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Logo</li>
                                <li>Entreprise</li>
                                <li>Certification</li>
                                <li>Pays</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM partenaria WHERE actif_par="'.$id.'" ORDER BY id_par DESC');
									while($done=$bloc->fetch())
									{
                                        
                    $etact=empty($done['actif_par']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
										    $dali=explode(" ",$done['date_par']);
                                        
                                                 echo '<ul class="usacha after">
          <li data-title="Logo" style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/partner/'.$done['logo_par'].'" alt=""/></li>
          <li data-title="Entreprise">'.strtoupper($done['nom_par']).'  ('.$done['statu_par'].')</li>
          <li data-title="Certification">'.$etact.'</li>
          <li data-title="Pays">'.$done['pay_par'].'</li>
               <li data-title="Date">'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucune entreé trouvé!</li>';
					
				}
		
	}
	
	  //show patner account realis
	public function showPatnerReali($tams,$id,$defaultClass_OB)
	{
							//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_rea) nbr FROM realisation WHERE id_aut_rea=$id  " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			   if ($chif_pse['nbr']!=0)
				{
                   
				    echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Réalisations</h2>
                            <ul class="usacha usachahea after bg_1">
                                <li>Aperçus</li>
                                <li>Description</li>
                                <li>Supprimer</li>
                                <li>Activation</li>
                                <li>Durée</li>
                                <li>Date</li>
                                </ul>';
									
				   $bloc=$tams->query('SELECT * FROM realisation WHERE id_aut_rea="'.$id.'" ORDER BY id_rea DESC');
									while($done=$bloc->fetch())
									{
                                         $mtit=$defaultClass_OB->format_url($done['desc_rea']);
                                         
                    $etact=empty($done['actif_rea']) ? '<i class="nopay ion-android-cancel"></i>':'<i class="okpay ion-android-done"></i>';
                    
										    $dali=explode(" ",$done['date_rea']);
                                        
                                                 echo '<ul class="usacha after">
          <li style="font-size: 32px;text-align: center;"><img id="cpimg" src="source/img/projet/'.$done['img_rea'].'" alt=""/></li>
          <li>'.$done['desc_rea'].'</li>
          <li><a class="rouge_1" href="index.php?b=patner.mesrealisation.patner&sup='.$done['id_rea'].'">Supprimer</a></li>
          <li>'.$etact.'</li>
          <li>'.$done['dure_rea'].'</li>
               <li>'.$dali[0].'</li>
          </ul>';
									}
				   
				}
			else
				{
				echo '<li class="stop_form"> Aucun sujet trouvé!</li>';
					
				}
		
	}
	
}
 $Index=new Index;


?>

