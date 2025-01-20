<?php require_once("db_app.class.php");
//require_once("../class/Bee.class.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=0.3,minimum-scale=0.3">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link type="text/css" rel="stylesheet" href="../css/beestrap.css">
  <title>Integrate Feda Checkout to my website</title>


<style>


body .bft-search {
	display: none;
}


</style>
</head>
<body>

 <?php 
if(isset($_GET['ava']) AND is_file('../../img/avatar/user/'.$_GET['ava']))
{
	echo '<img id="myava"  src="../../img/avatar/user/'.$_GET['ava'].'" width="300px" height="200px">';
}
else
{
	//echo '<img id="myava"  src="../../img/avatar/avatar.png" width="300px" height="200px">';
}


 ?>
 
 
 <div class="hide"> 
  <p> id</p>  
 <input type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>" required="required1">
 </div> 
 
 <div id="tree" style="overflow: scroll !important; height: 100% !important;" ></div>

  <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
  <script src="https://balkan.app/js/FamilyTree.js"></script>

  <?php 

echo '
<script type="text/javascript">
 $(document).ready(function() {

	
	var options = getOptions();

var chart = new FamilyTree(document.getElementById("tree"), {
    mouseScrool: FamilyTree.action.xScroll,
    scaleInitial: FamilyTree.match,
    siblingSeparation: 120,
    template: \'john\',
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img",
    }
});

chart.load([';


        $pseudo=$_GET['pseudo'];
		$id=$_GET['id'];
		$site="https://facop.training/";
		$Aava=$site."source/img/avatar/avatar.png";
	

		echo '{ id: 1, name: "Moi", img: "'.$Aava.'"  },';
		
		
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
				$AavaF=is_file($site."source/img/avatar/user/".$blo['ava'])? $site."source/img/avatar/user/".$blo['ava']: $site."source/img/avatar/avatar.png";
				echo '{ id: '.$f1.', mid: "'.$pa.'", name: "'.$blo['pseudo'].'", img: "'.$AavaF.'"  },';

			
				
				
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
								
				            $AavaPF=is_file($site."source/img/avatar/user/".$blo2['ava'])? $site."source/img/avatar/user/".$blo2['ava']: $site."source/img/avatar/avatar.png";
							
				            echo '{ id: '.$f2.', mid: "'.$pa2.'", name: "'.$blo2['pseudo'].'", img: "'.$AavaPF.'"  },';

							
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

  

echo ']);

function getOptions(){
    const searchParams = new URLSearchParams(window.location.search);
    var fit = searchParams.get(\'fit\');
    var enableSearch = true;
    var scaleInitial = 1;
    if (fit == \'yes\'){
        enableSearch = false;
        scaleInitial = FamilyTree.match.boundary;
    }
    return {enableSearch, scaleInitial};
}

 });
 </script>';
	
?>

  

</body>
</html>