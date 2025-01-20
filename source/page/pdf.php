<div id="pg_testi">
	
		<div class="bac_top">
  <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Lecteur PDF</h1>
		    <strong class="">---</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->
	
<!-- top -->	
<div class="bac_bla">
  <div class="fenetre">
	
	  <?php 
	  
	  if(!empty($_GET['p']))
	 {
			  if(is_file('source/pdf/pack/'.$_GET['p']))
			  {
				  echo ' <h1 class="h1 tex_center">'.$_GET['n'].'</h1>
				<h3 class="h3 tex_center mar_bot_30">'.$_GET['np'].' pages</h3>
				<iframe
    src="https://drive.google.com/viewerng/viewer?embedded=true&url=https://www.facop.training/source/pdf/pack/'.$_GET['p'].'#toolbar=0&scrollbar=0"
    frameBorder="0"
    scrolling="auto"
    height="600"
    width="100%"
></iframe>


'; 
			  }
		  elseif(is_file('source/pdf/book/'.$_GET['p']))
		  {
			    echo ' <h1 class="h1 tex_center">'.$_GET['n'].'</h1>
				<h3 class="h3 tex_center mar_bot_30">'.$_GET['np'].' pages</h3>
				<div class="no_form no_result mar_top_40">
				Veuillez lire ce document via nos applications mobiles Android/Ios</div>';
			  }
		   else
			{
				echo '<div class="no_form no_result">
				<img src="source/img/achat.png"  alt=""/>
				PDF introuvable</div>';
			}
				 
	  }
	  else
	{
		echo '<div class="no_form no_result">
		<img src="source/img/achat.png"  alt=""/>
		PDF introuvable</div>';
	}
	
	?>
	  
			  
</div>
</div>