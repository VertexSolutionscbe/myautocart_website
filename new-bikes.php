    <!--- Header Area --->
	  <?php include('header.php'); ?>
	<!--- Header Area End --->
	  <!--- Heade Area --->
	  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='new-bikes.php'";
		 $Etg=mysqli_query($conn,$tg);
		 $FEtg=mysqli_fetch_array($Etg); 
		?>
		<title><?php echo $FEtg['title_tag']; ?></title>      
        <meta name="description" content="<?php echo $FEtg['metta_content']; ?>">   
        <meta name="viewport" content="width=20px, initial-scale=1">
        <meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" /> 

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
		<!-- <link rel="icon" href="admin/dist/img/favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->       

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/vertical-slider/css/jQuery.verticalCarousel.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
		<link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/> 
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <!--- Heade Area End --->	
		
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
	         // alert("min " + minv + " Max - "+maxv);
	  
            $.ajax({
              type:'post',
               url:'aj_newbikes_price_filter.php',// put your real file name 
               data: {minval: minv,maxval: maxv,category:catid},
               success:function(msg){
              // alert("min " + msg);
		      $("#categories_product_area").html(msg);
               }
             });
            }									
			
	        function WishList($pid,$cid,$cate){               
	          // var prodid=document.getElementById('like').value;	
			  // var customid=document.getElementById('like1').value;
			  // var cateid=document.getElementById('cate').value;			  
			   // alert(prodid);
			   // alert(customid);
			  var prodid=$pid;	
			  var customid=$cid;
			  var cateid=$cate;	
			  var prvid=$cate;//Have to change this into product vendor Id Value.For temp purpose $cate used as a value
              $.ajax({
               type:'post',
               url:'aj_wishlist.php',// put your real file name 
               data: {pid:prodid,cid:customid,category:cateid,pvid:prvid},
               success:function(msg){       
		      // $("#disprow").html(msg);
				  if(msg==1)
				  {
				  //alert("Item Already Added!");
				  $('#idalert').show();
				  $('#idalertsu').hide();
				  }
				  else
				  {
					  
					  $('#idalertsu').show();
					   $('#idalert').hide();
				  }
                }
              });
             }
          </script>			  	   
		
		<!--================Categories Banner Area =================-->
        <section class="new_bikes_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>New Bikes in india</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">New Bikes</a></li>
                        <li class="current"><a href="#">New Bikes</a></li>
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
                            <div class="showing_fillter" hidden>
                                <div class="row m0">
                                    <div class="first_fillter">
                                        <h4>Showing 1 to 12 of 30 total</h4>
                                    </div>
                                    <div class="secand_fillter">
                                        <h4>SORT BY :</h4>
                                        <select class="selectpicker">
                                            <option>Name</option>
                                            <option>Name 2</option>
                                            <option>Name 3</option>
                                        </select>
                                    </div>
                                    <div class="third_fillter">
                                        <h4>Show : </h4>
                                        <select class="selectpicker">
                                            <option>09</option>
                                            <option>10</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="four_fillter">
                                        <h4>View</h4>
                                        <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                        <a href="#"><i class="icon_grid-3x3"></i></a>
                                    </div>
                                </div>
                            </div>
							
                            <!-- Feature Products Car -->
							<div class="categories_product_area" id="categories_product_area" name="categories_product_area">
							  <div class="showing_fillter">
                               <div class="row m0">
                                <div class="first_fillter">
                                  <h4>Showing Price Between <b><?php echo $_SESSION['minv']; ?></b> and <b><?php echo $_SESSION['maxv']; ?></b> </h4>
                                </div>                                                                                                          
                               </div>
                              </div>
						<div id="idalert" name="namealert" style="display: none;">	
						<div class="alert alert-danger alert-dismissible" role="alert">
						 
							Item Already Exist in your Wish list !
						</div>
						</div>	
						
						<div id="idalertsu" name="namealertsu" style="display: none;">	
						<div class="alert alert-success alert-dismissible" role="alert">
						 
							Item Added in your Wish list !
						</div>
						</div>	
								<?php 
								// Products Start -->
								$i1=0;
								// Price Filter -->
								$smm="SELECT TRUNCATE(min(product_amount),0) as minv,TRUNCATE(max(product_amount),0) as maxv FROM tbl_products";
								$Esmm=mysqli_query($conn,$smm);
								$FEsmm=mysqli_fetch_array($Esmm);																							
								  
								  //$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6; -->
								  $limit =6;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;
								  
                                 if(isset($_REQUEST['cname']))
                                  {
	                               $_SESSION['minv']=$FEsmm['minv'];
	                               $_SESSION['maxv']=$FEsmm['maxv'];
		                           $pl="SELECT * FROM tbl_products Where category_id='".$_REQUEST['cid']."' OR vehicle_segment_id='".$_REQUEST['sgid']."' ORDER BY product_id ASC LIMIT $start, $limit";
                                   $result1 ="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' OR vehicle_segment_id='".$_REQUEST['sgid']."' ORDER BY product_amount";
                                  }
                                 if($_REQUEST['cname']=='')
                                  {	
	                               $pl="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' OR vehicle_segment_id='".$_REQUEST['sgid']."' AND (product_amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by product_amount LIMIT $start, $limit";
	                               $result1 ="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' OR vehicle_segment_id='".$_REQUEST['sgid']."' AND (product_amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by product_amount";
                                  }                               
                                    $Epl=mysqli_query($conn,$pl);	
                                  						  									   									 									  							                                    	
	                                $custCount =  mysqli_query($conn,$result1);
                                    $rowcount = mysqli_fetch_row($custCount);	
                                    $total =  mysqli_num_rows($custCount);
 							 
                                  // Brand Filter And Vehicle Types -->
								  $category_id = $_REQUEST['cid'];
								  $brand_id    = $_REQUEST['bid'];
								  $segment_id  = $_REQUEST['sid'];
								  
								  if($category_id > 0) {
								  $pl="SELECT * FROM tbl_products Where category_id='".$_REQUEST['cid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);
								  }elseif($brand_id > 0){
								  $pl="SELECT * FROM tbl_products Where make_brand='".$_REQUEST['bid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);  								 
								  }else {
								  $pl="SELECT * FROM tbl_products Where body_type='".$_REQUEST['sid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);
								  } 
								    
									// Pagination -->
								    $pages = ceil( $total / $limit );
	                                $Previous = $page - 1;
	                                $Next = $page + 1; 
								
								?>								
                                <div class="row" name="disprow" id="disprow">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))								     
									  {
									      $sg1="SELECT * FROM `tbl_segment` WHERE id='".$Fpl['body_type']."'";
									      $Esg1=mysqli_query($conn,$sg1);
									      $FEsg1=mysqli_fetch_array($Esg1);
										  
										  $result1 ="SELECT count(product_id) AS id FROM tbl_products Where category_id='".$_REQUEST['cid']."' ";
	                                      $custCount =  mysqli_query($conn,$result1);
                                          $rowcount = mysqli_fetch_row($custCount);
										  
										   $svm="SELECT count(product_id) AS total_count_products FROM tbl_products Where category_id='".$_REQUEST['cid']."'";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										  
	                                      $total = $rowcount[0];
	                                      $pages = ceil( $total / $limit );

	                                      $Previous = $page - 1;
	                                      $Next = $page + 1;
										  
										  $result1 = $Fpl['photo'];
									      $result2 = $Fpl['product_title'];	
									      $result3 = $Fpl['product_content'];
									      $result6 = $Fpl['mrp'];
									      $result4 = $Fpl['product_amount'];
									      $result5 = $Fpl['product_id'];
										  $title_tag = $Fpl['title_tag'];
										  $result7 = $Fpl['img_alt'];
										  $result8 = $Fpl['img_title'];
										  $segment = $FEsg1['segment'];
										  $segment1 = $FEsg1['id'];
										  $status = $Fpl['status'];
										  $total_count_pages= $pages;						  
	     	                              $total_count_products=$FEsvm['total_count_products'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="new-bikes-product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="<?php echo $Fpl['img_alt']; ?>" title="<?php echo $Fpl['img_title']; ?>" style="height:180px" width="100%"></a>
                                                <h5 class="sale"><?php echo $Fpl['status']; ?></h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="new-bikes-product-details.php?pid=<?php echo $result5; ?>&sid=<?php echo $segment1; ?>&cid=<?php echo 1; ?>">View</a></li>
                                                      <li>
													  <input type="hidden" id="like" name="like" value="<?php echo $Fpl['product_id']; ?>">
													  <input type="hidden" id="like1" name="like1" value="<?php echo $_SESSION['customer_id']; ?>">
													  <input id="cate" name="cate" type="hidden" value="<?php echo $_REQUEST['cid']; ?>">
                                                     <a class="button one mobile button--secondary deactivate inactive" onClick="WishList(<?php echo $Fpl['product_id']; ?>,<?php echo $_SESSION['customer_id']; ?>,<?php echo $_REQUEST['cid']; ?>)">                                                  													  
													  <div class="btn__effect">
                                                        <svg class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
                                                        <svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
                                                        <svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#0090E3">
                                                         <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"></path>
                                                         <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"></path></g>
                                                         <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"></path></svg>
                                                        <div class="effect-group">
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                        </div>
                                                      </div>                                                     
													 </a>													
                                                    </li>	
													 </ul>
                                                <h4><?php echo $result2; ?></h4>
												<h5><?php echo $segment; ?></h5>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>											
								
								<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Products :  <?php echo $total_count_products;  ?></b></li>
								<nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <li class="page-item next"><a class="page-link" href="new-bikes.php?page=<?= $Previous; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
									<?php for($i = 1; $i<= $page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="new-bikes.php?page=<?= $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>">
									  <?php if($_REQUEST['page']==$i){ ?>
									  <span style="color:red">
									  <?php echo $i; ?>
									  </span>
									  <?php } else {									  									  										  
										 echo $i;
									   }
									  ?>									  
									  </a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="new-bikes.php?page=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>								
								<!-- Dynamic Pagination End -->	
								
								
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
                                                <li class="nav-item"><a class="nav-link" href="new-bikes.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Used Cars') { ?>
											    <li class="nav-item"><a class="nav-link" href="used-cars.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Insurance') { ?>
											    <li class="nav-item"><a class="nav-link" href="insurance.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											
											  <?php if($fctgry['category_name']=='Car Services') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Spares') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-spares.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
									
											    <?php if($fctgry['category_name']=='New Bikes') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-detailing.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											    <?php if($fctgry['category_name']=='Used Bikes') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-detailing.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											    <?php if($fctgry['category_name']=='Accessories') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-detailing.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php } ?>
                                            </ul>
                                        </li>																			
                                    </ul>
                                </aside> 

        								
	                           					
                                <fieldset class="filter-price">
								    <div class="l_w_title">
                                        <h3>Filter section</h3>
                                    </div>
                                    <div class="price-field">
                                       <input type="range"  min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['minv']; ?>" id="lower" name="lower" onChange="FindMinMax()">
                                       <input type="range"  min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['maxv']; ?>" id="upper" name="upper" onChange="FindMinMax()">
									   <input id="cat" name="cat" type="hidden" value="<?php echo $_REQUEST['cid']; ?>">
                                    </div>
                                    <div class="price-wrap">
                                     <span class="price-title">Price :</span>
                                       <div class="price-wrap-1">                                                                               
                                         <input id="one" name="one">
									   </div>
                                     <div class="price-wrap_line">-</div>
                                      <div class="price-wrap-2">                                                                              
										 <input id="two" name="two">
                                      </div>
                                    </div>                                
                                </fieldset>                                                             								                                								
								
								<aside class="l_widgest l_p_categories_widget">
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
									
									         $br="SELECT * FROM `tbl_make` WHERE category_name='Bike'";
									         $Ebr=mysqli_query($conn,$br);
									         while($FEbr=mysqli_fetch_array($Ebr)){
										 
										         $brand_id   = $FEbr['id'];
										         $brand_name = $FEbr['make'];										 									
										 									 
									         $j++; 
									         ?>                                              												
												 <?php if($FEbr['id']==123){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">HERO</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==124){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">HONDA</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==125){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BAJAJ</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==126){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">KTM</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==127){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">TVS</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==128){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">SUZUKI</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==129){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">APRILLIA</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==130){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">YAMAHA</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==131){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">KAWASAKI</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==132){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">ROYAL ENFIELD</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==133){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BENELLI</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==134){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BMW</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==135){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">DUCATI</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==136){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">JAWA</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==137){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">MAHINDRA</a></li>
									             <?php } ?>
												 <?php if($FEbr['id']==138){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-bikes.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">VESPA</a></li>
									             <?php } ?>
											     <?php }
												 ?>									             									   									             												
                                            </ul>
                                        </li>                                                                              
                                    </ul>
                                </aside>

						
								
                                <aside class="l_widget l_feature_widget">
                                    <div class="verticalCarousel">
                                        <div class="verticalCarouselHeader">
                                            <div class="float-md-left">
                                                <h3>Featured Products</h3>
                                            </div>
                                            <div class="float-md-right">
                                                <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                                <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                            </div>
                                        </div>
                                        <?php	
                                        //Listing Feature Products Start
                                          $qfp="select * from  tbl_products where product_status='Active' AND category_id='23' order by product_id desc limit 0 ,13";
                                          $Eqfp=mysqli_query($conn,$qfp);
                                          $sizeFProducts=mysqli_num_rows($Eqfp);
										  $imageurl="admin/dist/uploads/";
                                        //Listing Feature  Products End
                                         ?>
                                        <ul class="verticalCarouselGroup vc_list">
                                            <?php 
								             while($resultFProducts=mysqli_fetch_array($Eqfp)) {                                                           											
								            ?>
                                            <li>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <a href="new-bikes-product-details.php?pid=<?php echo $resultFProducts["product_id"]; ?>"><img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="70px" alt=""></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $resultFProducts["product_title"]; ?></h4>
                                                        <h5> &#8377; <?php echo $resultFProducts["product_amount"]; ?></h5>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script id="rendered-js">
$(".button").click(function () {
  if ($(this).hasClass("deactivate")) {
    $(this).removeClass("deactivate");
  }
  if ($(this).hasClass("active")) {
    $(this).addClass("deactivate");
  }
  $(this).toggleClass("animate");
  $(this).toggleClass("active");
  $(this).toggleClass("inactive");
});
//# sourceURL=pen.js
</script>  
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      