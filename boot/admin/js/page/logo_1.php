 <?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<div class="eta_form tex_center"></div>
<table width="100%" border="1" class="utable utable_1">
  <tbody>
    <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Logo</th>
      <th scope="col">Editor</th>
    </tr>
	   </thead>
	   <!--555555555-->
        <tr>
		      <td scope="col" data-title="No">1</td>
      <td scope="col" data-title="Image"><img src="../../../../source/img/logo/logo.png"  alt=""/></td>
      <td scope="col" data-title="Editor">
		<form id="fo" name="fo" method="post" class="fosli" action="js/form/edit_img_sql.php">
			(192px x 192px, PNG )<br>

		  <input type="file" id="mg1" name="mg1" class="slimg">
			<input type="hidden" id="chemin" name="chemin" value="../../../../source/img/logo/logo.png">
			<input type="submit" value="Modify">
		 
          </form>
	  </td>
    </tr> 
        
	  
  </tbody>
</table>