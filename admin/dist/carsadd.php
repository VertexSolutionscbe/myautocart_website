      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

    if(empty($_POST['car_title'])) {
        $valid = 0;
        $error_message .= "Car Name can not be empty<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM tbl_cars WHERE car_title=?");
    	$statement->execute(array($_POST['car_title']));
    	$total = $statement->rowCount();
    	if($total)
    	{
    		$valid = 0;
        	$error_message .= "Car Name already exists<br>";
    	}
    } 
	
	if(empty($_POST['car_content'])) {
		$valid = 0;
		$error_message .= 'Car content can not be empty<br>';
	}		
	
	if(empty($_POST['car_date'])) {
		$valid = 0;
		$error_message .= 'Car publish date can not be empty<br>';
	}
	
	if($_POST['publisher'] == '') {
		$publisher = $_SESSION['user']['full_name'];
	} else {
		$publisher = $_POST['publisher'];	
	}
	
	
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
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_cars'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
	
	    if($_POST['car_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['car_title']);
    		$car_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	} else {
    		$temp_string = strtolower($_POST['car_slug']);
    		$car_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}
		
		// if slug already exists, then rename it
		$statement = $pdo->prepare("SELECT * FROM tbl_cars WHERE car_slug=?");
		$statement->execute(array($car_slug));
		$total = $statement->rowCount();
		if($total) {
			$car_slug = $car_slug.'-1';
		}  
	    
	    if($path=='') {
	    // When no photo will be selected
		$statement = $pdo->prepare("INSERT INTO tbl_cars (car_title,car_slug,car_content,car_date,photo,category_id,publisher) VALUES (?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['car_title'],$car_slug,$_POST['car_content'],$_POST['car_date'],'',$_POST['category_id'],$publisher));	
	    } else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'car-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );
		 
		$statement = $pdo->prepare("INSERT INTO tbl_cars (car_title,car_slug,car_content,car_date,photo,category_id,publisher) VALUES (?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['car_title'],$car_slug,$_POST['car_content'],$_POST['car_date'],$final_name,$_POST['category_id'],$publisher));
		}
    	$success_message = 'Car is added successfully.';
       
	   
	   }
	 }    
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="cars.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
            <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Car Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="car_title" id="car_title" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Car Slug</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="car_slug" id="car_slug" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="car_content" id="editor1"></textarea>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="car_date" id="car_date" class="datepicker-acc-labels form-control">
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
                          <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>                          
						  <?php } ?>
                        </select>
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

					<div class="form-group row mb-4" hidden>                                   
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>                             
                      <div class="col-sm-12 col-md-7">
					    <input type="text" name="publisher" class="form-control" placeholder="Publisher Name">                                                                                   
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