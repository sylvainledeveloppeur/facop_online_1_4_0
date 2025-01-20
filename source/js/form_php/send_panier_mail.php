<?php  @session_start();
 //require_once('source/js/db_2_js.class.php');
	  
//require("source/js/function/fun-panier/fonctions-panier.php");


if(!empty($_SESSION['panier']) AND !empty($_GET['o']) AND $_GET['o']==1)
{

	
if(!empty($_POST['nom']) AND !empty($_POST['pay']) AND !empty($_POST['tel']) AND !empty($_POST['mail']) AND !empty($_POST['vil']) AND !empty($_POST['adr']) AND !empty($_POST['RadioGroup1']))
 {
	  /*enregistre  la commande du client*******************************************************************/	
	$letter="A,B,C,D,E,F,G,H,I,J,K,L,M,N,,O,P,Q,R,S,T,U,V,W,X,Y,Z";
				$letter_exp=explode(",",$letter);
				$ranlet=rand(0,26);
				$ranlet2=rand(0,26);

					 $u=$letter_exp[$ranlet].$letter_exp[$ranlet2];
					 $d=rand(10,99);
					 $t=rand(10,99);
					 $q=rand(10,99);
					 $s=rand(10,99);
					 $numero_comande=$u.$d.$t.date('Y');
                $_SESSION['nbcomand']=$numero_comande;

	$nompag=$_SESSION['nbcomand'];
    $_SESSION['id_cus']=0;

  $_SESSION['pre_cus']='';
  $_SESSION['nom_cus']=$_POST['nom'];
  $_SESSION['pay_cus']=$_POST['pay'];
  $_SESSION['tel_cus']=$_POST['tel'];
 $_SESSION['mail_cus']=$_POST['mail'];

$_SESSION['nomlivrai']=$_POST['nom'];
$_SESSION['adreslivrai']=$_POST['adr'];
$_SESSION['villivrai']=$_POST['vil'];
$_SESSION['reglivrai']='';
$_SESSION['paylivrai']=$_POST['pay'];
$_SESSION['tellivrai']=$_POST['tel'];
$_SESSION['typlivrai']=$_POST['RadioGroup1'];
		
		
	$texte='<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bon de commande N° '.$_SESSION['nbcomand'].'</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="img/png"  href="../../favicon.ico" />
<style type="text/css">
	strong {
	font-weight: bold;
}
	.pagbon {
	border: solid thin;
	min-height: 600px;
	width: 90%;
	margin: 40px auto;
	background-color: white;
	border-radius: 15px;
	/* box-shadow: 0px 0px 2px #333; */
	padding: 50px 100px;
	font-size: 25px;
}
	.blochead::after {
	content: "";
	display: block;
	clear: both;
}
.infosto {
	width: 50%;
	float: left;
	box-sizing: border-box;
	padding: 10px;
	margin-top: 115px;
}
	.infocus {
	float: right;
	width: 40%;
	box-sizing: border-box;
	padding: 10px;
}padding: 10px;
}
	.blochead::after {
	content: "";
	display: block;
	clear: both;
}
	.imgtop {
	width: 35%;
}
	.bontop {
	border: solid thin;
	background-color: #f2f2f2;
	padding: 5px;
	box-sizing: border-box;
	margin-bottom: 15px;
}
	.bonbot {
	/* background-color: aliceblue; */
	border: solid thin #d4e0ea;
	padding: 36px 10px;
	box-sizing: border-box;
}
	.bontit {
	font-weight: bold;
	padding: 36px 5px 2px;
	font-size: 30px;
	border-bottom: solid 3px #d8dade;
	margin-bottom: 25px;
}
	.blocdres {
	border: solid thin #616d7d;
	border-radius: 10px;
	padding: 15px 20px;
	margin: 56px auto;
}
		.blocreg {
	border: solid thin #616d7d;
	border-radius: 10px;
	padding: 15px 20px;
	margin: 56px auto;
}
	.blocprint {
	background-color: antiquewhite;
	/* color: wheat; */
	/* text-align: center; */
	padding-left: 15px;
	border: solid thin;
}
	#print {
	background-color: #35e613;
	border-radius: 5px;
	color: white;
	padding: 1px 17px;
	cursor: pointer;
	border: solid thin black;
	font-size: 20px;
}
	#print:hover {
	color: #000;
}
/*panier*/
	#ocart {
	font-size: 15px;
}
table#ocart tr th {
	border-left: solid thin #d7d7d7;
}
table#ocart tr {
	/* width: 25%; */
	border-bottom: solid thin #ecedf0;
	position: relative;
}
table#ocart tr th:nth-child(1) {
	width: 10%;
}
table#ocart tr th:nth-child(1) img {
	width: 70%;
}
table#ocart tr th:nth-child(2) {
	width: 30%;
}
table#ocart tr th:nth-child(3) {
	width: 10%;
}
table#ocart tr th:nth-child(4) {
	width: 10%;
}
table#ocart tr th:nth-child(5) {
	width: 15%;
}
table#ocart tr th:nth-child(6) {
	width: 20%;
}
table#ocart tbody tr:nth-child(1) {
	background-color: #a3abb3;
	padding: 6px 0 !important;
	color: white;
}
table#ocart tbody tr:nth-child(1) th {
	padding: 10px 0;
}
table#ocart tr:hover {
	background-color: #f3f6fb;
	opacity: 0.6;
}
.onb {
	display: block;
	position: absolute;
	top: 2px;
	left: 0;
	background-color: #edeeef;
	width: 30px;
	height: 30px;
	border-radius: 100%;
	line-height: 2;
	/* color: white; */
	border: solid thin;
	box-shadow: 0px 0px 6px 0px #0006;
}
.osup {
	display: block;
	position: absolute;
	top: 2px;
	right: 0;
	width: 30px;
	height: 30px;
	border-radius: 100%;
	line-height: 2;
	color: #ff3600;
	font-size: 20px;
	cursor: pointer;
}
.cart0 {
	color: red;
}
.linecapri li {
	list-style-type: none;
	border-bottom: solid thin #e9e9e9;
	padding: 10px 0;
	width: 90%;
}
.cart_pri {
	background-color: #f3f3f3;
	text-align: center;
	margin: auto;
	width: 95%;
	font-size: 45px;
	color: green;
	font-weight: bold;
	padding: 10px 0;
}
.pas_cart {
	display: block;
	/* margin: auto; */
	width: 70%;
	border: solid thin #234223;
	padding: 10px 2px;
	text-align: center;
	margin: 30px auto;
	background-color: #3b8705;
	color: white !important;
	border-radius: 3px;
}
.pas_cart:hover {
	opacity: .7;
}
#formtique div {
	padding: 5px 0;
}
.putbon {
	width: 90%;
	margin: auto;
	background-color: #565859;
	padding: 2px !important;
	border-radius: 3px;
}
.putbon input {
	display: block;
	width: 100%;
	border: transparent;
	text-align: center;
	padding: 10px 0;
}
.putbon input:nth-child(2) {
	background-color: inherit;
	color: white;
}
.putbon input:nth-child(2):hover {
	opacity: .7;
	background-color: #070707;
}
.vidcart {
	position: absolute;
	left: -23px;
	top: 0;
	z-index: 100;
	width: 20px;
	background-color: #d50404;
	color: white !important;
	font-size: 20px;
	text-align: center;
	border-radius: 3px;
	box-shadow: 0px 0px 6px 0px #0006;
}
.vidcart em {
	color: inherit;
	display: block;
	/* text-decoration: none; */
	font-style: normal;
}
table#ocart input {
	display: block;
	width: 83%;
	margin: auto;
	text-align: center;
	padding: 5px 0;
	border-radius: 5px;
	box-sizing: border-box;
	border: solid thin #d6dade;
	background-color: #f6f5f3;
}

