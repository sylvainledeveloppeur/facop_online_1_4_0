<?php  date_default_timezone_set("Africa/Douala");
/*****last modify: 17-06-2021*/
/*****website: pidaf*/
class DefaultClass
{
   protected $tab_day_en  =  array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
   protected $tab_day_fr =  array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	 
   protected $tab_month_en= array("January","February","March","Apri","May","June","July","August","September","October","November","December");
   protected $tab_month_fr =  array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
	
	
	//detect if img existe***************************************************************************
		/*  '.$defaultClass_OB->existe_img('source/img/article/'.$done['img_arti']).' */
	public function existe_img($chemin)
	{
		// Browser Detection
      if(is_file($chemin))
	    $chemin=$chemin;
		else
		$chemin='source/img/no_img.jpg';
		
		return $chemin;
	}
	
	//compresser chemin img ou fichier DATA***************************************************************************
	/* $defaultClass_OB->dataURI_encode("img/pub.gif");
	*/
 public	function dataURI_encode($file) {
  // argument devant être un chemin vers le fichier à encoder
  $mime_type = mime_content_type($file);
  $file_binary = file_get_contents($file);
  return 'data:' . $mime_type . ';base64,' . base64_encode( $file_binary );
}
	//detect browser***************************************************************************
		/*if(!empty($_SERVER['HTTP_USER_AGENT']))
				{
					
					$TheBS=$defaultClass_OB-> DetectBS($tams,$defaultClass_OB,$_SERVER['HTTP_USER_AGENT']);
				}
				else{
					
					$TheBS=$defaultClass_OB->DetectBS($tams,$defaultClass_OB,0);
				}*/
	public function DetectBS($tams,$defaultClass_OB,$agent)
	{
		// Browser Detection
if(preg_match('/Firefox/i',$agent)) $bs = 'Firefox'; 
elseif(preg_match('/Mac/i',$agent)) $bs = 'Mac';
elseif(preg_match('/Chrome/i',$agent)) $bs = 'Chrome'; 
elseif(preg_match('/Opera/i',$agent)) $bs = 'Opera'; 
elseif(preg_match('/MSIE/i',$agent)) $bs = 'IE'; 
else $bs = 'Unknown';
	
		return $bs;
	}
	
	
	
	
	
