<!--- Header Area --->
<?php
// session_start();
include('header.php');
session_start();

$query = "SELECT * FROM tbl_customer WHERE mobile='$mobile' ";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) > 0 ) {
while ($row = mysqli_fetch_array($results)) {
$_SESSION['mobile'] = $row['mobile'];
$_SESSION['customer_id']=$row['customer_id'];
$_SESSION['success'] = "You are now logged in";

header('location: register.php');
}
}else {
$error_message = "Wrong Mobile/password combination";
}

?>
	    <!--- Header Area End --->
<script>
function AddCart(pid){ 
     var qty = document.getElementById('sst').value;
     var productid = pid;
	 var taskname="AddCart";
	 var vendorid=1;
	 var pvid=1;
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {product: productid,quantity: qty,task:taskname,vendor:vendorid,productvendorid:pvid},
        success:function(msg){
        //    your message will come here.  pttl
        document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart.Total Items "+ msg;
        document.getElementById("pttl").innerText =msg;
		//location.replace("shopping-cart.php");
		window.location = "shopping-cart.php";
       }
 });

}
</script>	
        <!--================Categories Banner Area =================-->
        <section class="service_details_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Car Wash Services</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="#"></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details Area =================-->
		<?php
		  $imageurl="admin/dist/uploads/";
		  $pd="SELECT * FROM tbl_vendor_services WHERE id='".$_REQUEST['pid']."' ";
		  $Epd=mysqli_query($conn,$pd);
		  $Fpd=mysqli_fetch_array($Epd);
		   
		         $pd1="SELECT * FROM tbl_services WHERE id='". $Fpd['service_id']."'";
			     $Epd1=mysqli_query($conn,$pd1);
		         $Fpd1=mysqli_fetch_array($Epd1);
				 
				 $result121 ="SELECT * from tbl_segment where id='".$Fpd['vehicle_segment_id']."'";
	             $custCount21 =  mysqli_query($conn,$result121);
                 $rowcount221 = mysqli_fetch_array($custCount21);
		  
			 $result0 = $Fpd['id'];
			 $result1 = $Fpd['photo'];
			 $result2 = $Fpd1['service_name'];	
			 $result3 = $Fpd['category_id'];
			 $result4 = $Fpd['amount'];
			 $result5 = $rowcount221['segment'];
			 $result6 = $Fpd['vendor_id'];
			 			 	   
		?>
		

        <section class="product_details_area">
            <div class="container">
						
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product_details_slider">
                            <div id="product_slider2" class="rev_slider" data-version="5.3.1.6">
                                <ul>	<!-- SLIDE  -->
                                    <li data-index="rs-28" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $imageurl.$Fpd['photo']; ?>"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Umbrella" data-param1="September 7, 2015" data-param2="Alfon Much, The Precious Stones" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $imageurl.$Fpd['photo']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $imageurl.$Fpd['photo']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                               
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">

                        <div class="product_details_text">
                            <h2><?php echo $result2; ?></h2>
							
							<h3> <?php echo $result5; ?></h3>                           
                            
							<h4>&#8377; <?php echo $result4; ?></h4>
							                           							
							<!-- <a href="admin/dist/service_login.php?pid=<?php // echo $result0; ?>" class="btn btn-primary">Login Add To Service</a> --> 
							<div class="quantity">
							  <a href="car_detailing_view.php?pid=<?php echo $result0; ?>&&custid=<?php echo $_SESSION['customer_id']; ?>" class="btn btn-primary">Login Add To Service</a>							
							</div>
							
                            <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                    <li><a href="https://www.facebook.com/My-Auto-Cart-100328031534295/?modal=admin_todo_tour" target="_blank"><i class="social_facebook"></i></a></li>
                                    <li><a href="https://twitter.com/cart_auto" target="_blank"><i class="social_twitter"></i></a></li>
                                    <li><a href="https://in.pinterest.com/myautocartindia/" target="_blank"><i class="social_pinterest"></i></a></li>
                                    <li><a href="https://www.instagram.com/myautocartindia/" target="_blank"><i class="social_instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCYNgLBiNYEly1f82To6z1Sg/featured?view_as=subscriber" target="_blank"><i class="social_youtube"></i></a></li>
                                </ul>
                            </div>																																		
                        </div>                       
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area" hidden>
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>                        
					  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tags</a>
                      <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>                        
					</div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p><?php echo $Fpd['product_content']; ?></p>
                    </div>                   
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p><?php echo $Fpd['product_tags']; ?></p>
                    </div>
                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <p><?php echo $Fpd['product_additional_info']; ?></p>
                    </div>                   
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================End Related Product Area =================-->

        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title">Related Services</h2>
                    <div class="row">
					        <?php	
         //Listing All Products Start
		 $i1=0;
		 
		                          $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 8;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;
		 
           $qe="select * from  tbl_vendor_services where category_id='10' order by id asc LIMIT $start, $limit";
           $Eqe=mysqli_query($conn,$qe);
           $sizeProducts=mysqli_num_rows($Eqe);	

         //Listing All Products End
        ?>
					  <?php 
					  
					               while($resultProducts=mysqli_fetch_array($Eqe)) {
			
                                          $result12 ="SELECT * from tbl_services where id='".$resultProducts['service_id']."' ";
	                                      $custCount2 =  mysqli_query($conn,$result12);
                                          $rowcount22 = mysqli_fetch_array($custCount2);

	                                      $result121 ="SELECT * from tbl_segment where id='".$resultProducts['vehicle_segment_id']."'";
	                                      $custCount21 =  mysqli_query($conn,$result121);
                                          $rowcount221 = mysqli_fetch_array($custCount21);
										  
										  $result1 ="SELECT count(category_id) AS id FROM tbl_vendor_services Where category_id='10'";
	                                      $custCount =  mysqli_query($conn,$result1);
                                          $rowcount = mysqli_fetch_row($custCount);
										  
										   $total = $rowcount[0];
	                                      $pages = ceil( $total / $limit );

	                                      $Previous = $page - 1;
	                                      $Next = $page + 1;
										  
										   $i1++;
										  ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="car-services_view.php?pid=<?php echo $resultProducts["id"]; ?>"><img src="<?php echo $imageurl.$resultProducts["photo"]; ?>" style="height:180px" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="car-services_view.php?pid=<?php echo $resultProducts["id"]; ?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $rowcount22["service_name"]; ?></h4>
                                 <h5>  <?php echo $rowcount221["segment"]; ?></h5>
                                 <h6>  &#8377; <?php echo $resultProducts["amount"]; ?></h6>
                                </div>
                            </div>
                        </div>                                    
					  <?php } ?>                                                                    
                    </div>
					
					
          		<nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="car-services_view.php?page=<?php echo $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><?php echo $i; ?></a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="car-services_view.php?pages=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>
                </div>
            </div>
        </section>
        <!--================End Related Product Area =================-->
		

        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	