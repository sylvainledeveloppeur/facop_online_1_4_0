<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">LISTE DE SOUHAIT</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
         
			
                  <?php 
           if(!empty($_SESSION['id']))
        {

                        //recherche du pseudo AND pas=:pas  ,'pas'=>sha1($_GET['pas'])
                       $nbr_pseudo=$tams->prepare("SELECT COUNT(id_lis) nbr FROM _listsouhai
                       WHERE id_aut_lis=:pse  " ) ;
                       $nbr_pseudo->execute(array('pse'=>$_SESSION['id']));
                       $chif_pse=$nbr_pseudo->fetch();

                       if ($chif_pse['nbr']!=0)
                        {
                            echo '<h2 class="s_resul">'.$chif_pse['nbr'].' Articles</h2>
                            <ul class="ulpro2 after"> ';
                           
                           $bloc=$tams->query(' SELECT * FROM _listsouhai RIGHT JOIN product_ws ON _listsouhai.id_pro_lis=product_ws.id_pro WHERE id_aut_lis="'.$_SESSION['id'].'" ');

                                            while($done=$bloc->fetch())
                                            {
                                                
                                                echo '
          
                                                      <li>
                                                          <a href="index.php?b=uno.fiche.store&id='.$done['id_pro'].'">
                                                            <div class="pimg"><img src="source/img/store/'.$done['img_pro'].'"  alt="moguez" /></div>
                                                            <p class="pti">'.$done['tit_pro'].'</p>
                                                      <p class="petoi"> <i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i><i class="ion-android-star"></i></p>
                                                            <p class="ppri">'.$done['nprice_pro'].' &#8364;</p>

                                                          </a>
                                                      </li> ';
                                            }
                            echo '</ul>';
                        }
                     else
                        {
                        echo '<div class="stop_form">Aucun article trouvé</div>';	
                        }
        }
          
          ?>
          
        
        </div>
    </div>
  </div>
	<!---->

	
</div>
