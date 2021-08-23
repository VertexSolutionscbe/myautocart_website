<?php require_once('header.php'); ?>




    
    <?php
                   $Esx1="select * from tbl_insurance_customer_details where id='".$_REQUEST['id']."'";
					$ews1=mysqli_query($conn,$Esx1);
				while(	$Qwa1=mysqli_fetch_array($ews1)){

	$cust_name   = $Qwa1['cust_name'];
	$v_no   = $Qwa1['v_no'];
	$e_mail    = $Qwa1['e_mail'];
	$mobile_no    = $Qwa1['mobile_no'];



	$Esx="select * from tbl_insurance_vehicle_details where v_no='".$Qwa1['v_no']."'";
					$ews=mysqli_query($conn,$Esx);
					$Qwa=mysqli_fetch_array($ews);
					
					 $Esx2="select * from tbl_make where id='".$Qwa['make_brand']."'";
					$ews2=mysqli_query($conn,$Esx2);
					$Qwa2=mysqli_fetch_array($ews2);
					
					$Esx3="select * from tbl_model where id='".$Qwa['make_model']."'";
					$ews3=mysqli_query($conn,$Esx3);
					$Qwa3=mysqli_fetch_array($ews3);
					
					$Esx4="select * from tbl_version where id='".$Qwa['version']."'";
					$ews4=mysqli_query($conn,$Esx4);
					$Qwa4=mysqli_fetch_array($ews4);


	$vehicle_type   = $Qwa['vehicle_type'];
	$make_brand   = $Qwa2['make'];
	$make_model    = $Qwa3['model'];
	$year    = $Qwa['year'];
	$policy_type    = $Qwa['policy_type'];
	$caims    = $Qwa['caims'];
	$version    = $Qwa4['version'];
	$rc_photo    = $Qwa['rc_photo'];
	$insurance_photo    = $Qwa['insurance_photo'];
	
	
		           

}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="insurance.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Post</h2>
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
			
			<!-- Form Start -->
            <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
				  
				  
					
				
					
					              
                    
					
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>" class="form-control" readonly>
                      </div>
                    </div>       

			 	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Number</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="v_no" id="v_no" class="form-control" value="<?php echo $v_no; ?>" readonly>
                      </div>
                    </div>  

				 	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile Number</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>" readonly>
                      </div>
                    </div>    

			 	
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="e_mail" id="e_mail" class="form-control" value="<?php echo $e_mail; ?>" readonly>
                      </div>
                    </div> 		
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" value="<?php echo $vehicle_type; ?>" readonly>
                      </div>
                    </div> 		
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Make</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="make_brand" id="make_brand" class="form-control" value="<?php echo $make_brand; ?>" readonly>
                      </div>
                    </div> 	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Model</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="make_model" id="make_model" class="form-control" value="<?php echo $make_model; ?>" readonly>
                      </div>
                    </div> 	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Version</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="version" id="version" class="form-control" value="<?php echo $version; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="year" id="year" class="form-control" value="<?php echo $year; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Policy Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="policy_type" id="policy_type" class="form-control" value="<?php echo $policy_type; ?>" readonly>
                      </div>
                    </div> 		
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Any Claims last Year</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="caims" id="caims" class="form-control" value="<?php echo $caims; ?>" readonly>
                      </div>
                    </div> 
					
				
      
                    <div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RC Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				              <?php
				              if($rc_photo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/rc/'.$rc_photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php echo $rc_photo; ?>">
				            </div>
				        </div>    
                    </div>            

					<div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Insurance Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				              <?php
				              if($insurance_photo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/insurance/'.$insurance_photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo1" value="<?php echo $insurance_photo; ?>">
				            </div>
				        </div>    
                    </div>                    
                  

                    
                    <div class="form-group row mb-4" hidden>
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
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->