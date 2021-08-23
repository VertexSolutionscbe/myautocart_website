<?php require_once('header.php'); ?>

     
	<?php
    if(isset($_POST['form1'])) {
		
		 $FY="SELECT * FROM `financial_year` WHERE financial_year";
		 $EFY=mysqli_query($conn,$FY);
		 $FEFY=mysqli_fetch_array($EFY); 
		 
		 $_SESSION['financial_year'] = $FEFY['financial_year'];		
	      
		 // if($_SESSION['Completed'] == 0 ) {
			 
		 // Update Sales and Profit Chart Datas
		 $q1="SELECT sum(amount) AS Jan FROM `tbl_confirm_orders` WHERE order_date between '2020-01-01' and '2020-01-31' Order by id ASC";
		 $Eq1=mysqli_query($conn,$q1);
		 $FEq1=mysqli_fetch_array($Eq1);		 
		 $January_total=$FEq1['Jan'];
		 
		 $ch1="UPDATE chart_data_column SET sale='".$January_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='1' AND month='Jan'";
		 $Ech1=mysqli_query($conn,$ch1);
		 
		 $q2="SELECT sum(amount) AS Feb FROM `tbl_confirm_orders` WHERE order_date between '2020-02-01' and '2020-02-29' Order by id ASC";
		 $Eq2=mysqli_query($conn,$q2);
		 $FEq2=mysqli_fetch_array($Eq2);		 
		 $February_total=$FEq2['Feb'];
		 
		 $ch2="UPDATE chart_data_column SET sale='".$February_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='2' AND month='Feb'";
		 $Ech2=mysqli_query($conn,$ch2);
		 
		 $q3="SELECT sum(amount) AS March FROM `tbl_confirm_orders` WHERE order_date between '2020-03-01' and '2020-03-31' Order by id ASC";
		 $Eq3=mysqli_query($conn,$q3);
		 $FEq3=mysqli_fetch_array($Eq3);		 
		 $March_total=$FEq3['March'];
		 
		 $ch3="UPDATE chart_data_column SET sale='".$March_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='3' AND month='March'";
		 $Ech3=mysqli_query($conn,$ch3);
		 
	     $q4="SELECT sum(amount) AS April FROM `tbl_confirm_orders` WHERE order_date between '2020-04-01' and '2020-04-30' Order by id ASC";
		 $Eq4=mysqli_query($conn,$q4);
		 $FEq4=mysqli_fetch_array($Eq4);		 
		 $April_total=$FEq4['April'];
		 
		 $ch4="UPDATE chart_data_column SET sale='".$April_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='4' AND month='April'";
		 $Ech4=mysqli_query($conn,$ch4);
		 
		 $q5="SELECT sum(amount) AS May FROM `tbl_confirm_orders` WHERE order_date between '2020-05-01' and '2020-05-31' Order by id ASC";
		 $Eq5=mysqli_query($conn,$q5);
		 $FEq5=mysqli_fetch_array($Eq5);		 
		 $May_total=$FEq5['May'];
		 
		 $ch5="UPDATE chart_data_column SET sale='".$May_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='5' AND month='May'";
		 $Ech5=mysqli_query($conn,$ch5);
		 
		 $q6="SELECT sum(amount) AS June FROM `tbl_confirm_orders` WHERE order_date between '2020-06-01' and '2020-06-30' Order by id ASC";
		 $Eq6=mysqli_query($conn,$q6);
		 $FEq6=mysqli_fetch_array($Eq6);		 
		 $June_total=$FEq6['June'];
		 
		 $ch6="UPDATE chart_data_column SET sale='".$June_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='6' AND month='June'";
		 $Ech6=mysqli_query($conn,$ch6);
		 
		 $q7="SELECT sum(amount) AS July FROM `tbl_confirm_orders` WHERE order_date between '2020-07-01' and '2020-07-31' Order by id ASC";
		 $Eq7=mysqli_query($conn,$q7);
		 $FEq7=mysqli_fetch_array($Eq7);		 
		 $July_total=$FEq7['July'];
		 
		 $ch7="UPDATE chart_data_column SET sale='".$July_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='7' AND month='July'";
		 $Ech7=mysqli_query($conn,$ch7);
		 
		 $q8="SELECT sum(amount) AS Aug FROM `tbl_confirm_orders` WHERE order_date between '2020-08-01' and '2020-08-31' Order by id ASC";
		 $Eq8=mysqli_query($conn,$q8);
		 $FEq8=mysqli_fetch_array($Eq8);		 
		 $August_total=$FEq8['Aug'];
		 
		 $ch8="UPDATE chart_data_column SET sale='".$August_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='8' AND month='Aug'";
		 $Ech8=mysqli_query($conn,$ch8);
		 
		 $q9="SELECT sum(amount) AS Sep FROM `tbl_confirm_orders` WHERE order_date between '2020-09-01' and '2020-09-30' Order by id ASC";
		 $Eq9=mysqli_query($conn,$q9);
		 $FEq9=mysqli_fetch_array($Eq9);		 
		 $Sep_total=$FEq9['Sep'];
		 
		 $ch9="UPDATE chart_data_column SET sale='".$Sep_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='9' AND month='Sep'";
		 $Ech9=mysqli_query($conn,$ch9);
		 
		 $q10="SELECT sum(amount) AS Oct FROM `tbl_confirm_orders` WHERE order_date between '2020-10-01' and '2020-10-31' Order by id ASC";
		 $Eq10=mysqli_query($conn,$q10);
		 $FEq10=mysqli_fetch_array($Eq10);		 
		 $Oct_total=$FEq10['Oct'];
		 
		 $ch10="UPDATE chart_data_column SET sale='".$Oct_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='10' AND month='Oct'";
		 $Ech10=mysqli_query($conn,$ch10);
		 
		 $q11="SELECT sum(amount) AS Nov FROM `tbl_confirm_orders` WHERE order_date between '2020-11-01' and '2020-11-30' Order by id ASC";
		 $Eq11=mysqli_query($conn,$q11);
		 $FEq11=mysqli_fetch_array($Eq11);		 
		 $Nov_total=$FEq11['Nov'];
		 
		 $ch11="UPDATE chart_data_column SET sale='".$Nov_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='11' AND month='Nov'";
		 $Ech11=mysqli_query($conn,$ch11);
		 
		 $q12="SELECT sum(amount) AS December FROM `tbl_confirm_orders` WHERE order_date between '2020-12-01' and '2020-12-31' Order by id ASC";
		 $Eq12=mysqli_query($conn,$q12);
		 $FEq12=mysqli_fetch_array($Eq12);		 
		 $Dec_total=$FEq12['December'];		 
	 
		 $ch12="UPDATE chart_data_column SET sale='".$Dec_total."',financial_year='".$_SESSION['financial_year']."' WHERE id='12' AND month='Dece'";
		 $Ech12=mysqli_query($conn,$ch12);

		 //}else{
 	        
		 // updating into the database status			        
	     $ups = "UPDATE tbl_confirm_orders SET financial_year='".$_SESSION['financial_year']."',status='".$_POST['status']."' WHERE id='".$_REQUEST['id']."'";
		 $Eups = mysqli_query($conn,$ups);
        

    	 $success_message = 'Category is updated successfully.';
		 //}
    }
    ?>
	 
	 
	 
	 
    
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
			
			         $order_date		   = $FEli['order_date'];
				     $order_no		       = $FEli['OrderNo'];
			         $cust_name            = $FEcus['f_name'];
				     $e_mail               = $FEcus['email'];
	                 $mobile_no            = $FEcus['mobile'];					           
				     $vendor_name		   = $FEtbv['vendor_name'];
			         $vendor_product_id    = $FEli['vendor_product_id'];
			         $category_name	       = $FEcat['category_name'];
			         $product_title	       = $FEpro['product_title'];
				     $qty	               = $FEli['qty'];
				     $amount	           = $FEli['amount'];
				     $billing_address_id   = $FEli['billing_address_id'];
				     $delivery_address_id  = $FEli['delivery_address_id'];
				     $payment_mode		   = $FEli['payment_mode'];
				     $payment_id		   = $FEli['payment_id'];
				     $photo                = $FEpro['photo'];
					 $status         	   = $FEli['status'];						
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
            <h2 class="section-title">Edit Order List</h2>
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
				              } else {
				              echo '<img src="../dist/uploads/'.$photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php echo $photo; ?>">
				            </div>
				        </div>    
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
						  <option value="<?php echo $status; ?>" selected="true"><?php echo $status; ?></option>
                          <option value="Pending">Pending</option>
                          <option value="Shipping">Shipping</option> 
						  <option value="Completed">Completed</option> 
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