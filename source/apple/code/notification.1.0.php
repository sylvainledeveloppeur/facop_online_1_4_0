<?php require_once("../class/db_app.class.php");
require_once("../class/Bee.class.php");
$_POST=$_GET;
//insert visite***************************************************************************
	if(!empty($_SERVER['REMOTE_ADDR']))
				{
					//$BClas->InserVisite($tams,$BClas,$_SERVER['REMOTE_ADDR'],"Home","Phone","Android","App");
				}
				else{
					
					//$BClas->InserVisite($tams,"0","Home","Phone","Android","App");
				}
				//$_POST['id']="727";
				$id=$_POST['id'];
				$lang=$_POST['lang']=="fr" ? $_POST['lang']:"en";
	
	
//liste
  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_noti) nbr FROM user_notification
                                 WHERE  id_user_noti=:pse OR id_user_noti=0 " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$_POST['id']));
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
									
									 //------afficher les pages
							  $nbr_ParPage = 5; //1; 
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

							$query =$tams->query('SELECT * FROM user_notification WHERE  id_user_noti='.$id.' OR id_user_noti=0  ORDER BY id_noti DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
					
  $outils = array(); 
  while ($outil = $query->fetch()) { 
    array_push($outils, array("id" => $outil["id_noti"], 
                              "titre" => $outil["suj_noti"], 
                              "img1" => $outil["id_noti"], 
                              "img2" => $outil["id_noti"], 
                              "img3" => $outil["id_noti"],
                              "img4" => $outil["id_noti"], 
                              "ville" => $outil["suj_noti"], 
                              "desc" => $outil["desc_noti"], 
                              "prix" => $outil["id_noti"]." Fcfa",
                              "time" =>  $BClas->time_ago(strtotime($outil["phpdate_noti"]),$lang),  
                              "11" => $outil["someout_noti"],  
                              "12" => $outil["somenew_noti"],  
                              "13" => "13", 
                              "14" => "14", 
                              "15" => "NOTIFICATION")); 

                              //upd lu notifi
                              $stmt = $tams->prepare("UPDATE user_notification  SET lu_noti=1  WHERE id_noti=".$outil["id_noti"]." ");
                              // execute the query
                              $stmt->execute();
  }
  echo(json_encode($outils)); 
}
else
{
  $outils = array();  
    array_push($outils, array("id" => "EMPTY", 
                              "titre" => "EMPTY", 
                              "img1" => "EMPTY", 
                              "img2" => "EMPTY", 
                              "img3" => "EMPTY", 
                              "img4" => "EMPTY", 
                              "ville" => "EMPTY", 
                              "desc" => "EMPTY", 
                              "prix" => "EMPTY", 
                              "time" => "EMPTY", 
                              "11" => "11", 
                              "12" => "12", 
                              "13" => "13", 
                              "14" => "14", 
                              "15" => "NOTIFICATION")); 
  echo(json_encode($outils));
}
?>