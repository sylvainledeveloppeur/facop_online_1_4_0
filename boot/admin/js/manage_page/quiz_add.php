<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/quiz_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="quiz_show" data-title="Les quiz" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

<div class="iladd">
<select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Formation --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM pack  ORDER BY titre  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id_pk'].'  HHH '.$done['titre'].'">'.$done['titre'].'</option> ';

							  }	
		?>
		</select>
    </div> 
	     
<div class="iladd">
<select required="required" name="lan" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Langue --</option>
		<option value="en">Anglais</option> 
		<option value="fr">Français</option> 
		</select>
    </div> 

	  <div class="iladd">
  <label for="atit">Question</label>
  <input type="text" required="required" name="ques" id="tit" placeholder="Ex: Qui est le tout puissant">
</div>

<div class="iladd">
  <label for="atit">Réponse (correct)</label>
  <input type="text" required="required" name="repo" id="tit" placeholder="Ex: Dieu">
</div>

<div class="iladd">
  <label for="atit">Réponse 1</label>
  <input type="text" required="required" name="repo1" id="tit" placeholder="Ex: Sangokou">
</div>

<div class="iladd">
  <label for="atit">Réponse 2</label>
  <input type="text" required="required" name="repo2" id="tit" placeholder="Ex: Jesus">
</div>

<div class="iladd">
  <label for="atit">Réponse 3</label>
  <input type="text" required="required" name="repo3" id="tit" placeholder="Ex: Dieu">
</div>

<div class="iladd">
  <label for="atit">Réponse 4</label>
  <input type="text" required="required" name="repo4" id="tit" placeholder="Ex: Paul Biya">
</div>
	
	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  