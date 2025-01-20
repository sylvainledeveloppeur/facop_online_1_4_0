<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">MES TEMOIGNAGES</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
       
		<?php
		 
			if(!empty($_GET['sup']))
	{
                     $bloc=$tams->query('SELECT * FROM testimony WHERE id_tes=\''.$_GET['sup'].'\'  ');

                      while($done=$bloc->fetch())
                      {
                          if($done['id_aut_tes']==$_SESSION['id'])
                           {

                                  $eta=$tams->query('DELETE FROM testimony WHERE id_tes=\''.$_GET['sup'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

                                  if($eta)
                                  { echo '<div class="ok_form">Supprimé</div>';
                                 /* @unlink('source/doc/devis/'.$done['doc_devi'].'');*/}
                                  else
                                  { echo '<div class="stop_form">Impossible</div>';}

                           }

                     }
									
									
		}
		
		$Store->showUtemoi($tams,$_SESSION['id'],$defaultClass_OB); ?>
		
	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
