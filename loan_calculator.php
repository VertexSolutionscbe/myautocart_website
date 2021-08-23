        <!--- Header Area --->
<?php
//session_start();
include('header.php');

?>
	    <!--- Header Area End --->
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


function GetTotal()
 {
	var product_amount= parseFloat(document.getElementById('product_amount').value);
	var down_payment=0;
	
	var down_payment = document.getElementById('down_payment_adj').value;
	// down_payment=parseFloat(document.getElementById('down_payment').value);
	var total=product_amount - down_payment; 
	document.getElementById('balance_amount').value=total;
	document.getElementById('loan_amount').value=total;	
 }

function emi_calculator() 
 { 
    var p = parseFloat(document.getElementById('loan_amount').value);
	var r = document.getElementById('loan_percentage1').value;
	// var r=parseFloat(document.getElementById('loan_percentage').value);
	var t = document.getElementById('months1').value;
	// var t = parseFloat(document.getElementById('months').value);
    emi=0; 
  
    // one month interest 
    r1 = r / (12 * 100); 
      
    // one month period 
    t1 = t * 1;  
     
    emi = (p * r1 * (Math.pow(1 + r1, t1))) /  
                  ((Math.pow(1 + r1, t1)) - 1); 
  
    document.getElementById('emi_month').value= Math.round(emi);
 } 
