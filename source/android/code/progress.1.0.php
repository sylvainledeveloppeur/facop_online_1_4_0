<?php
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

/* 
	 $mail=$_POST['mail'];
	 $pass=$_POST['pass']; */
    

     $pak=explode(" HHH ", $_POST['lang']);
	 $theme= $pak[1];
     $pack=$pak[0];
     $user=$_POST['packid'];
     //exit($_POST['lang'].$user);
	 // Check whether username or password is set from android	
     if(isset($user) )
     {
           
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
                        exit("false");
                    }

                }
        


    }
    else
    {
        exit("false");
    }
	
?>