<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;


	if($valid == 1) {		  	


	    	$statement = $pdo->prepare("UPDATE tbl_product_specifications SET product_id=?, spec_1=?, spec_2=?, spec_3=?, spec_4=?, spec_5=?, spec_6=?, spec_7=?, spec_8=?, spec_9=?, spec_10=? WHERE id=?");
	    	$statement->execute(array($_POST['product_id'],$_POST['spec_1'],$_POST['spec_2'],$_POST['spec_3'],$_POST['spec_4'],$_POST['spec_5'],$_POST['spec_6'],$_POST['spec_7'],$_POST['spec_8'],$_POST['spec_9'],$_POST['spec_10'],$_REQUEST['id']));
	    

	    $success_message = 'Product Detail is updated successfully!';
	}
}
?>

<?php
// if(!isset($_REQUEST['id'])) {
	// header('location: logout.php');
	// exit;
// } else {
	/* Check the id is valid or not */
	// $statement = $pdo->prepare("SELECT * FROM tbl_product_details WHERE product_id=?");
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
$statement = $pdo->prepare("SELECT * FROM tbl_product_specifications WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$product_id   = $row['product_id'];	
	$spec_1           = $row['spec_1'];
	$spec_2           = $row['spec_2'];
	$spec_3           = $row['spec_3'];
	$spec_4           = $row['spec_4'];
	$spec_5           = $row['spec_5'];
	$spec_6           = $row['spec_6'];
	$spec_7           = $row['spec_7'];
	$spec_8           = $row['spec_8'];
	$spec_9           = $row['spec_9'];
	$spec_10          = $row['spec_10'];


}
?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="product_specification.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Update Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Update Post</h2>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Title</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="product_id">
						    <option value="">--- Select product title ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_status='Active' ORDER BY product_id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['product_id']; ?>" <?php if($row['product_id']==$product_id){echo 'selected';} ?>><?php echo $row['product_title']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>				  
					
				            					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 1 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_1" id="spec_1" value="<?php echo $spec_1; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 2 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_2" id="spec_2" value="<?php echo $spec_2; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 3 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_3" id="spec_3" value="<?php echo $spec_3; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 4 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_4" id="spec_4" value="<?php echo $spec_4; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 5 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_5" id="spec_5" value="<?php echo $spec_5; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 6 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_6" id="spec_6" value="<?php echo $spec_6; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 7 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_7" id="spec_7" value="<?php echo $spec_7; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 8 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_8" id="spec_8" value="<?php echo $spec_8; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 9 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_9" id="spec_9" value="<?php echo $spec_9; ?>" class="form-control"></input>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 10 </label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spec_10" id="spec_10" value="<?php echo $spec_10; ?>" class="form-control"></input>
                      </div>
                    </div>        
					
                  
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="form1" type="submit">Update Post</button>
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