      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;


		 
             $statement = $pdo->prepare("INSERT INTO tbl_version (make_id,model_id,version) VALUES (?,?,?)");
		$statement->execute(array($_POST['make_id'],$_POST['model_id'],$_POST['version']));		
	   }
		 

	   
	 ?>

	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="version.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="make_id" id="make_id">
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_make order by make ");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['make']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>															        					
                    
                       <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Model Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="model_id" id="model_id">
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_model order by model ");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['model']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>	

      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Version Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="version" id="version" class="form-control">
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