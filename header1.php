 <?php 
  ob_start();
  session_start();
  /* include("settings.php"); */
  include("admin/dist/dbinfo.php");
  include("admin/dist/config.php"); 
  error_reporting(0); 
 ?>

<!DOCTYPE html>
<html lang="en"> 
	  <head>
       <!-- <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 /* $tg="SELECT * FROM tbl_seo_tags WHERE webpage='insurance.php'";
		 $Etg=mysqli_query($conn,$tg);
		 $FEtg=mysqli_fetch_array($Etg); */ 
		?>
		<title><?php //echo $FEtg['title_tag']; ?></title>      
        <meta name="description" content="<?php //echo $FEtg['metta_content']; ?>">   
        <meta name="viewport" content="width=20px, initial-scale=1">
        <meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" /> -->

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
	  
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #d91522;
  color: white;
}
</style>
<style>
.cart_cart1 a {
 position: relative;
}

.cart_cart1 a:before {
  content: 20;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  text-align: center;
  color: #fff;
  font-family: "Poppins", sans-serif;
  font-size: 12px;
  position: absolute;
  font-weight: normal;
  right: 6px;
  bottom: 6px;
  background: #d91522;
  line-height: 20px;
}
.dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
</style>			                		
    
    <body class="home_sidebar" onload="getLocation();">              
        <div class="home_box">           
            <!--================Menu Area =================-->
            <header class="shop_header_area carousel_menu_area">
			<!--Start of Zendesk Chat Script-->
            <script type="text/javascript">
               window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
               d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
               _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
               $.src="https://v2.zopim.com/?57qAjM3eTGBS8eAGZg81RsbplTt19qrS";z.t=+new Date;$.
               type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
            </script>
            <!--End of Zendesk Chat Script-->
                <div class="carousel_top_header black_top_header row m0">                   				
					<div class="container">
                        <div class="carousel_top_h_inner">
                            <div class="float-md-left">
                              <div class="top_header_left">
								<div id="google_translate_element"></div>                                                                        
                              </div>
                            </div>
                            <div class="float-md-right">
							    <?php							
								  $wl="SELECT count(*) As 'count' FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." ORDER BY id ASC";
								  $Ewl=mysqli_query($conn,$wl);								
								  $FEwl=mysqli_fetch_array($Ewl);
								  /* $tot_wl=$FEwl['count']; */	

								  $sw="SELECT count(*) As 'count' FROM `tbl_service_wishlist` WHERE customer_id=".$_SESSION['customer_id']."";
								  $Esw=mysqli_query($conn,$sw);								 
								  $FEsw=mysqli_fetch_array($Esw);	  
								  
								  $sw1="SELECT count(*) As 'count' FROM `tbl_package_wish_list` WHERE customer_id=".$_SESSION['customer_id']."";
								  $Esw1=mysqli_query($conn,$sw1);								 
								  $FEsw1=mysqli_fetch_array($Esw1);
								?>
                                <ul class="account_list">
								      									  
                                  <li><a href="#"> <span id="demo"></span> <i class="fa fa-map-marker" aria-hidden="true"></i></a></li> 
                                  <!-- <p id="demo"></p> -->									  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var x = document.getElementById("demo");

var la= document.getElementById("lat");
var lo= document.getElementById("lon");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
        
  akey="c98c67233ac0bb";
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  jurl= "https://us1.locationiq.com/v1/reverse.php?key="+akey+"&lat="+lat+"&lon="+lon+"&format=json";
var settings = {
"async": true,
"crossDomain": true,
"url": jurl,
"method": "GET"
}

