<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;


	$path = $_FILES['logo']['name'];
    $path_tmp = $_FILES['logo']['tmp_name'];

    $previous_photo = $_POST['previous_photo'];

	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
 
	if($valid == 1) {
			  
	       if($previous_photo == '' && $path == '') {
	    	 $statement = $pdo->prepare("UPDATE tbl_branch SET branch_name=?, address1=?,  city=?, state=?, country=?, zip=?, contact_person=?, contact_no=?, email=?,website=?,gst_no=? WHERE branch_id=?");
	    	 $statement->execute(array($_POST['branch_name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip'],$_POST['contact_person'],$_POST['contact_no'],$_POST['email'],$_POST['website'],$_POST['gstno'],$_REQUEST['id']));
	     }

		 
	     if($previous_photo != '' && $path == '') {
	    	 $statement = $pdo->prepare("UPDATE tbl_branch SET branch_name=?, address1=?, city=?, state=?, country=?, zip=?, contact_person=?, contact_no=?, email=?,website=?,gst_no=? WHERE branch_id=?");
	    	 $statement->execute(array($_POST['branch_name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip'],$_POST['contact_person'],$_POST['contact_no'],$_POST['email'],$_POST['website'],$_POST['gstno'],$_REQUEST['id']));
	     } 

	     
	     if($previous_photo == '' && $path != '') { 

	    	 $final_name = 'Logo-'.$_REQUEST['id'].'.'.$ext;
             move_uploaded_file( $path_tmp, '../dist/uploads/logo/'.$final_name );
 
	    	 $statement = $pdo->prepare("UPDATE tbl_branch SET branch_name=?, address1=?, city=?, state=?, country=?, zip=?, contact_person=?, contact_no=?, email=?, logo=?, website=?,gst_no=? WHERE branch_id=?");
	    	 $statement->execute(array($_POST['branch_name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip'],$_POST['contact_person'],$_POST['contact_no'],$_POST['email'],$final_name,$_POST['website'],$_POST['gstno'],$_REQUEST['id']));
	      } 
	    
	     
		if($previous_photo != '' && $path != '') {

	         unlink('../dist/uploads/logo/'.$previous_photo);

	    	 $final_name = 'Logo-'.$_REQUEST['id'].'.'.$ext;
             move_uploaded_file( $path_tmp, '../dist/uploads/logo/'.$final_name );
	    	
	    } 
//My-Autocart_tidi start
  // $host_name = "166.62.28.96";
                // $user_name= "admin@tidi.vertexsolution.co.in";
                // $password= "!dkmh~lq-g_n";
               // $database2 = "tidi";
			   
			     $host_name = "localhost";
                $user_name= "tidi";
                $password= "^wGqEHRqRVnt";
               $database2 = "tidi";
                   $tidi = mysqli_connect($host_name, $user_name, $password) or die("cannot connect"); 
                   mysqli_select_db($tidi, $database2) or die("cannot select DB");
			   
			       
             $sql1 = "update m_franchisee SET franchisee_name='".strtoupper($_POST['branch_name'])."',address='".strtoupper($_POST['address1'])."',mobile='".$_POST['contact_no']."',cen_manager='".$_POST['contact_person']."',con_number='".$_POST['contact_no']."',email='".$_POST['email']."',website='".$_POST['website']."',gst_no='".$_POST['gstno']."' where branch_id='".$_REQUEST['id']."'"; 
			 $sqli=mysqli_query($tidi,$sql1);
					
// Close connection 
$tidi->close(); 
//My-Autocart_tidi end

	    $success_message = 'Branch  updated successfully!';
	}
}
?>


    
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_branch WHERE branch_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	                    $rr="select * from tbl_vendor where vendor_id='".$row['vendor_id']."'";
	                 	$Err=mysqli_query($conn,$rr);
                        $FErr=mysqli_fetch_array($Err);
	
	
	$vendor_name    = $FErr['vendor_name'];
	
	$branch_name    = $row['branch_name'];
	
	$address1       = $row['address1'];
	$city           = $row['city'];
	$state          = $row['state'];
	$country        = $row['country'];
	$zip            = $row['zip'];
	$contact_person = $row['contact_person'];
	$contact_no     = $row['contact_no'];
	$email          = $row['email'];
    $logo           = $row['logo'];
	$website           = $row['website'];	
	$gstno           = $row['gst_no'];	
  }
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="color.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit The Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Branch</a></div>
              <div class="breadcrumb-item">Edit Branch</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit Branch</h2>
            <p class="section-lead">
              On this page you can Edit a existing post and fill in all fields.
            </p>
			
			<!-- Success Msg -->
			<?php if($success_message): ?>
			<div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button>  <strong>Success!</strong> <?php echo $success_message; ?></div>                             
            </div>
			<?php endif; ?>
			
			<?php if($error_message): ?>
			<div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button> <strong>Error!</strong> <?php echo $error_message; ?></div>                            
            </div>
			<?php endif; ?>
            <!-- Success Msg End -->
			
			<!-- Form Start -->
            <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vendor_name" id="vendor_name" value="<?php echo $vendor_name; ?>" class="form-control" readonly>
                               </div>
                    </div>
							
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="branch_name" id="branch_name" value="<?php echo $branch_name; ?>" class="form-control">
                             </div>
                    </div>

             <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Person</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="contact_person" id="contact_person" value="<?php echo $contact_person; ?>" class="form-control">
                      </div>
                    </div>	

                  											

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address 1</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="address1" id="address1" value="<?php echo $address1; ?>"  class="form-control">
                      </div>
                    </div>							

                 						

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="city" id="city" value="<?php echo $city; ?>" class="form-control">
                      </div>
                    </div>							

                                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State</label>
                      <div class="col-sm-12 col-md-7">
                       	<select type="text" name="state" id="state" class="form-control">
						<option>--Select State--</option>
						<?php 
						$trt="select * from tbl_state";
						$try=mysqli_query($conn, $trt);
						while($tru=mysqli_fetch_array($try)){
					?>
					
					 <option value="<?php echo $tru['StateName']; ?>" <?php if($tru['StateName']==$row['state']){ ?>selected <?php }?>><?php echo $tru['StateName']; ?></option>
						<?php }
						?>
						</select>
                      </div>
                    </div>							

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Country</label>
                      <div class="col-sm-12 col-md-7">
                       <select type="text" name="country" id="country" class="form-control">
							<option>--Select State--</option>
						<?php 
						$trt="select * from tbl_country";
						$try=mysqli_query($conn, $trt);
						while($tru=mysqli_fetch_array($try)){
					?>
					
					 <option value="<?php echo $tru['country_name']; ?>" <?php if($tru['country_name']==$row['country']){ ?>selected <?php }?>><?php echo $tru['country_name']; ?></option>
						<?php }
						?>
						</select>
                      </div>
                    </div>							

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Zip Code</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="zip" id="zip" value="<?php echo $zip; ?>" class="form-control">
                      </div>
                    </div>							

      						

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" name="contact_no" id="contact_no" value="<?php echo $contact_no; ?>" class="form-control">
                      </div>
                    </div>	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="form-control">
                      </div>
                    </div>						
					
                
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="website" id="website"  value="<?php echo $website; ?>" class="form-control">
                      </div>
                    </div>	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">GST.NO</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="gstno" id="gstno" value="<?php echo $gstno; ?>" class="form-control">
                      </div>
                    </div>	
					
					<div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Existing Featured Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				              <?php
				              if($logo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/logo/'.$logo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php echo $logo; ?>">
				            </div>
				        </div>    
                    </div> 
					

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                          <label for="customFile" class="custom-file-label">Choose File</label>
                          <input type="file" class="custom-file-input" name="logo" id="image-upload"/>
                        </div>
                      </div>
                    </div>		

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button  class="btn btn-primary" name="form1" type="submit">Update Post</button>
                      </div>
                    </div>
                  
				  </div>
                </div>
              </div>
            </div>
		  </form>
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->