<?php @session_start(); 

require_once('../../db_js.class.php');

$vau=$tams->query(" UPDATE seller_bao SET moypay_sel=\"".$_POST['pay']."\"  WHERE id_sel='".$_SESSION['id_sel']."' " );
		if($vau)
			echo '<div class="ok_form">Modifier</div>
			<script type="text/javascript"> window.setTimeout("location=(\'index.php?sheet=pay_seller&model=user&folderpage=seller\');",3000) </script>'



?>