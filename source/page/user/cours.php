<?php @session_start();?>
<div id="pg_user">
	
	<h1 class="h1 tex_center mar_bot_15">Mes Cours</h1>
	<!--us-->

	
	  <div class="baccuser head_shado mar_auto bg_blanc">
            <div class="wid_95 mar_auto">
        
              <?php 
		  $id=$_SESSION['id'];
				$totalDay=365;
					
          //nbr pack user achat
  $req_nbrMCOU=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat  WHERE iduser_cha=?  " );
  $req_nbrMCOU->bindParam(1, $id, PDO::PARAM_INT);
  $req_nbrMCOU->execute();
  $req_fetctMCOU=$req_nbrMCOU->fetch(); 
  $found_nbrMCOU=$req_fetctMCOU['nbr'];

  if ($found_nbrMCOU!=0)
    {
	  echo '<h2 class="h2 tex_cen">Total : '.$found_nbrMCOU.'</h2>';
                           $query = $tams->query("SELECT * FROM achat INNER JOIN pack ON achat.idpack_cha=pack.id_pk  WHERE iduser_cha='$id' "); 
          $outils = array(); 
          while ($outil = $query->fetch())
                { 
                  //nbr lesson
                  $req_nbr=$tams->prepare("SELECT COUNT(id_les) nbr FROM lesson  WHERE id_pack=? AND actif=1 " );
                  $req_nbr->bindParam(1, $outil["id_pk"], PDO::PARAM_INT);
                  $req_nbr->execute();
                  $req_fetct=$req_nbr->fetch(); 
                  $found_nbr=$req_fetct['nbr'];

                  //progression
                  if(!empty($outil["theme_cha"]))
                  {
					  
					  //$outil["theme_cha"]=substr($outil["theme_cha"],0,-5);
                    $progres=explode(" ", trim($outil["theme_cha"]));
					  
                    $percen=count($progres);
					  $cc=count($progres);
					  
					  $percen=100*$percen/$found_nbr;
					  $percen=(int) $percen;
                  }
                  else
                  {
                    $percen=0;
                  }

                       $temps_restant=$BClas->timeEnd($totalDay, strtotime($outil["datesql_cha"]));//restant
			           $temps_coule=$totalDay-$temps_restant;
			       
			        if($temps_coule>=0 AND $temps_coule<=$totalDay)
						{
							  

							echo '<div class="after"><a href="index.php?b=uno.pack&d='.$outil['codeName'].'" class="btnbok after line_bk">
						  <div class="flo_lef wid_15"><img id="cpimg" src="source/img/pack/'.$outil['img'].'" alt="book"></div>
						  <div class="flo_lef wid_85 pad_lef_10">
						  <span class="spastro">Titre:</span> '.$outil['titre'].'<br/>
						  <span class="spastro">Progression:</span> '.$percen.'% <span class="pba"><span class="pho" style="width:'.$percen.'%;"></span></span> <br/>
						  <span class="spastro">Temps écoulés:</span> '.$temps_coule.'/'.$totalDay.' Jours<br/>
						  <span class="spastro">Abonnement:</span> '.$totalDay.' Jours<br/>
						 
						  </div> 
						  </a></div>';
						}
				   else
					  {
						echo '<div class="after tex_cen wid_50 mar_auto col_1 fon_bol">
						<img id="cpimg" src="source/img/no_result.jpg" alt="book">
						<p>Aucun résultat'.$temps_coule.' _'.$temps_restant.'</p>
						</div>';
					  } 
										
		} 
         
       
      }
      else
      {
        echo '<div class="after tex_cen wid_50 mar_auto col_1 fon_bol">
		<img id="cpimg" src="source/img/no_result.jpg" alt="book">
		<p>Aucun résultat</p>
		</div>';
      } 
             
				
	//fonction------------------------------------			
	
              ?>
           
          </div>
        </div>
   
	<!---->
	
</div>
