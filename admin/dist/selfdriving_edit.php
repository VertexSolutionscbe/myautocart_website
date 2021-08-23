<?php require_once('header.php'); ?>


       <?php
                  if(isset($_POST['form1'])) {
						   						
                    // updating into the database status			        
	                // $ups = "UPDATE tbl_service_appointment SET financial_year='".$_SESSION['financial_year']."',status='".$_POST['status']."' WHERE appointment_id ='".$_REQUEST['id']."'";
		            $ups = "UPDATE tbl_selfdrive SET status='".$_POST['status']."' WHERE id ='".$_REQUEST['id']."'";
					$Eups = mysqli_query($conn,$ups);
        
    	            $success_message = 'Booked Drive is updated successfully.';						 
				
	                } 										               
		        ?>	
                                        <?php
				                          $sa="SELECT * FROM `tbl_selfdrive` WHERE id='".$_REQUEST['id']."'";
										  $Esa=mysqli_query($conn,$sa);				
		                                  while($FEsa=mysqli_fetch_array($Esa)) {
											  
											  $row = $FEsa['id'];
											  
											 
											  										  											  											  											  											  
											  $pc="SELECT * FROM `tbl_segment` WHERE id=".$FEsa["vehicle_type"]."";
											  $Epc=mysqli_query($conn,$pc);
											  $FEpc=mysqli_fetch_array($Epc);

                                              $cust_name  = $FEsa['fname'];
										      $address    = $FEsa['address'];
					                          $city       = $FEsa['city'];		  
			                                  $state      = $FEsa['state'];											 
				                              $mobile	  = $FEsa['mobile'];
					                          $pincode	  = $FEsa['pincode'];
			                                  $from_date  = $FEsa['from_date'];							                             											         
				                              $to_date	  = $FEsa['to_date'];
				                              $status	  = $FEsa['status'];
				                              $photo	  = $FEsa['id_proof'];
					                          $vehicle_type = $FEpc['segment']; 	  												  
		                                     }       				 			       		 
					                    ?> 
				        
                                        
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="selfdriving.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>View The Booked Service</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>
                                        
          <div class="section-body">
            <h2 class="section-title">Booked Service List</h2>
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
                        <input type="text" name="cust_name" id="cust_name" class="form-control" value="<?php echo $cust_name; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control" readonly>
                      </div>
                    </div>
				  
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $mobile; ?>" readonly>
                      </div>
                    </div>

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $city; ?>" readonly>
                      </div>
                    </div> 

									                     				
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">state</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $state; ?>" readonly>
                      </div>
                    </div> 								 					
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pincode</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $pincode; ?>" readonly>
                      </div>
                    </div> 

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">From</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="from_date" id="from_date" class="form-control" value="<?php echo $from_date; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">To</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="to_date" id="to_date" class="form-control" value="<?php echo $to_date; ?>" readonly>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" value="<?php echo $vehicle_type; ?>" readonly>
                      </div>
                    </div>
					
										<div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID-Proof</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				              <?php
				              if($photo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/selfdrive/'.$photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo1" value="<?php echo $photo; ?>">
				            </div>
				        </div>    
                    </div>                    
					
							<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
						  <option value="<?php echo $status; ?>" selected="true"><?php echo $status; ?></option>
                          <option value="Assigned">Booked</option> 
						  <option value="Completed">Completed</option> 
						  <option value="Closed">Closed</option> 
                        </select>
                      </div>
                    </div>
					
						<div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                       <button class="btn btn-primary" name="form1" type="submit">Update Status</button>
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