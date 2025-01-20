<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>recadre image</title>
	 <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  
  <link rel="stylesheet" href="css/main.css" type="text/css" />
  <link rel="stylesheet" href="css/demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />

	<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }
 .fenetre {
   
    width: 1170px;
	margin: auto;
  }


</style>
</head>

<body>
	<?php 
	if(!empty($_GET["ok"]))
	{
	
	?>
<div class="thecrop">
  <div class="fenetre">
    <div class="row">
      <div class="span12">
        <div class="jc-demo-box">
          
          <div class="page-header">
            <h1>Avatar enregistré</h1>
    
        </div>
      </div>
      </div>
  </div>	
</div>
	<?php
	}
	elseif(!empty($_GET["crop"]))
	{
	
	?>
<div class="thecrop">
  <div class="fenetre">
    <div class="row">
      <div class="span12">
        <div class="jc-demo-box">
          
          <div class="page-header">
            <h1>Recadre image</h1>
          </div>
          
		  <div class="eta_form"></div>
          <!-- This is the image we're attaching Jcrop to -->
			<?php 
		//verifier type fichier img existant
		if(is_file('img/'.$_GET["crop"].'_min.jpg'))
		   $link='img/'.$_GET["crop"].'_min.jpg';
		elseif(is_file('img/'.$_GET["crop"].'_min.png'))
		   $link='img/'.$_GET["crop"].'_min.png';
		elseif(is_file('img/'.$_GET["crop"].'_min.gif'))
		   $link='img/'.$_GET["crop"].'_min.gif';
		
		echo  '<img src="'.$link.'" id="cropbox" />';?>
         
          
          <!-- This is the form that our event handler fills -->
          <form action="js/php/crop.php" method="post" onsubmit="return checkCoords();" name="forecad" id="forecad" >
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="hidden" id="pict" name="pict" value="<?php echo $_GET["crop"]; ?>" />
            <input type="submit" value="Crop Image" class="btncrop"  />
            <!--class="btn btn-large btn-inverse btncrop"-->
          </form>
          
          
          
        </div>
      </div>
      </div>
  </div>	
</div>
	<?php 		
	}
	else
	{
	?>
	<div class="thecrop">
  <div class="fenetre">
    <div class="row">
      <div class="span12">
        <div class="jc-demo-box">
          
          <div class="page-header">
            <h1>Ajoutez un avatar</h1>
          </div>
		  <div class="eta_form"></div>
<div class="bloimg">
			<img class="preview" src="img/glas.jpg" width="400" alt=""/> </div>
<!-- This is the form that our event handler fills -->
          <form action="js/php/save.php" method="post" name="focrop" id="focrop" >
            <input type="file" id="img" name="img" />
            <input type="submit" value="Valider" class="btncrop"  />
            <!--class="btn btn-large btn-inverse btncrop"-->
          </form>
          
          
          
        </div>
      </div>
      </div>
  </div>	
</div>
	<?php 
	
	}
	?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.Jcrop.js"></script>
	
<script type="text/javascript">

  $(function(){
	  
var c = {"x":50,"y":50,"x2":200,"y2":200,"w":0,"h":0};
	  
    $('#cropbox').Jcrop({
      aspectRatio: 1,
      setSelect: [c.x,c.y,c.x2,c.y2],
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };
	
/************************************************************show img select*/
	function pict()
{
		 var files = $('#img')[0].files;

	  if (files.length > 0)
	   {
		  // On part du principe qu'il n'y qu'un seul fichier
		  var file = files[0],
			  $image_preview = $('.preview');

		  // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
		 $image_preview.attr('src', window.URL.createObjectURL(file));
		
	  }
	
}
//----
	$("#img").on({
		change:function ()
		{
			pict();
		}
		
	});
/*****************************************************save img form*/	
	  $('#focrop,#forecad').ajaxForm({
    beforeSend: function() {
        
		//infos
		$divde=$('.eta_form');
		$divde.html('<img src="source/img/load_2.gif" alt="">');
		

    },
    uploadProgress: function(event, position, total, percentComplete) {
        
    },
    success: function(xhr) {
       
		//info
		$divde.html(xhr);

    },
	complete: function(xhr) {
//infos

			
	} ,
	error:function(xhr){
  alert('No connexion !');
 }
});
	
	
	
	
</script>
</body>
</html>