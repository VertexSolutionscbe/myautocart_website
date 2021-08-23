     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->
	 <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

     if(empty($_POST['role_name'])) {
        $valid = 0;
        $error_message .= "Role Name can not be empty<br>";
      } else {
    	// Duplicate Role Name checking
        $sqr="SELECT * FROM user_role WHERE role_name='".$_POST['role_name']."'";
        $Esqr=mysqli_query($conn,$sqr);
        $total=mysqli_num_rows($Esqr);         	
    	if($total)
    	{
    		$valid = 0;
        	$error_message .= "Role Name already exists<br>";
    	}
      }    	
		
		$qry="INSERT INTO user_role SET role_name='".$_POST['role_name']."',status='".$_POST['status']."'";
		$Eqry=mysqli_query($conn,$qry);
	
    	$success_message = 'User Role is added successfully.';
       
	   } 
	 ?>

      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="user_role_view.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create User Role</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create User Role</div>
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
			
            <form class="needs-validation" method="post" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="role_name" id="role_name" placeholder="Role Name" class="form-control">
                      </div>
                    </div>				  
                    <div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category_name_old" id="category_name_old">
                          <option><-- Select Category --></option>
						  <option value="Cars">Cars</option>
                          <option value="Bikes">Bikes</option>                         
                        </select>
                      </div>
                    </div>                                                           
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
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
     <!-- Main Content End -->
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->