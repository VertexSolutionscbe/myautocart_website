        <!--- Header Area --->
	      <?php include('header.php'); ?>	   	  
	    <!--- Header Area End --->
		<?php
	    if(isset($_POST['form1'])) {
	    $valid = 1;		 

		$statement = $pdo->prepare("INSERT INTO tbl_insurance_customer_details (cust_name,v_no,e_mail,mobile_no,ins_date) VALUES (?,?,?,?,?)");
		$statement->execute(array($_POST['cust_name'],$_POST['v_no'],$_POST['e_mail'],$_POST['mobile_no'],$_POST['ins_date']));	
       
	    header("location: insurance_add.php?v_no=".$_POST['v_no']."");
	     }	
	    ?>
	  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='insurance.php'";
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
            </script>
	   
        
        <!--================Categories Banner Area =================-->
       <!-- <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Contact</h3>
                    <ul>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>-->
		<section class="insure_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3 hidden>Insurance</h3>
                    <ul hidden>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contactus.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                  <h1>Get Insurance</h1>
				  <div>&nbsp;</div>
			      <h3 align="left">Customer Details</h3>
                </div>				
                <div class="col-lg-12">
                 <div class="contact_form_inner">
                    <form class="contact_us_form row" action="insurance.php" method="post" id="contactForm">
                        <div class="form-group col-lg-4">
						<label><b>Customer Name : </b></label>
                            <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Full Name" required>
                        </div>
						
                        <div class="form-group col-lg-4">
						<label><b>Vehicle Number : </b></label>
						<input type="text" class="form-control" id="v_no" name="v_no" placeholder="Vehicle Number" required>
                        </div>
						
                        <div class="form-group col-lg-4">
						<label><b>E - Mail : </b></label>
						<input type="email" class="form-control" id="e_mail" name="e_mail" placeholder="Email Address" required>
                        </div>
						
                        <div class="form-group col-lg-4">
						<label><b>Phone Number : </b></label>
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no"  placeholder="Phone Number" required>
                        </div>
						
						<div class="form-group col-lg-4">
						<label><b>Date : </b></label>
                            <input type="date" class="form-control" name="ins_date" id="ins_date" value="<?php echo date('Y-m-d'); ?>" placeholder="Date" required>
                        </div>
						
                        <div class="form-group col-lg-12">
                            <button type="submit" name="form1"  class="btn update_btn form-control">Next</button>
                        </div>
                    </form>
                 </div>
			   </div>	
            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		