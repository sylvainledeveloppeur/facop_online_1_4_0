<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes Bonus</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
				
				
				 $query = $tams->query("Select * FROM user_bonus WHERE  id_user_bnk=$id "); 
      
        while ($done = $query->fetch())
        {
			echo '<div class="blobonus bg_1 col_2_100">'.$done['amount_bnk'].' FCFA
			<a class="faiRet" href="index.php?b=user.retrait.user">Faire un retrait</a>
			</div>';
		}
				
				
              $nbr_pseudo=$tams->prepare("SELECT COUNT(id_his) nbr FROM user_historic_retrai
                                 WHERE  id_user_his=:pse " ) ;
                                 $nbr_pseudo->execute(array('pse'=>$id));
                                 $chif_pse=$nbr_pseudo->fetch();
       echo '<h2 class="h2 tex_cen mar_bot_30">Historique de retrait (Total : '.$chif_pse['nbr'].')</h2>';
                                     if ($chif_pse['nbr']!=0)
                                      {
										 
        $query = $tams->query("Select * FROM user_historic_retrai WHERE  id_user_his=$id  ORDER BY id_his DESC LIMIT 100 "); 
        $outils = array(); 
        while ($outil = $query->fetch())
        {
			$outil['etat_his']=$outil['etat_his']==0 ? "En cours":$outil['etat_his'];
			$outil['etat_his']=$outil['etat_his']==1 ? "Effectué":$outil['etat_his'];
			$outil['etat_his']=$outil['etat_his']==1 ? "Annulé":$outil['etat_his'];
				
				$outil['desc_his']=str_replace("RSOLDE",$outil['someout_his'].' FCFA',$outil['desc_his']);
				$outil['desc_his']=str_replace("NSOLDE",$outil['somenew_his'].' FCFA',$outil['desc_his']);
			echo '<div class="after line_bk">
			      <div class="flo_lef wid_15"><img id="cpimg" src="source/img/no_result.jpg" alt="book"></div>
			      <div class="flo_lef wid_85 pad_lef_10">
				  '.$outil['desc_his'].'<br/>
				  <div class="after"> <div class="flo_lef wid_50">  <span class="col_1">'.$outil['etat_his'].'<span/> </div>
				  <div class="flo_rig wid_50">  <span class="col_gre_1">'.$BClas->time_ago(strtotime($outil["phpdate_his"]),$lang).'<span/> </div>
				  </div>
				 
				 
				  </div> 
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
