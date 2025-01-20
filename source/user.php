<title> <?php echo $title; ?></title>

<meta property="og:title" content="<?php echo $title; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
<style>
body{
	background-color: var(--col_gre_2) !important;
}
</style>
</head>

<body class="bg_gre_2" data-pg="user">
<div id="body">
<div id="header">
  <?php 
  require_once("source/section/head_user.php");	
    
    //deconec
    if(!empty($_GET['or']) AND $_GET['or']==1)
    {
         echo '<script>
              document.getElementById("poptex").innerHTML="<h2>Commande enregistré</h2><p>Votre commande No: <span>'.$_SESSION['STORE_ORDER'].'</span> a bien été enregistré, veuillez la payer par le moyen de payement que vous avez choisi <span>'.$_SESSION['STORE_MODE2'].'</span></p> ";
              document.getElementById("popnoti").style.display="block";
              </script>';
		
    }
    
   
		
	$id =$_SESSION["id"];
    $totalDay=365;
     
  //nbr pack user achat
  $req_nbr=$tams->prepare("SELECT COUNT(id_cha) nbr FROM achat  WHERE iduser_cha=?  " );
  $req_nbr->bindParam(1, $id, PDO::PARAM_INT);
  $req_nbr->execute();
  $req_fetct=$req_nbr->fetch(); 
  $found_nbr=$req_fetct['nbr'];

  if ($found_nbr!=0)
    {
	  
	   $query = $tams->query("SELECT * FROM achat INNER JOIN pack ON achat.idpack_cha=pack.id_pk  WHERE iduser_cha='$id' "); 
          $_SESSION['achat'] = array(); 
          while ($outil = $query->fetch())
                { 
			           $temps_restant=$BClas->timeEnd($totalDay, strtotime($outil["datephp_cha"]));//restant
			           $temps_coule=$totalDay-$temps_restant;
			  
			   if($temps_coule>=0 AND $temps_coule<=$totalDay)
                    array_push($_SESSION['achat'],  $outil["codenamepack_cha"]);
			  
			  }
	  
    }
	
	//reduction achat===================
		
	  $req_nbrUR=$tams->prepare("SELECT COUNT(id_remi) nbr FROM user_remise  WHERE id_user=? AND actif_remi=1  " );
	  $req_nbrUR->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
	  $req_nbrUR->execute();
	  $req_fetctUR=$req_nbrUR->fetch(); 
	  $found_nbrUR=$req_fetctUR['nbr'];

	  if ($found_nbrUR!=0)
		{
          $req_nbrR=$tams->prepare("SELECT * FROM user_remise  WHERE id_user=? AND actif_remi=1  " );
		  $req_nbrR->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
		  $req_nbrR->execute();
		  $req_fetctR=$req_nbrR->fetch(); 
		  //$found_nbr=$req_fetct['nbr'];

		 $_SESSION['reduction']=$req_fetctR['remise'];
		  
		}
	 else
	    {
		
		  $req_nbrR=$tams->prepare("SELECT * FROM _webapp_info  WHERE id=1  " );
		  $req_nbrR->execute();
		  $req_fetctR=$req_nbrR->fetch(); 
		  //$found_nbr=$req_fetct['nbr'];

		 $_SESSION['reduction']=$req_fetctR['remiseAchat'];
	    }
	
	//p indirect========================
	
	if(!empty($_SESSION['parrain']))
	{
	      $req_nbrPI=$tams->prepare("SELECT * FROM user  WHERE pseudo=?  " );
		  $req_nbrPI->bindParam(1, $_SESSION['parrain'], PDO::PARAM_STR);
		  $req_nbrPI->execute();
		  $req_fetctPI=$req_nbrPI->fetch(); 
		  //$found_nbr=$req_fetct['nbr'];
		 $_SESSION['parrainINDIRECT']=$req_fetctPI['parrain'];
	}
	else
	{$_SESSION['parrainINDIRECT']="";}
	
  ?>
