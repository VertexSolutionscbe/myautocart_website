<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	 // if(empty($_POST['product_title'])) {
		// $valid = 0;
		// $error_message .= 'Product title can not be empty<br>';
	// } else {
		// Duplicate Category checking
    	// current Product title that is in the database
    	// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_id=?");
		// $statement->execute(array($_REQUEST['id']));
		// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		// foreach($result as $row) {
			// $current_product_title = $row['product_title'];
		// }

		// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_title=? and product_title!=?");
    	// $statement->execute(array($_POST['product_title'],$current_product_title));
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

	if($_POST['publisher'] == '') {
		$publisher = $_SESSION['user']['full_name'];
	} else {
		$publisher = $_POST['publisher'];	
	}


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

	if($valid == 1) {

		if($_POST['product_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['product_title']);
    		$product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);;
    	} else {
    		$temp_string = strtolower($_POST['product_slug']);
    		$product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}

    	// if slug already exists, then rename it
		// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_slug=? AND product_title!=?");
		// $statement->execute(array($product_slug,$current_product_title));
		// $total = $statement->rowCount();
		// if($total) {
			// $product_slug = $product_slug.'-1';
		// }

		// If previous image not found and user do not want to change the photo
	    if($previous_photo == '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_products SET mrp=?,owners_count=?,kms=?,engine_capacity=?,mileage=?,tranmission=?,fuel_capacity=?,seat_capacity=?,body_type=?,fuel_type=?,exterior_color=?,interior_color=?,year=?,make_model=?,make_brand=?,vendor_id=?,product_title=?, product_slug=?, product_content=?, product_date=?, category_id=?, brand_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=?, title_tag=?, img_alt=?, img_title=? WHERE product_id=?");
	    	$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['engine_capacity'],$_POST['mileage'],$_POST['tranmission'],$_POST['fuel_capacity'],$_POST['seat_capacity'],$_POST['body_type'],$_POST['fuel_type'],$_POST['exterior_color'],$_POST['interior_color'],$_POST['year'],$_POST['make_model'],$_POST['make_brand'],$_POST['vendor_id'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_products SET mrp=?,owners_count=?,kms=?,engine_capacity=?,mileage=?,tranmission=?,fuel_capacity=?,seat_capacity=?,body_type=?,fuel_type=?,exterior_color=?,interior_color=?,year=?,make_model=?,make_brand=?,vendor_id=?,product_title=?, product_slug=?, product_content=?, product_date=?, category_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=?, title_tag=?, img_alt=?, img_title=? WHERE product_id=?");
	    	$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['engine_capacity'],$_POST['mileage'],$_POST['tranmission'],$_POST['fuel_capacity'],$_POST['seat_capacity'],$_POST['body_type'],$_POST['fuel_type'],$_POST['exterior_color'],$_POST['interior_color'],$_POST['year'],$_POST['make_model'],$_POST['make_brand'],$_POST['vendor_id'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }


	    // If previous image not found and user want to change the photo
	    if($previous_photo == '' && $path != '') {

	    	$final_name = 'Product-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_products SET mrp=?,owners_count=?,kms=?,engine_capacity=?,mileage=?,tranmission=?,fuel_capacity=?,seat_capacity=?,body_type=?,fuel_type=?,exterior_color=?,interior_color=?,year=?,make_model=?,make_brand=?,vendor_id=?,product_title=?, product_slug=?, product_content=?, product_date=?, photo=?, category_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=?, title_tag=?, img_alt=?, img_title=? WHERE product_id=?");
	    	$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['engine_capacity'],$_POST['mileage'],$_POST['tranmission'],$_POST['fuel_capacity'],$_POST['seat_capacity'],$_POST['body_type'],$_POST['fuel_type'],$_POST['exterior_color'],$_POST['interior_color'],$_POST['year'],$_POST['make_model'],$_POST['make_brand'],$_POST['vendor_id'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$final_name,$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

	    
	    // If previous image found and user want to change the photo
		if($previous_photo != '' && $path != '') {

	    	unlink('../dist/uploads/'.$previous_photo);

	    	$final_name = 'Product-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_products SET mrp=?,owners_count=?,kms=?,engine_capacity=?,mileage=?,tranmission=?,fuel_capacity=?,seat_capacity=?,body_type=?,fuel_type=?,exterior_color=?, interior_color=?, year=?, make_model=?,make_brand=?,vendor_id=?,product_title=?, product_slug=?, product_content=?, product_date=?, photo=?, category_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=?, title_tag=?, img_alt=?, img_title=? WHERE product_id=?");
	    	$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['engine_capacity'],$_POST['mileage'],$_POST['tranmission'],$_POST['fuel_capacity'],$_POST['seat_capacity'],$_POST['body_type'],$_POST['fuel_type'],$_POST['exterior_color'],$_POST['interior_color'],$_POST['year'],$_POST['make_model'],$_POST['make_brand'],$_POST['vendor_id'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$final_name,$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

	    $success_message = 'Product is updated successfully!';
		 header("location: products.php");
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>
    
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$vendor_id       = $row['vendor_id'];
	$product_title   = $row['product_title'];
	$product_slug    = $row['product_slug'];
	$product_date    = $row['product_date'];
	$photo           = $row['photo'];
	$category_id     = $row['category_id'];	
	$make_brand      = $row['make_brand'];	
	$make_model      = $row['make_model'];	
	$interior_color  = $row['interior_color'];	
	$exterior_color  = $row['exterior_color'];	
    $product_amount  = $row['product_amount'];
	$product_tags    = $row['product_tags'];
    $product_status  = $row['product_status'];
    $body_type       = $row['body_type'];
    $fuel_capacity   = $row['fuel_capacity'];
    $mileage         = $row['mileage'];
    $engine_capacity = $row['engine_capacity'];
    $seat_capacity   = $row['seat_capacity'];
    $year            = $row['year'];
    $kms             = $row['kms'];
    $owners_count    = $row['owners_count'];
    $mrp             = $row['mrp'];
	$title_tag       = $row['title_tag'];
	$img_alt         = $row['img_alt'];
	$img_title       = $row['img_title'];
	$tranmission     = $row['tranmission'];
	$fuel_type       = $row['fuel_type'];
}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="products.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                        <input type="date" name="product_date" id="product_date" value="<?php echo $product_date; ?>" class="datepicker-acc-labels form-control">
                      </div>
                    </div>
					
					              <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_id">
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category WHERE status='Active' ORDER BY category_name ASC");
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_title" id="product_title" value="<?php echo $product_title; ?>" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Slug</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_slug" id="product_slug" value="<?php echo $product_slug; ?>" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_content" id="editor1"><?php echo $product_content; ?></textarea>
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

					<div class="form-group row mb-4" hidden>                                   
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>                             
                      <div class="col-sm-12 col-md-7">
					    <input type="text" name="publisher" value="<?php echo $publisher; ?>"> class="form-control" placeholder="Publisher Name">                                                                                   
                      </div>
					</div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MRP</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mrp" id="mrp" class="form-control" value="<?php echo $mrp; ?>">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Selling Price(Inclusive of Tax)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_amount" value="<?php echo $product_amount; ?>" class="form-control">
                      </div>
                    </div>
					
						<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Tags</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_tags" value="<?php echo $product_tags; ?>" class="form-control">
                      </div>
                    </div>
					
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tax</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_tax" value="<?php echo $product_tax; ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="product_sales">
						  <option> <-- Salect Sales --> </option>
                          <option value="0">Not Saleable</option>
                          <option value="1">Saleable</option>                          
                        </select>
                      </div>
                    </div>
					
							 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="make_brand" id="make_brand">
						    <option value="">Select The Brand</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_make  ORDER BY id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$make_brand){echo 'selected';} ?>><?php echo $row['make']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
								 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Model Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="make_model" id="make_model">
						    <option value="">Select The Model</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_model  ORDER BY id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$make_model){echo 'selected';} ?>><?php echo $row['model']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="year"  id="year">
						    <option value=""> Select The Year </option>
					     <option value="2000" <?php if( $year=="2000") {?>selected<?php } ?>>2000</option>
					     <option value="2001" <?php if( $year=="2001") {?>selected<?php } ?>>2001</option>
					     <option value="2002" <?php if( $year=="2002") {?>selected<?php } ?>>2002</option>
					     <option value="2003" <?php if( $year=="2003") {?>selected<?php } ?>>2003</option>
					     <option value="2004" <?php if( $year=="2004") {?>selected<?php } ?>>2004</option>
					     <option value="2005" <?php if( $year=="2005") {?>selected<?php } ?>>2005</option>
					     <option value="2006" <?php if( $year=="2006") {?>selected<?php } ?>>2006</option>
					     <option value="2007" <?php if( $year=="2007") {?>selected<?php } ?>>2007</option>
					     <option value="2008" <?php if( $year=="2008") {?>selected<?php } ?>>2008</option>
					     <option value="2009" <?php if( $year=="2009") {?>selected<?php } ?>>2009</option>
					     <option value="2010" <?php if( $year=="2010") {?>selected<?php } ?>>2010</option>
					     <option value="2011" <?php if( $year=="2011") {?>selected<?php } ?>>2011</option>
					     <option value="2012" <?php if( $year=="2012") {?>selected<?php } ?>>2012</option>
					     <option value="2013" <?php if( $year=="2013") {?>selected<?php } ?>>2013</option>
					     <option value="2014" <?php if( $year=="2014") {?>selected<?php } ?>>2014</option>
					     <option value="2015" <?php if( $year=="2015") {?>selected<?php } ?>>2015</option>
					     <option value="2016" <?php if( $year=="2016") {?>selected<?php } ?>>2016</option>
					     <option value="2017" <?php if( $year=="2017") {?>selected<?php } ?>>2017</option>
					     <option value="2018" <?php if( $year=="2018") {?>selected<?php } ?>>2018</option>
					     <option value="2019" <?php if( $year=="2019") {?>selected<?php } ?>>2019</option>
					     <option value="2020" <?php if( $year=="2020") {?>selected<?php } ?>>2020</option>
					
                        </select>
                      </div>
                    </div>
				
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Additional Information</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_additional_info"  id="editor1"><?php echo $product_additional_info; ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden> 
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Return Policy</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_return_policy"  id="editor1"><?php echo $product_return_policy; ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Reviews</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_reviews" value="<?php echo $product_reviews; ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interior Color</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="interior_color" id="interior_color">
						    <option value="">Select The Color</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_color  ORDER BY color ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$interior_color){echo 'selected';} ?>><?php echo $row['color']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Exterior Color</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="exterior_color" id="exterior_color">
						    <option value="">Select The Color</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_color  ORDER BY color ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$exterior_color){echo 'selected';} ?>><?php echo $row['color']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fuel Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="fuel_type" id="fuel_type">
						<option value="">Select The Fuel Type</option>
					<option value="Petrol" <?php if( $fuel_type=="petrol") {?>selected<?php } ?>>Petrol</option>
					<option value="Diesel" <?php if( $fuel_type=="diesel") {?>selected<?php } ?>>Diesel</option>
					<option value="LPG" <?php if( $fuel_type=="LPG") {?>selected<?php } ?>>LPG</option>

		
                        </select>
                      </div>
                    </div>
					
					
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="body_type" id="body_type">
						    <option value="">Select The Body Type</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$body_type){echo 'selected';} ?>><?php echo $row['segment']; ?></option>                          
						  <?php } ?>
                        </select> 
                      </div>
                    </div>
					
						<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seating Capacity</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="seat_capacity" id="seat_capacity" class="form-control" value="<?php echo $seat_capacity ?>">
                      </div>
                    </div>
					
						<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fuel tank capacity (Lts)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="fuel_capacity" id="fuel_capacity" value="<?php echo $fuel_capacity ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tranmission</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="tranmission" id="tranmission">
						    <option value="">Select The Type</option>
							<option value="manual" <?php if( $tranmission=="manual") {?>selected<?php } ?>>Manual</option>
							<option value="automatic" <?php if( $tranmission=="automatic") {?>selected<?php } ?>>Automatic</option>
		
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mileage (Kms)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mileage" id="mileage" class="form-control" value="<?php echo $mileage ?>">
                      </div>
                    </div>
					
								<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Engine Capacity (CC)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="engine_capacity" id="engine_capacity" class="form-control" value="<?php echo $engine_capacity ?>">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kilometers Driven</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="kms" id="kms" value="<?php echo $kms; ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owners Count</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="owners_count" id="owners_count" value="<?php echo $owners_count; ?>" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="product_status">
                          <option value="Active">Active</option>
                          <option value="Deactive">Deactivate</option>                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title Tag</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="title_tag" id="title_tag" value="<?php echo $title_tag; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Alt</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_alt" id="img_alt" value="<?php echo $img_alt; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_title" id="img_title" value="<?php echo $img_title; ?>" class="form-control">
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