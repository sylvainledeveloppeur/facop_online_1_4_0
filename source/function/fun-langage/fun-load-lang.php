<?php @session_start();	

/*****definisson la langue a parti de celle du navigateur si le useur ne choisi pas*******************/
if (!isset($_SESSION['langue_wt']))
{		
$lang=!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ?  explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']):"fr,fr";
	
		$lang= array_map('strtolower', $lang); 
	
}

//tableau des differents type d'abreviations de langue
	$diferen_francai=array('fr','fr-fr','fr-be','fr-ca','fr-lu','fr-ch');
	
	$diferen_anglai=array('en','en-us','en-za','en-bz','en-gb','en-au');
	

//***********teest des langues  lang-***********************************************************************						
	
/*français*/if ( (isset($lang) AND in_array($lang[0],$diferen_francai)) OR (isset($_SESSION['langue_wt']) AND $_SESSION['langue_wt']=='fr') )
		   {
			   $_SESSION['langue_wt']='fr';
					$dir = "source/function/fun-langage/fr/" ;//selection du dossier
	  
					  if (is_dir($dir))//verifier si c'est bien un dossier 
					  {
						  if ($dh = opendir($dir))
						  {
				
							 while (($file = readdir($dh)) !== false) //lisons et classons son contenu
							 {
	  
								if(filetype($dir . $file)=='file')
								{
									 require("fr/".$file); //inclure tous les fichiers du dossier "fr" dans la page
								}
							  }
						   closedir($dh) ;
						   }
		 
					   }
					   else {echo 'Dossier introuvable "fr" ';}
		   }
/*anglais*/elseif ( (isset($lang) AND in_array($lang[0],$diferen_anglai)) OR (isset($_SESSION['langue_wt']) AND $_SESSION['langue_wt']=='en'))
		   {
			   $_SESSION['langue_wt']='en';
					$dir = "source/function/fun-langage/en/" ;//selection du dossier
	  
					  if (is_dir($dir))//verifier si c'est bien un dossier 
					  {
						  if ($dh = opendir($dir))
						  {
				
							 while (($file = readdir($dh)) !== false) //lisons et classons son contenu
							 {
	  
								if(filetype($dir . $file)=='file')
								{
									 require("en/".$file); //inclure tous les fichiers du dossier "en" dans la page
								}
							  }
						   closedir($dh) ;
						   }
		 
					   }
					   else {echo 'Dossier introuvable "en" ';}
		   }
/*anglais*/else
		   {
			    $_SESSION['langue_wt']='en';
					$dir = "source/function/fun-langage/en/" ;//selection du dossier
	  
					  if (is_dir($dir))//verifier si c'est bien un dossier 
					  {
						  if ($dh = opendir($dir))
						  {
				
							 while (($file = readdir($dh)) !== false) //lisons et classons son contenu
							 {
	  
								if(filetype($dir . $file)=='file')
								{
									 require("en/".$file); //inclure tous les fichiers du dossier "en" dans la page
								}
							  }
						   closedir($dh) ;
						   }
		 
					   }
					   else {echo 'Dossier introuvable "en" ';}
		   }

?>