	//detect operating systeme***************************************************************************
		/*if(!empty($_SERVER['HTTP_USER_AGENT']))
				{
					
					$TheOS=$defaultClass_OB-> DetectOS($tams,$defaultClass_OB,$_SERVER['HTTP_USER_AGENT']);
				}
				else{
					
					$TheOS=$defaultClass_OB->DetectOS($tams,$defaultClass_OB,0);
				}*/
	public function DetectOS($tams,$defaultClass_OB,$agent)
	{
		// Detect Device/Operating System - $agent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/Linux/i',$agent)) $os = 'Linux';
elseif(preg_match('/Mac/i',$agent)) $os = 'Mac'; 
elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone'; 
elseif(preg_match('/iPad/i',$agent)) $os = 'iPad'; 
elseif(preg_match('/Droid/i',$agent)) $os = 'Droid'; 
elseif(preg_match('/Unix/i',$agent)) $os = 'Unix'; 
elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
else $os = 'Unknown';
	
		return $os;
	}
	
	
	//insert visite***************************************************************************
	/*if(!empty($_SERVER['REMOTE_ADDR']))
				{
					
					$defaultClass_OB->InserVisite($tams,$defaultClass_OB,$_SERVER['REMOTE_ADDR'],dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
				}
				else{
					
					//$defaultClass_OB->InserVisite($tams,$defaultClass_OB,0);
				}*/
	public function InserVisite($tams,$defaultClass_OB,$ip,$page,$devise,$TheOS,$TheBS)
	{
				if(!empty($ip) AND !empty($page) AND !empty($tams))				
				{
					// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
					/**/
		   $nbr_pseudo1=$tams->prepare("SELECT COUNT(id_vis) nbr FROM _admin_visite WHERE ip_vis=:ip  " );
           $nbr_pseudo1->execute(array("ip"=>$ip));
           $chif_pse1=$nbr_pseudo1->fetch();
					

								  if ($chif_pse1['nbr'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
								  {
								  $req=$tams->prepare('INSERT INTO _admin_visite (ip_vis,online_vis,devise_vis,datevist1_vis,datevist2_vis,page_vis,os_vis,bs_vis) 
												   VALUES (?,?,?,NOW(),NOW(),?,?,? ) ');

									 $inser=$req->execute(array($ip,time(),$devise,$page,$TheOS,$TheBS));

								  }
								  else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
								  {
								   $tams->query('UPDATE _admin_visite SET datevist2_vis=NOW(),online_vis='.time().',devise_vis=\'' .$devise. '\',page_vis=\'' .$page. '\',os_vis=\'' .$TheOS. '\',bs_vis=\'' .$TheBS. '\' WHERE ip_vis=\'' . $ip. '\' ');
								  }
									
				}
		
	}
	//nbre membre enligne***************************************************************************
	/*if(!empty($_SERVER['REMOTE_ADDR']))
				{
					
					$defaultClass_OB->SnbOnligne($tams,$defaultClass_OB,$_SERVER['REMOTE_ADDR']);
				}
				else{
					
					$defaultClass_OB->SnbOnligne($tams,$defaultClass_OB,0);
				}*/
	public function SnbOnligne($tams,$defaultClass_OB,$ip)
	{
				if(!empty($ip) )				
				{
					// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
					/**/
		   $nbr_pseudo1=$tams->prepare("SELECT COUNT(id_enl) nbr FROM _admin_enligne WHERE ip_user_enl=:ip  " );
           $nbr_pseudo1->execute(array("ip"=>$ip));
           $chif_pse1=$nbr_pseudo1->fetch();
					

								  if ($chif_pse1['nbr'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
								  {
								  $req=$tams->prepare('INSERT INTO _admin_enligne (ip_user_enl,date_enl,date2_enl) 
												   VALUES (?,?,NOW() ) ');

									 $inser=$req->execute(array($ip,time()));

								  }
								  else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
								  {
								   $tams->query('UPDATE _admin_enligne SET date_enl=' . time() . ' WHERE ip_user_enl=\'' . $ip. '\' ');
								  }
									// ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.
							$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
							$tams->query('DELETE FROM _admin_enligne WHERE  date_enl < ' .$timestamp_5min);
				}
		
						//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_enl) nbr FROM _admin_enligne" ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			  
				echo '<li class="ok_form"> '.$defaultClass_OB->cinder_nombre($chif_pse['nbr'],',').'</li>';
		
		
		
		
	}
	
	
//supprimer caractere speciaux dans une chaine**************************************************************
			public function format_url($chaine) //$des=$defaultClass_OB->format_url("chaine à formater");
			{ 

					// en minuscule
					$chaine=strtolower($chaine);

					// supprime les caracteres speciaux
					$accents = Array("/é/", "/è/", "/ê/","/ë/", "/ç/", "/à/", "/â/","/á/","/ä/","/ã/", "/å/", "/î/", "/ï/", "/í/", "/ì/", "/ù/", "/ô/", "/ò/", "/ó/", "/ö/");
					$sans = Array("e", "e", "e", "e", "c", "a", "a","a", "a","a", "a", "i", "i", "i", "i", "u", "o", "o", "o", "o");
					$chaine = preg_replace($accents, $sans, $chaine);  
					$chaine = preg_replace('#[^A-Za-z0-9]#', '-', $chaine);

				   // Remplace les tirets multiples par un tiret unique
				   $chaine = preg_replace('#\-+#', '-', $chaine );

				   // Supprime le dernier caractère si c'est un tiret
				   $chaine = rtrim( $chaine, '-' );

					while (strpos($chaine,'--') !== false) 
						$chaine = str_replace('--', '-', $chaine);

			return $chaine; 

			}
	
	
//couper une phrase*******************************************************************************************	
	//$defaultClass_OB->cut_mot("La phrase à couper", 0, 80,'');
	public function cut_mot($string, $start, $length, $endStr = '...') 
	 {	 
         //$text2 = cutString2($texteacoupe, 0, 300, '').'... Read more';// a parti du debu 0 on prend 300 caracter
			// si la taille de la chaine est inférieure ou égale à celle
			// attendue on la retourne telle qu'elle
			if( strlen( $string ) <= $length ) return $string;
			// autrement on continue

			// permet de couper la phrase aux caractères définis tout
			// en prenant en compte la taille de votre $endStr et en 
			// re-précisant l'encodage du contenu récupéré
			$str = mb_substr( $string, $start, $length - strlen( $endStr ) + 1, 'UTF-8');
			// retourne la chaîne coupée avant la dernière espace rencontrée
			// à laquelle s'ajoute notre $endStr
			return substr( $str, 0, strrpos( $str,' ') ).$endStr;
     }
	
	
//cinder les nombres en 3 par des . ou , ex: 2864723=2,864,723**************************************************************
			public function cinder_nombre($mo,$poin) //echo $defaultClass_OB->cinder_nombre(864723,',');
	  {
		  $mo=(int)$mo;
		  
		  $un=strlen($mo)>0 ? substr($mo,-1,1):'';
		  $de=strlen($mo)>1 ? substr($mo,-2,1):'';
		  $tr=strlen($mo)>2 ? substr($mo,-3,1):'';
		  $qu=strlen($mo)>3 ? substr($mo,-4,1).$poin:'';
		  $ci=strlen($mo)>4 ? substr($mo,-5,1):'';
		  $si=strlen($mo)>5 ? substr($mo,-6,1):'';
		  $se=strlen($mo)>6 ? substr($mo,-7,1).$poin:'';
		  $hu=strlen($mo)>7 ? substr($mo,-8,1):'';
		  $ne=strlen($mo)>8 ? substr($mo,-9,1):'';
		  $di=strlen($mo)>9 ? substr($mo,-10,1).$poin:'';
		  $on=strlen($mo)>10 ? substr($mo,-11,1):'';
		  $do=strlen($mo)>11 ? substr($mo,-12,1):'';
		  
		  $all=$do.$on.$di.$ne.$hu.$se.$si.$ci.$qu.$tr.$de.$un;
		  
		  return $all;
	  }
	
	
//compter dans bd ***********************************************************************************************************
	public function compte1($tams,$table,$champid,$champnom, $valeur)//$nbrcat=$defaultClass_OB->compte1($tams,"categorie_bao","id_cat","id_cat", $done['id_cat']);
	{
	    $nbr_pseudo=$tams->prepare("SELECT COUNT(".$champid.") nbr FROM ".$table."
		   WHERE ".$champnom."=:pse " ) ;
           $nbr_pseudo->execute(array('pse'=>$valeur));
           $chif_pse=$nbr_pseudo->fetch();
   
		  
	return $chif_pse['nbr'];
    }
	
	
//affiche une date lissible *******************************************************************************************************
			  
			  function goodate($datimee,$le,$a)// $dat="2018-09-08 16:38:25"; $dat=$defaultClass_OB->goodate($dat,'On','at');
			  {
				  $tab=explode(" ",$datimee);
				
				  $ladate=explode("-",$tab[0]);
				  $laheur=explode(":",$tab[1]);
				  
				  $final=$le.' '.$ladate[2].'/'.$ladate[1].'/'.$ladate[0].' '.$a.' '.$laheur[0].':'.$laheur[1].':'.$laheur[2];
				  
				  return $final;
			  }
			  
			  
//affiche une date lissible avec nom de mois et jour *******************************************************************************************************
			  
			  function goodateName($datimee,$le,$a)// $dat="2018-09-08 16:38:25"; $dat=$defaultClass_OB->goodateName($dat,'On','at');
			  {
				  $tab=explode(" ",$datimee);
				
				  $ladate=explode("-",$tab[0]);
				  $laheur=explode(":",$tab[1]);
				  
				  $final=$le.' '.$ladate[2].'/'.self::$tab_month_fr[$ladate[1]].'/'.$ladate[0].' '.$a.' '.$laheur[0].':'.$laheur[1].':'.$laheur[2];
				  
				  return $final;
			  }
	
//Data base insert function ********************************************************************************************************************************
	/*$eta=$BeeClas->beeIn($Bee,$BeeClas,'_admin_visite',
		  'ip_vis,online_vis,devise_vis,datevist1_vis,datevist2_vis,page_vis,os_vis,bs_vis',
		  '?,?,?,NOW(),NOW(),?,?,? ',
		  array('1.1.1.1',time(),'iphone','www.bee4tech.com','phone','Edge'));*/
	         public function beeIn($Bee,$BeeClas,$tab,$champs,$valus,$arrai)
	          {
				
					$req=$Bee->prepare("INSERT INTO $tab ($champs)  VALUES ($valus) ");

					$inser=$req->execute($arrai);

					
		         return $inser? true:false;
	           }
	
//Data base select function ********************************************************************************************************************************
	/*$eta=$BeeClas->beeIn($Bee,$BeeClas,'_admin_visite',
		  'ip_vis,online_vis,devise_vis,datevist1_vis,datevist2_vis,page_vis,os_vis,bs_vis',
		  '?,?,?,NOW(),NOW(),?,?,? ',
		  array('1.1.1.1',time(),'iphone','www.bee4tech.com','phone','Edge'));*/
	     /*    public function beeSel($Bee,$BeeClas,$tab,$valus)
	          {
				
					$req=$Bee->query("SELECT * FROM $tab ");

					while($done=$req->fetch())
					{
						echo $valus;
					}

					
		         return $req? true:false;
	           }*/
	
	
//Data base insert function ***************************************************************************
	
	          public function dbInsert($tams,$defaultClass_OB,$ip)/*if(!empty($_SERVER['REMOTE_ADDR']))*/
	          {
				if(!empty($ip) )				
				{
					// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
					/**/
		   $nbr_pseudo1=$tams->prepare("SELECT COUNT(id_enl) nbr FROM _admin_enligne WHERE ip_user_enl=:ip  " );
           $nbr_pseudo1->execute(array("ip"=>$ip));
           $chif_pse1=$nbr_pseudo1->fetch();
					

								  if ($chif_pse1['nbr'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
								  {
								  $req=$tams->prepare('INSERT INTO _admin_enligne (ip_user_enl,date_enl,date2_enl) 
												   VALUES (?,?,NOW() ) ');

									 $inser=$req->execute(array($ip,time()));

								  }
								  else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
								  {
								   $tams->query('UPDATE _admin_enligne SET date_enl=' . time() . ' WHERE ip_user_enl=\'' . $ip. '\' ');
								  }
									// ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.
							$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
							$tams->query('DELETE FROM _admin_enligne WHERE  date_enl < ' .$timestamp_5min);
				}
		
						//SELECT compter nombre
   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_enl) nbr FROM _admin_enligne" ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
			  
				echo '<li class="ok_form"> '.$defaultClass_OB->cinder_nombre($chif_pse['nbr'],',').'</li>';
		
		
		
		
	           }
    
//show faq *****************************************************************************************
    	   // : $Store->testimo($tams,$defaultClass_OB,4,'<ul class="ultesti pad_top_30 after">','</ul>');
	public function faq($tams,$nbr,$tag1,$tag2)
	{
		  $bloc=$tams->query(" SELECT * FROM faq  ORDER BY RAND() LIMIT $nbr  ");
			
        echo $tag1;
			  while($done=$bloc->fetch())
			  {	
					  
                  echo  '<li class="faqq"><i class="fa fa-plus"></i>	'.$done['ques_fa'].'</li>
		  <li class="faqa">'.$done['rep_fa'].'</li>
                      
                    ';
			  } 
		 echo $tag2;
	}
			  
//upload file pdf doc mp3 mp4 *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->addFil($_FILES['filee'],1000000,'../../../source/img/store/ici/',array(' pdf',' doc',' docx',' avi',' mp4',' mp3',' ogg'));
	public function addFil($Filee,$maxSize,$chemin,$allowed)
    { 
        
        
          if(isset($Filee) && $Filee['error'] == 0 )
          {

                    $extension = pathinfo($Filee['name'], PATHINFO_EXTENSION);

            if(in_array(strtolower($extension), $allowed) )// A list of permitted file extensions
            {
                    if($Filee['size']<=$maxSize  )
                   {
                         $ra=rand(1,900);
                           $Gfile=time().$ra.'.'.$extension;//nom fichier

                          if(@move_uploaded_file($Filee['tmp_name'], $chemin.$Gfile ) )
                          {	
                               return array(1,$Gfile);// tout s'est bien passé
                          }
                          else
                          {
                          exit('<div class="stop_form">"Erreur" Impossible de télécharger le fichier</div>');

                          }
                    }
                    else
                    {
                    exit('<div class="stop_form">"Erreur" Le champ fichier doit être au max 5 Mo</div>');

                    }
              }
              else
              {
              exit('<div class="stop_form">"Erreur" Le champ fichier doit être au format "'.strtoupper(implode(',',$allowed)).'"</div>');

              }

          }
          else
          {
          exit('<div class="stop_form">"Erreur" Le champ fichier est vide</div>');

          }
	
    }		  
	
//upload image png *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->addPng($_FILES['filee'],1000000,'../../../source/img/store/ici/',200,200,300,200,0);
	public function addPng($Filee,$maxSize,$chemin,$wid,$hei,$max,$max2,$carre)
    { 
        
         // A list of permitted file extensions
		 $allowed = array('png');
        
          if(isset($Filee) && $Filee['error'] == 0 )
          {

                    $extension = pathinfo($Filee['name'], PATHINFO_EXTENSION);

            if(in_array(strtolower($extension), $allowed) )
            {
                    if($Filee['size']<=$maxSize  )
                   {
                         $ra=rand(1,900);
                           $Gimg=time().$ra.'.'.$extension;//nom grande img
                           $Mimg=time().$ra.'_min.'.$extension;//nom min img

                          if(@move_uploaded_file($Filee['tmp_name'], $chemin.$Gimg ) )
                          {	
                              
                               //redimention avatar
                                $max = $max;
                                $source=imagecreatefrompng($chemin.$Gimg); // La photo  source
                                //Dimension de l'image pr savoir comment crée la miniatur
                                $x = imagesx($source);
                                $y = imagesy($source);

                                if($x>=$wid AND $y>=$hei)
                                {

                                     if($carre==1)
                                     {
                                         $nx=$wid;
                                         $ny=$hei;
                                     }
                                    else
                                    {
                                              if($x>$max or $y>$max)
                                              {
                                                    if($x>$y)
                                                    {
                                                        $nx = $max;
                                                        $ny = $y/($x/$max);
                                                    }
                                                    else
                                                    {
                                                        $nx = $x/($y/$max);
                                                        $ny = $max;
                                                    }

                                              }
                                              else
                                              {
                                                $nx=$x;
                                                $ny=$y;
                                              }
                                     }
                                    
                                    $destination= imagecreatetruecolor($nx,$ny);
                                    $nx = imagesx($destination);
                                    $ny= imagesy($destination);
                                    //On crée l'avatar
                                    imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                    $nx, $ny, $x,
                                    $y);
                                    // On enregistre l'avatar avec le meme nom pour remplace l'ancien
                                    if(imagepng($destination, $chemin.$Gimg))
                                    {
                                        

                                                          if($carre==1)
                                                       {
                                                           $nx=200;
                                                           $ny=200;
                                                       }
                                                      else
                                                      {
                                                                if($x>$max2 or $y>$max2)
                                                                {
                                                                      if($x>$y)
                                                                      {
                                                                          $nx = $max2;
                                                                          $ny = $y/($x/$max2);
                                                                      }
                                                                      else
                                                                      {
                                                                          $nx = $x/($y/$max2);
                                                                          $ny = $max2;
                                                                      }

                                                                }
                                                                else
                                                                {
                                                                  $nx=$x;
                                                                  $ny=$y;
                                                                }
                                                       }

                                                      $destination= imagecreatetruecolor($nx,$ny);
                                                      $nx = imagesx($destination);
                                                      $ny= imagesy($destination);
                                                      //On crée l'avatar
                                                      imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                                      $nx, $ny, $x,
                                                      $y);
                                                      // On enregistre l'avatar miniature
                                                      imagepng($destination, $chemin.$Mimg);
                                        
                                        
                                        
                                        return array(1,$Gimg,$Mimg);// tout s'est bien passé
                                    }
                                    else
                                    {
                                    exit('<div class="stop_form">"Erreur" La redimension de l\image à échoué</div>');

                                    }
                                    
                                    
                                   
                                }
                                else
                                {
                                    @unlink($chemin.$Gimg);
                                exit('<div class="stop_form">"Erreur" Votre image est trop petite</div>');

                                }
                          }
                          else
                          {
                          exit('<div class="stop_form">"Erreur" Impossible de télécharger l\'image</div>');

                          }
                    }
                    else
                    {
                    exit('<div class="stop_form">"Erreur" Le champ image doit être au max 1 Mo</div>');

                    }
              }
              else
              {
              exit('<div class="stop_form">"Erreur" Le champ image doit être au format "PNG"</div>');

              }

          }
          else
          {
          exit('<div class="stop_form">"Erreur" Le champ image est vide</div>');

          }
    }
    
   
//upload image jpg *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->addJpg($_FILES['filee'],1000000,'../../../source/img/store/ici/',400,400,300,200,0);
	public function addJpg($Filee,$maxSize,$chemin,$wid,$hei,$max,$max2,$carre){ 
        
         // A list of permitted file extensions
		 $allowed = array('jpg','jpeg');
        
          if(isset($Filee) && $Filee['error'] == 0 )
          {

                    $extension = pathinfo($Filee['name'], PATHINFO_EXTENSION);

            if(in_array(strtolower($extension), $allowed) )
            {
                    if($Filee['size']<=$maxSize  )
                   {
                        $ra=rand(1,900);
                           $Gimg=time().$ra.'.'.$extension;//nom grande img
                           $Mimg=time().$ra.'_min.'.$extension;//nom min img

                          if(@move_uploaded_file($Filee['tmp_name'], $chemin.$Gimg ) )
                          {	
                               //redimention avatar
                                $max = $max;
                                $source=imagecreatefromjpeg($chemin.$Gimg); // La photo  source
                                //Dimension de l'image pr savoir comment crée la miniatur
                                $x = imagesx($source);
                                $y = imagesy($source);

                                if($x>=$wid AND $y>=$hei)
                                {

                                     if($carre==1)
                                     {
                                         $nx=$wid;
                                         $ny=$hei;
                                     }
                                    else
                                    {
                                              if($x>$max or $y>$max)
                                              {
                                                    if($x>$y)
                                                    {
                                                        $nx = $max;
                                                        $ny = $y/($x/$max);
                                                    }
                                                    else
                                                    {
                                                        $nx = $x/($y/$max);
                                                        $ny = $max;
                                                    }

                                              }
                                              else
                                              {
                                                $nx=$x;
                                                $ny=$y;
                                              }
                                     }
                                    
                                    $destination= imagecreatetruecolor($nx,$ny);
                                    $nx = imagesx($destination);
                                    $ny= imagesy($destination);
                                    //On crée l'avatar
                                    imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                    $nx, $ny, $x,
                                    $y);
                                    // On enregistre l'avatar avec le meme nom pour remplace l'ancien
                                    if(imagejpeg($destination, $chemin.$Gimg))
                                    {
                                        

                                                          if($carre==1)
                                                       {
                                                           $nx=200;
                                                           $ny=200;
                                                       }
                                                      else
                                                      {
                                                                if($x>$max2 or $y>$max2)
                                                                {
                                                                      if($x>$y)
                                                                      {
                                                                          $nx = $max2;
                                                                          $ny = $y/($x/$max2);
                                                                      }
                                                                      else
                                                                      {
                                                                          $nx = $x/($y/$max2);
                                                                          $ny = $max2;
                                                                      }

                                                                }
                                                                else
                                                                {
                                                                  $nx=$x;
                                                                  $ny=$y;
                                                                }
                                                       }

                                                      $destination= imagecreatetruecolor($nx,$ny);
                                                      $nx = imagesx($destination);
                                                      $ny= imagesy($destination);
                                                      //On crée l'avatar
                                                      imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                                      $nx, $ny, $x,
                                                      $y);
                                                      // On enregistre l'avatar miniature
                                                      imagejpeg($destination, $chemin.$Mimg);
                                        
                                        
                                        
                                        return array(1,$Gimg,$Mimg);// tout s'est bien passé
                                    }
                                    else
                                    {
                                    exit('<div class="stop_form">"Erreur" La redimension de l\image à échoué</div>');

                                    }
                                    
                                    
                                   
                                }
                                else
                                {
                                    @unlink($chemin.$Gimg);
                                exit('<div class="stop_form">"Erreur" Votre image est trop petite</div>');

                                }
                          }
                          else
                          {
                          exit('<div class="stop_form">"Erreur" Impossible de télécharger l\'image</div>');

                          }
                    }
                    else
                    {
                    exit('<div class="stop_form">"Erreur" Le champ image doit être au max 1 Mo</div>');

                    }
              }
              else
              {
              exit('<div class="stop_form">"Erreur" Le champ image doit être au format "JPG, JPEG"</div>');

              }

          }
          else
          {
          exit('<div class="stop_form">"Erreur" Le champ image est vide</div>');

          }
	
}
    
 //upload image gif *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->addGif($_FILES['filee'],1000000,'../../../source/img/store/ici/',400,400,300,200,0);
	public function addGif($Filee,$maxSize,$chemin,$wid,$hei,$max,$max2,$carre){ 
        
         // A list of permitted file extensions
		 $allowed = array('gif');
        
          if(isset($Filee) && $Filee['error'] == 0 )
          {

                    $extension = pathinfo($Filee['name'], PATHINFO_EXTENSION);

            if(in_array(strtolower($extension), $allowed) )
            {
                    if($Filee['size']<=$maxSize  )
                   {
                        $ra=rand(1,900);
                           $Gimg=time().$ra.'.'.$extension;//nom grande img
                           $Mimg=time().$ra.'_min.'.$extension;//nom min img

                          if(@move_uploaded_file($Filee['tmp_name'], $chemin.$Gimg ) )
                          {	
                               //redimention avatar
                                $max = $max;
                                $source=imagecreatefromgif($chemin.$Gimg); // La photo  source
                                //Dimension de l'image pr savoir comment crée la miniatur
                                $x = imagesx($source);
                                $y = imagesy($source);

                                if($x>=$wid AND $y>=$hei)
                                {

                                     if($carre==1)
                                     {
                                         $nx=$wid;
                                         $ny=$hei;
                                     }
                                    else
                                    {
                                              if($x>$max or $y>$max)
                                              {
                                                    if($x>$y)
                                                    {
                                                        $nx = $max;
                                                        $ny = $y/($x/$max);
                                                    }
                                                    else
                                                    {
                                                        $nx = $x/($y/$max);
                                                        $ny = $max;
                                                    }

                                              }
                                              else
                                              {
                                                $nx=$x;
                                                $ny=$y;
                                              }
                                     }
                                    
                                    $destination= imagecreatetruecolor($nx,$ny);
                                    $nx = imagesx($destination);
                                    $ny= imagesy($destination);
                                    //On crée l'avatar
                                    imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                    $nx, $ny, $x,
                                    $y);
                                    // On enregistre l'avatar avec le meme nom pour remplace l'ancien
                                    if(imagegif($destination, $chemin.$Gimg))
                                    {
                                        

                                                          if($carre==1)
                                                       {
                                                           $nx=200;
                                                           $ny=200;
                                                       }
                                                      else
                                                      {
                                                                if($x>$max2 or $y>$max2)
                                                                {
                                                                      if($x>$y)
                                                                      {
                                                                          $nx = $max2;
                                                                          $ny = $y/($x/$max2);
                                                                      }
                                                                      else
                                                                      {
                                                                          $nx = $x/($y/$max2);
                                                                          $ny = $max2;
                                                                      }

                                                                }
                                                                else
                                                                {
                                                                  $nx=$x;
                                                                  $ny=$y;
                                                                }
                                                       }

                                                      $destination= imagecreatetruecolor($nx,$ny);
                                                      $nx = imagesx($destination);
                                                      $ny= imagesy($destination);
                                                      //On crée l'avatar
                                                      imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                                      $nx, $ny, $x,
                                                      $y);
                                                      // On enregistre l'avatar miniature
                                                      imagegif($destination, $chemin.$Mimg);
                                        
                                        
                                        
                                        return array(1,$Gimg,$Mimg);// tout s'est bien passé
                                    }
                                    else
                                    {
                                    exit('<div class="stop_form">"Erreur" La redimension de l\image à échoué</div>');

                                    }
                                    
                                    
                                   
                                }
                                else
                                {
                                    @unlink($chemin.$Gimg);
                                exit('<div class="stop_form">"Erreur" Votre image est trop petite</div>');

                                }
                          }
                          else
                          {
                          exit('<div class="stop_form">"Erreur" Impossible de télécharger l\'image</div>');

                          }
                    }
                    else
                    {
                    exit('<div class="stop_form">"Erreur" Le champ image doit être au max 1 Mo</div>');

                    }
              }
              else
              {
              exit('<div class="stop_form">"Erreur" Le champ image doit être au format "Gif"</div>');

              }

          }
          else
          {
          exit('<div class="stop_form">"Erreur" Le champ image est vide</div>');

          }
	
}
    
 //upload ALL image  *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->addJpg($_FILES['filee'],1000000,'../../../source/img/store/ici/',400,400,300,200,0);
	public function addImg($Filee,$maxSize,$chemin,$wid,$hei,$max,$max2,$carre){ 
        
         // A list of permitted file extensions
		 $allowed = array('jpg','png','jpeg','gif');
        
          if(isset($Filee) && $Filee['error'] == 0 )
          {

                    $extension = pathinfo($Filee['name'], PATHINFO_EXTENSION);

            if(in_array(strtolower($extension), $allowed) )
            {
                    if($Filee['size']<=$maxSize  )
                   {
                        $ra=rand(1,900);
                        
                           $GGimg=time().$ra.'.'.$extension;//nom grande img
                           $MMimg=time().$ra.'_min.'.$extension;//nom min img
                           $Gimg=time().$ra.'.'.$extension;//nom grande img
                           $Mimg=time().$ra.'_min.'.$extension;//nom min img

                          if(@move_uploaded_file($Filee['tmp_name'], $chemin.$Gimg ) )
                          {	
                               //redimention avatar
                                $max = $max;
                              
                              if($extension=='jpg' OR $extension=='jpeg')
                              {$source=imagecreatefromjpeg($chemin.$Gimg); }// La photo  source
                              elseif($extension=='png')
                              {$source=imagecreatefrompng($chemin.$Gimg); }// La photo  source
                              elseif($extension=='gif')
                              {$source=imagecreatefromgif($chemin.$Gimg); }// La photo  source
                                
                                  if($extension!='jpg' OR $extension!='jpeg')
                              {@unlink($chemin.$Gimg); }// sup la 1er image uploadé
                              
                                //Dimension de l'image pr savoir comment crée la miniatur
                                $x = imagesx($source);
                                $y = imagesy($source);

                                if($x>=$wid AND $y>=$hei)
                                {

                                     if($carre==1)
                                     {
                                         $nx=$wid;
                                         $ny=$hei;
                                     }
                                    else
                                    {
                                              if($x>$max or $y>$max)
                                              {
                                                    if($x>$y)
                                                    {
                                                        $nx = $max;
                                                        $ny = $y/($x/$max);
                                                    }
                                                    else
                                                    {
                                                        $nx = $x/($y/$max);
                                                        $ny = $max;
                                                    }

                                              }
                                              else
                                              {
                                                $nx=$x;
                                                $ny=$y;
                                              }
                                     }
                                    
                                    $destination= imagecreatetruecolor($nx,$ny);
                                    $nx = imagesx($destination);
                                    $ny= imagesy($destination);
                                    //On crée l'avatar
                                    imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                    $nx, $ny, $x,
                                    $y);
                                    // On enregistre l'avatar avec le meme nom pour remplace l'ancien
                                    if(imagejpeg($destination, $chemin.$GGimg))
                                    {
                                        
                               
                                                          if($carre==1)
                                                       {
                                                           $nx=200;
                                                           $ny=200;
                                                       }
                                                      else
                                                      {
                                                                if($x>$max2 or $y>$max2)
                                                                {
                                                                      if($x>$y)
                                                                      {
                                                                          $nx = $max2;
                                                                          $ny = $y/($x/$max2);
                                                                      }
                                                                      else
                                                                      {
                                                                          $nx = $x/($y/$max2);
                                                                          $ny = $max2;
                                                                      }

                                                                }
                                                                else
                                                                {
                                                                  $nx=$x;
                                                                  $ny=$y;
                                                                }
                                                       }

                                                      $destination= imagecreatetruecolor($nx,$ny);
                                                      $nx = imagesx($destination);
                                                      $ny= imagesy($destination);
                                                      //On crée l'avatar
                                                      imagecopyresampled ($destination, $source, 0, 0, 0, 0,
                                                      $nx, $ny, $x,
                                                      $y);
                                                      // On enregistre l'avatar miniature
                                                      imagejpeg($destination, $chemin.$MMimg);
                                        
                                     
                                       
                                        
                                        
                                        return array(1,$Gimg,$Mimg);// tout s'est bien passé
                                    }
                                    else
                                    {
                                    exit('<div class="stop_form">"Erreur" La redimension de l\image à échoué</div>');

                                    }
                                    
                                    
                                   
                                }
                                else
                                {
                                    @unlink($chemin.$Gimg);
                                exit('<div class="stop_form">"Erreur" Votre image est trop petite</div>');

                                }
                          }
                          else
                          {
                          exit('<div class="stop_form">"Erreur" Impossible de télécharger l\'image</div>');

                          }
                    }
                    else
                    {
                    exit('<div class="stop_form">"Erreur" Le champ image doit être au max 1 Mo</div>');

                    }
              }
              else
              {
              exit('<div class="stop_form">"Erreur" Le champ image doit être au format "'.strtoupper(implode(',',$allowed)).'"</div>');

              }

          }
          else
          {
          exit('<div class="stop_form">"Erreur" Le champ image est vide</div>');

          }
	
}
  
//creat a token  *****************************************************************************************
    	   // $reSu=@$defaultClass_OB->toKen(20,'a1A');
	public function toKen($nb,$typ){ 
        
                  $tab1=array("a","b","c","d","e","f","g","h","i","j","k","l","n","m","o","p","q","r","s","t","u","v","w","x","y","z");
                  $tab2=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","T","U","V","W","X","Y","Z");
                  $tab3=array(0,1,2,3,4,5,6,7,8,9);

                  $token="";
        
        if($typ=='a1A')
        {
                  for($i=0;$i<$nb;$i++)
                  {
                      $token.=$tab1[rand(0,25)];
                      $token.=$tab3[rand(0,9)];
                      $token.=$tab2[rand(0,25)];
                  }
        }
          else if($typ=='a')
        {
                  for($i=0;$i<$nb;$i++)
                  {
                      $token.=$tab1[rand(0,25)];
                  }
        }
          else if($typ=='1')
        {
                  for($i=0;$i<$nb;$i++)
                  {
                      $token.=$tab3[rand(0,9)];
                  }
        }
          else if($typ=='A')
        {
                  for($i=0;$i<$nb;$i++)
                  {
                      $token.=$tab2[rand(0,25)];
                  }
        }
        
	return $token;
}
             
    
//sent email  *****************************************************************************************
    /*
   $token=@$defaultClass_OB->toKen(10,'a1A');
    $autor="PIDAF";
    $url="www.pidaf.com";
     $thelink='http://pidaf.bee4tech.com/index.php?b=logpatner.forgot.logpatner&o=2&t='.$token.'&m='.$mai.'';
     $message_txt1 = "Message from ".$url;
     $message_html1 = '
                              <div id="thebod" style="background-color: white;margin: 30px auto 0;width: 65%;border-radius: 5px;overflow: hidden;">
                                <div class="hea" style="background-color: #d0d0d0;min-height: 160px;text-align: center;">
                                  <img src=" http://pidaf.bee4tech.com/source/img/logo/logo.png" alt="" width="199" height="60"> 
                                  <h1 style="background-color: #dbd9d9;width: 50%;margin: 46px auto 10px;color: #383d42;">Mot de passe oublié</h1>
                                  </div>
                              <div class="cor" style="padding: 70px 30px;line-height: 1.5;font-size: 16px;color: #2c3033;">

                                  Hey <strong>'.$mai.'</strong>,<br><br>
                              Nous avons reçu une demande de modification de votre mot de passe. Veuillez poursuivre en clickant sur ce lien <a href="'.$thelink.'" style="display: inline-block;background-color: #3d90fb;padding: 4px 6px;border-radius: 5px;color: white;text-decoration: none;font-weight: bold;">Modifier mon mot de passe</a> ou en utilisant le lien suivant dans votre navigateur  <em>'.$thelink.'</em>. Ce lien est valable pour 24 heures.<br><br>

                               Nous restons à votre disposition.<br><br>

                                  Cordialement,<br><br>

                                  <strong>'.$autor.'</strong>
                                  </div>
                                <div class="foot" style="text-align: center;background-color: #3c3c3c;color: white;padding: 20px 0;">
                                  <div>Kinshasa, RDC</div>
                                    <p>hjc.sad@gmail.com - www.pidaf.com</p>
                                    <p>Suivez-nous sur les réseaux sociaux: Facebook - Twitter - Youtube - LinkedIn</p>
                                    <p>Copyright (C) 2021 Pidaf.com All rights reserved</p>
                                </div>
                              </div>
';
    */
    	   // $reSu=@$defaultClass_OB->senMail("Mot de passe oublié",$autor,$mai,"no_reply@pidaf.com",$mai,$tams,$message_html1,$message_txt1);
	public  function senMail($sujet,$autor,$clien,$mailSender,$mailClien,$tams,$message_html1,$message_txt1)
            {
                                    

               
                

                        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailClien)) // On filtre les serveurs qui rencontrent des bogues.
                        {
                            $passage_ligne = "\r\n";
                        }
                        else
                        {
                            $passage_ligne = "\n";
                        }
                        //=====Déclaration des messages au format texte et au format HTML.
                        $message_txt = $message_txt1;
                        $message_html = '<!doctype html>
                              <html data-lt-installed="true"><head>
                              <meta charset="utf-8">
                              <title>Email</title>
                              <meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202">
                               <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                               <style> @media screen and (max-width:480px)
                                    {
                                        #thebod{
                                           width: 93% !important;
                                        }
                                        
                                    }</style>
                              </head>

