        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->	
		
		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Best Car Services,Multi Brand Car Services & Repair Centre | myautocart</title>      
          <meta name="description" content="MyAutocart integrated all the Car Service stations in one platform and made it easier for customers to book Service online in India">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-159623414-1');
			  
function FindMinMax(){ 
     var minv = document.getElementById('one').value;
     var maxv = document.getElementById('two').value;
	 var catid=document.getElementById('cat').value;
	 //alert("min " + minv + " Max - "+maxv);
	  
$.ajax({
      type:'post',
        url:'aj_carservice_price_filter.php',// put your real file name 
        data: {minval: minv,maxval: maxv,category:catid},
        success:function(msg){
        //alert("min " + msg);
		$("#categories_product_area").html(msg);
       }
 });

}
			  
            </script>
	    </head>
				
        <!--================Categories Banner Area =================-->
        <section class="searchkey_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Product Search keys</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">Product Search keys</a></li>
                        <li class="current"><a href="#">Product Search keys</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="showing_fillter ">
                                <div class="row m0" >
                                    <div class="first_fillter" hidden>
                                        <h4>Showing Price Between <?php echo $_SESSION['minv']; ?> and <?php echo $_SESSION['maxv']; ?></h4>
                                    </div>
                                    <div class="secand_fillter" hidden>
                                        <h4>SORT BY :</h4>
                                        <select class="selectpicker">
                                            <option>Name</option>
                                            <option>Name 2</option>
                                            <option>Name 3</option>
                                        </select>
                                    </div>
                                    <div class="third_fillter" hidden>
                                        <h4>Show : </h4>
                                        <select class="selectpicker">
                                            <option>09</option>
                                            <option>10</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="four_fillter" hidden>
                                        <h4>View</h4>
                                        <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                        <a href="#"><i class="icon_grid-3x3"></i></a>
                                    </div>
                                </div>
                            </div>
							
                            <!-- Feature Products Car -->
							<div class="categories_product_area" id="categories_product_area">
							        <div class="first_fillter" hidden>
                                        <h6>Showing Price Between <?php echo $_SESSION['minv']; ?> and <?php echo $_SESSION['maxv']; ?></h6>
                                    </div>
							    <?php 
								// Products Start -->
								$skey="%".$_REQUEST['tags']."%";
								$smm="SELECT TRUNCATE(min(amount),0) as minv,TRUNCATE(max(amount),0) as maxv FROM tbl_vendor_services";
								$Esmm=mysqli_query($conn,$smm);
								$FEsmm=mysqli_fetch_array($Esmm);							
								
								$i1=0;
								  
								  //$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6;
								  $limit =12;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;

 $pl="select * from (select * from (SELECT vs.id as ID,CONCAT(ts.service_name, ' - ',seg.segment) ProductName,'tbl_services' as tbl  FROM  tbl_vendor_services vs 
left join tbl_services ts on vs.service_id=ts.id left join tbl_segment seg on seg.id=vs.vehicle_segment_id) as t1
UNION
SELECT product_id as ID,product_title as ProductName,'tbl_product' as tbl FROM tbl_products
UNION
SELECT category_id as ID,category_name as ProductName,'tbl_category' as tbl FROM tbl_category) as t2 where ProductName like '$skey'  LIMIT $start, $limit";
$Epl=mysqli_query($conn,$pl);	


//echo $result1;							  									   									 									  							    
$nr=mysqli_num_rows($Epl);
 $result1 ="select * from(SELECT vs.id as ID,CONCAT(ts.service_name, ' - ',seg.segment) ProductName,'tbl_services' as tbl  FROM  tbl_vendor_services vs 
left join tbl_services ts on vs.service_id=ts.id left join tbl_segment seg on seg.id=vs.vehicle_segment_id
UNION
SELECT product_id as ID,product_title as ProductName,'tbl_product' as tbl FROM tbl_products
UNION
SELECT category_id as ID,category_name as ProductName,'tbl_category' as tbl FROM tbl_category) as t2 where ProductName like '$skey'";
		
