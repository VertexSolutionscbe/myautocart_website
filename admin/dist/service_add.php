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
	


	
	
	if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_services'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}		    				
	    

		 
             $statement = $pdo->prepare("INSERT INTO tbl_services (service_name,services_include,gst_per) VALUES (?,?,?)");
		$statement->execute(array($_POST['service_name'],$_POST['services_include'],$_POST['gst_per']));		}
    	$success_message = 'Service is added successfully.';      	     	   
	   }
		 

	   
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="service.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="service_name" id="service_name" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Services Include</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea  class="form-control summernote-simple" name="services_include" id="services_include"></textarea>
                      </div>
                    </div>						


                   <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gst %</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="gst_per" id="gst_per" required>                         						  
						  <option>-- Select The GST --</option>
						  <?php
						   $Et="SELECT * FROM `tbl_gst` order by  id";
						   $EEt=mysqli_query($conn,$Et);
						   while($FEEt=mysqli_fetch_array($EEt)){
						  ?>
						  <option value="<?php echo $FEEt['gst']; ?>"><?php echo $FEEt['gst']; ?></option>
						  <?php } ?>
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