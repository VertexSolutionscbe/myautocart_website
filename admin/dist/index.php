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
<script> 
function getDetails() {
	
    var inputs = document.getElementById('Details').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_vendor.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#total").html(data);
		  }
		});
}
function getDetails1() {
	
    var inputs = document.getElementById('Details1').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_customer.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#total1").html(data);
		  }
		});
}
function getDetails2() {
	
    var inputs = document.getElementById('Details2').value;
    var inputs1 = document.getElementById('vendor').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_vendor_by_customer.php",
	
	data:{inputs:inputs,inputs1:inputs1},
	success: function(data){
		$("#total2").html(data);
		  }
		});
}
function getDetails5() {
	
    var inputs = document.getElementById('Details5').value;
    var inputs1 = document.getElementById('vendor5').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_vendor_by_customers.php",
	
	data:{inputs:inputs,inputs1:inputs1},
	success: function(data){
		$("#total5").html(data);
		  }
		});
}
function getDetails3() {
	
    var inputs = document.getElementById('Details3').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_service.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#total3").html(data);
		  }
		});
}
function getDetails4() {
	
    var inputs = document.getElementById('Details4').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_sales.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#total4").html(data);
		  }
		});
}
</script>
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
			<div class="col-lg-4 col-md-4 col-sm-12" >
              <div class="card card-statistic-2" >
                <div class="card-stats" >
                  <div class="card-stats-title">Number of Vendors signed up
				 <select style="border:none" type="text" class="form-control" name="Details" id="Details" onchange="getDetails();" >
                  <option value="0">--Select Type--</option>
                  <option value="1">Weekly</option>
                  <option value="2">Monthly</option>
                  <option value="3">Quarterly</option>
				    </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-male"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total"></div>                                   
                </div>
              
              </div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Number of Customer signedup
				 <select style="border:none" type="text" class="form-control" name="Details1" id="Details1" onchange="getDetails1();" >
                  <option value="0">--Select Type--</option>
                  <option value="1">Weekly</option>
                  <option value="2">Monthly</option>
                  <option value="3">Quarterly</option>
				    </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total1"></div>                                   
                </div>
              
              </div>
            </div>
				<div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Number of Customers by Vendor Order products
				    <select style="border:none" type="text" class="form-control" name="Details2" id="Details2" onchange="getDetails2();" >
                      <option value="0">--Select Type--</option>
                      <option value="1">Weekly</option>
                      <option value="2">Monthly</option>
                      <option value="3">Quarterly</option>
				    </select>
					
					<select style="border:none" type="text" class="form-control" name="vendor" id="vendor" onchange="getDetails2();" >
                     <option value="0">--Select Vendor Name--</option>
                     <?php 
				      $cx="select * from tbl_vendor where Status='Active'";
				      $dx=mysqli_query($conn,$cx);
				      while($xd=mysqli_fetch_array($dx))
				       {
				     ?>
				     <option value="<?php echo $xd['vendor_id']; ?>"><?php echo $xd['vendor_name']; ?></option>
					 <?php } ?>				  
				   </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total2"></div>                                   
                </div>
              
              </div>
            </div>
				<div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Number of Customers by Vendor Booked Service
				 <select style="border:none" type="text" class="form-control" name="Details5" id="Details5" onchange="getDetails5();" >
                  <option value="0">--Select Type--</option>
                  <option value="1">Weekly</option>
                  <option value="2">Monthly</option>
                  <option value="3">Quarterly</option>
				    </select>
					
					 <select style="border:none" type="text" class="form-control" name="vendor5" id="vendor5" onchange="getDetails5();" >
                  <option value="0">--Select Vendor Name--</option>
                   <?php 
				  $cx="select * from tbl_vendor where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['vendor_id']; ?>"><?php echo $xd['vendor_name']; ?></option>
				  <?php
				  }
				  ?>
				    </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total5"></div>                                   
                </div>
              
              </div>
            </div>
					<div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Number of Services Done By Customers
				 <select style="border:none" type="text" class="form-control" name="Details3" id="Details3" onchange="getDetails3();" >
                  <option value="0">--Select Type--</option>
                  <option value="1">Weekly</option>
                  <option value="2">Monthly</option>
                  <option value="3">Quarterly</option>
				    </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-wrench"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total3"></div>                                   
                </div>
              
              </div>
            </div>	
			<div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Number of Sales Done By Customers
				 <select style="border:none" type="text" class="form-control" name="Details4" id="Details4" onchange="getDetails4();" >
                  <option value="0">--Select Type--</option>
                  <option value="1">Weekly</option>
                  <option value="2">Monthly</option>
                  <option value="3">Quarterly</option>
				    </select>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-car"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
				  <?php
				  $total=0
				  ?>
                  <div class="card-body" id="total4"></div>                                   
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
            <div class="col-md-12">			
              <div class="card">
                <div class="card-header">
                  <h4>Products Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th style="width:11%">Invoice ID</th>
                        <th style="width:11%">Order No</th>
						<th>Customer</th>
                        <th style="width:13%">Date</th>
						<th>Products Name</th>
						<th>Status</th>                       
                        <th>Action</th>
                      </tr>
					  <?php																	                                        
                        $i=0;
										  
                            $sa="SELECT * FROM `tbl_invoice_details` WHERE id";
							$Esa=mysqli_query($conn,$sa);				
		                    while($FEsa=mysqli_fetch_array($Esa)){
											  						      											  
								$tc="select * from tbl_customer WHERE customer_id='".$FEsa["customer_id"]."'";
							    $Etc=mysqli_query($conn,$tc);
	                            $FEtc=mysqli_fetch_array($Etc);	
											  										  											  											  											  											  
								    $svn="select * from tbl_products WHERE product_id='".$FEsa["product_id"]."'";
	                                $Esvn=mysqli_query($conn,$svn);
	                                $FEsvn=mysqli_fetch_array($Esvn);																					  											 											 										 											 											 							  
										  
								    $i++;
		               ?>                  					   					  
					  <tr>
                        <td><a href="product_invoice_details_view.php?id=<?php echo $FEsa['id']; ?>"><?php echo $FEsa['inv_no']; ?></a></td>
                        <td><?php echo $FEsa['OrderNo']; ?></td>
						<td class="font-weight-600"><?php echo $FEtc['f_name']; ?></td>
                        <td><?php echo $FEsa['order_date']; ?></td>
						<td><?php echo $FEsvn['product_title']; ?></td>						
						<?php if($FEsa['status']=='Active') { ?>
						<td><div class="badge badge-success">paid</div></td>
                        <?php } else { ?>						
                        <td><div class="badge badge-warning">Unpaid</div></td> 
						<?php } ?>
						<td>
                          <a href="product_invoice_details_view.php?id=<?php echo $FEsa['id']; ?>" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
					 <?php } ?>                                                               
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  
		  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Services Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped table-dark">
                      <tr>
                        <th style="width:11%">Invoice ID</th>
                        <th style="width:11%">Order No</th>
						<th>Customer</th>
                        <th style="width:13%">Date</th>
						<th>Services Name</th>
						<th>Status</th>                       
                        <th>Action</th>
                      </tr>
					  <?php																	                                        
                        $j=0;
										  
                            $sa1="SELECT * FROM `tbl_service_invoice_details` WHERE id";
							$Esa1=mysqli_query($conn,$sa1);				
		                    while($FEsa1=mysqli_fetch_array($Esa1)){
											  						      											  
								$tc1="select * from tbl_customer WHERE customer_id='".$FEsa1["customer_id"]."'";
							    $Etc1=mysqli_query($conn,$tc1);
	                            $FEtc1=mysqli_fetch_array($Etc1);	
								
                                    $st="SELECT * FROM `tbl_services` WHERE id='".$FEsa1['vendor_service_id']."'";
									$Est=mysqli_query($conn,$st);
								    $FEst=mysqli_fetch_array($Est);								
								     
								 /* $vs="SELECT * FROM `tbl_vendor_services` WHERE category_id='".$FEsa["category_id"]."' AND service_id='".$FEsa['vendor_service_id']."'";
									$Evs=mysqli_query($conn,$vs);
									$FEvs=mysqli_fetch_array($Evs);  */
                                               											  											   																			  											 											 										 											 											 							  										  
						$j++;		    
		               ?>                             
                      <tr>
                        <td><a href="service_invoice_details_view.php?id=<?php echo $FEsa1['id']; ?>"><?php echo $FEsa1['inv_no']; ?></a></td>
						<td><?php echo $FEsa1['service_order_no']; ?></td>
                        <td class="font-weight-600"><?php echo $FEtc1['f_name']; ?></td>
                        <td><?php echo $FEsa1['appointment_date']; ?></td>
						<td><?php echo $FEst['service_name']; ?></td>						
						<?php if($FEsa1['status'] == 'Active'){ ?>
						<td><div class="badge badge-success">Paid</div></td>                       
                        <?php } else { ?>
						<td><div class="badge badge-warning">Unpaid</div></td> 
						<?php } ?>						
						<td>
                          <a href="service_invoice_details_view.php?id=<?php echo $FEsa1['id']; ?>" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
					  <?php } ?>					  
                    </table>
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