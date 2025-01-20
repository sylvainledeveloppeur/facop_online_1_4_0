<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/linkp_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="linkp_show" data-title="link (pack)" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	
 
      
<div class="iladd">
<select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Pack --</option>
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
  <label for="atit">Lien [fr]</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Ex: https://www.youtube.com/watch?v=97zqEX3fJJw">
</div>

<div class="iladd">
  <label for="atit">Lien [en]</label>
  <input type="text" required="required" name="nomen" id="tit" placeholder="Ex: https://www.youtube.com/watch?v=97zqEX3fJJw">
</div>

	
<div class="iladd"><label for="avid">Description lien [fr]</label>
	<textarea name="desc" id="desc"  placeholder="Description..."></textarea>	
	</div>
	
	<div class="iladd"><label for="avid">Description lien [en]</label>
		<textarea name="descen" id="desc"  placeholder="Description..."></textarea>	
		</div>
	

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  