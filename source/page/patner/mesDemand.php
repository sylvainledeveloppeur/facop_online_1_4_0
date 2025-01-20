<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">MES DEMANDES</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
       
		<?php
		 
			if(!empty($_GET['sup']))
	{
                     $bloc=$tams->query('SELECT * FROM partenaria WHERE id_par=\''.$_GET['sup'].'\'  ');

                      while($done=$bloc->fetch())
                      {
                          if($done['id_aut_par']==$_SESSION['id'])
                           {

                                  $eta=$tams->query('DELETE FROM partenaria  WHERE id_par=\''.$_GET['sup'].'\'  ');//pseudo=\''.$_POST['nlog'].'\'

                                  if($eta)
                                  { echo '<div class="ok_form">Supprimer</div>';
                                  @unlink('source/img/partner/'.$done['logo_par'].'');
                                  @unlink('source/pdf/patner/'.$done['doc_par'].'');}
                                  else
                                  { echo '<div class="stop_form">Impossible</div>';}

                           }

                     }
									
									
		}
		
		$Index->showuArticle($tams,$_SESSION['id'],$BClas); ?>
		

	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
