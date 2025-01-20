<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/pack_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="pack_show" data-title="Les packs" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	 <div class="iladd">
    <label for="aimg">Picture Face (PNG - 1000 x 563)</label>		
      <input name="img" type="file" required="required" id="aimg"  class="img_add0">
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
  <label for="atit">Prix</label>
  <input type="number" required="required" name="pri" id="tit" placeholder="Prix">
</div>

<div class="iladd">
  <label for="atit">Durée</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 1 mois">
</div>

<div class="iladd hide">
  <label for="atit">Nom code</label>
  <input type="text"  name="codnam" id="tit" placeholder="Ex: facop_a1">
</div>

<div class="iladd hide">
  <label for="atit">Numéro code</label>
  <input type="text" name="codnum" id="tit" placeholder="Ex: 1">
</div>

<div class="iladd">
<select required="required" name="cer" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Certification --</option>
		<option value="1">Oui</option>
		<option value="0">Non</option>
	</select>
</div>	
      	
<div class="iladd">
    <label for="aimg">Vidéo intro [fr] (ID vidéo Youtube)</label>		
    <input name="img1" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 97zqEX3fJJw">
</div>

<div class="iladd">
    <label for="aimg">Vidéo intro [en] (ID vidéo Youtube)</label>		
      <input name="img2" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 97zqEX3fJJw">
</div>
	
	      	
<div class="iladd">
    <label for="aimg">Vidéo intro [fr] (ID vidéo Viméo)</label>		
    <input name="img3" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 785278555">
</div>

<div class="iladd">
    <label for="aimg">Vidéo intro [en] (ID vidéo Viméo)</label>		
      <input name="img4" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 855358555">
</div>

<div class="iladd"><label for="avid">Description [fr]</label>
	<textarea name="desc" id="desc" required="required" placeholder="Description[fr]..."></textarea>	
	</div>
	
	<div class="iladd"><label for="avid">Description [en]</label>
		<textarea name="descen" id="desc" required="required" placeholder="Description[en]..."></textarea>	
		</div>
	

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  