@media screen and (max-width:768px)
{
	
   	 .pagbon {
	width: 98%;
	padding: 50px 20px;
	margin: 10px auto;
padding: 0px 20px;
}
.infosto {
	width: 98%;
}
	.infocus {
	width: 98%;
}
.infosto {
	width: 98%;
	/* float: left; */
	box-sizing: border-box;
	padding: 10px;
	margin-top: 20px;
}
}

@media print 
{
.blocprint {
	display:none;
}
 .pagbon {
	width: 98%;
	padding: 50px 20px;
	margin: 10px auto;
padding: 0px 20px;
font-size: 15px;
}
#bloc_comand {
	width: 98%;
	margin: 50px auto;
}
#bloc_comand li {
	float: left;
	width: 50%;
}


}
</style>


</head>

<body>

<div class="pagbon">
<div class="blocprint">Il est vivement conseillé d\'imprimer cette page (Mode:paysage)  <span id="print">Imprimer maintenant</span></div>
  <div class="blochead">
	<div class="infosto">
	    <div class="bontit">Bon de commande </div>
	<div class="imgtop"><img src="../img/logo/logo_be-konekt.png" alt=""/></div>
<p class="linesto">La Reference Documentaire</p>
<p class="linesto">BP : 3825 DOUALA </p>
<p class="linesto">Douala</p>
<p class="linesto">Cameroun</p>
<p class="linesto"><strong>Tél :</strong> +237 699 46 81 64 / +237 674 03 70 04</p>
<p class="linesto"><strong>Email :</strong>lareferencedocumentaire@gmail.com</p>
<p class="linesto"><strong>Site web :</strong> www.lareferencedocumentaire.com</p>
</div>
	<div class="infocus">
	  <div class="bontop">
  <p class="linesto">	BON DE COMMANDE N° '.$_SESSION['nbcomand'].'</p>
  <p class="linesto">Date d\'émission : '.date('d-m-Y H:i:s').'</p>
      </div>
	  <div class="bonbot">
  <p class="linesto">'.htmlspecialchars(strtoupper($_SESSION['pre_cus'])).' '.htmlspecialchars(strtoupper($_SESSION['nom_cus'])).'</p>
 
  
  <p class="linesto">'.htmlspecialchars($_SESSION['pay_cus']).'</p>
  <p class="linesto"><strong>Tél:</strong> '.htmlspecialchars($_SESSION['tel_cus']).'</p>
  <p class="linesto"><strong>E-mail:</strong> '.htmlspecialchars($_SESSION['mail_cus']).'</p>
      </div>
      
  
    </div>
  </div>
  
  <div class="blocdres">
  	
  	<div class="bontit">Adresse de livraison </div>
