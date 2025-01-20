<?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<table width="100%" border="1" class="utable utable_1">
  <tbody>
	   <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Ip</th>
      <th scope="col">Type</th>
      <th scope="col">Message</th>
      <th >Date</th>
    </tr>
		   </thead>
	   <!--555555555-->
               <?php 
				  
			$nbr_ParPage=$_SESSION['nbr_ParPage'];
	  $get="ggg";
	  $cat=3;
	  //$_POST['pg']=2;
				  
				  	      $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM historique_user " );
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   	 //------afficher les pages
							  $nbr_ParPage = $nbr_ParPage; //1; 
							  $nb_resulta=$chif_pse['nbr'];
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
			   
	        echo  '<div class="ok_form tex_center mar_top_40" data-totalPage="25">Total: '.$chif_pse['nbr'].'</div>';
			   
			$bloc=$tams->query(' SELECT * FROM historique_user  ORDER BY  id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
						
			   $tams->query('UPDATE historique_user SET lu=1 WHERE lu=0  ');
					
				  $ii=1;
				while($done=$bloc->fetch())
				{
					$colo=$done['lu']==0? 'class="newnotifi"':'';
                   
					
				echo '
				 <tr '.$colo.'>
      <td data-title="No">'.$ii.'</td>
      <td data-title="Author">'.$done['user'].'</td>
      <td data-title="Email">'.$done['emai'].'</td>
      <td data-title="ip">'.$done['ip'].'</td>
      <td data-title="type">'.$done['type'].'</td>
      <td data-title="message">'.$done['messag'].'</td>
      <td data-title="Date" colspan="2">
		 '.$done['dates'].'
		</td>
    </tr>
			';	
					$ii++;

				}
		   echo '  </div> </tbody>
                         </table>';
			   	echo ' <div class="after"></div>
                                       <ul class="ulnbr after">';
			   
							  for ($i = 1 ; $i <= $nb_DePages ; $i++)
							  {
							  echo '<li class="link '.$i.'" data-page="historique_website" data-title="Website historique page('.$i.')" data-para="page=historique_website&pg='.$i.'">
							  <a href="#">' . $i . '</a></li> ';
							  }
							  echo '</ul>'; 
			   
		    }
			else
			{
			  
			   echo  '<div class="stop_form tex_center mar_top_40">Nothing to display</div>';

			   echo '  </tbody>
                         </table>';
			}
			?>