<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/pdf_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="pdf_show" data-title="Les PDF" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	 <div class="iladd">
    <label for="aimg">PDF [fr] (2Mo)</label>		
      <input name="img" type="file" required="required" id="aimg"  class="img_add0">
      </div>

	  <div class="iladd">
    <label for="aimg">PDF [en] (2Mo)</label>		
      <input name="img2" type="file" required="required" id="aimg"  class="img_add0">
      </div>
 
      
<div class="iladd">
<select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Leçon --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM lesson  ORDER BY titre  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id_les'].'  HHH '.$done['titre'].'">'.$done['titre'].' ('.$done['name_pack'].')</option> ';

							  }	
		?>
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
  <label for="atit">Nbr page</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 2">
</div>
	
<div class="iladd"><label for="avid">Nom fichier PDF [fr]</label>
	<textarea name="desc" id="desc" required="required" placeholder="Ex: facop_a0_lecon1_pdf2_fr.pdf"></textarea>	
	</div>
	
	<div class="iladd"><label for="avid">Nom fichier PDF [en]</label>
		<textarea name="descen" id="desc" required="required" placeholder="Ex: facop_a0_lecon1_pdf2_en.pdf"></textarea>	
		</div>
	

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  