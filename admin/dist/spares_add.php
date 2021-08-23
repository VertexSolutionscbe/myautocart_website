      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;


	
	
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
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_spares'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
	
 
	    
	    if($path=='') {
	    // When no photo will be selected
		$statement = $pdo->prepare("INSERT INTO tbl_spares (vendor_id,category_id,date,spare_name,spare_amount,photo) VALUES (?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['spare_name'],$_POST['spare_amount'],''));

		$statement = $pdo->prepare("INSERT INTO tbl_products (vendor_id,category_id,product_date,product_title,product_amount,photo,product_status) VALUES (?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['spare_name'],$_POST['spare_amount'],'','Active'));

		
	    } else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'Spare-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );
		 
		$statement = $pdo->prepare("INSERT INTO tbl_spares (vendor_id,category_id,date,spare_name,spare_amount,photo) VALUES (?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['spare_name'],$_POST['spare_amount'],$final_name));	
	
		$statement = $pdo->prepare("INSERT INTO tbl_products (vendor_id,category_id,product_date,product_title,product_amount,photo,product_status) VALUES (?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['vendor_id'],$_POST['category_id'],$_POST['date'],$_POST['spare_name'],$_POST['spare_amount'],$final_name,'Active'));

	}
    	$success_message = 'Spare added successfully.';
       
	   header("location: spares_add.php");
	   }
	 }    
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              
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
			<a href="spares.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
				  
                  <!-- <div class="card-body">				  					
					
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor </label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value="">--- Select The Vendor ---</option>
							<?php
						     /*  $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor order by  vendor_name asc");
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="date" id="date" class="datepicker-acc-labels form-control">
                      </div>
                    </div>
				  
				   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_id" readonly>
						    <?php
						      /* $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category ");
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Spare Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spare_name" id="spare_name" class="form-control">
                      </div>
                    </div>
		
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Spare Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="spare_amount" id="spare_amount" class="form-control">
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


                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary"   name="form1" type="submit" >Create Post</button>
                      </div>
                    </div>
                  </div> -->
				  
				   <iframe src="http://13.235.247.42/SparesAdd" width="100%" height="2000px" style="border:none;"> </iframe>
				  
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