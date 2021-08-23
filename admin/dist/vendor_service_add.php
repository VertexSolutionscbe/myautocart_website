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
	
	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];
	
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
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_vendor_services'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}		    				
	    
 if($path=='') {
	    // When no photo will be selected
		$statement = $pdo->prepare("INSERT INTO tbl_vendor_services (photo,vendor_id,category_id,service_id,vehicle_segment_id,amount,title_tag,img_alt,img_title) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->execute(array('',$_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title']));	
	    } else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'Service-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );
		 
        $statement = $pdo->prepare("INSERT INTO tbl_vendor_services (photo,vendor_id,category_id,service_id,vehicle_segment_id,amount,title_tag,img_alt,img_title) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($final_name,$_POST['vendor_id'],$_POST['category_id'],$_POST['service_id'],$_POST['vehicle_segment_id'],$_POST['amount'],$_POST['title_tag'],$_POST['title_tag'],$_POST['img_title']));		
		}
	}
		$success_message = 'Vendor Service is added successfully.';      	     	   
	   }
		 

	   
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="vendor_service.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
				  
                <!--  <div class="card-body">				  
				   	<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value=""> Select The Vendor </option>
							<?php
						      /* $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor  ORDER BY vendor_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>						  
                          <option value="<?php //echo $row['vendor_id']; ?>"><?php //echo $row['vendor_name']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>	

                 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_id" id="category_id">
						    <option value=""> Select The Category</option>
							<?php
						    /*   $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category  ORDER BY category_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>						  
                          <option value="<?php //echo $row['category_id']; ?>"><?php //echo $row['category_name']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>					
                    
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="service_id" id="service_id">
						    <option value="">Select The Service </option>
							<?php
						     /*  $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_services  ORDER BY id desc");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>						  
                          <option value="<?php //echo $row['id']; ?>"><?php //echo $row['service_name']; ?></option>                          
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
						     /*  $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) { */
						    ?>						  
                          <option value="<?php //echo $row['id']; ?>"><?php //echo $row['segment']; ?></option>                          
						  <?php //} ?>
                        </select>
                      </div>
                    </div>				
					
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
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
                        <input type="text" name="title_tag" id="title_tag" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Alt</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_alt" id="img_alt" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_title" id="img_title" class="form-control">
                      </div>
                    </div>					
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="form1" type="submit">Create Post</button>
                      </div>
                    </div>
                  </div> -->
				  
				  <iframe src="http://13.235.247.42/ServiceAdd" width="100%" height="2000px" style="border:none;"> </iframe>
				  
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