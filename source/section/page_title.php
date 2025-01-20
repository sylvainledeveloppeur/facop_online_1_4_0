<?php 


//titres des differentes page
$title_array=array(
	
      "hi"=>"FACOP: Formation en entrepreneuriat et leadership en ligne",
      "service"=>"Our services",
      "project"=>"Nos services",
      "testimony"=>"Témoignages",
      "us"=>"Apropos de nous",
      "contact"=>"Nos contacts",
      "blog"=>"Blog",
      "blog_uno"=>"Blog",
	  "train"=>"Nos formations",
	  "pack"=>"Fiche formation",
	  "mlm"=>"Le MLM chez FACOP",
	  "certificat"=>"Obtenir une Certification FACOP",
	  "pdf"=>"Lecteur PDF",
	  "qcm"=>"Quiz",
	  "aide"=>"Centre d'aide",
	  "prix"=>"Prix des formations Facop Online",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
      "legal"=>"Mentions légales",//"Legal notice",
      "policy"=>"Politique de confidentialité",
      "cgu"=>"Conditions générales d'utilisations",
      "cgv"=>"Conditions génerales de vente",
      "faq"=>"Foires aux questions",
      "help"=>"Aides",
      "sitemap"=>"Sitemap",
      "404"=>"404 Page not found!",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  "cours"=>"Mes Cours",
	  "filleul"=>"Mes Filleuls",
	  "book"=>"Mes livres",
	  "parrain"=>"Mon parrain",
	  "bonus"=>"Mes bonus",
	  "retrait"=>"Retrait bonus",
	  "lien"=>"Mon lien",
	  "tree"=>"Mon arbre",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  ""=>"",
	  "forum"=>"Forum",
	  "forum_article"=>"Article",
	  "fiche"=>"Fiche produit",
	  "filter"=>"Filtre",
	  "cart"=>"Mon panier",
	  "service_uni"=>"One Sevice",
	  "search"=>"La recherche",
	  "books"=>"Fiche du livre",
	  "loi"=>"Les textes de lois",
	  "lois"=>"Fiche texte de lois",
	  "information"=>"Vos informations",
	  "email_verified"=>"Vérifiez votre email",
	  "pay"=>"Payement en cour",
	  "notifi"=>"Notification",
	  "mtn"=>"Payement en cour",
	  "post"=>"post",
	  ""=>"",
	  "login"=>"Connexion",
	  "signup"=>"Inscription",
	  "forgot"=>"Mot de passe oublié",
	  ""=>"",
	  "profil"=>"Mon profil",
	  "settings"=>"Paramètre",
	  ""=>"",
	  "mesarticle"=>"Mes articles",
	  "vendre"=>"Vendre",
	  "temoiAdd"=>"Ajouter un témoignage",
	  "temoi"=>"Mes témoignages",
	  "achat"=>"Mes achats",
	  "deviAdd"=>"Devis",
	  "mesdevi"=>"Mes devis",
	  ""=>"",
	  "partnercertifie"=>"Partenairs certifiés",
	  "mesDemand"=>"Mes Demandes",
	  "partenaria"=>"Partenaria",
	  "realisation"=>"Ajouter une réalisation",
	  "mesrealisation"=>"Mes réalisations",
	  ""=>"",
	  ""=>"",
	  ""=>""
);

//les balises meta keyword des pages-------------------------------------
$meta_key=array(
	  "hi"=>" FACOP: Formation en entrepreneuriat et leadership en ligne, hi,Bee4tech, Beetech, Tamstechn",
	  "service"=>"Formation en entrepreneuriat et leadership en ligne",
	  "us"=>"us,Formation en entrepreneuriat et leadership en ligne",
	  "contact"=>"Douala-Bonaberi,",
	  "project"=>"project,billet d'avion",
	  "service_uni"=>"service uni,Location des terrains, ",
	  "pack"=>"us,Formation en entrepreneuriat et leadership en ligne"
	);

//les balises meta description des pages------------------------------------------------
$meta_desc=array(
	  "hi"=>"FACOP: Formation en entrepreneuriat et leadership en ligne,Bee4tech, Beetech, Tamstechn",
	  "service"=>"billet d'avion ? Vous êtes sur la bonne voie...",
	  "us"=>" billet d'avion",
	  "contact"=>"DOUALA BONAMOUSSADI, Cameroun; BP 2442",
	  "project"=>"billet d'avion; Location des terrains;",
	  "pack"=>"us,Formation en entrepreneuriat et leadership en ligne"
	);

//les balises meta description des pages------------------------------------------------
$meta_author="facop.training, beetech";



$table_array=array(
	  "customer"=>"customer_sto",
	"seller"=>"seller_sto",
	"affilier"=>"affilier_sto"
	);
	
	
//les balises meta description des pages------------------------------------------------
$lang_link_array=array(
	  "en"=>"https://www.facop.training/index.php?lang=en",
	"fr"=>"seller_sto",
	"es"=>"affilier_sto"
	);



//verification des variable----------------------------------------------------------
	if(!empty($_GET["sheet"]))
	{
	 $title=array_key_exists($_GET["sheet"],$title_array) ? $title_array[$_GET["sheet"]] : "FALSE TITLE";
	 $title_end=!empty($_GET["d"]) ? " ".$_GET["d"]: "--";

	 $keywords=array_key_exists($_GET["sheet"],$meta_key) ? $meta_key[$_GET["sheet"]] : "FALSE KEYWORDS";
	 $descrip=array_key_exists($_GET["sheet"],$meta_desc) ? $meta_desc[$_GET["sheet"]] : "FALSE DESCRIPTION";
	 $author=!empty($meta_author) ? $meta_author : "FALSE AUTHOR";
	}
	else
	{
		$title=$title_array['hi'];
		$title_end="";

	 $keywords=array_key_exists("hi",$meta_key) ? $meta_key["hi"] : "FALSE KEYWORDS";
	 $descrip=array_key_exists("hi",$meta_desc) ? $meta_desc["hi"] : "FALSE DESCRIPTION";
	 $author=!empty($meta_author) ? $meta_author : "FALSE AUTHOR";
	}


?>