<p class="linesto"><strong>Destinataire :</strong> '.htmlspecialchars($_SESSION['nomlivrai']).'</p>
<p class="linesto"><strong>Type :</strong>'.htmlspecialchars($_SESSION['typlivrai']).'</p>
<p class="linesto"><strong>Quartier :</strong>'.htmlspecialchars($_SESSION['adreslivrai']).'</p>
<p class="linesto"><strong>Ville :</strong> '.htmlspecialchars($_SESSION['villivrai']).'</p>
<p class="linesto"><strong>Région :</strong> '.htmlspecialchars($_SESSION['reglivrai']).'</p>
<p class="linesto"><strong>Pays :</strong> '.htmlspecialchars($_SESSION['paylivrai']).'</p>
<p class="linesto"><strong>Téléphone :</strong> '.htmlspecialchars($_SESSION['tellivrai']).'</p>
<p class="linesto"><strong> Email :</strong> '.htmlspecialchars($_SESSION['mail_cus']).'</p>
<p class="linesto"><strong>Date de livraison :</strong> 72 heures (Max)  	</p>
  	 	
  </div>
  
  <div class="bonpanier">
	<div class="wid_98 bg_blanc bor_gris_1 mar_top_15 mar_auto">
<table id="ocart" width="100%" border="1">

				<tbody>
				  <tr>	  
					<th scope="col">Image </th>
					<th scope="col">Article</th>
					<th scope="col">Quantité</th>
					<th scope="col">Prix unitaire</th>
					<th scope="col">Expéditeur</th>
					<th scope="col">Sous-total</th>
				  </tr>';
	
	 for ($i=0 ;$i < count($_SESSION['panier']['produit_cus']) ; $i++)
	      {
			  $ii=$i+1;
		 $lien=htmlspecialchars($_SESSION['panier']['expedi_cus'][$i])=='PDF'? '<a href="../doc/'.htmlspecialchars($_SESSION['panier']['mail_cus'][$i]).'" style="border: solid thin;padding: 3px;">Télécharger</a>':' A livrer' ;
		 
	        $texte.='<tr>
            <th scope="col"><img src="../img/store/'.htmlspecialchars($_SESSION['panier']['img_cus'][$i]).'"  alt=""/></th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'</th>
            <th scope="col"><input type="text" value="'.htmlspecialchars($_SESSION['panier']['qte_cus'][$i]).'"> </th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['priuni_cus'][$i]).'  FCFA </th>
            <th scope="col">  '.$lien.'</th>
            <th scope="col">'.htmlspecialchars($_SESSION['panier']['souto_cus'][$i]).'  FCFA 
              <span class="onb">'.$ii.'</span>
              <a href="index.php?model=ultimate&sheet=cart&amp;panie_supp='.htmlspecialchars($_SESSION['panier']['produit_cus'][$i]).'" class="fa fa-remove osup" title="Remove"></a></th>
          </tr>';
	        
	      }
	  $Lareduction=!empty($_SESSION['reduction'])? $_SESSION['reduction']: 0;
	  
	$texte .=' </tbody>
      </table>
	
	 <div class="wid_90 mar_auto bord_ after linecapri pad_top_40">
		<ul class="flo_lef wid_30">
			
