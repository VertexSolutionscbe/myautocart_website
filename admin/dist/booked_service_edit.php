<?php require_once('header.php'); ?>
                                     
		        <?php
                  if(isset($_POST['form1'])) {
						   						
                    // updating into the database status			        
	                // $ups = "UPDATE tbl_service_appointment SET financial_year='".$_SESSION['financial_year']."',status='".$_POST['status']."' WHERE appointment_id ='".$_REQUEST['id']."'";
		            $ups = "UPDATE tbl_service_appointment SET service_status='".$_POST['service_status']."' WHERE appointment_id ='".$_REQUEST['id']."'";
					$Eups = mysqli_query($conn,$ups);
        
    	            $success_message = 'Booked Service is updated successfully.';						 
				
	                } 										               
		        ?>		
            
					
					                    <?php                     					  
				                          $sa="SELECT * FROM `tbl_service_appointment` WHERE appointment_id='".$_REQUEST['id']."'";
										  $Esa=mysqli_query($conn,$sa);				
		                                  while($FEsa=mysqli_fetch_array($Esa)) {
											  
											  $row = $FEsa['appointment_id'];
											  
											  $tc="select * from tbl_customer WHERE customer_id='".$FEsa["customer_id"]."'";
											  $Etc=mysqli_query($conn,$tc);
	                                          $FEtc=mysqli_fetch_array($Etc);	
											  										  											  											  											  											  
											  $svn="select vendor_name from tbl_vendor WHERE vendor_id='".$FEsa["vendor_id"]."'";
	                                          $Esvn=mysqli_query($conn,$svn);
	                                          $FEsvn=mysqli_fetch_array($Esvn);																					  											 											 										 
											 
											  $pc="SELECT * FROM `tbl_category` WHERE category_id=".$FEsa["category_id"]."";
											  $Epc=mysqli_query($conn,$pc);
											  $FEpc=mysqli_fetch_array($Epc);
											  
											  $st="SELECT * FROM `tbl_services` WHERE id='".$FEsa['vendor_service_id']."'";
											  $Est=mysqli_query($conn,$st);
											  $FEst=mysqli_fetch_array($Est);

                                              $vs="SELECT * FROM `tbl_vendor_services` WHERE category_id='".$FEsa["category_id"]."' AND service_id='".$FEsa['vendor_service_id']."'";
											  $Evs=mysqli_query($conn,$vs);
											  $FEvs=mysqli_fetch_array($Evs);

                                              $service_order_no  = $FEsa['service_order_no'];
										      $appointment_date  = $FEsa['appointment_date'];
					                          $appointment_time  = $FEsa['appointment_time'];		  
			                                  $cust_name         = $FEtc['f_name'];											 
				                              $vendor_name		 = $FEsvn['vendor_name'];
					                          $category_name	 = $FEpc['category_name'];
			                                  $service_name      = $FEst['service_name'];							                             											         
				                              $amount	         = $FEvs['amount'];
					                          $total             = $FEvs['amount']; 
                                              $service_status    = $FEsa['service_status'];										  
		                                     }       				 			       		 					                    																																																											
										?> 
				        
                                        
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="booked_service.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="service_order_no" id="service_order_no" class="form-control" value="<?php echo $service_order_no; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>" class="form-control" readonly>
                      </div>
                    </div>
				  
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Appointment Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="appointment_date" id="appointment_date" class="form-control" value="<?php echo $appointment_date; ?>" readonly>
                      </div>
                    </div>

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Appointment Time</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="$appointment_time" id="appointment_time" class="form-control" value="<?php echo $appointment_time; ?>" readonly>
                      </div>
                    </div> 

									                     				
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_name; ?>" readonly>
                      </div>
                    </div> 								 					
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control" value="<?php echo $vendor_name; ?>" readonly>
                      </div>
                    </div> 

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vendor_name" id="service_name" class="form-control" value="<?php echo $service_name; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount; ?>" readonly>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="$total" id="$total" class="form-control" value="<?php echo $total; ?>" readonly>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="service_status">
						  <option value="<?php echo $service_status; ?>" selected="true"><?php echo $service_status; ?></option>
                          <option value="Pending">Pending</option>
                          <option value="Assigned">Assigned</option> 
						  <option value="Completed">Completed</option> 
						  <option value="Closed">Closed</option> 
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                       <button class="btn btn-primary" name="form1" type="submit">Save Change Post</button>
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