<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link type="text/css" rel="stylesheet" href="css/beestrap.css">
  <title>Integrate Feda Checkout to my website</title>
</head>
<body>

        
 <form name="TAform" action="sql/profile_update_avatar_sql.1.0.php" method="post" enctype="multipart/form-data"  id="thefom" class="Tfom_1" >
 
 <?php 
if(isset($_GET['ava']) AND is_file('../../img/avatar/user/'.$_GET['ava']))
{
	echo '<img id="myava"  src="../../img/avatar/user/'.$_GET['ava'].'" width="300px" height="200px">';
}
else
{
	echo '<img id="myava"  src="../../img/avatar/avatar.png" width="300px" height="200px">';
}


 ?>
 
 
 <div class="hide"> 
  <p> id</p>  
 <input type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>" required="required1">
 </div> 
 
 <div class="hide"> 
  <p> ava</p>  
 <input type="text" name="ava" id="ava" value="<?php echo $_GET['ava']; ?>" required="required2">
 </div> 
 
 <div> 
 <p class="logo_ti" style="text-align: center;margin-top: 3em;">Sélectionnez une photo   (600 X 600) </p>
  <div class="icifi">
  <p class="logo_des"> Click ici </p>  
  <input  name="logo" id="logo" type="file" required="required" ></div> 
 </div> 

 <div id="eta_fom"></div> 
 
 <input  name="ok" id="aimg" type="submit" value="Valider" class="btn_send">
</form> 

  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">

    //receive from android ********************************************************************************************************
  function init(val) {
        //alert(val);
        //MyAndroidFunction.showToast(val);
    }
    
    //send to android
    function sendDataToAndroid(toast,avatar) {
        MyAndroidFunction.onButtonClick(toast,avatar);
    }
	 //send to android
    function showAndroidProgress(text,intt) {
        MyAndroidFunction.showProgress(text,intt);
    }
    
     </script>
	 
 <script type="text/javascript">
 $(document).ready(function() {
		 
		/*  $("p").on({
			 
			 click:function()
			 {
				
				alert("click p");
			 }
		 });*/
		 
/************************************************************show img select*/
	function pict()
{
		 var files = $('#logo')[0].files;

	  if (files.length > 0)
	   {
		  // On part du principe qu'il n'y qu'un seul fichier
		  var file = files[0],
			  $image_preview = $('#myava');

		  // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
		 $image_preview.attr('src', window.URL.createObjectURL(file));
		 $('.logo_ti').text( $('#logo').val());
		 $('.btn_send').slideDown();
		
	  }
	
}
//----
	$("#logo").on({
		change:function ()
		{
			pict();
		}
		
	});

  //------- send form
  $('.Tfom_1,.Tfom_2').ajaxForm(
          {
                beforeSend: function() {
                    //alert(" send form");
                    //infos
					$eta_fom=$("#eta_fom");
					
					$eta_fom.html("Veuillez patientez...");
					//showAndroidProgress("Patientez...",1);
                },
                uploadProgress: function(event, position, total, percentComplete) {

                },
                success: function(xhr) {

		   let goodInput = xhr;

let regexp = /jpg$/;
let regexp2 = /jpeg$/;
let regexp3 = /png$/;
					if( regexp.test(goodInput) || regexp2.test(goodInput) || regexp3.test(goodInput)  )
					{

					$("#myava").attr("src","../../img/avatar/user/"+xhr);
										sendDataToAndroid("Photo modifié",xhr);
										
										showAndroidProgress("Patientez...",0);
					}
					else
					{
                                     //info
                                    $eta_fom.html(xhr);

					sendDataToAndroid("Error",xhr);
					showAndroidProgress("Patientez...",0);
					}
                    

                },
                complete: function(xhr) {
            //infos
showAndroidProgress("Patientez...",0);

                },
                error:function(xhr){
              alert('No connexion !');
					
					showAndroidProgress("Patientez...",0);
                    
             }
        });

	 });//fin documen redy
     </script>
</body>
</html>