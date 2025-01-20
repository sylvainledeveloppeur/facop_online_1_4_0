<?php @session_start();?>
<div class="pro after">
			  <div class="flo_lef wid_30">
				<div><?php echo '<img src="img/team/'.$_SESSION['img'].'" alt=""/>'; ?></div>
			    <div class="btn btn2 udinfo">Update my informations </div>
			    <div class="btn btn2 udinfo mtex link" data-page="avatar_update" data-title="Update my picture">Update my picture</div>
              </div>
			  <ul class="flo_lef wid_50 ulfil">
				<form method="post" action="js/form/update_profil.php" id="fofil" name="fofil" class="Aform"> 
				
					<?php 
					$actif=$_SESSION['actif']==0? "Disactivated":"Activated";
					$actif1=$_SESSION['selec']=='null'? "Disactivated":"Activated";
					$actif2=$_SESSION['delet']=='null'? "Disactivated":"Activated";
					$actif3=$_SESSION['updat']=='null'? "Disactivated":"Activated";
					$actif4=$_SESSION['inser']=='null'? "Disactivated":"Activated";
					$actif5=$_SESSION['admin']=='null'? "Disactivated":"Activated";
					
					echo ' 
					
				 <li><em>Username :</em> '.$_SESSION['pseu'].' 
				  <input type="text" id="pse" name="pse" value="'.$_SESSION['pseu'].'"></li>
				<li><em>Last Name :</em> '.$_SESSION['nom'].'
				  <input type="text" id="nom" name="nom" value="'.$_SESSION['nom'].'"></li>
				  <li><em>First name :</em> '.$_SESSION['prenom'].'
				  <input type="text" id="pre" name="pre" value="'.$_SESSION['prenom'].'"></li>
				  <li><em>Password :</em> ******
				  <input type="password" id="pas0" name="pas0" placeholder="Old password">
				  <input type="password" id="pas" name="pas" placeholder="New or old password"></li>
				 
				  <li><em>Biography :</em> '.$_SESSION['bio'].'
				  <textarea id="bio" name="bio" >'.$_SESSION['bio'].'</textarea></li>
				  <li><em>Status of the account :</em> '.$actif.'</li>
				  <li><em>Update ( Right ):</em> '.$actif3.'</li>
				  <li><em>Insert ( Right ):</em> '.$actif4.'</li>
				  <li><em>Delete ( Right ):</em> '.$actif2.'</li>
				  <li><em>Select ( Right ):</em> '.$actif1.'</li>
				  <li><em>Access to the parameters (Administrator):</em> '.$actif5.'</li>
				  <li><em>Subscription:</em> '.$_SESSION['date'].'</li>
				  '; ?>
					<input type="submit" id="okfo" name="okfo" class="btn btn2 mar_top_40" value="Update now">
			
               <div class="eta_form"></div>
				  </form>
				</ul>
            </div>