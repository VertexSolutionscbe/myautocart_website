      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
    <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

   /*  if(empty($_POST['product_title'])) {
        $valid = 0;
        $error_message .= "Product Name can not be empty<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_product_details WHERE product_title=?");
    	$statement->execute(array($_POST['product_title']));
    	$total = $statement->rowCount();
    	if($total)
    	{
    		$valid = 0;
        	$error_message .= "Product Name already exists<br>";
    	}
    } 		 */	
	
	if(empty($_POST['product_date'])) {
		$valid = 0;
		$error_message .= 'Product publish date can not be empty<br>';
	}
	
	if($_POST['publisher'] == '') {
		$publisher = $_SESSION['user']['full_name'];
	} else {
		$publisher = $_POST['publisher'];	
	}
	
	
	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];
	
	$path = $_FILES['photo_1']['name'];
    $path_tmp_1 = $_FILES['photo_1']['tmp_name'];
	
	$path = $_FILES['photo_2']['name'];
    $path_tmp_2 = $_FILES['photo_2']['tmp_name'];
	
	$path = $_FILES['photo_3']['name'];
    $path_tmp_3 = $_FILES['photo_3']['tmp_name'];
	
	$path = $_FILES['photo_4']['name'];
    $path_tmp_4 = $_FILES['photo_4']['tmp_name'];
	
	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
	
	if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_product_details'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}		    				
	    
	    if($path=='') {
	    // When no photo will be selected
		$statement = $pdo->prepare("INSERT INTO tbl_product_details (product_title,product_date,photo,photo_1,photo_2,photo_3,photo_4,publisher,product_status) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['product_title'],$_POST['product_date'],'','','','','',$_POST['product_status']));	
	    } else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'Product_detail_image-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );
		
		$final_name_1 = 'Product_det_img-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp_1, '../dist/uploads/'.$final_name_1 );
		
		$final_name_2 = 'Pro_det_img-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp_2, '../dist/uploads/'.$final_name_2 );
		
		$final_name_3 = 'Pro_detsub_img-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp_3, '../dist/uploads/'.$final_name_3 );
		
		$final_name_4 = 'Pro_sub_img-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp_4, '../dist/uploads/'.$final_name_4 );
		 
		$statement = $pdo->prepare("INSERT INTO tbl_product_details (product_title,product_date,photo,photo_1,photo_2,photo_3,photo_4,publisher,product_status) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['product_title'],$_POST['product_date'],$final_name,$final_name_1,$final_name_2,$final_name_3,$final_name_4,$publisher,$_POST['product_status']));
		}
    	$success_message = 'Product is added successfully.';      	   
	   }
	   
	   header("location: product_detailing.php");

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
					    <label>Choose One</label>
                        <select class="form-control selectric" name="product_title">
						    <option value="">--- Open this select product title ---</option>
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
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Browser Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                          <label for="customFile" class="custom-file-label">Choose File</label>
                          <input type="file" class="custom-file-input" name="photo" id="image-upload"/>
                        </div>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">					
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Browser Image-1</label>
					    <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo_1" id="customFile"/>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
						</div>
					</div>
					
					<div class="form-group row mb-4">					
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Browser Image-2</label>
					    <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo_2" id="customFile"/>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
						</div>
					</div>
					
					<div class="form-group row mb-4">					
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Browser Image-3</label>
					    <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo_3" id="customFile"/>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
						</div>
					</div>
					
					<div class="form-group row mb-4">					
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Browser Image-4</label>
					    <div class="col-sm-12 col-md-7">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo_4" id="customFile"/>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
						</div>
					</div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="product_date" id="product_date" value="<?php echo date("Y-m-d"); ?>" class="datepicker-acc-labels form-control">
                      </div>
                    </div>		

					<div class="form-group row mb-4" hidden>                                   
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>                             
                      <div class="col-sm-12 col-md-7">
					    <input type="text" name="publisher" class="form-control" placeholder="Publisher Name">                                                                                   
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