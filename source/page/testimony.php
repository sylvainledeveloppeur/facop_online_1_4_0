<div id="pg_testi">

<div class="bac_top">
   <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Témoignages</h1>
		    <strong class="">Ils sont satisfaits</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->
	
	<div class="bac_bla">
   <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto" >
		
		     <h3  class="text_center">Veuillez nous laisser votre témoignage</h3>
	   <p  class="text_center">Veuillez remplire tous les champs</p><br/>
		
					<form name="sunfo" id="sunfo" class="Tfom_1 Q_cols_2_1col" method="post" action="source/js/form_php/testimony.php" >
			<div class="fd">
				<input type="text" name="nom" class="input" placeholder="Nom complet">
			</div>
					<div class="fd">
				<input type="text" name="tel" class="input" placeholder=" Téléphone">
						</div>
						
				<textarea name="mes" class="input_area"  maxlength="500" placeholder="Veuillez écrire ici"></textarea>
				<input type="submit" name="okfo" class="input_send" value="Envoyer" class="bg_1">
			
				<div class="eta_form"></div>
			</form>


        </ul>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->

<!--Témoignages-->
  <div  class="bac_gre_2 tex_center pos_rel wow bounceInUp">
	<div class="fenetre">
      <div class="zho pos_rel after Q_cols_2_1col">
		  
			<h2 class="h1 tex_center pad_bot_15 mar_bot_20">Quelques témoignages</h2>
		  
		   <ul class="ultesti after Q_cols_2_1col">
			   
			   <?php $table="testimony";
	//verifier si l article existe
	$requete = $tams->query("SELECT COUNT(id_tes) nbr FROM ".$table." ");
    $reponses = $requete->fetch();
if($reponses['nbr']!=0)
{
	
	
	 $bloc=$tams->query(" SELECT * FROM ".$table." ORDER BY RAND() LIMIT 10
		 ");
	
	$i=0;
		  while($done=$bloc->fetch())
		    {
					
			echo'
	    <li > 
		  <img src="source/img/projet/_paris1.jpg"  alt="Facop Testimony"/>
			<p>"'.$done['mes_tes'].'"</p>
			
			  <strong>'.$done['nom_tes'].'</strong> <span>(Etudiant)</span>
		  </li> ';


			  $i++;
             }

}
	else{
		
		echo "Nothing";
	}
			  ?>
	   
      </ul>  
      </div>
    </div>
  </div>
	
		
	
</div>
