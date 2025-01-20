<div id="pg_user">

	
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	<h1 class="hh11 tex_center">AJOUTER UN DEVIS</h1>
	<!--us-->
  <div class="bac_ex the_bac ">
	<div class="fenetre">
	  <div class="baccuser head_shado mar_auto bg_blanc">
          
	<form id="resfo" class="fosuj after Tfom_2" method="post" action="/source/js/user_js/ins_devi_sql.php">
		
			<div class="eta_form"></div>
          <div class="loginp"><input type="text" name="tit"  placeholder="Titre du devis" ></div>
		
	 <div class="loginp"><select  name="cat" ><option value="0" selected>- -Sélection du devis- -</option>
<option value="Conception des projets immobiliers" >Conception des projets immobiliers</option>
<option value="Réalisation des projets immobiliers" >Réalisation des projets immobiliers</option>
<option value="Suivi de la realisation des projets immobiliers" >Suivi de la réalisation des projets immobiliers</option>
<option value="Mise en relation avec des investisseurs immobilers" >Mise en relation avec des investisseurs immobilers</option>
<option value="Renovation et démolition des maisons" >Renovation et démolition des maisons</option>
<option value="Equipement des maison" >Equipement des maisons</option>
				
			
	</select></div>
        
          <div class="loginp"><h2 class="col1 tex_cen">Fichier (PDF)</h2>
              <input type="file" name="aimg"  placeholder="file" ></div>
		<div class="loginp"><textarea name="des" placeholder="Description: Veuillez-nous en dire plus"></textarea></div>
		
		  <div class="loginp"><input type="submit" class="okpub" value="Publier"></div>
		
		 
	

      </form>
	
	
	

        
      </div>
    </div>
  </div>
	<!---->

	
</div>
