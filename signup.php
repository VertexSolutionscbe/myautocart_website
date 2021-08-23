 <!--- Header Area --->
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
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
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

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" />
		    
    <body class="home_sidebar">              
        <div class="home_box">                  		
	    <!--- Header Area End --->
		
<?php
 if (isset($_POST['submit'])){
    	
  // Duplicate Category checking
  $tb="SELECT * FROM tbl_customer WHERE mobile='".$_POST['mobile']."'";
  $Etb=mysqli_query($conn,$tb);
  $duplicate=mysqli_num_rows($Etb);	
  if($duplicate == 0) { 	  
	 
  $qf="SELECT * FROM `financial_year` WHERE id";
  $Eqf=mysqli_query($conn,$qf);
  $FEqf=mysqli_fetch_array($Eqf);
		 
  $_SESSION['financial_year'] = $FEqf['financial_year'];	 
	 
  $f_name   = $_POST['f_name'];
  $l_name   = $_POST['l_name'];
  $email    = $_POST['email'];
  $mobile   = $_POST['mobile'];
  $billing_address  = $_POST['billing_address'];
  $delivery_address  = $_POST['delivery_address'];
  $city     = $_POST['city'];
  $state    = $_POST['state'];
  $country  = $_POST['country'];
  $pincode  = $_POST['pincode'];
  $gender   = $_POST['gender'];
  $age      = $_POST['age'];
  // Given password
  $password = $_POST['password'];
   
    // $pass = md5($password);
	$date=date("y-m-d");
	
     $query="INSERT INTO tbl_customer SET f_name='".$f_name."', l_name='".$l_name."', email='".$email."', address='".$billing_address."', mobile='".$mobile."', gender='".$gender."', age='".$age."', password='".$password."',financial_year='".$_SESSION['financial_year']."',trn_date='".$date."'"; 
  	 $Equery=mysqli_query($conn,$query);	 
	 $customer_id=mysqli_insert_id($conn);
			 
  	 if(!$Equery){	
	 
	     $error_message = "Error";
	   
	   }else{
		   
	     $query1 = "INSERT INTO tbl_customer_address SET customer_id='".$customer_id."', f_name='".$f_name."', l_name='".$l_name."', email='".$email."', billing_address='".$billing_address."', delivery_address='".$delivery_address."', city='".$city."', state='".$state."', country='".$country."', pincode='".$pincode."', mobile='".$mobile."',financial_year='".$_SESSION['financial_year']."'";		
         $Equery1=mysqli_query($conn,$query1);    
		   
	     header('location: signin.php');
	  
	   }
    
    } else {
		
		$error_message .= "Mobile already exists<br>";		
	}
    	   
  }
 ?>      
        <!--================Register Area =================-->
        <section class="register_area p_100">
		
<!-- Success Msg -->		
<div class="container">
  <?php if($success_message): ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success_message; ?>
  </div>
  <?php endif; ?>
  <?php if($error_message): ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="signup.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo $error_message; ?>
  </div>
