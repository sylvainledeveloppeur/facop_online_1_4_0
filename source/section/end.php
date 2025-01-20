    <!-- End of head section HTML codes -->
<script type="text/javascript" src="source/js/foot_js/default.js"></script>
<script type="text/javascript" src="source/js/store_js/store.js"></script>
<script type="text/javascript" src="source/js/user_js/user.js"></script>
<script type="text/javascript" src="source/js/script_js/all.js"></script>
<script type="text/javascript" src="source/js/script_js/panier.js"></script>

<script type="text/javascript" src="source/js/foot_js/query.js"></script>

 <?php
	  

if(empty($_GET['b']))
		{
			echo '<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>';
			echo '<script>$(document).ready(function () {

					const player3 = new Plyr("#player3");
player3.on("ended", (event) => {
  //const instance = event.detail.plyr;
  
 
$(".enpre").removeClass("hide");

});
				
				 });</script>';
		}
elseif(!empty($_GET['b']) AND $_GET['b']=="uno.pack")
		{
	
	        echo '<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>';
			echo '<script> $(document).ready(function () {
			var $totaMp3='.$nbrAUDIO.';
			var $YVtype=$("#plyr-youtube").attr("data-plyr-provider");
			var myplayer="player";

			 const playerYoutube = new Plyr("#plyr-youtube");

			 playerYoutube.on(\'ended\', (event) => {
				//const instance = event.detail.plyr;

 if(window.sessionStorage)
			  {
				   var finvidPOP=window.localStorage.getItem("finvidPOP");
				  
				  
				  
				  if(finvidPOP)
				  {
				  
				    finvidPOP=parseInt(finvidPOP)+1;
				  
				    window.localStorage.setItem("finvidPOP", finvidPOP);
					
					

				  }
				  else
				  {
				     window.localStorage.setItem("finvidPOP", 1);
				  }
				   
				  
				  if(!finvidPOP ||  finvidPOP<4)
					  {
						  alert("Lecture vidéo terminée... Consultez ci-dessous, les rubriques \"Vidéos - PDFs - Audios - Liens\" ");
					  } 
				  
			  }

				
				});

			

				  $totaMp3=parseInt($totaMp3);

				  for(i=1; i<=$totaMp3; i++)
					  {
						 
						   const player = new Plyr(\'#plyr-audio-\'+i); 
					  }
						   
			
			//load vid
			$(".vupac").on({
			 
			  click:function()
				 {

					 $(".facopPlayer").load("source/js/page_php/player.php");	 

				 }

			 });
			 
			 // contenu html---------------
			 $(".ifinvide").on(
			  {
			 
				 click:function()
				 {
					
					
					window.localStorage.setItem("finvid", 4);
			        $(".finvid").addClass("hide");
				 }

			 });
			 
	
			   if(window.sessionStorage)
			  {
				   var finvid=window.localStorage.getItem("finvid");
				  
				  
				  
				  if(finvid)
				  {
				  
				    finvid=parseInt(finvid)+1;
				  
				    window.localStorage.setItem("finvid", finvid);
					
					

				  }
				  else
				  {
				     window.localStorage.setItem("finvid", 1);
				  }
				   
				  
				  if(!finvid ||  finvid<4)
					  {
						  $(".finvid").removeClass("hide");
					  } 
				  
			  }
			  //contenu html----------
			  
		// load vide-------------
			 $(".myVid").on(
			  {
			 
				 click:function()
				 {
				            $("html, body").animate({ scrollTop: 0 }, "slow");
					
			        var $vi=$(this).attr("data-read");
					var $thelec=$(this).attr("data-thelec");
					
					$(".thelec").text($thelec);
					
						playerYoutube.source = {
					  type: \'video\',
					  sources: [
						{
						  src: $vi,
						  provider: $YVtype,
						},
					  ],
					};
				
				playerYoutube.on(\'ready\', (event) => {
				    playerYoutube.play();
					
				});
				 }

			 });
			 
			 // termine vide---------------
			 $(".okcour").on(
			  {
			 
				 click:function()
				 {
					var $ok=$(this);
			        var $vi=$(this).attr("data-cou");
					var $pa=$(this).attr("data-pa");
					
					
							$.ajax({
					   data:"cou="+$vi+"&pa="+$pa,

						url:	"source/js/page_php/termi.php",

					timeout:	30000,
					success:	function (data) {

											if(data==false)
												{
													alert("Veuillez vous connecter et acheter cette formation");
												}

											else
												{
												    $ok.html("Thème déja terminé");
													$ok.removeClass("elvid");
													$ok.addClass("tercour");
												  
												  
												}
										},
					  error:	function() {


										}
						});
				 }

			 });
			 
			 
			 
		 document.addEventListener("click", function(e){
  const target = e.target.closest("#player"); // Or any other selector.

  if(target){
    // Do something with `target`.
	
	alert(88);
  }
  
	});
	
	//setInterval(myTimer, 1000);

