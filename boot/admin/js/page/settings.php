	<?php @session_start(); ?>
<ul class="ulset">
		<li class="linkd" data-page="create_user" data-title="Add user"><i class="fa fa-user-plus"></i>Add user</li>
		<li class="linkd" data-page="show_user" data-title="All users"><i class="fa fa-th-list"></i>Display all users</li>
		<li class="linkd" data-page="show_control" data-title="Edit control"><i class="icon-015"></i>Control</li>
		 <?php 
		
			if (!empty($_SESSION['droit']) AND $_SESSION['droit']==2 AND !empty($_SESSION['admin']) AND $_SESSION['admin']==1)
			{		   
	 
			?>
		<li class="linkd" data-page="choose_db" data-title="Choose database (Admin)"><i class="fa fa-tasks"></i>Choose database (Admin)</li>
		<li class="linkd" data-page="choose_db_website" data-title="Choose database (Website)"><i class="fa fa-tasks"></i>Choose database (Website)</li>
		 <?php 
		   
	      }
			?>	  
	</ul>