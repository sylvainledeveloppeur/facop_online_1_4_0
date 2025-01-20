<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/staff_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div> 


	<div    class="linkp retou" data-page="staff_show" data-title="Staff" data-parametre="id=1&type=1" >RETOUR </div>
	
	   <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	<div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	 <div class="iladd">
    <label for="aimg">Picture Face (600 x 600)</label>		
      <input name="img" type="file" required="required" id="aimg" class="img_add0">
      </div>

  
	
	<div class="iladd">
  <label for="atit">Nom</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Nom">
</div>
	
<div class="iladd">
<select required="required" name="pos" class="pag_ser" id="tit" placeholder="Poste">
		<option value="0">-- Poste --</option>
			<option value="Econome">DG</option>
			<option value="Surveillant Général">Monteur vodéo</option>
			<option value="Conseiller d'orintation">Programmeur</option>
			<option value="Virgile">Marketing</option>
			<option value="Admin">Admin</option>
			<option value="Super Admin">Super Admin</option>
		</select>
    </div>

<div class="iladd">
  <label for="atit">Contact</label>
  <input type="text" required="required" name="tac" id="tit" placeholder="Contact">
</div>
	
<div class="iladd">
  <label for="atit">Adress</label>
  <input type="text" required="required" name="adr" id="tit" placeholder="Adress">
</div>
	
	<!--
	<div class="iladd hid">
  <label for="awor">Old price</label>	
  <input type="text"  name="oprice" id="oprice" placeholder="Old price">
</div>-->
	
	
	
<div class="iladd"><label for="avid">Description</label>
	<textarea name="desc" id="desc" required="required" placeholder="Description..."></textarea>	
	</div>

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  