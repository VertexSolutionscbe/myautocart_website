     <!--- Header Area --->
	    <?php require_once('header.php'); 
		error_reporting(0);
		?>
	 <!--- Header End --->
	 <?php
	 if(isset($_POST['form1'])) {	               
    	// Duplicate Category checking
    	$yr="SELECT * FROM financial_year WHERE financial_year='".$_POST['financial_year']."'";
		$Eyr=mysqli_query($conn,$yr)or die(mysqli_error());
		$duplicate=mysqli_num_rows($Eyr);		      
		if($duplicate==0)
         { 
	   
		 $fy="UPDATE financial_year SET year_id='".$_POST['year_id']."',financial_year='".$_POST['financial_year']."',start_date='".$_POST['start_date']."',end_date='".$_POST['end_date']."',status='".$_POST['status']."' WHERE id='".$_REQUEST['id']."'";
		 $Efy=mysqli_query($conn,$fy);
				
    	 $success_message = 'Financial Year is updated successfully.';
		
		} else {			
			
			$error_message = "Financial Year already exists<br>";
		 
		  } 
	   }  
	 ?>
	    <?php 
	      $gt="SELECT * FROM financial_year WHERE id='".$_REQUEST['id']."'";
		  $Egt=mysqli_query($conn,$gt);
		  $FEgt=mysqli_fetch_array($Egt);
		  $year_id=$FEgt['year_id'];
		  $financial_year=$FEgt['financial_year'];
		  $start_date=$FEgt['start_date'];
		  $end_date=$FEgt['end_date'];		 		   
	    ?>

      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="financial_year.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
			
            <form class="needs-validation" method="post" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year Id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="year_id" id="year_id" value="<?php echo $year_id; ?>" class="form-control" readonly>
                      </div>
                    </div>				  
                    
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Financial Year</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" id="financial_year" name="financial_year" value="<?php echo $financial_year; ?>" placeholder="Financial Year" class="form-control" required>
                      </div>
                    </div>								
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo $start_date; ?>">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo $end_date; ?>">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status" id="status">
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