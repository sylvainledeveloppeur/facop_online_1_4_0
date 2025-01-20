<?php @session_start();

if(!empty($_GET["yv"]) AND $_GET["yv"]!="0")
{
	$vid=htmlspecialchars($_GET["yv"]);
	$vid=trim($vid);
	
	echo '
<div id="plyr-youtube" data-type="youtube" data-video-id="'.$vid.'"></div>

<script src="https://cdn.plyr.io/2.0.15/plyr.js"></script>';

			echo '<script>

				plyr.setup("#plyr-youtube");
				
			</script>';
}
else
{
	exit(false);
}



?>