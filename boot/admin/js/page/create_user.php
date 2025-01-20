<?php @session_start(); 

require_once('../db_2_js.class.php');?> 

<form class="pg_use after Aform pos_rel" id="foadu" name="foadu" action="js/form/create_user.php" method="post">

			  <div class="backadmin btn linkd" data-page="settings" data-title="Edit settings"><i class="fa fa-arrow-circle-o-left"></i>Go back</div>

<h1 class="h1"><span>User informations</span></h1>

			  <div class="line_form after">

				<label for="pse">Username:</label>

				  <input type="text" id="pse" name="pse" placeholder="Username">

				  

				</div>

				<div class="line_form after">

				<label for="pse">Password:</label>

				  <input type="password" id="pas" name="pas" placeholder="Password">

				  

				</div>

				<div class="line_form after">

				<label for="pse">Role :</label>

				  <select id="rol" name="rol" placeholder="Role">

					<option value="null">---Poste---</option>

				    <?php 

		$bloc =$tams->query('SELECT * FROM staff  ORDER BY pos  ASC ');



													  

							  while($done=$bloc->fetch())

							  { 

								

					  echo '  <option value="'.$done['pos'].'">'.$done['pos'].'</option> ';



							  }	

		?>

					</select>

				  

				</div>

			  <h1 class="h1"><span>Global privileges</span></h1>

				<div class="line_form after">

				<p for="pse">

					<i class="fa fa-circle-o chek nchek"></i>

					<i class="fa fa-check-circle chek ochek"></i>

					Display

					<input type="hidden" id="sel" name="sel" value="null">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse"><i class="fa fa-circle-o chek nchek"></i>

					<i class="fa fa-check-circle chek ochek"></i>

					Modification

					<input type="hidden" id="upd" name="upd" value="null">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse"><i class="fa fa-circle-o chek nchek"></i>

					<i class="fa fa-check-circle chek ochek"></i>

					Deletion

					<input type="hidden" id="del" name="del" value="null">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse"><i class="fa fa-circle-o chek nchek"></i>

					<i class="fa fa-check-circle chek ochek"></i>

					Insertion

					<input type="hidden" id="ins" name="ins" value="null">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse"><i class="fa fa-circle-o chek nchek adchek"></i>

				  <i class="fa fa-check-circle chek ochek"></i>

					Access to the parameters (Administrator)

					<input type="hidden" id="admin" name="admin" value="null">

				  </p>

				  

				</div>
	
	
	  <h1 class="h1"><span>Pages associées</span></h1>
	
	<div class="line_form after">

		<?php 
		
		  $bloc= $tams->query(" SELECT * FROM _admin_page WHERE  cat!='USE' AND cat!='SYS' ORDER BY title ASC "  );

			
			 while($done=$bloc->fetch()) 
			  { 
                  echo '<div class="after linepag">
				  <div class="flo_lef wid_5">
					  <i class="fa fa-circle-o chek icoChek nochek" data-page="'.$done['id_pg'].'" data-chek="nochek"></i>
					  <i class="fa fa-check-circle chek icoChek okchek" data-page="'.$done['id_pg'].'" data-chek="okchek"></i>
                 </div>
					  <div class="flo_lef wid_80">'.$done['title'].'
					  <span>'.$done['des'].'</span></div>

				       </div>';
				  
			  }
		?>
        <input type="hidden" id="pag" name="pag" value="0">   
				  

				</div>

				<input type="submit" id="okfo" name="okfo" class="btn mar_top_40" value="Save user">

			  <div class="bot">.</div>

<div class="eta_form"></div>

            </form>