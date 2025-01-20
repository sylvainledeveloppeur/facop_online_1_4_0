<?php

/**
 * Verifie si le panier existe, le créé sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['img_cus'] = array();
      $_SESSION['panier']['produit_cus'] = array();
      $_SESSION['panier']['priuni_cus'] = array();
      $_SESSION['panier']['qte_cus'] = array();
      $_SESSION['panier']['expedi_cus'] = array();
      $_SESSION['panier']['souto_cus'] = array();
      $_SESSION['panier']['mail_cus'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($img,$produit,$priuni,$qte,$expedi,$mail,$soutotal){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($produit,  $_SESSION['panier']['produit_cus']);
	   
	   

      if ($positionProduit !== false)
      {
		  
        /* $ajou=$_SESSION['panier']['qte_cus'][$positionProduit] += $qte ;
		  
        $soutotal= $_SESSION['panier']['priuni_cus'][$positionProduit]*$_SESSION['panier']['qte_cus'][$positionProduit];
        $actionsou=$_SESSION['panier']['souto_cus'][$positionProduit]=$soutotal;
		  
		    if ($ajou!=false )
               echo '<div class="okpani">Produit modifier du panier.</div>';
		    else
		       echo ' <div class="icipani">Un problème est survenu veuillez contacter l\'administrateur du site.</div>';
	  */
		  echo '<div class="okpani">Formation déjà dans le panier.</div>'; 
      }
      else
      {
		  if($qte>0)
		  {
		  $soutotal=$priuni;//$soutotal=$priuni*$qte;
         //Sinon on ajoute le produit
        $actionimg= array_push( $_SESSION['panier']['img_cus'],$img);
        $actionpro= array_push( $_SESSION['panier']['produit_cus'],$produit);
        $actionpri= array_push( $_SESSION['panier']['priuni_cus'],$priuni);
        $actionqte= array_push( $_SESSION['panier']['qte_cus'],$qte);
        $actionexp= array_push( $_SESSION['panier']['expedi_cus'],$expedi);
        $actionmail= array_push( $_SESSION['panier']['mail_cus'],$mail);
        $actionsou= array_push( $_SESSION['panier']['souto_cus'],$soutotal);
		  
		  if ($actionimg!=false AND $actionpro!=false  AND $actionpri!=false  AND $actionqte!=false  AND $actionexp!=false  AND $actionmail!=false  AND $actionsou!=false )
        echo '<div class="okpani">Formation ajouté au panier.</div>';
		 else
		   echo '<div class="stop_form">Un problème est survenu veuillez contacter l\'administrateur du site.</div>';
		  }
		  else
		   echo '<div class="stop_form">La quantité doit être supérieu à zéro ( 0 ).</div>';
		 
		  
	  }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($produit,$qte){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qte > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($produit,  $_SESSION['panier']['produit_cus']);

         if ($positionProduit !== false)
         {
           $_SESSION['panier']['qte_cus'][$positionProduit] = $qte ;
			 
            $soutotal= $_SESSION['panier']['priuni_cus'][$positionProduit]*$qte;
			 
           $_SESSION['panier']['souto_cus'][$positionProduit]=$soutotal;
         }
      }
      else
      supprimerArticle($produit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($produit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['img_cus'] = array();
      $tmp['produit_cus'] = array();
      $tmp['priuni_cus'] = array();
      $tmp['qte_cus'] = array();
      $tmp['expedi_cus'] = array();
      $tmp['mail_cus'] = array();
      $tmp['souto_cus'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

	   
	   //Recharche du produit dans le panier
         $positionProduit = array_search($produit,  $_SESSION['panier']['produit_cus']);

         
				  for($i = 0; $i < count($_SESSION['panier']['produit_cus']); $i++)
				  {
					 if ($_SESSION['panier']['produit_cus'][$i] !== $produit)
					 {
						array_push( $tmp['img_cus'],$_SESSION['panier']['img_cus'][$i]);
						array_push( $tmp['produit_cus'],$_SESSION['panier']['produit_cus'][$i]);
						array_push( $tmp['priuni_cus'],$_SESSION['panier']['priuni_cus'][$i]);
						array_push( $tmp['qte_cus'],$_SESSION['panier']['qte_cus'][$i]);
						array_push( $tmp['expedi_cus'],$_SESSION['panier']['expedi_cus'][$i]);
						array_push( $tmp['mail_cus'],$_SESSION['panier']['mail_cus'][$i]);
						array_push( $tmp['souto_cus'],$_SESSION['panier']['souto_cus'][$i]);
					 }

				  }
		 
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
   $total=0;
	 if (creationPanier() && !isVerrouille())
   {
	   for($i = 0; $i < count($_SESSION['panier']['produit_cus']); $i++)
	   {
		  $total += $_SESSION['panier']['souto_cus'][$i];
	   }
   }
	
   return $total;
}

function MontantReduction(){
	
   $total=MontantGlobal();
	
	if(compterArticles()>1)
      $reduction=!empty($_SESSION['reduction'])? $_SESSION['reduction']:0;
	else
		$reduction=0;
	
	 $reductionCFA=($reduction /100)*$total;
	
   return $reductionCFA;
}

function MontantGlobalEtReduction(){
   
	 $total=MontantGlobal();
	$reductionCFA=MontantReduction();
	
	$netApaier=$total-$reductionCFA;
	
	
   return $netApaier;
}
/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['produit_cus']);
   else
   return 0;

}

?>
