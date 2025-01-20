<?php @session_start();

$tz = 'Africa/Douala';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp/
//$dt->format('d.m.Y, H:i:s');
$genere=$dt->format('d/m/Y, H:i');
$phpdate=$dt->format('d/m/Y H:i:s');

class Beclas
{
	  private static $_tams;
	  private static $_config;
    private static $_info;
	
	/* public function __construct($db)
     {

		$this->_tams=$this->setDb($db);

	 }*/
	
//----------- Check user right delete-------------$Beclas->checkDel();
	  public static function checkDel() 
	  {
            if($_SESSION["delet"]==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
            {
 
                $right=true;
            }
            else
            { exit('<div id="noadtat">Sorry! You don\'t have the right to delete</div>');}


		return $right; 
	  }
    
//----------- Check user right insert--------------$Beclas->checkIns();
	  public static function checkIns() 
	  {
            if($_SESSION['inser']==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
            {
 
                $right=true;
            }
            else
            { exit('<div id="noadtat">Sorry! You don\'t have the right to insert</div>');}


		return $right;
	  }    
    
//----------- Check user right update-------------$Beclas->checkUpd();
	  public static function checkUpd() 
	  {
            if($_SESSION['updat']==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
            {
 
                $right=true;
            }
            else
            { exit('<div id="noadtat">Sorry! You don\'t have the right to update</div>');}


		return $right;
      }
    //----------- Check user right select---------$Beclas->checkSel();
	  public static function checkSel() 
	  {
            if($_SESSION['selec']==1 OR $_SESSION["admin"]==1 OR $_SESSION["droit"]==2)
            {
 
                $right=true;
            }
            else
            { exit('<div id="noadtat">Sorry! You don\'t have the right to select '.$_SESSION['nom'].'</div>');}


		return $right;
      }
       //----------- show action information---------$Beclas->echoo(1);
	  public static function echoo($vaa) 
	  {
            if($vaa==1)
          { echo '<td colspan="5" class="ok_form">Successfully done</td>';}
            else
          { echo '<td colspan="5" class="stop_form">Error, please retry</td>';}



      }
      //----------- show action information---------$Beclas->echoo1(0,'error');
    public static function echoo1($eta,$text) 
    {
          if($eta==1)
             echo '<div id="okadtat">'.$text.'</div>';
          else if($eta==0)
             echo '<div id="noadtat">'.$text.'</div>';
          else
             echo '<div id="dejaadtat">'.$text.'</div>';



    }  
      //----------- show action information---------$Beclas->deletFil("../../../../source/img/store/".$done['img_pro']);
	  public static function deletFil($path) 
	  {
          
         @unlink($path);

    }

      //----------- online-------------$Beclas->onlineShow(1);
	  public static function onlineShow($valu) 
	  {
      $onlineShow=$valu==0 ? '<span class="orange_1">Hors Ligne</span>':'<span class="vert_1">En Ligne</span>';
     

		return $onlineShow;
      }

       //----------- online-------------$Beclas->onlineState(1, "Bloqué, "Libre");
	  public static function onlineState($valu, $OK, $NO) 
	  {
      $onlineShow=$valu==0 ? '<span class="orange_1">'.$NO.'</span>':'<span class="vert_1">'.$OK.'</span>';

		return $onlineShow;
    }
    
    //----------- online-------------$Beclas->onlineState(1, "Bloqué, "Libre");
	  public static function onlineBloc($valu, $OK, $NO) 
	  {
      $onlineShow=$valu==1 ? '<span class="orange_1">'.$NO.'</span>':'<span class="vert_1">'.$OK.'</span>';

		return $onlineShow;
    }

     //----------- online-------------$Beclas->onlineState(1, "Bloqué, "Libre");
	  public static function onlineInfo($valu, $new, $done, $cancel) 
	  {
      $onlineShow="";
      if($valu==0)
        $onlineShow='<span class="orange_1">'.$new.'</span>';
      else if($valu==1)
      $onlineShow='<span class="vert_1">'.$done.'</span>';
      else if($valu==2)
      $onlineShow='<span class="rouge_1">'.$cancel.'</span>';

		return $onlineShow;
    }

      //----------- online-------------$Beclas->angfloFranco("fr");
	  public static function angfloFranco($valu) 
	  {
      $angfloFranco=$valu=="fr" ? 'Francophone':'Anglophone';
     

		return $angfloFranco;
    }  
    
    //----------- online-------------$Beclas->showLang("fr");
	  public static function showLang($valu) 
	  {
      
      $angfloFranco=$valu=="fr" ? 'Francais':'Anglais';
     
		return $angfloFranco;
    }

      //----------- notify-------------$Beclas->notify($tams, 2, $_POST['nom'], "Eleve", "Henry");
	  public static function notify($tams, $idadmin, $admin, $table, $cham) 
	  {
      			//notification
            $bloc=$tams->prepare(" INSERT INTO  _admin_notification (auteu_n,id_desti_n,mes_n,lu_n,date_n) VALUES (?,?,?,?,NOW())");
            $inser=$bloc->execute(array('Vous',$_SESSION['id_admin'],"You have '$table' information: '$cham' ",0));

              //historiq								
            $bloc2=$tams->prepare(" INSERT INTO  _admin_historique (id_te_his,ip_his,mes_his,navigateu_his,date_his) VALUES (?,?,?,?,NOW())");
            $bloc2->execute(array($idadmin,$_SERVER['REMOTE_ADDR'],"'$admin' have <br/>'$table' information: '$cham'",$_SERVER['HTTP_USER_AGENT']));
   
		  return true;
    } 

      //----------- cham data-------------$Beclas->chamDta($tams, "matiere", "id_mat", $done['matie'], "nom")
	  public static function chamDta($tams, $table, $cham, $valu, $chamShow) 
	  {
            $nbr_pseudo=$tams->prepare("SELECT * FROM $table WHERE $cham='$valu' ");
            $nbr_pseudo->execute();
            $chif_pse=$nbr_pseudo->fetch();
   
		  return !empty($chif_pse[$chamShow]) ? $chif_pse[$chamShow]:"null";
    } 

    
      //----------- notify-------------$Beclas->selectOption($tams, "matiere", "nom", "id_mat", "nom")
	  public static function selectOption($tams, $table, $cham, $id, $chamShow) 
	  {
         $option=""; 

            $bloc=$tams->query(" SELECT * FROM $table  ORDER BY $cham  ASC ");
                     
            while($done=$bloc->fetch())
              { 
              
                $option.='<option value="'.$done[$id].'">'.$done[$chamShow].'</option> ';

              }	
   
		  return !empty($option) ? $option:"null";
    } 


    //----------- notify-------------$Beclas->selectOption2($tams, "matiere", "nom", "id_mat", "nom")
	  public static function selectOption2($tams, $table, $cham, $id, $chamShow) 
	  {
         $option=""; 

            $bloc=$tams->query(" SELECT * FROM $table  ORDER BY $cham  ASC ");
                     
            while($done=$bloc->fetch())
              { 
              
                $option.='<option value="'.$done[$id].' HHH '.$done[$chamShow].'" >'.$done[$chamShow].'</option> ';

              }	
   
		  return !empty($option) ? $option:"null";
    } 
	
	//----------- notify-------------$Beclas->selectOption2($tams, "matiere", "nom", "id_mat", "nom")
	  public static function selectOption4($tams, $table, $cham, $id, $chamShow) 
	  {
         $option=""; 

            $bloc=$tams->query(" SELECT * FROM $table  ORDER BY $cham  ASC ");
                     
            while($done=$bloc->fetch())
              { 
              
                $option.='<option value="'.$done[$id].' HHH '.$done[$chamShow].' HHH '.$done['name_pack'].' - '.$done[$chamShow].'" >'.$done[$chamShow].' ('.$done['name_pack'].')</option> ';

              }	
   
		  return !empty($option) ? $option:"null";
    } 
	

	 //----------- notify-------------$Beclas->selectOption($tams, "matiere", "nom", "id_mat", "nom")
   public static function selectOption3($tams, $table, $cham, $id, $chamShow) 
   {
        $option=""; 

           $bloc=$tams->query(" SELECT * FROM $table  ORDER BY $cham  ASC ");
                    
           while($done=$bloc->fetch())
             { 
             
               $option.='<option value="'.$done[$id].' HHH '.$done[$chamShow].' ('.Beclas::chamDta($tams, "class", "id_cla", $done['class'], "nom").')" >'.$done[$chamShow].' ('.Beclas::chamDta($tams, "class", "id_cla", $done['class'], "nom").')</option> ';

             }	
  
     return !empty($option) ? $option:"null";
   } 

   	 //----------- notify-------------$Beclas->selectOption($tams, "matiere", "nom", "id_mat", "nom")
      public static function BlocHome($tams, $title, $table, $id, $countNB, $anim) 
      {

           $nbr_pseudo=$tams->prepare("SELECT COUNT($id) nbr FROM $table " ) ;
           $nbr_pseudo->execute();
           $chif_pse=$nbr_pseudo->fetch();
   
		 
          
        echo '            <div class="wow '.$anim.' animated" >
                     <div class="wid_95 mar_auto">
               <h2>'.$title.'</h2>
          <div class="hcorp">';

          echo '<div  class="counter_'.$countNB.' tex_center">'.$chif_pse['nbr'].'</div>';

        echo '  
                    </div>
              </div><!--end-->
        </div> ';
      } 

      
public function phpDate()
{
    $tz = 'Africa/Douala';
                          $timestamp = time();
                          $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                          $dt->setTimestamp($timestamp); //adjust the object to correct timestamp/
                          //$dt->format('d.m.Y, H:i:s');


                          $genere=$dt->format('d/m/Y, H:i');
                          $phpdate=$dt->format('Y-m-d H:i:s');
						  //$_POST['endTime']="2023-2-6 10:00:00";
   return $phpdate;
}

 //----------- notify-------------$Beclas->BlocHomeSum($tams, "matiere", "nom", "som", "nom")
 public static function BlocHomeSum($tams, $title, $table, $cham, $countNB, $anim) 
 {

      $nbr_pseudo=$tams->prepare("SELECT sum($cham) nbr FROM $table " ) ;
      $nbr_pseudo->execute();
      $chif_pse=$nbr_pseudo->fetch();


     
   echo '            <div class="wow '.$anim.' animated" >
                <div class="wid_95 mar_auto">
          <h2>'.$title.'</h2>
     <div class="hcorp">';

     echo '<div  class="counter_'.$countNB.' tex_center">'.$chif_pse['nbr'].'</div>';

   echo '  
               </div>
         </div><!--end-->
   </div> ';
 } 
	
    
}

$Beclas=new Beclas();



