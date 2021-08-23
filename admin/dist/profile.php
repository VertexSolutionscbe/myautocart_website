      <!--- Header Area --->
	    <?php require_once('header.php'); 
		error_reporting(0);
		?>
	  <!--- Header End --->  
        <?php
	      if(isset($_POST['form1'])) {
		  $valid = 1;	  
			  
		   $path = $_FILES['photo']['name'];
           $path_tmp = $_FILES['photo']['tmp_name'];

           $previous_photo = $_POST['previous_photo'];

	      if($path!='') {
            $ext = pathinfo( $path, PATHINFO_EXTENSION );
            $file_name = basename( $path, '.' . $ext );
          if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
              }
            }
 
          // If previous image not found and user do not want to change the photo
          if($previous_photo == '' && $path == '') {
            $ud="UPDATE user_create SET user_id='".$_POST['user_id']."', financial_year='".$_POST['financial_year']."', user_name='".$_POST['user_name']."', company_name='".$_POST['company_name']."', branch_name='".$_POST['branch_name']."', password='".$_POST['password']."', user_role='".$_POST['user_role']."', email='".$_POST['email']."', phone='".$_POST['phone']."', bio='".$_POST['bio']."' WHERE id='".$_SESSION['user_create_id']."'";
		    $Fud=mysqli_query($conn,$ud);		
		  } 
		  
		  // If previous image found and user do not want to change the photo
	      if($previous_photo != '' && $path == '') {
           $ud="UPDATE user_create SET user_id='".$_POST['user_id']."', financial_year='".$_POST['financial_year']."', user_name='".$_POST['user_name']."', company_name='".$_POST['company_name']."', branch_name='".$_POST['branch_name']."', password='".$_POST['password']."', user_role='".$_POST['user_role']."', email='".$_POST['email']."', phone='".$_POST['phone']."', bio='".$_POST['bio']."' WHERE id='".$_SESSION['user_create_id']."'";
		   $Fud=mysqli_query($conn,$ud);	
		  }
  
           // If previous image not found and user want to change the photo
		  if($previous_photo == '' && $path != '') {
			  
			 $final_name = 'Profile-'.$_SESSION['user_create_id'].'.'.$ext;
             move_uploaded_file( $path_tmp, '../dist/uploads/profile/'.$final_name ); 

			 $ud="UPDATE user_create SET user_id='".$_POST['user_id']."', financial_year='".$_POST['financial_year']."', user_name='".$_POST['user_name']."', company_name='".$_POST['company_name']."', branch_name='".$_POST['branch_name']."', password='".$_POST['password']."', user_role='".$_POST['user_role']."', photo='".$final_name."', email='".$_POST['email']."', phone='".$_POST['phone']."', bio='".$_POST['bio']."' WHERE id='".$_SESSION['user_create_id']."'";
		     $Fud=mysqli_query($conn,$ud);
		   }

          // If previous image found and user want to change the photo
		  if($previous_photo != '' && $path != '') {

	    	unlink('../dist/uploads/'.$previous_photo);

	    	$final_name = 'Profile-'.$_SESSION['user_create_id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/profile/'.$final_name );

	    	$ud="UPDATE user_create SET user_id='".$_POST['user_id']."', financial_year='".$_POST['financial_year']."', user_name='".$_POST['user_name']."', company_name='".$_POST['company_name']."', branch_name='".$_POST['branch_name']."', password='".$_POST['password']."', user_role='".$_POST['user_role']."', photo='".$final_name."', email='".$_POST['email']."', phone='".$_POST['phone']."', bio='".$_POST['bio']."' WHERE id='".$_SESSION['user_create_id']."'";
		    $Fud=mysqli_query($conn,$ud);
             }		           		
		    $success_message = 'Profile is updated successfully!';		  		  
		  }       
        ?>	  
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
		    
          <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $_SESSION['user']; ?>(<?php echo $_SESSION['user_role']; ?>)!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                                                        				        
				    <?php
				      if($_SESSION['photo'] == '') {
				      echo 'No photo found';
				      } else {
				      echo '<img alt="image" src="../dist/uploads/profile/'.$_SESSION['photo'].'" class="rounded-circle profile-widget-picture">';	
				      }
				    ?>
				    <input type="hidden" name="previous_photo" value="<?php echo $_SESSION['photo']; ?>">
				            					 
					<div class="profile-widget-items" hidden>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo $_SESSION['user']; ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php echo $_SESSION['user_role']; ?> <div class="slash"></div> <?php echo $_SESSION['vendor_type']; ?></div></div>
                    <?php echo $_SESSION['bio']; ?>
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow <?php echo $_SESSION['user']; ?> On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
			  			  
              <div class="col-12 col-md-12 col-lg-7">
			    <?php
			     $prf = "SELECT * FROM `user_create` WHERE id='".$_SESSION['user_create_id']."'";
				 $Eprf = mysqli_query($conn,$prf);
				 $Fprf = mysqli_fetch_array($Eprf);
				 
				   $user_role = $Fprf['user_role'];

                   $cn="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$Fprf['company_name']."'";
                   $Ecn=mysqli_query($conn,$cn);
                   $FEcn=mysqli_fetch_array($Ecn);				   
			    ?>
                <div class="card">											
                  <form method="post" class="needs-validation" action="profile.php" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>										
					<!-- Success Msg -->
			        <?php if($success_message): ?>
			         <?php //if($_REQUEST['success']): ?>
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
			
			         <?php //if($warning_message): ?>
			         <?php if($_REQUEST['warning']): ?>
			         <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                       <span>&times;</span>
                      </button><strong>Warning!</strong><?php echo $warning_message; ?></div>                                     
                     </div>
			        <?php endif; ?>
			        <!-- Success Msg End -->										
					
                    <div class="card-body">
                        <div class="row">
						  <div class="form-group col-md-6 col-12">
							<div class="section-title">File Browser</div>
							<div class="custom-file">
                             <input type="file" class="custom-file-input" id="customFile" name="photo">
                             <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
						  </div>																		
						</div>						
						<div class="row">                                                     						  
						  <div class="form-group col-md-6 col-12">
                            <label>User Id</label>
                            <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $Fprf['user_id']; ?>" readonly="">
                            <div class="invalid-feedback">
                              Please fill in the User Id
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Financial Year</label>
                            <input type="text" class="form-control" name="financial_year" id="financial_year" value="<?php echo $Fprf['financial_year']; ?>" readonly="">
                            <div class="invalid-feedback">
                              Please fill in the Financial Year
                            </div>
                          </div>						                           
						</div>
						
						<div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $Fprf['user_name']; ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the User Name
                            </div>
                          </div>						                          
                          
                          <div class="form-group col-md-6 col-12">
                           <label>Role Name</label>                          
                           <select class="form-control selectric" name="user_role" id="user_role" required="">
						    <option>--- Select User Role ---</option>
						    <?php
				             $ur="select * from user_role where status='Active'";
				             $Eur=mysqli_query($conn,$ur);
				             while($FEur=mysqli_fetch_array($Eur)) {				  
				            ?>
				            <option value="<?php echo $FEur['role_name']; ?>" <?php if($FEur['role_name']==$user_role){ echo 'selected'; } ?>><?php echo $FEur['role_name']; ?></option>
						    <?php } ?>				                                                  
                            </select>                           
                          </div>
						
                        </div>
						
                        <div class="row">
						  <div class="form-group col-md-6 col-12">
                            <label>Company Name</label>
                            <select class="form-control selectric" name="company_name" id="company_name" required>
                             <option value="<?php echo $Fprf['company_name']; ?>" selected="true"><?php echo $FEcn['vendor_name']; ?></option>
						      <?php
				               $sql="SELECT * FROM `tbl_vendor` WHERE vendor_id";
				               $result=mysqli_query($conn,$sql);
				               while($row = mysqli_fetch_array($result)) {				  
				              ?>
				             <option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']; ?></option>
						     <?php } ?>				  						                           
                            </select>
                          </div>
						  
                          <div class="form-group col-md-6 col-12">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branch_name" id="branch_name" value="<?php echo $Fprf['branch_name']; ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the Company Name
                            </div>
                          </div>						                            
                        </div>
						
						<div class="row">
						 <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $Fprf['email']; ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>						
						  <div class="form-group col-md-6 col-12">
                            <label>Mobile</label>
                            <input type="tel" class="form-control" name="phone" id="phone" pattern="^\d{10}$" value="<?php echo $Fprf['phone']; ?>">
                          </div>						  
						</div>
						
						<div class="row">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">  
						  <div class="form-group col-md-6 col-12">
                            <label>Password</label>						
                            <input type="password" class="form-control" name="password" id="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" value="<?php echo $Fprf['password']; ?>" required="">                           														                          
                          </div>
						  <div class="form-group col-md-6 col-12">
						    <label>&nbsp;</label></br>					            	  
						    <i class="far fa-eye" id="togglePassword"></i>
						   </div>
						  <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');

                            togglePassword.addEventListener('click', function (e) {
                            // toggle the type attribute
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                            });
                          </script>	  
						</div>
						
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple" id="bio" name="bio" value="<?php echo $Fprf['bio']; ?>"></textarea>
                          </div>
                        </div>
						
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" name="form1" type="submit">Update Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
	  <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	  <!--- Footer End --->