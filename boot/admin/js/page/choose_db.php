<?php @session_start(); 
require_once('../db_2_js.class.php');?> 
 <div class="backadmin btn linkd mar_bot_40" data-page="settings" data-title="Edit settings"><i class="fa fa-arrow-circle-o-left"></i>Go back</div>

<form id="fomes2" name="fomes2" method="post" action="js/form/choose_db.php" class="Aform fomes" >
	<?php 
	if(is_file("../../config/dev.ini"))
	echo '<p class="typedbdev"><i class="fa fa-warning"></i> Your database is in "Development mode"</p>';
	else if(is_file("../../config/prod.ini"))
	echo '<p class="typedbprod"><i class="fa fa-warning"></i> Your database is in "Production mode"</p>';
	
	
	?>
			    <div class="eta_form"></div>
<select id="typ" name="typ">
	
			    <option value="null">-- Database type --</option>
					<option value="dev">Development</option>
					<option value="prod">Production</option>
				
					</select>
	
	
				  <input type="text" id="host" name="host" placeholder="Host" >
				  <input type="text" id="db" name="db" placeholder="Database name" >
				  <input type="text" id="user" name="user" placeholder="Username" >
				  <input type="password" id="pas" name="pas" placeholder="Password" >
	 

	
				  <input type="submit" id="ok" name="ok">
              </form>
			  