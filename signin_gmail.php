 <!--- Header Area --->
  <?php
   ob_start();
   session_start();
   /* include("settings.php"); */
   include("admin/dist/dbinfo.php");
   include("admin/dist/config.php");
   error_reporting(0);
   if($_SESSION['customer_id']>0)
    {
      header('location: register.php');
	  // header('location: index.php');
    }
	
/*Gmail Login Start*/
//Include Configuration File
include('gmloginPHP54/config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 $_SESSION['ktoken']=$token;

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();
  // print_r($data);
  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['id']))
  {
   $_SESSION['gmid'] = $data['id'];
  }
  
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
 
 //Login Process
 
 $query = "SELECT * FROM tbl_customer WHERE gid='".$_SESSION['gmid']."'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) > 0 ) {
		while ($row = mysqli_fetch_array($results)) {
  	      $_SESSION['mobile'] = $row['mobile'];
	      $_SESSION['customer_id']=$row['customer_id'];
		  $_SESSION['customer_name']=$row['f_name'];
		  $_SESSION['financial_year']=$row['financial_year'];
  	      $_SESSION['success'] = "You are now logged in";
		  
  	      header('location: register.php');
		  //header('location: index.php');
	    }
  	}
	if(mysqli_num_rows($results)<1)
	{
		$sem="select customer_id,email from tbl_customer WHERE email='".$_SESSION['user_email_address']."'";
		$rsem=mysqli_query($conn,$sem);
		if(mysqli_num_rows($rsem)<1)
		{
		
		$qry="insert into tbl_customer set gender='".$_SESSION['user_gender']."',f_name='".$_SESSION['user_first_name']."',l_name='".$_SESSION['user_last_name']."',email='".$_SESSION['user_email_address']."',gid='".$_SESSION['gmid']."'";
		$results = mysqli_query($conn, $qry);		
		 // $_SESSION['mobile'] = $row['mobile'];
	      $_SESSION['customer_id']=mysqli_insert_id($conn);
		//  $_SESSION['financial_year']=$row['financial_year'];
  	      $_SESSION['success'] = "You are now logged in";		  
  	      header('location: register.php');
		  //header('location: index.php');
		}
		if(mysqli_num_rows($rsem)>0)
		{
		$qry="update tbl_customer set gid='".$_SESSION['gmid']."' where email='".$_SESSION['user_email_address']."'";
		$results = mysqli_query($conn, $qry);	
		$nrow=mysqli_fetch_array($rsem);
		
		$_SESSION['customer_id']=$nrow['customer_id'];
		$_SESSION['success'] = "You are now logged in";		 
	
  	    header('location: register.php');
		//header('location: index.php');
		}
	}
 
 //Login Process end
 
 
}


/*Gmail Login End*/
	
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
 session_start();
 if (isset($_POST['submit'])) {
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];

  if (empty($mobile)) {
  	echo "Mobile is required";
  }
  if (empty($password)) {
     echo "Password is required";
  }

  	// $pass = md5($password);
    $query = "SELECT * FROM tbl_customer WHERE mobile='$mobile' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) > 0 ) {
		while ($row = mysqli_fetch_array($results)) {			
			
			if($row){				
				if(!empty($_POST['selector'])){					
				  setcookie("mobile",$_POST['mobile'],time()+(10*365*24*60*60));
			      setcookie("password",$_POST['password'],time()+(10*365*24*60*60));										
				}else{
			      if(isset($_COOKIE['mobile'])){
			      setcookie('mobile','');					
			      }
		          if(isset($_COOKIE['password'])){
			      setcookie('password','');					
			      }						
				}
				header('location: index.php');
			   }
		
  	      $_SESSION['mobile'] = $row['mobile'];
	      $_SESSION['customer_id']=$row['customer_id'];
		  $_SESSION['financial_year']=$row['financial_year'];
  	      $_SESSION['success'] = "You are now logged in";
		  
  	      //header('location: register.php');
		  header('location: index.php');
	    }
  	}else {
		
  		 $error_message = "Wrong Mobile/password combination";
  	    }
    }
?>
        
		
		
		<!--================login Area =================-->
        <section class="login_area p_100">
		
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
    <a href="signin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo $error_message; ?>
  </div>
</div> 
<?php endif; ?>    
<!-- Success Msg End -->
            
            <div class="container">
                <div class="login_inner">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-4">
						    <div class="row justify-content-md-center">
							 <a href="index.php"><img src="img/logo.png" alt="logo" title="logo" align="middle"></a>							  
						    </div>
						     <div class="row">&nbsp;</div>
                            <div class="login_title">							  							  
                              <h2 align="center">Sign in your account</h2>                               
                            </div>
                            <form class="login_form row" method="post">
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Mobile</b></label>
                                    <input class="form-control" type="text" name="mobile" value="<?php if(isset($_COOKIE['mobile'])) { echo $_COOKIE['mobile']; } ?>" placeholder="Mobile">
                                </div>
								
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Password</b></label>
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
									<input class="form-control" type="password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" placeholder="Password">
                                </div>
								
                                <div class="col-lg-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option" name="selector" <?php if(isset($_COOKIE['mobile'])) { ?> checked <?php } ?>/>
                                        <label for="f-option">Keep me logged in</label>
                                        <div class="check"></div>
                                    </div>
                                    <h4 hidden>Forgot your password ?</h4>
                                </div>
								
                                <div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" name="submit" class="btn subs_btn form-control"><i class="fa fa-sign-in"></i>	Sign In</button>
                                </div>																								                              
                                
                              <!--   <div class="col-lg-12 addthis_inline_share_toolbox">								 
                                   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ea16a97881567da"></script>
								</div>  -->                  							
								<?php 
								//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
                                if(!isset($_SESSION['access_token'])) { ?>
                                <div class="col-lg-6 form-group">
								   <a href="<?php echo $google_client->createAuthUrl(); ?>"><img src="btn_google.png" /></a>
                                </div>
                                <?php } ?>
								<div class="col-lg-6 form-group">
								   <a href="signup.php" class="btn update_btn form-control"><i class="fa fa-sign-in"></i> Sign Up</a>
                                </div>
								
							</form>
                        </div>						                      						
                    </div>
                </div>
            </div>
			
        </section>
        <!--================End login Area =================-->
             