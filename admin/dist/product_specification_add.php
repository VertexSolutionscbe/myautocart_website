      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

	if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_product_specifications'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}		    				

		$statement = $pdo->prepare("INSERT INTO tbl_product_specifications (product_id,spec_1,spec_2,spec_3,spec_4,spec_5,spec_6,spec_7,spec_8,spec_9,spec_10) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['product_id'],$_POST['spec_1'],$_POST['spec_2'],$_POST['spec_3'],$_POST['spec_4'],$_POST['spec_5'],$_POST['spec_6'],$_POST['spec_7'],$_POST['spec_8'],$_POST['spec_9'],$_POST['spec_10']));
		
    	$success_message = 'Product is added successfully.';      	   
	   }
	   
	   header("location: product_specification.php");

	 }    
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="product_specification.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                          <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>																				        					
                    
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 1 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_1" id="spec_1" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 2 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_2" id="spec_2" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 3 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_3" id="spec_3" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 4 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_4" id="spec_4" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 5 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_5" id="spec_5" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 6 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_6" id="spec_6" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 7 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_7" id="spec_7" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 8 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_8" id="spec_8" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 9 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_9" id="spec_9" class="form-control"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specification 10 </label>
                      <div class="col-sm-12 col-md-7">
                        <textarea type="text" name="spec_10" id="spec_10" class="form-control"></textarea>
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
          </div>
        </section>
      </div>
      
	  <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->