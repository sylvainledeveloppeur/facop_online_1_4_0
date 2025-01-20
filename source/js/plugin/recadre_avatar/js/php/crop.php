<?php @session_start();
 require_once('../../../../db_5_js.class.php');

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = $targ_h = 150;//taille souhaité de l'image a enregistre sur le disque 
	$jpeg_quality = 90;
	$png_quality = 9;
	$gif_quality = 90;
$chemin_avata_traiter='../../img/';
$chemin_avata_final='../../../../../img/avatar/';
	//jpeg***********************************
			if(is_file($chemin_avata_traiter.$_POST['pict'].'_min.jpg'))
			{
			$src = $chemin_avata_traiter.$_POST['pict'].'_min.jpg';//chemin source de l'img a recadre
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);


			$save_ava=imagejpeg($dst_r,$chemin_avata_final.$_POST['pict'].'_ava.jpg',$jpeg_quality);


				//fin redimention et sauvegarde*****************************
							 if($save_ava) 
							 {
								 $vau=$tams->query(" UPDATE user SET avata=\"".$_POST['pict']."_ava.jpg\"  WHERE id='".$_SESSION['id']."' " );
								 unlink($chemin_avata_final.$_SESSION["avatar"]);//supprime l ancien avatar
								 
								 $_SESSION["avatar"]=$_POST['pict']."_ava.jpg";
									 
								 unlink($chemin_avata_traiter.$_POST['pict'].'_min.jpg');
								 echo 'Enregistré';

								 echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&ok=1\');",1000) </script>';

							 }
			}
	//png***********************************
			if(is_file($chemin_avata_traiter.$_POST['pict'].'_min.png'))
			{
			$src = $chemin_avata_traiter.$_POST['pict'].'_min.png';//chemin source de l'img a recadre
			$img_r = imagecreatefrompng($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);


			$save_ava=imagepng($dst_r,$chemin_avata_final.$_POST['pict'].'_ava.png',$png_quality);


				//fin redimention et sauvegarde*****************************
							 if($save_ava) 
							 {
								 $vau=$tams->query(" UPDATE user SET avata=\"".$_POST['pict']."_ava.png\"  WHERE id='".$_SESSION['id']."' " );
								 $_SESSION["avatar"]=$_POST['pict']."_ava.png";
								 
								 unlink($chemin_avata_traiter.$_POST['pict'].'_min.png');
								 echo 'Enregistré';

								echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&ok=1\');",1000) </script>';

							 }
			}
	//gif***********************************
			if(is_file($chemin_avata_traiter.$_POST['pict'].'_min.gif'))
			{
			$src = $chemin_avata_traiter.$_POST['pict'].'_min.gif';//chemin source de l'img a recadre
			$img_r = imagecreatefromgif($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);


			$save_ava=imagegif($dst_r,$chemin_avata_final.$_POST['pict'].'_ava.gif',$gif_quality);


				//fin redimention et sauvegarde*****************************
							 if($save_ava) 
							 {
								 $vau=$tams->query(" UPDATE user SET avata=\"".$_POST['pict']."_ava.gif\"  WHERE id='".$_SESSION['id']."' " );
								 $_SESSION["avatar"]=$_POST['pict']."_ava.gif";
								 
								 unlink($chemin_avata_traiter.$_POST['pict'].'_min.gif');
								 echo 'Enregistré';

								echo ' <script> window.setTimeout("location=(\'index.php?sheet=ad_avatar&model=ultimate&ok=1\');",1000) </script>';

							 }
			}
	
	
}
