<!--- Header Area --->		
<?php
//session_start();
include('header.php');
error_reporting(0);
   
    // if($_SESSION['customer_id']=='')
    // {	   
	  // header('location: signin.php');
    // }    
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
        <section class="services_details_banner_area">
            <div class="container">			
                <div class="c_banner_inner">
                    <h3>Special Package Offers</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li hidden><a href="#">Shop</a></li>
                        <li class="current"><a href="#">Car Service Package</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details Area =================-->
		<?php
		  $imageurl="admin/dist/uploads/service_packages/";
		  
		    //Get SONo------------------------------------
              $p="select * from tbl_number_generate where id='1'";
              $Ep=mysqli_query($conn,$p);
              $Fp=mysqli_fetch_array($Ep);
              //echo $pn=$Seion."-".$Fp['son'];
		      $pn=MYCD20."-".$Fp['son'];
            //--------------------------------------------

		      // $pd="SELECT * FROM tbl_packages WHERE service_id='".$_REQUEST['sid']."' AND category_id='".$_REQUEST['cid']."' AND vehicle_segment_id='".$_REQUEST['sgid']."'";
			 $pd="SELECT * FROM tbl_packages WHERE id='".$_REQUEST['pid']."' ";			
		     $Epd=mysqli_query($conn,$pd);
		     $Fpd=mysqli_fetch_array($Epd);
			 
			     $vsg ="SELECT * from tbl_segment where id='".$Fpd['vehicle_segment']."'";
	             $Fvsg =  mysqli_query($conn,$vsg);
                 $EFvsg = mysqli_fetch_array($Fvsg);
				 
				  $tblv="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$Fpd['vendor_id']."'";
				  $Etblv =  mysqli_query($conn,$tblv);
                  $FEtblv = mysqli_fetch_array($Etblv);		  		        		   
		         	
$vendor_name=$FEtblv['vendor_name'];				
		?>
		
	<?php
	 if($_POST['appointment_date']>=date('Y-m-d')){
	 if(isset($_POST['form1'])) {
	 $valid = 1;	 
	 
		     $result123 ="SELECT * from tbl_service_appointment where service_order_no='".$_POST['package_no']."' and appointment_date='".$_POST['appointment_date']."' and appointment_time='".$_POST['appointment_time']."' and vendor_service_id='".$_POST['vendor_service_id']."' and vendor_id='".$_POST['vendor_id']."' and category_id='".$_POST['category_id']."'  ";
	         $custCount23 = mysqli_query($conn,$result123); 
			 $rowcount = mysqli_num_rows($custCount23);
             $rowcount223 = mysqli_fetch_array($custCount23); 
			 
		if($rowcount>0) {
        $error_message .= "Please Choose Some Other Time.<br>";
		} else {           	
    	
		$qr="INSERT INTO tbl_service_appointment SET service_order_no='".$_POST['package_no']."',vendor_id='".$_POST['vendor_id']."',appointment_date='".$_POST['appointment_date']."',appointment_time='".$_POST['appointment_time']."',vendor_service_id='".$_POST['vendor_service_id']."',category_id='".$_POST['category_id']."',vehicle_segment_id='".$Fpd['vehicle_segment']."',customer_id='".$_SESSION['customer_id']."',service_status='Pending',status='Active'";		     		   	     
	    $Eqr=mysqli_query($conn,$qr);		
		$id=mysqli_insert_id($conn);

				
		//$success_message = 'Service added successfully.';
        header("location:customer_vehicle_details_package.php?id=$id");		
	   }
	 }	   
	} 
	?>
<section class="product_details_area">	
<!-- Success Msg -->		
<div class="container">
  <?php if($success_message): ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success_message; ?>
  </div>
  <?php endif; ?>
  <?php if($error_message): ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="signin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo $error_message; ?>
  </div>
