<?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<form class="pg_use after Aform pos_rel" id="foadu" name="foadu" action="js/form/show_control.php" method="post">
			  <div class="backadmin btn linkd" data-page="settings" data-title="Edit settings"><i class="fa fa-arrow-circle-o-left"></i>Go back</div>
<h1 class="h1"><span>Controls settings </span></h1>
	<?php 
	$blocc=$tams->query(' SELECT * FROM _admin_control WHERE id=1 ');//load contol settings 
						
				while($done=$blocc->fetch())
				{
			$out= $_SESSION['time_out']/60/1000;
				
	 ?>
	
	<div class="line_form after">
				<label for="pse">Log out time:</label>
				  <select id="rol" name="log" placeholder="Role">
					  <?php echo'<option value="'.$_SESSION['time_out'].'">---'.$out.' min---</option>';?>
					<option value="0">---Duration---</option>
					<option value="120000">2 min</option>
					<option value="300000">5 min</option>
					<option value="600000">10 min</option>
					<option value="900000">15 min</option>
					<option value="1800000">30 min</option>
					<option value="3600000">60 min</option>
					</select>
				  
				</div>	
	
	<div class="line_form after">
				<label for="pse">Display rows:</label>
				  <select id="rol" name="row" >
					  
					  <?php echo'<option value="'.$_SESSION['nbr_ParPage'].'">---'.$_SESSION['nbr_ParPage'].'---</option>';?>
					<option value="0">---Rows per page---</option>
					<option value="10">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="75">75</option>
					<option value="100">100</option>
					</select>
				  
				</div>
	
	<div class="line_form after">
				<label for="pse">Background:</label>
				  <select id="rol" name="back" >
					  
					  <?php echo'<option value="'.$_SESSION['back1'].'">---'.$_SESSION['back1'].'---</option>';?>
					<option value="0">---Background image---</option>
					<option value="0">None</option>
					<option value="flou">Flou</option>
					<option value="viol">Viol</option>
					<option value="tech">Tech</option>
					<option value="light">Light</option>
					<option value="bee">Bee</option>
					<option value="sky">Sky</option>
					<option value="bridge">Bridge</option>
					<option value="barcelona">Barcelona</option>
					<option value="barcelona2">Barcelona2</option>
					<option value="cameroon">Cameroon</option>
					<option value="cameroon2">Cameroon2</option>
					<option value="chelsea">Chelsea</option>
					<option value="chelsea2">Chelsea2</option>
					<option value="harry_potter">Harry_potter</option>
					<option value="harry_potter2">Harry_potter2</option>
					<option value="lliverpool">lliverpool</option>
					<option value="lliverpool2">lliverpool2</option>
					<option value="matrix">Matrix</option>
					<option value="matrix2">Matrix2</option>
					<option value="psg">Psg</option>
					<option value="psg2">Psg2</option>
					<option value="real_madrid">Real_madrid</option>
					<option value="real_madrid2">Real_madrid2</option>
					</select>
				  
				</div>
	<?php }?>
			  <div class="line_form after hide">
				<label for="pse">Name Version:</label>
				  <input type="text" id="pse" name="namver"  value="BeeAdmin">
				  
				</div>
	
	<div class="line_form after hide">
				<label for="pse">Version:</label>
				  <input type="text" id="pse" name="ver"  value="5.0.0">
				  
				</div>
	
	<div class="line_form after hide">
				<label for="pse">id:</label>
				  <input type="text" id="pse" name="leid"  value="1">
				  
				</div>
		
				
				<input type="submit" id="okfo" name="okfo" class="btn mar_top_40" value="Save user">
			  <div class="bot">.</div>
<div class="eta_form"></div>
            </form>