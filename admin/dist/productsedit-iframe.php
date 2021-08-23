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
			
			<!-- <iframe src="http://13.235.247.42/productedit?id=<?php //echo $_REQUEST['id']; ?>" width="100%" height="2000px" style="border:none;"> </iframe>  -->
            
			 <iframe src="http://admin.myautocart.com/productedit?id=<?php echo $_REQUEST['id']; ?>" width="100%" height="2000px" style="border:none;"> </iframe>
			
		    <!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->