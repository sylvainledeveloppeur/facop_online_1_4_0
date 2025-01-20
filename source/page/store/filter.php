<div id="pg_store">

	<!--bac top-->
	  <div id="bados_fil" class="bac_dos">
		<div class="fenetre">
		  <h1 class="h1dos">Nos offres</h1>
        </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	
	<!--us-->
  <div class="bac_ex">
	<div class="fenetre">
	  
        <div class="thefi after Q_cols_2_1col">
          <div class="Q_Phonfilter btn_2 tex_cen">Afficher le filtre</div>
<div class="flo_lef wid_20 filef faqa">
          <h3 class="h3fi">Categories engins</h3>  
          <ul class="ulfi elfi">
          
              <?php $Store->categoFilter1($tams,$defaultClass_OB,1);?>
        
          </ul>
	
              <h3 class="h3fi">Autres categories</h3>  
          <ul class="ulfi elfi">
          
              <?php $Store->categoFilter1($tams,$defaultClass_OB,2);?>
            <input type="hidden" name="bcat" id="bcat">
          </ul>
        <!--  <h3 class="h3fi">Sous-Categories</h3>  
          <ul class="ulfi elfi">
            
              <?php //$Store->SoucategoFilter($tams,$defaultClass_OB);?>
              <input type="hidden" name="bcat" id="bcat">
            </ul>-->
	
	 <h3 class="h3fi hide">Marques</h3>  
          <ul class="ulfi elfi hide">
          
              <?php $Store->marqueFilter($tams,$defaultClass_OB);?>
            <input type="hidden" name="bmarq" id="bmarq">
          </ul>
            
            
         <!-- <h3 class="h3fi">Prix</h3>  
          <ul class="ulfi elfi">
             
            <li data-va="nprice_pro BETWEEN 0 AND 8"><label><input type="radio" name="catego2" value="radio"> 0 - 8€</label></li>
            <li data-va="nprice_pro BETWEEN 8 AND 10"><label><input type="radio" name="catego2" value="radio"> 8 - 15€</label></li>
            <li data-va="nprice_pro BETWEEN 15 AND 30"><label><input type="radio" name="catego2" value="radio"> 15 - 30€</label></li>
            <li data-va="nprice_pro BETWEEN 30 AND 60"><label><input type="radio" name="catego2" value="radio"> 30 - 60€</label></li>
            <li data-va="nprice_pro BETWEEN 60 AND 100"><label><input type="radio" name="catego2" value="radio"> 60 - 100€</label></li>
            <li data-va="nprice_pro BETWEEN 100000 AND 1000000"><label><input type="radio" name="catego2" value="radio"> 100.000 - 500.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 500000 AND 1000000"><label><input type="radio" name="catego2" value="radio"> 500.000 - 1.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 1000000 AND 5000000"><label><input type="radio" name="catego2" value="radio"> 1.000.000 - 5.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 5000000 AND 10000000"><label><input type="radio" name="catego2" value="radio"> 5.000.000 - 10.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 10000000 AND 20000000"><label><input type="radio" name="catego2" value="radio"> 10.000.000 - 20.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 20000000 AND 30000000"><label><input type="radio" name="catego2" value="radio"> 20.000.000 - 30.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 30000000 AND 40000000"><label><input type="radio" name="catego2" value="radio"> 30.000.000 - 40.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 40000000 AND 50000000"><label><input type="radio" name="catego2" value="radio"> 40.000.000 - 50.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 50000000 AND 100000000"><label><input type="radio" name="catego2" value="radio"> 50.000.000 - 100.000.000 F CFA</label></li>
            <li data-va="nprice_pro BETWEEN 100000000 AND 100000000000"><label><input type="radio" name="catego2" value="radio"> 100.000.000 F CFA ...</label></li>
			  
            <input type="hidden" name="bpri" id="bpri">
            </ul>-->
	
	     <h3 class="h3fi">Prix</h3>  
          <ul class="ulfi elfi filpri">
            <li data-va="nprice_pro BETWEEN 100000 AND 100000000">
				<label>Minimum <strong class="rouge_4">100.000 FCFA</strong><input type="range"  min="100000" max="100000000" step="100000"  value="100000" name="priMin" class="priMin" > </label><br><br>

			  <label>Maximum <strong class="rouge_1">100.000.000 FCFA</strong><input type="range"  min="100000" max="100000000" step="100000" value="100000000" name="priMax" class="priMax" > </label></li>
			
            <input type="hidden" name="bpri" id="bpri">
            </ul>
            
            
          <h3 class="h3fi">Nouveauté</h3>  
          <ul class="ulfi elfi">
            <li data-va=" ORDER BY id_pro DESC"><label><input type="radio" name="catego3" value="radio"> Nouveau</label></li>
            <li data-va=" ORDER BY id_pro ASC"><label><input type="radio" name="catego3" value="radio"> Ancien</label></li>
            <input type="hidden" name="bord" id="bord">
          </ul>
            
        </div>
        <div class="flo_lef wid_80 firi " id="loadfi">
        

			   
    <?php 
       if(!empty($_GET['cat']))
           $Store->filterSC($tams,$defaultClass_OB,'<ul class="ulpro2 after">','</ul>',"cat",$_GET['cat'],'id_cat_pro',15);
       else if(!empty($_GET['scat']))
           $Store->filterSC($tams,$defaultClass_OB,'<ul class="ulpro2 after">','</ul>',"scat",$_GET['scat'],'id_soucat_pro',15);
       else 
           $Store->filterSC($tams,$defaultClass_OB,'<ul class="ulpro2 after">','</ul>',"scat",0,'id_soucat_pro',15);
    
    ?> 
    
    
  
	</div>	 
		
      </div>
		
    </div>
  </div>
	<!---->
 


	
</div>
