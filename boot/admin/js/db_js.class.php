<?php 

class DBase
{
	private static $_tams;
	private static $_config;
	
	/* public function __construct($db)
     {

		$this->_tams=$this->setDb($db);

	 }*/
	
//----------- Renvoie le tableau des paramètres de connexion a la bd-------------------------------------------------------
	  public static function config() 
	  {
			if (self::$_config == null) 
			{
				
				if(!empty($_GET['chemin']))
					$dossier=$_GET['chemin'];
				else
				    $dossier="../../../config/";
				
				
				  $cheminFichier = $dossier."prod.ini";
				  $cheminFichier=file_exists($cheminFichier)? $cheminFichier: $dossier."dev.ini";
					
				  if (!file_exists($cheminFichier)) 
				  {
					exit ("Aucun fichier de configuration trouvé");
				  }
				  else 
				  {
					self::$_config = parse_ini_file($cheminFichier);
				  }
			}

		return self::$_config;
	  }
	
//-------------connexion a la bd--------------------------------------------------------------------------	
	public  function  base()
	{
		self::$_config=self::config();
		
		if(!empty(self::$_config['host'])  AND !empty(self::$_config['login'])  AND isset(self::$_config['pass']) )
		{
			
			
			try	
				{

				self::$_tams= new PDO (self::$_config['host'],self::$_config['login'],self::$_config['pass'],
									   
									   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
											 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
											 PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING
											))  
					or exit(print_r(self::$_tams->errorInfo(), true));
			/*array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)                //signalées erreurs sous la forme d'exceptions
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);    //Lance une alerte à chaque requête échouée
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Lance une exception à chaque requête échouée	
					*/
				}		
			catch(Exception $e)		
				{			
					
					echo 'Echec de connexion à la Base de donnée<br/>';
					exit('Erreur : '.$e->getMessage());
				}
		
	     
		}
		else
		{
			exit ('Certains paramètres de connexion sont manquants(3)');
		}
		
	return self::$_tams;
	}
	
	
	
	
	
	
	
}

$base=new DBase();

$tams=$base->base();


