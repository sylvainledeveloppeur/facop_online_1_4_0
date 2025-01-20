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

$bloc= $tams->query(" SELECT * FROM video  WHERE id_vi=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/video_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['img'].'">
  <input type="hidden" name="imag1" id="imag" value="'.$done['link'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['linkEN'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="video_show" data-title="Les vidéos" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/video/'.$done['img'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
            <label for="aimg">Picture Face (780 x 429)(optionel)</label>		
            <input name="aimg" type="file" id="aimg" class="img_add0">
    </div>

     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->  
     
     <div class="iladd">
     <select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
             <option value="'.$done['id_les_vi'].' HHH '.$done['lesson'].' HHH '.$done['lesson_code'].'">'.$done['lesson_code'].'</option> 
         <option value="0">-- Thème --</option>
             '.$Beclas->selectOption4($tams, "lesson", "titre", "id_les", "titre").'
         </select>
         </div>

     <div class="iladd">
     <label for="atit">Nom [fr] Ex: 1-Introduction ; 1-Formation </label>
     <input type="text" required="required" name="nom" id="tit" value="'.$done['titre'].'">
   </div>
   
   <div class="iladd">
     <label for="atit">Nom [en] Ex: 1-Introduction ; 1-Formation</label>
     <input type="text" required="required" name="nomen" id="tit" value="'.$done['titreEN'].'">
   </div>
   
   
   <div class="iladd">
     <label for="atit">Durée</label>
     <input type="text" required="required" name="dur" id="tit" value="'.$done['dure'].'">
   </div>
   
	
<div class="iladd">
    <label for="aimg">Vidéo [fr] (ID vidéo Youtube)</label>		
    <input name="img1" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['youtube_FR'].'">
</div>

<div class="iladd">
    <label for="aimg">Vidéo [en] (ID vidéo Youtube)</label>		
      <input name="img2" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['youtube_EN'].'">
</div>
	
	      	
<div class="iladd">
    <label for="aimg">Vidéo [fr] (ID vidéo Viméo)</label>		
    <input name="img3" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['link'].'">
</div>

<div class="iladd">
    <label for="aimg">Vidéo [en] (ID vidéo Viméo)</label>		
      <input name="img4" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['linkEN'].'">
</div>


	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  