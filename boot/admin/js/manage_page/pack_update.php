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

$bloc= $tams->query(" SELECT * FROM pack  WHERE id_pk=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     
        $ouiCerti=$done['certificat']==1 ? 'Oui':'Non';

	   	echo '

<form name="TAform" action="js/manage_form/pack_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['img'].'">
  <input type="hidden" name="imag1" id="imag" value="'.$done['introFR'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['introEN'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="pack_show" data-title="Staff" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/pack/'.$done['img'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
            <label for="aimg">Picture Face (600 x 600)</label>		
            <input name="aimg" type="file" id="aimg" class="img_add0">
    </div>

     <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

     <div class="iladd">
     <label for="atit">Nom [fr]</label>
     <input type="text" required="required" name="nom" id="tit" value="'.$done['titre'].'">
   </div>
   
   <div class="iladd">
     <label for="atit">Nom [en]</label>
     <input type="text" required="required" name="nomen" id="tit" value="'.$done['titreEN'].'">
   </div>
   
   <div class="iladd">
     <label for="atit">Prix</label>
     <input type="number" required="required" name="pri" id="tit" value="'.$done['prix'].'">
   </div>
   
   <div class="iladd">
     <label for="atit">Durée</label>
     <input type="text" required="required" name="dur" id="tit" value="'.$done['dure'].'">
   </div>
   
   <div class="iladd hide">
     <label for="atit">Nom code</label>
     <input type="text" required="required" name="codnam" id="tit" value="'.$done['codeName'].'">
   </div>
   
   <div class="iladd hide">
     <label for="atit">Numéro code</label>
     <input type="text" required="required" name="codnum" id="tit" value="'.$done['codeNbr'].'">
   </div>
   
<div class="iladd">
<select required="required" name="cer" class="pag_ser" id="tit" placeholder="sect">
<option value="'.$done['certificat'].'">'.$ouiCerti.'</option>
		<option value="0">-- Certification --</option>
		<option value="1">Oui</option>
		<option value="0">Non</option>
	</select>
</div>	

<div class="iladd">
    <label for="aimg">Vidéo intro [fr] (ID vidéo Youtube)</label>		
    <input name="img1" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['youtube_FR'].'">
</div>

<div class="iladd">
    <label for="aimg">Vidéo intro [en] (ID vidéo Youtube)</label>		
      <input name="img2" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['youtube_EN'].'">
</div>
	
	      	
<div class="iladd">
    <label for="aimg">Vidéo intro [fr] (ID vidéo Viméo)</label>		
    <input name="img3" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['introFR'].'">
</div>

<div class="iladd">
    <label for="aimg">Vidéo intro [en] (ID vidéo Viméo)</label>		
      <input name="img4" type="text" required="required" id="aimg"  class="img_add0" value="'.$done['introEN'].'">
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
			  