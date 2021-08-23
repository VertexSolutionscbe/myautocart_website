        <!--- Header Area --->
	      <?php include('header.php'); 
		    ob_start();
            session_start();
		  ?>
	    <!--- Header Area End --->
				<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>Insurance Add | MyAutoCart</title>        
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

	  <?php
	 if(isset($_POST['form1'])) {
	 
	 $valid = 1;
	
	 $v_no=$_POST['v_no']; 
	 $make_brand=$_POST['make_brand']; 
	 $vehicle_type=$_POST['vehicle_type']; 
	 $make_model=$_POST['make_model']; 
	 $version=$_POST['version']; 
	 $year=$_POST['year']; 
	 $policy_type=$_POST['policy_type']; 
	 $caims=$_POST['caims'];  
	 // $photo=$_POST['photo'];  
	 // $photo_1=$_POST['photo_1'];


    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];
	
	$path = $_FILES['photo_1']['name'];
    $path_tmp_1 = $_FILES['photo_1']['tmp_name'];
	
	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    } 

		if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_insurance_vehicle_details'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
		 
	// // select the path
// $dir = "admin/dist/uploads/rc/".$ext;
// $files=mkdir($dir);

// //Upload the RC Photo Photo
  // $target_dir = "$dir/$files";
// $target_file = $target_dir . basename($_FILES["photo"]["name"]);
// $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// $nname = mt_rand();
 // $upath=$target_dir . $nname.".".$extension;
 // $iupath=$target_dir . $nname.".".basename($_FILES["photo"]["name"]); 
// move_uploaded_file($_FILES["photo"]["tmp_name"], $upath); 
		 


		// uploading the photo into the main location and giving it a final name
	    $final_name = 'RC-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'admin/dist/uploads/rc/'.$final_name );
		
		$final_name_1 = 'Insurance-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp_1, 'admin/dist/uploads/insurance/'.$final_name_1 );		 
			  
	     $st="INSERT INTO tbl_insurance_vehicle_details set v_no='".$_POST['v_no']."',insurance_photo='$final_name_1',rc_photo='$final_name',vehicle_type='".$_POST['vehicle_type']."',make_brand='".$_POST['make_brand']."',make_model='".$_POST['make_model']."',year='".$_POST['year']."',policy_type='".$_POST['policy_type']."',caims='".$_POST['caims']."',version='".$_POST['version']."',financial_year='".$_SESSION['financial_year']."'";
		 $Est=mysqli_query($conn,$st); 

	     header("location: insurance_finished.php");
	    }
	 }

	 ?>

	

		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Insurance | myautocart</title>      
          <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-159623414-1');
			  


function getmodel(){
	
    var inputs = document.getElementById('make_brand').value;
//alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_model.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
}

function getversion(){
	
    var inputs1 = document.getElementById('make_model').value;
//alert("edfgjd"+inputs1);
	$.ajax({
	type: "POST",
	
	url: "get_version.php",
	
	data:{inputs1:inputs1},
	success: function(data){
		$("#cdetails1").html(data);
		}
		});
}
            </script>
	    </head>
        
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
		<section class="insure_add_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Vehicle Insurance</h3>
                    <ul>
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
                  <h1> Get Insurance</h1>
				   <div>&nbsp;</div>
				  <h3 align="left">Vehicle Details</h3>
                </div>				 
            
			 	<div class="col-lg-12">		
                 <div class="contact_form_inner">
                    <form class="contact_us_form row" action="insurance_add.php" method="post" enctype="multipart/form-data">
										       
                     <div class="form-group-control col-lg-3" >
						<label><b>Vehicle Number : </b></label>
						<input type="text" class="form-control" id="v_no" name="v_no" value="<?php echo $_REQUEST['v_no']; ?>" placeholder="Vehicle Number" required readonly>
                     </div>
								   
					 <div class="form-group col-lg-3">
						<label><b>Vehicle Type : </b></label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
						    <option value="">--Select The Vehice Type--</option>
						    <option value="two_wheeler">Two Wheeer</option>
						    <option value="four_wheeler">Four Wheeler</option>		
						    <option value="scooter">Scooter</option>		
                        </select>
                      </div>
						
                      <div class="form-group col-lg-3">
						<label><b>Make : </b></label>
                        <select class="form-control" name="make_brand" id="make_brand" onChange="getmodel(this.value);">
						    <option value="">--- Select The Brand ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_make  ORDER BY id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['make']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
					  
				<div class="box-body">
				<div  id="cdetails" name="cdetails" > </div>	
				</div>
				 
    	   	    <div class="box-body">
				<div  id="cdetails1" name="cdetails1" > </div>				
				</div>
				
						
                      <div class="form-group col-lg-3">
						<label><b>Year</b></label>
                        <select class="form-control selectric" name="year" id="year">
						    <option value="">--- Select The Year ---</option>
						    <option value="2000">2000</option>
						    <option value="2001">2001</option>
						    <option value="2002">2002</option>
						    <option value="2003">2003</option>
						    <option value="2004">2004</option>
						    <option value="2005">2005</option>
						    <option value="2006">2006</option>
						    <option value="2007">2007</option>
						    <option value="2008">2008</option>
						    <option value="2009">2009</option>
						    <option value="2010">2010</option>
						    <option value="2011">2011</option>
						    <option value="2012">2012</option>
						    <option value="2013">2013</option>
						    <option value="2014">2014</option>
						    <option value="2015">2015</option>
						    <option value="2016">2016</option>
						    <option value="2017">2017</option>
						    <option value="2018">2018</option>
						    <option value="2019">2019</option>
						    <option value="2020">2020</option>					
                        </select>
                      </div>					 					
						
			   		 <div class="form-group col-lg-3">
						<label><b>Policy Type:</b></label>
                        <select class="form-control selectric" name="policy_type" id="policy_type">
						    <option value="">--- Select The Policy Type---</option>
						    <option value="full">Full Insurance</option>
						    <option value="third_party">Third Party</option>							
                        </select>
                      </div>
						
					  <div class="form-group col-lg-3">
						<label><b>Any Claims Last Year</b></label>
                        <select class="form-control" name="caims" id="caims">
						  <option value="yes">Yes</option>
						  <option value="no">No</option>
                        </select>
                      </div>
					  
					  <style>
					  ::-webkit-file-upload-button {
                       background: black;
                       color: red;
                       padding: 1em;
                       }
                      </style>					  
					  <div class="form-group-control col-lg-3">
                         <label><b>RC Upload</b></label>
                         <input type="file" name="photo" id="image-upload"  required>
                      </div>
					     
					  <div class="form-group-control col-lg-3">
                         <label><b>Insurance Upload</b></label>
                         <input type="file" name="photo_1" id="image-upload" required >
                      </div>		
					  
                      <div class="form-group col-lg-12">
                         <button type="submit" name="form1" class="btn update_btn form-control">Submit</button>
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
		