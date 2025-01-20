<?php  @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');

require_once('../../../../source/class/dompdf/autoload.inc.php');




$lesDonnees='';
$anneeScolaire='00-00-000';
$idclass=$_GET['idclass'];
$nomclass=$_GET['nomclass']!="0" ? $_GET['nomclass']: "Tous utilisateurs" ;
$name=str_replace(" ","_",$nomclass);
$totaclass=$_GET['totaclass'];

$table=$_GET['nomclass']=="0" ? "": ' WHERE clas='.$idclass ;

if(!empty($_GET['nomclass']) AND isset($_GET['idclass']) )
	{
		$NomNivo=$_GET['nomclass'];
		$Nivo=$_GET['idclass'] ? $_GET['idclass']  :0;
		$lenivo=' WHERE niveau='.$Nivo;
	}
	else
	{
		$NomNivo="Tous";
		$Nivo="";
		$lenivo="";
	}

use Dompdf\Dompdf; 

$dompdf = new Dompdf();

 $dompdf->set_paper("A4","letter");

$tz = 'Africa/Douala';

$timestamp = time();

$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string

$dt->setTimestamp($timestamp); //adjust the object to correct timestamp/

//$dt->format('d.m.Y, H:i:s');



$genere=$dt->format('d/m/Y, H:i');

$phpdate=$dt->format('d/m/Y H:i:s');
           

$link="../../../../source/pdf/liste/".$name."_liste.pdf";

// infos annee scolaire
$nbr_pseudo=$tams->prepare("SELECT * FROM etablissement WHERE id_eta=1 " ) ;
$nbr_pseudo->execute();
$chif_pse=$nbr_pseudo->fetch();
$anneeScolaire=$chif_pse['anesco'];
$etaBli=$chif_pse['eta'];

// liste elleve
$bloc=$tams->query(' SELECT * FROM user  '.$lenivo.' ORDER BY  pseudo ASC ');
				
$i=1;
while($done=$bloc->fetch())
{

  $ava=is_file('../../../../source/img/avatar/user/'.$done['ava']) ? '../../../../source/img/avatar/user/'.$done['ava'] : "../../../../source/img/avatar/avatar.png";

    $lesDonnees.='<tr>

    <td align="left" style="font-weight: 700"><p>'.$i.'- '.$NomNivo.'</p> </td>

    <td align="left" style="font-weight: 700"><img style="display: block" src="'.$ava.'" width="75" height="75" alt=""/></td>
    
    <td align="left" align="left">'.$done['pseudo'].'</td>
    
    <td align="left" style="font-weight: 700">'.$done['nom'].'</td>
    
    </tr>';

    $i++;
}


$html = <<<ENDHTML

<html>

 <body style="">

<div class="body" style="border: solid thin;padding: 10px;border-radius: 5px;">

  <div class="line_head">

    <div class="head_lef" style="float: left;width: 40%;text-align: center;">

      <p style="font-weight: bold;">REPUBLIQUE DU CAMEROUN </p>

      <p>Paix - Travail - Patrie</p>

      </div>

    <div class="head_logo" style="float: left;width: 20%;text-align: center;">

	  <img src="../../../../source/img/logo/logo.png" width="100" height="100" alt=""/>

    </div>

  <div class="head_rig" style="float: left;width: 40%;text-align: center;">

    <p style="font-weight: bold;">REPUBLIC OF CAMEROON</p>

    <p>Peace - Work - Fatherland</p>

	  </div>

	<p style="clear: both;"></p>

  </div>

<div style="text-align: center;line-height: 8px;font-weight: bold;">

	  <p style="text-transform: uppercase;font-size: 1.5em;/*! padding: 0px; */font-weight: bold;color: #3795e5;">$etaBli</p>

		<p style="color: red;font-size: 19px;">Liste des utilisateurs: $NomNivo</p>

		<p>Année: $anneeScolaire</p>

	</div>



	<table width="100%" border="0" cellpadding="5" style="line-height: 2;">

    <thead>
    <tr style="background-color: #3e90f9;">
    <th align="left" scope="col">No ($totaclass)</th>
      <th align="left" scope="col">Photo</th>
      <th align="left" scope="col">Pseudo</th>
      <th align="left" scope="col">Nom</th>
    </tr>
	   </thead>

  <tbody>

   $lesDonnees

  </tbody>

</table>


	

</div>

  <div style="text-align: center;">Généré le $genere</div>

 </body>

</html>

ENDHTML;


$dompdf->load_html($html);

$dompdf->render();

$output = $dompdf->output();

$etaPDF=file_put_contents($link, $output);





if($etaPDF)

{
    $link=str_replace("../../../../","../../",$link);

echo '<div class="ok_form">Génération terminée <a href="'.$link.'" target="_blanc">Télécharger la liste</a></div>'; 
}
else
{
    echo '<div class="no_form">La génération à échoué</div>'; 
}