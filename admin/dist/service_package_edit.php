<?php require_once('header.php'); ?>

	
<?php

     if(isset($_POST['form1']))
       {		           		   
		$statement = $pdo->prepare("UPDATE tbl_packages SET package_no=?,package_name=?,vehicle_segment=?,category=? WHERE id=?");
	    $statement->execute(array($_POST['package_no'],$_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_REQUEST['id']));
        
	    
		$statement = $pdo->prepare("INSERT INTO tbl_packages_services (package_no, package_name,service,vendor_id) VALUES (?,?,?,?)");
		$statement->execute(array($_POST['package_no'],$_POST['package_name'],$_POST['service_id'],$_POST['vendor_id']));	   		        
       	
		//$id=$_REQUEST['id']
		//$package_no=$_POST['package_no'];
        //header("location:service_package_edit.php?id=$id&&package_no=$package_no"); 
         $success_message = 'Package Name updated successfully!'; 		
	  } 
   

if(isset($_POST['form2'])) {
$valid = 1;

	  if(empty($_POST['package_name'])) {
		 $valid = 0;
		 $error_message.= 'Package Name title can not be empty<br>';
	   } else {
		  // Duplicate Category checking
    	  // current Product Name that is in the database
    	  $statement = $pdo->prepare("SELECT * FROM tbl_packages WHERE id=?");
		  $statement->execute(array($_REQUEST['id']));
		  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		  foreach($result as $row) {
		  $current_product_name = $row['package_name'];
		 }

		 $statement = $pdo->prepare("SELECT * FROM tbl_packages WHERE package_name=? and package_name!=?");
    	 $statement->execute(array($_POST['package_name'],$current_product_name));
    	 $total = $statement->rowCount();							
    	 if($total) {
    		 $valid = 0;
        	 $error_message .= 'Product Name already exists<br>';
    	 }
	 } 

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
           $statement = $pdo->prepare("UPDATE tbl_packages SET package_name=?,vehicle_segment=?,category=?,package_amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	       $statement->execute(array($_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_POST['package_amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    } 

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
            $statement = $pdo->prepare("UPDATE tbl_packages SET package_name=?,vehicle_segment=?,category=?,package_amount=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	        $statement->execute(array($_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_POST['package_amount'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }

	    // If previous image not found and user want to change the photo
	     if($previous_photo == '' && $path != '') {

	    	$final_name = 'Package-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/service_packages/'.$final_name );

            $statement = $pdo->prepare("UPDATE tbl_packages SET package_name=?,vehicle_segment=?,category=?,package_amount=?,photo=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_POST['package_amount'],$final_name,$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
	    }
 
	    
	    // If previous image found and user want to change the photo
		 if($previous_photo != '' && $path != '') {

	    	unlink('../dist/uploads/service_packages/'.$previous_photo);

	    	$final_name = 'Package-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../dist/uploads/service_packages/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_packages SET package_name=?,vehicle_segment=?,category=?,package_amount=?,photo=?,title_tag=?,img_alt=?,img_title=? WHERE id=?");
	    	$statement->execute(array($_POST['package_name'],$_POST['vehicle_segment_id'],$_POST['category_id'],$_POST['package_amount'],$final_name,$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title'],$_REQUEST['id']));
      
    }
	    $success_message = 'Package Name updated successfully!'; 
} 
?>

						
<?php
$statement=$pdo->prepare("SELECT * FROM tbl_packages WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	 $package_no = $row['package_no'];
	 $package_name = $row['package_name'];
	 $category_id  = $row['category'];
	 $vehicle_segment_id = $row['vehicle_segment'];
	 $vendor_id   = $row['vendor_id'];
	 $package_amount     = $row['package_amount'];
	 $photo = $row['photo'];
	 
	 $title_tag  = $row['title_tag'];
	 $img_alt    = $row['img_alt'];
	 $img_title  = $row['img_title']; 
}
?>		
	  
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="service_package.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Package Edit The Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit The Post</h2>
            <p class="section-lead">
              On this page you can Edit a existing post and fill in all fields.
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
		
			<!-- Form Start -->
            <form class="needs-validation" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
					 
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package No</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="package_no" id="package_no" value="<?php echo $package_no; ?>" class="form-control" placeholder="Package Name">
                      </div>
                     </div>					
					 
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="package_name" id="package_name" value="<?php echo $package_name; ?>" class="form-control" placeholder="Package Name">
                      </div>
                     </div>							
							
			   		 <div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						 <option value="">-- Select Vendor --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor ORDER BY vendor_id ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['vendor_id']; ?>" <?php if($row['vendor_id']==$vendor_id){echo 'selected';} ?>><?php echo $row['vendor_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vehicle Segment Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vehicle_segment_id" id="vehicle_segment_id">
						    <option value="">-- Select The Vehicle Segment --</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$vehicle_segment_id){echo 'selected';} ?>><?php echo $row['segment']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
							
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="category_id" id="category_id">
						 <option value="">-- Select The Category --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_category ORDER BY category_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['category_id']; ?>" <?php if($row['category_id']==$category_id){echo 'selected';} ?>><?php echo $row['category_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>
                      <div class="col-sm-12 col-md-7">					    
                        <select class="form-control selectric" name="service_id" id="service_id">
						 <option value="">-- Select The Service --</option>
						    <?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_services ORDER BY service_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>
                          <option value="<?php echo $row['id']; ?>" <?php //if($row['id']==$service_id){echo 'selected';} ?>><?php echo $row['service_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value="">-- Select The Vendor --</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor ORDER BY vendor_name ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['vendor_id']; ?>" <?php if($row['vendor_id']==$vendor_id){echo 'selected';}?>><?php echo $row['vendor_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="form1" type="submit">Update Packges</button>
                      </div>
                    </div>

                    <table class="table table-striped table-dark" id="tableData" value="10">
					   <thead>
                        <tr>                         
						  <th>S.No</th>                         
						  <th>Packges No</th>	
						  <th>Packges Name</th>						                          					  
                          <th>Vehicle Segment Name</th>
						  <th>Service Name</th>						                          				  
                          <th>Vendor Name</th>							                            
                          <th>Delete</th>                          						  						  
                        </tr>
                       </thead>					   					   
					    <?php 
						 $i=0;
				           $pt="select * from tbl_packages_services WHERE package_no='".$package_no."' order by id desc";
				           $Ept=mysqli_query($conn,$pt);
				           $tnc=mysqli_num_rows($Ept);
				           while($FEpt=mysqli_fetch_array($Ept))
				            {
                              $sg="SELECT * FROM tbl_segment WHERE id='".$vehicle_segment_id."'";
							  $Esg=mysqli_query($conn,$sg);
				              $FEsg=mysqli_fetch_array($Esg); 
							  
							  $sc="SELECT * FROM tbl_services WHERE id='".$FEpt['service']."'";
							  $Esc=mysqli_query($conn,$sc);
				              $FEsc=mysqli_fetch_array($Esc);
							  
                              $vn="SELECT * FROM tbl_vendor WHERE vendor_id='".$FEpt['vendor_id']."'";
							  $Evn=mysqli_query($conn,$vn);
							  $FEvn=mysqli_fetch_array($Evn); 
							  							  							  
					     $i++;							   
					    ?>								                                								 								    
					<div class="row">
					   <tbody>
                        <tr>                     					                         
						   <td> <?php echo $i; ?></td>						   
					       <td> <?php echo $FEpt['package_no']; ?></td>
						   <td> <?php echo $FEpt['package_name']; ?></td>					      
					       <td> <?php echo $FEsg['segment']; ?></td>
						   <td> <?php echo $FEsc['service_name']; ?></td>					       
					       <td> <?php echo $FEvn['vendor_name']; ?></td>					   
						   <td>
						     <a href="service_package_delete_act.php?id=<?php echo $FEpt['id']; ?>&&pgno=<?php echo $FEpt['package_no']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						   </td>
                        </tr>
					   </tbody>
					 </div>  
					 <?php } ?>					   
                    </table>
                     					
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Amount</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="package_amount" id="package_amount" class="form-control" value="<?php echo $package_amount; ?>" placeholder="Package Amount">
                      </div>
                    </div>	
					
					<div class="form-group row mb-4">
				      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Existing Featured Photo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="input-group">
				              <?php
				              if($photo == '') {
				            	 echo 'No photo found';
				              } else {
				              echo '<img src="../dist/uploads/service_packages/'.$photo.'" class="existing-photo" style="width:200px;">';	
				              }
				             ?>
				             <input type="hidden" name="previous_photo" value="<?php echo $photo; ?>">
				            </div>
				        </div>    
                    </div>
					
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured Thumbnail</label>
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
                        <input type="text" name="title_tag" id="title_tag" value="<?php echo $title_tag; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Alt</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_alt" id="img_alt" value="<?php echo $img_alt; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="img_title" id="img_title" value="<?php echo $img_title; ?>" class="form-control">
                      </div>
                    </div>						

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button  class="btn btn-primary" name="form2" type="submit">Update Post</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		  </form>
		<!-- Form Start End -->  
          </div>
        </section>
      </div>
    <!-- Main Content End -->
	
	<!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	<!--- Footer End --->