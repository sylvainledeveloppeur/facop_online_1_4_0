<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">DEMANDE DE PARTENARIAT</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
        <h2 class="s_resul fon_siz_20">Veuillez <a href="source/doc/DEMANDE DE PARTENARIAT PIDAF.docx">télécharger notre modèle de demande de partenariat</a>, le remplir et le soumettre via le formulaire ci-dessous.  </h2>
         <p class="tex_cen"><a href="source/doc/DEMANDE DE PARTENARIAT PIDAF.docx" class="btn_2">Télécharger le modèle</a> </p>
          
<!--<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/user_js/vendre_ins_sql.php"  >-->
<form id="resfo" class="fosuj after Tfom_2 mar_top_15" method="post" action="/source/js/patner_js/partena_ins_sql"  > 
    
		  <div class="eta_form"></div>
         <div class="loginp"><p class="tex_cen fon_siz_20 col1">Logo de l'entreprise(600 x 600) </p><input type="file" name="aimg" placeholder="Photo de face " ></div>
         <div class="loginp"><input type="text" name="nam" placeholder="Nom de entreprise " ></div> 
         <div class="loginp"><input type="text" name="for" placeholder="Forme juridique| Ex: SARL, SAS, SA " ></div> 
         <div class="loginp">
            <select name="pay"  required>
                <option value="0">- - Pays d’intervention- -</option> 
              <?php 
		$bloc =$tams->query('SELECT * FROM _countrys ORDER BY langFR  ASC ');

													  
							  while($done=$bloc->fetch())
							  { 
								
					  echo '  <option value="'.$done['langFR'].'">'.$done['langFR'].'</option> ';

							  }	
		?>
              </select>  </div>
         <div class="loginp"><p class="tex_cen fon_siz_20 col1"> Séléctionnez le document de partenariat(PDF) </p><input type="file" name="aimg2" id="avafi" placeholder="Photo de face " ></div>
		
		  <div class="loginp"><input type="submit" class="okpub" value="Envoyez"></div>
		
		 
	

      </form>
      
      </div>
    </div>
  </div>
	<!---->

	
</div>
