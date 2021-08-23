     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->
	 
<?php
if(isset($_POST['form1'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    /* if($valid == 1) {
        // removing the existing photo
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
        foreach ($result as $row) {
            $banner_photo = $row['banner_photo'];
            unlink('../dist/uploads/banners/'.$banner_photo);
        } */
		
		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_settings'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

        // updating the data
        $final_name = 'banner_photo-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp,'../dist/uploads/banners/'.$final_name );

        // updating the database
        $statement = $pdo->prepare("INSERT INTO tbl_settings (banner_img,banner_title,banner_subtitle,banner_link) VALUES (?,?,?,?)");
        $statement->execute(array($final_name,$_POST['banner_title'],$_POST['banner_subtitle'],$_POST['banner_link'],));

        $success_message = 'Search Page Banner is updated successfully.';
        
    //}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$banner_img         = $row['banner_img'];
	$banner_title       = $row['banner_title'];			
    $banner_subtitle    = $row['banner_subtitle'];
    $banner_link        = $row['banner_link'];   
  }
?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Setting</h1>
          </div>
          <!-- Section Body -->
          <div class="section-body">
		    <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
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
			<!-- Card Start -->
            <div class="card">
                  <div class="card-header">
                    <h4>Information</h4>
                  </div>
				  <!-- Card Body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Banner</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">SEO Tags</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Messages</a>                          
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">					  
                          <!-- Banner Form -->
						  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">						  						    
							<form class="needs-validation" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
                              <div class="section-title">Banner Title</div>
                              <input type="text" class="form-control" name="banner_title">
                            </div>
							
							<div class="form-group">
                              <div class="section-title">Banner Subtitle</div>
                              <input type="text" class="form-control" name="banner_subtitle">
                            </div>
							
							<div class="form-group">
                              <div class="section-title">Banner URL</div>
                              <input type="text" class="form-control" name="banner_link">
                            </div>
							
							<div class="form-group row align-items-center">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b>Existing Category Page Banner</b></label>
                              <td style="width:50%">                                      
                                <div class="col-sm-9">
                                 <div class="input-group">
							        <img src="../dist/uploads/banners/<?php echo $banner_img; ?>" class="existing-photo" style="height:100px;">
							     </div>
								</div>                                      
                              </td>
                            </div>

							<div class="section-title">File Browser</div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="photo">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>							
							  <button type="submit" class="btn btn-primary btn-xs" style="margin-top:15px;" name="form1">Create Post</button>
							</form>						  
                          </div>						  						  
						  <!-- Banner Form End -->							  
						  <!-- SEO Tags Form -->
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <form class="needs-validation" action="" method="post" enctype="multipart/form-data"> 
						     <div class="form-group">
                              <div class="section-title">Title Tag</div>
                              <input type="text" class="form-control" name="banner_title" id="">
                             </div>
							
							 <div class="form-group">
                              <div class="section-title">Metta Tag</div>
                              <input type="text" class="form-control" name="banner_subtitle" id="">
                             </div>
							
							 <div class="form-group">
                              <div class="section-title">Image URL</div>
                              <input type="text" class="form-control" name="banner_link" id="">
                             </div>						  						  						  						  						  						  
						    </form>	
						  </div>
						  <!-- SEO Tags Form End -->
						  
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            In quis non esse eiusmod sunt fugiat magna pariatur officia anim ex officia nostrud amet nisi pariatur eu est id ut exercitation ex ad reprehenderit dolore nostrud sit ut culpa consequat magna ad labore proident ad qui et tempor exercitation in aute veniam et velit dolore irure qui ex magna ex culpa enim anim ea mollit consequat ullamco exercitation in.
                          </div>                         
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- Card Body End -->
                </div>			
		     <!-- Card Start -->  
          </div>
		 <!-- Section Body -->
        </section>
      </div>      
	 <!-- Main Content End -->
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End ---> 