<?php 
// mot($lan_h,$chi) = fonction qui verifie si un tableau de mot ou un mot existe au chargement de la page
// $lan_h = nom du tableau de mot
// $chi = numero du mot dans le tableau "$lan_h"


function mot($lan_h,$chi)
	  {
		  if(isset($lan_h))//verifier si le tableau existe
		  {
			  if(array_key_exists($chi,$lan_h))//verifier si numero du mot existe dans le tableau
			  {
				  echo $lan_h[$chi];//.'<i id="reper_mot"> [Mot n°'.$chi.' page: '.$lan_h[0].']</i>';
			  }
			  else
			  {
				  echo 'Mot inconnu';//.'<i id="reper_mot"> [Mot n°'.$chi.' page: '.$lan_h[0].']</i>';
			  }
		  }
		  else
		  {
			  echo 'Tableau de mot inconnu';
		  }
	  }

// mot2($lan_h,$chi) = fonction qui verifie si un tableau de mot ou un mot existe en utilisant ajax et les session------------------------------------------------
// $lan_h = nom du tableau de mot
// $chi = numero du mot dans le tableau "$lan_h"


function mot2($lan_h,$chi)
	  {
		  if(isset($lan_h))//verifier si le tableau existe
		  {
			  if(array_key_exists($chi,$lan_h))//verifier si numero du mot existe dans le tableau
			  {
				  $val=$lan_h[$chi];//.'<i id="reper_mot"> [Mot n°'.$chi.' page: '.$lan_h[0].']</i>';
			  }
			  else
			  {
				  $val='Mot inconnu';//.'<i id="reper_mot"> [Mot n°'.$chi.' page: '.$lan_h[0].']</i>';
			  }
		  }
		  else
		  {
			  $val='Tableau de mot inconnu';
		  }
		  
		  return $val;//utilisation de return car il est utilise dans une fonction echo
	  }
?>