                              <body cz-shortcut-listen="true" style="padding-top: 30px;padding-bottom: 50px;background-color: #e6e6e6;">
                              
                              '.$message_html1.'

                              </body></html>';
                        //==========

                        //=====Création de la boundary
                        $boundary = "-----=".sha1(rand());
                        //==========

                        //=====Définition du sujet.
                        $sujet = $sujet;
                        //=========

                        //=====Création du header de l'e-mail.
                        $header = "From: \"".$autor."\"<".$mailSender.">".$passage_ligne;//Le nom de l’expéditeur de dois pas présenter d'espace, c'est surement pour cette raison que ton code ne marchais pas.
                        $header.= "Reply-to: \"".$autor."\" <".$mailSender.">".$passage_ligne;
                        $header.= "MIME-Version: 1.0".$passage_ligne;
                        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
                        //==========

                        //=====Création du message.
                        $message = $passage_ligne.$boundary.$passage_ligne;
                        //=====Ajout du message au format texte.
                        $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_txt.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary.$passage_ligne;
                        //=====Ajout du message au format HTML
                        $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_html.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        //==========

                        //=====Envoi de l'e-mail.
                        $eta=mail($mailClien,$sujet,$message,$header);
                        //==========


                           if($eta)
                            {
                                 $etaa=true;
                            }
                            else
                            {

                                $etaa=false;
                            }

