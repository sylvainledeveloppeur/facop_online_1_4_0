<?php @session_start();
require_once('../db_2_js.class.php');
 require("../../class/default.class.php"); 

if(!empty($_SESSION['pseudo']))
{
		if(!empty($_GET["cou"]) AND $_GET["cou"]!="0")
		{
			$vid=htmlspecialchars($_GET["cou"]);
			$vid=trim($vid);

			$user=$_SESSION['id'];
			$pack=$_GET["pa"];
			$theme=$_GET["cou"];
			              
			 $bloc=$tams->query(" SELECT * FROM achat WHERE iduser_cha=$user AND  idpack_cha =$pack  ");
                            
            while($outil=$bloc->fetch())
                { 

                    if(empty($outil['theme_cha']))
                      $alltheme=$theme." ";
                    else
                    {
                        $alltheme=str_replace($theme." ","", $outil['theme_cha']);
                        $alltheme=$alltheme.$theme." ";
                    }
			
			//upd lu notifi
                 $stmt = $tams->prepare("UPDATE achat  SET theme_cha='$alltheme'  WHERE iduser_cha=$user AND  idpack_cha =$pack  ");
                 // execute the query
                 $stmt->execute();
                   

                    if($stmt)
                    {
                        exit("true");
                    }
                    else
                    {
                        exit("no");
                    }
				
				 }
		}
		else
		{
			exit(false);
		}

}
else
{
	exit(false);
}


?>