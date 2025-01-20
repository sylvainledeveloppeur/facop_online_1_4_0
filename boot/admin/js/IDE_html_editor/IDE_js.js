// JavaScript Document

 /*-------------------------submit form------------------------------*/
$('.corp').on(
			 'submit','#fomes',
			 function(){
				
						 if(!document.getElementById("fomes").switchMode.checked){

							
							 $("#mes").val($("#textBox").html());
						  }
						 else
						 {
							   alert("Uncheck \"Show HTML\".");
						 }
				  }
				 
				 ); 
/*-------------------------on change h1 color font------------------------------*/
		 	 $('.corp').on(
			 'change','.IDE_h2',
			 function(){
				
				
				 if (!document.getElementById("fomes").switchMode.checked) {
					       sCmd=$(this).attr('data-com');
						 sValue=$(this).val();
					 
					 document.execCommand(sCmd, false, sValue); 
					 getElementById("textBox").focus(); 
				
					 }
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				
				  }
				 
				 );
/*-------------------------on click u B I S------------------------------*/
		 ///*	 
		 $('.corp').on(
			 'click','.IDE_h1',
			 function(){
				
				 if (!document.getElementById("fomes").switchMode.checked) {
					       sCmd=$(this).attr('data-com');
					 
					 document.execCommand(sCmd, false); 
					 getElementById("textBox").focus(); 
				
					 }
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				
				  }
				 
				 );
				 //*/
/*-------------------------on click link------------------------------*/
		 ///*	 
		 $('.corp').on(
			 'click','.IDE_h3',
			 function(){
				
				
				 
				 if (!document.getElementById("fomes").switchMode.checked) {
					    
					  var sLnk=prompt('Write the URL here','http:\/\/');
						 if(sLnk&&sLnk!=''&&sLnk!='http://')
						 {

							 document.execCommand('createlink', false,sLnk); 
							 getElementById("textBox").focus(); 
						}
					 }
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				
				  }
				 
				 );
				 //*/
/*-------------------------on change h1 color font------------------------------*/
		 	 $('.corp').on(
			 'click','.IDE_h4',
			 function(){
				
				 if (!document.getElementById("fomes").switchMode.checked) {
					       sCmd=$(this).attr('data-com');
						 sValue=$(this).attr('data-val');
					 
					 document.execCommand(sCmd, false, sValue); 
					 getElementById("textBox").focus(); 
				
					 }
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				
				  }
				 
				 );
/*-------------------------on print------------------------------*/
		 	 $('.corp').on(
			 'click','.IDE_print',
			 function(){
				
				 if (!document.getElementById("fomes").switchMode.checked) {
					     
					 var oPrntWin = window.open("","_blank","width=650,height=670,left=500,top=200,menubar=yes,toolbar=no,location=no,scrollbars=yes");
						  oPrntWin.document.open();
						  oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + $("#textBox").html() + "<\/body><\/html>");
						  oPrntWin.document.close();
					 }
					 
				
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				
				  }
				 
				 );
					
/*-------------------------on clean------------------------------*/
		 	 $('.corp').on(
			 'click','.IDE_clean',
			 function(){
				
				 if (!document.getElementById("fomes").switchMode.checked&&confirm('Are you sure?')) {
					 
					 $("#textBox").html('Write here...');
				  }
				 else{
                       alert("Uncheck \"Show HTML\".");
			     	 }
				  }
				 
			 );
/*-------------------------on change set mode html txt------------------------------*/
		 	//* 
			$('.corp').on(
			 'change','#switchBox',
			 function(){
				 
				
				 bToSource=document.getElementById("switchBox").checked;
				
				 oDoc = document.getElementById("textBox");
                 sDefTxt = oDoc.innerHTML;
				 
				  var oContent;
						  if (bToSource) {
							oContent = document.createTextNode(oDoc.innerHTML);
							oDoc.innerHTML = "";
							var oPre = document.createElement("pre");
							oDoc.contentEditable = false;
							oPre.id = "sourceText";
							oPre.contentEditable = true;
							oPre.appendChild(oContent);
							oDoc.appendChild(oPre);
						  } else {
							if (document.all) {
							  oDoc.innerHTML = oDoc.innerText;
							} else {
							  oContent = document.createRange();
							  oContent.selectNodeContents(oDoc.firstChild);
							  oDoc.innerHTML = oContent.toString();
							}
							oDoc.contentEditable = true;
						  }
						  oDoc.focus();
			 }
				 
				 );
				 //*/


