<?php @session_start(); 

require_once('../db_2_js.class.php');



if(!empty($_POST['pse'])AND strlen($_POST['pse'])>1 AND !empty($_POST['pag']) )

{

	if(!empty($_POST['pas']) AND strlen($_POST['pas'])>=5 AND preg_match("#[0-9]{1,}#",$_POST['pas']) AND preg_match("#[a-z]{1,}#",$_POST['pas']) AND preg_match("#[A-Z]{1,}#",$_POST['pas'])  )

      {

		

		if($_POST['rol']!="null"  )

           {

			

			//recherche du pseudo

					   $nbr_pseudo=$tams->prepare("SELECT COUNT(id) nbr FROM _admin_team

					   WHERE pseudo=:pse  " ) ;

					   $nbr_pseudo->execute(array('pse'=>$_POST['pse']));

					   $chif_pse=$nbr_pseudo->fetch();



				   if ($chif_pse['nbr']==0)

					{
					   $_POST['pag']=str_replace('0 HHH ','',$_POST['pag']); 

							$bloc=$tams->prepare(" INSERT INTO  _admin_team (

							id_admin,actif,pseudo,droit_team,nom_team,prenom_team,pass,role_team,online,online_time,nb_arti_team,about_team,img_team,admin,selec,updat,delet,inser, page, date_team

							) 

												   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");



							$inser=$bloc->execute(array($_SESSION['id_admin'],1,$_POST['pse'],1,"null","null",sha1($_POST['pas']),$_POST['rol'],0,time(),0,"null","avatar.png",$_POST['admin'],$_POST['sel'],$_POST['upd'],$_POST['del'],$_POST['ins'] ,$_POST['pag']));



						if($inser)

							{

								echo '<div class="ok_form">Action done</div>';	

							}

				   }

					else

					{

					 echo '<div class="stop_form">User\'s name is already used</div>';	

					}

			}

			else

			{

			echo '<div class="stop_form">Choice a role</div>';	

			}

	  }

      else

		{

		

		  echo '<ul class="stop_form ul">Le mot de passe doit contenir au moin:

						  

						  <li>Plus de 5 caractères</li>

						  <li>Chiffre</li>

						  <li>Caractère minuscule</li>

						  <li>Caractère majuscule</li>

						  </ul>';

		  

		}

	

}

else

{

echo '<div class="stop_form">Tous les champs sont obligatoirs</div>';	

}



?>