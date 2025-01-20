<div id="pg_testi">
	
<!-- top -->	
<div class="bac_bla">
  <div class="fenetre">
				<div class="qcm">
			   <header class="header tex_cen">
				   <?php echo '<h1 class="mar_bot_25">Quiz '.htmlspecialchars(strtoupper(str_replace("_"," ",$_GET["f"]))).': Test de connaissances</h1>'; ?>
					
					<ul class="ulQcm">
						<li class="qcmHide">Question Number: <span id="question-number">0</span>/<span id="question-all">0</span></li>
						<li  class="qcmHide">Veuillez lire attentivement aux questions suivantes et choisir la bonne question.</li>
						<li id="current-score0" class="hide">Score: <span id="score">0/5 </span></li>
					</ul>
			</header>
			<main class="wid_90 mar_auto col_2_100">
				<section class="js-quiz col_2_100">
					<section class ="start-quiz">
						<img src="source/img/quiz.png" alt="paint rollers making paint streaks" id="paint-rollers" class="dis_non" />
						<h2 class="tipQui wid_80 col_2_100">Vous allez être soumis à une série de questions...  Chaque question contient 4 réponses, sélectionnez la bonne. Puis cliquez sur le bouton suivant.
						Au final, vous obtiendrez un certificat si vous avez une note supérieur ou égale à 70% (Facop A0 exclus)</h2>
						<button type="button" id ="button-start" class="bg_1">Commencer</button>
					</section>
					<section class ="js-answer"></section>
					<section class="js-results"></section>
					<div class="icifo"><img src="source/img/load_2.gif" alt="load"  /></div>
				</section>
			</main>
			</div>
    </div>
</div> <!-- End -->

	
	
</div>
