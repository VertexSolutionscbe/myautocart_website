                                        <?php require_once('header.php'); ?>

                                        <?php
				                          $sa="SELECT * FROM `tbl_invoice_details` WHERE id='".$_REQUEST['id']."'";
										  $Esa=mysqli_query($conn,$sa);				
		                                  while($FEsa=mysqli_fetch_array($Esa)) {											  											 
											  
											  $tc="select * from tbl_customer WHERE customer_id='".$FEsa["customer_id"]."'";
											  $Etc=mysqli_query($conn,$tc);
	                                          $FEtc=mysqli_fetch_array($Etc);	
											  										  											  											  											  											  											  																				  											 											 										 											 
											  $pc="SELECT * FROM `tbl_category` WHERE category_id=".$FEsa["category_id"]."";
											  $Epc=mysqli_query($conn,$pc);
											  $FEpc=mysqli_fetch_array($Epc);											  
											   									  
											  $svn="select vendor_name from tbl_vendor WHERE vendor_id='".$FEsa["vendor_id"]."'";
	                                          $Esvn=mysqli_query($conn,$svn);
	                                          $FEsvn=mysqli_fetch_array($Esvn);												  									
											  											  											  
                                                      $inv_no        = $FEsa['inv_no'];
													  $OrderNo       = $FEsa['OrderNo'];
                                              	  	  $order_date    = $FEsa['order_date'];
													  $f_name        = $FEtc['f_name'];
                                                      $category_name = $FEpc['category_name'];
													  $vendor_name   = $FEsvn['vendor_name'];
													  $grand_total   = $FEsa['grand_total'];
		                                     }       				 			       		 
					                    ?> 
				        
                                        
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="index.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>View The Products Invoice Details</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>
                                        
          <div class="section-body">
            <h2 class="section-title">Products Invoice List</h2>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Invoice Id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="inv_no" id="inv_no" class="form-control" value="<?php echo $inv_no; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="OrderNo" id="OrderNo" class="form-control" value="<?php echo $OrderNo; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="f_name" id="f_name" value="<?php echo $f_name; ?>" class="form-control" readonly>
                      </div>
                    </div>
				  
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="order_date" id="order_date" class="form-control" value="<?php echo $order_date; ?>" readonly>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Grand Total</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="grand_total" id="grand_total" class="form-control" value="<?php echo $grand_total; ?>" readonly>
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