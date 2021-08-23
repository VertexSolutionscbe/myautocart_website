     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->
	 
     <?php 
      $statement = $pdo->prepare("SELECT * FROM tbl_user");
      $statement->execute();
      $total_user = $statement->rowCount();

      $statement = $pdo->prepare("SELECT * FROM tbl_category");
      $statement->execute();
      $total_category = $statement->rowCount();

      $statement = $pdo->prepare("SELECT * FROM tbl_products");
      $statement->execute();
      $total_brand = $statement->rowCount();
     ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Order Statistics - 
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
				  
				  	
                  <div class="card-stats-items">
				    <?php
				    $cor1="SELECT count(*) As 'count' FROM `tbl_confirm_orders` WHERE id And status='Pending'";
					$Ecor1=mysqli_query($conn,$cor1);
					$FEcor1=mysqli_fetch_array($Ecor1);

					$Pending  = $FEcor1['count'];					
					
					$cor3="SELECT count(*) As 'count' FROM `tbl_confirm_orders` WHERE id And status='Shipping'";
					$Ecor3=mysqli_query($conn,$cor3);
					$FEcor3=mysqli_fetch_array($Ecor3);
					
					$Shipping  = $FEcor3['count'];
					
					$cor4="SELECT count(*) As 'count' FROM `tbl_confirm_orders` WHERE id And status='Completed'";
					$Ecor4=mysqli_query($conn,$cor4);
					$FEcor4=mysqli_fetch_array($Ecor4);
					
					$Completed  = $FEcor4['count']; 
					
					/* $cor1="SELECT count(*) As 'count' FROM `tbl_confirm_orders` WHERE id";
					$Ecor1=mysqli_query($conn,$cor1);
					$FEcor1=mysqli_fetch_array($Ecor1); */

					$Total_Orders = $Pending + $Shipping + $Completed; 
				    ?>				    
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo $Pending; ?></div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo $Shipping; ?></div>
                      <div class="card-stats-item-label">Shipping</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo $Completed; ?></div>
                      <div class="card-stats-item-label">Completed</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body"><?php echo $Total_Orders ; ?></div>                                   
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Balance</h4>
                  </div>
                  <div class="card-body">
                    &#8377 187,13
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
				<?php
				 /* $li1 ="SELECT count(*) As count FROM tbl_confirm_orders ORDER BY id desc";
            	 $Eli1=mysqli_query($conn,$li1);
                 $FEli1=mysqli_fetch_array($Eli1); */
				 
				 $stot ="SELECT SUM(amount) As amount FROM tbl_confirm_orders ORDER BY id desc";
            	 $Estot=mysqli_query($conn,$stot);
                 $FEstot=mysqli_fetch_array($Estot);
				 
				 $sales_tot = $FEstot['amount'];
		         // $count     = $FEli1['count'];
				 ?>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sales</h4>
                  </div>
                  <div class="card-body">&#8377 <?php echo $sales_tot; ?></div>                                      
                </div>
              </div>
            </div>
          </div>
		  
          <div class="row">		    
            <div class="col-lg-8">
			  <?Php
              if($stmt = $conn->query("SELECT month, sale, profit FROM chart_data_column")){
              $php_data_array = Array(); 
              while ($row = $stmt->fetch_row()) { 
              $php_data_array[] = $row; 
                }
              }else{
               echo $conn->error;
              }
               echo "<script> var my_2d_sp = ".json_encode($php_data_array)." </script>";                                      
              ?>
              <div class="card">
                <div class="card-header">
                  <h4>Sales & Profit Chart</h4>
                </div>
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load('current', {packages: ['line']});
                  google.charts.setOnLoadCallback(drawChart);
	  
                  function drawChart() {       
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Month');
                    data.addColumn('number', 'Sale');
		            data.addColumn('number', 'Profit');		          
                    for(i = 0; i < my_2d_sp.length; i++)
                    data.addRow([my_2d_sp[i][0], parseInt(my_2d_sp[i][1]),parseInt(my_2d_sp[i][2])]);
                      var options = {
                      title: 'Sales Chart',
                      curveType: 'function',
		               width: 650,
                       height: 335,
                       legend: { position: 'bottom' }
                     };

                  var chart = new google.charts.Line(document.getElementById('linechart_material'));
                  chart.draw(data, options);
                   }
                </script>
                <div class="card-body">
                  <div id="linechart_material" height="158"></div>
                </div>
              </div>
            </div>
			
            <div class="col-lg-4">
              <div class="card gradient-bottom">			    
                <div class="card-header">
                  <h4>Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>					
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>					
                  </div>
                </div>				
                <div class="card-body" id="top-5-scroll">				  
                  <ul class="list-unstyled list-unstyled-border">
				    <?php
			        $i=0;					 
					 
            	     $li = "SELECT * FROM tbl_confirm_orders ORDER BY id desc Limit 5";
            	     $Eli=mysqli_query($conn,$li);
                     while($FEli=mysqli_fetch_array($Eli))						
            	      {	
                        $pro="SELECT * FROM `tbl_products` WHERE product_id='".$FEli['product_id']."'";
				        $Epro=mysqli_query($conn,$pro);
                        $FEpro=mysqli_fetch_array($Epro);
						
						$co = "SELECT count(*) As count FROM tbl_confirm_orders WHERE product_id='".$FEli['product_id']."' ORDER BY id desc";
					    $Eco=mysqli_query($conn,$co);	
					    $FEco=mysqli_fetch_array($Eco);
					 
					    $sales        = $FEco['count'];				  
						$product_name = $FEpro['product_title'];
						$photo        = $FEpro['photo'];
						$amount       = $FEli['amount'];
						
                    $i++;
				    ?>
                    <li class="media">
					  <?php
					   if($photo==''){
						 echo 'No Photo Found';
					   }else{
                         echo '<img src="../dist/uploads/'.$photo.'" alt="product" class="mr-3 rounded" width="55">';
					   }	 
					  ?>               
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small"><?php echo $sales; ?> Sales</div></div>
                        <div class="media-title"><?php echo $product_name; ?></div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">&#8377;  <?php echo $amount; ?></div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">&#8377;  38,700</div>
                          </div>
                        </div>
                      </div>
                    </li>                             					
                    <?php } ?>
				  </ul>				  
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">			   
                <div class="card-header">
                  <h4>Best Products</h4>
                </div>
                <div class="card-body">
				  <canvas id="myChart" hidden></canvas>
                  <div class="owl-carousel owl-theme" id="products-carousel">
				    <?php
			        $j=0;					 
					 
            	     $li2 = "SELECT * FROM tbl_confirm_orders ORDER BY id desc Limit 3";
            	     $Eli2=mysqli_query($conn,$li2);
                     while($FEli2=mysqli_fetch_array($Eli2))						
            	      {	
                        $pro1="SELECT * FROM `tbl_products` WHERE product_id='".$FEli2['product_id']."'";
				        $Epro1=mysqli_query($conn,$pro1);
                        $FEpro1=mysqli_fetch_array($Epro1);
						
						$co1 = "SELECT count(*) As count FROM tbl_confirm_orders WHERE product_id='".$FEli2['product_id']."' ORDER BY id desc";
					    $Eco1=mysqli_query($conn,$co1);	
					    $FEco1=mysqli_fetch_array($Eco1);
					 
					    $sales        = $FEco1['count'];				  
						$product_name = $FEpro1['product_title'];
						$photo        = $FEpro1['photo'];
						$amount       = $FEli2['amount'];
						$product_id   = $FEpro1['product_id'];
						
                    $j++;
				    ?>
                    <div>					
                      <div class="product-item pb-3">					
                        <div class="product-image">
						 <?php
						 if($photo==""){
						   echo 'No Photo Found';	 
						 }else{
                           echo '<img alt="image" src="../dist/uploads/'.$photo.'" class="img-fluid">';
						 }							 
						 ?>                         
                        </div>
                        <div class="product-details">
                          <div class="product-name"><?php echo $product_name; ?></div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="text-muted text-small"><?php echo $sales; ?> Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>					  
                      </div>					 
                    </div>					
                    <?php } ?> 	
					
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Top Districts</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-title mb-2">July</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">Tamil Nadu</div>
                            <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">Kerala</div>
                            <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">Karnataka</div>
                            <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-4">
                      <div class="text-title mb-2">August</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">New Delhi</div>
                            <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">Telangana</div>
                            <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="assets/modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40" hidden>
                          <div class="media-body ml-3">
                            <div class="media-title">Haryana</div>
                            <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		   <div class="row">
            <div class="col-md-12">
			  <?Php
              if($stmt = $conn->query("SELECT month, expanses, exp_fixed,exp_variable FROM chart_data_column_exp")){
              $php_data_array = Array(); 
              while ($row = $stmt->fetch_row()) { 
              $php_data_array[] = $row; 
                }
              }else{
               echo $conn->error;
              }
               echo "<script> var my_2d_Exp = ".json_encode($php_data_array)." </script>";                                      
              ?>
              <div class="card">
                <div class="card-header">
                  <h4>Expenses Chart</h4>
                </div>
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                 // google.charts.load('current', {packages: ['corechart']});
				 // google.charts.load('current', {packages: ['corechart']});
				    google.charts.load('current', {packages: ['bar']}); 
                  google.charts.setOnLoadCallback(drawChart);
	  
                  function drawChart() {       
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Month');                  
		            data.addColumn('number', 'Expenses');
		            // data.addColumn('number', 'Exp_fixed');
		            // data.addColumn('number', 'Exp_var');
                    for(i = 0; i < my_2d_Exp.length; i++)
                    data.addRow([my_2d_Exp[i][0], parseInt(my_2d_Exp[i][1])]);
                      var options = {
                      title: 'Expanses Chart',
                      curveType: 'function',
		               width: 1000,
                       height: 500,
                       legend: { position: 'bottom' }
                     };

                  // var chart = new google.visualization.LineChart(document.getElementById('container'));
				  // var chart = new google.visualization.ColumnChart(document.getElementById('container'));
				     var chart = new google.charts.Bar(document.getElementById('container'));
                  chart.draw(data, options);
                   }
                </script>
                <div class="card-body">
                  <div id="container" height="158"></div>
                </div>				
              </div>
            </div>
           </div>
		  
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Customers need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
	  
     <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->