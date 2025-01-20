<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">MES ARTICLES</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
       
		<?php
		 
			if(!empty($_GET['sup']))
	{
                     $bloc=$tams->query('SELECT * FROM store WHERE id_pro=\''.$_GET['sup'].'\'  ');

                      while($done=$bloc->fetch())
                      {
                          if($done['id_aut_pro']==$_SESSION['id'])
                           {

                                  $eta=$tams->query('DELETE FROM store  WHERE id_pro=\''.$_GET['sup'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

                                  if($eta)
                                  { echo '<div class="ok_form">Supprimer</div>';
                                  @unlink('source/img/store/'.$done['img_pro'].'');
                                  @unlink('source/img/store/'.$done['img2_pro'].'');}
                                  else
                                  { echo '<div class="stop_form">Impossible</div>';}

                           }

                     }
									
									
		}
		
		$Store->showSArticle($tams,$_SESSION['id'],$BClas); ?>
		

	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
