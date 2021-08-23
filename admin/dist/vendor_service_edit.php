<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	 // if(empty($_POST['model'])) {
		// $valid = 0;
		// $error_message .= 'model title can not be empty<br>';
	// } else {
		// Duplicate Category checking
    	// current Product title that is in the database
    	// $statement = $pdo->prepare("SELECT * FROM tbl_model WHERE id=?");
		// $statement->execute(array($_REQUEST['id']));
		// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		// foreach($result as $row) {
			// $current_product_title = $row['model'];
		// }

		// $statement = $pdo->prepare("SELECT * FROM tbl_model WHERE model=? and model!=?");
    	// $statement->execute(array($_POST['model'],$current_product_title));
    	// $total = $statement->rowCount();							
    	// if($total) {
    		// $valid = 0;
        	// $error_message .= 'Product title already exists<br>';
    	// }
	// } 

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
           $statement = $pdo->prepare("UPDATE tbl_vendor_services SET vendor_id=?,category_id=?,service_id=?,vehicle_segment_id=?,amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
            $statement = $pdo->prepare("UPDATE tbl_vendor_services SET vendor_id=?,category_id=?,service_id=?,vehicle_segment_id=?,amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }


	    // If previous image not found and user want to change the photo
	    if($previous_photo == '' && $path != '') {

	    	$final_name = 'Service-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

            $statement = $pdo->prepare("UPDATE tbl_vendor_services SET photo=?,vendor_id=?,category_id=?,service_id=?,vehicle_segment_id=?,amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($final_name,$_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

	    
	    // If previous image found and user want to change the photo
		if($previous_photo != '' && $path != '') {

	    	unlink('../dist/uploads/'.$previous_photo);

	    	$final_name = 'Service-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_vendor_services SET photo=?,vendor_id=?,category_id=?,service_id=?,vehicle_segment_id=?,amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($final_name,$_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
    //}
}
	    $success_message = 'Service updated successfully!';
	//}
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
    
    <?php
$statement = $pdo->prepare("SELECT * FROM tbl_vendor_services WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$vendor_id   = $row['vendor_id'];
	$category_id = $row['category_id'];
	$service_id  = $row['service_id'];
	$vehicle_segment_id   = $row['vehicle_segment_id'];
	$amount     = $row['amount'];
	$photo      = $row['photo'];
    
	$title_tag  = $row['title_tag'];
	$img_alt    = $row['img_alt'];
	$img_title  = $row['img_title'];

}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="vendor_service.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
           <!-- <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                            <div class="card-body">
							
							
			   		 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						 <option value="">-- Select Vendor --</option>
						    <?php
						    /*   $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor ORDER BY vendor_id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>
                          <option value="<?php //echo $row['vendor_id']; ?>" <?php //if($row['vendor_id']==$vendor_id){echo 'selected';} ?>><?php //echo $row['vendor_name']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>
							
                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="category_id" id="category_id">
						 <option value="">-- Select The Category --</option>
						    <?php
						      /* $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category ORDER BY category_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>
                          <option value="<?php //echo $row['category_id']; ?>" <?php //if($row['category_id']==$category_id){echo 'selected';} ?>><?php echo $row['category_name']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="service_id" id="service_id">
						 <option value="">-- Select The Service --</option>
						    <?php
						     /*  $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_services ORDER BY service_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>
                          <option value="<?php //echo $row['id']; ?>" <?php //if($row['id']==$service_id){echo 'selected';} ?>><?php //echo $row['service_name']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Segment Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vehicle_segment_id" id="vehicle_segment_id">
						    <option value="">Select The Vehicle Segment </option>
							<?php
						      /* $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>						  
                          <option value="<?php //echo $row['id']; ?>" <?php //if($row['id']==$vehicle_segment_id){echo 'selected';} ?>><?php //echo $row['segment']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="amount" id="amount" class="form-control" value="<?php //echo $amount; ?>" placeholder="Amount">
                      </div>
                    </div>	
					
					 <div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Existing Featured Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				             <?php
				              /* if($photo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/'.$photo.'" class="existing-photo" style="width:200px;">';	
				              } */
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php //echo $photo; ?>">
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
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title Tag</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title_tag" id="title_tag" value="<?php //echo $title_tag; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Alt</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_alt" id="img_alt" value="<?php //echo $img_alt; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_title" id="img_title" value="<?php //echo $img_title; ?>" class="form-control">
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
            </div>
		  </form> -->		  
		  
		  <iframe src="http://13.235.247.42/serviceedit?id=<?php echo $_REQUEST['id']; ?>" width="100%" height="1000px" style="border:none;"> </iframe>
		  
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->