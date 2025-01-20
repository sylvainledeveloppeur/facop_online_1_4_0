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

$bloc= $tams->query(" SELECT * FROM pdf  WHERE id_pf=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/pdf_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="aimgh" id="imag" value="'.$done['link'].'">
  <input type="hidden" name="aimg2h" id="imag" value="'.$done['linkEN'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="pdf_show" data-title="Les PDF" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/avatar/avatar.png"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
    <label for="aimg">PDF [fr] (2Mo)</label>		
      <input name="aimg" type="file"  id="aimg"  class="img_add0">
      </div>

	  <div class="iladd">
    <label for="aimg">PDF [en] (2Mo)</label>		
      <input name="aimg2" type="file" id="aimg"  class="img_add0">
      </div>

     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->  
     
     <div class="iladd">
     <select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
             <option value="'.$done['id_les_pf'].' HHH '.$done['lesson'].'">'.$done['lesson'].'</option> 
         <option value="0">-- Formation --</option>
             '.$Beclas->selectOption2($tams, "lesson", "titre", "id_les", "titre").'
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
         <label for="atit">Nbr page</label>
         <input type="text" required="required" name="dur" id="tit" value="'.$done['pg'].'">
       </div>
         
       <div class="iladd"><label for="avid">Nom fichier PDF [fr]</label>
         <textarea name="desc" id="desc" required="required" >'.$done['link'].'</textarea>	
         </div>
         
         <div class="iladd"><label for="avid">Nom fichier PDF [en]</label>
           <textarea name="descen" id="desc" required="required" >'.$done['linkEN'].'</textarea>	
           </div>

	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


';

  }

?>
			  