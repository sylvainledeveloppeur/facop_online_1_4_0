<?php 
require_once("../class/Bee.class.php");
require_once("../class/db_app.class.php");

//$_POST["packid"]=9;$_POST["lang"]="en";
  $lang =$_POST["lang"]=="fr" ? $_POST["lang"] : "en";
  $packid =$_POST["packid"];

  
  $question=""; 
  $reponse="";
  $option="";

  $nbr_pseudo=$tams->prepare("SELECT COUNT(id_q) nbr FROM quiz  WHERE actif_q=1 AND lang_q='$lang' AND idpack_q=$packid
                                  " ) ;
                                 $nbr_pseudo->execute();
                                 $chif_pse=$nbr_pseudo->fetch();

                               if ($chif_pse['nbr']!=0)
                                {
  $query = $tams->query("Select * from quiz WHERE actif_q=1 AND lang_q='$lang' AND idpack_q=$packid  ORDER BY RAND() LIMIT 10 "); 
  $outils = array();
  while ($outil = $query->fetch()) 
  {
    
    $question.=$outil["question_q"]." HHH ";
    $reponse.=$outil["reponse_q"]." HHH ";
    $option.=$outil["reponse1_q"]." HHH ".$outil["reponse2_q"]." HHH ".$outil["reponse3_q"]." HHH ".$outil["reponse4_q"]." HHH ";

  }
    array_push($outils, array(
                              "lang" => $lang,
                              "id" => 1,
                              "question" => substr($question, 0, -5) ,
                              "reponse" =>  substr($reponse, 0, -5),
                              "option" => substr($option, 0, -5))); 
  echo(json_encode($outils));
}
else
{
  echo "nothing";
} 

?>