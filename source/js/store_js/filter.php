<?php  @session_start();
require_once('../db_2_js.class.php');
require_once('../../class/default.class.php');

$tag1='<ul class="ulpro2 after">';
$tag2='</ul>';
$nbr_ParPage=9;
$requet=$_POST['requet'];

 if(!empty($requet)   )
	  {
		 	 $num=$tams->query('SELECT COUNT(*) n FROM store WHERE actif_pro=1   '.$requet.' ');
					  $nu=$num->fetch();

					if($nu['n']!=0)
					{
					 //------afficher les pages
							  $nbr_ParPage = $nbr_ParPage; //1; 
							  $nb_resulta=$nu['n'];
							  // On calcule le nombre de pages à créer
							  $nb_DePages = ceil($nb_resulta / $nbr_ParPage);
							  // Puis on fait une boucle pour écrire les liens vers chacune des pages


							  if (isset($_POST['pg']))
					{
					$page = $_POST['pg']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
					}
					else // La variable n'existe pas, c'est la première fois qu'on charge la page
					{
					$page = 1; // On se met sur la page 1 (par défaut)
					}

                          if (isset($_POST['order']))
					{
					$order = $_POST['order']; // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
					}
					else // La variable n'existe pas, c'est la première fois qu'on charge la page
					{
					$order = 'ORDER BY id_pro DESC'; // On se met sur la page 1 (par défaut)
					}

							// On calcule le numéro du premier message qu'on prend pour leLIMIT de MySQL
							$premierMessageAafficher = ($page - 1) * $nbr_ParPage;

							$bloc =$tams->query('SELECT * FROM store WHERE  actif_pro=1  '.$requet.'  LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);

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
                  <p class="pti">'.$defaultClass_OB->cut_mot($done['tit_pro'], 0, 50,'...').' </p>
            <!--<p class="petoi"> <i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star-outline"></i></p>-->
                  <p class="ppri">'.$defaultClass_OB->cinder_nombre($done['nprice_pro'],'.').' F CFA</p>
                 
                </a>
            </li> ';

							  }	
						 echo '   </ul>';

								echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="'.$i.'" ><a class="loadfidy" data-req="'.$requet.'" data-pag="'.$i.'" href="requet='.$requet.'&pg=' . $i . '">' . $i . '</a></li> ';
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
		  echo ' <div class="stop_form">Catégorie incorrect</div>';
	  }
?>