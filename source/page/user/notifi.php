<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes Notifications</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
              $nbr_pseudo=$tams->prepare("SELECT COUNT(id_noti) nbr FROM user_notification
                                 WHERE  id_user_noti=:pse OR id_user_noti=0 " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$id));
                                 $chif_pse=$nbr_pseudo->fetch();
      
                                     if ($chif_pse['nbr']!=0)
                                      {
										  echo '<h2 class="h2 tex_cen">Total : '.$chif_pse['nbr'].'</h2>';
        $query = $tams->query("Select * FROM user_notification WHERE  id_user_noti=$id OR id_user_noti=0  ORDER BY id_noti DESC LIMIT 10 "); 
        $outils = array(); 
        while ($outil = $query->fetch())
        {
			
				$outil['desc_noti']=str_replace("RSOLDE",$outil['someout_noti'].' FCFA',$outil['desc_noti']);
				$outil['desc_noti']=str_replace("NSOLDE",$outil['somenew_noti'].' FCFA',$outil['desc_noti']);
			echo '<div class="after line_bk">
			      <div class="flo_lef wid_15"><img id="cpimg" src="source/img/no_result.jpg" alt="book"></div>
			      <div class="flo_lef wid_85 pad_lef_10">
				  '.$outil['desc_noti'].'<br/>
				  <span class="col_gre_1">'.$BClas->time_ago(strtotime($outil["phpdate_noti"]),$lang).'</span></div> 
				  </div>';
		} 
         
       
      }
      else
      {
        echo '<div class="after tex_cen wid_50 mar_auto col_1 fon_bol">
		<img id="cpimg" src="source/img/no_result.jpg" alt="book">
		<p>Aucun résultat</p>
		</div>';
      } 
             
              ?>
           
          </div>
        </div>
   
	<!---->
	
</div>
