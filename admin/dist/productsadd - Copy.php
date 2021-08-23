      <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	  <!--- Header End --->	

<script> 
function getmodel() {
	
    var inputs = document.getElementById('make_brand').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_model.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#v_model").html(data);
		  }
		});
}

function getversion() {
	
    var inputs1 = document.getElementById('make_model').value;
    // alert("edfgjd"+inputs1);
	$.ajax({
	type: "POST",
	
	url: "get_version.php",
	
	data:{inputs1:inputs1},
	success: function(data){
		$("#v_version").html(data);
		  }
		});
}

function myFunction() {
  var x = document.getElementById("divInv");
  var y = document.getElementById("divInv1");
  if (x.style.display === "none") {
    x.style.display = "block";
	y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
	  	  
	 
   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

    // if(empty($_POST['product_title'])) {
        // $valid = 0;
        // $error_message .= "Product Name can not be empty<br>";
    // } else {
    	// Duplicate Category checking
    	// $statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_title=?");
    	// $statement->execute(array($_POST['product_title']));
    	// $total = $statement->rowCount();
    	// if($total)
    	// {
    		// $valid = 0;
        	// $error_message .= "Product Name already exists<br>";
    	// }
    // } 
	
	/* if(empty($_POST['product_content'])) {
		$valid = 0;
		$error_message .= 'Product content can not be empty<br>';
	}		 */
	
	if(empty($_POST['product_date'])) {
		$valid = 0;
		$error_message .= 'Product publish date can not be empty<br>';
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
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_products'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
	
	    if($_POST['product_slug'] == '') {
    		// generate slug
    		$temp_string = strtolower($_POST['product_title']);
    		$product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	} else {
    		$temp_string = strtolower($_POST['product_slug']);
    		$product_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $temp_string);
    	}
		
		// if slug already exists, then rename it
		$statement = $pdo->prepare("SELECT * FROM tbl_products WHERE product_slug=?");
		$statement->execute(array($product_slug));
		$total = $statement->rowCount();
		if($total) {
			$product_slug = $product_slug.'-1';
		}  
	    
	    if($path=='') {
	    // When no photo will be selected
		$statement = $pdo->prepare("INSERT INTO tbl_products (mrp,owners_count,kms,vendor_id,make_brand,make_model,version,year,interior_color,exterior_color,fuel_type,seat_capacity,fuel_capacity,tranmission,mileage,engine_capacity,body_type,product_title,product_slug,product_content,product_date,photo,category_id,publisher,product_amount,product_tax,product_sales,product_tags,product_additional_info,product_return_policy,product_reviews,product_status,title_tag,img_alt,img_title) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['vendor_id'],$_POST['make_brand'],$_POST['make_model'],$_POST['version'],$_POST['year'],$_POST['interior_color'],$_POST['exterior_color'],$_POST['fuel_type'],$_POST['seat_capacity'],$_POST['fuel_capacity'],$_POST['tranmission'],$_POST['mileage'],$_POST['engine_capacity'],$_POST['body_type'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],'',$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title']));	
	    } else {
	     // uploading the photo into the main location and giving it a final name
		$final_name = 'Product-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../dist/uploads/'.$final_name );
		 
		$statement = $pdo->prepare("INSERT INTO tbl_products (mrp,owners_count,kms,vendor_id,make_brand,make_model,version,year,interior_color,exterior_color,fuel_type,seat_capacity,fuel_capacity,tranmission,mileage,engine_capacity,body_type,product_title,product_slug,product_content,product_date,photo,category_id,publisher,product_amount,product_tax,product_sales,product_tags,product_additional_info,product_return_policy,product_reviews,product_status,title_tag,img_alt,img_title) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['mrp'],$_POST['owners_count'],$_POST['kms'],$_POST['vendor_id'],$_POST['make_brand'],$_POST['make_model'],$_POST['version'],$_POST['year'],$_POST['interior_color'],$_POST['exterior_color'],$_POST['fuel_type'],$_POST['seat_capacity'],$_POST['fuel_capacity'],$_POST['tranmission'],$_POST['mileage'],$_POST['engine_capacity'],$_POST['body_type'],$_POST['product_title'],$product_slug,$_POST['product_content'],$_POST['product_date'],$final_name,$_POST['category_id'],$publisher,$_POST['product_amount'],$_POST['product_tax'],$_POST['product_sales'],$_POST['product_tags'],$_POST['product_additional_info'],$_POST['product_return_policy'],$_POST['product_reviews'],$_POST['product_status'],$_POST['title_tag'],$_POST['img_alt'],$_POST['img_title']));
		}
    	$success_message = 'Product is added successfully.';
       
	   header("location: product_detailimg_add.php");
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
			<a href="product_detailimg_add.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">				  					
					
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor Id</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vendor_id" id="vendor_id">
						    <option value="">--- Select The Vendor ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_vendor order by vendor_id ");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
				  
				  		<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="product_date" id="product_date" value="<?php echo date('Y-m-d'); ?>" class="datepicker-acc-labels form-control">
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_title" id="product_title" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Slug</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_slug" id="product_slug" class="form-control">
                      </div>
                    </div>
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_content" id="editor1"></textarea>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MRP</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mrp" id="mrp" class="form-control">
                      </div>
                    </div>
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Selling Price(Inclusive of Tax)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_amount" id="product_amount" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tax</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_tax" id="product_tax" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="product_sales">
						  <option> <-- Salect Sales --> </option>
                          <option value="0">Not Saleable</option>
                          <option value="1">Saleable</option>                          
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Tags</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_tags" id="product_tags" class="form-control">
                      </div>
                    </div>
					
					 <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Name</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="make_brand" id="make_brand" onChange="getmodel(this.value);">
						    <option value="">--- Select The Brand ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_make  ORDER BY id ASC");
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
					 <div class="col-sm-12 col-md-7">
				      <div  id="v_model" name="v_model"> </div>	
					 </div>  
				    </div>
					
    	   	        <div class="form-group row mb-4">
					 <div class="col-sm-12 col-md-7">
				      <div  id="v_version" name="v_version"> </div>	
                     </div>					  
				    </div>												        									
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="year" id="year">
						    <option value="">--- Select The Year ---</option>
						    <option value="2000">2000</option>
						    <option value="2001">2001</option>
						    <option value="2002">2002</option>
						    <option value="2003">2003</option>
						    <option value="2004">2004</option>
						    <option value="2005">2005</option>
						    <option value="2006">2006</option>
						    <option value="2007">2007</option>
						    <option value="2008">2008</option>
						    <option value="2009">2009</option>
						    <option value="2010">2010</option>
						    <option value="2011">2011</option>
						    <option value="2012">2012</option>
						    <option value="2013">2013</option>
						    <option value="2014">2014</option>
						    <option value="2015">2015</option>
						    <option value="2016">2016</option>
						    <option value="2017">2017</option>
						    <option value="2018">2018</option>
						    <option value="2019">2019</option>
						    <option value="2020">2020</option>					
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interior Color</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="interior_color" id="interior_color">
						    <option value="">--- Select The Color ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_color  ORDER BY color ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Exterior Color</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="exterior_color" id="exterior_color">
						    <option value="">--- Select The Color ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_color  ORDER BY color ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['color']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fuel Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="fuel_type" id="fuel_type">
						    <option value="">--- Select The Fuel Type ---</option>
						    <option value="Petrol">Petrol</option>
						    <option value="Diesel">Diesel</option>		
						    <option value="LPG">LPG</option>		
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="body_type" id="body_type">
						    <option value="">--- Select The Body Type ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['segment']; ?></option>                          
						  <?php } ?>
                        </select> 
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seating Capacity</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="seat_capacity" id="seat_capacity" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fuel tank capacity (Lts)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="fuel_capacity" id="fuel_capacity" class="form-control">
                      </div>
                    </div>
					
				    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transmission</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="tranmission" id="tranmission">
						    <option value="">--- Select The Type ---</option>
						    <option value="manual">Manual</option>
						    <option value="automatic">Automatic</option>		
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mileage (Kms)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="mileage" id="mileage" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Engine Capacity (CC)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="engine_capacity" id="engine_capacity" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Additional Information</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_additional_info" id="editor1"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Return Policy</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="product_return_policy" id="editor1"></textarea>
                      </div>
                    </div>
					
					<div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Reviews</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="product_reviews" id="product_reviews" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kilometers Driven</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="kms" id="kms" class="form-control">
                      </div>
                    </div>
					
					<div class="form-group row mb-4" >
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owners Count</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="owners_count" id="owners_count" class="form-control">
                      </div>
                    </div>								
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="product_status">
                          <option value="Active">Active</option>
                          <option value="Deactive">Deactivate</option>                          
                        </select>
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
                        <button class="btn btn-primary" name="form1" type="submit" >Create Post</button>
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