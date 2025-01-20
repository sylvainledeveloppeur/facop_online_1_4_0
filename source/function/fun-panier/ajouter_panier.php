<?php 
require_once("fonctions-panier.php"); 
require_once("panier_php.php");


ajouterArticle($_POST["img"],$_POST["prod"],$_POST["priuni"],$_POST["qte"],$_POST["expe"],$_POST["mail"],$_POST["souto"]);

echo ' <script type="text/javascript"> window.setTimeout("location=(\'index.php?b=uno.cart\');",2000) </script>';








?> 