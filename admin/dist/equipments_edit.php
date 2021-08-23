<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;




	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    $previous_photo = $_POST['previous_photo'];

	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }



		// If previous image not found and user do not want to change the photo
	    if($previous_photo == '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_equipments SET vendor_id=?,category_id=?,date=?,equipment_name=?,equipment_amount=? WHERE id=?");
	    	$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['id']));
	  
	    	$statement = $pdo->prepare("UPDATE tbl_products SET category_id=?,product_date=?,product_title=?,product_amount=? WHERE product_id=?");
	    	$statement->execute(array($_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['pid']));
	  }

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_equipments SET vendor_id=?,category_id=?,date=?,equipment_name=?,equipment_amount=? WHERE id=?");
	    	$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['id']));	  

	    	$statement = $pdo->prepare("UPDATE tbl_products SET category_id=?,product_date=?,product_title=?,product_amount=? WHERE product_id=?");
	    	$statement->execute(array($_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['pid']));
	  

			}


	    // If previous image not found and user want to change the photo
	    if($previous_photo == '' && $path != '') {

	    	$final_name = 'Equipment-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_equipments SET photo=?,vendor_id=?,category_id=?,date=?,equipment_name=?,equipment_amount=? WHERE id=?");
	    	$statement->execute(array($final_name,$_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['id']));	


	    	$statement = $pdo->prepare("UPDATE tbl_products SET photo=?,category_id=?,product_date=?,product_title=?,product_amount=? WHERE product_id=?");
	    	$statement->execute(array($final_name,$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['pid']));
			}

	  
	    // If previous image found and user want to change the photo
		if($previous_photo != '' && $path != '') {

	    	unlink('../dist/uploads/'.$previous_photo);

	    	$final_name = 'Equipment-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_equipments SET photo=?,vendor_id=?,category_id=?,date=?,equipment_name=?,equipment_amount=? WHERE id=?");
	    	$statement->execute(array($final_name,$_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['id']));	 

    	$statement = $pdo->prepare("UPDATE tbl_products SET photo=?,category_id=?,product_date=?,product_title=?,product_amount=? WHERE product_id=?");
	    	$statement->execute(array($final_name,$_POST['category_id'],$_POST['date'],$_POST['equipment_name'],$_POST['equipment_amount'],$_REQUEST['pid']));
	
			}

	
	    $success_message = 'Equipment updated successfully!';
	}

?>

<?php
// if(!isset($_REQUEST['id'])) {
	// header('location: logout.php');
	// exit;
// } else {
	// Check the id is valid or not
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
    
    <?php
$statement = $pdo->prepare("SELECT * FROM tbl_equipments WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$vendor_id   = $row['vendor_id'];
	$equipment_name   = $row['equipment_name'];
	$equipment_amount    = $row['equipment_amount'];
	$date    = $row['date'];
	$photo           = $row['photo'];
	$category_id     = $row['category_id'];	
	$specification     = $row['specification'];	
	
}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="equipments.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
				  
				  				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Id</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value="">Select the vendor</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor order by  vendor_name asc");
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="date" id="date" value="<?php echo $date; ?>" class="datepicker-acc-labels form-control">
                      </div>
                    </div>
					
					              <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_id" readonly>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category ");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>                          
                          <option value="<?php echo $row['category_id']; ?>" <?php if($row['category_id']==$category_id){echo 'selected';} ?>><?php echo $row['category_name']; ?></option>
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Equipment Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="equipment_name" id="equipment_name" value="<?php echo $equipment_name; ?>" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Equipment Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="equipment_amount" id="equipment_amount" value="<?php echo $equipment_amount; ?>" class="form-control">
                      </div>
                    </div>
			
				   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="specification" id="specification" value="<?php echo $specification; ?>" class="form-control">
                      </div>
                    </div>
      
                    <div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Existing Featured Photo</label>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured Thumbnail</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="photo" id="image-upload" />
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
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->