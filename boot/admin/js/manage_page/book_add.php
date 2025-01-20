<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/book_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div  class="linkp retou" data-page="book_show" data-title="Les Livres" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
   </div>

	 <div class="iladd"> 
    <label for="aimg">Photo (400 x 600)px</label>		
    <input name="img" type="file" required="required" id="aimg"  class="img_add0">
   </div>

      	
<div class="iladd">
    <label for="aimg">Fichier PDF [fr]</label>		
    <input name="img1" type="file" required="required" id="aimg"  class="img_add0">
</div>

<div class="iladd">
    <label for="aimg">Fichier PDF [en]</label>		
      <input name="img2" type="file" required="required" id="aimg"  class="img_add0">
</div>

	  <div class="iladd">
  <label for="atit">Titre [fr]</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Ex: La vie">
</div>

<div class="iladd">
  <label for="atit">Titre [en]</label>
  <input type="text" required="required" name="nomen" id="tit" placeholder="Ex: The life">
</div>

<div class="iladd">
  <label for="atit">Auteur</label>
  <input type="text" required="required" name="aut" id="tit" placeholder="Ex: Lucas">
</div>

<div class="iladd">
  <label for="atit">Durée lecture</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 1 mois">
</div>



<div class="iladd">
  <label for="atit">Nombre de page</label>
  <input type="number" required="required" name="pg" id="tit" placeholder="Ex: 258">
</div>


      <div class="iladd"><label for="avid">Description [fr]</label>
	<textarea name="desc" id="desc" required="required" placeholder="Description[fr]..."></textarea>	
	</div>
	
	<div class="iladd"><label for="avid">Description [en]</label>
		<textarea name="descen" id="desc" required="required" placeholder="Description[en]..."></textarea>	
		</div>

  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  