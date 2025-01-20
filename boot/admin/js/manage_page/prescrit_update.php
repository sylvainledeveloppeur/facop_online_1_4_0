<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');


/* $select=''; 

	$bloc=$tams->query(' SELECT * FROM  sousmodel ORDER BY  id DESC ');
						
    $ii=1;
    while($done=$bloc->fetch())
        {
           $select.= '<option value="'.$done['id'].'-BT-'.$done['titre'].'">'.$done['titre'].'</option>'; 
        } */

$bloc= $tams->query(" SELECT * FROM eleve  WHERE id=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/prescrit_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['myava'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['myava'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="prescrit_show" data-title="Pré-inscription" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../img/avatar/'.$done['myava'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>


    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
       
  <div class="iladd">
  <label for="atit">Elève</label>
  <input type="text" required="required" name="nom" id="tit" value="'.$done['matricule'].' - '.$done['nom'].'" disabled="disabled">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

<div class="iladd">
        <label for="aimg">Picture Face (600 x 600)</label>		
        <input name="aimg" type="file" id="aimg" class="img_add0">
</div>

     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
       
  <div class="iladd">
  <label for="atit">Absence</label>
  <input type="number" required="required" name="abs" id="tit" value="'.$done['abs'].'" min="0">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
  
<div class="iladd">
<label for="atit">Absence justifièe</label>
<input type="number" required="required" name="absj" id="absj" value="'.$done['abs_jus'].'" min="0">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
  
<div class="iladd">
<label for="atit">Retard</label>
<input type="number" required="required" name="ret" id="tit" value="'.$done['retard'].'" min="0">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
  
<div class="iladd">
<label for="atit">Consigne</label>
<input type="number" required="required" name="con" id="tit" value="'.$done['consigne'].'" min="0">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
  
<div class="iladd">
<label for="atit">Blame</label>
<input type="number" required="required" name="bla" id="tit" value="'.$done['blame'].'" min="0">
</div>

<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
  
<div class="iladd">
<label for="atit"> Exclusion</label>
<input type="number" required="required" name="exc" id="tit" value="'.$done['exclu'].'" min="0">
</div>

	
   
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  