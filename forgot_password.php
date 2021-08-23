      	<?php 
         ob_start();
         session_start(); 
         include("admin/dist/dbinfo.php");
         include("admin/dist/config.php"); 
         error_reporting(0); 
        ?>
		
<?php
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$error="";	
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM `tbl_customer` WHERE email='".$email."'";
	$results = mysqli_query($conn,$sel_query);
	$row = mysqli_num_rows($results); 
	if ($row==""){
		$error .= "<p>No user is registered with this email address!</p>";
		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5($email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
// Insert Temp Table
mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `passkey`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$email_to = $email;
$from = 'sales@myautocart.com';

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "Password Recovery - myautocart.com";

$output ='<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Express Mail</title></head><body>';
$output.='<p>Dear Customer,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://myautocart.com/reset_password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://myautocart.com/reset_password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>MyAutoCart Team</p>';
$output.='<p>www.myautocart.com</br>
198, Nehru Street, Ramnagar,</br>
Coimbatore- 641009.</p>';
$output.='</body></html>';
$body = $output;

$send = mail($email_to, $subject, $body, $headers);

header('location:signin_gmail.php?success=  Password reset link has been sent to your mail.');
		}	 		
} 

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
						
		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>forgot password | myautocart</title>      
          <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-159623414-1');			  
            </script>
	    </head>		    
         <script> 

         </script>       
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
			    <div class="row justify-content-md-center">
				  <a href="index.php"><img src="img/logo.png" alt="logo" title="logo" align="middle"></a>							  
			    </div>
				<div class="row">&nbsp;</div>			    
                <div class="contact_title">
                  <h2>Forgot Password</h2>				  
				  <p>We will send a link to reset your password</p>
                </div>				 
            	  
							
                  <form class="contact_us_form row" method="post" action="forgot_password.php">
                    <div class="col-lg-4">&nbsp;</div>

                    <div class="form-group-control col-lg-4">
				    <label><b>Email </b></label>
				      <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>                     
				    </div>				  
					 
                    <div class="form-group col-lg-12">                     
                      <div class="col-lg-4">&nbsp;</div>
					  <button  class="btn btn-primary" type="submit">SEND E-MAIL</button>
			        </div>					 					  
                  </form>
                
                <div class="footer_copyright">                     
                  <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> by <a href="http://www.vertexsolution.co.in/" target="_blank">Vertex Solutions</a></h5>
                </div>				
            </div>
        </section>
        <!--================End Contact Area =================-->	