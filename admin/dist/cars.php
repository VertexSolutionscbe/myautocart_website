     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Cars</h1>
            <div class="section-header-button">
              <a href="carsadd.php" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Cars</a></div>
              <div class="breadcrumb-item">All Cars</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                    <div class="float-left">
                      <select class="form-control selectric">
                        <option>Action For Selected</option>
                        <option>Move to Draft</option>
                        <option>Move to Pending</option>
                        <option>Delete Pemanently</option>
                      </select>
                    </div>
                    <div class="float-right">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
					  <div class="card-header">
                  <h4>Latest Posts</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                      <table class="table table-striped">
					   <thead>
                        <tr>
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
						  <th>S.No</th>
                          <th>Car Images</th>						  
                          <th>Car Name</th> 
						  <th>Car Details</th>
						  <th>Category</th>
                          <th>Edit</th>
                          <th>Delete</th>                          						  						  
                        </tr>
                       </thead>
					   <?php
            	        $i=0;
						/* $statement = $pdo->prepare("SELECT * FROM tbl_cars ORDER BY car_id ASC"); */
						$statement = $pdo->prepare("SELECT t1.car_id,t1.car_title,t1.car_content,t1.photo,t1.category_id,t2.category_id,t2.category_name FROM tbl_cars t1 left JOIN tbl_category t2 ON t1.category_id = t2.category_id ORDER BY t1.car_id DESC");            	        
            	        $statement->execute();
            	        $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	        foreach ($result as $row) {
            		    $i++;
            		   ?>
					   <tbody>
                        <tr>                     					
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                              <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
						  <td><?php echo $i; ?></td>
						  <td>
						    <?php
							 if($row['photo'] == '')
							  {
								 echo '<img src="../dist/uploads/no-photo1.jpg" alt="" style="width:100px;">';
							  }
							 else
							  {
								 echo '<img src="../dist/uploads/'.$row['photo'].'" alt="'.$row['car_title'].'" style="width:100px;">';
							  }
							?>						   
						  </td>                        						  
                          <td><?php echo $row['car_title']; ?></td>                           
                          <td><?php echo $row['car_content']; ?></td>
						  <td><?php echo $row['category_name']; ?></td>
						  <td>
                            <a href="carsedit.php?id=<?php echo $row['car_id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                           
                          </td>
						  <td>
						    <a href="#" class="btn btn-danger btn-action" data-href="carsdelete.php?id=<?php echo $row['car_id']; ?>" data-toggle="modal" title="Delete" data-target="#confirm-delete"><i class="fas fa-trash"></i></a>
						  </td>
                        </tr>
					   </tbody>
						<?php } ?>					   
                      </table>
                    </div>
					
					
					
                    <div class="float-right">
                      <nav>
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">3</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>	  
	  <!--**********************************
            Content body end
        ***********************************-->
	  
	   <!-- Modal -->
        <div class="modal fade" id="confirm-delete" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                    </div>                                                                                                      
                    <div class="modal-body">Are you sure want to delete this item?<br> Be Careful! All the Products under this category will be deleted too.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="carsdelete.php?id=<?php echo $row['car_id']; ?>" class="btn btn-danger btn-ok">Yes</a>
                    </div>                                                                                                                                  
                </div>                            
            </div>
        </div>
       <!-- Modal End -->
	  
	  
	  
	 <script>
	  $(function () {
	    $('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    }); 
	  }); 
	</script>
	  
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->