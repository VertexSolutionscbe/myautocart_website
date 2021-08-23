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
            <h1>Order List</h1>
            <div class="section-header-button" hidden>
              <a href="categoryadd.php" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Order List</a></div>
              <div class="breadcrumb-item">All Order List</div>
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
                      <select class="form-control selectric">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
						<option>100</option>
                      </select>
                    </div>
	            

				<div class="float-right">
                      <form action="order_list.php" method="post">
                        <div class="input-group">
                       <input type="text" id="search" name="search" class="form-control" value="<?php echo $_REQUEST['search'] ?>" onkeyup="this.value.function()" placeholder="Search by Status" title="Type a Status">                                                        
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
                          <th>Customer Name</th> 
						  <th>E-mail</th>
						  <th hidden>Mobile</th>
						  <th hidden>Amount</th>
						  <th>Order Date</th>
						  <th>Order No</th> 
						  <th>Status</th>
                          <th>View</th>
						  <th>Edit</th> 
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
								  $pl="SELECT * FROM tbl_confirm_orders  where status LIKE '$skey' ";
								  $Epl=mysqli_query($conn,$pl);						  									   									 									  							    
								  }
								  else
								  {
								  $pl="SELECT * FROM tbl_confirm_orders  ORDER BY id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								  }
								  															
								?>								
                                <div class="row">
								  <?php
								    while($FEli=mysqli_fetch_array($Epl))
								     {
										 
										 $svm="SELECT count(id) AS total_count_orders FROM tbl_confirm_orders";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										 
							$cus="SELECT * FROM `tbl_customer` WHERE customer_id='".$FEli['customer_id']."'";
							$Ecus=mysqli_query($conn,$cus);
                            $FEcus=mysqli_fetch_array($Ecus);

	                              $total = $FEsvm[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 	
										 
            $total_count_pages= $pages;						  
	     	$total_count_orders=$FEsvm['total_count_orders'];
										  
								     $i1++;
								   ?>
					   
					   <?php
            	        // $i=0;
            	        // $li ="SELECT * FROM tbl_confirm_orders ORDER BY id desc";
            	        // $Eli=mysqli_query($conn,$li);
                        // while($FEli=mysqli_fetch_array($Eli))						
            	        // {
							// $cus="SELECT * FROM `tbl_customer` WHERE customer_id='".$FEli['customer_id']."'";
							// $Ecus=mysqli_query($conn,$cus);
                            // $FEcus=mysqli_fetch_array($Ecus);
							
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
                          <td><?php echo $FEcus['f_name']; ?></td>
						  <td><?php echo $FEcus['email']; ?></td>
						  <td hidden><?php echo $FEcus['mobile']; ?></td>
						  <td hidden><?php echo $FEli['amount']; ?></td>
						  <td><?php echo $FEli['order_date']; ?></td>
                          <td><?php echo $FEli['OrderNo']; ?></td>						  						  
						  <?php if($FEli['status']=='Completed') { ?>
						  <td><div class="badge badge-success"><?php echo $FEli['status']; ?></div></td>
						  <?php } elseif($FEli['status']=='Shipping') { ?>
						  <td><div class="badge badge-secondary"><?php echo $FEli['status']; ?></div></td>
						  <?php } else { ?>						  
						  <td><div class="badge badge-warning"><?php echo $FEli['status']; ?></div></td>
						  <?php } ?>
						  <td>
                            <a href="order_list_view.php?id=<?php echo $FEli['id']; ?>" class="btn btn-info btn-action mr-1"  data-toggle="tooltip" title="Customer Order Details View"><i class="fas fa-street-view"></i></a>                           
                          </td>
						  <td>
                            <a href="order_list_edit.php?id=<?php echo $FEli['id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      
						  </td>
                        </tr>
					   </tbody>
					  <?php } ?>					   
                      </table>
                    </div>				
					
					
								<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Orders :  <?php echo $total_count_orders;  ?></b></li>
									<div class="float-right">
								<nav aria-label="Page navigation example" class="pagination_area" >
                                  <ul class="pagination">								  
				                    <?php for($i = 1; $i<=$page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="order_list.php?page=<?php echo $i; ?> ?>">
									  <?php 
									  if($_REQUEST['page']==$i)
									  {
									  ?>
									  <span style="color:red">
									  <?php echo $i; ?>
									  </span>
									  <?php } 
									  else
									  {
										  echo $i;
									  }
									  ?>
									  
									  </a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="order_list.php?page=<?php echo $Next; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
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