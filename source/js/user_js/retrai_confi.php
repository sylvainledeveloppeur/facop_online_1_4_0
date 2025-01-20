<?php @session_start();
 require_once('../db_2_js.class.php');



if(!empty($_POST['amo']) AND !empty($_POST['typ'])  AND !empty($_POST['bnk'])  AND !empty($_POST['com'])  AND !empty($_POST['num']))
{
	$id=$_SESSION['id'];
    $bonus='';
	$pendingbonus=0;
	 $query = $tams->query("Select * FROM user_bonus WHERE  id_user_bnk=$id "); 
      
        while ($done = $query->fetch())
        {
			$bonus=$done['amount_bnk'];
			$pendingbonus=$done['pending_bnk'];
		}
	
	
	if($_POST['amo']>$bonus)
	{

	echo '<div class="no_form tex_cen">Le montant est superieur à ton bonus</div>';

	}
	else if($_POST['amo']<10000)
	{

	echo '<div class="no_form tex_cen">Le montant doit être au minimum 10.000 FCFA</div>';

	}
	else if($pendingbonus>0)
	{

	echo '<div class="no_form tex_cen">Tu as déja un retrait en cours...</div>';

	}
	else
	{
	
	echo '<div class="wid_50 mar_auto pad_20 bg_gre_2 mar_bot_20">
	   <h2 class="h2">Comfirmes ton retrait</h2>
	   
	<div class="after pad_top_bot_10">
		<div class="wid_30 flo_lef ">Montant: </div>	
		<div class="wid_60 flo_lef col_3">'.$_POST['amo'].' FCFA</div>
	</div>
	<div class="after pad_top_bot_10">
		<div class="wid_30 flo_lef">Type de banque: </div>	
		<div class="wid_60 flo_lef col_3">'.$_POST['typ'].'</div>
	</div>
	<div class="after pad_top_bot_10">
		<div class="wid_30 flo_lef">Nom de banque: </div>	
		<div class="wid_60 flo_lef col_3">'.$_POST['bnk'].'</div>
	</div>
	<div class="after pad_top_bot_10">
		<div class="wid_30 flo_lef">Nom du compte: </div>	
		<div class="wid_60 flo_lef col_3">'.$_POST['com'].'</div>
	</div>
	<div class="after pad_top_bot_10">
		<div class="wid_30 flo_lef">Numéro du compte: </div>	
		<div class="wid_60 flo_lef col_3">'.$_POST['num'].'</div>
	</div>
	
	<div class="wid_60 bg_2 blanc tex_cen pad_top_bot_10 recomfi">Comfirmer</div>
	
	</div>';
		
		$_SESSION['amo']=$_POST['amo'];
		$_SESSION['typ']=$_POST['typ'];
		$_SESSION['bnk']=$_POST['bnk'];
		$_SESSION['com']=$_POST['com'];
		$_SESSION['num']=$_POST['num'];
	}
}
else
{
	echo '<div class="no_form tex_cen">Tous les champs sont obligatoires</div>';
}




?>