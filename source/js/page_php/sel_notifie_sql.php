<?php 
require_once('../db_2_js.class.php');

//liste catego
	/* if(!empty($tams))
	{
	
	$bloc=$tams->query(" SELECT * FROM okaz WHERE  actif_1=1  ORDER BY RAND() LIMIT 1 ");
			
		
				  while($done=$bloc->fetch())
				  {	
				echo  '<script>
				
				             var $titre="'.$done['priok_1'].' Fcfa",
						     $corp=" '.$done['des_1'].'";
					
				            var n = new Notification($titre,{body:$corp,icon:"source/img/produit/okaz/'.$done['img1_1'].'"});
				  
				       </script>';  
					  
				  } 
     }

*/


?>

<script>
				
	   var $titre="10.000 Fcfa",
		   $corp="Facop A0,A1,A2";
					
      var n = new Notification($titre,{body:$corp,icon:"source/img/logo/logo.png"});
				  
</script>'; 