<li>Nombre de colis: <strong>'.compterArticles().'</strong></li>
<li>Net à payer: <strong>'.MontantGlobalEtReduction().' FCFA</strong> </li>
<li>Sous-total: <strong>'.MontantGlobal().' FCFA</strong> </li>
<li>Réduction('.$Lareduction.' %): 
	<strong>'.MontantReduction().' FCFA</strong> </li>
<li>Frais de livraison: <strong>'.$_SESSION['somelivrai'].' FCFA</strong></li>

		  
		  </ul>
		
		<div class="flo_lef wid_35">
<div class="cart_pri totau">'.MontantGlobalEtReduction().' <em>FCFA</em> </div>
      </div>
	</div>
	</div><!--fin bon panier-->
	
  <div class="blocreg">
	<div class="bontit">Réglement</div>
<p class="linesto">- Date limite : 00-00-00 </p>
<p class="linesto">- Mode : Cash</p>
	
	</div>
	<p class="bonfin">Pour toutes préoccupations, Veuillez contactez notre service client. E-mail: lareferencedocumentaire@gmail.com - Tél & whatsapp: +237 699 46 81 64</p>
</div>

<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
<script>
		/*animer bouton patner*/	
		function paycolor(){
	
var max=Math.max(42, 4, 38, 255, 105), 
    min=Math.min(42, 0, 38, 1337, 105),
    $coul1=Math.floor(Math.random() * (max - min) + min);

var max=Math.max(42, 4, 38, 255, 105), 
    min=Math.min(42, 0, 38, 1337, 105),
    $coul2=Math.floor(Math.random() * (max - min) + min);

var max=Math.max(42, 4, 38, 255, 105), 
    min=Math.min(42, 0, 38, 1337, 105),
    $coul3=Math.floor(Math.random() * (max - min) + min);


$(\'.totau\').css(
	\'background-color\',\'rgba(\'+$coul1+\',\'+$coul2+\',\'+$coul3+\',1)\'
);
	
}

setInterval(paycolor,500);
		
		
		$("#print").click(
	
   function (){
		window.print();
		return false;
	}
	);
	</script>
	
</body>
</html>';
	  
	  
	  	  

	
	
	  
	  //supprimer le fichier
	  if(is_file('source/commande/'.$nompag.'.html'))
		  @unlink('source/commande/'.$nompag.'.html');
	  
	   if(is_file('source/commande/'.$nompag.'.zip'))
		  @unlink('source/commande/'.$nompag.'.zip');
	  
	// 1 : on ouvre le fichier
