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
  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_his) nbr FROM user_historic_retrai
                                 WHERE  id_user_his=:pse  " ) ;
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

							$query =$tams->query('SELECT * FROM user_historic_retrai WHERE  id_user_his='.$id.'   ORDER BY id_his DESC LIMIT ' . $premierMessageAafficher . ', ' . $nbr_ParPage);
					
  $outils = array(); 
  while ($outil = $query->fetch())  
    array_push($outils, array("id" => $outil["id_his"], 
                              "titre" => $outil["suj_his"], 
                              "img1" => $outil["id_his"], 
                              "img2" => $outil["etat_his"], 
                              "img3" => $outil["id_his"],
                              "img4" => $outil["id_his"], 
                              "ville" => $outil["suj_his"], 
                              "desc" => $outil["desc_his"], 
                              "prix" => $outil["id_his"]." Fcfa",
                              "time" =>  $BClas->time_ago(strtotime($outil["phpdate_his"]),$lang), 
                              "11" => $outil["someout_his"],  
                              "12" => $outil["somenew_his"],  
                              "13" => "13", 
                              "14" => "14", 
                              "15" => "NOTIFICATION")); 
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