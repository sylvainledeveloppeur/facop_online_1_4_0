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

$bloc= $tams->query(" SELECT * FROM quiz  WHERE id_q=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/quiz_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['id_q'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['id_q'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="quiz_show" data-title="Les quiz" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/avatar/avatar.png"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

         
<div class="iladd">
<select required="required" name="lan" class="pag_ser" id="tit" placeholder="sect">
    <option value="'.$done['lang_q'].'">'.$Beclas->showLang($done['lang_q']).'</option> 
		<option value="0">-- Langue --</option>
		<option value="en">Anglais</option> 
		<option value="fr">Français</option> 
		</select>
    </div> 

    <div class="iladd">
    <select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
            <option value="'.$done['idpack_q'].' HHH '.$done['idpack_q'].'">'.$done['idpack_q'].'</option> 
        <option value="0">-- Formation --</option>
            '.$Beclas->selectOption2($tams, "pack", "titre", "id_pk", "titre").'
        </select>
        </div>

	  <div class="iladd">
  <label for="atit">Question</label>
  <input type="text" required="required" name="ques" id="tit" value="'.$done['question_q'].'">
</div>

<div class="iladd">
  <label for="atit">Réponse (correct)</label>
  <input type="text" required="required" name="repo" id="tit" value="'.$done['reponse_q'].'">
</div>

<div class="iladd">
  <label for="atit">Réponse 1</label>
  <input type="text" required="required" name="repo1" id="tit" value="'.$done['reponse1_q'].'">
</div>

<div class="iladd">
  <label for="atit">Réponse 2</label>
  <input type="text" required="required" name="repo2" id="tit" value="'.$done['reponse2_q'].'">
</div>

<div class="iladd">
  <label for="atit">Réponse 3</label>
  <input type="text" required="required" name="repo3" id="tit" value="'.$done['reponse3_q'].'">
</div>

<div class="iladd">
  <label for="atit">Réponse 4</label>
  <input type="text" required="required" name="repo4" id="tit" value="'.$done['reponse4_q'].'">
</div>

	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  