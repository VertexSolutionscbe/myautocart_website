     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->


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
                          <a class="list-group-item list-group-item-action" href="setting.php">Banner</a>
                          <a class="list-group-item list-group-item-action active" id="linkid" onclick="myFunction3()" data-toggle="list" href="#list-profile" role="tab">SEO Tags</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Messages</a>                          
                        </div>
                      </div>
                      <div class="col-10">
                        <div class="tab-content" id="nav-tabContent">					  						  
						  <!-- SEO Tags Form -->
                          <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            
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
												   
						   <div id="myDIV3">
							<form class="needs-validation" method="post" action="setting_tagedit_act.php?id=<?php echo $_REQUEST['uid']; ?>" autocomplete="off"> 
						     <h4>Edit</h4>
                             <?php							                                    
							   $tagid = $_REQUEST['uid']; 
            	               $ei ="SELECT * FROM tbl_seo_tags WHERE id='".$_REQUEST['uid']."'";
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
						     <button type="submit" class="btn btn-primary btn-xs" style="margin-top:15px;">Save Changes</button>							
						     <?php } ?>
							</form>
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
						         <th>Action</th>						         
                                </tr>
                                </thead>
					            <?php
            	                 $i=0;
            	                  $li ="SELECT * FROM tbl_seo_tags ORDER BY id desc";
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
       window.onload=function(){
        document.getElementById("linkid").click();
       };

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

      document.getElementById("myDIV3").style.display = "active";

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