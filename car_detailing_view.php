<!--- Header Area --->		
<?php
//session_start();
include('header.php');
error_reporting(0);
   
   /* if($_SESSION['customer_id']=='')
    {	   
	  header('location: signin.php');
    }    */
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
                    <h3>Car Service in India</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li hidden><a href="#">Shop</a></li>
                        <li class="current"><a href="#">Car Service</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details Area =================-->
		<?php
		  $imageurl="admin/dist/uploads/";
		  
		  //Get SONo------------------------------------
           $p="select * from tbl_number_generate where id='1'";
           $Ep=mysqli_query($conn,$p);
           $Fp=mysqli_fetch_array($Ep);
           //echo $pn=$Seion."-".$Fp['son'];
		     $pn=MYCD20."-".$Fp['son'];
          //--------------------------------------------

		    //echo $pd="SELECT * FROM tbl_vendor_services WHERE id='".$_REQUEST['pid']."' ";
			$pd="SELECT * FROM tbl_vendor_services WHERE service_id='".$_REQUEST['sid']."' AND category_id='".$_REQUEST['cid']."' AND vehicle_segment_id='".$_REQUEST['sgid']."'";
		    $Epd=mysqli_query($conn,$pd);
		    $Fpd=mysqli_fetch_array($Epd);
		  
		         if($_REQUEST['service_order_no']!="")
			     {
			      $ps=$_REQUEST['service_order_no'];
			     }
			     else {
			      $ps=$pn; 
			     }		
		   
		         $pd1="SELECT * FROM tbl_services WHERE id='". $Fpd['service_id']."'";
			     $Epd1=mysqli_query($conn,$pd1);
		         $Fpd1=mysqli_fetch_array($Epd1);
				 
				 $result121 ="SELECT * from tbl_segment where id='".$Fpd['vehicle_segment_id']."'";
	             $custCount21 =  mysqli_query($conn,$result121);
                 $rowcount221 = mysqli_fetch_array($custCount21);
				 
				  $tblv="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$Fpd['vendor_id']."'";
				  $Etblv =  mysqli_query($conn,$tblv);
                  $FEtblv = mysqli_fetch_array($Etblv);
		  
			     $result0 = $Fpd['id'];
			     $result1 = $Fpd['photo'];
			     $result2 = $Fpd1['service_name'];	
			     $result3 = $Fpd['category_id'];
			     $result4 = $Fpd['amount'];
			     $result5 = $rowcount221['segment'];
				 $result7 = $rowcount221['id'];
			     $result6 = $Fpd['vendor_id'];
				 $result8 = $FEtblv['vendor_name'];
				 $result9 = $FEtblv['city'];
			     $result10 = $Fpd1['services_include'];
		?>
		
	<?php
	              	  if($_POST['appointment_date']>=date('Y-m-d')){
	 if(isset($_POST['form1'])) {
	 $valid = 1;	 
	 
		     $result123 ="SELECT * from tbl_service_appointment where service_order_no='".$_POST['service_order_no']."' and appointment_date='".$_POST['appointment_date']."' and appointment_time='".$_POST['appointment_time']."' and vendor_service_id='".$_POST['vendor_service_id']."' and vendor_id='".$_POST['vendor_id']."' and category_id='".$_POST['category_id']."'  ";
	         $custCount23 = mysqli_query($conn,$result123);
			 $rowcount = mysqli_num_rows($custCount23);
             $rowcount223 = mysqli_fetch_array($custCount23);
			 
		if($rowcount>0) {
        $error_message .= "Please Choose Some Other Time.<br>";
		} else {           	
    	
		$qr="INSERT INTO tbl_service_appointment SET service_order_no='".$_POST['service_order_no']."',vendor_id='".$_POST['vendor_id']."',appointment_date='".$_POST['appointment_date']."',appointment_time='".$_POST['appointment_time']."',vendor_service_id='".$_POST['vendor_service_id']."',category_id='".$_POST['category_id']."',vehicle_segment_id='".$result7."',customer_id='".$_SESSION['customer_id']."',service_status='Pending',status='Active'";		     		   	     
	    $Eqr=mysqli_query($conn,$qr);		
		$id=mysqli_insert_id($conn);	

				
		//$success_message = 'Service added successfully.';
        header("location:customer_vehicle_details.php?id=$id");		
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
                            <h2><?php echo $result2; ?></h2>
							<h3><?php echo $result5; ?></h3>
                            <h5><?php echo $result10; ?></h5> 							
                            <h6>&#8377; <span><b><?php echo $result4; ?></b></span></h6>
							<div>&nbsp;</div>	
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
						        <option value="">Select The Time</option>
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
                                <input  class="form-control" name="vendor_name" id="vendor_name"  value="<?php echo $result8; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                                <input type="hidden" class="form-control" name="vendor_id" id="vendor_id"  value="<?php echo $result6;  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
              	            </div>	
						 	<div class="form-group row mb-4">
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> City </label>
				              <div class="col-sm-12 col-md-7">
                                <input  class="form-control" name="city" id="city"  value="<?php echo $result9;  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
              	              </div>
              	            </div>
							
							<div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12  col-lg-3">Service Order No</label>					          
                              <div class="col-sm-12 col-md-7">
                               <input type="text" name="service_order_no" id="service_order_no" value="<?php echo $ps; ?>" class="form-control" readonly>
                              </div>
                            </div>
				
				            <div class="form-group row mb-4" hidden>
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Service </label>
				              <div class="col-sm-12 col-md-7">
                               <input  class="form-control" name="vendor_service_id" id="vendor_service_id"  value="<?php echo $Fpd['service_id'];  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
              	              </div>
              	            </div>		
				
				            <div class="form-group row mb-4" hidden>
			                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Category ID </label>
				              <div class="col-sm-12 col-md-7">
                               <input  class="form-control" name="category_id" id="category_id"  value="<?php echo $result3;  ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
              	              </div>
              	            </div>

                            <div class="quantity">
                                <div class="custom" hidden>
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                  <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>
								
								 <button  class="btn btn-primary" name="form1" type="submit">Add To Service</button>
								
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
         <section class="product_description_area"> </section>		
        <!--================End Related Product Area =================-->
        <?php	
		
		 
				//$i=0;
				 $service_name=$Fpd1['service_name'];
				
				

         $str = $service_name;
        $arr2 = preg_split("~\s+~",$str);
 $arrlength = count($arr2);
for ($x = 0; $x < $arrlength; $x++) {
   $arr2[$x]."<br>";
   
   	            $spv="select * from tbl_services where  MATCH (service_name) AGAINST ('$arr2[$x]')";
					  $Espv=mysqli_query($conn,$spv);
					 while($spv1=mysqli_fetch_array($Espv)){
						   $id=$spv1['service_name']."<br>";
						 // $arr2[$x]."<br>";
					 }
					 
}


         //Listing All Products Start		 
		 	$i1=0;
		 
		    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 8;
	        $page = isset($_GET['page']) ? $_GET['page'] : 1;
	        $start = ($page - 1) * $limit;
								  
            // $qe="select * from  tbl_vendor_services where service_id=$id AND category_id='".$_REQUEST['cid']."' AND vehicle_segment_id='".$_REQUEST['sgid']."' LIMIT $start, $limit";
			 $qe="select t1.*,t2.photo,t2.amount from tbl_services t1 Left join tbl_vendor_services t2 ON t1.id=t2.service_id where MATCH (t1.service_name) AGAINST ('$id') AND t2.category_id='".$_REQUEST['cid']."' AND t2.vehicle_segment_id='".$_REQUEST['sgid']."' ";
            $Eqe=mysqli_query($conn,$qe);
            $sizeProducts=mysqli_num_rows($Eqe);	
		   
         //Listing All Products End
        ?>
        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title">Related Services</h2>
                    <div class="row">
					        <?php while($resultProducts=mysqli_fetch_array($Eqe)) {

                                $result12 ="SELECT * from tbl_services where id='".$resultProducts['id']."'";
	                            $custCount2 =  mysqli_query($conn,$result12);
                                $rowcount22 = mysqli_fetch_array($custCount2);

	                            $result121 ="SELECT * from tbl_segment where id='".$_REQUEST['sgid']."'";
	                            $custCount21 =  mysqli_query($conn,$result121);
                                $rowcount221 = mysqli_fetch_array($custCount21);
										  
								$result1 ="SELECT count(category_id) AS id FROM tbl_vendor_services Where category_id='".$_REQUEST['cid']."'";
	                            $custCount =  mysqli_query($conn,$result1);
                                $rowcount = mysqli_fetch_row($custCount);
										  
								    $total = $rowcount[0];
	                                $pages = ceil( $total / $limit );

	                                    $Previous = $page - 1;
	                                    $Next = $page + 1;
										  
										$i1++;
										
					$PId=$resultProducts["id"];
	            if($PId!=$_REQUEST['pid']){
							?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="car_detailing_view.php?pid=<?php echo $resultProducts["id"]; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>&sid=<?php echo $rowcount22['id']; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><img src="<?php echo $resultProducts["photo"]; ?>" style="height:220px" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="car_detailing_view.php?pid=<?php echo $resultProducts["id"]; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>&sid=<?php echo $rowcount22['id']; ?>&cid=<?php echo $_REQUEST['cid']; ?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $rowcount22["service_name"]; ?></h4>
                                 <h5>  <?php echo $rowcount221["segment"]; ?></h5>
                                 <h6>  &#8377; <?php echo $resultProducts["amount"]; ?></h6>
                                </div>
                            </div>
                        </div>                                    
							<?php } }?>                                                                    
                    </div>
					
					<!-- Dynamic Navigation Start -->
               	    <nav aria-label="Page navigation example" class="pagination_area">
                     <ul class="pagination">                                                                                 			 
				      <li class="page-item next"><a class="page-link" href="car_detailing_view.php?page=<?= $Previous; ?>&pid=<?php echo $_REQUEST['sid']; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
					   <?php for($i = 1; $i<= $page; $i++) : ?>
                        <li class="page-item"><a class="page-link" href="car_detailing_view.php?page=<?= $i; ?>&pid=<?php echo $_REQUEST['sid']; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>">
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
                      <li class="page-item next"><a class="page-link" href="car_detailing_view.php?page=<?php echo $Next; ?>&pid=<?php echo $_REQUEST['sid']; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
	                 </ul>
                    </nav>
   					<!-- Dynamic Navigation End -->

                </div>
            </div>
        </section>
        <!--================End Related Product Area =================-->
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	