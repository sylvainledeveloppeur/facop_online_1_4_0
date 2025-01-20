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

$bloc= $tams->query(" SELECT * FROM book  WHERE id_bk=".$_GET["id"]." "  );


   while($done=$bloc->fetch()) 
		  {  
     

	   	echo '

<form name="TAform" action="js/manage_form/book_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;">

  <input type="hidden" required="required" name="id" id="id" value="'.$_GET['id'].'">
  
  <input type="hidden" name="imag" id="imag" value="'.$done['img_bk'].'">
  <input type="hidden" name="imag1" id="imag" value="'.$done['linkFR_bk'].'">
  <input type="hidden" name="imag2" id="imag" value="'.$done['linkEN_bk'].'">
	 
	<div class="eta_form"></div>
    
	<div  class="linkp retou" data-page="book_show" data-title="Les livres" data-parametre="id=1&type=1" >RETOUR </div>
	
    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <div class="iladd">
         <img src="../../source/img/book/'.$done['img_bk'].'"  width="100" height="100" alt="" class="img_add1" />
    </div>

    <!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

   
	 <div class="iladd"> 
     <label for="aimg">Photo (400 x 600)px</label>		
     <input name="aimg" type="file"  id="aimg"  class="img_add0">
    </div>
 
           
 <div class="iladd">
     <label for="aimg">Fichier PDF [fr]</label>		
     <input name="aimg1" type="file"  id="aimg"  class="img_add0">
 </div>
 
 <div class="iladd">
     <label for="aimg">Fichier PDF [en]</label>		
       <input name="aimg2" type="file"  id="aimg"  class="img_add0">
 </div>
 
       <div class="iladd">
   <label for="atit">Titre [fr]</label>
   <input type="text" required="required" name="nom" id="tit" value="'.$done['titreFR_bk'].'">
 </div>
 
 <div class="iladd">
   <label for="atit">Titre [en]</label>
   <input type="text" required="required" name="nomen" id="tit" value="'.$done['titreEN_bk'].'">
 </div>
 
 <div class="iladd">
   <label for="atit">Auteur</label>
   <input type="text" required="required" name="aut" id="tit"  value="'.$done['auteur_bk'].'">
 </div>
 
 <div class="iladd">
   <label for="atit">Durée lecture</label>
   <input type="text" required="required" name="dur" id="tit"  value="'.$done['duree_bk'].'">
 </div>
 
 
 
 <div class="iladd">
   <label for="atit">Nombre de page</label>
   <input type="number" required="required" name="pg" id="tit"  value="'.$done['pg_bk'].'">
 </div>
 
 
       <div class="iladd"><label for="avid">Description [fr]</label>
     <textarea name="desc" id="desc" required="required" >'.$done['descFR_bk'].'</textarea>	
     </div>
     
     <div class="iladd"><label for="avid">Description [en]</label>
         <textarea name="descen" id="desc" required="required" >'.$done['descEN_bk'].'</textarea>	
         </div>
 
   <input name="aok" id="aok" type="submit" value="Enregistrer">
	
	
	
</form>


';

  }

?>
			  