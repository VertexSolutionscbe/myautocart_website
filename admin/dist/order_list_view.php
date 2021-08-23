<?php require_once('header.php'); ?>
    
        <?php
        $li ="SELECT * FROM tbl_confirm_orders WHERE id='".$_REQUEST['id']."' ORDER BY id desc";
        $Eli=mysqli_query($conn,$li);
        while($FEli=mysqli_fetch_array($Eli)) {						
        
		    $cus="SELECT * FROM `tbl_customer` WHERE customer_id='".$FEli['customer_id']."'";
		    $Ecus=mysqli_query($conn,$cus);
            $FEcus=mysqli_fetch_array($Ecus);
			
			    $pro="SELECT * FROM `tbl_products` WHERE product_id='".$FEli['product_id']."'";
				$Epro=mysqli_query($conn,$pro);
                $FEpro=mysqli_fetch_array($Epro);
				
				   $tbv="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$FEli['vendor_id']."'";
				   $Etbv=mysqli_query($conn,$tbv);
				   $FEtbv=mysqli_fetch_array($Etbv);				   
				
				   $cat="SELECT * FROM `tbl_category` WHERE category_id='".$FEpro['category_id']."'";
				   $Ecat=mysqli_query($conn,$cat);
                   $FEcat=mysqli_fetch_array($Ecat);
			
			         $order_date		 = $FEli['order_date'];
				     $order_no		     = $FEli['OrderNo'];
			         $cust_name          = $FEcus['f_name'];
				     $e_mail             = $FEcus['email'];
	                 $mobile_no          = $FEcus['mobile'];					           
				     $vendor_name		 = $FEtbv['vendor_name'];
			         $vendor_product_id  = $FEli['vendor_product_id'];
			         $category_name	     = $FEcat['category_name'];
			         $product_title	     = $FEpro['product_title'];
				     $qty	             = $FEli['qty'];
				     $amount	         = $FEli['amount'];
				     $billing_address_id = $FEli['billing_address_id'];
				     $delivery_address_id= $FEli['delivery_address_id'];
				     $payment_mode		 = $FEli['payment_mode'];
				     $payment_id		 = $FEli['payment_id'];
				     $photo              = $FEpro['photo'];
					           							
		             }
        
		?>
	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="order_list.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>View The Order List</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Order List</h2>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="order_date" id="" class="form-control" value="<?php echo $order_date; ?>" readonly>
                      </div>
                    </div> 

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="order_no" id="" class="form-control" value="<?php echo $order_no; ?>" readonly>
                      </div>
                    </div> 
				  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cust_name" id="cust_name" value="<?php echo $cust_name; ?>" class="form-control" readonly>
                      </div>
                    </div>

					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="e_mail" id="e_mail" class="form-control" value="<?php echo $e_mail; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile Number</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>" readonly>
                      </div>
                    </div>    								 					
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control" value="<?php echo $vendor_name; ?>" readonly>
                      </div>
                    </div> 		
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_name; ?>" readonly>
                      </div>
                    </div> 	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title; ?>" readonly>
                      </div>
                    </div> 	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">qty</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="qty" id="qty" class="form-control" value="<?php echo $qty; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount; ?>" readonly>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">billing_address_id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="billing_address_id" id="billing_address_id" class="form-control" value="<?php echo $billing_address_id; ?>" readonly>
                      </div>
                    </div> 		
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">delivery_address_id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="delivery_address_id" id="delivery_address_id" class="form-control" value="<?php echo $delivery_address_id; ?>" readonly>
                      </div>
                    </div> 
					
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">payment_mode</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="payment_mode" id="payment_mode" class="form-control" value="<?php echo $payment_mode; ?>" readonly>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">payment_id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="payment_id" id="payment_id" class="form-control" value="<?php echo $payment_id; ?>" readonly>
                      </div>
                    </div>
      
                    <div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				             <?php														         
							 if($photo == '') {
				              echo 'No photo found';
				              }else {
				              echo '<img src="../dist/uploads/'.$photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php echo $photo; ?>">
				            </div>
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