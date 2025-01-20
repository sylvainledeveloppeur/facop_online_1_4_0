<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/audiopftp_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	

	<div    class="linkp retou" data-page="audiop_show" data-title="Audio (pack)" data-parametre="id=1&type=1" >RETOUR </div>
	
	 <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="../../source/img/avatar/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>

	<div class="orange_1">Veuillez envoyer les fichiers MP3 par FTP, dans le dossier "source/sound/pack/"</div>
	 <div class="iladd">
    <label for="aimg">Audio [fr] (mp3)</label>		
      <input name="img" type="text" required="required" id="aimg"  class="img_add0"  placeholder="Ex: a0_audio_6_fr.mp3">
      </div>

	  <div class="iladd">
    <label for="aimg">Audio [en] (mp3)</label>		
      <input name="img2" type="text" required="required" id="aimg"  class="img_add0" placeholder="Ex: a0_audio_6_en.mp3">
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
  <label for="atit">Nom [fr]</label>
  <input type="text" required="required" name="nom" id="tit" placeholder="Ex: jouer">
</div>

<div class="iladd">
  <label for="atit">Nom [en]</label>
  <input type="text" required="required" name="nomen" id="tit" placeholder="Ex: play">
</div>


<div class="iladd">
  <label for="atit">Durée:</label>
  <input type="text" required="required" name="dur" id="tit" placeholder="Ex: 2">
</div>
	
<div class="iladd hide"><label for="avid">Description PDF [fr]</label>
	<textarea name="desc" id="desc"  placeholder="Description..."></textarea>	
	</div>
	
	<div class="iladd hide"><label for="avid">Description PDF [en]</label>
		<textarea name="descen" id="desc"  placeholder="Description..."></textarea>	
		</div>
	

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  