<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

require_once("../../function/fun-panier/fonctions-panier.php"); 
require_once("../../function/fun-panier/panier_php.php");

if(!empty($_SESSION['pseudo']))
  {
	$formaTio="";
	$nbArticles=count($_SESSION['panier']['produit_cus']);
	 $netPay=MontantGlobalEtReduction();
	
	 for ($i=0 ;$i < $nbArticles ; $i++)
	      {
			  $ii=$i+1;
	         $formaTio.=$_SESSION['panier']['qte_cus'][$i].' KKK '.$_SESSION['panier']['expedi_cus'][$i].' KKK '.$_SESSION['panier']['mail_cus'][$i].' KKK '.$_SESSION['panier']['produit_cus'][$i].' KKK '.$_SESSION['panier']['priuni_cus'][$i].' XXX ';
	        
	      }
	
	     $formaTio=substr($formaTio, 0, -5);
	
		 $allPacks=explode(" XXX ",$formaTio);
	     $coun_allPacks=count($allPacks);
	
	     $_POST['custom']="1008001 HHH ".$_SESSION['id']." HHH ".$_SESSION['pseudo']." HHH ".$_SESSION['codeid']." HHH ".$_SESSION['mai']." HHH ".$_SESSION['parrain']." HHH ".$_SESSION['parrainINDIRECT']." HHH ".$formaTio." HHH ".$netPay." HHH FLUTTERWAVE_WEBSITE HHH FLUTTERWAVE_WEBSITE_CM_XAF";
	       $custom=explode(" HHH ",$_POST['custom']);
	
	         //isertion de l inscription dans l historique de la db
            $req=$tams->prepare('INSERT INTO achat_pending  (idtransaction, iduser_cha, pseudo_cha, idpack_cha, codenbrpack, codenamepack_cha, nompack_cha, prixpack_cha, methodpaie_cha, statu_cha, datapai_cha, theme_cha, datephp_cha, datesql_cha ) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()) ');

            for($i=0; $i<$coun_allPacks; $i++)
            {
               
              $onePack=explode(" KKK ",$allPacks[$i]);

              $inser=$req->execute(array( $custom[0], $custom[1], $custom[2], $onePack[0], $onePack[1], $onePack[2], $onePack[3], $custom[8], $custom[10], 0, $_POST['custom'], "", $BClas->phpDate() ));

            }
            
              if ($inser)
                {
                    //reenvoi methode de paiement
                    //$result=$custom[9];
				   echo "FLWPUBK-bd117fb4799008a13fd565c193e2666a-X TTT ".$_POST['custom']." TTT ".$netPay." TTT ".$_SESSION['mai']." TTT ".$_SESSION['pseudo'];
                }
                else
                {
                    $result="false";
                }
    
	
  }
else
{
	echo false;
}
?>