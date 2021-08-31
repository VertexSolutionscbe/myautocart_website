    <!--- Header Area --->
      <?php
      //session_start();
      include('header.php');
      ?>
	<!--- Header Area End --->
	    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <?php
		  $tg="SELECT * FROM `tbl_products` WHERE product_id='".$_REQUEST['pid']."'";
		  $Etg=mysqli_query($conn,$tg);
		  $FEtg=mysqli_fetch_array($Etg); 
		 ?>		 
		 <title><?php echo $FEtg['title_tag']; ?> | MyAutoCart</title>        
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
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
	  <style>								
		.slick-slider button {
		  display: none!important;
		}
		
		.slick-slide {
		  color: #333;
		  padding: 40px 0;
		  font-size: 1.25em;
		  font-family: "Verdana";
		  text-align: center;
		  pointer-events: none;
		}				
		
		.slick-slide img {
		  width: 225px;
		}				
		
		.slick-dots button {
		  display: none;
		}				
		
		.slick-slide {
		  opacity: 0.0;
		  transition: all 300ms ease;
		}
		
		.slick-current {
		  opacity: 1;
		  transform: scale(1.1);
		}
		
		.slick-current .desc {
		  opacity: 1;
		}
		
		.slick-current .desc h2 {
		  left: 0;
		}
		
		.slick-current .desc p {
		  top: 0;
		  opacity: 1;
		}
		
		 /* .btn {
		  border-radius: 30px;
		  padding: 10px 20px;
		  border: 4px solid #18c495;
		  text-decoration: none;
		  color: #18c495;
		  font-size: .6em;
		  text-transform: uppercase;
		  display: block;
		  margin: 30px auto 0;
		  max-width: 100px;
		  width: 100%;
		  font-weight: bold;
		  pointer-events: initial;
		} */
      </style>	
