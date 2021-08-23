     <!--- Header Area --->
	    <?php require_once('header.php');
		error_reporting(0); ?>
	 <!--- Header End --->
     <style>		  	  
	  #mouse_over {
      opacity: 0;
      }

      #mouse_over:hover {
      opacity: 1;
      }
	 </style>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>User Create</h1>
            <div class="section-header-button">
              <a href="user_create_add.php" class="btn btn-primary">Add New User</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Brands</a></div>
              <div class="breadcrumb-item">All Brands</div>
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
                    <h4>All Brands</h4>
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
                      <form action="make.php" method="post">
                        <div class="input-group">
                       <input type="text" id="search" name="search" class="form-control" value="<?php echo $_REQUEST['search'] ?>" onkeyup="this.value.function()" placeholder="Search by Make" title="Type a Brand">                                                        
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
					  <div class="card-header">
                       <h4>User Create View</h4>
                        <div class="card-header-action">
                          <a href="#" class="btn btn-primary">View All</a>
                        </div>
                      </div>
                      <table class="table table-striped" id="tableData">
					   <thead>
                        <tr>
                           <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>						
						  <th>S.No</th>
                          <th>Financial Year</th>				  
				          <th>Company Name</th>
				          <th>User Name</th>
                          <th>User Role</th>
						  <th>Password</th>                        						  						  						 						 						  						  
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
								  $pl="SELECT * FROM user_create  where  user_name  LIKE '$skey'";
								  $Epl=mysqli_query($conn,$pl);						  									   									 									  							    
								  }
								  else
								  {
								  $pl="SELECT * FROM user_create order by id DESC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								  }
								  															
								?>								
                                <div class="row">
								  <?php
								    while($FEuc=mysqli_fetch_array($Epl))
								     {
										$svm="SELECT count(id) AS total_count_usercreate FROM user_create";
                                        $Esvm=mysqli_query($conn,$svm);
                                        $FEsvm=mysqli_fetch_array($Esvm);
										 
							            $uc1="SELECT * FROM tbl_vendor WHERE vendor_id='".$FEuc['company_name']."'";
            	                        $Euc1=mysqli_query($conn,$uc1);
                                        $FEuc1=mysqli_fetch_array($Euc1);
										 
										 
										  $result1 ="SELECT count(id) AS id FROM user_create";
	                                      $custCount =  mysqli_query($conn,$result1);
                                          $rowcount = mysqli_fetch_row($custCount); 
	                                        
											$total = $rowcount[0];
	                                        $pages = ceil( $total / $limit );

	                                        $Previous = $page - 1;
	                                        $Next = $page + 1; 	
										 
                                            $total_count_pages= $pages;						  
	     	                                $total_count_usercreate=$FEsvm['total_count_usercreate'];
										  
								     $i1++;
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
						  <td><?php echo $FEuc['financial_year']; ?></td>
						  <td><?php echo $FEuc1['vendor_name']; ?></td>
						  <td><?php echo $FEuc['user_name']; ?></td>						 
                          <td><?php echo $FEuc['user_role']; ?></td>
						  <td>
						    <div style='border: 1px solid black; width: 120px; font-family: sans-serif'>
						    <div style='height: 20px; width: 110px; background-color: white; color: red;' id='mouse_over'> <?php echo $FEuc['password']; ?></div>
						  </td>						  						  
						  <td hidden>
                            <a href="user_create_view.php?id=<?php echo $FEuc['id']; ?>" class="btn btn-info btn-action mr-1"  data-toggle="tooltip" title="Customer Order Details View"><i class="fas fa-street-view"></i></a>                           
                          </td>
						  <td>
                            <a href="user_create_edit.php?id=<?php echo $FEuc['id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      
						  </td>
						  <td>
						    <a href="user_create_delete.php?id=<?php echo $FEuc['id']; ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
						  </td>
                       </tr>
					  </tbody>
						<?php } ?>					   
                    </table>
                    </div>
					   
				
					
							  <!-- Dynamic Pagination -->
							  <li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
							  <li>	<b>No of Brands :  <?php echo $total_count_usercreate;  ?></b></li>																								

                               <!-- Dynamic Pagination -->                                                              
                                <div class="card-body float-right">
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination">                                   
									 <li class="page-item active"><a class="page-link" href="user_create_view.php?page=<?= $Previous; ?>">Previous </a></li>
                                     <?php for($i = 1; $i<= $page; $i++) : ?>
									 <li class="page-item"><a class="page-link" href="user_create_view.php?page=<?= $i; ?>">
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
									 <li class="page-item active"><a class="page-link" href="user_create_view.php?page=<?php echo $Next; ?>">Next</a></li>
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