          return $etaa;

            }
	
	   // $reSu=@$defaultClass_OB->senMailWhois("Mot de passe oublié",$autor,$mai,"no_reply@pidaf.com",$mai,$tams,$message_html1,$message_txt1);
	public  function senMailWhois($sujet,$autor,$clien,$mailSender,$mailClien,$tams,$message_html1,$message_txt1)
            {
                                    

               
                

                        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailClien)) // On filtre les serveurs qui rencontrent des bogues.
                        {
                            $passage_ligne = "\r\n";
                        }
                        else
                        {
                            $passage_ligne = "\n";
                        }
                        //=====Déclaration des messages au format texte et au format HTML.
                        $message_txt = $message_txt1;
                        $message_html = '<!doctype html>
                              <html data-lt-installed="true"><head>
                              <meta charset="utf-8">
                              <title>Email</title>
                              <meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202"><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.202">
                               <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                               <style> @media screen and (max-width:480px)
                                    {
                                        #thebod{
                                           width: 93% !important;
                                        }
                                        
                                    }</style>
                              </head>

                              <body cz-shortcut-listen="true" style="padding-top: 30px;padding-bottom: 50px;background-color: #e6e6e6;">
                              
                              '.$message_html1.'

                              </body></html>';
                        //==========

                        //=====Création de la boundary
                        $boundary = "-----=".sha1(rand());
                        //==========

                        //=====Définition du sujet.
                        $sujet = $sujet;
                        //=========

                        //=====Création du header de l'e-mail.
                        $header = "From: \"".$autor."\"<".$mailSender.">".$passage_ligne;//Le nom de l’expéditeur de dois pas présenter d'espace, c'est surement pour cette raison que ton code ne marchais pas.
                        $header.= "Reply-to: \"".$autor."\" <".$mailSender.">".$passage_ligne;
                        $header.= "MIME-Version: 1.0".$passage_ligne;
                        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
                        //==========

                        //=====Création du message.
                        $message = $passage_ligne.$boundary.$passage_ligne;
                        //=====Ajout du message au format texte.
                        $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_txt.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary.$passage_ligne;
                        //=====Ajout du message au format HTML
                        $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
                        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                        $message.= $passage_ligne.$message_html.$passage_ligne;
                        //==========
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                        //==========

                        //=====Envoi de l'e-mail.
		
	$from = $mailSender;
    $to = $mailClien;
    $subject = $sujet;
    $body = $message;
		
		$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
		
		$host = "162.215.240.240";  
        $username = "bee4tq4e";
        $password = "Webto899$$";
		
		    $smtp = Mail::factory('smtp',
                    array ('host' => $host,
                    'auth' => "PLAIN",
                    'socket_options' => array('ssl' => array('verify_peer_name' => false)),
                    'username' => $username,
                    'password' => $password));
     
          $eta = $smtp->send($to, $headers, $body);
                        //==========


                           if(PEAR::isError($eta))
                            {
                                 $etaa=false; //$mail->getMessage() 
                            }
                            else
                            {

                                $etaa=true;
                            }

          return $etaa;

            }
    
    //redirect page *****************************************************************************************
    	   // $BClas->redirectPg($page);
	public function redirectPg($page)
	{
     echo "<div class='s_resul'>Redirection in progress...<div>";
     echo "<script>window.location.assign('".$page."')</script>";
        
	}
        public function redirectPg2($page)
        {
         echo "<script>window.location.assign('".$page."')</script>";

        }
    
  //redirect page in second *****************************************************************************************
    	   //  $BClas->redirectPgT("index.php?b=user.vendre.user",30000);
	public function redirectPgT($page,$sec)
	{
     echo "<div class='s_resul'>Redirection in progress...<div>";
     echo '<script> window.setTimeout("location=(\''.$page.'\');",'.$sec.') </script>';
        
	}
        public function redirectPgT2($page,$sec)
        {
         echo '<script> window.setTimeout("location=(\''.$page.'\');",'.$sec.') </script>';

        }

