<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes Certifications</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
                $nbr_pseudo=$tams->prepare("SELECT COUNT(id_cer) nbr FROM user_certificat  WHERE iduser_cer=$id
                                        " ) ;
                                       $nbr_pseudo->execute();
                                       $chif_pse=$nbr_pseudo->fetch();
      
                                     if ($chif_pse['nbr']!=0)
                                      {
										  echo '<h2 class="h2 tex_cen mar_bot_30">Total : '.$chif_pse['nbr'].'</h2>';
        $query = $tams->query("Select * from user_certificat WHERE  iduser_cer=$id "); 
        $outils = array(); 
        while ($outil = $query->fetch())
        {
			echo '<div class="after">
			<a href="source/img/certificat/user/'.$outil['img_cer'].'" class="btnbok after line_bk" target="_blank" download>
			      <div class="flo_lef wid_25"><img id="cpimg" src="source/img/certificat/user/'.$outil['img_cer'].'" alt="certificat"></div>
			      <div class="flo_lef wid_75 pad_lef_10">
				  <span class="spastro">Titre:</span> '.$outil['namepack_cer'].' <br/>
				  <span class="spastro">Note:</span> '.$outil['note_cer'].'%<br/>
				  <span class="btn_3 mar_top_10 mar_lef_40">Télécharger</span>
				  </div> 
				  </a>
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
