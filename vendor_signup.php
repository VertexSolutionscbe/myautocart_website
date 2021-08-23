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
	 $valid = 1; 
	 
         $qf="SELECT * FROM `financial_year` WHERE id";
	     $Eqf=mysqli_query($conn,$qf);
	     $FEqf=mysqli_fetch_array($Eqf);
		 
		 $_SESSION['financial_year'] = $FEqf['financial_year'];

		 //financial_year='".$_SESSION['financial_year']."'
	 
  $vendor_name    = $_POST['vendor_name'];
  $contact_person = $_POST['contact_person'];
  $last_name      = $_POST['last_name'];
  $email          = $_POST['email'];
  $contact_no     = $_POST['contact_no'];
  $address1       = $_POST['address1'];
  $address2       = $_POST['address2'];
  $city           = $_POST['city'];
  $state          = $_POST['state'];
  $zip            = $_POST['zip'];
  $country        = $_POST['country'];
  $gender         = $_POST['gender'];
  $age            = $_POST['age']; 
  $date           = $_POST['date'];  
  $password       = $_POST['password'];
  $logo           = $_POST['$logo'];
  
  
     $path = $_FILES['logo']['name'];
     $path_tmp = $_FILES['logo']['tmp_name'];
	 
	 if($path!='') {
        $ext = pathinfo($path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    } 
	
	  // getting auto increment id for logo renaming
		//$inc="SHOW TABLE STATUS LIKE 'tbl_vendor'";
		$inc="SHOW TABLE STATUS LIKE 'user_create'";
		$Einc=mysqli_query($conn,$inc);
		while($row=mysqli_fetch_array($Einc)){		
			$ai_id=$row[10];
		}	
  
     if($path=='') {
     // $pass = md5($password);
     $query="INSERT INTO tbl_vendor SET vendor_name='".$vendor_name."', contact_person='".$contact_person."', last_name='".$last_name."', email='".$email."', contact_no='".$contact_no."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', zip='".$zip."', country='".$country."', gender='".$gender."', age='".$age."', date='".$date."', password='".$password."', logo=''"; 
  	 $Equery=mysqli_query($conn,$query);	 
	 $customer_id=mysqli_insert_id($conn);
	  
	 $success_message = 'vendor Created successfully.'; 
	 
	 }else{
	  // uploading the photo into the main location and giving it a final name
		$final_name = 'Profile-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'admin/dist/uploads/profile/'.$final_name);
					
	     $query="INSERT INTO tbl_vendor SET vendor_name='".$vendor_name."', contact_person='".$contact_person."', last_name='".$last_name."', email='".$email."', contact_no='".$contact_no."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', zip='".$zip."', country='".$country."', gender='".$gender."', age='".$age."', date='".$date."', password='".$password."', logo='".$final_name."'"; 
  	     $Equery=mysqli_query($conn,$query);
         $id=mysqli_insert_id($conn);         
	     
	     $ng="select * from tbl_number_generate where Id=1";
         $Eng=mysqli_query($conn,$ng);
         $FEng=mysqli_fetch_array($Eng);
         $AUC=UC."-".$FEng['userid'];       	   		 
	
		 $query1="INSERT INTO user_create SET user_id='".$AUC."', financial_year='".$_SESSION['financial_year']."', user_name='".$contact_person."', company_name='".$id."', branch_name='".$city."', password='".$password."', user_role='vendor',  photo='".$final_name."', email='".$email."', phone='".$contact_no."'"; 
  	     $Equery1=mysqli_query($conn,$query1);
		 $idd=mysqli_insert_id($conn);

            //My-Autocart_tidi start
                /* $host_name = "166.62.28.96";
                $user_name= "admin@tidi.vertexsolution.co.in";
                $password= "!dkmh~lq-g_n";
                $database2 = "tidi"; */

                 /* $host_name = "localhost";
                 $user_name= "root";
                 $password= ""; */
				 
               /* $database2 = "tidi";
               $tidi = mysqli_connect($host_name ,$user_name,$password,$database2);
               $sql1 = "INSERT INTO m_vendor SET vendor_id='$id',franchisee_name='".strtoupper($_POST['vendor_name'])."',franchisee_id='".$_POST['franchisee_no']."',address='".strtoupper($_POST['address1'])."',mobile='".$_POST['contact_no']."',cen_manager='".$_POST['contact_person']."',con_number='".$_POST['contact_no']."',email='".$_POST['email']."',website='".$_POST['website']."',gst_no='".$_POST['gstno']."',status='Active'"; 
               $sqli=mysqli_query($tidi,$sql1);
               // Close connection  */
              /*  $tidi->close();  */
            //My-Autocart_tidi end		 
	     }
	    
		$success_message = 'Vendor Created successfully.';	
			 
  	    if(!$Equery){	 
	     $error_message = "Error";	   
	    } else{		       		   
	      //header('location: signin.php');	
		  //header('location: vendor_signin.php');
		  //header('location: admin/dist/login.php');
		  header("location: vendor_type.php?ucid=$idd");
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
                                <h2 align="center">Vendor Create Account</h2>                               
							</div>
							
							<div class="billing_details">
                             <form class="billing_inner row" method="post" enctype="multipart/form-data">
							
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Company Name</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="vendor_name" placeholder="Company Name" required>
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Name</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="contact_person" placeholder="Contact Person" required>
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Last Name</b> <span></span></label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                                </div>
								
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>E-Mail</b> <span>*</span></label>
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div> 
								
                                <div class="col-lg-12 form-group">
								   <label for="f-option"><b>Mobile</b> <span>*</span></label>
                                   <input class="form-control" type="text" name="contact_no" placeholder="Mobile" required>
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Address 1</b> <span></span></label>
                                   <input class="form-control" type="text" name="address1" placeholder="Address One">
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Address 2</b> <span></span></label>
                                   <input class="form-control" type="text" name="address2" placeholder="Address Two">
                                </div>

								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>City</b> <span></span></label>
                                   <input class="form-control" type="text" name="city" placeholder="City">
                                </div>																
																
								<div class="col-lg-12 form-group">                                  
                                  <label for="f-option"><b>State</b> <span></span></label>
                                    <select class="selectpicker" name="state">
									  <option>-- Select State --</option>
                                      <option value="Andhra Pradesh">Andhra Pradesh</option>
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
								   <label for="f-option"><b>zip Code</b> <span></span></label>
                                   <input class="form-control" type="text" name="zip" placeholder="zip Code">
                                </div>
								
								<div class="col-lg-12 form-group">
								   <label for="f-option"><b>Country</b> <span></span></label>                               
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
                                  <label for="f-option"><b>Gender</b> <span></span></label>
                                    <select class="selectpicker" name="gender">
                                      <option value="Male">Male</option>
									  <option value="Female">Female</option>
									  <option value="Others">Others</option>												
                                    </select>                                  
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Age</b> <span></span></label>
                                    <input class="form-control" type="text" name="age" placeholder="Age">
                                </div>
								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Date</b> <span></span></label>
                                    <input class="form-control" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" id="date">
                                </div>
								
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Password</b> <span>*</span></label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
																
								<style>
					             ::-webkit-file-upload-button {
                                 background: black;
                                 color: red;
                                 padding: 1em;
                                 }
                                </style>
								<div class="form-group-control col-lg-3">
                                  <label><b>Logo Image</b></label>
                                  <input type="file" name="logo" id="image-upload">
                                </div>
                                
                                <div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" name="submit" class="btn subs_btn form-control">Create Now</button>
                                </div>
								
								<div class="col-lg-6 form-group">
                                   <a href="admin/dist/login.php" class="btn update_btn form-control"><i class="fa fa-sign-in"></i> Vendor Sign-In</a>
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
            