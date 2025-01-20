<?php 
/*****last modify: 07-01-2022*/
/*****website: DTACAMEROUN*/

function send_sms($key, $sender, $destinataire, $message)
	{ 
		 $key_api =$key;
		 $sender = $sender; 
		 $destinataire = $destinataire; 
		 $message = $message; 
		$url_base="https://obitsms.com/api/v2/bulksms?key_api=".urlencode($key_api)."&sender=
		".urlencode($sender)."&destination=237".urlencode($destinataire)."&message=".urlencode($message); 
		 $ch = curl_init($url_base); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		 $response = curl_exec ($ch); 
		 $response = json_decode($response,true); 
		 curl_close($ch); 
	
		 return $response; 
	} 
?>