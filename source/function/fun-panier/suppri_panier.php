<?php 
require_once("fonctions-panier.php"); 
require_once("panier_php.php");

if(isset($_GET['sc']))
{
	supprimerArticle($_GET["sc"]);
}
elseif(isset($_GET['dc']))
{
	supprimePanier();
}
elseif(isset($_GET['panie_edit']))
{
	modifierQTeArticle($_GET['panie_edit'],$_GET['panie_qte']);
}









?> 