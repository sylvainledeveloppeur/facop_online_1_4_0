<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/video_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="video_show" data-title="Les vidéos" data-parametre="id=1&type=1" >RETOUR </div>
	
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
		<option value="0">-- Thème --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM lesson  ORDER BY titre  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id_les'].'  HHH '.$done['titre'].' HHH '.$done['name_pack'].' - '.$done['titre'].'  ">'.$done['titre'].' ('.$done['name_pack'].')</option> ';

							  }	
		?>
		</select>
    </div> 

	  <div class="iladd">
  <label for="atit">Nom [fr] Ex: 1-Introduction ; 1-Formation</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Ex: 1-Formation">
</div>

<div class="iladd">
  <label for="atit">Nom [en] Ex: 1-Introduction ; 1-Formation</label>
  <input type="text" required="required" name="nomen" id="tit" placeholder="Ex: 1-Formation">
</div>


<div class="iladd">
  <label for="atit">Durée</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 5:00">
</div>
	
<div class="iladd">
    <label for="aimg">Vidéo [fr] (ID vidéo Youtube)</label>		
    <input name="img1" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 97zqEX3fJJw">
</div>

<div class="iladd">
    <label for="aimg">Vidéo [en] (ID vidéo Youtube)</label>		
      <input name="img2" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 97zqEX3fJJw">
</div>
	
	      	
<div class="iladd">
    <label for="aimg">Vidéo [fr] (ID vidéo Viméo)</label>		
    <input name="img3" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 785278555">
</div>

<div class="iladd">
    <label for="aimg">Vidéo [en] (ID vidéo Viméo)</label>		
      <input name="img4" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: 855358555">
</div>

  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  