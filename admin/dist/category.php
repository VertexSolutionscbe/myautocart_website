     <!--- Header Area --->
	    <?php require_once('header.php');
              error_reporting(0);
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
            <h1>Category</h1>
            <div class="section-header-button">
              <a href="categoryadd.php" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Category</a></div>
              <div class="breadcrumb-item">All Category</div>
            </div>
          </div>
		  <!-- Section Body -->
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p>          
			
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                <div class="float-left">
				     <form method="post" action="#">
						<select name="limit-records" class="form-control selectric" id="limit-records">							
							<?php foreach([10,100,500,1000,5000,10000,50000,100000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>							
						</select>
					 </form>
				    </div>	
             
	             <div class="float-right">
                      <form action="category.php" method="post">
                        <div class="input-group">
                       <input type="text" id="search" name="search" class="form-control" value="<?php echo $_REQUEST['search'] ?>" onkeyup="this.value.function()" placeholder="Search by Category" title="Type a category">                                                        
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>
					
					<div class="text-center" style="margin-top: 20px; " class="col-md-2" hidden>
				     <form method="post" action="#">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([10,100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
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
                          <th>Category Name</th>                          
                          <th>Edit</th>
                          <th hidden>Delete</th>                          						  						  
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
								  $pl="SELECT * FROM tbl_category  where category_name LIKE '$skey' ";
								  $Epl=mysqli_query($conn,$pl);						  									   									 									  							    
								  }
								  else
								  {
								  $pl="SELECT * FROM tbl_category WHERE status='Active' ORDER BY category_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								  }
								  															
								?>								
                                <div class="row">
								  <?php
								    while($row=mysqli_fetch_array($Epl))
								     {
										 
										 $svm="SELECT count(category_id) AS total_count_categories FROM tbl_category";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										 
								  $result1 ="SELECT count(category_id) AS id FROM tbl_category";
	                              $custCount =  mysqli_query($conn,$result1);
                                  $rowcount = mysqli_fetch_row($custCount); 
	                              $total = $rowcount[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 	
										 
            $total_count_pages= $pages;						  
	     	$total_count_categories=$FEsvm['total_count_categories'];
										  
								     $i1++;
								   ?>
					   
					   
					   <?php
            	        // $i=0;
            	        // $statement = $pdo->prepare("SELECT * FROM tbl_category WHERE status='Active' ORDER BY category_id ASC");
            	        // $statement->execute();
            	        // $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	        // foreach ($result as $row) {
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
                          <td><?php echo $row['category_name']; ?></td>                                                                                                                                                        
						  <td>
                            <a href="categoryedit.php?id=<?php echo $row['category_id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                           
                          </td>
						  <td hidden>
						    <a href="categorydelete.php?id=<?php echo $row['category_id']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						  </td>
                        </tr>
					   </tbody>
					  <?php } ?>					   
                      </table>
                    </div>				
					
								<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Categories :  <?php echo $total_count_categories;  ?></b></li>
																								
								<!-- Dynamic Pagination -->                                                               
                                <div class="card-body float-right">
                                  <nav aria-label="Page navigation example" class="pagination_area">
                                    <ul class="pagination">                                   
									 <li class="page-item active"><a class="page-link" href="category.php?page=<?= $Previous; ?>">Previous </a></li>
                                     <?php for($i = 1; $i<= $page; $i++) : ?>
									 <li class="page-item"><a class="page-link" href="category.php?page=<?= $i; ?>">
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
									 <li class="page-item active"><a class="page-link" href="category.php?page=<?php echo $Next; ?>">Next</a></li>
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