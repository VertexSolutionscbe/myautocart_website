        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->
		
	  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='car-service-franchisee.php'";
		 $Etg=mysqli_query($conn,$tg);
		 $FEtg=mysqli_fetch_array($Etg); 
		?>
		<title><?php echo $FEtg['title_tag']; ?></title>      
        <meta name="description" content="<?php echo $FEtg['metta_content']; ?>">   
        <meta name="viewport" content="width=20px, initial-scale=1">
        <meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" /> 

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
		<!-- <link rel="icon" href="admin/dist/img/favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->       

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/vertical-slider/css/jQuery.verticalCarousel.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
		<link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/> 
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <!--- Heade Area End --->   
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
              gtag('config', 'UA-159623414-1');			  		  
			  function myFunction() {
              location.replace("contactus.php")  
              }
            </script>	   	
						
        <!--================Categories Banner Area =================-->
        <section class="carservice_franchisee_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3 align="right">Car Service franchisee</h3>
                    <ul align="right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="#">Car Service franchisee</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
		
		 <!--================Content Product Area =================-->
		 
<style>
.main {
	background: url(img/banner/car_franchisee.jpg) no-repeat center;
	position: relative;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0; 
} 
.strp {
	color: white;
	width: 500px;
	margin: 50px auto;
	padding: 20px;
} 
.bad {
	background: #1f2f79;
	opacity: 0.4;
	margin-top: 0px;
	margin-left: -335px;
    margin-right: 0px; 	
}
.bad li.list {
  margin-left:23px;
}
.good {
	position: relative;
	background: rgba(31,47,121,0.45);
	/* background: #1f2f79; */
	margin-left: -335px;
}
.good li.list {
  margin-left:23px;
}
</style>
		 
<div class="main">
  <div class="strp">
	<div class="bad">
	   <div>&nbsp;</div>
	    <h5 style="margin-left:13px;">We provide Franchisee for below sectors based on the investment capability.</h5>
		  <div>&nbsp;</div>
		  <h3 style="margin-left:13px;">Car Wash Franchisee : </h3>							
		  <li class="list"><b> Investment: Rs. 3,00,000 to Rs. 5,00,000 </b></li>
          <li class="list"><b> Franchisee Fee: Nil </b></li>
          <li class="list"> All Equipment will be supplied and installed and maintained. </li>
          <li class="list"> Training and staffs will be provided. </li>
          <li class="list"> Promotion support will be done in Website, Mobile app and other digital media Management Software will be provided free of cost.</li>		
	    <div>&nbsp;</div>
	</div>
	<div>&nbsp;</div>
	<div class="good">
	   <div>&nbsp;</div>
		 <h3 style="margin-left:13px;">Multi Brand Car Detailing Franchisee : </h3>			
		 <li class="list"><b> Investment: Rs. 10,00,000 to Rs. 30,00,000 </b></li>
		 <li class="list"><b> Franchisee Fee: Nil </b></li>
         <li class="list"> All Equipment will be supplied and installed and maintained.</li>
         <li class="list"> Training and staffs will be provided. </li>
         <li class="list"> Promotion support will be done in Website, Mobile app and other digital media Management Software will be provided free of cost. </li>
	    <button type="submit" style="align:center" class="btn btn-primary checkout_btn" onclick="myFunction();">Enquiry</button>								

	</div>
 </div>
</div>
				<div class="quantity" hidden>
                    <div class="custom">                              								  
                    <button type="submit" align="center" class="btn btn-primary checkout_btn" onclick="myFunction();">Enquiry</button>								
					</div>						 																																																
                    </div>	
         <!--================End Content Product Area =================-->        

        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      