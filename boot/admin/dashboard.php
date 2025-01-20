<?php session_start(); 
   if(empty($_SESSION['id_admin'])) 
	 {
	 header ('Location: index.php'); 
     exit();  
	 }
	require_once("class/db.class.php");
	require_once('class/Bee.class.php');
    require_once("section/doctype.php");

$blocc=$tams->query(' SELECT * FROM _admin_control WHERE id=1 ');//load contol settings 
						
				while($done=$blocc->fetch())
				{
					
  $_SESSION['nbr_ParPage']=$done['rowspag'];
  $_SESSION['time_out']=$done['logout'];
  $_SESSION['version']=$done['version'];
  $_SESSION['namversion']=$done['namver'];
	
 $_SESSION['back1']=$done['back'];
 $_SESSION['currency']="FCFA";
					
  $_SESSION['back']=!empty($done['back']) ? 'style="background-image: url(img/bg/'.$done['back'].'.png) !important;background-repeat: no-repeat;background-size: cover;background-attachment: fixed;"':'';
					
				}
	 ?>
<title>Control Panel:</title>

	<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="js/IDE_html_editor/IDE_style.css" rel="stylesheet" type="text/css">

	<style type="text/css">
		body{
			background-image: none !important;
			background-color: #e5ecf2; !important;
		}
		html::before{
			display: none !important;
		}
	</style>

<meta charset="utf-8">
</head>

<body onClose="oksignout()" onload="setInterval('startTimer()',<?php echo $_SESSION['time_out']; ?>);" onmousemove="stopTimer();"
	 <?php echo $_SESSION['back']; ?> >
<p class="tex_center top_log"><img src="../../../../img/logo.png" alt="" style="width: 50px;"></p>
<div class="bulle"><p class="eta_form">Méssage envoyé</p></div>
	<!--end message-->
	 <div class="bacadmin">
  <div class="welcom pos_rel">welcome into your control panel
    <p>Please choose any action on the left menu</p>
    <img src="img/tamstechn_logo.png" />
	  <p> <?php 	 
         echo '<div class="bot tex_center thever">'.$_SESSION['namversion'].' '.$_SESSION['version'].'</div>';
	 ?></p>
	  <i class="fa fa-remove delback"></i>
	</div>
</div>
    <div class="pop_detail">
	  <div class="popdetail_cen">
		<div class="pop_head pos_rel">  <i class="fa fa-remove delpop flo_rig"></i></div>
		<div class="pop_content pos_rel">
			
          <div class="tex_center"> <img class="theload" src="img/load.gif" /></div>
		  </div>
      </div>
    </div>
<!--end back-->
	
<div id="dashboard" class="after">
	<!--menu_left-->
    <div class="menu_lef flo_lef wid_20">
	<?php require_once("section/menu_left.php"); ?>
  </div><!--end menu_left-->
  <div class="corp_rig flo_lef wid_80">
	  <!--head-->
	<div class="hea after">
	<?php require_once("section/head.php"); ?>
  </div><!--end head-->
	  
    <div class="bigtex after  min_hei_500">
	  
	  <div class="texcol flo_lef wid_80">
		<div class="btitle after">
		  <div class="flo_lef wid_70 lietitle blietitle eload">Home </div>
		  <div class="flo_lef wid_30 til2"><i class="fa fa-home"></i> Home > <span class="lietitle">Welcome</span></div>
        </div>
	    <div class="lecorp bord pos_rel"><!--start  corp--><i class="fa fa-refresh BtnActua"></i>
		  <div class="corp  pos_rel"><!--Content for  class "corp" Goes Here-->
		 
         


		  <div class="lehome wow bounceInDown animated">
	
	<div  class="linehome after"><!--start linehome-->
				<?php 			
						$Beclas->BlocHome($tams,"Utilisateurs", "user", "id", "1", "bounceInLeft");
						$Beclas->BlocHome($tams,"Vente", "achat", "id_cha", "2", "bounceInLeft");	
						$Beclas->BlocHome($tams,"Packs", "pack", "id_pk", "3", "bounceInRight");	
						$Beclas->BlocHome($tams,"Leçons", "lesson", "id_les", "4", "bounceInRight");	
	
				?>
	
		</div><!--end linehome-->
	
		<div  class="linehome after"><!--start linehome-->
				<?php 			
						$Beclas->BlocHome($tams,"Vidéos", "video", "id_vi", "5", "bounceInLeft");
						$Beclas->BlocHome($tams,"PDF", "pdf", "id_pf", "6", "bounceInLeft");	
						$Beclas->BlocHome($tams,"Quiz", "quiz", "id_q", "7", "bounceInRight");	
						$Beclas->BlocHome($tams,"Certification", "user_certificat", "id_cer", "8", "bounceInRight");	
				?>
	
		</div><!--end linehome--> 
	
	<div  class="linehome after"><!--start linehome-->
			<?php 			
					$Beclas->BlocHomeSum($tams,"Bonus utilisateurs (XAF)", "user_bonus", "amount_bnk", "10", "bounceInLeft");	
					$Beclas->BlocHomeSum($tams,"Demande retrait (XAF)", "user_bonus", "pending_bnk", "11", "bounceInRight");	
			?>
	
	</div><!--end linehome--> 
	
	<div  class="linehome after"><!--start linehome-->
			<?php 				
					$Beclas->BlocHomeSum($tams,"Ventes Total (XAF)", "achat", "prixpack_cha", "13", "bounceInLeft");
					$Beclas->BlocHomeSum($tams,"Facop bénefice (XAF)", "_admin_bank", "some_bk", "14", "bounceInLeft");	
					$Beclas->BlocHomeSum($tams,"Parrain Direct (XAF)", "_admin_bank", "somepd_bk", "15", "bounceInRight");	
					$Beclas->BlocHomeSum($tams,"Parrain  Indirect (XAF)", "_admin_bank", "somepi_bk", "16", "bounceInRight");	
			?>
	
	</div><!--end linehome--> 
	
	
	</div><!--end lehome-->	   

			  
          </div>
          <div class="tex_center"> <img class="theload" src="img/load.gif" /></div>
        </div><!--le corp-->
      </div>
		<!--team-->
	  <div class="rigcol flo_lef wid_20 min_hei_700">
	
			<?php require_once("section/team.php"); ?>
  </div><!--end team-->
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery_002.js"></script>
	<script type="text/javascript" src="js/jquery_cookie_mini.js"></script>
	<script type="text/javascript" src="js/countMe.min.js"></script>
	<script type="text/javascript" src="js/wow.min.js"></script>

	
<script type="text/javascript" src="js/IDE_html_editor/IDE_js.js"></script>

<script type="text/javascript" src="js/script/admin.js"></script>
	<script type="text/javascript" src="js/script/discu_instantane.js"></script>
	<script type="text/javascript" src="js/manage_script/manage_page.js"></script>
	
	<script type="text/javascript">
	 $(document).ready(function() {
	
		$("#counter_1").countMe(40,10);
		//alert(55);
	
});//fin documen redy
</script>
	
</body>
</html>