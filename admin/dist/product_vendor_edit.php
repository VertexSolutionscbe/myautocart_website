<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {

	 $statement = $pdo->prepare("UPDATE tbl_vendor_products SET VendorStatus=?, vendor_id=?, product_id=?, product_amount=?,product_color=? WHERE id=?");
	 $statement->execute(array($_POST['status'],$_POST['vendor_id'],$_POST['product_id'],$_POST['product_amount'],$_POST['product_color'],$_REQUEST['id']));	   

	 $success_message = 'Product Vendor is updated successfully!';
	
  }
?>
    
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_vendor_products WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$vendor_id      = $row['vendor_id'];
	$product_id     = $row['product_id'];
	$product_amount = $row['product_amount'];
	$product_color  = $row['product_color'];
 }
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="product_vendor.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit The Post</h1>
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
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="vendor_id">
						 <option value="">-- Select Vendor --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor ORDER BY vendor_id ASC");
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="product_id">
						 <option value="">-- Select Product --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_products ORDER BY product_id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['product_id']; ?>" <?php if($row['product_id']==$product_id){echo 'selected';}?>><?php echo $row['product_title']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div> 
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_amount" id="product_amount" value="<?php echo $product_amount; ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Color</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_color" id="product_color" value="<?php echo $product_color; ?>" class="form-control">
                      </div>
                    </div>
					
								<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
                          <option value="Active">Active</option>
                          <option value="Deactive">Deactivate</option>                          
                        </select>
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
		  </form>
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->