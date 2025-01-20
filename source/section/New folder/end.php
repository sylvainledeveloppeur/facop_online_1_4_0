    <!-- End of head section HTML codes -->
<script type="text/javascript" src="source/js/foot_js/default.js"></script>
<script type="text/javascript" src="source/js/store_js/store.js"></script>
<script type="text/javascript" src="source/js/user_js/user.js"></script>
<script type="text/javascript" src="source/js/script_js/all.js"></script>
<script type="text/javascript" src="source/js/countMe.min.js"></script>
<script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

<script type="text/javascript" src="source/js/foot_js/query.js"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
		 
         $("#counter_1").countMe(1,65);
		 $("#counter_2").countMe(10,150);
		 $("#counter_3").countMe(50,65);
		 $("#counter_4").countMe(40,10);
		 /************************dtacameroun.com**********/  
        $(".ulser_sci li").on({
			 
			 mouseover:function()
			 {
				
				 $(".shoser_sci img").attr("src",$(this).attr("data-prev"));
			 }
		 });
         /*show sou menu1 phone*/
  $(".ulmenuPho li").on({
			 
			 click:function()
			 {
				 $(this).children("ul").slideDown();
			 }
		 });  
//project show
		  $(".stt").on({
			 
			 click:function()
			 {
				 
				 $(".proee,.prodd,.propp").slideUp();
				$(".prott").slideDown();
			 }
		 });
		  $(".see").on({
			 
			 click:function()
			 {
				 
				 $(".prott,.prodd,.propp").slideUp();
				$(".proee").slideDown();
			 }
		 });
		  $(".sdd").on({
			 
			 click:function()
			 {
				 
				 $(".proee,.prott,.propp").slideUp();
				$(".prodd").slideDown();
			 }
		 });
		  $(".spp").on({
			 
			 click:function()
			 {
				 
				 $(".prott,.prodd,.proee").slideUp();
				$(".propp").slideDown();
			 }
		 });
		 
		  $(".barnav").on({
			 
			 click:function()
			 {
				 
				 $(this).slideUp();
				$(this).next().removeClass("Q_dis_non_320").addClass("Q_dis_blo_320");
			 }
		 });
		 
		 
		 	 $(".minboo img").on({
			 
			 mouseover:function()
			 {
				
				 $(".imgboo img").attr("src",$(this).attr("src"));
			 }
		 });
		 
		 	  $(".bcat").on({
			 
			 click:function()
			 {
				 
				
				$(".ulcate").slideToggle();
			 }
		 });
		 
		 	  $(".faqq").on({
			 
			 click:function()
			 {
				 
				$(".faqa").slideUp();
				$(this).next().slideDown();
			 }
		 });
		
/***************active menu*********/
         var tid=$(".hoov").text();
         $('a.'+tid).attr("id","hoov");
         
 /***************active nbr pag product*********/
        var tid=$("#noob").text();
         $('li.'+tid).attr("id","noob2");
		 

 
	 });//fin documen redy
</script>
 
</body>
</html>