</div> 
<?php endif; ?>    
<!-- Success Msg End -->
		
            <div class="container">
                <div class="register_inner">
                    <div class="row justify-content-md-center">																	
                        <div class="col-lg-6">
						
						    <div class="row justify-content-md-center">
							  <a href="index.php"><img src="img/logo.png" alt="" title="" align="middle"></a>							  
						    </div>
						     <div class="row">&nbsp;</div>							 
                            <div class="login_title">
                                <h2 align="center">create account</h2>                               
							</div>
							
							<div class="billing_details">
                             <form class="billing_inner row" method="post">
							
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>First Name</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="f_name" placeholder="First Name" required>
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Last Name</b></label>
                                    <input class="form-control" type="text" name="l_name" placeholder="Last Name">
                                </div>
								
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Email</b> <span>*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div> 
								
                                <div class="col-lg-12 form-group">
								   <label for="f-option"><b>Mobile</b> <span>*</span></label>
                                   <input class="form-control" type="text" name="mobile" placeholder="Mobile" pattern="^\d{10}$" required>
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Billing Address</b></label>
                                   <input class="form-control" type="text" name="billing_address" placeholder="Address">
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Delivery Address</b></label>
                                   <input class="form-control" type="text" name="delivery_address" placeholder="Address">
                                </div>

								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>City</b></label>
                                   <input class="form-control" type="text" name="city" placeholder="City">
                                </div>																
								
								<div class="col-lg-12 form-group">                                  
                                  <label for="f-option"><b>State</b></label>
                                    <select class="selectpicker" name="state">
									  <option>-- Select State --</option>
                                      <?php 
									   $st="SELECT * FROM `tbl_state` ORDER BY StateID ASC";
									   $Est=mysqli_query($conn,$st);
									   while($FEst=mysqli_fetch_array($Est)){
									  ?>
									  <option value="<?php echo $FEst['StateID']; ?>"><?php echo $FEst['StateName']; ?></option>												
                                      <?php } ?>
									</select>                                  
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Pin Code</b></label>
                                   <input class="form-control" type="text" name="pincode" placeholder="Pin Code">
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Country</b></label>                                  
                                    <select class="selectpicker" name="country">
									  <option>-- Select Country --</option>
                                      <?php 
									   $ct="SELECT * FROM `tbl_country` ORDER BY country_id ASC";
									   $Ect=mysqli_query($conn,$ct);
									   while($FEct=mysqli_fetch_array($Ect)){
									  ?>
									  <option value="<?php echo $FEct['country_id']; ?>"><?php echo $FEct['country_name']; ?></option>												
                                      <?php } ?>
									</select>
								</div>

								<div class="col-lg-12 form-group">                                  
                                  <label for="f-option"><b>Gender</b></label>
                                    <select class="selectpicker" name="gender">
                                      <option value="Male">Male</option>
									  <option value="Female">Female</option>
									  <option value="Others">Others</option>												
                                    </select>                                  
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Age</b></label>
                                    <input class="form-control" type="text" name="age" placeholder="Age">
                                </div>
								<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->                              								
<script>						
function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#91CE4D";
    var badColor = "#D41100";
 	
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 6 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "ok!"
    }
	else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
}  							
</script>
								<div class="col-lg-12 form-group">								
								  <label for="f-option"><b>Password</b> <span>*</span></br>(minimum 6 chars, at least 1 number, at least 1 Capital letter)</label>
                                  <input class="form-control" type="password" name="" id="pass1" placeholder="Password" onkeyup="checkPass(); return false;" required>
                                  <!-- <i class="far fa-eye" id="togglePassword"></i> -->
								</div>
								
								<div class="col-lg-12 form-group">								
								  <label for="f-option"><b>Confirm Password</b> <span>*</span></br>(minimum 6 chars, at least 1 number, at least 1 Capital letter)</label>
                                  <input class="form-control" type="password" name="password" id="pass2" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" placeholder="Confirm Password" onkeyup="checkPass(); return false;" required>
                                 <!-- <i class="far fa-eye" id="togglePassword"></i> -->
								</div>
                                <div id="error-nwl"></div>								
								<!-- <script>
	                              const togglePassword = document.querySelector('#togglePassword');
                                  const password = document.querySelector('#password');

                                   togglePassword.addEventListener('click', function (e) {
                                   // toggle the type attribute
                                   const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                   password.setAttribute('type', type);
                                   // toggle the eye slash icon
                                   this.classList.toggle('fa-eye-slash');
                                   });
	                            </script> -->
                                
                                <div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" name="submit" class="btn subs_btn form-control">Register Now</button>
                                </div>
								
								<div class="col-lg-6 form-group">
                                   <a href="signin.php" class="btn update_btn form-control"><i class="fa fa-sign-in"></i> Sign In</a>
                                </div>
                            </form>							
						  </div>
						  
                        </div>						
                    </div>
                </div>
            </div>
        </section>
        <!--================End Register Area =================-->
		
		
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>		
            