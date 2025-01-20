<div class="top pos_rel"><i class="fa fa-navicon flo_lef snav" title="Show menu"></i><i class="fa fa-group flo_lef steam" title="Show team"></i>
	<img src="img/tamstechn_logo.png" alt=""/> CONTROL PANEL <i class="fa fa-sort-up flo_rig lleava2" title="Show picture"></i><i class="fa fa-sort-down flo_rig lleava1" title="Hide picture"></i></div>
<div class="thenav">
	<i class="fa fa-remove flo_lef hnav" title="Hide menu"></i>
  <div class="bavata borbas tex_center">
    <div class="aava"><img src="img/team/<?php echo $_SESSION['img'];?>" alt=""/></div>
    <div class="nom"><?php echo $_SESSION['prenom'].' '. $_SESSION['nom'];?></div>
    <div class="role"><?php echo $_SESSION['role'];?></div>
    </div><!---->
    
  <ul class="ulmenu borbas">
    <li>
      <div class="mtex link" data-page="home" data-title="welcome page"><i class="fa fa-home"></i>Home</div>
    </li>
    <li>
      <div class="mtex link2"><i class="fa fa-user"></i>My account <i class="fa fa-sort-up flo_rig"></i><i class="fa fa-sort-down flo_rig"></i></div>
      <ul class="ulsou">
		  <?php 
		  
		$bloc= $tams->query(" SELECT * FROM _admin_page WHERE cat='USE' ORDER BY title ASC "  );

         while($done=$bloc->fetch()) 
		  { 
				  echo ' <li> 
                    <div class="mtex '.$done['link'].'" data-page="'.$done['pg'].'" data-title="'.$done['title'].'" data-root="'.$done['root'].'" title="'.$done['des'].'" ><i class="'.$done['icon'].'"></i>'.$done['title'].'</div>
                  </li><!---->';	 
			
		  }
		  ?>
        
        
        </ul>
      
    </li>
   
	  
    
    
    </ul><!---->
 
  <ul class="ulfoot borbas">
    
    <li>

    <?php 
		   $arrayPage=explode(" HHH ", $_SESSION['page']);
		//Admin pages
		$bloc= $tams->query(" SELECT * FROM _admin_page WHERE cat!='USE' AND cat!='SYS' ORDER BY title ASC "  );

		echo '<div class="mtex link2"><i class="fa fa-server"></i>Administration pages <i class="fa fa-sort-up flo_rig"></i><i class="fa fa-sort-down flo_rig"></i></div>
          <ul class="ulsou">';
         while($done=$bloc->fetch()) 
		  { 
		   
			 if(in_array($done['id_pg'],$arrayPage))
			 {
				  echo ' <li> 
                    <div class="mtex '.$done['link'].'" data-page="'.$done['pg'].'" data-title="'.$done['title'].'" data-root="'.$done['root'].'" title="'.$done['des'].'" ><i class="'.$done['icon'].'"></i>'.$done['title'].'</div>
                  </li><!---->';	 
			 }
		 
		  
		  }
		echo '</ul>';
		
		
      ?>

   

      </li>     
      </ul>

  <!--footer-->
  
  <ul class="ulfoot borbas">
	  <?php 
		  
		$bloc= $tams->query(" SELECT * FROM _admin_page WHERE cat='SYS' ORDER BY title ASC "  );

         while($done=$bloc->fetch()) 
		  { 
				  echo ' <li> 
                    <div class="mtex '.$done['link'].'" data-page="'.$done['pg'].'" data-title="'.$done['title'].'" data-root="'.$done['root'].'" title="'.$done['des'].'" ><i class="'.$done['icon'].'"></i>'.$done['title'].'</div>
                  </li><!---->';	 
			
		  }
		  ?>
    <li>
      <div class="mtex">
        <?php 
         echo '<div class="bot tex_center thever">'.$_SESSION['namversion'].' '.$_SESSION['version'].'</div>';
	 ?>
        </div>
    </li>
  </ul><!----></div>
