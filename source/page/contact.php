<div id="pg_contact">

	<div class="bac_top">
  <div class="fenetre">
	
   
	   <div class="wid_90 mar_auto pagh1 tex_center" >
		
		     <h1 class="h1">Contact</h1>
		    <strong class="">Comment contacter FACOP ?</strong>
		   
        </div>
	  
    
    </div>
</div> <!-- End -->
	
<?php 
    $un=rand(0,9);
    $de=rand(0,9);
    $cal=$un.' + '.$de.' = ';
    $_SESSION['cap']=$un+$de;
  ?>

		
		<!--us-->
	
 <div class="bac_bla">
  <div class="fenetre">
	  
	<div class="Q_cols_2_1col after"> 

	<div class="flo_rig wid_70"> 
	    <ul class="ulctac after Q_cols_2_1col">
       <h1 class="text_center">Formulaire de contact </h1>
	   <p class="text_center"> 
Vous avez envie de discuter d'une formation ou d'un projet ? N'hésitez pas à nous contacter et parlons-en simplement autour d'un café!</p><br/>
		
					<form name="sunfo" id="sunfo" class="Tfom_1 Q_cols_2_1col" method="post" action="source/js/form_php/send_mail.php" >
			<div class="fd">
				<input type="text" name="nom" id="sunname" class="input" placeholder="Nom ">
			</div>
					<div class="fd">
				<input type="text" name="tel" id="sunphone" class="input" placeholder=" tel">
						</div>
						<div class="fd">
				<input type="text" name="mail" id="sunmail" class="input" placeholder=" E-mail ">
							</div>
				<div class="fd">
				<input type="text" name="suj" id="sunsuj" class="input" placeholder=" Sujet " value="<?php if(!empty($_GET['s'])) echo $_GET['s']; ?>">
				</div>
						
				<div class="ff"><textarea name="mes" id="sunmes" class="input_area" placeholder="Veuillez décrire votre besoin"></textarea></div>
			   <div class="ff tex_cen"><?php echo $cal; ?> <input type="text" name="cap" id="cap"  class="input"  placeholder="Réponse"></div>
						
				<input type="submit" name="okfo" id="okfo" value="Envoyer" class="input_send">
			
				<div class="eta_form"></div>
			</form>


        </ul>
	</div>

    <div class="flo_lef wid_30">
	
	      <ul class="ultact after Q_cols_2_2col">
				<li><i class="icon ion-ios-location col1"></i> <strong> Adresse</strong></br> Siège: Yaoundé-Elig Essono</br> B.P: 3928 </li>
				<li><i class="ion-android-mail col1"></i><strong> Email</strong> </br> info@facop.training <br></li>
				<li><i class="icon ion-ios-telephone col1"></i> <strong> Téléhone</strong></br>   +237655418690 / +237678409417</li>
				 <li><i class="ion-android-alarm-clock col1"></i>
					<strong> Disponibilité</strong></br>
                  Lundi - Samedi<br>

                  8:00  - 17:30 PM</li>
			</ul>

	</div>

	</div>
	 
    </div>
	</div>
	<!---->

<!--statistique-->
	<div class="bac_ble">
		<div class="fenetre">
	
			<ul class="ulstat after">
						<li><i class="ion-person-stalker"></i><span id="counter_1">1250</span>  Etudiants</li>
						<li><i class="ion-ios-book"></i><span id="counter_2">04</span>  Formations</li>
						<li><i class="ion-ios-bookmarks"></i><span id="counter_3">33</span>  Thèmes</li>
						<li><i class="ion-filing"></i><span id="counter_4">3580</span>  Certifications</li>
						
					</ul>
		</div>
  </div>
		
		<!--FAQ-->
	 <div class="bac_bla">
		<div class="fenetre">
			<div class="blo_2_1 after Q_cols_2_1col">
				<div class="flo_lef wid_40">
					<h2 class="h1"> F.A.Q</h2>
					
					<p class="mar_top_40 mar_bot_20">Des question? Nous sommes disponible. Retrouvez ci-contre, une liste d'information pouvant vous aider...</p>
						<img class="" alt="Facop Online fAQ" src="source/img/background/faq.png" loading="lazy" >	

					
					<ul class="ultex after mar_top_20">
						 <li><a href="index.php?b=uno.faq" class="btn_3 mar_top_20">Tout afficher</a></li>
						 <li><a href="index.php?b=uno.contact" class="btn_3 mar_top_20">Contact</a></li>
	                </ul>
	 
		        </div>
				<div class="flo_lef wid_60">
					
				  <div class="wid_85 mar_auto">
					<ul class="ulfaq after">
						
						<li>
							<p class="faqq">Qu'est-ce que FACOP ONLINE propose comme formations ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">FACOP ONLINE offre une vaste gamme de formations en ligne couvrant divers domaines, tels que l'entrepreneuriat, le leadership et plus encore. Nos cours sont conçus pour répondre aux besoins des débutants comme des professionnels expérimentés.</p>
						</li>
						<li>
							<p class="faqq">Comment puis-je m'inscrire à une formation ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">Pour vous inscrire à une formation, rendez-vous sur notre site, choisissez le cours qui vous intéresse, puis cliquez sur le bouton "S'inscrire". Suivez les instructions pour créer un compte, compléter le paiement (si applicable) et accéder immédiatement au contenu de la formation.</p>
						</li>
						<li>
							<p class="faqq"> Quels sont les modes de paiement acceptés ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">Nous acceptons divers modes de paiement, y compris les cartes de crédit (Visa, MasterCard, American Express), PayPal, et d'autres méthodes de paiement sécurisées. Les détails exacts des options de paiement sont affichés lors du processus de paiement.</p>
						</li>
						<li>
							<p class="faqq">Puis-je accéder aux formations sur mobile ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">Oui, notre plateforme est compatible avec les appareils mobiles. Vous pouvez accéder aux cours depuis votre smartphone ou tablette via notre application mobile ou en utilisant un navigateur web sur votre appareil.</p>
						</li>
						<li>
							<p class="faqq">Les formations sont-elles certifiantes ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">Certaines de nos formations offrent des certificats de complétion ou de compétence. Les détails sur les certifications disponibles sont précisés dans la description de chaque cours. Assurez-vous de vérifier si un certificat est inclus avant de vous inscrire.</p>
						</li>
						<li>
							<p class="faqq">Que faire si j'ai des problèmes techniques avec le site ou les cours ? <i class="ion-chevron-down"></i></p>
							<p class="faqr">Si vous rencontrez des problèmes techniques, veuillez contacter notre support technique en utilisant le formulaire de contact sur notre site ou en envoyant un e-mail à [adresse e-mail de support]. Nous nous efforçons de résoudre les problèmes rapidement et efficacement.</p>
						</li>
					</ul>
					</div>
		        </div>
	 
		    </div>
	 
		</div>
  </div>
 
	  <div class="goo">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.1766005015851!2d11.52423036960827!3d3.873010437798486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bc58755ce71bb%3A0xe418f5b9457f3525!2zSMO0dGVsIFRhbmdvLCBZYW91bmTDqQ!5e0!3m2!1sfr!2scm!4v1725570106019!5m2!1sfr!2scm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
     </div>
	
</div>
