<?php @session_start(); 
require_once('../db_2_js.class.php');
require_once('../../class/Bee.class.php');?> 

<form name="TAform" action="js/manage_form/setup_update_sql.php" method="post" id="TAform" class="fosli" style="background-color: #e1e7ea;width: 100%;" enctype="multipart/form-data">
	<div class="eta_form"></div>
	
	<div    class="linkp retou" data-page="setup_show" data-title="Les paramètres" data-parametre="id=1&type=1" >RETOUR </div>

	<!--TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->

    <?php 

$bloc=$tams->query(' SELECT * FROM _webapp_info  WHERE id =1 ');
				
$ii=1;
while($done=$bloc->fetch())
{




?>
<div class="iladd hide">
  <label for="atit">id</label>
  <input type="text" required="required" name="id" id="tit" value="1" >
</div>

 <div class="iladd">
         <img src="img/avatar.png" class="img_add1 hide"  width="100" height="100" alt=""/>
    </div>

	

      <div class="groupSettings">
      <p>Inscription </p>

        <div class="iladd">
        <select required="required" name="ins" class="pag_ser" id="matF" >
                <?php $myins=$done['android_nosignup']==1 ? "Désactiver":"Activer"; echo '<option value="'.$done['android_nosignup'].'">'.$myins.'</option>'; ?>
                <option value="0">-- Activation des inscriptions --</option>
                <option value="0">Activer</option>
                <option value="1">Désactiver</option>
                </select>
            
            </div>
    </div>
    <!-- eeeee -->

    <div class="groupSettings">
      <p>Mise à jour en cours</p>

        <div class="iladd">
        <select required="required" name="upd" class="pag_ser" id="matF" >
                <?php $myins=$done['android_noupdate']==1 ? "Activer":"Désactiver"; echo '<option value="'.$done['android_noupdate'].'">'.$myins.'</option>'; ?>
                <option value="0">-- Activation des inscriptions --</option>
                <option value="1">Activer</option>
                <option value="0">Désactiver</option>
                </select>
            
            </div>
    </div>
    <!-- eeeee -->

<div class="groupSettings">
      <p>Vidéo du site web</p>

        <div class="iladd">
        <select required="required" name="vidsi" class="pag_ser" id="matF" >
                <?php echo '<option value="'.$done['webVideo'].'">'.$done['webVideo'].'</option>'; ?>
                <option value="0">-- Type vidéo --</option>
                <option value="vimeo">Vimeo</option>
                <option value="youtube">Youtube</option>
                </select>
            
            </div>
    </div>
    <!-- eeeee -->

    <div class="groupSettings">
      <p>Retrait minimum (bonus)</p>

      <div class="iladd">
  <input type="number" required="required" name="ret" id="tit" value="<?php echo $done['minRetrait']; ?>">
</div>

    </div>
    <!-- eeeee -->

    <div class="groupSettings">
     
    <p>Monnaie</p>
      <div class="iladd">
         <input type="text" required="required" name="cur" id="tit" value="<?php echo $done['currency']; ?>">
      </div>

    <p>Parrain direct(pourcentage)</p>
      <div class="iladd">
         <input type="number" required="required" name="pdi" id="tit" value="<?php echo $done['pdirect']; ?>">
      </div>

    <p>Parrain indirect(pourcentage)</p>
      <div class="iladd">
        <input type="number" required="required" name="pidi" id="tit" value="<?php echo $done['pindirect']; ?>">
      </div>

      <p>Remise achat des niveaux(ex: 20)</p>
      <div class="iladd">
        <input type="number" required="required" name="remi" id="tit" value="<?php echo $done['remiseAchat']; ?>">
      </div>

    <p>Frais de payement(fluterwave)</p>
      <div class="iladd">
        <input type="number" required="required" name="fra" id="tit" value="<?php echo $done['frai_paie_mobile']; ?>">
      </div>

    </div>
    <!-- eeeee -->

    <div class="groupSettings">

         <p>Android version</p>
      <div class="iladd">
         <input type="text" required="required" name="aver" id="tit" value="<?php echo $done['android_ver']; ?>">
      </div> <!-- -->

      <p>Android version infos</p>
      <div class="iladd">
         <input type="text" required="required" name="anew" id="tit" value="<?php echo $done['android_new']; ?>">
      </div> <!-- -->

      <p>Android mise à jour</p>
      <div class="iladd">
       
      <select required="required" name="aob" class="pag_ser" id="matF" >
                <?php $myins=$done['android_majObli']==1 ? "Obligatoire":"Optionel"; echo '<option value="'.$done['android_majObli'].'">'.$myins.'</option>'; ?>
                <option value="0">-- Android mise à jour --</option>
                <option value="1">Obligatoire</option>
                <option value="0">Optionel</option>
                </select>
      </div> <!-- -->


    </div>
    <!-- eeeee -->

          <div class="groupSettings">

      <p>Web version</p>
      <div class="iladd">
      <input type="text" required="required" name="wver" id="tit" value="<?php echo $done['web_ver']; ?>">
      </div> <!-- -->

      <p>Web version infos</p>
      <div class="iladd">
      <input type="text" required="required" name="wnew" id="tit" value="<?php echo $done['web_new']; ?>">
      </div> <!-- -->


      </div>
      <!-- eeeee -->

          <div class="groupSettings">

          <p>Iphone version</p>
          <div class="iladd">
          <input type="text" required="required" name="iver" id="tit" value="<?php echo $done['iphone_ver']; ?>">
          </div> <!-- -->

          <p>Iphone version infos</p>
          <div class="iladd">
          <input type="text" required="required" name="inew" id="tit" value="<?php echo $done['iphone_new']; ?>">
          </div> <!-- -->

          <p>Iphone mise à jour</p>
          <div class="iladd">

          <select required="required" name="iob" class="pag_ser" id="matF" >
                <?php $myins=$done['iphone_majObli']==1 ? "Obligatoire":"Optionel"; echo '<option value="'.$done['iphone_majObli'].'">'.$myins.'</option>'; ?>
                <option value="0">-- Iphone mise à jour --</option>
                <option value="1">Obligatoire</option>
                <option value="0">Optionel</option>
                </select>
          </div> <!-- -->


          </div>
          <!-- eeeee -->



    

    <?php 

}

?>

	
	
  <input name="aok" id="aok" type="submit" value="Save">
	
	
	
</form>


			  