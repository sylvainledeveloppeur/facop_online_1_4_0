<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');


/* $select=''; 

	$bloc=$tams->query(' SELECT * FROM  sousmodel ORDER BY  id DESC ');
						
    $ii=1;
    while($done=$bloc->fetch())
        {
           $select.= '<option value="'.$done['id'].'-BT-'.$done['titre'].'">'.$done['titre'].'</option>'; 
        } */

$bloc= $tams->query(" SELECT * FROM pack_audio  WHERE id_pf=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/audiopftp_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="aimgh" id="imag" value="'.$done['link'].'">
  <input type="hidden" name="aimg2h" id="imag" value="'.$done['linkEN'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="audiop_show" data-title="Audio(pack)" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/avatar/avatar.png"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->


	<div class="orange_1">Veuillez envoyer les fichiers MP3 par FTP, dans le dossier "source/sound/pack/"</div>
     
         <div class="iladd">
         <label for="atit">Audio [fr] (mp3)</label>
         <input type="text" required="required" name="nom" id="tit" value="'.$done['link'].'">
       </div>
       
       <div class="iladd">
         <label for="atit">Audio [en] (mp3)</label>
         <input type="text" required="required" name="nomen" id="tit" value="'.$done['linkEN'].'">
       </div>
	   
        <div class="iladd">
     <select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
             <option value="'.$done['id_pk_pf'].' HHH '.$done['pack'].'">'.$done['pack'].'</option> 
         <option value="0">-- Formation --</option>
             '.$Beclas->selectOption2($tams, "pack", "titre", "id_pk", "titre").'
         </select>
         </div>
		 
       <div class="iladd"><label for="avid">Nom [fr]</label>
         <textarea name="desc" id="desc"  >'.$done['titre'].'</textarea>	
         </div>
         
         <div class="iladd"><label for="avid">Nom [en]</label>
           <textarea name="descen" id="desc"  >'.$done['titreEN'].'</textarea>	
           </div>

<div class="iladd">
  <label for="atit">Durée:</label>
  <input type="text" required="required" name="dur" id="tit" value="'.$done['pg'].'">
</div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  