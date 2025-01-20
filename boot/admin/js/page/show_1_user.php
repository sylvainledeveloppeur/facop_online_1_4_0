			  <div class="backadmin btn linkd" data-page="show_user" data-title="All users"><i class="fa fa-arrow-circle-o-left"></i>Go back</div>

 <?php  @session_start(); 

require_once('../db_2_js.class.php');

?> 

<h1 class="h1"><span>User information</span></h1>

			

	

	<div class="pro after">

			  <div class="flo_lef wid_30">

				<div><?php

					

					$bloc=$tams->query('SELECT * FROM _admin_team WHERE id=\''.$_GET['id'].'\' ');

						

				  $ii=1;

				while($done=$bloc->fetch())

				{

					

					echo '<img src="img/team/'.$done['img_team'].'" alt=""/>'; 

					

					?></div>

			    <div class="btn udinfo">Update </div>

              </div>

			  <ul class="flo_lef wid_50 ulfil">

				<form method="post" action="js/form/update_user_right.php" id="fofil" name="fofil" class="Aform"> 

				

					<?php $actif=$done['actif']==0? "Disactivated":"Activated";

					$actif1=$done['selec']=="null"? "Disactivated":"Activated";

					$actif2=$done['delet']=="null"? "Disactivated":"Activated";

					$actif3=$done['updat']=="null"? "Disactivated":"Activated";

					$actif4=$done['inser']=="null"? "Disactivated":"Activated";

					$actif5=$done['admin']=="null"? "Disactivated":"Activated";

					

					

					$valu1=$done['selec']=="null"? "null":1;

					$valu2=$done['delet']=="null"? "null":1;

					$valu3=$done['updat']=="null"? "null":1;

					$valu4=$done['inser']=="null"? "null":1;

					$valu5=$done['admin']=="null"? "null":1;

					

					

					$actifr1=$done['selec']=="null"? '<i class="fa fa-circle-o chek nchek" ></i>

					<i class="fa fa-check-circle chek ochek" ></i>':'<i class="fa fa-circle-o chek nchek" style="display: none;" ></i>

					<i class="fa fa-check-circle chek ochek" style="display: inline;" ></i>';

					$actifr2=$done['delet']=="null"? '<i class="fa fa-circle-o chek nchek" ></i>

					<i class="fa fa-check-circle chek ochek" ></i>':'<i class="fa fa-circle-o chek nchek" style="display: none;" ></i>

					<i class="fa fa-check-circle chek ochek" style="display: inline;" ></i>';

					$actifr3=$done['updat']=="null"? '<i class="fa fa-circle-o chek nchek" ></i>

					<i class="fa fa-check-circle chek ochek" ></i>':'<i class="fa fa-circle-o chek nchek" style="display: none;" ></i>

					<i class="fa fa-check-circle chek ochek" style="display: inline;" ></i>';

					$actifr4=$done['inser']=="null"? '<i class="fa fa-circle-o chek nchek" ></i>

					<i class="fa fa-check-circle chek ochek" ></i>':'<i class="fa fa-circle-o chek nchek" style="display: none;" ></i>

					<i class="fa fa-check-circle chek ochek" style="display: inline;" ></i>';

					$actifr5=$done['admin']=="null"? '<i class="fa fa-circle-o chek nchek" ></i>

					<i class="fa fa-check-circle chek ochek" ></i>':'<i class="fa fa-circle-o chek nchek" style="display: none;" ></i>

					<i class="fa fa-check-circle chek ochek" style="display: inline;" ></i>';

					echo '

					

					<div class="uppriv">

					<div class="line_form after">

				<label for="pse">Password:</label>

				  <input type="password" id="pas" name="pas" placeholder="Update password or leave it empty">

				  

				</div>

				

				  <h1 class="h1"><span>Global privileges</span></h1>

				<div class="line_form after">

				<p for="pse">

					'.$actifr1.'

					Display

					<input id="sel" name="sel" value="'.$valu1.'" type="hidden">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse">'.$actifr3.'

					Modification

					<input id="upd" name="upd" value="'.$valu3.'" type="hidden">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse">'.$actifr2.'

					Deletion

					<input id="del" name="del" value="'.$valu2.'" type="hidden">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse">'.$actifr4.'

					Insertion

					<input id="ins" name="ins" value="'.$valu4.'" type="hidden">

				  </p>

				  

				</div>

				<div class="line_form after">

				<p for="pse">'.$actifr5.'

					Access to the parameters (Administrator)

					<input id="admin" name="admin" value="'.$valu5.'" type="hidden">

					

					

				  </p>

				  <input id="leid" name="leid" value="'.$_GET['id'].'" type="hidden">

					<input id="psee" name="psee" value="'.strtoupper($done['pseudo']).'" type="hidden">

				</div>
				
				<h1 class="h1"><span>Pages associées</span></h1>
	
	<div class="line_form after">';

		
		$arrayPage=explode(" HHH ", $done['page']);
					
		  $bloc= $tams->query(" SELECT * FROM _admin_page  WHERE cat!='USE' AND cat!='SYS' "  );

			
			 while($doneP=$bloc->fetch()) 
			  { 
				 $nochec=in_array($doneP['id_pg'],$arrayPage) ? 'style="display: none;"':"";
				 $okchec=in_array($doneP['id_pg'],$arrayPage) ? 'style="display: inline;"':"";
					 
                  echo '<div class="after linepag">
				  <div class="flo_lef wid_5">
					  <i class="fa fa-circle-o chek icoChek nochek" data-page="'.$doneP['id_pg'].'" data-chek="nochek" '.$nochec.'></i>
					  <i class="fa fa-check-circle chek icoChek okchek" data-page="'.$doneP['id_pg'].'" data-chek="okchek" '.$okchec.'></i>
                 </div>
					  <div class="flo_lef wid_80">'.$doneP['title'].'
					  <span>'.$doneP['des'].'</span></div>

				       </div>';
				  
			  }
		
        echo '<input type="hidden" id="pag" name="pag" value="'.$done['page'].'">   
				  

				</div>

				 </div>

					

					<input type="submit" id="okfo" name="okfo" class="btn mar_top_40" value="Update now">

			

               <div class="eta_form"></div>

					

				 <li>Username: '.$done['pseudo'].' </li>

				<li>Last name: '.$done['nom_team'].'</li>

				  <li>First name: '.$done['prenom_team'].'</li>

				  <li>Password: ******</li>

				  <li>Post: '.$done['nb_arti_team'].'</li>

				  <li>Biography: '.$done['about_team'].'</li>

				  <li>Status  : '.$actif.'</li>

				  <li>UPDATE (right ): '.$actif3.'</li>

				  <li>INSERT ( Droit ): '.$actif4.'</li>

				  <li>DELETE ( Droit ): '.$actif2.'</li>

				  <li>SELECT ( Droit ): '.$actif1.'</li>

				  <li>Settings (Administrator): '.$actif5.'</li>

				  <li>Sign up: '.$done['date_team'].'</li>

				  

				  

				  

				  '; 

				}?>

					

				  </form>

				</ul>

            </div>

		