<?php
ob_start();
session_start();
include("config.php");
include("dbinfo.php");
$error_message='';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Password &mdash; MyAutoCart</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

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
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
              <a href="login.php"><img src="assets/img/logo.png" alt="logo" width="170" class=""></a>
			</div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>			  			      			  			  
               <?php			  			   
			    if (isset($_REQUEST["key"]) && isset($_REQUEST["email"])
                && isset($_REQUEST["action"]) && ($_REQUEST["action"]=="reset")
                && !isset($_POST["action"])){
                $error="";
				$key = $_REQUEST["key"];
                $email = $_REQUEST["email"];
                $curDate = date("Y-m-d H:i:s");
			    
				$query = mysqli_query($conn,"SELECT * FROM `password_reset_temp` WHERE `passkey`='".$key."' and `email`='".$email."';");
                $row = mysqli_num_rows($query);
                if ($row==""){
                  $error .= '<h2>Invalid Link</h2>
                  <p>The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the key in which case it is deactivated.</p>
                  <p><a href="https://myautocart.com/admin/dist/login.php">Click here</a> to reset password.</p>';
	            }else{
	            $row = mysqli_fetch_array($query);
	            $expDate = $row['expDate'];
	            if($expDate >= $curDate){			                 
               ?>
			   <br />
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="reset_password.php">
                  <input type="hidden" name="action" value="update" />
				  <div class="form-group">
                    <label for="email">Email</label> 
                    <input id="email" type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" tabindex="1" required autofocus readonly>
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" id="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" id="confirm-password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" id="reset" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>				
              </div>			  
			  <?php
              }else{
              $error .= "<h2>Link Expired</h2>
              <p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
				  }
		        }
              if($error!=""){
	          echo "<div class='error'>".$error."</div><br />";
	            }			
              } // isset email key validate end
			  					  
              if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
              $error="";
              $pass1 = mysqli_real_escape_string($conn,$_POST["password"]);
              $pass2 = mysqli_real_escape_string($conn,$_POST["confirm-password"]);
              $email = $_POST["email"];
              $curDate = date("Y-m-d H:i:s");
              if ($pass1!=$pass2){
		      $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
		       }
	          if($error!=""){
		      echo "<div class='error'>".$error."</div><br />";
		      }else{
             //$pass1 = md5($pass1);
              $pass1 = $pass1;         

              mysqli_query($conn,"UPDATE `user_create` SET `password`='".$pass1."', `trn_date`='".$curDate."' WHERE `email`='".$email."';");

              mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
              echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
              <p><a href="https://myautocart.com/admin/dist/login.php">Click here</a> to Login.</p></div><br />';
		           }		
                }
             ?>							  			  			  
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