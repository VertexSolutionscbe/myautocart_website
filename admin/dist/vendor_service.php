     <!--- Header Area --->
	    <?php require_once('header.php');
error_reporting(0);
		?>
	 <!--- Header End --->
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Vendor Services</h1>
            <div class="section-header-button">
              <a href="vendor_service_add.php" class="btn btn-primary">Add New Service</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Brands</a></div>
              <div class="breadcrumb-item">All Services</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Services</h4>
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
                  <h4>Vendor Services</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                      <table class="table table-striped" id="tableData" value="10">
					   <thead>
                        <tr>
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
						  <th>S.No</th>
						  <th>photo</th>
                          <th>Vendor Name</th>						  
                          <th>Category Name</th>						  
                          <th>Service Name</th>						  
                          <th>Vehicle Segment</th>						  
                          <th>Amount</th>						  
                          <th>Edit</th>
                          <th>Delete</th>                          						  						  
                        </tr>
                       </thead>
					   
					   
					   		   	    <?php 
								$i1=0;
								  
								  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;								  
								  
								  $pl="SELECT t1.*,t2.vendor_name,t3.category_name,t4.service_name,t5.segment FROM tbl_vendor_services t1 LEFT JOIN tbl_vendor t2 ON t1.vendor_id=t2.vendor_id LEFT JOIN tbl_category t3 ON t1.category_id=t3.category_id  LEFT JOIN tbl_services t4 ON t1.service_id=t4.id Left JOIN tbl_segment t5 On t1.vehicle_segment_id=t5.id order by id desc LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								
								  															
								?>								
                                <div class="row">
								  <?php
								    while($row=mysqli_fetch_array($Epl))
								     {
										 
									      $svm="SELECT count(id) AS total_count_services FROM tbl_vendor_services";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										 
										 
								  $result1 ="SELECT count(id) AS id FROM tbl_vendor_services";
	                              $custCount =  mysqli_query($conn,$result1);
                                  $rowcount = mysqli_fetch_row($custCount); 
	                              $total = $rowcount[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 	
										 
			$total_count_pages= $pages;						  
	     	$total_count_services=$FEsvm['total_count_services'];						  
				  
								     $i1++;
								   ?>
					   
					   
					   
					   <?php
            	        // $i=0;
						/* $statement = $pdo->prepare("SELECT * FROM tbl_product_details ORDER BY product_id ASC"); */
	                    // $statement = $pdo->prepare(" SELECT t1.*,t2.vendor_name,t3.category_name,t4.service_name,t5.segment FROM tbl_vendor_services t1 LEFT JOIN tbl_vendor t2 ON t1.vendor_id=t2.vendor_id LEFT JOIN tbl_category t3 ON t1.category_id=t3.category_id  LEFT JOIN tbl_services t4 ON t1.service_id=t4.id Left JOIN tbl_segment t5 On t1.vehicle_segment_id=t5.id order by id desc");            	        
						// $statement = $pdo->prepare(" SELECT * from tbl_vendor_services order by id desc");            	        
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
		  <td>
						    <?php
							 if($row['photo'] == '')
							  {
								 echo '<img src="../dist/uploads/no-photo1.jpg" alt="" style="width:100px;">';
							  }
							 else
							  {
								 echo '<img src="'.$row['photo'].'"  style="width:100px;">';
							  }
							?>						   
						  </td> 					<td> <?php echo $row['vendor_name']; ?></td>
					<td> <?php echo $row['category_name']; ?></td>
					<td> <?php echo $row['service_name']; ?></td>
					<td> <?php echo $row['segment']; ?></td>
					<td> <?php echo $row['amount']; ?></td>
						  <td>
                            <a href="vendor_service_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                           
                          </td>
						  <td>
						    <a href="vendor_service_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						  </td>
                        </tr>
					   </tbody>
						<?php } ?>					   
                      </table>
                    </div>
					
					

					
									<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Services :  <?php echo $total_count_services;  ?></b></li>
					<!-- Dynamic Pagination -->                                                              
                                <div class="card-body float-right">
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination">                                   
									 <li class="page-item active"><a class="page-link" href="vendor_service.php?page=<?= $Previous; ?>">Previous </a></li>
                                     <?php for($i = 1; $i<= $page; $i++) : ?>
									 <li class="page-item"><a class="page-link" href="vendor_service.php?page=<?= $i; ?>">
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
									 <li class="page-item active"><a class="page-link" href="vendor_service.php?page=<?php echo $Next; ?>">Next</a></li>
                                    </ul>
                                   </nav>
                                </div>                               
                               <!-- Dynamic Pagination End -->	
					

					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>	  
	  <!-- Main Content -->         
      
	  
 <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
(function($) {
  $(function() {
    $.widget("zpd.paging", {
      options: {
        limit: 5,
        rowDisplayStyle: "block",
        activePage: 0,
        rows: []
      },
      _create: function() {
        var rows = $("tbody", this.element).children();
        this.options.rows = rows;
        this.options.rowDisplayStyle = rows.css("display");
        var nav = this._getNavBar();
        this.element.after(nav);
        this.showPage(0);
      },
      _getNavBar: function() {
        var rows = this.options.rows;
        var nav = $("<div>", { class: "paging-nav" });
        for (var i = 0; i < Math.ceil(rows.length / this.options.limit); i++) {
          this._on(
            $("<a>", {
              href: "#",
              text: i + 1,
              "data-page": i
            }).appendTo(nav),
            { click: "pageClickHandler" }
          );
        }
        //create previous link
        this._on(
          $("<a>", {
            href: "#",
            text: "<<",
            "data-direction": -1
          }).prependTo(nav),
          { click: "pageStepHandler" }
        );
        //create next link
        this._on(
          $("<a>", {
            href: "#",
            text: ">>",
            "data-direction": +1
          }).appendTo(nav),
          { click: "pageStepHandler" }
        );
        return nav;
      },
      showPage: function(pageNum) {
        var num = pageNum * 1; //it has to be numeric
        this.options.activePage = num;
        var rows = this.options.rows;
        var limit = this.options.limit;
        for (var i = 0; i < rows.length; i++) {
          if (i >= limit * num && i < limit * (num + 1)) {
            $(rows[i]).css("display", this.options.rowDisplayStyle);
          } else {
            $(rows[i]).css("display", "none");
          }
        }
      },
      pageClickHandler: function(event) {
        event.preventDefault();
        $(event.target).siblings().attr("class", "");
        $(event.target).attr("class", "selected-page");
        var pageNum = $(event.target).attr("data-page");
        this.showPage(pageNum);
      },
      pageStepHandler: function(event) {
        event.preventDefault();
        //get the direction and ensure it's numeric
        var dir = $(event.target).attr("data-direction") * 1;
        var pageNum = this.options.activePage + dir;
        //if we're in limit, trigger the requested pages link
        if (pageNum >= 0 && pageNum < this.options.rows.length) {
          $("a[data-page=" + pageNum + "]", $(event.target).parent()).click();
        }
      }
    });
  });
})(jQuery);

$(document).ready(function() {
  $("#tableData").paging({ limit: 5 });
});
</script>
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->