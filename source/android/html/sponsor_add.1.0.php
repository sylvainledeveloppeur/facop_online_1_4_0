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

    <h1 onClick="sendDataToAndroid('Title is click')">Formulaire</h1>
        
 <form name="TAform" action="sql/sponsor_add_sql.1.0.php" method="post" enctype="multipart/form-data"  id="thefom" class="Tfom_1" >
 
 
 
 <div> 
  <p> Nom de l'entreprise ou organisation </p>  
 <input type="text" name="name" id="name" placeholder="Ex: Ets Beetech" required="required">
 </div> 
 
 <div> 
  <p> Téléphone (Whatsapp) </p>  
 <input type="number" name="tel" id="tel" placeholder="Ex: 00237694815891" required="required">
 </div> 
 
 <div> 
  <p> Email </p>  
 <input type="email" name="mail" id="mail" placeholder="mail@gmail.com" required="required">
 </div> 

   <div> 
  <p> Type de Demande </p>  
 	<select name="type" id="type" required="required">
	  <option selected="selected" value="null">- -Choix- -</option>
	  <option value="Sponsoring">Sponsoring</option>
	  <option  value="Partenariat">Partenariat</option>
	  <option  value="Mécènat">Mécènat</option>
	</select>
 </div>

 <div> 
  <p> Votre logo  (jpg, png)</p>  
 <input  name="logo" id="logo" type="file" required="required" >
 </div> 
 
 <div> 
  <p> Votre Demande (PDF) de partenariat, sponsoring... </p>  
 <input  name="pdf" id="pdf" type="file" required="required" >
 </div> 
 

 
 <div id="eta_fom" > </div> 
 
 <input  name="ok" id="aimg" type="submit" value="Send" class="btn_send">
</form> 

  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">

    //receive from android ********************************************************************************************************
  function init(val) {
        //alert(val);
       // MyAndroidFunction.showToast(val);
    }
    
    //send to android
    function sendDataToAndroid(toast) {
        MyAndroidFunction.onButtonClick(toast);
    }
    
     </script>
	 
 <script type="text/javascript">
 $(document).ready(function() {
		 
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