$pag=$nompag.'.html';
	$monfichier=@fopen('source/commande/'.$pag, 'a');
	
	if($monfichier)
	{
		
	   fputs($monfichier,$texte);
		
		fclose($monfichier);
		
		
		//zipper le fichier
		$zip = new ZipArchive();
		
		$fichierzip=$nompag.'.zip';
		
		if($zip->open('source/commande/'.$fichierzip, ZipArchive::CREATE) === true)
       {
		   
	      $zip->addFile('source/commande/'.$pag); // Ajout la page htm
	  
	      $zip->close(); // Et on referme l'archive
	 
       }
		
				/*********fin commande********************************************************************************************/
		
			
				// requete SQL,
			$requete = $tams->query('SELECT COUNT(*) nbr FROM _order WHERE numero_ord=\''.$_SESSION['nbcomand'].'\' AND id_aut_ord=\''.$_SESSION['mail_cus'].'\' ');
			//nombre de fichiers trouvés
			$reponses = $requete->fetch(); 
		    $nb_resulta=$reponses['nbr'];
			if($reponses['nbr'] == 0) 
			{ 
		
		
		//on enregistre la commande du client dans la base donne
							$req=$tams->prepare('INSERT INTO _order (id_aut_ord,numero_ord,pay_ord,livre_ord,date_ord) 
							   VALUES (?,?,?,?,NOW()) ');

									   $inser=$req->execute(array($_SESSION['mail_cus'],$_SESSION['nbcomand'],0,0 )) or exit($tam->errorInfo());

										if($inser)
										{
																	 //notification
	$bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
    $inser=$bloc->execute(array('Client',2,"Nouvelle commande enregistrée",0));
											
											//mailllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll
					    $thelink='<a href="http://lareferencedocumentaire.com/source/commande/'.$_SESSION['nbcomand'].'.html" >Voir ma commande</a>';
					   $mailDestination =$_SESSION['mail_cus']; // Déclaration de l'adresse de destination.info(at)betaprint.net, marketing@betaprint.net
$_POST['nom']="La Reference Documentaire";
	$email='lareferencedocumentaire@gmail.com';
$_POST['mail']=$email;
		
				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailDestination)) // On filtre les serveurs qui rencontrent des bogues.
				{
					$passage_ligne = "\r\n";
				}
				else
				{
					$passage_ligne = "\n";
				}
				//=====Déclaration des messages au format texte et au format HTML.
				$message_txt = "Commande finalisée et payée";
				$message_html = '<html><head></head><body>
<div class="mail">
	<h1>Commande finalisée et payée" </h1>
	<h2>www.lareferencedocumentaire.com </h2>
		
	<p><strong>Félicitation !</strong> <em>'.$mailDestination .'</em> </p>
	<p> Veuillez suivre ce lien pour voir votre commande. Les livres vous seront expédiés si votre commande contient des livres. Par contre, si elle contient des textes de lois, utilisez le bouton télécharger situé dans votre commande. Merci de nous faire comfiance... </p>
	<p><strong>Lien:</strong> <em>'.$thelink.'</em> </p>
	<p><strong>Ou utilisez celui-ci:</strong> <em> http://lareferencedocumentaire.com/source/commande/'.$_SESSION['nbcomand'].'.html </em> </p>
	</div>
					</body></html>';
				//==========

				//=====Création de la boundary
				$boundary = "-----=".sha1(rand());
				//==========

				//=====Définition du sujet.
				$sujet = "Commande finalisée et payée";
				//=========

				//=====Création du header de l'e-mail.
				$header = "From: \"".$_POST['nom']."\"<".$_POST['mail'].">".$passage_ligne;//Le nom de l’expéditeur de dois pas présenter d'espace, c'est surement pour cette raison que ton code ne marchais pas.
				$header.= "Reply-to: \"".$_POST['nom']."\" <".$_POST['mail'].">".$passage_ligne;
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
				$eta=mail($mailDestination,$sujet,$message,$header);
					   
					   //mailllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll
		  
											
											
											
										   echo '<div class="ok_form"><p>Commande enregistrée avec succes</p></div>';

											
					/*						$reqC=$tams->prepare('INSERT INTO client (nom_cli,pre_cli,pay_cli,tel_cli,mail_cli,comand_cli,vil_cli,date_cli) 
							   VALUES (?,?,?,?,?,?,?,NOW()) ');

	$inserC=$reqC->execute(array($_SESSION['nom_cus'],$_SESSION['nom_cus'],$_SESSION['pay_cus'],$_SESSION['tel_cus'],$_SESSION['mail_cus'],$_SESSION['nbcomand'],$_SESSION['villivrai'] )) or exit($tam->errorInfo());*/

											
											
											
										unset( $_SESSION['nbcomand']);
										unset($_SESSION['id_cus']);

									 unset( $_SESSION['pre_cus']);
									  unset($_SESSION['nom_cus']);
									  unset($_SESSION['pay_cus']);
									  unset($_SESSION['tel_cus']);

									unset($_SESSION['nomlivrai']);
									unset($_SESSION['adreslivrai']);
									unset($_SESSION['villivrai']);
									unset($_SESSION['reglivrai']);
									unset($_SESSION['paylivrai']);
									unset($_SESSION['tellivrai']);
											
										
									unset($_SESSION['panier']);
										
											   echo '<div class="ok_form">Félicitation !!! Payement effectué. Vérifiez vos détails dans le mail que nous venons d\'envoyer à votre boite email ('.$_SESSION['mail_cus'].') Pensez aussi à vérifier votre dossier spam</div>';
											//.' <script> window.setTimeout("location=(\'index.php?model=ultimate&sheet=cart_ok\');",3000) </script>';
	
											
									unset( $_SESSION['mail_cus']);
											
											
									$sendmail="1";
											
										}
							else{
								echo '<div class="stop_form">
		  <p>Désolé votre commande n\'a pas été enregistrée, Re-sélectionner vos produits s\'il vous plait !</p></div>';
								
							}
			}
		
		
	}
	else{
		
		echo '<div class="stop_form">
		  <p>Désolé votre commande n\'a pas été creée, Re-sélectionner vos produits s\'il vous plait !</p></div>';
		
	}
	
// 3 : quand on a fini de l'utiliser, on ferme le fichier

	}
	else
	{
	echo '<div class="stop_form">Complètez tous les champs</div>';
		
	
	}	
}
	else
	{
	echo '<div class="stop_form">votre panier est vide ou commande impayé</div>';
		
	
	}
	
	  
	  
	  
	  
	  
	  ?>
  
  
  
  
  
  
  