     <!--- Header Area --->
	    <?php require_once('header.php'); 
		error_reporting(0);
		?>
	 <!--- Header End --->
	 
<?php
if(isset($_POST['form1'])) {
    $valid = 1;

    $path = $_FILES['photo_one']['name'];
    $path_tmp = $_FILES['photo_one']['tmp_name'];

	$path1 = $_FILES['photo_tow']['name'];
    $path_tmp1 = $_FILES['photo_tow']['tmp_name'];
	
	$path2 = $_FILES['photo_three']['name'];
    $path_tmp2 = $_FILES['photo_three']['tmp_name'];
	
	$path3 = $_FILES['photo_four']['name'];
    $path_tmp3 = $_FILES['photo_four']['tmp_name'];

    if($path == '' ) {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
		
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
		 $ext1 = pathinfo( $path1,PATHINFO_EXTENSION );
        $file_name = basename( $path1, '.' . $ext1 );
        if( $ext1!='jpg' && $ext1!='png' && $ext1!='jpeg' && $ext1!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
		$ext2 = pathinfo( $path2,PATHINFO_EXTENSION );
        $file_name = basename( $path2, '.' . $ext2 );
        if( $ext2!='jpg' && $ext2!='png' && $ext2!='jpeg' && $ext2!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
		$ext3 = pathinfo( $path3,PATHINFO_EXTENSION );
        $file_name = basename( $path3, '.' . $ext3 );
        if( $ext3!='jpg' && $ext3!='png' && $ext3!='jpeg' && $ext3!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    /*  if($valid == 1) {
        // removing the existing photo
        $statement = $pdo->prepare("SELECT * FROM tbl_banners WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
        foreach ($result as $row) {
            $banner_photo = $row['banner_photo'];
            unlink('../dist/uploads/banners/'.$banner_photo);
        } 
		
		// getting auto increment id for photo renaming
		 $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_banners'");
		 $statement->execute();
		 $result = $statement->fetchAll();
		 foreach($result as $row) { */
			$ai_id=$row[1];
	/* 	 }
		 
	 } */

        // updating the data
        $final_name = 'banner_photo'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp,'../dist/uploads/banners/'.$final_name );      

		$final_name1 = 'banner_photo1'.$ai_id.'.'.$ext1;
        move_uploaded_file( $path_tmp1,'../dist/uploads/banners/'.$final_name1 );
		
		$final_name2 = 'banner_photo2'.$ai_id.'.'.$ext2;
        move_uploaded_file( $path_tmp2,'../dist/uploads/banners/'.$final_name2 );
		
		$final_name3 = 'banner_photo3'.$ai_id.'.'.$ext3;
        move_uploaded_file( $path_tmp3,'../dist/uploads/banners/'.$final_name3 );

        // updating the database
        $statement = $pdo->prepare("update tbl_banners set banner_img_one=?, banner_img_two=?, banner_img_three=?, banner_img_four=?, banner_title_one=?, banner_title_two=?, banner_title_three=?, banner_title_four=?, banner_subtitle_one=?, banner_subtitle_two=?, banner_subtitle_three=?, banner_subtitle_four=?, banner_link_one=?, banner_link_two=?, banner_link_three=?, banner_link_four=? where id='1'");
        $statement->execute(array($final_name, $final_name1, $final_name2, $final_name3, $_POST['banner_title_one'], $_POST['banner_title_two'], $_POST['banner_title_three'], $_POST['banner_title_four'], $_POST['banner_subtitle_one'], $_POST['banner_subtitle_two'], $_POST['banner_subtitle_three'], $_POST['banner_subtitle_four'], $_POST['banner_link_one'],$_POST['banner_link_two'],$_POST['banner_link_three'],$_POST['banner_link_four']));

        $success_message = 'Search Page Banner is updated successfully.';
        
    //}
}
?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_banners WHERE id='1'");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$banner_img_one      = $row['banner_img_one'];
	$banner_img_two      = $row['banner_img_two'];
	$banner_img_three    = $row['banner_img_three'];
	$banner_img_four     = $row['banner_img_four'];

    $banner_link_one   = $row['banner_link_one']; 					  
    $banner_link_two   = $row['banner_link_two']; 
    $banner_link_three = $row['banner_link_three']; 
	$banner_link_four  = $row['banner_link_four']; 	
	
	$banner_title_one    = $row['banner_title_one'];	
    $banner_title_two    = $row['banner_title_two'];
	$banner_title_three  = $row['banner_title_three'];
	$banner_title_four   = $row['banner_title_four'];
	
    $banner_subtitle_one   = $row['banner_subtitle_one'];
	$banner_subtitle_two   = $row['banner_subtitle_two'];
	$banner_subtitle_three = $row['banner_subtitle_three'];
	$banner_subtitle_four  = $row['banner_subtitle_four'];
    
	
  }
?>
<style>

.box1 {
    display: block;
    padding: 10px;
    margin-bottom: 20px; 
    text-align: justify;
}


</style>

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
                      <div class="col-2">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Banners</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" onclick="myFunction0()" data-toggle="list" href="#list-profile" role="tab">SEO Tags</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Messages</a>                          
                        </div>
                      </div>
                      <div class="col-10">
                        <div class="tab-content" id="nav-tabContent">					  
                          <!-- Banner Form -->
						  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">						  						    
							<form class="needs-validation" action="" method="post" enctype="multipart/form-data">
							
							<h4>Existing Banners</h4>							
							<div class="form-group row align-items-center">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b>Existing Category Page Banner</b></label>
                              <td style="width:50%">                                      
                                <div class="col-sm-4">
                                 <div class="input-group">
							        <img src="../dist/uploads/banners/<?php echo $banner_img_one; ?>" class="existing-photo" style="height:100px;">
							     </div>
								</div>                                      
                              </td>
							  <td style="width:50%">                                      
                                <div class="col-sm-4">
                                 <div class="input-group">
							        <img src="../dist/uploads/banners/<?php echo $banner_img_two; ?>" class="existing-photo" style="height:100px;">
							     </div>
								</div>                                      
                              </td>
                            </div>
							<div class="form-group row align-items-center">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b>Existing Category Page Banner</b></label>
                             <td style="width:50%">                                      
                                <div class="col-sm-4">
                                 <div class="input-group">
							        <img src="../dist/uploads/banners/<?php echo $banner_img_three; ?>" class="existing-photo" style="height:100px;">
							     </div>
								</div>                                      
                              </td>
							  <td style="width:50%">                                      
                                <div class="col-sm-4">
                                 <div class="input-group">
							        <img src="../dist/uploads/banners/<?php echo $banner_img_four; ?>" class="existing-photo" style="height:100px;">
							     </div>
								</div>                                      
                              </td>
                            </div>
							
							<h4>Choose Files</h4>
							<div class="form-group row align-items-center">							
							<div class="col-sm-4">
							 <div class="section-title">File Browser</div>
                             <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="photo_one" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                             </div>
							</div>							
							<div class="col-sm-4">
							 <div class="section-title">File Browser</div>
                             <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="photo_tow" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                             </div>
							</div>							
                            </div>
							
							<div class="form-group row align-items-center">							
							<div class="col-sm-4">
							 <div class="section-title">File Browser</div>
                             <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="photo_three" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                             </div>	
							</div>							
							<div class="col-sm-4">
							<div class="section-title">File Browser</div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="photo_four" required>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
							</div>							
                            </div>
							
							<div class="section-title" hidden>Multiple Files Browser</div>
                            <div class="custom-file" hidden>
                              <input type="file" class="custom-file-input" id="customFile" name="photo_five" multiple>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
							
							<div class="box1"></div>
							
							
							<h4>Banner URL's</h4>
							<div class="form-group row align-items-center">
							 <div class="col-sm-4">
							  <div class="form-group">
                               <div class="section-title">Banner URL</div>
                               <input type="text" class="form-control" name="banner_link_one" value=<?php echo $banner_link_one; ?>>
                              </div>
							 </div>
							 <div class="col-sm-4">
							  <div class="form-group">
                               <div class="section-title">Banner URL</div>
                               <input type="text" class="form-control" name="banner_link_two" value=<?php echo $banner_link_two; ?>>
                              </div>	
							 </div>
							</div>
							<div class="form-group row align-items-center">
							 <div class="col-sm-4">
							  <div class="form-group">
                               <div class="section-title">Banner URL</div>
                               <input type="text" class="form-control" name="banner_link_three" value=<?php echo $banner_link_three; ?>>
                              </div>
							 </div>
							 <div class="col-sm-4">
							  <div class="form-group">
                               <div class="section-title">Banner URL</div>
                               <input type="text" class="form-control" name="banner_link_four" value=<?php echo $banner_link_four; ?>>
                              </div>
							 </div>
							</div>	
							
							
                            <h4>Banner Titles</h4>
                            <div class="form-group row align-items-center">							
							<div class="col-sm-4">
							 <div class="form-group">
                              <div class="section-title">Banner Title</div>
                              <input type="text" class="form-control" name="banner_title_one" value=<?php echo $banner_title_one; ?>>
                             </div>
							</div>
							<div class="col-sm-4">
							<div class="form-group">
                              <div class="section-title">Banner Title</div>
                              <input type="text" class="form-control" name="banner_title_two" value=<?php echo $banner_title_two; ?>>
                            </div>
							</div>
							</div>							
							
							<div class="form-group row align-items-center">
                            <div class="col-sm-4">							
							<div class="form-group">
                              <div class="section-title">Banner Title</div>
                              <input type="text" class="form-control" name="banner_title_three" value=<?php echo $banner_title_three; ?>>
                            </div>
							</div>
							<div class="col-sm-4">							
							<div class="form-group">
                              <div class="section-title">Banner Title</div>
                              <input type="text" class="form-control" name="banner_title_four" value=<?php echo $banner_title_four; ?>>
                            </div>
							</div>							
							</div>
							
							<h4>Banner Subtitles</h4>
							<div class="form-group row align-items-center">
                            <div class="col-sm-4">	
							<div class="form-group">
                              <div class="section-title">Banner Subtitle</div>
                              <input type="text" class="form-control" name="banner_subtitle_one" value=<?php echo $banner_subtitle_one; ?>>
                            </div>
							</div>
							
							<div class="col-sm-4">	
							<div class="form-group">
                              <div class="section-title">Banner Subtitle1</div>
                              <input type="text" class="form-control" name="banner_subtitle_two" value=<?php echo $banner_subtitle_two; ?>>
                            </div>
							</div>
							</div>
							
							<div class="form-group row align-items-center">
							 <div class="col-sm-4">	
							  <div class="form-group">
                               <div class="section-title">Banner Subtitle</div>
                               <input type="text" class="form-control" name="banner_subtitle_three" value=<?php echo $banner_subtitle_three; ?>>
                              </div>
							 </div>
							
							 <div class="col-sm-4">
                              <div class="form-group">
                               <div class="section-title">Banner Subtitle</div>
                               <input type="text" class="form-control" name="banner_subtitle_four" value=<?php echo $banner_subtitle_four; ?>>
                              </div>							 
							 </div>							
							</div>																				
							
							  <button type="submit" class="btn btn-primary btn-xs" style="margin-top:15px;" name="form1">Update</button>
							</form>							  
                          </div>						  						  
						  <!-- Banner Form End -->							  
						  <!-- SEO Tags Form -->
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            
							<div class="col-12 col-md-10 col-lg-10">
                              <div class="card">
                                <div class="card-header">
                                  <h4>Action</h4>
                                </div>
                                <div class="card-body">                                 
                                <div class="buttons">                  
                                  <a href="#" onclick="myFunction1()" class="btn btn-icon icon-left btn-dark"><i class="far fa-eye"></i> View</a>
								  <a href="#" onclick="myFunction2()" class="btn btn-icon icon-left btn-primary"><i class="fas fa-puzzle-piece"></i> Add New Tag</a>								  
								  <a href="#" class="btn btn-icon icon-left btn-info" hidden><i class="far fa-edit"></i> Edit</a>                                                                                                 
                                  <a href="#" onclick="myFunction4()" class="btn btn-icon icon-left btn-danger" hidden><i class="fas fa-times"></i> Delete</a>                                 								                                                               
								</div>
                                </div>
                              </div>
                            </div>
							
							<div id="myDIV1">							                         							 						 
				              <div class="table-responsive">
					            <div class="card-header">
                                  <h4>Latest Posts</h4>
                                 <div class="card-header-action">
                                  <a href="#" class="btn btn-primary">View All</a>
                                 </div>
                                </div>
					            <table class="table table-striped" id="example">
					            <thead>
                                <tr>                                 
						         <th>S.No</th>						 
                                 <th>Webpage Name</th> 
						         <th>Title Tag</th>						  
						         <th>Metta Content</th>						  						                               
						         <th>Edit</th>
						         <th>Delete</th>
                                </tr>
                                </thead>
					            <?php
            	                 $i=0;
            	                  $li ="SELECT * FROM tbl_seo_tags WHERE status='Active' ORDER BY id desc";
            	                  $Eli=mysqli_query($conn,$li);
                                  while($FEli=mysqli_fetch_array($Eli))						
            	                   {							        							
            		             $i++;
            		            ?>
					            <tbody>
                                 <tr>                     					                                  
						          <td><?php echo $i; ?></td>						  
                                  <td><?php echo $FEli['webpage']; ?></td>
						          <td><?php echo $FEli['title_tag']; ?></td>						  						 
						          <td><?php echo $FEli['metta_content']; ?></td>						  						          
						          <td>
                                   <a href="setting_tagedit.php?uid=<?php echo $FEli['id']; ?>" onclick="myFunction3()" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      						          
						          </td> 
								  <td>
								   <a href="setting_tagdelete.php?id=<?php echo $FEli['id']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						          </td>
                                 </tr>
					            </tbody>
					            <?php } ?>					   
                               </table>
                             </div>											
						    </div>
						   
						   <div id="myDIV2">
							<form class="needs-validation" method="post" action="setting_tagadd.php" autocomplete="off"> 
						     <h4>Add New Tag</h4> 
							 <div class="form-group">
                              <div class="section-title">Webpage Name</div>
                              <input type="text" class="form-control" name="webpage" id="webpage" placeholder="">
                             </div>
							 
							 <div class="form-group">
                              <div class="section-title">Title Tag</div>
                              <textarea type="text" class="form-control" name="title_tag" id="title_tag"></textarea>
                             </div>
							
							 <div class="form-group">
                              <div class="section-title">Metta Content</div>
                              <textarea type="text" class="form-control" name="metta_content" id="metta_content"></textarea>
                             </div>																			  						  						  						  						  						  
						     <button type="submit" class="btn btn-primary btn-xs" style="margin-top:15px;">Create Post</button>							
							</form>
						   </div>
						   
						   <div id="myDIV3">
							<form class="needs-validation" method="post" action="setting_tagedit.php" autocomplete="off"> 
						     <h4>Edit</h4>
                             <?php
							     echo $tagid1 = $_SESSION['uid'];
                                 echo $tagid2 = $_GET['uid']; 
							     echo $tagid = $_REQUEST['uid']; 
            	                 echo $ei ="SELECT * FROM tbl_seo_tags WHERE id='".$_REQUEST['uid']."'";
            	                 $Eei=mysqli_query($conn,$ei);
                                 while($FEei=mysqli_fetch_array($Eei))						
            	                 {
                                    $webpage       = $FEei['webpage'];
								    $title_tag     = $FEei['title_tag'];
								    $metta_content = $FEei['metta_content'];
            		           
                             ?>							 
							 <div class="form-group">
                              <div class="section-title">Webpage Name</div>
                              <input type="text" class="form-control" name="webpage" id="webpage" value="<?php echo $webpage; ?>" placeholder="">
                             </div>
							 
							 <div class="form-group">
                              <div class="section-title">Title Tag</div>
                              <input type="text" class="form-control" name="title_tag" id="title_tag" value="<?php echo $title_tag; ?>">
                             </div>
							
							 <div class="form-group">
                              <div class="section-title">Metta Content</div>
                              <input type="text" class="form-control" name="metta_content" id="metta_content" value="<?php echo $metta_content; ?>">
                             </div>																			  						  						  						  						  						  
						     <button type="submit" class="btn btn-primary btn-xs" style="margin-top:15px;">Create Post</button>							
						     <?php } ?>
							</form>
						   </div>
						   
						   
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
	 
	 
<script> 
       function myFunction0() {

        document.getElementById("myDIV1").style.display = "block";

        document.getElementById("myDIV2").style.display = "none";

        document.getElementById("myDIV3").style.display = "none";

        document.getElementById("myDIV4").style.display = "none";

    }

      function myFunction1() {
      
        document.getElementById("myDIV1").style.display = "block";

        document.getElementById("myDIV2").style.display = "none";

        document.getElementById("myDIV3").style.display = "none";

        document.getElementById("myDIV4").style.display = "none";

    }

    function myFunction2() {

      document.getElementById("myDIV1").style.display = "none";

      document.getElementById("myDIV2").style.display = "block";

      document.getElementById("myDIV3").style.display = "none";

      document.getElementById("myDIV4").style.display = "none";

    }

    function myFunction3() {

      document.getElementById("myDIV1").style.display = "none";

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "block";

      document.getElementById("myDIV4").style.display = "none";

    }

    function myFunction4() {

      document.getElementById("myDIV1").style.display = "none"; 

      document.getElementById("myDIV2").style.display = "none";

      document.getElementById("myDIV3").style.display = "none";

      document.getElementById("myDIV4").style.display = "block";

    }

    </script>
	 
	 
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End ---> 