</div><!--fin header-->
<div id="corp" class="after">
	<div class="flo_lef wid_10 bg_bla head_shado roatUser">
		  <div class="wid_95 mar_auto hea_us_me">
	         <?php echo '<img src="'.$ava.'" alt="Logo "></a>
			  <p class="tex_cen fon_bol fon_siz_20">'.$_SESSION['pseudo'].'</p>
			  <p class="tex_cen fon_siz_8">Parrain: '.$_SESSION['parrain'].'</p>
			  <p class="tex_cen fon_siz_8">Niveau: Facop A1</p>';?>
		   </div>
		
	<ul class="ul_user mar_top_20">
		<li><a href="index.php"><i class="ion-home"></i>Accueil</a></li>
		<li><a href="index.php?b=user.profil.user"><i class="ion-android-person"></i>Profil</a></li>
		<li><a href="index.php?b=user.password.user"><i class="ion-arrow-expand"></i>Mot de passe</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=user.notifi.user"><i class="ion-ios-bell"></i>Notification</a></li>
		<li><a href="index.php?b=user.bonus.user"><i class="ion-cash"></i>Bonus</a></li>
		<li><a href="index.php?b=user.retrait.user"><i class="ion-reply-all"></i>Retrait</a></li>
		<li><a href="index.php?b=user.parrain.user"><i class="ion-android-person-add"></i>Parrain</a></li>
		<li><a href="index.php?b=user.filleul.user"><i class="ion-android-people"></i>Filleul</a></li>
		<li><a href="index.php?b=user.tree.user"><i class="ion-ios-flower"></i>Mon arbre</a></li>
		<li><a href="index.php?b=user.lien.user"><i class="ion-link"></i>Mon lien</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=user.cours.user"><i class="ion-filing"></i>Mes cours</a></li>
		<li><a href="index.php?b=user.certificat.user"><i class="ion-document-text"></i>Certification</a></li>
		<li><a href="index.php?b=user.book.user"><i class="ion-ios-book"></i>Mes livres</a></li>
		
		<li class="mar_top_10"><a href="index.php?b=uno.faq"><i class="ion-help-circled"></i>Aide</a></li>
		<li><a href="source/outu.php" class="btn_uout"><i class="ion-log-out"></i>Déconnexion</a></li>
		
		
	</ul>
	  <!-- google_translate_element -->
	  <div id="goolaan" class="goolaan" >
                 <div id="google_translate_element">
                  
                 </div>
             </div>
	</div>
	<div class="flo_lef wid_80 after pad_top_20 midUser">
			<div class="flo_lef wid_80 midUser">
				  <div class="wid_95 mar_auto">
				<?php 

				echo $partie;

				?>
				</div>
			</div>
			<div class="tipUser flo_lef wid_20 lsv bg_bla mar_top_40 pad_bot_30">
				...
			</div>
	</div>



</div><!--fin corp-->
<div id="footer">
  <?php 
	//require_once("source/section/foot.php");	
  ?>