</script>	
        <!--================Categories Banner Area =================-->
        <section class="loan_cal_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Loan Calculation</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Check</a></li>   
                        <li class="current"><a href="#">Loan Calculation</a></li>
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
		   
		    $amount=$Fpd['product_amount'];
		   
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
				 
			 $ts="SELECT * FROM tbl_segment WHERE id='".$Fpd['body_type']."'";
		     $Ets=mysqli_query($conn,$ts);
		     $FEts=mysqli_fetch_array($Ets);
			 
			 $pv="SELECT * FROM tbl_vendor_products WHERE product_id='".$Fpd['product_id']."' and VendorStatus='Active'";
			 $Epv=mysqli_query($conn,$pv);
		     $FEpv=mysqli_fetch_array($Epv);
			 
			 $tv="SELECT * FROM tbl_vendor WHERE vendor_id='".$FEpv['vendor_id']."'";
			 $Etv=mysqli_query($conn,$tv);
		     $FEtv=mysqli_fetch_array($Etv);
			 
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
                                    <li data-index="rs-28" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $imageurl.$Fpd['photo']; ?>"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Umbrella" data-param1="September 7, 2015" data-param2="Alfon Much, The Precious Stones" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $imageurl.$Fpd['photo']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $imageurl.$Fpd['photo']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <li data-index="rs-303" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $imageurl.$Fpd1['photo_1']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="The Dreaming Girl" data-param1="September 6, 2015" data-param2="Lol" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $imageurl.$Fpd1['photo_1']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $imageurl.$Fpd1['photo_1']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-301" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $imageurl.$Fpd1['photo_3']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Ride my Bike" data-param1="September 4, 2015" data-param2="Why not another Image?" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $imageurl.$Fpd1['photo_3']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $imageurl.$Fpd1['photo_3']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-302" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $imageurl.$Fpd1['photo_4']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Ride my Bike" data-param1="September 4, 2015" data-param2="Why not another Image?" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?php echo $imageurl.$Fpd1['photo_4']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $imageurl.$Fpd1['photo_4']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product_details_text">
                            <h3><?php echo $Fpd['product_title']; ?></h3>
                                                                                                    
 							<div class="form-group row mb-4">
			                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> <b>Product Amount : </b></label>
				               <div class="col-sm-6 col-md-3">
                                 <input  class="form-control" name="product_amount" id="product_amount"  value="<?php echo $amount;  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	               </div>
              	            </div>
                           
							<div class="form-group row mb-4">
				              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> <b>Down Payment : </b></label>
				               <div class="col-sm-6 col-md-3">
                                <div class="price-field">
                                 <input type="range"  min="0" max="2500000" value="0" id="lower1" name="lower1" onChange="GetTotal()" hidden>
                                 <input type="range"  min="0" max="2500000" value="2500000" id="upper1" name="upper1" onChange="GetTotal()">		                        
                                </div>                 
				               </div>
                            </div>							 							 
							<div class="form-group row mb-4">
			                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price </label>
				                <div class="col-sm-6 col-md-3" hidden>
                                 <input  class="form-control" name="down_payment" id="down_payment" onKeyuP="GetTotal();" onKeyPress="" style="text-transform:uppercase" readonly>
              	                </div>
				                <div class="price-wrap_line" hidden>-</div>
				                <div class="col-sm-6 col-md-3">
                                  <input  class="form-control" name="down_payment_adj" id="down_payment_adj" onKeyuP="GetTotal();" onKeyPress="" style="text-transform:uppercase">
              	                </div>				 
              	            </div>				    
                             
							<div class="form-group row mb-4"  >
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> <b>Balance Amount : </b></label>
				              <div class="col-sm-6 col-md-3">
                                <input  class="form-control" name="balance_amount" id="balance_amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
              	            </div>				
				
							<div class="form-group row mb-4">
				             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b>Interest % : </b></label>
				              <div class="col-sm-6 col-md-3">
                             <div class="price-field">
                               <input type="range"  min="0" max="50" value="0" id="lower2" name="lower2" onChange="emi_calculator()" hidden>
                               <input type="range"  min="0" max="50" value="50" id="upper2" name="upper2" onChange="emi_calculator()">		                       
                             </div>  
				             </div>
                            </div>	                        
							<div class="form-group row mb-4">
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest % </label>
				              <div class="col-sm-6 col-md-3" hidden>
                               <input  class="form-control" name="loan_percentage" id="loan_percentage" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
				             <div class="price-wrap_line" hidden>-</div>
				             <div class="col-sm-6 col-md-3">
                               <input  class="form-control" name="loan_percentage1" id="loan_percentage1" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
              	             </div>
              	            </div>				
				
				            <div class="form-group row mb-4"  >
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b> Loan Amount : </b></label>
				             <div class="col-sm-6 col-md-3">
                              <input  class="form-control" name="loan_amount" id="loan_amount"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	             </div>
              	            </div>

				            <div class="form-group row mb-4">
				             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> <b>No Of Months : </b></label>
				             <div class="col-sm-6 col-md-3">
                              <div class="price-field">
                               <input type="range"  min="0" max="72" value="0" id="lower3" name="lower3" onChange="emi_calculator()" hidden>
                               <input type="range"  min="0" max="72" value="72" id="upper3" name="upper3" onChange="emi_calculator()">		                       
                              </div>                   
				             </div>
                            </div>
				
				            <div class="form-group row mb-4"  >
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Months </label>
				             <div class="col-sm-6 col-md-3" hidden>
                               <input  class="form-control" name="months" id="months" onKeyUp="emi_calculator();" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	             </div>
				             <div class="price-wrap_line" hidden>-</div>
				             <div class="col-sm-6 col-md-3">
                               <input  class="form-control" name="months1" id="months1" onKeyUp="emi_calculator();" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
              	             </div>
              	            </div>				
				
				            <div class="form-group row mb-4"  >
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><b> EMI / Month  :</b></label>
				             <div class="col-sm-6 col-md-3">
                               <input  class="form-control" name="emi_month" id="emi_month"    onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	             </div>
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
                <nav class="tab_menu" >
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
		
		
		<!--================Product Description Area =================-->
        
            <section class="product_description_area">
			
			
            </section>
        <!--================End Product Details Area =================-->
		
        
        <!--================End Related Product Area =================-->
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
        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title">Other Vendors </h2>
                    <div class="row">
					  <?php 
					  //Listing All Products Start
					  //$spv="select * from tbl_vendor_products where product_id='".$_REQUEST['pid']."'";
					  $spv="select t1.*,t2.vendor_name from tbl_vendor_products t1 left join tbl_vendor t2 on t1.vendor_id=t2.vendor_id where t1.product_id='".$_REQUEST['pid']."'";
					  $Espv=mysqli_query($conn,$spv);
					  while($resultProductsVendor=mysqli_fetch_array($Espv))
					  {
					  $qe1="select * from  tbl_products where product_id='".$resultProductsVendor['product_id']."'";
					  $Eqe1=mysqli_query($conn,$qe1);
					  $sizeProducts=mysqli_num_rows($Eqe1);
					  $resultProducts=mysqli_fetch_array($Eqe1);					  
					  ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="product-details-vendor.php?pid=<?php echo $resultProducts["product_id"]; ?>&vid=<?php echo $resultProductsVendor['vendor_id']; ?>&pvid=<?php echo $resultProductsVendor['id'];?>"><img src="<?php echo $imageurl.$resultProducts["photo"]; ?>" style="height:220px" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="product-details-vendor.php?pid=<?php echo $resultProducts["product_id"]; ?>&vid=<?php echo $resultProductsVendor['vendor_id']; ?>&pvid=<?php echo $resultProductsVendor['id'];?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $resultProducts["product_title"]; ?></h4>
								 <h6><?php echo $resultProductsVendor["vendor_name"]; ?></h6>
                                 <h5>  &#8377; <?php echo $resultProductsVendor["product_amount"]; ?></h5>
                                </div>
                            </div>
                        </div>                                    
					  <?php 
					  } ?>                                                                    
                    </div>
					
					
         	              <!-- Dynamic Pagination -->
							<nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="product-details.php?page=<?php echo $i; ?>&pid=<?php echo $_REQUEST['pid']; ?>"><?php echo $i; ?></a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="product-details.php?pages=<?php echo $Next; ?>&pid=<?php echo $_REQUEST['pid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>							
								<!-- Dynamic Pagination End -->	
                </div>
            </div>
        </section>
	
        <!--================End Related Product Area =================-->
		
<script>
var lowerSlider = document.querySelector('#lower1');
var  upperSlider = document.querySelector('#upper1');

document.querySelector('#down_payment_adj').value=upperSlider.value;
document.querySelector('#down_payment').value=lowerSlider.value;

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
    document.querySelector('#down_payment_adj').value=this.value
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
    document.querySelector('#down_payment').value=this.value
};
</script>
<script>
var lowerSlider = document.querySelector('#lower2');
var  upperSlider = document.querySelector('#upper2');

document.querySelector('#loan_percentage1').value=upperSlider.value;
document.querySelector('#loan_percentage').value=lowerSlider.value;

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
    document.querySelector('#loan_percentage1').value=this.value
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
    document.querySelector('#loan_percentage').value=this.value
};
</script>
<script>
var lowerSlider = document.querySelector('#lower3');
var  upperSlider = document.querySelector('#upper3');

document.querySelector('#months1').value=upperSlider.value;
document.querySelector('#months').value=lowerSlider.value;

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
    document.querySelector('#months1').value=this.value
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
    document.querySelector('#months').value=this.value
};
</script>
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	