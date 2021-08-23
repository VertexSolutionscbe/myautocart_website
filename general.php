        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->	
		
	  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='general.php'";
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
			   var segid=document.getElementById('seg').value;
	           // alert("min " + minv + " Max - "+maxv);
	  
              $.ajax({
               type:'post',
               url:'aj_carservice_price_filter.php',// put your real file name 
               data: {minval: minv,maxval: maxv,category:catid,segmentid:segid},
               success:function(msg){
               //alert("min " + msg);
		       $("#categories_product_area").html(msg);
                 }
               });
              }			  
            </script>
	   
				
        <!--================Categories Banner Area =================-->
      <section class="general_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>GENERAL SERVICES</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">Service</a></li>
                        <li class="current"><a href="#">Service</a></li>
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
							  <div class="showing_fillter">
                               <div class="row m0">
                                <div class="first_fillter">
                                  <h4>Showing Price Between <b><?php echo $_SESSION['minv']; ?></b> and <b><?php echo $_SESSION['maxv']; ?></b> </h4>
                                </div>                                                                                                          
                               </div>
                              </div>
							    <?php 
								// Products Start -->
								$i1=0;
								$_SESSION['city']=$_REQUEST['city'];
								$smm="SELECT TRUNCATE(min(amount),0) as minv,TRUNCATE(max(amount),0) as maxv FROM tbl_vendor_services";
								$Esmm=mysqli_query($conn,$smm);
								$FEsmm=mysqli_fetch_array($Esmm);																	
							  
								  //$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6;
								  $limit =6;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;
								  
                                 if(isset($_REQUEST['cname']))
                                  {
	                               $_SESSION['minv']=$FEsmm['minv'];
	                               $_SESSION['maxv']=$FEsmm['maxv'];
								    if(isset($_REQUEST['city']))
                                  {
		                           $pl="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id LEFT JOIN tbl_vendor tv1 ON tvs.vendor_id=tv1.vendor_id where category_id='".$_REQUEST['cid']."' AND tv1.city='".$_REQUEST['city']."'   order by amount LIMIT $start, $limit";
                                   $result1 ="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id LEFT JOIN tbl_vendor tv1 ON tvs.vendor_id=tv1.vendor_id where category_id='".$_REQUEST['cid']."' AND tv1.city='".$_REQUEST['city']."' order by amount";
								  }else {
									$pl="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id where category_id='".$_REQUEST['cid']."' order by amount LIMIT $start, $limit";
                                   $result1 ="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id where category_id='".$_REQUEST['cid']."' order by amount";
								  }
                                  }
                                 if($_REQUEST['cname']=='')
                                  {	
	                               $pl="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id LEFT JOIN tbl_vendor tv1 ON tvs.vendor_id=tv1.vendor_id where category_id='".$_REQUEST['cid']."' AND tv1.city='".$_REQUEST['city']."' AND (amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by amount LIMIT $start, $limit";
	                               $result1 ="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id LEFT JOIN tbl_vendor tv1 ON tvs.vendor_id=tv1.vendor_id where category_id='".$_REQUEST['cid']."' AND tv1.city='".$_REQUEST['city']."' AND (amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by amount";
                                  }
                                  // $pl="SELECT * FROM tbl_vendor_services Where category_id='".$_REQUEST['cid']."' order by id ASC LIMIT $start, $limit";
                                    $Epl=mysqli_query($conn,$pl);	
                                  // echo $result1;							  									   									 									  							    
                                  // echo $nr=mysqli_num_rows($Epl);		
	                                $custCount =  mysqli_query($conn,$result1);
                                    $rowcount = mysqli_fetch_row($custCount);	
                                    $total =  mysqli_num_rows($custCount);
                                  // echo ( $total / $limit );
	                                     
										  $pages = ceil( $total / $limit );
	                                      $Previous = $page - 1;
	                                      $Next = $page + 1; 										  
								  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								      {										  
										  $result12 ="SELECT * from tbl_services where id='".$Fpl['service_id']."'";
	                                      $custCount2 =  mysqli_query($conn,$result12);
                                          $rowcount22 = mysqli_fetch_array($custCount2);
										  
										  $result121 ="SELECT * from tbl_segment where id='".$Fpl['vehicle_segment_id']."'";
	                                      $custCount21 =  mysqli_query($conn,$result121);
                                          $rowcount221 = mysqli_fetch_array($custCount21);										  										 
										 
										  $pl = $Fpl['photo'];
										  $result1 = $Fpl['vendor_id'];
									      $result2 = $Fpl['category_id'];	
									      $result3 = $rowcount22['service_name'];
									      $result4 = $rowcount221['segment'];
									      $result5 = $Fpl['amount'];
									      $result6 = $Fpl['id'];
										  $result7 = $Fpl['service_id'];
										  $result8 = $Fpl['vehicle_segment_id'];
										  $result9 = $Fpl['title_tag'];
										  $result10= $Fpl['img_alt'];
										  $result11= $Fpl['img_title'];										  
										  
										  $svm="SELECT count(id) AS total_count_services FROM tbl_vendor_services Where category_id='".$_REQUEST['cid']."'";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										  
										  $total_count_pages= $pages;						  
	     	                              $total_count_services=$FEsvm['total_count_services'];
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a  href="car_detailing_view.php?pid=<?php echo $result6; ?>&sid=<?php echo $result7; ?>&cid=<?php echo $result2; ?>&sgid=<?php echo $result8; ?>"><img src="<?php echo $pl; ?>" alt="<?php echo $Fpl['img_alt']; ?>" title="<?php echo $Fpl['img_title']; ?>" style="height:180px; width:100%"></a>
                                                <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                  <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                  <li><a class="add_cart_btn" href="car_detailing_view.php?pid=<?php echo $result6; ?>&sid=<?php echo $result7; ?>&cid=<?php echo $result2; ?>&sgid=<?php echo $result8; ?>">View</a></li>
                                                <!--  <li class="p_icon"><a href="car_detailing_wish_list_add.php?pid=<?php //echo $result6; ?>&&custid=<?php// echo $_SESSION['customer_id']; ?>"><i class="icon_heart_alt"></i></a></li>   -->                                             
                                                
                                                  <li>
                                                     <a class="button one mobile button--secondary deactivate inactive" href="car_service_wish_list_add.php?pid=<?php echo $result6; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>">                                                  													  
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
												<h4><?php echo $result3; ?></h4>
                                                <h5><?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>
								
			
								<!-- Dynamic Pagination -->
								<li>	<b>No of pages :  <?php echo $total_count_pages;  ?></b></li>
								<li>	<b>No of Services :  <?php echo $total_count_services;  ?></b></li>
								<nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <li class="page-item next"><a class="page-link" href="general.php?page=<?= $Previous; ?>&cid=<?php echo $_REQUEST['cid']; ?>&city=<?php echo $_REQUEST['city']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
									<?php for($i = 1; $i<= $page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="general.php?page=<?= $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>&city=<?php echo $_REQUEST['city']; ?>">
									  <?php if($_REQUEST['page']==$i) { ?>									  									 									  
									  <span style="color:red">
									  <?php echo $i; ?>
									  </span>
									  <?php }  else  {									 									 
										  echo $i;
									   }
									  ?>									  
									  </a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="general.php?page=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>&city=<?php echo $_REQUEST['city']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
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
																		
                                    </ul>
                                </aside>                                
	                           			
                                   <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Vehicle Segments</h3>
                                    </div>
                                    <ul class="navbar-nav">                                                                                                                                                                                                     
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Segments
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											  <?php
		                                       $k=0;
		                                        $tseg="SELECT * FROM tbl_segment Where id";
		                                        $Etseg=mysqli_query($conn,$tseg);
		                                        while($FEtseg=mysqli_fetch_array($Etseg))
									             {									   
									                $result12 = $FEtseg['id'];
									                $result22 = $FEtseg['segment'];									   
								               $k++;					   
		                                      ?>
										      <?php if($FEtseg['id']=='1'){ ?>
                                                <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='2') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='3') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
                                              <?php if($FEtseg['id']=='4') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='5') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='6') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='7') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='8') { ?>
											    <li class="nav-item"><a class="nav-link" href="car-services.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php }
												 }
											  ?>											  											  
                                            </ul>
											<li class="nav-item"><?php echo $_REQUEST['sgname']; ?></li>
                                        </li>																		
                                    </ul>
                                </aside> 

											
                                <fieldset class="filter-price" >
								    <div class="l_w_title">
                                        <h3>Filter section</h3>
                                    </div>
									
                                    <div class="price-field">
                                       <input type="range" min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['minv']; ?>" id="lower" name="lower" onChange="FindMinMax()">
                                       <input type="range" min="<?php echo $FEsmm['minv']; ?>" max="<?php echo $FEsmm['maxv']; ?>" value="<?php echo $FEsmm['maxv']; ?>" id="upper" name="upper" onChange="FindMinMax()">
									   <input id="cat" name="cat" type="hidden" value="<?php echo $_REQUEST['cid']; ?>">
									   <input id="seg" name="seg" type="hidden" value="<?php echo $_REQUEST['sgid']; ?>">
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
                                          $qfp="SELECT * FROM tbl_vendor_services LEFT JOIN tbl_services ON tbl_vendor_services.service_id = tbl_services.id WHERE tbl_vendor_services.category_id='10' ORDER BY tbl_vendor_services.id ASC limit 32, 42";										 
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
                                                        <a href="car_detailing_view.php?pid=<?php echo $resultFProducts["id"]; ?>&sid=<?php echo $resultFProducts["service_id"]; ?>&cid=<?php echo $resultFProducts["category_id"]; ?>&sgid=<?php echo $resultFProducts["vehicle_segment_id"]; ?>"><img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="70px" alt=""></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $resultFProducts["service_name"]; ?></h4>
                                                        <h5> &#8377; <?php echo $resultFProducts["amount"]; ?></h5>
                                                    </div>
                                                </div>
                                            </li>
								         <?php
										  }
										 ?>
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
</script>	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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