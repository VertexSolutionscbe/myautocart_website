<?php
ob_start();
session_start();
include('dbinfo.php');
include("config.php");
$error_message='';
error_reporting(0);

   $vt="UPDATE `user_create` SET vendor_type_id='".$_REQUEST['vtid']."' WHERE id='".$_REQUEST['vrid']."'";
   $Evt=mysqli_query($conn,$vt);
   $Fvt=mysqli_fetch_array($Evt); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>MyAutoCart | Login</title>
  
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<script>
/* function setCookie(phone,value,exdays) {
  console.log(phone,value);
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = phone + "=" + value + ";" + expires + ";path=/";
  }

function getCookie(name) {
  var phone = name + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(phone) == 0) {
      return c.substring(phone.length, c.length);
    }
  }
  return "";
  }
  
function checkCookie() {
  var user=getCookie("phone");
  if (user != "") {
	  console.log(user);
	  showValues();
	  //$('#s-results').html(result).show();
    //alert("Welcome again " + user);
  } else {
	  console.log('else');
     //user = prompt("Please enter your email:","");
	 modal.style.display = "block";   
   }
 }   */
</script>


<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/logo.png" alt="logo" width="170" class="">
            </div>

			<div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form method="POST" action="login_check.php" class="needs-validation">
                  <div class="form-group">
                    <label for="name">Mobile</label>
                   <!-- <input id="text" type="username" class="form-control" name="email" placeholder="example@gmail.com" tabindex="1" onKeyPress="return tabE(this,event)" autofocus hidden> -->               
					<input id="text" type="username" class="form-control" name="phone" id="phone" value="<?php if($_COOKIE['phone']) { echo $_COOKIE['phone']; } ?>" placeholder="Mobile Number" tabindex="1" onKeyPress="return tabE(this,event)" autofocus>
					<div class="invalid-feedback">
                      Please fill in your mobile number or email id
                    </div>
                  </div>
				  
				  <!-- <div class="col-lg-12 form-group">(OR)</div> -->
				  
				 <!-- <div class="form-group">
                    <label for="name">Mobile</label>
                    <input id="text" type="username" class="form-control" name="phone" placeholder="Mobile Number" tabindex="1" onKeyPress="return tabE(this,event)" autofocus>                 
					<div class="invalid-feedback">
                      Please fill in your name
                    </div>
                  </div> -->

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                        <div class="float-right">					    					  
                         <a href="forgot_password.php" class="text-small"> Forgot Password?</a>                                                
                        </div>
					    <!-- Success Msg -->
			              <?php //if($success_message): ?>
			              <?php if($_REQUEST['success']): ?>
			               <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                             <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                             </button>  <strong>Success!</strong> <?php echo $_REQUEST['success'] ?></div>                             
                           </div>
			              <?php endif; ?>
			            <!-- Success Msg End -->
                    </div>
                    <input id="password" type="password" class="form-control" name="password" id="password" value="<?php if($_COOKIE['password']) { echo $_COOKIE['password']; } ?>" placeholder="Password" tabindex="2" onKeyPress="return tabE(this,event)" required>                    
					<div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" <?php if($_COOKIE['phone']) { ?> checked <?php } ?> id="remember-me" class="custom-control-input" tabindex="3">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a href="https://www.facebook.com/My-Auto-Cart-100328031534295/?modal=admin_todo_tour" target="_blank" class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>                  
				  <div class="col-6">
				    <a href="mailto:sales@myautocart.com" class="btn btn-block btn-social btn-google">
                      <span class="fas fa-envelope"></span> Email
                    </a>                                                  
                  </div>
				  <div class="col-6" hidden>
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>                                
                  </div>
                </div>								
              </div>
            </div>
			
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
			<div class="mt-5 text-muted text-center">
              Don't have an account? <a href="../../vendor_signup.php">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; <a href="http://www.vertexsolution.co.in/index.php">Vertex Solutions</a> 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>