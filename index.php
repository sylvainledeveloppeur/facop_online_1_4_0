<?php  session_start();

          if(!empty($_GET['b']) )
            {
              $bee=explode(".",$_GET['b']);
              $_GET['model']=$bee[0];
              $_GET['sheet']=$bee[1];

            }
         if(!empty($_GET['b']) )
            {
              if(array_key_exists(2,$bee) )
                {
                  //$_GET['path']=$bee[2];
                  $beee=explode("_",$bee[2]);
                  $_GET['path']=$beee[0];
                  
                  $_GET['path2']=array_key_exists(1,$beee)? $beee[1]:0;

                }
            }
//store-blog-login-user-pay

if(!empty($_GET['path']) AND is_file("source/require/Doctype_".$_GET['path'].".php") )
  {
     require_once("source/require/Doctype_".$_GET['path'].".php"); 
     require_once('source/require/page.php');

  }
else
  {
     require_once('source/require/Doctype.php'); 
     require_once('source/require/page.php');

  }
 
//fin ---------------------------------------------------------------------------
