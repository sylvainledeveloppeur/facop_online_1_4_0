<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/lesson_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="lesson_show" data-title="Les thème" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	 <div class="iladd">
    <label for="aimg">Picture Face (780 x 429)</label>		
      <input name="img" type="file" required="required" id="aimg"  class="img_add0">
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
<select required="required" name="faci" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Difficulté --</option>
		<option value="Facile">Facile</option>
		<option value="Difficile">Difficile</option>
		<option value="Moyenne">Moyenne</option>
		</select>
    </div> 

	  <div class="iladd">
  <label for="atit">Nom [fr]</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Ex: jouer">
</div>

<div class="iladd">
  <label for="atit">Nom [en]</label>
  <input type="text" required="required" name="nomen" id="tit" placeholder="Ex: play">
</div>


<div class="iladd">
  <label for="atit">Durée</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 1 mois">
</div>
	
<div class="iladd"><label for="avid">Description [fr]</label>
	<textarea name="desc" id="desc" required="required" placeholder="Description[fr]..."></textarea>	
	</div>
	
	<div class="iladd"><label for="avid">Description [en]</label>
		<textarea name="descen" id="desc" required="required" placeholder="Description[en]..."></textarea>	
		</div>
	

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  