</div> 
<?php endif; ?>    
<!-- Success Msg End -->
		
            <div class="container">
			 <form method="post">
                <div class="row">
                    <div class="col-lg-5">                       
						<div class="product_details_slider">                            
							<div id="product_slider2" class="rev_slider" data-version="5.3.1.6">
                                <ul><!-- SLIDE  -->
                                  <li data-index="rs-28" data-transition="scaledownfromleft" data-slotamount="default"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb="<?php echo $Fpd['photo']; ?>"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Umbrella" data-param1="September 7, 2015" data-param2="Alfon Much, The Precious Stones" data-description="">
                                     <!-- MAIN IMAGE -->
                                    <img src="<?php echo $Fpd['photo']; ?>"  alt=""  width="1920" height="1080" data-lazyload="<?php echo $Fpd['photo']; ?>" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                     <!-- LAYERS -->
                                 </li>                             
                                </ul>								
                            </div>							
                        </div>                    
					</div>
                    <div class="col-lg-7">
                        <div class="product_details_text">
                            <h2><?php echo $Fpd['package_name']; ?></h2>
							<h3><?php echo $EFvsg['segment']; ?></h3>
							 <h6> &#8377; <span><b><?php echo $Fpd['package_amount']; ?></b></span></h6>

							 <?php
                              $sn="SELECT * FROM `tbl_packages_services` WHERE package_no='".$Fpd['package_no']."'";
							  $Esn=mysqli_query($conn,$sn);
							  while($FEsn=mysqli_fetch_array($Esn)){

                                $sc="SELECT * FROM tbl_services WHERE id='".$FEsn['service']."'";
                                $Esc=mysqli_query($conn,$sc);
							    $FEsc=mysqli_fetch_array($Esc);
                               
							   								
                             ?> 	
							<h3><?php echo  $FEsc['service_name']; ?></h3>
							  <?php } ?>
							
							<div>&nbsp;</div>
							<div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12  col-lg-3">Package No</label>					          
                              <div class="col-sm-12 col-md-7">
                               <input type="text" name="package_no" id="package_no" value="<?php echo $Fpd['package_no']; ?>" class="form-control" readonly>
                              </div>
                            </div>												                           
							
							<div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12  col-lg-3">Date</label>
                              <div class="col-sm-12 col-md-7">
                               <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
                              </div>
                            </div>	
					
					    	<div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Time</label>
                             <div class="col-sm-12 col-md-7">
                              <select class="form-control selectric" name="appointment_time" id="appointment_time">
						        <option value="">-- Select The Time --</option>
						        <option value="06 AM - 07 AM">06 AM - 07 AM</option>
						        <option value="07 AM - 08 AM">07 AM - 08 AM</option>
						        <option value="08 AM - 09 AM">08 AM - 09 AM</option>
						        <option value="09 AM - 10 AM">09 AM - 10 AM</option>
						        <option value="10 AM - 11 AM">10 AM - 11 AM</option>
						        <option value="11 AM - 12 PM">11 AM - 12 PM</option>
						        <option value="12 PM - 01 PM">12 PM - 01 PM</option>
						        <option value="01 PM - 02 PM">01 PM - 02 PM</option>
						        <option value="02 PM - 03 PM">02 PM - 03 PM</option>
						        <option value="03 PM - 04 PM">03 PM - 04 PM</option>
						        <option value="04 PM - 05 PM">04 PM - 05 PM</option>
						        <option value="05 PM - 06 PM">05 PM - 06 PM</option>
						        <option value="06 PM - 07 PM">06 PM - 07 PM</option>
						        <option value="07 PM - 08 PM">07 PM - 08 PM</option>
						        <option value="08 PM - 09 PM">08 PM - 09 PM</option>
						        <option value="09 PM - 10 PM">09 PM - 10 PM</option>
						        <option value="10 PM - 11 PM">10 PM - 11 PM</option>
						        <option value="11 PM - 12 PM">11 PM - 12 PM</option>
						        <option value="12 AM - 01 AM">12 AM - 01 AM</option>								
                              </select>
                             </div>
                            </div>	
					
				            <div class="form-group row mb-4" hidden>
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Time </label>
				              <div class="col-sm-12 col-md-7">
                               <input  class="form-control" name="entry_time" id="entry_time"  value="<?php echo date('H:00:a');  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
              	              </div>
              	            </div>							
				
				            <div class="form-group row mb-4">
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Vendor </label>
				              <div class="col-sm-12 col-md-7">
                                <input  class="form-control" name="vendor_name" id="vendor_name"  value="<?php echo $vendor_name; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                                <input type="hidden" class="form-control" name="vendor_id" id="vendor_id"  value="<?php echo $Fpd['vendor_id'];  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
              	            </div>	
							
							<div class="form-group row mb-4">
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> City </label>
				              <div class="col-sm-12 col-md-7">
                                <input  class="form-control" name="city" id="city"  value="<?php echo $FEtblv['city'];  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
              	            </div>
							
							<div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12  col-lg-3">Service Order No</label>					          
                              <div class="col-sm-12 col-md-7">
                               <input type="text" name="service_order_no" id="service_order_no" value="<?php echo $pn; ?>" class="form-control" readonly>
                              </div>
                            </div>
				
				            <div class="form-group row mb-4" hidden>
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Package Id </label>
				              <div class="col-sm-12 col-md-7">
                               <input  class="form-control" name="vendor_service_id" id="vendor_service_id"  value="<?php echo $Fpd['id'];  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
              	              </div>
              	            </div>		
				
				            <div class="form-group row mb-4" hidden>
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Category ID </label>
				              <div class="col-sm-12 col-md-7">
                               <input  class="form-control" name="category_id" id="category_id"  value="<?php echo $Fpd['category']; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
              	              </div>
              	            </div>

                            <div class="quantity">
                                <div class="custom" hidden>
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                  <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>
								
								 <button  class="btn btn-primary" name="form1" type="submit">Add To Package</button>
								
								 <button  class="btn btn-danger" name="inv" type="submit" hidden>Submit Invoice</button>
								
								</form>
								<div id="addmsg" style="color: green"></div>
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
						
                        <div class="product_table_details" hidden>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                          <th scope="row">Return Policy:</th>
                                           <td>
                                             <h6><?php echo $Fpd['product_return_policy']; ?></h6>                                                
                                           </td>
                                        </tr>                                                                               
                                    </tbody>
                                </table>
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
		<section class="product_description_area"></section>         
        <!--================End Related Product Area =================-->
        <?php	
		
						//$i=0;
				 $package_name=$Fpd['package_name'];
				
				

         $str = $package_name;
        $arr2 = preg_split("~\s+~",$str);
 $arrlength = count($arr2);
