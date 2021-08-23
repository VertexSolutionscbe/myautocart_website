        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->
		
	  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='car-detailing-equipments.php'";
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
               url:'aj_cardetailing_equipments_filter.php',// put your real file name 
               data: {minval: minv,maxval: maxv,category:catid},
               success:function(msg){
              // alert("min " + msg);
		      $("#categories_product_area").html(msg);
               }
             });
            }
            </script>
	   
				
        <!--================Categories Banner Area =================-->
        <section class="car_accessories_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Car Accessories in India</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">Car Accessories</a></li>
                        <li class="current"><a href="#">Car Accessories</a></li>
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
								// Price Filter -->
								$smm="SELECT TRUNCATE(min(product_amount),0) as minv,TRUNCATE(max(product_amount),0) as maxv FROM tbl_products";
								$Esmm=mysqli_query($conn,$smm);
								$FEsmm=mysqli_fetch_array($Esmm);
								  
								  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;
								  
								  if(isset($_REQUEST['cname']))
                                  {
	                               $_SESSION['minv']=$FEsmm['minv'];
	                               $_SESSION['maxv']=$FEsmm['maxv'];
		                           $pl="SELECT * FROM tbl_products Where category_id='".$_REQUEST['cid']."' ORDER BY product_id ASC LIMIT $start, $limit";
                                   $result1 ="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' ORDER BY product_amount";
                                  }
								  if($_REQUEST['cname']=='')
                                  {	
	                               $pl="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' AND (product_amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by product_amount LIMIT $start, $limit";
	                               $result1 ="SELECT * FROM tbl_products where category_id='".$_REQUEST['cid']."' AND (product_amount between '".$_SESSION['minv']."' AND '".$_SESSION['maxv']."') order by product_amount";
                                  }  
								  $Epl=mysqli_query($conn,$pl);
								  
								    $result1 ="SELECT count(product_id) AS id FROM tbl_products Where category_id='".$_REQUEST['cid']."' ";
	                              $custCount =  mysqli_query($conn,$result1);
                                  $rowcount = mysqli_fetch_row($custCount); 
	                              $total = $rowcount[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 
									
                                  // Brand Filter And Vehicle Types -->
								  $category_id = $_REQUEST['cid'];
								  $brand_id    = $_REQUEST['bid'];
								  $segment_id  = $_REQUEST['sid'];
								  
								  if($category_id > 0){
								  $pl="SELECT * FROM tbl_products Where category_id='".$_REQUEST['cid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    								
								  }elseif($brand_id > 0){
								  $pl="SELECT * FROM tbl_products Where make_brand='".$_REQUEST['bid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);  								 
								  }else {
								  $pl="SELECT * FROM tbl_products Where body_type='".$_REQUEST['sid']."' ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);
								  }

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								     {
										  $sg1="SELECT * FROM `tbl_segment` WHERE id='".$Fpl['body_type']."'";
									      $Esg1=mysqli_query($conn,$sg1);
									      $FEsg1=mysqli_fetch_array($Esg1);
										 
										  $result1 ="SELECT count(product_id) AS id FROM tbl_products Where category_id='".$_REQUEST['cid']."'";
	                                      $custCount =  mysqli_query($conn,$result1);
                                          $rowcount = mysqli_fetch_row($custCount);
										  
	                                      $total = $rowcount[0];
	                                      $pages = ceil( $total / $limit );
										 
										 
										  $result1 = $Fpl['photo'];
									      $result2 = $Fpl['product_title'];	
									      $result3 = $Fpl['product_content'];
									      $result4 = $Fpl['product_amount'];
									      $result5 = $Fpl['product_id'];
										  $result6 = $Fpl['mrp'];
										  $segment = $FEsg1['segment'];

                                         
										 $svm="SELECT count(product_id) AS total_count_products FROM tbl_products Where category_id='".$_REQUEST['cid']."'";
                                           $Esvm=mysqli_query($conn,$svm);
                                           $FEsvm=mysqli_fetch_array($Esvm);
										 
                                          $total_count_pages= $pages;						  
	     	                              $total_count_products=$FEsvm['total_count_products'];
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="accessories_detail.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:220px" width="100%"></a>
                                                <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                               <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="accessories_detail.php?pid=<?php echo $result5; ?>">View</a></li>
                                                    <li class="p_icon"><a href="accessories_detail.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><i class="icon_heart_alt"></i></a></li>
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
												<h5><?php echo $segment; ?></h5>
                                                <h5><del>&#8377; <?php echo $result6; ?></del> &#8377; <?php echo $result4; ?></h5>
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
				                    <li class="page-item next"><a class="page-link" href="car-detailing-equipments.php?page=<?= $Previous; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
									  <?php for($i = 1; $i<= $page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="car-detailing-equipments.php?page=<?= $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>">
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
                                     <li class="page-item next"><a class="page-link" href="car-detailing-equipments.php?page=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>								
								<!-- Dynamic Pagination End -->	
								    					
							</div>
							<!-- Feature Products Car End -->							
                        </div>
						
                        <div class="col-lg-3">
                            <div class="categories_sidebar">
                            
	                           					
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
                                          $qfp="select * from  tbl_products where product_status='Active' and category_id='".$_REQUEST['cid']."' order by product_id desc limit 0,12";
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
                                                        <a href="accessories_detail.php?pid=<?php echo $resultFProducts["product_id"]; ?>"><img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="70px" alt=""></a>
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
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      