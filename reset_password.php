      	<?php 
         ob_start();
         session_start(); 
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
		
		
		
		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>reset password | myautocart</title>      
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
                  <h2>Reset Password</h2>				  				  
                </div>
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
                  <p><a href="https://myautocart.com/signin_gmail.php">Click here</a> to reset password.</p>';
	            }else{
	            $row = mysqli_fetch_array($query);
	            $expDate = $row['expDate'];
	            if($expDate >= $curDate){			                 
               ?>
			   <br />
            	<div class="col-lg-12">	  
				 <div class="contact_form_inner">			
                  <form class="contact_us_form row" method="post" action="reset_password.php">
                    
                    <input type="hidden" name="action" value="update" />
					
                    <div class="form-group-control col-lg-4">
				    <label><b>Email </b></label>
				      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required readonly>                     
				    </div>

                    <div class="form-group-control col-lg-4">
                     <label for="password">New Password</label>
                     <input id="password" type="password" class="form-control pwstrength" name="password" id="password" tabindex="2" required>                    
                    </div>

                    <div class="form-group-control col-lg-4">
                      <label for="password-confirm">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="confirm-password" id="confirm-password" tabindex="2" required>
                    </div>
					
                    <div class="form-group col-lg-12">                     
                      <div class="col-lg-4">&nbsp;</div>
					  <button  class="btn btn-primary" id="reset" type="submit">Reset Password</button>
			        </div>					 					  
                  </form>
                 </div>
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

              mysqli_query($conn,"UPDATE `tbl_customer` SET `password`='".$pass1."', `trn_date`='".$curDate."' WHERE `email`='".$email."';");

              mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
              echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
              <p><a href="https://myautocart.com/signin_gmail.php">Click here</a> to Login.</p></div><br />';
		           }		
                }
             ?>				
				
                <div class="footer_copyright">                     
                  <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> by <a href="http://www.vertexsolution.co.in/" target="_blank">Vertex Solutions</a></h5>
                </div>				
            </div>
        </section>
        <!--================End Contact Area =================-->	