<?php @session_start(); 
require_once('../db_2_js.class.php');?> 

<form name="TAform" action="js/manage_form/user_book_add_sql.php" method="post" id="TAform" class="fosli" style="background-color: #196eff12;width: 100%;padding: 20px 0;" enctype="multipart/form-data">
	<div class="eta_form"></div>

	

	<div    class="linkp retou" data-page="user_book_show" data-title="Les livres utilisateur" data-parametre="id=1&type=1" >RETOUR </div>
	
	<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

	 <div class="iladd">
         <img src="img/avatar.png" class="img_add1"  width="100" height="100" alt=""/>
    </div>


<div class="iladd">
<select required="required" name="user" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Utilisateur --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM user  ORDER BY pseudo  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id'].' HHH '.$done['pseudo'].'">'.$done['pseudo'].'</option> ';

							  }	
		?>
		</select>
    </div> 

<div class="iladd">
<select required="required" name="nivo" class="pag_ser" id="tit" placeholder="sect">
		<option value="0">-- Livre --</option>
		<?php 
		$bloc =$tams->query('SELECT * FROM book  ORDER BY titreFR_bk  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					          echo '<option value="'.$done['id_bk'].' HHH '.$done['titreFR_bk'].'">'.$done['titreFR_bk'].'</option> ';

							  }	
		?>
		</select>
    </div> 
 
	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  