</div><!--fin footer-->
</div><!--fin div body-->
<!--debut du code js-->
<script type="text/javascript" src="source/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="source/js/jquery.form.min.js"></script>
<script type="text/javascript" src="source/js/scroll_animate.js"></script>
<!--<script type="text/javascript" src="source/js/jquery.color.min.js"></script>-->
		 <?php 
	if(!empty($_GET['b']) AND $_GET['b']=="user.tree.user"){
		
  ?>
<script type="text/javascript" src="source/js/go.js"></script>
	
	<script>
	const myDiagram = new go.Diagram("myDiagramDiv",
  {
    "undoManager.isEnabled": true,
    layout: new go.TreeLayout({ angle: 90, layerSpacing: 35 })
  });

myDiagram.nodeTemplate =
  new go.Node("Horizontal",
      { background: "#fff " })
    .add(
      new go.Picture({ margin: 10, width: 50, height: 50, background: "#fff" })
        .bind("source"),
      new go.TextBlock("Default Text",
          { margin: 12, stroke: "#0d1124", font: "bold 15px bee_01" })
        .bind("text", "name")
    );

// define a Link template that routes orthogonally, with no arrowhead
myDiagram.linkTemplate =
  new go.Link(
      // default routing is go.Routing.Normal
      // default corner is 0
      { routing: go.Routing.Orthogonal, corner: 5 })
    .add(
      // the link path, a Shape
      new go.Shape({ strokeWidth: 3, stroke: "#555" }),
      // if we wanted an arrowhead we would also add another Shape with toArrow defined:
      //new go.Shape({  toArrow: "Standard", stroke: null  })
    );

// it's best to declare all templates before assigning the model
myDiagram.model = new go.TreeModel(
  [
 <?php 
		$pseudo=$_SESSION['pseudo'];
		$Aava=is_file("source/img/avatar/user/".$_SESSION['ava'])? "source/img/avatar/user/".$_SESSION['ava']: "source/img/avatar/avatar.png";
		
		echo  '{ key: "1",  name: "'.$_SESSION['pseudo'].'",  source: "'.$Aava.'" },';
		
		
		$nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM user  WHERE parrain='$pseudo'  " ) ;
		   $nbr_pseudo->execute();
		   $chif_pse=$nbr_pseudo->fetch();

		 if ($chif_pse['nbr']!=0)
		  {							 
            $query = $tams->query("Select * FROM user WHERE parrain='$pseudo' "); 
             $pa=1;
			 $f1=2;
			while ($blo = $query->fetch())
			{
				$AavaF=is_file("source/img/avatar/user/".$blo['ava'])? "source/img/avatar/user/".$blo['ava']: "source/img/avatar/avatar.png";
				echo  '{ key: "'.$f1.'", parent: "'.$pa.'", name: "'.$blo['pseudo'].'", source: "'.$AavaF.'" },';
				
				
				
				
					   //peti fils
				
						   $pseudo2=$blo['pseudo'];
				
						$nbr_pseudo2=$tams->prepare("SELECT COUNT(id) nbr FROM user  WHERE parrain='$pseudo2'  " ) ;
					   $nbr_pseudo2->execute();
					   $chif_pse2=$nbr_pseudo2->fetch();

					 if ($chif_pse2['nbr']!=0)
					  {
						 $pa2=$f1;
						 $f2=$f1+1;
							
						   $query2 = $tams->query("Select * FROM user WHERE parrain='$pseudo2' "); 

							while ($blo2 = $query2->fetch())
							{
								
				            $AavaPF=is_file("source/img/avatar/user/".$blo2['ava'])? "source/img/avatar/user/".$blo2['ava']: "source/img/avatar/avatar.png";
								echo  '{ key: "'.$f2.'", parent: "'.$pa2.'", name: "'.$blo2['pseudo'].'", source: "'.$AavaPF.'" },';

								$f2++;
							} 
						 $f1=$f2;
					   }
				else
				{
					$f1++;
				}
				
				
			 } 
       
          }
     
  ?>
   /*
    { key: "2", parent: "1", name: "Filleul1",    source: "source/img/avatar/avatar.png" },
    { key: "3", parent: "1", name: "Filleul2",   source: "source/img/avatar/avatar.png" },
    { key: "4", parent: "3", name: "petitFilleul1", source: "source/img/avatar/avatar.png" },
    { key: "5", parent: "3", name: "petitFilleul2",     source: "source/img/avatar/avatar.png" },
    { key: "6", parent: "2", name: "petitFilleul3", source: "source/img/avatar/avatar.png" },
    { key: "7", parent: "2", name: "petitFilleul4", source: "source/img/avatar/avatar.png" },
    { key: "8", parent: "2", name: "petitFilleul5", source: "source/img/avatar/avatar.png" }*/
  ]);
	</script>
	 <?php }
	//require_once("source/section/foot.php");	
  ?>