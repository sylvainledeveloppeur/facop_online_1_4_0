<?php ini_set("include_path", '/home4/bee4tq4e/php:' . ini_get("include_path") );
    require_once "Mail.php";

function goMail($from,$to,$subject,$body)
{ 
    //$from = "test@treatcancer.co.in";
    //$to = "fotsoweb@gmail.com";
    //$subject = "Hi!";
    //$body = "Hi,\n\nHow are you?";
     
    $host = "162.215.240.240";  
    $username = "bee4tq4e";
    $password = "Webto899$$";
     
     
    $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);

    $smtp = Mail::factory('smtp',
    array ('host' => $host,
    'auth' => "PLAIN",
    'socket_options' => array('ssl' => array('verify_peer_name' => false)),
    'username' => $username,
    'password' => $password));
     
    $mail = $smtp->send($to, $headers, $body);
     
    if (PEAR::isError($mail))
	{
       $eta=false;               // echo(" " . $mail->getMessage() . " ");
    } else 
	{
     $eta=true;   //echo("Message successfully sent!");
     
    }
	
	}


echo goMail("no_reply@gmail.com","fotsoweb@gmail.com","Tester","Hi,\n\n How are you Tina?");

function goMail($from,$to,$subject,$body)
{ 
    //$from = "test@treatcancer.co.in";
    //$to = "fotsoweb@gmail.com";
    //$subject = "Hi!";
    //$body = "Hi,\n\nHow are you?";
     
    $host = "162.215.240.240";  
    $username = "bee4tq4e";
    $password = "Webto899$$";
     
     
    $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);

    $smtp = Mail::factory('smtp',
    array ('host' => $host,
    'auth' => "PLAIN",
    'socket_options' => array('ssl' => array('verify_peer_name' => false)),
    'username' => $username,
    'password' => $password));
     
    $mail = $smtp->send($to, $headers, $body);
     
    if (PEAR::isError($mail))
	{
        echo(" " . $mail->getMessage() . " ");
    } else 
	{
    echo("Message successfully sent!");
     
    }
	
	}
    ?>