for ($x = 0; $x < $arrlength; $x++) {
   $arr2[$x]."<br>";
   
   	            $spv="select * from tbl_packages where  MATCH (package_name) AGAINST ('$arr2[$x]')";
					  $Espv=mysqli_query($conn,$spv);
					 while($spv1=mysqli_fetch_array($Espv)){
						   $id=$spv1['package_name']."<br>";
						 // $arr2[$x]."<br>";
					 }
					 
}

         //Listing All Products Start		 
		 	$i1=0;
		 
		   /*  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 8;
	        $page = isset($_GET['page']) ? $_GET['page'] : 1;
	        $start = ($page - 1) * $limit; */
								  
             $qe="select * from  tbl_packages where MATCH(package_name) AGAINST(trim('$id')) AND  category='18' AND vehicle_segment='".$_REQUEST['sid']."'";
            $Eqe=mysqli_query($conn,$qe);
            $sizeProducts=mysqli_num_rows($Eqe);	
		   
         //Listing All Products End
        ?>
        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title">Related Packages</h2>
                    <div class="row">
					        <?php while($resultProducts=mysqli_fetch_array($Eqe)) {

                                $result12 ="SELECT * from tbl_services where id='".$resultProducts['service']."'";
	                            $custCount2 =  mysqli_query($conn,$result12);
                                $rowcount22 = mysqli_fetch_array($custCount2);

	                            $result121 ="SELECT * from tbl_segment where id='".$resultProducts['vehicle_segment']."'";
	                            $custCount21 = mysqli_query($conn,$result121);
                                $rowcount221 = mysqli_fetch_array($custCount21);
										  
								/* $result1 ="SELECT count(category) AS id FROM tbl_packages Where category='19'";
	                            $custCount =  mysqli_query($conn,$result1);
                                $rowcount = mysqli_fetch_row($custCount);
										  
								    $total = $rowcount[0];
	                                $pages = ceil( $total / $limit );

	                                    $Previous = $page - 1;
	                                    $Next = $page + 1;
										  
										$i1++; */
						$PId=$resultProducts["id"];
	            if($PId!=$_REQUEST['pid']){
							?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="special_package_details_view.php?pid=<?php echo $resultProducts["id"]; ?>&sid=<?php echo $_REQUEST['sid']; ?>"><img src="<?php echo $resultProducts["photo"]; ?>" style="height:220px" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="special_package_details_view.php?pid=<?php echo $resultProducts["id"]; ?>&sid=<?php echo $_REQUEST['sid']; ?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $resultProducts["package_name"]; ?></h4>
                                 <h5>  <?php echo $rowcount221["segment"]; ?></h5>
                                 <h6>  &#8377; <?php echo $resultProducts["package_amount"]; ?></h6>
                                </div>
                            </div>
                        </div>                                    
							<?php }} ?>                                                                    
                    </div>
					
					<!-- Dynamic Navigation Start -->
               	    <!-- <nav aria-label="Page navigation example" class="pagination_area">
                     <ul class="pagination">								  
				     <?php //for($i = 1; $i<= $pages; $i++) : ?>
                     <li class="page-item"><a class="page-link" href="car-services_view.php?page=<?php //echo $i; ?>&cid=<?php //echo $_REQUEST['cid']; ?>"><?php //echo $i; ?></a></li>
                     <?php //endfor;  ?>									                                   
                     <li class="page-item next"><a class="page-link" href="car-services_view.php?pages=<?php //echo $Next; ?>&cid=<?php //echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
	                 </ul>
                     </nav> -->
   					 <!-- Dynamic Navigation End -->

                </div>
            </div>
        </section>
        <!--================End Related Product Area =================-->
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	