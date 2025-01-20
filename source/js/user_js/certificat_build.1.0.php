<?php @session_start();
 require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 
require_once('../../class/dompdf/autoload.inc.php');
require_once('../../class/qrcode/qrcode.php');

 use Dompdf\Dompdf; 
 $dompdf = new Dompdf();
 $dompdf->set_paper("A4");

extract($_POST);

$_POST['lang']='fr';
$_POST['lang']=htmlspecialchars($_POST['lang']);
$_POST['custom']=htmlspecialchars($_SESSION['id']." HHH ".$_SESSION['nam']." HHH ".$_POST['idpak']." HHH ".$_POST['codnumpak']." HHH ".$_POST['codnampak']." HHH ".$_POST['nampak']." HHH ".$_POST['note'].""); //"25 HHH Henry Tamo HHH 12 HHH 1 HHH facop_a1 HHH Facop A1 HHH 80%";

//$_POST['lang']="fr";
/*$_POST['fname']="Ndjiako Noel Marc Constant";
$_POST['iduser']=25;
$_POST['pack']="Facop A1";
$_POST['packcodenbr']="facop_a1";
$_POST['packcodename']="facop_a1";*/

if(!empty($_POST['custom'])  AND !empty($_POST['lang'])  )//verifier le calcule
		{
			$custom=explode(" HHH ", $_POST['custom']);

			$lang=$_POST['lang'];
			$userid=$custom[0];
			$username=$custom[1];
			$packid=$custom[2];
			$packname=$custom[5];
			$packcode=$custom[4];
			$packcodenbr=$custom[3];
			$note=$custom[6];
			$datee=$BClas->phpDate();
			$codeCerti=rand(22,9999);
			$Qtoken=sha1($codeCerti.$username.$datee);

					/**************************executer  le code****************************************************************************************/
		
					//nbr pack user achat
  $req_nbr=$tams->prepare("SELECT COUNT(id_cer) nbr FROM user_certificat  WHERE iduser_cer=? AND codenamepack_cer=?  " );
  $req_nbr->bindParam(1, $userid, PDO::PARAM_INT);
  $req_nbr->bindParam(2, $packcode, PDO::PARAM_STR);
  $req_nbr->execute();
  $req_fetct=$req_nbr->fetch(); 
  $found_nbr=$req_fetct['nbr'];

		  if ($found_nbr==0)
			{


				if(doTicket($userid, $username, $packname, $packcode, $datee, $Qtoken, $codeCerti, $lang, "rootbee0"))
				{



					$req=$tams->prepare('INSERT INTO user_certificat (actif_cer, iduser_cer, idpack_cer, codenbrpack_cer, codenamepack_cer,	namepack_cer, note_cer, img_cer, pdf_cer, phpdate_cer, sqldate_cer) 
												VALUES (?,?,?,?,?,?,?,?,?,?,NOW()) ');

					$inser=$req->execute(array(1, $userid, $packid, $packcodenbr, $packcode, $packname, $note, $userid."_".$packcode.'_certificat.png', $userid."_".$packcode.'_certificat.pdf' , $datee ));



						if($inser)
						{
									$immg=$userid."_".$packcode."_certificat.png";

									$html = <<<ENDHTML
									<html>
									<body style="">
										<img src="../../img/certificat/user/$immg" width="100%" height="500" alt=""/>

									</body>
									</html>
									ENDHTML;

									$dompdf->set_paper("A4","letter");
									$dompdf->load_html($html);
									$dompdf->render();

									$output = $dompdf->output();
									$link='../../pdf/certificat/user/'.$userid.'_'.$packcode.'_certificat.pdf';

									$etaPDF=file_put_contents($link, $output);

									//$dompdf->stream();

									//exit("true");
				exit('<a href="source/img/certificat/user/'.$immg.'"  target="_blank"  class="bg_1 btn_3 mar_top_40" download>Télécharger ton certificat</a>');
						}
						else
						{
							exit('<div class="no_form" >Erreur</div>');
						}


				}
				else
				{
					exit('<div class="no_form" >Erreur</div>');

				}				
			 }
			else
			{
				$immg=$userid."_".$packcode."_certificat.png";
				
				$upd=$tams->query(" UPDATE user_certificat SET note_cer=$note WHERE iduser_cer=".$userid." AND codenamepack_cer='".$packcode."' ");


					   if($upd)
						{ 

				  exit('<a href="source/img/certificat/user/'.$immg.'"  target="_blank"  class="bg_1 btn_3 mar_top_40" download>Télécharger ton certificat</a>');
						 }
			}
				

		}
		else
		{

			exit('<div class="no_form" >Erreur</div>');
		}

		// function =========================================================

		function doTicket($userid, $username, $packname, $packcode, $datee, $Qtoken, $codeCerti, $lang, $loocal)
					{
								$eta=true;
							
								$packname="\"".$packname."\"";
							
							
						
										// (A) OPEN IMAGE
									$img = imagecreatefrompng("../../img/certificat/template/certificat_".$lang.".png");
						
									// (B) WRITE TEXT
								$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
								$fontpath=$rootDir.'/source/img/ticket/font/';
							
									
									
											
								//font online or offline 

								if(!empty($loocal) AND $loocal=="rootbee"  )
								{  $fontFile = "C:\Windows\Fonts\arial.ttf"; }
								else 
								{  $fontFile ="../../style/police/poppins.ttf"; }

									//$fontFile = "C:\Windows\Fonts\arial.ttf"; // CHANGE TO YOUR OWN!
									$fontSize = 24;
									$fontColor = imagecolorallocate($img, 0, 27, 58);
									$posX = 460;
									$posY = 320;
									$angle = 0;
						
									$fontSize2 = 22;
									$fontColor2 = imagecolorallocate($img, 0, 27, 58);
									$posX2 = 483;
									$posY2 = 436;
									$angle2 = 0;
						
									$fontSize3 = 11;
									$fontColor3 = imagecolorallocate($img, 0, 27, 58);
									$posX3 = 815;
									$posY3 = 638;
									$angle3 = 0;	
									
									$fontSize4 = 23;
									$fontColor4 = imagecolorallocate($img, 0, 0, 0);
									$posX4 = 1620;
									$posY4 = 1260;
									$angle4 = 0;
							
							
									$fontSize5 = 50;
									$fontColor5 = imagecolorallocate($img, 0, 0, 0);
									// $posX5 = 630;
									$posY5 = 801;
									$angle5 = 0;
							
									

							 if(strlen($username)>20)
							{ $posX = 380;}
							
									$fontSize6 = 23;
									$fontColor6 = imagecolorallocate($img, 255, 255, 255);
									$posX6 = 795;
									$posY6 = 183;
									$angle6 = 0;
							
							//  if(strlen($team2)<6)
							//  { $posX6 = 895;}
							//  else if(strlen($team2)<9)
							//  { $posX6 = 883;}
							
									$fontSize7 = 25;
									$fontColor7 = imagecolorallocate($img, 0, 0, 0);
									$posX7 = 460;
									$posY7 = 1088;
									$angle7 = 0;
							
									$fontSize8 = 18;
									$fontColor8 = imagecolorallocate($img, 255, 48, 47);
									$posX8 = 940;
									$posY8 = 515;
									$angle8 = 0;
						
									imagettftext($img, $fontSize, $angle, $posX, $posY, $fontColor, $fontFile, $username);
								    imagettftext($img, $fontSize2, $angle2, $posX2, $posY2, $fontColor2, $fontFile, $packname);
									imagettftext($img, $fontSize3, $angle3, $posX3, $posY3, $fontColor3, $fontFile, $datee);
									//imagettftext($img, $fontSize4, $angle4, $posX4, $posY4, $fontColor4, $fontFile, $type);
							
									//imagettftext($img, $fontSize5, $angle5, $posX5, $posY5, $fontColor5, $fontFile, strtoupper($team1));
							
									// imagettftext($img, $fontSize6, $angle6, $posX6, $posY6, $fontColor6, $fontFile, strtoupper($team2));
							
									//imagettftext($img, $fontSize7, $angle7, $posX7, $posY7, $fontColor7, $fontFile, strtoupper($dat));
							
									//imagettftext($img, $fontSize8, $angle8, $posX8, $posY8, $fontColor8, $fontFile, strtoupper("TRAINING: ".$tim));
						
									// (C) OUTPUT IMAGE
									// (C1) DIRECTLY SHOW IMAGE
									/*header("Content-type: image/jpeg");
									imagejpeg($img);
									imagedestroy($img);*/
						
									// (C2) OR SAVE TO A FILE
									$quality = 9; // 0 to 100
									if(imagepng($img, "../../img/certificat/user/".$userid."_".$packcode."_certificat.png", $quality))
									{
										/*   if(placeFlag($codeimg,$team1,415,75))
										{
											if(placeFlag($codeimg,$team2,900,69))
											{
													//finalTicket($codeimg);
													if(doQr($codeimg,$Qtoken))// add qr code
													{}
													else
													{$eta=false;}
												
												
											}
											else
											{$eta=false;}
											
										}
										else
										{$eta=false;} */
										
									}
									else
									{$eta=false;}
							
							
				
				return $eta;
				}

		function doQr($code,$Qtoken)
				{
						$eta=true;

						$data="https://www.facop.training/check.php?ck=".$Qtoken;
                        $options="s=qr";
                        $generator = new QRCode($data, $options);

                            /* Output directly to standard output. */
                        //$generator->output_image();

                            /* Create bitmap image. */
                            $image = $generator->render_image();
                            
                            // Save QR Code
                            if(imagepng($image,"../../img/certificat/qr/".$code."_qr.png"))
                            {
                               $eta=true;
                            }
                            else
                            {$eta=false;}
		
		
				return $eta; 
				}
							
							
		function placeFlag($code,$flag,$x,$y)
				{
						$eta=true;
			
						$your_original_image="../../img/ticket/ticket_pending/".$code.".png";
						$your_frame_image="../../img/flag/".$flag.".png";
		
						# If you don't know the type of image you are using as your originals.
						$image = imagecreatefromstring(file_get_contents($your_original_image));
						$frame = imagecreatefromstring(file_get_contents($your_frame_image));
			
						# If you know your originals are of type PNG.
						$image = imagecreatefrompng($your_original_image);
						$frame = imagecreatefrompng($your_frame_image);
			
						if(imagecopymerge($image, $frame, $x, $y, 0, 0, 80, 80, 100))
							{
									# Save the image to a file
								if(imagepng($image, "../../img/ticket/ticket_pending/".$code.".png"))
								{}
								else{$eta=false;} 
							}
						else{$eta=false;}
		
		
				return $eta;
				}
							

		function finalTicket($code, $userid, $packcode)
				{
						$eta=true;
						$your_original_image="../../img/certificat/pending/".$userid."_".$packcode."_certificat.png";
						$your_frame_image="../../img/certificat/qr/".$code."_qr.png";
		
					
						# If you know your originals are of type PNG.
						$image = imagecreatefrompng($your_original_image);
						$frame = imagecreatefrompng($your_frame_image);
			
		
						if(imagecopymerge($image, $frame, 970, 690, 0, 0, 150, 150, 100))
							{
									# Save the image to a file
								if(imagepng($image, "../../img/certificat/user/".$userid."_".$packcode."_certificat.png"))
								{}
								else{$eta=false;} 
							}
						else{$eta=false;}
			
		
					return $eta;
				}
							

			/*************signature in image*****/
				//function
		function toBin($str)
				{
					$str = (string)$str;
					$l = strlen($str);
					$result = '';
					while($l--){
					$result = str_pad(decbin(ord($str[$l])),8,"0",STR_PAD_LEFT).$result;
					}
					return $result;
				}
							
		function toString($binary)
				{
					return pack('H*',base_convert($binary,2,16));
				}
							
							
			//insertion
			function encrypt($signa,$code)
				{
		
						$message_to_hide = $signa;
					$binary_message = toBin($message_to_hide);
					$message_length = strlen($binary_message);
					$src = "../../img/ticket/ticket_final/".$code.".png";
					$im = imagecreatefromjpeg($src);
					for($x=0;$x<$message_length;$x++){
						$y = $x;
						$rgb = imagecolorat($im,$x,$y);
						$r = ($rgb >>16) & 0xFF;
						$g = ($rgb >>8) & 0xFF;
						$b = $rgb & 0xFF;
		
						$newR = $r;
						$newG = $g;
						$newB = toBin($b);
						$newB[strlen($newB)-1] = $binary_message[$x];
						$newB = toString($newB);
		
						$new_color = imagecolorallocate($im,$newR,$newG,$newB);
						imagesetpixel($im,$x,$y,$new_color);
					}
					//echo $x;
					imagepng($im,"../../img/ticket/ticket_signature/".$code.".png");
					imagedestroy($im);
		
				}
							
		//insertion
			function decrypt($imgSigna)
				{
					$src = $imgSigna;
					$im = imagecreatefrompng($src);
					$real_message = '';
					for($x=0;$x<40;$x++){
						$y = $x;
						$rgb = imagecolorat($im,$x,$y);
						$r = ($rgb >>16) & 0xFF;
						$g = ($rgb >>8) & 0xFF;
						$b = $rgb & 0xFF;
		
						$blue = toBin($b);
						$real_message .= $blue[strlen($blue)-1];
					}
					$real_message = toString($real_message);
					//echo $real_message;
					//exit();
		
				return $real_message;
				}

?>
	 
	