//show info *****************************************************************************************
    	   //   $BClas->showInfo('<h2>Felicitation</h2><p>Veuillez confirmer votre address email.email ci-après <span>'.$_POST['mai'].'</span>. Verifier aussi le dossier <span>spam</span></p>');
	public function showInfo($tex)
	{
            echo '<script>
                document.getElementById("poptex").innerHTML="'.$tex.'";
                document.getElementById("popnoti").style.display="block";
                </script>';
        
	}
//reset form *****************************************************************************************
    	   //   $BClas->resetFo();
	public function resetFo()
	{
            echo '<script>
                    document.getElementById("logfo").reset();
                    document.querySelector(".resfo").reset();
                    </script>';
        
	}
    	   //   $BClas->resetFo($id);
	public function resetFo2($id)
	{
            echo '<script>
                    document.getElementById("'.$id.'").reset();
                    </script>';
        
	} 

//insert historic user *****************************************************************************************
    	   //   $BClas->historicUser($tams,25,'Henry','bilo@gmail.com','1.0.0.0','Inscription','Henry vient de s inscrire');
	public function historicUser($tams,$id,$nam,$mail,$ip,$motif,$messag)
	{
                //isertion  dans l historique de la db
                 $req=$tams->prepare('INSERT INTO historique_user (id_hu,user, emai, ip ,type, messag,lu,dates ) 
                                                     VALUES (?,?,?,?,?,?,?,NOW()) ');
                 $inser=$req->execute(array($id,$nam,$mail,$ip,$motif,$messag,0));

	}


//show word  *****************************************************************************************    
    //----------- show action information---------$BClas->echoo(0,'error');
    public  function echoo($eta,$text) 
    {
          if($eta==1)
        { echo '<div class="ok_form">'.$text.'</div>';}
          else
        { echo '<div class="stop_form">'.$text.'</div>';}



    }    


// time ago _____ $BClas->time_Ago(strtotime($done['phpdate_pro']),"fr");  $time_ago = strtotime("02-10-2022"); $BClas->time_Ago($time_ago) . "\n";
	   public function time_ago($time,$lang) {

		
	// Calculate difference between current
	// time and given timestamp in seconds
	$diff	 = time()-$time;
	
	// Time difference in seconds
	$sec	 = $diff;
	
	// Convert time difference in minutes
	$min	 = round($diff / 60 );
	
	// Convert time difference in hours
	$hrs	 = round($diff / 3600);
	
	// Convert time difference in days
	$days	 = round($diff / 86400 );
	
	// Convert time difference in weeks
	$weeks	 = round($diff / 604800);
	
	// Convert time difference in months
	$mnths	 = round($diff / 2600640 );
	
	// Convert time difference in years
	$yrs	 = round($diff / 31207680 );
	
	// Check for seconds
	if($sec <= 60) {
	      return   $lang=="fr" ? "Il y a $sec secondes" : "$sec seconds ago";
	}
	
	// Check for minutes
	else if($min <= 60) {
		if($min==1) {
			  return $lang=="fr" ? "Il y a 1 minute" : "1 minute ago";
		}
		else {
		      return  $lang=="fr" ? "Il y a $min minutes" : "$min minutes ago";
		}
	}
	
	// Check for hours
	else if($hrs <= 24) {
		if($hrs == 1) {
		      return   $lang=="fr" ? "Il y a 1 heure" : "1 hour ago";
		}
		else {
		      return   $lang=="fr" ? "Il y a $hrs heures" : "$hrs hours ago";
		}
	}
	
	// Check for days
	else if($days <= 7) {
		if($days == 1) {
		      return "Yesterday";
		}
		else {
		      return "$days days ago";
		}
	}
	
	// Check for weeks
	else if($weeks <= 4.3) {
		if($weeks == 1) {
		      return "a week ago";
		}
		else {
		      return "$weeks weeks ago";
		}
	}
	
	// Check for months
	else if($mnths <= 12) {
		if($mnths == 1) {
		      return "a month ago";
		}
		else {
		      return "$mnths months ago";
		}
	}
	
	// Check for years
	else {
		if($yrs == 1) {
		      return "one year ago";
		}
		else {
		      return "$yrs years ago";
		}
	}
}
    
    
	
}//end class

$defaultClass_OB=new DefaultClass();
$BeeClas=$defaultClass_OB;
$BClas=$defaultClass_OB;



