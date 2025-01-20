<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes livres</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
              $nbr_pseudo=$tams->prepare("SELECT COUNT(id_ubk) nbr FROM user_book  WHERE actif_ubk=1 AND id_user_ubk=$id
                                        " ) ;
                                       $nbr_pseudo->execute();
                                       $chif_pse=$nbr_pseudo->fetch();
      
                                     if ($chif_pse['nbr']!=0)
                                      {
										  echo '<h2 class="h2 tex_cen mar_bot_30">Total : '.$chif_pse['nbr'].'</h2>';
        $query = $tams->query("Select * from user_book INNER JOIN book ON user_book.id_book_ubk=book.id_bk WHERE actif_ubk=1  AND id_user_ubk=$id "); 
        $outils = array(); 
        while ($outil = $query->fetch())
        {
			echo '<div class="after"><a href="index.php?b=uno.pdf&n='.$outil['titreFR_bk'].'&np='.$outil['pg_bk'].'&p='.$outil['linkFR_bk'].'&t=u" class="btnbok after line_bk">
			      <div class="flo_lef wid_15"><img id="cpimg" src="source/img/book/'.$outil['img_bk'].'" alt="book"></div>
			      <div class="flo_lef wid_85 pad_lef_10 pad_top_20">
				  <span class="spastro">Titre: </span> '.$outil['titreFR_bk'].'<br/>
				  <span class="spastro">Pages: </span> '.$outil['pg_bk'].'<br/>
				  <span class="spastro">Lecture: </span> '.$outil['duree_bk'].'<br/>
				  <span class="spastro">Description: </span> '.$outil['descFR_bk'].'
				 
				  </div> 
				  </a></div>';
		} 
         
       
      }
      else
      {
        echo "nothing";
      } 
             
              ?>
           
          </div>
        </div>
   
	<!---->
	
</div>