$custCount =  mysqli_query($conn,$result1);
$rowcount = mysqli_fetch_row($custCount);	
$total =  mysqli_num_rows($custCount);
//echo ( $total / $limit );

	                             $pages = ceil( $total / $limit );
	                             $Previous = $page - 1;
	                             $Next = $page + 1; 										  
								  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								      {
										  										   										  
										  // $result121 ="SELECT * from tbl_segment where id='".$Fpl['vehicle_segment_id']."'";
	                                      // $custCount21 =  mysqli_query($conn,$result121);
                                          // $rowcount221 = mysqli_fetch_array($custCount21);
										  										  										  	
									      $tname = $Fpl['ProductName'];									      
									      $tamount = $Fpl['product_amount'];									      
									      $id = $Fpl['ID'];
										  $tbl=$Fpl['tbl'];
										  if($tbl=="tbl_product")
										  {
											  $sp="select * from tbl_products where product_id='".$id."'";
											  $Esp=mysqli_query($conn,$sp);
											  $FEsp=mysqli_fetch_array($Esp);
										     $pagelink="new-cars-product-details.php?pid=".$id."&keys=".$_REQUEST['keys'];	  
										 /*  $pagelink="product-details.php?pid=".$id."&keys=".$_REQUEST['keys']; */
										  $poto = $FEsp['photo'];
										  }
										  else if($tbl=="tbl_services")
										  {
										 $result12 ="SELECT * from tbl_vendor_services where id='".$id."'";
	                                     $custCount2 =  mysqli_query($conn,$result12);
                                         $rowcount22 = mysqli_fetch_array($custCount2);
										  $pagelink="car-services_view.php?pid=".$id."&keys=".$_REQUEST['keys'];
										  $poto = $rowcount22['photo'];
										  }
										  else if($tbl=="tbl_category")
										  {
											  $poto="logo/Logo-12.png";
											  if($tname=='New Cars')
											  {
												$pagelink="new-cars.php?cid=".$id;  
											  }
											  else if($tname=='Used Cars')
											  {
												$pagelink="used-cars.php?cid=".$id;  
											  }
											  else if($tname=='Insurance')
											  {
												$pagelink="insurance.php?cid=".$id;  
											  }
											  else if($tname=='Car Service Franchisee')
											  {
												$pagelink="car-service-franchisee.php?cid=".$id;  
											  }
											  else if($tname=='Car Wash')
											  {
												$pagelink="car-services.php?cid=".$id;  
											  }
											  else if($tname=='Car Spares')
											  {
												$pagelink="car-spares.php?cid=".$id;  
											  }
											  else if($tname=='Car Wash Equipments')
											  {
												$pagelink="car-wash-equipments.php?cid=".$id;  
											  }
											  else if($tname=='Extras')
											  {
												$pagelink="extras.php?cid=".$id;  
											  }
											  else if($tname=='Car Detailing')
											  {
												$pagelink="car-services.php?cid=".$id;  
											  }
											  else if($tname=='Detailing Equipments')
											  {
												$pagelink="car_detailing_equipments.php?cid=".$id;  
											  }
											  
										  
										  }										  										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a  href="<?php echo $pagelink; ?>"><img src="<?php echo $poto; ?>" alt="" style="height:16 0px"></a>
                                                <h5 class="new" hidden></h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>  
                                                
                                                  <li><a class="add_cart_btn" href="<?php echo $pagelink; ?>">View</a></li>
                                                </ul>
                                                
                                                <h6> <?php echo "</br>"; ?></h6>
                                                <h6> <?php echo $tname; ?></h6>

                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>
								
			
																						
                            </div>
							<!-- Feature Products Car End -->							
                        </div>
						
                        <div class="col-lg-3">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Categories</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                                                                                                                                                                                      
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Categories
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											  <?php
		                                       $i=0;
		                                        $ctgry="SELECT * FROM tbl_category WHERE category_id AND status='Active' ORDER BY category_id ASC";
		                                        $qctgry=mysqli_query($conn,$ctgry);
		                                        while($fctgry=mysqli_fetch_array($qctgry))
									             {									   
									               $result1 = $fctgry['category_id'];
									               $result2 = $fctgry['category_name'];									   
								               $i++;					   
		                                      ?>
											  <?php if($fctgry['category_name']=='New Cars'){ ?>
                                                <li class="nav-item"><a class="nav-link" href="new-cars.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Used Cars') { ?>
											    <li class="nav-item"><a class="nav-link" href="used-cars.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Insurance') { ?>
											    <li class="nav-item"><a class="nav-link" href="insurance.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Service Franchisee') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-service-franchisee.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Wash') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Spares') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-spares.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Wash Equipments') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-wash-equipments.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Extras') { ?>
											    <li class="nav-item"><a class="nav-link" href="extras.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Detailing') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>	
											  <?php if($fctgry['category_name']=='Detailing Equipments') { ?>
											    <li class="nav-item"><a class="nav-link" href="car_detailing_equipments                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             .php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php } ?>
                                            </ul>
                                        </li>
										<li class="nav-item" hidden>
                                            <a class="nav-link" href="#">Men’s Fashion
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li> 									
                                    </ul>
                                </aside>                                
	                           					
                                <fieldset class="filter-price" hidden>
								    <div class="l_w_title">
                                        <h3>Filter section</h3>
                                    </div>
									<?php 
									
									?>
                                    <div class="price-field">
                                       <input type="range"  min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['minv']; ?>" id="lower" name="lower" onChange="FindMinMax()">
                                       <input type="range"  min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['maxv']; ?>" id="upper" name="upper" onChange="FindMinMax()">
									   <input id="cat" name="cat" type="hidden" value="<?php echo $_REQUEST['cid']; ?>">
                                    </div>
                                    <div class="price-wrap">
                                     <span class="price-title">Price :</span>
                                       <div class="price-wrap-1">                                                                               
                                         <input id="one">
									   </div>
                                     <div class="price-wrap_line">-</div>
                                      <div class="price-wrap-2">                                                                              
										 <input id="two">
                                      </div>
                                    </div>                                
                                </fieldset> 
								
                                <aside class="l_widgest l_p_categories_widget" hidden>
                                  <div class="l_w_title">
                                    <h3>Brand</h3>
                                  </div>
                                    <ul class="navbar-nav">                                        
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            All Brands
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<?php
									         $j=0;
									
									         $br="SELECT * FROM `tbl_make` ORDER BY id";
									         $Ebr=mysqli_query($conn,$br);
									         while($FEbr=mysqli_fetch_array($Ebr)){
										 
										         $brand_id   = $FEbr['id'];
										         $brand_name = $FEbr['make'];										 									
										 									 
									         $j++; 
									         ?>                                              												
												 <?php if($FEbr['id']=='1'){ ?>
									                <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Audi</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='2') { ?>
									                <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BMW</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='3') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Chevrolet</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='4') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Fiat</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='5') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Ford</a></li>
									             <?php } ?>	
									             <?php if($FEbr['id']=='7') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Maruthi Suzuki</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='8') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mahindra</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='10') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Nissan</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='11') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Skoda</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='12') { ?>
										           <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Tata</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='13') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Rolls Royce</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='14') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Volkswagen</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='15') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Volvo</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='16') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Toyota</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='17') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Hyundai</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='18') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mitsubishi</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='19') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mini</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='20') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Datsun</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='21') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Renault</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='22') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Lamborghini</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='23') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Land Rover</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='24') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Jaguar</a></li>
									             <?php } ?>									
									             <?php if($FEbr['id']=='26') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Jeep</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='27') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Lexus</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='28') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Honda</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='29') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Suzuki</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='33') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BMW</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='46') { ?> 
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">DC</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='47') { ?>
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">OPEL</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='48') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">MG HECTOR</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='49') { ?>  
									              <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Hindustan motors</a></li>																		
									             <?php } ?> 
									             <?php if($FEbr['id']=='54') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Dodge</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='56') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Daihatsu</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='57') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Daewoo</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='71') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">GMC</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='72') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Ferrari</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='74') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">GAC</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='82') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Isuzu</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='93') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mazda</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='97') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">KIA</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='98') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">INFINITI</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='102') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Peugeot</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='103') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Porsche</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='114') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Any Brand</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='116') { ?>  
									               <li class="nav-item"><a class="nav-link" href="car-services.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mercedes Benz</a></li>
									             <?php } ?>  									   
									             <?php } ?>													
                                            </ul>
                                        </li>                                                                              
                                    </ul>
                                </aside>
								
                                <aside class="l_widget l_feature_widget">
                                    <div class="verticalCarousel">
                                        <div class="verticalCarouselHeader">
                                            <div class="float-md-left">
                                                <h3>Featured Services</h3>
                                            </div>
                                            <div class="float-md-right">
                                                <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                                <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                            </div>
                                        </div>
                                        <?php	
                                        //Listing Feature Products Start
                                          $qfp="select * from  tbl_vendor_services where category_id='10' order by id desc limit 0 ,10";
                                          $Eqfp=mysqli_query($conn,$qfp);
                                          $sizeFProducts=mysqli_num_rows($Eqfp);
										  $imageurl="admin/dist/uploads/";
                                        //Listing Feature  Products End
                                         ?>
                                        <ul class="verticalCarouselGroup vc_list">
                                            <?php 
								              while($resultFProducts=mysqli_fetch_array($Eqfp)) {

                                              $result12 ="SELECT * from tbl_services where id='".$resultFProducts['service_id']."'";
	                                          $custCount2 =  mysqli_query($conn,$result12);
                                              $rowcount22 = mysqli_fetch_array($custCount2);												 
								            ?>
                                            <li>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="70px" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $rowcount22["service_name"]; ?></h4>
                                                        <h5> &#8377; <?php echo $resultFProducts["amount"]; ?></h5>
                                                    </div>
                                                </div>
                                            </li>
								         <?php } ?>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->

<script>
var lowerSlider = document.querySelector('#lower');
var  upperSlider = document.querySelector('#upper');

document.querySelector('#two').value=upperSlider.value;
document.querySelector('#one').value=lowerSlider.value;

var  lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
        upperSlider.value = 4;
        }
    }
    document.querySelector('#two').value=this.value
};

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#one').value=this.value
};
</script>		
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      