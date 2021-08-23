      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1; 

	 $path = $_FILES['logo']['name'];
     $path_tmp = $_FILES['logo']['tmp_name'];
	 
	 if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
	
	if($valid == 1) {

		// getting auto increment id for logo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_branch'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}		    					    
		if($path=='') {
        $statement = $pdo->prepare("INSERT INTO tbl_branch (vendor_id,branch_name,address1,city,state,country,zip,contact_person,contact_no,email,website,gst_no,logo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_name'],$_POST['branch_name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip'],$_POST['contact_person'],$_POST['contact_no'],$_POST['email'],$_POST['website'],$_POST['gstno'],''));				
    	$success_message = 'vendor Created successfully.';      	     	   
		}else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'Logo-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/logo/'.$final_name );
		 
		$statement = $pdo->prepare("INSERT INTO tbl_branch (vendor_id,branch_name,address1,city,state,country,zip,contact_person,contact_no,email,website,gst_no,logo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_name'],$_POST['branch_name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['zip'],$_POST['contact_person'],$_POST['contact_no'],$_POST['email'],$_POST['website'],$_POST['gstno'],$final_name));
		}
		
		$rr="select * from tbl_branch where branch_name='".$_POST['branch_name']."'";
		$Err=mysqli_query($conn,$rr);
        $FErr=mysqli_fetch_array($Err);
	   $vendorid=$FErr['branch_id'];

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
       $sql1 = "INSERT INTO m_franchisee SET branch_id='$vendorid',vendor_id='".$_POST['vendor_name']."',franchisee_name='".strtoupper($_POST['branch_name'])."',franchisee_id='".$_POST['franchisee_no']."',address='".strtoupper($_POST['address1'])."',mobile='".$_POST['contact_no']."',cen_manager='".$_POST['contact_person']."',con_number='".$_POST['contact_no']."',email='".$_POST['email']."',website='".$_POST['website']."',gst_no='".$_POST['gstno']."',status='Active'"; 
	   $sqli=mysqli_query($tidi,$sql1);   
  
// Close connection 
$tidi->close(); 
//My-Autocart_tidi end
		
 /* $statement = $pdo->prepare("select * from tbl_vendor where vendor_name=?");
		$statement->execute(array($_POST['vendor_name']));
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$vendorid=$row['vendor_id']; */
		//}
		
    	$success_message = 'Vendor  Created successfully.';	       		   		   		   
		   }	     		 		 
		}	   
	  		   
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="make.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Branch</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Branch</a></div>
              <div class="breadcrumb-item">Create New Branch</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Branch</h2>
            <p class="section-lead">
              On this page you can create a new post and fill in all fields.
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
			
            <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                   <?php 
				   //My-Autocart_tidi start
                $host_name = "localhost";
                $user_name= "tidi";
                $password= "^wGqEHRqRVnt";
               $database2 = "tidi";
                   $tidi = mysqli_connect($host_name, $user_name, $password) or die("cannot connect"); 
                   mysqli_select_db($tidi, $database2) or die("cannot select DB");

                    $sa="select * from m_franchisee";
				    $Esa=mysqli_query($tidi,$sa);
				    $n=mysqli_num_rows($Esa);
				    $ect=$n+1;
//My-Autocart_tidi end


                  $sa1="select * from tbl_vendor where vendor_id='".$_REQUEST['id']."'";
				  $Esa1=mysqli_query($conn,$sa1);
				  $n1=mysqli_fetch_array($Esa1);
				   
				    
				   ?>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vendor" id="vendor" value="<?php echo $n1['vendor_name'];?>" class="form-control" readonly>
						<input type="hidden" name="franchisee_no" id="franchisee_no" value="<?php echo "F".$ect;  ?>" class="form-control">
                        <input type="hidden" name="vendor_name" id="vendor_name" value="<?php echo $n1['vendor_id'];?>" class="form-control" readonly>
                       
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="branch_name" id="branch_name" class="form-control">
                        
                      </div>
                    </div>
					
					           <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="contact_person" id="contact_person" class="form-control">
                      </div>
                    </div>							


                   <div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="last_name" id="last_name" class="form-control">
                      </div>
                    </div>												

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address 1</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="address1" id="address1" class="form-control">
                      </div>
                    </div>							
					

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="city" id="city" class="form-control">
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
					<option value="<?php echo $tru['StateName'];?>"><?php echo $tru['StateName']; ?></option>
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
					<option value="<?php echo $tru['country_name'];?>"><?php echo $tru['country_name']; ?></option>
						<?php }
						?>
						</select>
                      </div>
                    </div>							

                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Zip Code</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="zip" id="zip" class="form-control">
                      </div>
                    </div>							

        
                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" name="contact_no" id="contact_no" class="form-control">
                      </div>
                    </div>	
					
					                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" name="email" id="email" class="form-control">
                      </div>
                    </div>	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="website" id="website" class="form-control">
                      </div>
                    </div>	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">GST.NO</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="gstno" id="gstno" class="form-control">
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
                        <button class="btn btn-primary" name="form1" type="submit">Create Post</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		  </form>  	
          </div>
        </section>
      </div>
      
	  <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->