function myTimer() {
 

}
 
 $(document).on("click", "#plyr-youtube", function(){
 
  
 const lastLang = document.querySelector("#plyr-youtube div");
lastLang.remove();

 
 alert(88);
});


			 });</script>';
	 
	
        }
		elseif(!empty($_GET['b']) AND $_GET['b']=="uno.packs")
		{
	
	        echo '<script src="https://cdn.plyr.io/2.0.15/plyr.js"></script>';
			echo '<script> $(document).ready(function () {
			var $totaMp3='.$nbrAUDIO.';

			plyr.setup("#plyr-video");

				  $totaMp3=parseInt($totaMp3);

				  for(i=1; i<=$totaMp3; i++)
					  {
						 plyr.setup(\'#plyr-audio-\'+i);  
					  }
			
			//load vid
			$(".vupac").on({
			 
			  click:function()
				 {

					 $(".facopPlayer").load("source/js/page_php/player.php");	 

				 }

			 });
			 
			 // contenu html---------------
			 $(".ifinvide").on(
			  {
			 
				 click:function()
				 {
					
					
					window.localStorage.setItem("finvid", 4);
			        $(".finvid").addClass("hide");
				 }

			 });
			 
	
			   if(window.sessionStorage)
			  {
				   var finvid=window.localStorage.getItem("finvid");
				  
				  
				  
				  if(finvid)
				  {
				  
				    finvid=parseInt(finvid)+1;
				  
				    window.localStorage.setItem("finvid", finvid);
					
					

				  }
				  else
				  {
				     window.localStorage.setItem("finvid", 1);
				  }
				   
				  
				  if(!finvid ||  finvid<4)
					  {
						  $(".finvid").removeClass("hide");
					  } 
				  
			  }
			  //contenu html----------
			  
		// load vide-------------
			 $(".myVid").on(
			  {
			 
				 click:function()
				 {
				            $("html, body").animate({ scrollTop: 0 }, "slow");
					
			        var $vi=$(this).attr("data-read");
					var $thelec=$(this).attr("data-thelec");
					
					$(".thelec").text($thelec);
					
							$.ajax({
					   data:"yv="+$vi,

						url:	"source/js/page_php/player.php",

					timeout:	30000,
					success:	function (data) {

											if(data==false)
												{
													alert("Veuillez vous connecter et acheter cette formation");
												}

											else
												{
												   $(".facopPlayer").html(data);
												}
										},
					  error:	function() {


										}
						});
				 }

			 });
			 
			 // termine vide---------------
			 $(".okcour").on(
			  {
			 
				 click:function()
				 {
					var $ok=$(this);
			        var $vi=$(this).attr("data-cou");
					var $pa=$(this).attr("data-pa");
					
					
							$.ajax({
					   data:"cou="+$vi+"&pa="+$pa,

						url:	"source/js/page_php/termi.php",

					timeout:	30000,
					success:	function (data) {

											if(data==false)
												{
													alert("Veuillez vous connecter et acheter cette formation");
												}

											else
												{
												    $ok.html("Thème déja terminé");
													$ok.removeClass("elvid");
													$ok.addClass("tercour");
												  
												  
												}
										},
					  error:	function() {


										}
						});
				 }

			 });
			 
			 
			 
		 document.addEventListener("click", function(e){
  const target = e.target.closest("#player"); // Or any other selector.

  if(target){
    // Do something with `target`.
	
	alert(88);
  }
  
	});
	
	//setInterval(myTimer, 1000);

function myTimer() {
 

}
 
 $(document).on("click", "#plyr-youtube", function(){
 
  
 const lastLang = document.querySelector("#plyr-youtube div");
lastLang.remove();

 
 alert(88);
});


			 });</script>';
	 
	
        }
elseif(!empty($_GET['b']) AND $_GET['b']=='uno.cart')
		{
			echo '<script src="https://checkout.flutterwave.com/v3.js"></script>';
		}

