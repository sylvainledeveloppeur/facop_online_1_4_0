<?php @session_start(); 
require_once('../db_2_js.class.php');


/* $select=''; 

	$bloc=$tams->query(' SELECT * FROM  sousmodel ORDER BY  id DESC ');
						
    $ii=1;
    while($done=$bloc->fetch())
        {
           $select.= '<option value="'.$done['id'].'-BT-'.$done['titre'].'">'.$done['titre'].'</option>'; 
        } */

$bloc= $tams->query(" SELECT * FROM staff  WHERE id_sta=".$_GET["id"]." "  );


   while($done=$bloc->fetch())
		  {  
	   	echo '

<form name="TAform" action="js/manage_form/staff_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['ava'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['ava'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="staff_show" data-title="Staff" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/staff/'.$done['ava'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
            <label for="aimg">Picture Face (600 x 600)</label>		
            <input name="aimg" type="file" id="aimg" class="img_add0">
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
 
    <div class="iladd">
            <label for="atit">Nom</label>
            <input type="text" required="required" name="nom" id="tit" value="'.$done['nom'].'">
    </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	<div class="iladd">
            <select required="required" name="pos" class="pag_ser" id="tit" placeholder="Poste">

                    <option value="'.$done['pos'].'">'.$done['pos'].'</option> 
                    <option value="0">-- Poste --</option>
                    <option value="Econome">Econome</option>
                    <option value="Surveillant Général">Surveillant Général</option>
                    <option value="Conseiller d\'orintation">Conseiller d\'orintation</option>
                    <option value="Virgile">Virgile</option>
                    <option value="Admin">Admin</option>
                    <option value="Super Admin">Super Admin</option>
            </select>
     </div>
	
     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
       
    <div class="iladd">
        <label for="atit">Contact</label>
        <input type="text" required="required" name="tac" id="tit"  value="'.$done['tac'].'">
    </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
            
    <div class="iladd">
        <label for="atit">Adress</label>
        <input type="text" required="required" name="adr" id="tit"  value="'.$done['adr'].'">
    </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd"><label for="avid">Description</label>
            <textarea name="desc" id="desc" required="required" >'.$done['des'].'</textarea>	
    </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  