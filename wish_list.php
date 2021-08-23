        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->
		
		<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>Wish List | MyAutoCart</title>        
         <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">  
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
		
		  <style>
		   #loading
		    {
			  text-align:center;
			  background: url('loader.gif') no-repeat center;
			  height: 150px;
		   }		  
		  </style>
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
		    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>          	    
	
	<script>	
	function myFunction() {
    // location.replace("register.php")
     var x = confirm("Please Confirm Before Your to Proceed");
     if (x)
	  location.replace("signin.php");
      //return true;
     else
     return false; 
    }
	
	function RemoveCart(ind){ 
     var indexid = ind;     
	 var taskname="RemoveCart";
     $.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {index: indexid,task:taskname},
        success:function(msg){
        //    your message will come here.  
        //document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart !";
        //alert("Item Deleted .Please Refresh Page!");
		location.reload();
        }
      });
     }
	</script>					
        <!--================ Wish List Banner Area =================-->
        <section class="wish_list_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Wish List</h3>
                     <ul>
                       <li><a href="index.php">Home</a></li>
                       <li hidden><a href="#">New Cars</a></li>
                       <li class="current"><a href="#">New Cars</a></li>
                     </ul>
                </div>
            </div>
        </section>
        <!--================End Wish List Banner Area =================-->
		
		
		<!--================ Wish List Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="showing_fillter">
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
							
                            <!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php 
								
								 $plb="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='1'";
								 $Eplb=mysqli_query($conn,$plb);						  									   									 									  							  					
								 $Fplb=mysqli_fetch_array($Eplb);
							
							if($Fplb['category_id']>0)
							{
							?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >New Cars</a></li>                                                                              
                                    </ul>
							<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='1'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="new-cars-product-details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							
							
							 <!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php 
								
								 $plc="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='2'";
								 $Eplc=mysqli_query($conn,$plc);						  									   									 									  							  					
								 $Fplc=mysqli_fetch_array($Eplc);
							
							if($Fplc['category_id']>0)
							{
							?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >Used Cars</a></li>                                                                              
                                    </ul>
							<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='2'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							
							 <!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php 
								
								 $pld="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='12'";
								 $Epld=mysqli_query($conn,$pld);						  									   									 									  							  					
								 $Fpld=mysqli_fetch_array($Epld);
							
							if($Fpld['category_id']>0)
							{
							?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >New Car Spares</a></li>                                                                              
                                    </ul>
							<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='12'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="new_spares_details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							
							
							<!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php

								 $pla="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='15'";
								 $Epla=mysqli_query($conn,$pla);						  									   									 									  							    																  																							
								$Fpla=mysqli_fetch_array($Epla);

                                    if($Fpla['category_id']>0){
								?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >Used Car Spares </a></li>                                                                              
                                    </ul>
									<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='15'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="new_spares_details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							
							 <!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php 
								
								 $plg="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='14'";
								 $Eplg=mysqli_query($conn,$plg);						  									   									 									  							  					
								 $Fplg=mysqli_fetch_array($Eplg);
							
							if($Fplg['category_id']>0)
							{
							?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >Car Wash Equipments</a></li>                                                                              
                                    </ul>
							<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='14'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="wash_equipments_product_details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							 <!-- Feature Customer Wish List -->
							<div class="categories_product_area">
							<?php 
								
								 $plh="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='17'";
								 $Eplh=mysqli_query($conn,$plh);						  									   									 									  							  					
								 $Fplh=mysqli_fetch_array($Eplh);
							
							if($Fplh['category_id']>0)
							{
							?>
							    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >Car Detailing Equipments</a></li>                                                                              
                                    </ul>
							<?php } ?>
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_wishlist Where customer_id=".$_SESSION['customer_id']." and category_id='17'";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	
                                          
                                        $tb="SELECT * FROM tbl_products Where product_id=".$Fpl['product_id']."";
										$Etb=mysqli_query($conn,$tb);	
										$EFtb=mysqli_fetch_array($Etb);	

										/* $tvs="SELECT * FROM tbl_vendor_services Where id='".$Fpl['product_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs); */
										 
										  $result1 = $EFtb['photo'];
									      $result2 = $EFtb['product_title'];	
									      $result3 = $EFtb['product_content'];
									      $result6 = $EFtb['mrp'];
									      $result4 = $EFtb['product_amount'];
									      $result5 = $EFtb['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											  <a href="product-remove.php?pid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                              <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px" width="100%"></a>
                                              <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="detailing_equipments_product_details.php?pid=<?php echo $result5; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Customer Wish List End -->
							
							
							
							
							
							<!-- Feature Service Customer Wish List -->
							
											
									<?php
		                        $ple="SELECT * FROM tbl_service_wishlist WHERE customer_id=".$_SESSION['customer_id']." ORDER BY id ASC";
								 $Eple=mysqli_query($conn,$ple);						  									   									 									  							    																  																
								 $Fple=mysqli_fetch_array($Eple);
								 
								 if($Fple['category_id']>0)
								 {
									?>
								    <ul class="portfolio_filter">
					
                                        <li class="active" ><a href="#" >Services </a></li>                                                                              
                                    </ul>
									<?php } ?>
							<div class="categories_product_area">
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_service_wishlist WHERE customer_id=".$_SESSION['customer_id']." ORDER BY id ASC";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	                                                                              

										$tvs="SELECT * FROM tbl_vendor_services WHERE id='".$Fpl['vendor_services_id']."'";
                                        $Etvs=mysqli_query($conn,$tvs);
                                        $FEtvs=mysqli_fetch_array($Etvs);
										
										  $svn="SELECT * FROM `tbl_services` WHERE id='".$FEtvs['service_id']."'";
										  $Esvn=mysqli_query($conn,$svn);
                                          $FEsvn=mysqli_fetch_array($Esvn);
										  
										  $sgn ="SELECT * from tbl_segment where id='".$FEtvs['vehicle_segment_id']."'";
	                                      $Esgn=mysqli_query($conn,$sgn);
                                          $FEsgn=mysqli_fetch_array($Esgn);
										  

										 
										  $result1 = $FEtvs['photo'];
									      $result2 = $FEsvn['service_name'];	
									      $result3 = $FEsgn['segment'];
										  $result4 = $FEtvs['amount'];
										  $result5 = $FEtvs['id'];
									      $result6 = $FEtvs['mrp'];		
										  $result7 = $FEtvs['service_id'];
										  $result8 = $FEtvs['vehicle_segment_id'];
									      $result9 = $FEtvs['category_id'];	
										  
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											   <a href="product-remove.php?sid=<?php echo $result5; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                               <a href="car-services.php?pid=<?php echo $result5; ?>"><img src="<?php echo $result1; ?>" alt="" style="height:180px"></a>
                                               <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>  
                                                  <li><a class="add_cart_btn" href="car_detailing_view.php?pid=<?php echo $result6; ?>&sid=<?php echo $result7; ?>&cid=<?php echo $result9; ?>&sgid=<?php echo $result8; ?>">View</a></li>
												
                                             <!--     <li><a class="add_cart_btn" href="car-services.php?pid=<?php // echo $result5; ?>">View</a></li> -->                                                 
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
												<h5><?php echo $result3; ?></h5>
                                                <h5> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Service Customer Wish List End -->		
							
							
							<!-- Feature Package Customer Wish List -->
							<?php 
								$plf="SELECT * FROM tbl_package_wish_list WHERE customer_id=".$_SESSION['customer_id']." ORDER BY id ASC";
								$Eplf=mysqli_query($conn,$plf);						  									   									 									  							    																  																
								$Fplf=mysqli_fetch_array($Eplf);
								
								if($Fplf['category_id']>0)
								{
							
							?>
								    <ul class="portfolio_filter">
                                        <li class="active" ><a href="#" >Packages </a></li>                                                                              
                                    </ul>
								<?php } ?>
							<div class="categories_product_area">
							    <?php
								if($_SESSION['customer_id']>0) {                                        
								// Products Start -->								 
								$i1=0;
								
								 $pl="SELECT * FROM tbl_package_wish_list WHERE customer_id=".$_SESSION['customer_id']." ORDER BY id ASC";
								 $Epl=mysqli_query($conn,$pl);						  									   									 									  							    																  																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								       {	                                                                              

										$tvs1="SELECT * FROM tbl_packages WHERE id='".$Fpl['package_id']."'";
                                        $Etvs1=mysqli_query($conn,$tvs1);
                                        $FEtvs1=mysqli_fetch_array($Etvs1);
										
										  
										  $sgn1 ="SELECT * from tbl_segment where id='".$FEtvs1['vehicle_segment']."'";
	                                      $Esgn1=mysqli_query($conn,$sgn1);
                                          $FEsgn1=mysqli_fetch_array($Esgn1);
										 
										  $result11 = $FEtvs1['photo'];
									      $result21 = $FEtvs1['package_name'];	
									      $result31 = $FEsgn1['segment'];
										  $result41 = $FEtvs1['package_amount'];
										  $result51 = $FEtvs1['id'];
									      $result61 = $FEtvs1['package_amount'];									     									      
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
											   <a href="product-remove.php?pid=<?php echo $result51; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>"><img src="img/icon/close-icon.png" align="right" alt=""></a>
                                               <a href="special_package_details_view.php?pid=<?php echo $result51; ?>"><img src="<?php echo $result11; ?>" alt="" style="height:180px"></a>
                                               <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>                                                 
                                                  <li><a class="add_cart_btn" href="special_package_details_view.php?pid=<?php echo $result51; ?>">View</a></li>                                                  
                                                </ul>
                                                <h4><?php echo $result21; ?></h4>
												<h5><?php echo $result31; ?></h5>
                                                <h5> &#8377; <?php echo $result41; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>							
							 <?php } ?>								
                            </div>
							<!-- Feature Package Customer Wish List End -->	
							
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
											  <?php if($fctgry['category_name']=='Car Services') { ?>
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
											    <li class="nav-item"><a class="nav-link" href="car-detailing.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
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
									
									         $br="SELECT * FROM `tbl_make` ORDER BY id";
									         $Ebr=mysqli_query($conn,$br);
									         while($FEbr=mysqli_fetch_array($Ebr)){
										 
										         $brand_id   = $FEbr['id'];
										         $brand_name = $FEbr['make'];										 									
										 									 
									         $j++; 
									         ?>                                              												
												 <?php if($FEbr['id']=='1'){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Audi</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='2') { ?>
									                <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BMW</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='3') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Chevrolet</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='4') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Fiat</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='5') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Ford</a></li>
									             <?php } ?>	
									             <?php if($FEbr['id']=='7') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Maruthi Suzuki</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='8') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mahindra</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='10') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Nissan</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='11') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Skoda</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='12') { ?>
										           <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Tata</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='13') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Rolls Royce</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='14') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Volkswagen</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='15') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Volvo</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='16') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Toyota</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='17') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Hyundai</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='18') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mitsubishi</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='19') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mini</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='20') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Datsun</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='21') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Renault</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='22') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Lamborghini</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='23') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Land Rover</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='24') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Jaguar</a></li>
									             <?php } ?>									
									             <?php if($FEbr['id']=='26') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Jeep</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='27') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Lexus</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='28') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Honda</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='29') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Suzuki</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='33') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">BMW</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='46') { ?> 
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">DC</a></li>
									             <?php } ?>
									             <?php if($FEbr['id']=='47') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">OPEL</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='48') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">MG HECTOR</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='49') { ?>  
									              <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Hindustan motors</a></li>																		
									             <?php } ?> 
									             <?php if($FEbr['id']=='54') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Dodge</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='56') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Daihatsu</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='57') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Daewoo</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='71') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">GMC</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='72') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Ferrari</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='74') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">GAC</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='82') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Isuzu</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='93') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mazda</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='97') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">KIA</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='98') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">INFINITI</a></li>
									             <?php } ?> 
									             <?php if($FEbr['id']=='102') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Peugeot</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='103') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Porsche</a></li>
									             <?php } ?>   
									             <?php if($FEbr['id']=='114') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Any Brand</a></li>
									             <?php } ?>  
									             <?php if($FEbr['id']=='116') { ?>  
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?bid=<?php echo $brand_id; ?>&bname=<?php echo $brand_name; ?>">Mercedes Benz</a></li>
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
                                                <h3>Featured Products</h3>
                                            </div>
                                            <div class="float-md-right">
                                                <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                                <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                            </div>
                                        </div>
                                        <?php	
                                        //Listing Feature Products Start
                                          $qfp="select * from  tbl_products where product_status='Active' order by product_id desc limit 0 ,10";
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
                                                        <img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="50px" alt="">
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
            </div>
        </section>
        <!--================ Wish List Area End =================-->      


        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      