?>
 <script type="text/javascript">
 
          $(document).ready(function () {
 	 
	
	 /*======================================QCM ============================================================*/
	 
	 <?php
	 
	 $tore="";
		if(!empty($_GET['b']) AND $_GET['b']=="uno.qcm")
			{	
					//recherche du themes
				 $nbr_pseudoTH=$tams->prepare("SELECT * FROM pack
				 WHERE codeName=:pse AND actif=1  " ) ;
				 $nbr_pseudoTH->execute(array('pse'=>htmlspecialchars($_GET['f'])));
				 $doneU=$nbr_pseudoTH->fetch();
				 $packname=$doneU['id_pk'];
			
			echo'
			var pid="'.$doneU['id_pk'].'";
			var pconum="'.$doneU['codeNbr'].'";
			var pconam="'.$doneU['codeName'].'";
			var pnam="'.$doneU['titre'].'";
			';

				 $bloc=$tams->query(" SELECT * FROM quiz WHERE idpack_q='$packname' ");

				  while($done=$bloc->fetch())
					{

					   $tore.='{ 
							question: "'.$done['question_q'].'",
							answer: ["'.$done['reponse1_q'].'","'.$done['reponse2_q'].'","'.$done['reponse3_q'].'","'.$done['reponse4_q'].'"],
							correctAnswer:"'.$done['reponse_q'].'"
							},';
					}
			
	
	 
	 
		echo 'STORE = [ '.$tore.']';
			
	 ?>
	 //sets initial values to zero for the question number and score -->
$(".qcmHide").hide();
	 
	 let qNumber = 0;
	 let score = 0;
	 let storeLen=STORE.length;
	 
	 

//event listener for start quiz button. Hides the start page and calls the function generateQuizQuestion -->
function startQuiz() {
    $("main").on("click", "#button-start", function(event){
        $(".start-quiz").hide();
        generateQuizQuestion();
		$(".qcmHide").show();
		
    });
}

//begins displaying quiz questions from the STORE array until the very last question has been displayed, then calls the displayResults function-->
function generateQuizQuestion() {
    if (qNumber < STORE.length) {
    let question =$(`<form class ="js-quiz-form col_2_100">
    <legend class = "question mar_bot_30 h2">${qNumber+1}- ${STORE[qNumber].question}</legend>
    <ul class="radiogroup" role="radiogroup" aria-labelledby="question"></ul>`);
    let answers = STORE[qNumber].answer.map(function(answerValue, answerIndex){
        return `<label for="${answerValue}"><input type="radio" id="${answerValue}" name="answer" tabindex="${answerIndex}" value="${answerValue}" aria-checked="false" required>${answerValue}</label><br>`;
    });
    let button = $(`<button type="submit" id ="button-submit" class="bg_2">Suivant</button></form>`)
    $(".js-quiz").append(question);
    $(".radiogroup").append(answers, button);
    questionNumber();
} else {
    displayResults();
}

}

//event listener for the submit button. Then checks to see if an input is selected, and if the answer selected is correct -->
function questionChecker(){
    $("main").on("click","#button-submit", function (event){
        if ($("input:radio").is(":checked")) {
        event.preventDefault();
        let selectedAnswer= $("input[name=answer]:checked").val();
        console.log(selectedAnswer);
			if (selectedAnswer === STORE[qNumber].correctAnswer) 
			{
				//rightAnswer();
			
				scoreKeeper();
				
				$(".js-answer").empty();
				$(".js-quiz-form").empty();
				qNumber++;
				generateQuizQuestion();
				$("js-quiz-form").show();
			} 
			else 
			{
				//wrongAnswer();
				$(".js-answer").empty();
				$(".js-quiz-form").empty();
				qNumber++;
				generateQuizQuestion();
				$("js-quiz-form").show();
			}
        }else {
            alert("Sélectionez une réponse.")
        }
    });
}

//updates the question number and displays it at the top of the page-->
function questionNumber(){
    $("header").find("#question-number").text(qNumber+1);
	 $("header").find("#question-all").text(storeLen);
}

/* keeps score of correct answers and displays at the top of the page */
function scoreKeeper(){
    score++;
    $("header").find("#score").text(`${score}/${storeLen}`);

}

/* displays the page for when the answer is right, updates score accordingly */
function rightAnswer() {
  
}

/* displays page for when the answer is wrong and displays the correct answer */
function wrongAnswer() {
    
}

// event listener for the next question button, calls the generateQuizQuestion function to display the next question--"
function nextQuestion() {
    $("main").on("click","#button-next", function(event) {
        $(".js-answer").empty();
        $(".js-quiz-form").empty();
        qNumber++;
        generateQuizQuestion();
        $("js-quiz-form").show();
    });
}

/* displays the final percentage score and total number of correct answers */
function displayResults(){
    console.log("`displayResults` ran");
    let finalScore1 = (score/storeLen)*100;
	let finalScore = Math.floor(finalScore1 * 10) / 10;
	let downlo="";
	let ico='src = "source/img/quiz.png"';
	if(finalScore>=70)
		{
			downlo='';
		ico='src = "source/img/good.png"';
		  
			  if(pconam!="facop_a0")
				{
					$('.icifo').show();
					$('.icifo').load("source/js/user_js/certificat_build.1.0.php",{"idpak":pid, "codnumpak":pconum, "codnampak":pconam, "nampak":pnam, "note":finalScore});
				}
		}
	else
		{
			downlo='';
			ico='src = "source/img/sad.png"';
		}
	
    $(".js-answer").append(`<h2>Résultat</h2>
    <img id="paint-bucket" alt="red paint bucket" ${ico}/>
    <h3>${finalScore}%</h3>
    <p>Tu as <span class="right-answers">${score} </span> sur ${storeLen} questions .</p>
    <button type="button" id ="button-restart" class="bg_2">Recommencer</button> ${downlo}`)
	
	$(".qcmHide").hide();
}

function restartQuiz(){
    console.log("restart quiz ran");
 $("main").on("click", "#button-restart", function(event){
     console.log("restart button clicked");
    score = 0;
    qNumber = 0;
    $(".js-answer").empty();
    $(".js-quiz-form").empty();
    $(".start-quiz").show();
    $("header").find("#score").text(`${score}/${storeLen}`);
    $("header").find("#question-number").text(`${qNumber}`);
	 $('.icifo').html("");
 });
	
	
}

function handleQuizApp(){
    startQuiz();
    questionChecker();
    nextQuestion();
    restartQuiz();
}

//calls the handleQuizApp to activate functions with event listeners -->
$(handleQuizApp); 
		
	// });//fin documen redy
	
	
	/* document.addEventListener("keydown", function (event){

  if (event.ctrlKey){

     event.preventDefault();

  }

  if(event.keyCode == 123){

     event.preventDefault();

  }

 event => event.preventDefault() 
})*/
	 
	 <?php
	 }
	 ?>
	 /*==========================cart======================================================*/
<?php
 
if(!empty($_GET['b']) AND $_GET['b']=='uno.cart')
{
	

	
?>
$(".mycart").on({
			 
			 click:function()
			 {
				 $.ajax({
			   data:"ps=fa",
//	Adresse	à	laquelle	la	requête	est	envoyée
				url:	'source/js/user_js/pend_cart.php',
//	Le	délai	maximun	en	millisecondes	de	traitement	de	la	demande
			timeout:	30000,
	        success:	function (data) {
								
				if(data==false)
					{
						alert("Tu  dois être connecté");
					}
					
				else
					{
						const myArray = data.split(" TTT ");
						makePayment2(myArray[0], myArray[1], myArray[2], myArray[3], myArray[4] );
						//alert("data: "+myArray[0]+ myArray[1]+ myArray[2]+ myArray[3]+ myArray[4]);
						
						/*const mydata={"amount": 100,
									  "currency": "NGN",
									  "customer": {
										"name": "Rose DeWitt Bukater",
										"email": "rose@unsinkableship.com",
										"phone_number": "08102909304"
									  },
									  "flw_ref": "FLW-MOCK-597ae423f1470309edcb5879e3774bfa",
									  "status": "successful",
									  "tx_ref": "titanic-48981487343MDI0NzMx",
									  "transaction_id": 49507800
									};*/
 
						//save_cart(data);
					}
								},
		      error:	function() {
				  
                        
								}
				});
	 
	 
	         }
});
	
  function makePayment2($ke, $arti, $amo, $mail, $pseu) {
    FlutterwaveCheckout({
      public_key: $ke,
      tx_ref: $arti,
      amount: $amo,
      currency: "XAF",
      payment_options: "card, mobile money",
      meta: {
        source: "docs-inline-test",
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: $mail,
        phone_number: "",
        name: $pseu,
      },
      customizations: {
        title: "Facop Online",
        description: "Paiement",
        logo: "https://www.facop.training/source/img/logo/logo-180x180.png",
      },
      callback: function (data){
		  save_cart(data);
        console.log("payment callback:", data);
      },
      onclose: function() {
        console.log("Payment cancelled!");
      }
    });
  }
	
	function save_cart(data)
	{
		//alert(data.amount+"fcfa tra:"+data.transaction_id);
		
		$('.mypan').load("source/js/user_js/save_cart.php",{"custom": data.tx_ref, "status":data.status, "amo":data.amount, "tra":data.transaction_id});
		
		
	}
	
	
 <?php
	 }
  ?>

	 });

</script>

    <script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({pageLanguage: 'fr', includedLanguages: 'fr,en,es,pt', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
		}
     </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>