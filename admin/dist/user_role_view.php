     <!--- Header Area --->
	    <?php require_once('header.php'); 
		 error_reporting(0);
		 
		 $pagename="user_role_view.php";
         $spno="SELECT * FROM `role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `leftbar_menu`where url like '%$pagename') ORDER BY `id` ASC";
         $Espno=mysqli_query($conn,$spno);
         $FEspno=mysqli_fetch_array($Espno);
		
		?>		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
// $(document).ready(function(){
	// /* Activate tooltips */
	// $('[data-toggle="tooltip"]').tooltip();
    
	// /* Filter table rows based on searched term */
    // $("#search").on("keyup", function() {
        // var term = $(this).val().toLowerCase();
        // $("table tbody tr").each(function(){
            // $row = $(this);
            // var name = $row.find("td:nth-child(2)").text().toLowerCase();
            // console.log(name);
            // if(name.search(term) < 0){                
                // $row.hide();
            // } else{
                // $row.show();
            // }
        // });
    // });
// });
</script>
	 <!--- Header End --->
      <script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>User Role</h1>
            <div class="section-header-button">
              <a href="user_role.php" class="btn btn-primary">Add New User Role</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">User Role</a></div>
              <div class="breadcrumb-item">All User Role</div>
            </div>
          </div>
		  <!-- Section Body -->
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p> 

            <!-- Success Msg -->
			<?php // if($success_message): ?>
			<?php if($_REQUEST['success']): ?>
			<div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button>  <strong>Success!</strong> <?php echo $_REQUEST['success']; ?></div>                             
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
                </button><strong>Warning!</strong><?php echo $_REQUEST['warning']; ?></div>                                     
            </div>
			<?php endif; ?>
			<!-- Success Msg End -->				
			
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                    
					<div class="float-left">
                      <select class="form-control selectric">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
						<option>100</option>
                      </select>
                    </div>
                   
				   <div class="float-right">
                      <form action="user_role_view.php" method="post">
                        <div class="input-group">
                       <input type="text" id="search" name="search" class="form-control" value="<?php echo $_REQUEST['search'] ?>" onkeyup="this.value.function()" placeholder="Search by Role" title="Type a Role Name">                                                        
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>			

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
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
						  <th>S.No</th>						 
                          <th>Role Name</th> 						 						 						  
						  <th>Status</th>
                          <th hidden>View</th>
						  <th>Edit</th>
						  <th>Delete</th> 
                        </tr>
                       </thead>
					   
					   
					   		    <?php 
								$i1=0;
								  
								  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;								  
								  
								  $skey="%".$_POST['search']."%";

								  if($_POST['search']!='')
								  {
								  $pl="SELECT * FROM user_role  where role_name LIKE '$skey' ";
								  $Epl=mysqli_query($conn,$pl);						  									   									 									  							    
								  }
								  else
								  {
								  $pl="SELECT * FROM user_role order by role_id LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								  }
								  															
								?>								
                                <div class="row">
								  <?php
								    while($FEli=mysqli_fetch_array($Epl))
								     {
										 
										 $svm="SELECT count(role_id) AS total_count_userrole FROM user_role";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										 
										  $result1 ="SELECT count(role_id) AS id FROM user_role";
	                              $custCount =  mysqli_query($conn,$result1);
                                  $rowcount = mysqli_fetch_row($custCount); 
	                              $total = $rowcount[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 	
										 

			$total_count_pages= $pages;						  
	     	$total_count_userrole=$FEsvm['total_count_userrole'];	  
								    
									$i1++;
								   ?>
					   
					   
					   <?php
            	        // $i=0;
            	        // $li ="SELECT * FROM user_role WHERE role_id";
            	        // $Eli=mysqli_query($conn,$li);
                        // while($FEli=mysqli_fetch_array($Eli))						
            	        // {						
							
            		    // $i++;
            		   ?>
					   <tbody>
                        <tr>                     					
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                              <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
						  <td><?php echo $i1; ?></td>						  
                          <td><?php echo $FEli['role_name']; ?></td>						  						 						  
						  <td><?php echo $FEli['status']; ?></td>						  
						  <td hidden>
                            <a href="user_role_view.php?id=<?php echo $FEli['role_id']; ?>" class="btn btn-info btn-action mr-1"  data-toggle="tooltip" title="Customer Order Details View"><i class="fas fa-street-view"></i></a>                           
                          </td>
						  <td>
                            <a href="user_role_edit.php?id=<?php echo $FEli['role_id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      
						  </td>
						  <td>
						    <a href="user_role_delete.php?id=<?php echo $FEli['role_id']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						  </td>
                        </tr>
					   </tbody>
					  <?php } ?>					   
                      </table>
                    </div>				
					
								<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Products :  <?php echo $total_count_userrole;  ?></b></li>
				<!-- Dynamic Pagination -->                                                              
                                <div class="card-body float-right">
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination">                                   
									 <li class="page-item active"><a class="page-link" href="user_role_view.php?page=<?= $Previous; ?>">Previous </a></li>
                                     <?php for($i = 1; $i<= $page; $i++) : ?>
									 <li class="page-item"><a class="page-link" href="user_role_view.php?page=<?= $i; ?>">
									 <?php if($_REQUEST['page']==$i) {  ?>									  									  									 
									 <span style="color:red">
                                      <?php echo $i; ?>
									 </span>
									  <?php } else {
									    echo $i;									 										  
									   }
									  ?>							 
									 </a></li>
                                     <?php endfor;  ?>	
									 <li class="page-item active"><a class="page-link" href="user_role_view.php?page=<?php echo $Next; ?>">Next</a></li>
                                    </ul>
                                   </nav>
                                </div>                               
                               <!-- Dynamic Pagination End -->
					
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <!-- Section Body -->
        </section>
      </div>	  
	 <!-- Main Content -->
	 <script type="text/javascript">
	 $(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	 })
     </script>
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->