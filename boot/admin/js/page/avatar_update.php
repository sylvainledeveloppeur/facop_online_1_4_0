<?php @session_start();?>
<div class="pro after">
			  <div class="mar_auto wid_40">
              <div id="dragandrophandler">Drag & Drop Files Here</div>
              <input type="file" class="hide" id="selecthandler" name="selecthandler" >

                <br><br>
                <div id="status1"></div>
				<div><?php echo '<img class="thepic" src="img/team/'.$_SESSION['img'].'" alt=""/>'; ?></div>
			    <div class="btn btn2 udinfo">Update my informations </div>
              </div>
			 
</div>