<?php @session_start(); 

require_once('../../db_js.class.php');

$vau=$tams->query(" UPDATE affilier_bao SET moypay_affi=\"".$_POST['pay']."\"  WHERE id_affi='".$_SESSION['id_affi']."' " );
		if($vau)
			echo '<div class="ok_form">Modifier</div>
			<script type="text/javascript"> window.setTimeout("location=(\'index.php?sheet=pay_affilier&model=user&folderpage=affilier\');",3000) </script>'



?>