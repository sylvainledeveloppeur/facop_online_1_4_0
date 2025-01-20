<?php 
require_once('../db_2_js.class.php');

//liste catego
	 function listcatego($tams,$cat)
	{
	
	$bloc=$tams->query(" SELECT * FROM sous_categorie_bao WHERE  id_cat_soucat=".$cat."  ORDER BY fr_soucat ASC ");
			
		echo '<option value="0">---Choix---</option>';
		
				  while($done=$bloc->fetch())
				  {	
				echo  '
				<option value="'.$done['id_soucat'].'">'.$done['fr_soucat'].'</option>';  
					  
				  } 
}

listcatego($tams,$_POST['cat']);


?>