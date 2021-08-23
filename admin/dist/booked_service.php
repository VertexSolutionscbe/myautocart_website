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
            <h1>Booked Service List</h1>
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
                      <form action="booked_service.php" method="post">
                        <div class="input-group">
                       <input type="text" id="search" name="search" class="form-control" value="<?php echo $_REQUEST['search'] ?>" onkeyup="this.value.function()" placeholder="Search by Status" title="Type a Status">                                                        
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>			

        <div class="table-responsive table-invoice">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Booked Service</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  
                    <table class="table table-striped">
                      <tr>
					    <th>S.No</th>
                        <th>Order No</th>
                        <th>Customer</th>
						<th>Appointment Date</th>
						<th>Appointment Time</th>						
						<th>Category</th>
						<th>Vendor Name</th>
						<th>Service Name</th>
						<th>Price</th>
						<th>Total</th>
                        <th>Status</th>
						<th>View</th>
                        <th>Action</th>
                      </tr>
								<?php 
								 $i1=0;
								   
		                          $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;								  
								        
								  $skey="%".$_POST['search']."%";

								  if($_POST['search']!='')
								  {
								  $pl="SELECT * FROM tbl_service_appointment  where  service_status LIKE '$skey' ";
								  $Epl=mysqli_query($conn,$pl);						  									   									 									  							    
								  }
								  else
								  {	
								  $pl="SELECT * FROM tbl_service_appointment ORDER BY appointment_id DESC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								  }							  															
								?>								
                                <div class="row">
								  <?php
								    while($FEsa=mysqli_fetch_array($Epl))
								     {
										  				
                                           $svm="SELECT count(appointment_id) AS total_count_service_appoinment FROM tbl_service_appointment";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										  
	                              $total1 = $FEsvm[0];
	                              $pages = ceil( $total1 / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 
														
														
									$total_count_pages= $pages;						  
	     	                        $total_count_service_appoinment=$FEsvm['total_count_service_appoinment'];
														
														
											  $row = $FEsa['appointment_id'];
											  
											  $tc="select * from tbl_customer WHERE customer_id='".$FEsa["customer_id"]."'";
											  $Etc=mysqli_query($conn,$tc);
	                                          $FEtc=mysqli_fetch_array($Etc);	
											  										  											  											  											  											  
											  $svn="select vendor_name from tbl_vendor WHERE vendor_id='".$FEsa["vendor_id"]."'";
	                                          $Esvn=mysqli_query($conn,$svn);
	                                          $FEsvn=mysqli_fetch_array($Esvn);																					  											 											 										 
											 
											  $pc="SELECT * FROM `tbl_category` WHERE category_id=".$FEsa["category_id"]."";
											  $Epc=mysqli_query($conn,$pc);
											  $FEpc=mysqli_fetch_array($Epc);
											  
											  $st="SELECT * FROM `tbl_services` WHERE id='".$FEsa['vendor_service_id']."'";
											  $Est=mysqli_query($conn,$st);
											  $FEst=mysqli_fetch_array($Est);

                                              $vs="SELECT * FROM `tbl_vendor_services` WHERE category_id='".$FEsa["category_id"]."' AND service_id='".$FEsa['vendor_service_id']."'";
											  $Evs=mysqli_query($conn,$vs);
											  $FEvs=mysqli_fetch_array($Evs);

                                              $total=$FEvs['amount'];											  
										
										

										
										 $i1++;
		                                ?>
                      <tr>
					    <td><?php echo $i1; ?></td>
                        <td><a href="booked_service_view.php?id=<?php echo $FEsa['appointment_id']; ?>"><?php echo $FEsa['service_order_no']; ?></a></td>
                        <td class="font-weight-600"><?php echo $FEtc['f_name'];?></td>
						<td><?php echo $FEsa['appointment_date']; ?></td>
						<td><?php echo $FEsa['appointment_time']; ?></td>                       
                        <td><?php echo $FEpc['category_name']; ?></td>                      
                        <td><?php echo $FEsvn['vendor_name']; ?></td>
                        <td><?php echo $FEst['service_name']; ?></td>
						<td><?php echo $FEvs['amount']; ?></td>
						<td><?php echo $total; ?></td>
						<?php if($FEsa['service_status']=='Closed') { ?>
						<td><div class="badge badge-success"><?php echo $FEsa['service_status'] ?></div></td>
						<?php } elseif($FEsa['service_status']=='Assigned') { ?>
						  <td><div class="badge badge-secondary"><?php echo $FEsa['service_status']; ?></div></td>
						  <?php } else { ?>						  
						  <td><div class="badge badge-warning"><?php echo $FEsa['service_status']; ?></div></td>
						  <?php } ?>
						<td>
                          <a href="booked_service_view.php?id=<?php echo $FEsa['appointment_id']; ?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>                           
                        </td>
						<td>
                          <a href="booked_service_edit.php?id=<?php echo $FEsa['appointment_id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      						  
						</td>
						</tr>
		             <?php } ?>					  
                    </table>                
                </div>
				
				
												<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Booked Services :  <?php echo $total_count_service_appoinment;  ?></b></li>
			<!-- Dynamic Pagination -->                                                              
                                <div class="card-body float-right">
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination">                                   
									 <li class="page-item active"><a class="page-link" href="booked_service.php?page=<?= $Previous; ?>">Previous </a></li>
                                     <?php for($i = 1; $i<= $page; $i++) : ?>
									 <li class="page-item"><a class="page-link" href="booked_service.php?page=<?= $i; ?>">
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
									 <li class="page-item active"><a class="page-link" href="booked_service.php?page=<?php echo $Next; ?>">Next</a></li>
                                    </ul>
                                   </nav>
                                </div>                               
                               <!-- Dynamic Pagination End -->
				
				
				
              </div>
            </div>            			        
		  </div>				
					
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