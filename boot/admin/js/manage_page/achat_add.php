<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/achat_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #196eff12;width: 100%;padding: 20px 0;" enctype="multipart/form-data">
	<div class="eta_form"></div>

	

	<div    class="linkp retou" data-page="achat_show" data-title="Les achats" data-parametre="id=1&type=1" >RETOUR </div>
	
	<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="img/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>


<div class="iladd">
<select required="required" name="user" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Utilisateur --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM user  ORDER BY pseudo  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id'].' HHH '.$done['pseudo'].'">'.$done['pseudo'].'</option> ';

							  }	
		?>
		</select>
    </div> 

<div class="iladd">
<select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Formation --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM pack  ORDER BY titre  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id_pk'].' HHH '.$done['codeName'].' HHH '.$done['codeNbr'].' HHH '.$done['titre'].' HHH '.$done['prix'].'">'.$done['titre'].'</option> ';

							  }	
		?>
		</select>
    </div> 
 
	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  