$.ajax(settings).done(function (response) {
var city=response["address"]["state_district"];
var display_name=response["display_name"];
//x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude + "<br> Location Name : " +city + " <br> Full Address : "+display_name;
x.innerHTML = "Location Name : " +city;
console.log(response);
console.log(city);
});
     
}
</script>																	
										
										<li class="nav-item dropdown submenu" hidden>
                                          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           Coimbatore <i class="fa fa-map-marker" aria-hidden="true"></i>
                                          </a>
                                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											  <?php
		                                       $k=0;
		                                        $tseg="select DISTINCT city  from  tbl_vendor where status='Active'";
		                                        $Etseg=mysqli_query($conn,$tseg);
		                                        while($FEtseg=mysqli_fetch_array($Etseg))
									             {									   									                									   
								               $k++;					   
		                                      ?>
										      <?php if($_REQUEST['cid']==22){?>
											   <li class="nav-item"><a class="nav-link" href="general.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  <?php }else if($_REQUEST['cid']==21){?>
											   <li class="nav-item"><a class="nav-link" href="complaints.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==10){?>
											   <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==16){?>
											   <li class="nav-item"><a class="nav-link" href="car_detailing.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==18){?>
											   <li class="nav-item"><a class="nav-link" href="special_package_offers.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>											  
											  <?php } 
											  }
											  ?>											  											  
                                          </ul>
                                        </li>                                       
								
									  <?php if($_REQUEST['city']){ ?>
                  	                    <li class="nav-item dropdown submenu">
                                          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <?php echo $_REQUEST['city']; ?> <i class="fa fa-map-marker" aria-hidden="true"></i>
                                          </a>
                                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											  <?php
		                                       $k=0;
		                                        $tseg="select DISTINCT city  from  tbl_vendor where status='Active'";
		                                        $Etseg=mysqli_query($conn,$tseg);
		                                        while($FEtseg=mysqli_fetch_array($Etseg))
									             {									   									                									   
								               $k++;					   
		                                      ?>
										      <?php if($_REQUEST['cid']==22){?>
											   <li class="nav-item"><a class="nav-link" href="general.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  <?php }else if($_REQUEST['cid']==21){?>
											   <li class="nav-item"><a class="nav-link" href="complaints.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==10){?>
											   <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==16){?>
											   <li class="nav-item"><a class="nav-link" href="car_detailing.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>
											  
											  <?php }else if($_REQUEST['cid']==18){?>
											   <li class="nav-item"><a class="nav-link" href="special_package_offers.php?cid=<?php echo $_REQUEST['cid']; ?>&cname=<?php echo $_REQUEST['cname']; ?>&city=<?php echo $FEtseg['city']; ?>"> <?php echo $FEtseg['city']; ?></a></li>											  
											  <?php } 
											  }
											  ?>											  											  
                                          </ul>
                                        </li> 
									  <?php } ?>							 
									 
									 <li><a href="sell.php">Sell Your Car</a></li>
								     <li><a href="vendor-signup.php">Vendor Sign-Up</a></li>
									<?php if(!$_SESSION['customer_id']) { ?>
								     <li><a href="signin.php">Sign-In</a></li>
									<?php } else { ?>
									 <li><a href="signout.php">Sign-Out</a></li>
									<?php } ?>									
                                     <li><a href="account-details.php">My Account</a> <b style="color:#D41100;"> <?php echo $_SESSION['customer_name']; ?> </b> </li>
                                     <li><a href="wish_list.php"><i class="fa fa-heart"></i>(
									<?php 
									 if($_SESSION['customer_id'] == '') {                                                                        
                                     $tot_wl=0;	
                                     } else  {                                                                                                            
                                     $tot_wl=$FEwl['count'] + $FEsw['count'] + $FEsw1['count'] ;
                                     }
                                     echo $tot_wl;
                                    ?> ) </a></li>									
                                    <li class="cart_cart1"> <a href="shopping-cart.php"><i class="fa fa-shopping-bag"></i></a></li>                                    
									<li hidden><a href="#">Checkout</a></li>
                                </ul>								
                            </div>
							
                        </div>
                    </div>
                </div>			 
			   
                <div class="carousel_menu_inner">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                   
                                    <li class="nav-item dropdown submenu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Cars <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>										
                                        <ul class="dropdown-menu">
										 <?php
                                          $i=0;		
		                                   $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_id ASC";
		                                   $Ect=mysqli_query($conn,$ct);         			 
		                                   while($FEct=mysqli_fetch_array($Ect)) 
										     {              
			                                 $cid=$FEct['category_id'];
                                             $cname=$FEct['category_name'];			 
                                          $i++;		 
		                                 ?>
										 <?php if($FEct['category_name']=='New Cars') { ?>
										    <li class="nav-item"><a class="nav-link" href="new-cars.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
										 <?php } ?>	
										 <?php if($FEct['category_name']=='Used Cars') {?>
											<li class="nav-item"><a class="nav-link" href="used-cars.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li> 
                                         <?php } ?>
										 <?php if($FEct['category_name']=='Electric Cars') { ?>
											<li class="nav-item"><a class="nav-link" href="electric-cars.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>                                                                                      
                                         <?php } 
										  }
										 ?>
										</ul>
                                    </li>
									<li class="nav-item dropdown submenu">
									  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bikes <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </a>
									  <ul class="dropdown-menu">
										 <?php
                                          $i=0;		
		                                   $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_id ASC";
		                                   $Ect=mysqli_query($conn,$ct);         			 
		                                   while($FEct=mysqli_fetch_array($Ect)) 
										     {              
			                                 $cid=$FEct['category_id'];
                                             $cname=$FEct['category_name'];			 
                                          $i++;		 
		                                 ?>
										 <?php if($FEct['category_name']=='New Bikes') { ?>
										    <li class="nav-item"><a class="nav-link" href="new-bikes.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
										 <?php } ?>	
										 <?php if($FEct['category_name']=='Used Bikes') {?>
											<li class="nav-item"><a class="nav-link" href="used-bikes.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li> 
                                         <?php } 
										    }
										 ?>																				 
										</ul>									
									</li>
									<li class="nav-item dropdown submenu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Service <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
										 <?php
                                          $i=0;		
		                                   $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_name DESC";
		                                   $Ect=mysqli_query($conn,$ct);         			 
		                                   while($FEct=mysqli_fetch_array($Ect)) 
										     {              
			                                 $cid=$FEct['category_id'];
                                             $cname=$FEct['category_name'];			 
                                          $i++;		
											$City='Coimbatore';										  
		                                 ?>
										 <?php if($FEct['category_name']=='General') { ?>
										    <li class="nav-item"><a class="nav-link" href="general.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>&city=<?php echo $City;?>"> <?php echo $FEct['category_name'];?></a></li>  
										 <?php }if($FEct['category_name']=='Complaints ') { ?>
										    <li class="nav-item"><a class="nav-link" href="complaints.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>&city=<?php echo $City;?>"> <?php echo $FEct['category_name'];?></a></li>                                                                                                                                    
										 <?php }if($FEct['category_name']=='Special Package Offers') {  ?>
                                            <li class="nav-item"><a class="nav-link" href="special-package-offers.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>&city=<?php echo $City;?>"> <?php echo $FEct['category_name'];?></a></li>                                                                                     
										  <?php }if($FEct['category_name']=='Car Wash') { ?>
										    <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>&city=<?php echo $City;?>"> <?php echo $FEct['category_name'];?></a></li>   
										  <?php }elseif($FEct['category_name']=='Car Detailing') { ?>
										    <li class="nav-item"><a class="nav-link" href="car_detailing.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>&city=<?php echo $City;?>"> <?php echo $FEct['category_name'];?></a></li>  
										<?php } 
										  }
										 ?>
										</ul>
                                    </li>
									<li class="nav-item dropdown submenu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Spares <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
										<?php
										 $i=0;		
		                                   $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_id ASC";
		                                   $Ect=mysqli_query($conn,$ct);         			 
		                                   while($FEct=mysqli_fetch_array($Ect)) 
										     {              
			                                 $cid=$FEct['category_id'];
                                             $cname=$FEct['category_name'];			 
                                          $i++;											
										?>
										<?php if($FEct['category_name']=='New Car Spares') { ?>
                                            <li class="nav-item"><a class="nav-link" href="car-spares.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>                                           
										<?php } ?>
									    <?php if($FEct['category_name']=='Used Car Spares'){ ?>
											<li class="nav-item"><a class="nav-link" href="extras.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
                                        <?php }  ?>
										<?php if($FEct['category_name']=='Accessories'){ ?>
											<li class="nav-item"><a class="nav-link" href="accessories.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
										<?php }
										}
										?>
										</ul>
                                    </li>
									<li class="nav-item dropdown submenu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Equipment <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
										 <?php
										 $i=0;		
		                                   $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_id ASC";
		                                   $Ect=mysqli_query($conn,$ct);         			 
		                                   while($FEct=mysqli_fetch_array($Ect)) 
										     {              
			                                 $cid=$FEct['category_id'];
                                             $cname=$FEct['category_name'];			 
                                          $i++;											
										 ?>
										 <?php if($FEct['category_name']=='Car Wash Equipments'){ ?>
                                            <li class="nav-item"><a class="nav-link" href="car-wash-equipments.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
                                         <?php } ?> 
										 <?php if($FEct['category_name']=='Detailing Equipments'){ ?>
										   <li class="nav-item"><a class="nav-link" href="car-detailing-equipments.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
							             <?php } ?> 
										 <?php if($FEct['category_name']=='Car Service Franchisee'){ ?>
										   <li class="nav-item"><a class="nav-link" href="car-service-franchisee.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"> <?php echo $FEct['category_name'];?></a></li>
										<?php  
										 }
										  }
										 ?>
										</ul>
                                    </li>                                                                      
                                    <li class="nav-item" hidden><a class="nav-link" href="contactus.php">Contact Us</a></li>
                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="selfdriving-add.php">SELF DRIVING</a>
                                    </div>	
								</ul>
                                <ul class="navbar-nav justify-content-end">
                             <!-- Trigger/Open The Modal -->
							     <li class="btn btn-primary checkout_btn"  onclick="showPosition();" id="myBtn" hidden>Location</i> 
                                 <!-- The Modal -->
                                 <div id="myModal" class="modal" style="float:left">
                                 <!-- Modal content -->
                                 <div class="modal-content">
                                 <div class="modal-header">
								 <h2>Enter Your Location</h2>
                                 <span class="close">&times;</span>
                                 </div>
                                 <div class="modal-body">
                                 <p>Some text in the Modal Body</p>
                                 <p>Some other text...</p>
                                 </div>
                                 </div>
                                 </div>
                                    <li class="cart_cart1"><a href="shopping-cart.php"><i class="icon-handbag icons"></i> 

									<span id="cartttl" name="cartttl" style="background-color:#fff;color:#d91522">
                                    <?php
                                     if(!isset($_SESSION['cart']))
                                      {
                                      $prd_ttl=0;	
                                      }
                                     else
                                      {
                                      $scart_ttl=$_SESSION['cart'];
                                      $prd_ttl=count($scart_ttl['Product']);
                                      }
                                     echo $prd_ttl;
                                    ?> 									
									</span>
									</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!--================End Menu Area =================-->
<script type="text/javascript">
 function googleTranslateElementInit() {
 new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,includedLanguages: 'hi,kn,ml,ta,te,en'}, 'google_translate_element');
   }
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    // Set up global variable
    var result;
    
    function showPosition() {
        // Store the element where the page displays the result
        result = document.getElementById("result");
        
        // If geolocation is available, try to get the visitor's position
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            result.innerHTML = "Getting the position information...";
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    };
    
    // Define callback function for successful attempt
    function successCallback(position) {
        result.innerHTML = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
    }
    
    // Define callback function for failed attempt
    function errorCallback(error) {
        if(error.code == 1) {
            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
        } else if(error.code == 2) {
            result.innerHTML = "The network is down or the positioning service can't be reached.";
        } else if(error.code == 3) {
            result.innerHTML = "The attempt timed out before it could get the location data.";
        } else {
            result.innerHTML = "Geolocation failed due to unknown error.";
        }
    }
</script>