<div id="pg_servuni">

	<!--bac top-->
	  <div class="bacdos">
		<div class="fenetre">
		  <h1 class="h1dos">Services/<?php 
if(!empty($_GET['type']))
	   {
	echo $_GET['type'];
}  ?></h1>
		  </div>
      </div>
	<!--site map-->
<?php 
if(!empty($_GET['sheet']) AND $_GET['sheet']!='hi' OR empty($_GET['sheet']))
	   {
	require_once("source/section/sitemap.php");
}
  ?>
	
	
	<!--us-->
  <div class="bg_us">
	<div class="fenetre">
	   <ul class="in_pro after">
		   
		<?php 
if(!empty($_GET['type']) AND $_GET['type']=="power")
	   {
	 ?> 
 <h1 class="bgti">Services/<?php echo mot($index,20);//Power & Renewable Energy ?></h1>
		   
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li> 
		   <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp2.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp3.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp4.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp5.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp6.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp7.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp8.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp9.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp10.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp11.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp12.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp13.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp14.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp15.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		  <li class="propp wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/pp16.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,20);//Power & Renewable Energy ?></div>
		  </li>
		   <!--other-->
		   <br>
            <br>

		   <div class="bot"></div>
		   <h2 class="h1dos"><?php echo mot($index,45);//Others services ?></h2>
<ul class="otherserv after">
  
  <li class="spp"><a href="index.php?sheet=service_uni&model=dos&type=Telecommunication"><?php echo mot($index,18);//Telecommunication ?></a></li>
  
  <li class="see"><a href="index.php?sheet=service_uni&model=dos&type=engineering"><?php echo mot($index,22);//Engineering Services ?></a></li>
  
  <li class="sdd"><a href="index.php?sheet=service_uni&model=dos&type=design"><?php echo mot($index,24);//Design & Solution ?></a></li>
		   </ul>
		   
		   <?php
       } 
	elseif(!empty($_GET['type']) AND $_GET['type']=="Telecommunication")
	{
		   ?> 
 <h1 class="bgti">Services/<?php echo mot($index,18);//Telecommunication ?></h1>
		   
		    <li class="prott wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/tt2.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,18);//Telecommunication ?></div>
		  </li>
		    <li class="prott wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/tt3.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,18);//Telecommunication ?></div>
		  </li>
		    <li class="prott wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/tt.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,18);//Telecommunication ?></div>
		  </li>
		   <!--other-->
		   <br>
            <br>

		   <div class="bot"></div>
		   <h2 class="h1dos"><?php echo mot($index,45);//Others services ?></h2>
<ul class="otherserv after">
  
  <li class="spp"><a href="index.php?sheet=service_uni&model=dos&type=power"><?php echo mot($index,20);//Power & Renewable Energy ?></a></li>
  
  <li class="see"><a href="index.php?sheet=service_uni&model=dos&type=engineering"><?php echo mot($index,22);//Engineering Services ?></a></li>
  
  <li class="sdd"><a href="index.php?sheet=service_uni&model=dos&type=design"><?php echo mot($index,24);//Design & Solution ?></a></li>
		   </ul>
		    <?php
       } 
	elseif(!empty($_GET['type']) AND $_GET['type']=="engineering")
	{
		   ?> 
		  
 <h1 class="bgti">Services/<?php echo mot($index,22);//Engineering Services ?></h1>
		   
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee2.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee3.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee4.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee5.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		  <li class="proee wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/ee6.jpg"  alt=""/> </div>
	      <div class="ove"><?php echo mot($index,22);//Engineering Services ?></div>
		  </li>
		   
		   <!--other-->
		   <br>
            <br>

		   <div class="bot"></div>
		   <h2 class="h1dos"><?php echo mot($index,45);//Others services ?></h2>
<ul class="otherserv after">
  
  <li class="spp"><a href="index.php?sheet=service_uni&model=dos&type=power"><?php echo mot($index,20);//Power & Renewable Energy ?></a></li>
  
  <li class="see"><a href="index.php?sheet=service_uni&model=dos&type=Telecommunication"><?php echo mot($index,18);//Telecommunication ?></a></li>
  
  <li class="sdd"><a href="index.php?sheet=service_uni&model=dos&type=design"><?php echo mot($index,24);//Design & Solution ?></a></li>
		   </ul>
	   <?php
       } 
	elseif(!empty($_GET['type']) AND $_GET['type']=="design")
	{
		   ?>
		   
 <h1 class="bgti">Services/<?php echo mot($index,24);//Design & Solution ?></h1>
		   
		  <li class="prodd wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/dd.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,24);//Design & Solution ?></div>
		  </li>
		  <li class="prodd wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/dd2.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,24);//Design & Solution ?></div>
		  </li>
		  <li class="prodd wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/dd3.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,24);//Design & Solution ?></div>
		  </li>
		  <li class="prodd wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/dd4.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,24);//Design & Solution ?></div>
		  </li>
		  <li class="prodd wow fadeInUp"><div class="wid_90 mar_auto after">
	      <img src="source/img/service/dd5.jpg"  alt=""/> </div>
		    <div class="ove"><?php echo mot($index,24);//Design & Solution ?></div>
		  </li>
		   
		   <!--other-->
		   <br>
            <br>

		   <div class="bot"></div>
		   <h2 class="h1dos"><?php echo mot($index,45);//Others services ?></h2>
<ul class="otherserv after">
  
  <li class="spp"><a href="index.php?sheet=service_uni&model=dos&type=power"><?php echo mot($index,20);//Power & Renewable Energy ?></a></li>
  
  <li class="see"><a href="index.php?sheet=service_uni&model=dos&type=Telecommunication"><?php echo mot($index,18);//Telecommunication ?></a></li>
  
  <li class="sdd"><a href="index.php?sheet=service_uni&model=dos&type=engineering"><?php echo mot($index,22);//Engineering Services ?></a></li>
		   </ul>
		    <?php
       } 
		   ?>
</ul>
    </div>
  </div>
	
 
  <ul class="countt after blanc">
	<li class="after wow pulse">
      <div class="wid_90 mar_auto after">
        <div class="ico"><i class="fa fa-ioxhost" aria-hidden="true"></i></div>
        <div class="iconbr"><strong>04</strong><p><?php echo mot($index,10);//Offices ?></p></div>
      </div>
    </li>
	<li class="after wow pulse">
      <div class="wid_90 mar_auto after">
        <div class="ico"><i class="fa fa-star" aria-hidden="true"></i></div>
        <div class="iconbr"><strong>75%</strong><p><?php echo mot($index,11);//Staff are Engineers ?></p></div>
      </div>
    </li>
	<li class="after wow pulse">
      <div class="wid_90 mar_auto after">
        <div class="ico"><i class="fa fa-globe" aria-hidden="true"></i></div>
        <div class="iconbr"><strong>02</strong><p><?php echo mot($index,12);//Countries present ?></p></div>
      </div>
    </li>
	<li class="after wow pulse">
      <div class="wid_90 mar_auto after">
        <div class="ico"><i class="fa fa-users" aria-hidden="true"></i></div>
        <div class="iconbr"><strong>125</strong><p><?php echo mot($index,13);//Employees ?></p></div>
      </div>
    </li>
	</ul>
	
	
	
</div>
