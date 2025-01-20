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

$bloc= $tams->query(" SELECT * FROM lesson  WHERE id_les=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/lesson_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['img'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['img'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="lesson_show" data-title="Les thème" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/lesson/'.$done['img'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
            <label for="aimg">Picture Face (780 x 429)</label>		
            <input name="aimg" type="file" id="aimg" class="img_add0">
    </div>

     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->  
     
     <div class="iladd">
     <select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
             <option value="'.$done['id_pack'].' HHH '.$done['name_pack'].'">'.$done['name_pack'].'</option> 
         <option value="0">-- Formation --</option>
             '.$Beclas->selectOption2($tams, "pack", "titre", "id_pk", "titre").'
         </select>
         </div>

         <div class="iladd">
<select required="required" name="faci" class="pag_ser" id="tit" placeholder="sect">
<option value="'.$done['facile'].'">'.$done['facile'].'</option> 
		<option value="0">-- Difficulté --</option>
		<option value="Facile">Facile</option>
		<option value="Difficile">Difficile</option>
		<option value="Moyenne">Moyenne</option>
		</select>
    </div> 

     <div class="iladd">
     <label for="atit">Nom [fr]</label>
     <input type="text" required="required" name="nom" id="tit" value="'.$done['titre'].'">
   </div>
   
   <div class="iladd">
     <label for="atit">Nom [en]</label>
     <input type="text" required="required" name="nomen" id="tit" value="'.$done['titreEN'].'">
   </div>
   
   
   <div class="iladd">
     <label for="atit">Durée</label>
     <input type="text" required="required" name="dur" id="tit" value="'.$done['dure'].'">
   </div>
   
   <div class="iladd"><label for="avid">Description [fr]</label>
     <textarea name="desc" id="desc" required="required" >'.$done['des'].'</textarea>	
     </div>
     
     <div class="iladd"><label for="avid">Description [en]</label>
       <textarea name="descen" id="desc" required="required">'.$done['desEN'].'</textarea>	
       </div>


	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  