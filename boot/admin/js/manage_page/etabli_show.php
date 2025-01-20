<?php  @session_start(); 
require_once('../db_2_js.class.php');
?> 
<div class="wow bounceInDown animated eta_form tex_center"></div>
<table width="100%" border="1" class="utable utable_1">
  <tbody>
    <thead>
  <!--   <tr>
      <th scope="col">No</th>
      <th scope="col">Image</th>
      <th scope="col">Editor</th>
    </tr> -->
	   </thead>
	   <!--555555555-->
        <tr>
		      <td scope="col" data-title="No">Logo </td>
      <td scope="col" data-title="Image"><img src="../../source/img/logo/logo.png"  alt=""/></td>
      <td scope="col" data-title="Editor">
		<form id="fo" name="fo" method="post" class="fosli" action="js/manage_form/edit_logo_sql.php">
			(300 x 300 Px) PNG<br>

		  <input type="file" id="mg1" name="mg1" class="slimg myinput">
			<input type="hidden" id="chemin" name="chemin" value="logo.png">
			<input type="submit" value="Modifier" class="mybtn">
		 
          </form>
	  </td>
    </tr> 

	<tr>
		      <td scope="col" data-title="No">Photo Fondateur</td>
      <td scope="col" data-title="Image"><img src="../../source/img/avatar/fondateur.png"  alt=""/></td>
      <td scope="col" data-title="Editor">
		<form id="fo" name="fo" method="post" class="fosli" action="js/manage_form/edit_fonde_img_upd.php">
			(300 x 300 Px) PNG<br>

		  <input type="file" id="mg2" name="mg2" class="slimg myinput">
			<input type="hidden" id="chemin" class="myinput" name="chemin" value="../../../../source/img/avatar/fondateur.png">
			<input type="submit" value="Modifier" class="mybtn">
		 
          </form>
	  </td>
    </tr> 
        
       
  </tbody>
</table>

<form name="TAform" action="js/manage_form/etabli_upd_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">

<?php 

$bloc=$tams->query(' SELECT * FROM etablissement  WHERE id_eta=1 ');
				
$ii=1;
while($done=$bloc->fetch())
{




?>

	<div class="iladd hide">
  <label for="atit">id</label>
  <input type="text" required="required" name="id" id="tit" value="1" >
</div>

	<div class="iladd">
  <label for="atit">Nom site/appli</label>
  <input type="text" required="required" name="eta" id="tit" <?php echo 'value="'.$done['eta'].'"'; ?> >
</div>

<div class="iladd">
  <label for="atit">Slogan</label>
  <input type="text" required="required" name="slo" id="tit" <?php echo 'value="'.$done['slo'].'"'; ?> >
</div>

<div class="iladd">
  <label for="atit">Année </label>
  <input type="text" required="required" name="anesco" id="tit" <?php echo 'value="'.$done['anesco'].'"'; ?> >
</div>

<div class="iladd">
  <label for="atit">Nom Foundateur </label>
  <input type="text" required="required" name="fou" id="titEN"  <?php echo 'value="'.$done['fou'].'"'; ?>>
</div>


<div class="iladd">
  <label for="atit">R. Commerce</label>
  <input type="text" required="required" name="aut" id="titEN"  <?php echo 'value="'.$done['aut'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Matricule (Ex: 22COBICLA)</label>
  <input type="text" required="required" name="mat" id="titEN"  <?php echo 'value="'.$done['mat'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Pays</label>
  <input type="text" required="required" name="pay" id="titEN"  <?php echo 'value="'.$done['pay'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Ville</label>
  <input type="text" required="required" name="vil" id="titEN"  <?php echo 'value="'.$done['vil'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Adresse</label>
  <input type="text" required="required" name="adr" id="titEN"  <?php echo 'value="'.$done['adr'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Email</label>
  <input type="text" required="required" name="mai" id="titEN"  <?php echo 'value="'.$done['mai'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">Téléphone</label>
  <input type="text" required="required" name="tel" id="titEN"  <?php echo 'value="'.$done['tel'].'"'; ?>>
</div>

<div class="iladd">
  <label for="atit">BP</label>
  <input type="text" required="required" name="bp" id="titEN"  <?php echo 'value="'.$done['bp'].'"'; ?>>
</div>
	
<?php 

}

?>
<!--	<div class="iladd">
  <label for="atit">Price</label>
  <input type="number" required="required" name="pri" id="pri" placeholder="Price">
</div>-->
	


	<!--
	<div class="iladd hid">
  <label for="awor">Old price</label>	
  <input type="text"  name="oprice" id="oprice" placeholder="Old price">
</div>-->
	
	
	
<!--<div class="iladd"><label for="avid">Description</label>
	<textarea name="desc" id="desc" required="required" placeholder="Description..."></textarea>	
	</div>-->

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>