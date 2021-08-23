<?php require_once('header.php'); ?>

	
<?php
if(isset($_POST['form1'])) {
$valid = 1;
	 
	/* if(empty($_POST['product_content'])) {
		$valid = 0;
		$error_message .= 'Product content can not be empty<br>';
	} */

	// if(empty($_POST['product_date'])) {
		// $valid = 0;
		// $error_message .= 'Product publish date can not be empty<br>';
	// }

	// if(empty($_POST['category_id'])) {
		// $valid = 0;
		// $error_message .= 'You must have to select a category<br>';
	// }
	
	/* if(empty($_POST['brand_id'])) {
		$valid = 0;
		$error_message .= 'You must have to select a brand<br>';
	}  */

	// if($_POST['publisher'] == '') {
		// $publisher = $_SESSION['user']['full_name'];
	// } else {
		// $publisher = $_POST['publisher'];	
	// }
	    
	    // Update temp table		
	    $statement = $pdo->prepare("UPDATE tbl_package_service_temp SET package_name=?,vehicle_segment=?,category=?,service=? WHERE id=?");
	    $statement->execute(array($_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_POST['service_id'],$_REQUEST['id']));
      
  
	    $success_message = 'Package Name updated successfully!'; 
	
}
?>

						
<?php
$statement=$pdo->prepare("SELECT * FROM tbl_package_service_temp WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	
	 $package_no = $row['package_no'];
	 $package_name = $row['package_name'];
	 $category_id  = $row['category'];
	 $service_id   = $row['service'];
	 $vehicle_segment_id = $row['vehicle_segment'];	 
     $vendor_id = $row['vendor_id'];
}
?>		

<?php
// if(!isset($_REQUEST['id'])) {
	// header('location: logout.php');
	// exit;
// } else {
	// //Check the id is valid or not
	// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_id=?");
	// $statement->execute(array($_REQUEST['id']));
	// $total = $statement->rowCount();
	// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
	// if( $total == 0 ) {
		// header('location: logout.php');
		// exit;
	// }
// }
?>  
	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="service_package_add.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Package Temp Edit The Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit The Post</h2>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="package_no" id="package_no" value="<?php echo $package_no; ?>" class="form-control" placeholder="Package No" readonly>
                      </div>
                     </div>	
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="package_name" id="package_name" value="<?php echo $package_name; ?>" class="form-control" placeholder="Package Name">
                      </div>
                     </div>							
							
			   		 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Segment Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vehicle_segment_id" id="vehicle_segment_id">
						    <option value="">-- Select The Vehicle Segment --</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$vehicle_segment_id){echo 'selected';} ?>><?php echo $row['segment']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>	
							
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="category_id" id="category_id">
						 <option value="">-- Select The Category --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category ORDER BY category_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['category_id']; ?>" <?php if($row['category_id']==$category_id){echo 'selected';} ?>><?php echo $row['category_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="service_id" id="service_id">
						 <option value="">-- Select The Service --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_services ORDER BY service_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$service_id){echo 'selected';} ?>><?php echo $row['service_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value="">-- Select The Vendor --</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor  ORDER BY vendor_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['vendor_id']; ?>" <?php if($row['vendor_id']==$vendor_id){echo 'selected';} ?>><?php echo $row['vendor_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>																				

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button  class="btn btn-primary" name="form1" type="submit">Update Package Service</button>
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