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

    <h1 onClick="sendDataToAndroid('Title is click')">Timer</h1>
	
 <div id="eta_fom" style="text-align:center;font-size: 3em;" > </div>
 
  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery.form.min.js"></script>

	 
 <script type="text/javascript">
 $(document).ready(function() {
	 
	 setInterval(showTimer, 1000);
	 
	 function showTimer()
	 {
		   $("#eta_fom").load("time.php");
	 }
		/* $("p").on({
			 
			 click:function()
			 {
				
				alert("click p");
			 }
		 }); */
		 

  //------- send form
  $('.Tfom_1,.Tfom_2').ajaxForm(
          {
                beforeSend: function() {
                    //alert(" send form");
                    //infos
					$eta_fom=$("#eta_fom");
					
					$eta_fom.html("Patientez...");
                },
                uploadProgress: function(event, position, total, percentComplete) {

                },
                success: function(xhr) {

                    //info
                    $eta_fom.html(xhr);

                },
                complete: function(xhr) {
            //infos

                },
                error:function(xhr){
              alert('No connexion !');
                    
             }
        });

	 });//fin documen redy
     </script>
</body>
</html>