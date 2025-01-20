<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/compta_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #196eff12;width: 100%;padding: 20px 0;" enctype="multipart/form-data">
	<div class="eta_form"></div>

	

	<div    class="linkp retou" data-page="compta_show" data-title="Facop comptabilité" data-parametre="id=1&type=1" >RETOUR </div>
	
	<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="img/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>


<div class="iladd">
<select required="required" name="ope" class="pag_ser" id="tit" placeholder="sect">
       <?php 
	   if(isset($_GET['type']))
	   {

		if($_GET['type']==0)
		{
			echo '<option value="0">Retrait</option>';
		}
		else
		{
			echo '<option value="1">Dépot</option>';
		}


	   }
	     ?> 
		<option value="0">-- Opération --</option>
		<option value="0">Retrait</option> 
		<option value="1">Dépot</option> 
		</select>
    </div> 


	<div class="iladd">
  <label for="atit">Montant</label>
  <input type="number" required="required" name="mon" id="tit" placeholder="Ex: 5000">
</div>


<div class="iladd">
  <label for="atit">Motif</label>
  <input type="text" required="required" name="mot" id="tit" placeholder="Ex: Transport">
</div>
 
	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  