  <form class="after foser flo_lef wid_40">
		<i class="icon-319 lenav lenav1 wid_10" title="Hide menu left"></i>
	    <i class="icon-319 lenav lenav2 wid_10"  title="Show menu left"></i>
	  
		<i class="icon-317 lenav lenav11 wid_10" title="Hide menu right"></i>
	    <i class="icon-317 lenav lenav22 wid_10"  title="Show menu right"></i>
	  
		  <input type="search" id="word" name="word" data-page="search" data-title="Search for" class="word wid_80" placeholder="Search..."><!--Search for... Code; tél; email; name; date; numéro commande-->
		 
		  <select required="required" name="pag" class="pag_ser" id="tit" placeholder="Title">
		    <option value="0">-- Rechercher dans --</option>
			<option value="user">Utilisateur</option>
			<option value="certificat">Certification</option>
		  </select>

		  <i class="fa fa-search okser" data-page="search" data-title="Search for" data-parametre="Search for"></i>
	  </form>
		<div class="thetime flo_lef wid_10" title="Time">00:00:00</div>
<div class="bmail flo_rig wid_30 after">
	    <div class="flo_lef wid_40 after linkh Qava mtex link" data-page="profil" data-title="Profile" title="User's name">
		  <div class="flo_lef wid_40d bmnom"><img src="<?php $ava=is_file('img/team/'.$_SESSION['img']) ? 'img/team/'.$_SESSION['img']: 'img/avatar.png'; 
                            echo $ava;?>" alt=""/></div>
		  <div class="flo_lef wid_65 tex_center fon_siz_14 unom">
			 <p> <?php echo $_SESSION['pseu'];?></p>
			  <p><?php echo $_SESSION['role'];?></p>
			
			</div>
        </div>
	    <ul class="flo_lef wid_60 after bnotif">
			<li class="link linkh" data-page="histo_user_show" data-title="Notifications" title="Notifications"><i class="fa fa-bell"></i>
			  <div class="bulnotifie">
			    <?php $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_historique_user
		   WHERE  lu=:pas " ) ;
           $nbr_pseudo->execute(array('pas'=>0));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<span class="bul">'.$chif_pse['nbr'].'</span>';
		   }
				?>
		      </div>
			</li>
			<li class="link linkh" data-page="message_u" data-title="Message" title="Inbox"><i class="icon-019"></i>
				<div class="bulmes">
				  <?php $nbr_pseudo=$tams->prepare("SELECT COUNT(id_m) nbr FROM _admin_message
		   WHERE id_desti_m=:pse AND lu_m=:pas " ) ;
           $nbr_pseudo->execute(array('pse'=>$_SESSION['id_admin'],'pas'=>0));
           $chif_pse=$nbr_pseudo->fetch();
   
		   if ($chif_pse['nbr']!=0)
			{
			   
	  echo  '<span class="bul">'.$chif_pse['nbr'].'</span>';
		   }
				?>
			  </div>
				</li>
			<li class="linkh linkform" title="Search"><i class="fa fa-search"></i></li>
			<li  class="linkh"><a href="log-out.php" class="sout"><i class="fa fa-sign-out" title="Log out"></i></a></li>
			<?php 
			
			if (!empty($_SESSION['droit']) AND $_SESSION['droit']==2 OR !empty($_SESSION['admin']) AND $_SESSION['admin']==1)
			{
			   
	  echo  '<li  class="link linkh" data-page="settings" data-title="Edit settings"  title="settings"><i class="icon-006"></i></li>';
			}
			?>
			
			</ul>
      </div>