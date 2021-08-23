        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->

		<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>Vendor Packages | myautocart</title>        
         <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">  
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
            </script>
	    
		
<style>
.pricingtablecontainer {
  display: flex;
  flex-wrap: nowrap;
  overflow: auto;
  margin: 50px -10px;
  padding: 30px 0;
}

.pricingtable {
  padding: 0 10px;
  max-width: 25%;
  min-width: 250px;
  flex: 1 0 100%;
}
.pricingtable .js-yearlypricing {
  display: none;
}
.pricingtable ul {
  border: 1px solid #DBDBDB;
  border-radius: 5px;
  position: relative;
  padding: 10px;
}
.pricingtable li {
  display: flex;
  border-bottom: 1px solid #DBDBDB;
  padding: 10px;
  align-items: center;
  justify-content: center;
}
.pricingtable li.disable {
  opacity: 0.5;
  text-decoration: line-through;
}
.pricingtable__head {
  border: none !important;
  text-transform: uppercase;
  font-weight: bold;
}
.pricingtable__highlight {
  background: green;
  border-radius: 6px;
  color: white;
  padding: 15px !important;
  font-weight: bold;
}
.pricingtable__popular {
  background: #9A77CF;
  border: none !important;
  border-radius: 5px 5px 0 0;
  color: white;
  padding: 5px !important;
  position: absolute;
  top: -25px;
  left: 0;
  width: 100%;
  text-transform: uppercase;
}
.pricingtable__btn {
  border: none !important;
}
.pricingtable .popular {
  box-shadow: 0 0px 10px 5px rgba(0, 0, 0, 0.1);
}
.pricingtable .popular .pricingtable__highlight {
  background: #9A77CF;
}
.pricingtable .silver .pricingtable__highlight {
  background: #98BE00;
}
.pricingtable .gold .pricingtable__highlight {
  background: #FFD400;
}
.pricingtable .diamond .pricingtable__highlight {
  background: #EC4176;
}

.slideToggle {
  display: flex;
  justify-content: center;
  margin: 50px 0;
}
.slideToggle i {
  margin: 0 15px;
}

.form-switch {
  align-items: center;
  display: flex;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
  justify-content: space-between;
  margin-bottom: 20px;
}

.form-switch i {
  position: relative;
  display: inline-block;
  width: 100px;
  height: 30px;
  border: 1px solid #DFDFDF;
  border-radius: 15px;
  transition: all 0.3s linear;
}

.form-switch i::after {
  content: "";
  position: absolute;
  left: 0;
  width: 40px;
  height: 22px;
  background-color: #9e9e9e;
  border-radius: 15px;
  transform: translate3d(4px, 3px, 0);
  transition: all 0.2s ease-in-out;
}

.form-switch input {
  display: none;
}

.form-switch input:checked + i::after {
  transform: translate3d(54px, 3px, 0);
}
</style>
	
		<!--================Categories Banner Area =================-->      
		<section class="terms_conditions_banner_area" hidden>
            <div class="container">
                <div class="c_banner_inner">
                    <h3 hidden>Terms & Conditions</h3>
                    <ul hidden>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contactus.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->         
		
    		
<!--================Vendor Type Area =================-->
<div class="container">

<div class="slideToggle" hidden>
 <label class="form-switch">
  <span class="beforeinput text-success">MONTHLY</span>
   <input type="checkbox" id="js-contcheckbox"><i></i>
  <span class="afterinput">YEARLY</span>
 </label>
</div>

    <div class="contact_title">
	 <?php 
	 $ud="SELECT * FROM `user_create` WHERE id='".$_REQUEST['ucid']."'";
	 $Eud=mysqli_query($conn,$ud);
	 $FEud=mysqli_fetch_array($Eud);
	 ?>
      <h1 hidden>Vendor Plans & Pricing</h1>
      <div>&nbsp;</div>
	  <h5 align="left">Vendor Name : <b style="color:red;"><?php echo $FEud['user_name']; ?></b></h5>
    </div>

<div class="pricingtablecontainer">
<?php
$vy="SELECT * FROM `tbl_vendor_types` Order by id DESC";
$Evy=mysqli_query($conn,$vy);
while($FEvy=mysqli_fetch_array($Evy)){
	
 $_SESSION['vendortype_id'] = $FEvy['id'];
	
?>
<div class="pricingtable">
<?php if($FEvy['id']=='4'){ ?>
<ul class="silver"> 
<?php } elseif($FEvy['id']=='3') { ?>
<ul class="gold">
<?php } elseif($FEvy['id']=='2'){ ?>
<ul class="diamond">
<?php } else { ?>
<ul class="popular">
<li class="pricingtable__popular">Popular</li>
<?php } ?>
<li class="pricingtable__head"><?php echo $FEvy['vendor_type']; ?></li>
<?php if($FEvy['id']=='3') { ?>
<li class="pricingtable__highlight js-montlypricing"><?php echo $FEvy['transaction_charges']; ?> % Charge Per Service</li>
<?php } elseif($FEvy['id']=='2') { ?>
<li class="pricingtable__highlight js-montlypricing"><?php echo $FEvy['transaction_charges']; ?> % Charge Per Service</li>
<?php } elseif($FEvy['id']=='1') {  ?>
<li class="pricingtable__highlight js-montlypricing"><?php echo $FEvy['transaction_charges']; ?> % Charge Per Service</li>
<?php } else {  ?>
<li class="pricingtable__highlight js-montlypricing"><?php echo $FEvy['transaction_charges']; ?></li>
<?php } ?>
<li class="pricingtable__highlight js-yearlypricing">$09 / Yearly</li>
<li><?php echo $FEvy['support']; ?></li>
<li><?php echo $FEvy['support1'];; ?></li>
<li><?php echo $FEvy['support2'];; ?></li>
<li><?php echo $FEvy['support2'];; ?></li>
<li><?php echo $FEvy['modes_marketing']; ?></li>
<li><?php echo $FEvy['modes_marketing1']; ?></li>
<li><?php echo $FEvy['modes_marketing2']; ?></li>
<li><?php echo $FEvy['modes_marketing3']; ?></li>
<li><?php echo $FEvy['modes_marketing4']; ?></li>
<li><?php echo $FEvy['modes_marketing5']; ?></li>
<li class="disable" hidden>Example</li>
<li class="pricingtable__btn">
<!-- <a href="admin/dist/login.php?vtid=<?php //echo $FEvy['id']; ?>&&vrid=<?php //echo $_REQUEST['ucid']; ?>"><button class="btn btn-dark">Get Started</button></a> -->
<a href="admin/dist/login.php?vtid=<?php echo $FEvy['id']; ?>&&vrid=<?php echo $_REQUEST['ucid']; ?>"><button class="btn btn-dark">Sign up</button></a>
</li>
</ul>
</div>
<?php } ?>
</div>
</div>
<!--================End Vendor Type Area =================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script id="rendered-js">
$("#js-contcheckbox").change(function () {
  if (this.checked) {
    $('.js-montlypricing').css('display', 'none');
    $('.js-yearlypricing').css('display', 'flex');
    $('.afterinput').addClass('text-success');
    $('.beforeinput').removeClass('text-success');
  } else {
    $('.js-montlypricing').css('display', 'flex');
    $('.js-yearlypricing').css('display', 'none');
    $('.afterinput').removeClass('text-success');
    $('.beforeinput').addClass('text-success');
  }
});
//# sourceURL=pen.js
</script>
		
		
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		