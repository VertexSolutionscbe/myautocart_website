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


	// $path = $_FILES['photo']['name'];
    // $path_tmp = $_FILES['photo']['tmp_name'];

    // $previous_photo = $_POST['previous_photo'];

	// if($path!='') {
        // $ext = pathinfo( $path, PATHINFO_EXTENSION );
        // $file_name = basename( $path, '.' . $ext );
        // if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            // $valid = 0;
            // $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        // }
    // }

	// if($valid == 1) {

		// if($_POST['product_slug'] == '') {
    		////generate slug
    		// $temp_string = strtolower($_POST['product_title']);
    		// $product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);;
    	// } else {
    		// $temp_string = strtolower($_POST['product_slug']);
    		// $product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	// }

    	// if slug already exists, then rename it
		// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_slug=? AND product_title!=?");
		// $statement->execute(array($product_slug,$current_product_title));
		// $total = $statement->rowCount();
		// if($total) {
			// $product_slug = $product_slug.'-1';
		// }

		// If previous image not found and user do not want to change the photo
	    // if($previous_photo == '' && $path == '') {
	    	// $statement = $pdo->prepare("UPDATE tbl_products SET product_title=?, product_slug=?, product_content=?, product_date=?, category_id=?, brand_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=? WHERE product_id=?");
	    	// $statement->execute(array($_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_REQUEST['id']));
	    // }

		// If previous image found and user do not want to change the photo
	    // if($previous_photo != '' && $path == '') {
	    	// $statement = $pdo->prepare("UPDATE tbl_products SET product_title=?, product_slug=?, product_content=?, product_date=?, category_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=? WHERE product_id=?");
	    	// $statement->execute(array($_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_REQUEST['id']));
	    // }


	    // If previous image not found and user want to change the photo
	    // if($previous_photo == '' && $path != '') {

	    	// $final_name = 'Product-'.$_REQUEST['id'].'.'.$ext;
            // move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	// $statement = $pdo->prepare("UPDATE tbl_products SET product_title=?, product_slug=?, product_content=?, product_date=?, photo=?, category_id=?, publisher=?, product_amount=?, product_tax=?, product_sales=?, product_tags=?, product_additional_info=?, product_return_policy=?, product_reviews=?, product_status=? WHERE product_id=?");
	    	// $statement->execute(array($_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$final_name,$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_REQUEST['id']));
	    // }

	    
	    // If previous image found and user want to change the photo
		// if($previous_photo != '' && $path != '') {

	    	// unlink('../dist/uploads/'.$previous_photo);

	    	// $final_name = 'Product-'.$_REQUEST['id'].'.'.$ext;
            // move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_version SET make_id=?,model_id=?,version=? WHERE id=?");
	    	$statement->execute(array($_POST['make_id'],$_POST['model_id'],$_POST['version'],$_REQUEST['id']));
	    //}

	    $success_message = 'Version is updated successfully!';
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
$statement = $pdo->prepare("SELECT * FROM tbl_version WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$model_id   = $row['model_id'];
	$make_id   = $row['make_id'];
	$version   = $row['version'];


}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="version.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                            <div class="card-body">
							
							
			   		<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="make_id" id="make_id">
						    <option value="">--- Select The Brand ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_make  ORDER BY id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"  <?php if($row['id']==$make_id){echo 'selected';} ?>> <?php echo $row['make']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>	
							
                    		<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Model Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="model_id" id="model_id">
						    <option value="">--- Select The Model ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_model  ORDER BY id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"  <?php if($row['id']==$model_id){echo 'selected';} ?>> <?php echo $row['model']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>	
					
					
					  <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Version Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="version" id="version" class="form-control" value="<?php echo $version ?>">
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
		  </form>
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->