<style>
.circle-bg {
  background-color: #D41100;
  border-radius: 50%;
  cursor: pointer;
  display: table;
  left: 50%;
  /* top: 50%; */
  top: 13%; 
  height: 50px;
  width: 50px;
  position: absolute;
  vertical-align: middle;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.icon {
  color: white;
  display: table-cell;
  font-size: 19px;
  text-align: center;
  vertical-align: middle;
}

.outer-icons {
  left: 50%;
 /*  top: 50%; */
  top: 13%;
  position: absolute;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.outer-icons i {
  color: white;
  border-radius: 50%;
  font-size: 30px;
  line-height: 50px;
  height: 50px;
  width: 50px;
  text-align: center;
  vertical-align: middle;
  position: absolute;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.one {
  background-color: #dc4e41; 
  left: -120px;
}

.two {
  background-color: #3b5998;
  left: -60px;
 /*  bottom: -150px; */
     bottom: 7px;
}

.three {
  background-color: #55acee;
  left: 60px;
  /* bottom: -150px; */
     bottom: 7px;
}

.four {
  background-color: #0077b5;
  left: 120px;
}
</style>
	
<script>
function AddCart(pid){ 
     var qty = document.getElementById('sst').value;
     var productid = pid;
	 var taskname="AddCart";
	 var vendorid=document.getElementById('txtvid').value;
	 var pvid=document.getElementById('txtpvid').value;
	  
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {product: productid,quantity: qty,task:taskname,vendor:vendorid,productvendorid:pvid},
        success:function(msg){
        //    your message will come here.  pttl
        document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart.Total Items "+ msg;
        document.getElementById("cartttl").innerText = msg; 
		//location.replace("shopping-cart.php");
		//window.location = "shopping-cart.php";
       }
 });

}

function myFunction() {
  // location.replace("register.php")
  var x = confirm("Please Confirm Before Your to Proceed");
  if (x)
	  location.replace("signin.php");
      //return true;
  else
    return false;
  
}
</script>	
        <!--================Categories Banner Area =================-->
        <section class="new_cars_product_details_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3 hidden>Buy New and New Cars</h3>
                    <ul>
                        <li><a href="#" hidden>Home</a></li>
                        <li><a href="#" hidden>Shop</a></li>
                        <li class="current"><a href="#" hidden>Buy new and New cars</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details Area =================-->
		<?php
		  $imageurl="admin/dist/uploads/";
		  $pd="SELECT * FROM tbl_products WHERE product_id='".$_REQUEST['pid']."' ORDER BY product_id";
		  $Epd=mysqli_query($conn,$pd);
		  $Fpd=mysqli_fetch_array($Epd);
		   
		     $pd1="SELECT * FROM tbl_product_details WHERE product_title='". $Fpd['product_id']."'";
			 $Epd1=mysqli_query($conn,$pd1);
		     $Fpd1=mysqli_fetch_array($Epd1);
				 
		     $tmo="SELECT * FROM tbl_make WHERE id='".$Fpd['make_brand']."'";
		     $Etmo=mysqli_query($conn,$tmo);
		     $FEtmo=mysqli_fetch_array($Etmo);
				 
		     $tm="SELECT * FROM tbl_model WHERE id='".$Fpd['make_model']."'";
			 $Etm=mysqli_query($conn,$tm);
		     $FEtm=mysqli_fetch_array($Etm);
				 
		     $tc="SELECT * FROM tbl_color WHERE id='".$Fpd['interior_color']."'";
		     $Etc=mysqli_query($conn,$tc);
		     $FEtc=mysqli_fetch_array($Etc);		     
			 
			 $tc1="SELECT * FROM tbl_color WHERE id='".$Fpd['exterior_color']."'";
		     $Etc1=mysqli_query($conn,$tc1);
		     $FEtc1=mysqli_fetch_array($Etc1);
				 
			 $ts="SELECT * FROM tbl_segment WHERE id='".$Fpd['body_type']."'";
		     $Ets=mysqli_query($conn,$ts);
		     $FEts=mysqli_fetch_array($Ets);
			 
			 $pv="SELECT * FROM tbl_vendor_products WHERE product_id='".$Fpd['product_id']."' and VendorStatus='Active'";
			 $Epv=mysqli_query($conn,$pv);
		     $FEpv=mysqli_fetch_array($Epv);
			 
			 $tv="SELECT * FROM tbl_vendor WHERE vendor_id='".$FEpv['vendor_id']."'";
			 $Etv=mysqli_query($conn,$tv);
		     $FEtv=mysqli_fetch_array($Etv);
			 
			 $vendor_name=$FEtv['vendor_name'];
			 /* $co="SELECT * FROM tbl_confirm_orders WHERE vendor_id='".$Fpd['vendor_id']."'";
			 $Eco=mysqli_query($conn,$co);
		     $FEco=mysqli_fetch_array($Eco); */
			 
		?>
        <section class="product_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product_details_slider">
						    <div id="product_slider2" class="rev_slider" data-version="5.3.1.6">
                                <ul>	<!-- SLIDE  -->
                                    <li data-index="rs-28" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $Fpd['photo']; ?>"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Umbrella" data-param1="September 7, 2015" data-param2="Alfon Much, The Precious Stones" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $Fpd['photo']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $Fpd['photo']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <li data-index="rs-303" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $Fpd1['photo_1']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="The Dreaming Girl" data-param1="September 6, 2015" data-param2="Lol" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $Fpd1['photo_1']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $Fpd1['photo_1']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-301" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $Fpd1['photo_3']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Ride my Bike" data-param1="September 4, 2015" data-param2="Why not another Image?" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $Fpd1['photo_3']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $Fpd1['photo_3']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-302" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $Fpd1['photo_4']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Ride my Bike" data-param1="September 4, 2015" data-param2="Why not another Image?" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $Fpd1['photo_4']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $Fpd1['photo_4']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                </ul>								
                            </div>
							<ul class="slider">
                              <li><img src="<?php echo $Fpd['photo']; ?>"></li>   
                              <li><img src="<?php echo $Fpd1['photo_1']; ?>"></li>      
                              <li><img src="<?php echo $Fpd1['photo_3']; ?>"></li>       
                              <li><img src="<?php echo $Fpd1['photo_4']; ?>"></li>                                       
                            </ul> 														  			
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product_details_text">
                            <h3><?php echo $Fpd['product_title']; ?></h3>                           
                            <h6>Available In <span>Stock</span></h6>
                            <h4>&#8377; <?php echo $FEpv['product_amount']; ?></h4>                                                                               
							<button type="submit" class="add_cart_btn"><a  href="loan_calculator.php?pid=<?php echo $Fpd['product_id'];  ?>">EMI Loan Calculator</a></button>
							  
							  <table class="table-bordered" hidden> 
							     <tr>
								 <th>
								  <h6>Available In <span>Stock</span></h6>
                                  <h4>&#8377; <?php echo $FEpv['product_amount']; ?></h4>                                                                               
							      <button type="submit" class="add_cart_btn"><a  href="loan_calculator.php?pid=<?php echo $Fpd['product_id'];  ?>">EMI Loan Calculator</a></button>							 					 								  
								 </th>								                                  								  

                                  <div class = "container">
                                    <div class = "circle-bg">
                                      <i class = "icon fa fa-share-alt"> </i>
                                    </div>  
                                    <div class = "outer-icons">
                                      <i class = "one fa fa-google-plus" hidden> </i>
                                       <a href="https://www.facebook.com/sharer/sharer.php?u=https://myautocart.com/product-details.php?pid=<?php echo $_REQUEST['pid']; ?>" target="_blank"><i class = "two fa fa-facebook-official"> </i></a>
                                       <a href="https://twitter.com/home?status=https://myautocart.com/product-details.php?pid=<?php echo $_REQUEST['pid']; ?>" target="_blank"><i class = "three fa fa-twitter"> </i></a>								   
                                      <i class = "four fa fa-linkedin" hidden> </i>
                                    </div>    
                                  </div>								   
																 
								 <td>
								  <div>
                                    <img src="<?php echo $Fpd['photo']; ?>" width="307px" height="207px"> 
									<img src="<?php echo $Fpd1['photo_1']; ?>" width="307px" height="207px" hidden>      
                                    <img src="<?php echo $Fpd1['photo_3']; ?>" width="307px" height="207px" hidden>       
                                    <img src="<?php echo $Fpd1['photo_4']; ?>" width="307px" height="207px" hidden> 
                                  </div> 
								 </td>
								 </tr>                                 
                              </table>
							  
                            <div class="product_table_details">
                             <div class="table-responsive-md">
                               <style>
                                 table, th, td {
                                 border: 0px solid black;
                                 border-collapse: collapse;
                                }							 
                                 th, td {
                                 padding: 5px;
                                 text-align: left;
                                }
                              </style>				              
						       <table style="width:100%" class="table-bordered table-striped"> 
							     <tr hidden><th>Product Tags   </th> <td><?php echo $Fpd['product_tags']; ?></td></tr>
                                 <tr><th>Fuel Type      </th> <td><?php echo $Fpd['fuel_type']; ?></td></tr>
                                 <tr><th>Body Type      </th> <td><?php echo $FEts['segment']; ?></td></tr>
							     <tr><th>Seat Capacity  </th> <td><?php echo $Fpd['seat_capacity']; ?></td></tr>
							     <tr><th>Fuel Capacity  </th> <td><?php echo $Fpd['fuel_capacity'];?><b> Ltrs.</b></td></tr>
							     <tr><th>Tranmission    </th> <td><?php echo $Fpd['tranmission']; ?></td></tr>
								 <tr><th>Mileage        </th> <td><?php echo $Fpd['mileage']; ?><b>  Km/ltr.</b></td></tr>
                                 <tr><th>Year           </th> <td><?php echo $Fpd['year']; ?></td></tr>
								 <tr><th>Make           </th> <td><?php echo $FEtmo['make']; ?></td></tr>
								 <tr><th>Model          </th> <td><?php echo $FEtm['model']; ?></td></tr>
								 <tr><th>Interior Color </th> <td><?php echo $FEtc['color']; ?></td></tr>
								 <tr><th>Exterior Color </th> <td><?php echo $FEtc1['color']; ?></td></tr>								 
								 <tr><th>Boot Space (Litres) </th> <td><?php //echo $FEtc1['color']; ?></td></tr>
								 <tr><th>Max Speed      </th> <td><?php //echo $FEtc1['color']; ?></td></tr>								
								 <tr><th>Engine Displacement (cc) </th> <td><?php //echo $FEtc1['color']; ?></td></tr>
                              </table>						 						 
                             </div>						
                            </div>
							
                            <div class="quantity">
                                <div class="custom">
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                  <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
								</div>
						 
								<input type="hidden" name="txtvid" id="txtvid" value="<?php echo $FEpv['vendor_id']; ?>" class="input-text qty">
								<input type="hidden" name="txtpvid" id="txtpvid" value="<?php echo $FEpv['id'];//This is id of vendor product table ?>" class="input-text qty">
                                <a class="add_cart_btn"  onclick="AddCart(<?php echo $_REQUEST['pid']; ?>);" style="color: red">add to cart</a>
																
								<button type="submit" class="add_cart_btn"><a  href="speak_with_expert.php?cid=<?php echo $Fpd['category_id']; ?>&pid=<?php echo $Fpd['product_id']; ?>" style="color: red">Speak with Expert</a></button>
																
								<div id="addmsg" style="color: green"></div>																								
                            </div>
							
							<div class="quantity">
                                <div class="custom">                              								  
                                  <button type="submit" class="btn btn-primary checkout_btn" onclick="myFunction();">checkout</button>								
								</div>						 																																																
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
            <section class="product_description_area"> </section>						           
        <!--================End Product Details Area =================-->
		
        
        <!--================End Related Product Area =================-->       
        <section class="related_product_area">
		  <?php	
		    $i1=0;
		
		    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 4;
	        $page = isset($_GET['page']) ? $_GET['page'] : 1;
	        $start = ($page - 1) * $limit;
		                       	
            $qe="select * from  tbl_products where category_id='1' order by product_title LIMIT $start, $limit";
			$Eqe=mysqli_query($conn,$qe);
			$sizeProducts=mysqli_num_rows($Eqe);


            $result1 ="SELECT count(product_title) AS id FROM tbl_products Where category_id='1'";
	        $custCount =  mysqli_query($conn,$result1);
            $rowcount = mysqli_fetch_row($custCount);  
            //Listing All Products End
		 
		    $total = $rowcount[0];
	        $pages = ceil( $total / $limit );

	        $Previous = $page - 1;
	        $Next = $page + 1;                              
		 
		    $i1++;
          ?>
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title">Other Products </h2>
                    <div class="row">
					  <?php 
					  //Listing All Products Start
					  //$spv="select * from tbl_vendor_products where product_id='".$_REQUEST['pid']."'";
					/// echo $spv="select t1.*,t2.vendor_name from tbl_vendor_products t1 left join tbl_vendor t2 on t1.vendor_id=t2.vendor_id where t1.body_type='".$_REQUEST['sid']."'";
					$spv="Select * from tbl_products where body_type='".$_REQUEST['sid']."' AND category_id='".$_REQUEST['cid']."'";
					  $Espv=mysqli_query($conn,$spv);
					  while($resultProductsVendor=mysqli_fetch_array($Espv))
					  {
					  $qe1="select * from  tbl_products where product_id='".$resultProductsVendor['product_id']."'";
					  $Eqe1=mysqli_query($conn,$qe1);
					  $sizeProducts=mysqli_num_rows($Eqe1);
					  $resultProducts=mysqli_fetch_array($Eqe1);	

                                $sg1="SELECT * FROM `tbl_segment` WHERE id='".$resultProducts['body_type']."'";
									      $Esg1=mysqli_query($conn,$sg1);
									      $FEsg1=mysqli_fetch_array($Esg1);	
                      $PId=$resultProducts["product_id"];
	            if($PId!=$_REQUEST['pid']){											  
					  ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="product-details.php?pid=<?php echo $resultProducts["product_id"]; ?>&sid=<?php echo $resultProducts["body_type"]; ?>&cid=<?php echo $resultProducts["category_id"]; ?>"><img src="<?php echo $resultProducts["photo"]; ?>" style="height:220px" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $resultProducts["product_id"]; ?>&sid=<?php echo $resultProducts["body_type"]; ?>&cid=<?php echo $resultProducts["category_id"]; ?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $resultProducts["product_title"]; ?></h4>
								 <h6><?php echo $FEsg1["segment"]; ?></h6>
                                 <h5>  &#8377; <?php echo $resultProductsVendor["product_amount"]; ?></h5>
                                </div>
                            </div>
                        </div>                                    
					  <?php } } ?>					                                                                    
                    </div>
					
					
         	                    <!-- Dynamic Pagination -->
							    <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                     <li class="page-item next"><a class="page-link" href="product-details.php?page=<?= $Previous; ?>&pid=<?php echo $_REQUEST['pid']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
									<?php for($i = 1; $i<= $page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="product-details.php?page=<?= $i; ?>&pid=<?php echo $_REQUEST['pid']; ?>">
									<?php if($_REQUEST['page']==$i) { ?>
									<span style="color:red">
									<?php echo $i; ?>
									</span>
									<?php } else {
										  echo $i;
									    }
									?>										
									</a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="product-details.php?page=<?php echo $Next; ?>&pid=<?php echo $_REQUEST['pid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>							
								<!-- Dynamic Pagination End -->	
                </div>
            </div>
        </section>
	
        <!--================End Related Product Area =================-->
		
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>
function createSlick(){  

	$(".slider").not('.slick-initialized').slick({
		centerMode: true,
	    autoplay: true,
	    dots: true,
	
  		slidesToShow: 3,
	    responsive: [{ 
	        breakpoint: 768,
	        settings: {
	            dots: false,
	            arrows: false,
	            infinite: false,
	            slidesToShow: 1,
	            slidesToScroll: 1
	        } 
	    }]
	});	

}

createSlick();

//Will not throw error, even if called multiple times.
$(window).on( 'resize', createSlick );

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
  var open = false;
  $('.circle-bg').on('click', function() {
    if(open === false)
      {
       $(this).animate({
          height: '+=10px',
          width: '+=10px'
       }, 300);
        
     $('.outer-icons').animate({
         opacity: 1
        }, 1000);
        
     $('.icon').fadeOut();
     $(this).html("<i class = 'icon fa fa-times' style='display: none'> </i>");
     $('.icon').fadeIn();
        
        open = true;
      }
    
    else {
      $(this).animate({
        height: '-=10px',
        width: '-=10px'
      }, 200);
    
    $('.outer-icons').animate({
        opacity: 0
      }, 300);
      
    $('.icon').fadeOut();
     $(this).html("<i class = 'icon fa fa-share-alt' style='display: none'> </i>");
     $('.icon').fadeIn();
      
      open = false;
  } 
    
 });
  
});
</script>
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	