<?php  @session_start();
require_once('../db_2_js.class.php');

/* if (!empty($_SESSION['id_cus']))
			{
					   //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
				   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_redu) nbr FROM reduction
				   WHERE id_cus_redu=:pse AND code_redu=:pas  " ) ;
				   $nbr_pseudo->execute(array('pse'=>$_SESSION['id_cus'],'pas'=>$_POST['bontique']));
				   $chif_pse=$nbr_pseudo->fetch();

				   if ($chif_pse['nbr']==1)
					{
						
						$bloc=$tams->query('SELECT * FROM reduction WHERE id_cus_redu=\''.$_SESSION['id_cus'].'\'  AND code_redu=\''.$_POST['bontique'].'\' ');
									
									while($done=$bloc->fetch())
									{
										$_SESSION['reduction']=$done['pourcent_redu'];
										echo '<div class="ok_form">Félicitation</div>';
								        echo '<script type="text/javascript"> window.setTimeout("location=(\'index.php?model=ultimate&sheet=cart\');",3000) </script>';
				
										
									}
						

					}
				else
				{
					echo '<div class="stop_form">Bon de reduction incorrect!</div>';
				}
			
			}
else
				{
					echo '<div class="stop_form">Identifiez-vous</div>';
				}*/


if (!empty($_POST['bontique']))
			{
					   //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
				   $nbr_pseudo=$tams->prepare("SELECT COUNT(id_redu) nbr FROM reduction
				   WHERE  code_redu=:pas  " ) ;
				   $nbr_pseudo->execute(array('pas'=>$_POST['bontique']));
				   $chif_pse=$nbr_pseudo->fetch();

				   if ($chif_pse['nbr']==1)
					{
						
						$bloc=$tams->query('SELECT * FROM reduction WHERE  code_redu=\''.$_POST['bontique'].'\' ');
									
									while($done=$bloc->fetch())
									{
										$_SESSION['reduction']=$done['pourcent_redu'];
										echo '<div class="ok_form">Félicitation</div>';
								        echo '<script type="text/javascript"> window.setTimeout("location=(\'index.php?model=ultimate&sheet=cart\');",3000) </script>';
				
										
									}
						

					}
				else
				{
					echo '<div class="stop_form">Bon de reduction incorrect!</div>';
				}
			
			}
else
				{
					echo '<div class="stop_form">Le bon est vide</div>';
				}

?>