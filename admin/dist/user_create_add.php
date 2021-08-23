     <!--- Header Area --->
	    <?php require_once('header.php'); 
		 error_reporting(0);
		?>
	 <!--- Header End --->
	 
	    <?php 
         if(isset($_POST['form1'])) {    
	  		  
	     $password  = $_POST['password'];
         $user_name = $_POST['user_name'];
		
         $query=mysqli_query($conn,"SELECT * FROM user_create WHERE user_name='".$user_name."'") or die(mysqli_error());
         $duplicate=mysqli_num_rows($query);
		 if($duplicate==0)
         {
		  $pm="INSERT INTO user_create SET user_id='".$_POST['user_id']."',financial_year='".$_POST['financial_year']."',user_name='".$user_name."',company_name='".$_POST['company_name']."',password='".$password."',user_role='".$_POST['role_name']."',phone='".$_POST['phone']."'";                    
		  $Epm=mysqli_query($conn,$pm);  		 		 
		 }	
		 
          $ug="update tbl_number_generate set userid=userid+1 where Id=1";
          $Eug=mysqli_query($conn,$ug);
		  
    	  $success_message = 'User is added successfully.';
	     }		
	    ?>	
        <?php		
	      $ng="select * from tbl_number_generate where Id=1";
          $Eng=mysqli_query($conn,$ng);
          $FEng=mysqli_fetch_array($Eng);
          $AUC=UC."-".$FEng['userid'];
        ?>      
      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="user_create_view.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>User Create </h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">User Create </div>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Id</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="user_id" id="user_id" placeholder="User Code" value="<?php echo $AUC; ?>" class="form-control" readonly>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Finacial Year</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="financial_year" id="financial_year">
						  <?php
				           $fy="select * from financial_year WHERE id";
				           $Efy=mysqli_query($conn,$fy);
				           while($FEfy=mysqli_fetch_array($Efy)) {				  
				          ?>
				          <option value="<?php echo $FEfy['financial_year']; ?>"><?php echo $FEfy['financial_year']; ?></option>
						  <?php } ?>				 						                          
                        </select>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="company_name" id="company_name" required>
                          <option>--- Select Company ---</option>
						  <?php
				           $sql="SELECT * FROM `tbl_vendor` WHERE vendor_id";
				           $result=mysqli_query($conn,$sql);
				           while($row = mysqli_fetch_array($result)) {				  
				           ?>
				          <option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']; ?></option>
						   <?php } ?>				  						                           
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Name</label>
                      <div class="col-sm-12 col-md-7">                    
						<input type="text" name="user_name" id="user_name" placeholder="User Name" class="form-control" required>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile No</label>
                      <div class="col-sm-12 col-md-7">                    
						<input type="text" name="phone" id="phone" pattern="^\d{10}$" placeholder="Mobile No" class="form-control" required>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password (minimum 6 chars, at least 1 number, at least 1 Capital letter)</label>
                      <div class="col-sm-12 col-md-7">                      
                        <input type="text" name="password"  id="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" placeholder="Password" class="form-control" required>
					  </div>
                    </div>                                                                               
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="role_name" id="role_name">
						 <option>--- Select User Role ---</option>
						  <?php
				           $ur="select * from user_role where status='Active'";
				           $Eur=mysqli_query($conn,$ur);
				           while($FEur=mysqli_fetch_array($Eur)) {				  
				          ?>
				         <option value="<?php echo $FEur['role_name']; ?>"><?php echo $FEur['role_name']; ?></option>
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
     <!-- Main Content End -->
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->