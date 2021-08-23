        <!--- Header Area --->
	     <?php 
		  include('header.php'); 
		  ob_start();
          session_start();
		 ?>
	    <!--- Header Area End --->
	    <?php 	 
	      $apo="SELECT * FROM tbl_service_appointment WHERE appointment_id='".$_REQUEST['id']."'";
		  $Eapo=mysqli_query($conn,$apo);
		  $FEapo=mysqli_fetch_array($Eapo);
		  
		     $cn="SELECT * FROM tbl_customer WHERE customer_id='".$FEapo['customer_id']."'";
		     $Ecn=mysqli_query($conn,$cn);
		     $FEcn=mysqli_fetch_array($Ecn);
			 
			    $tv="SELECT * FROM tbl_vendor WHERE vendor_id='".$FEapo['vendor_id']."'";
		        $Etv=mysqli_query($conn,$tv);
		        $FEtv=mysqli_fetch_array($Etv);	

                $tc= "SELECT * FROM tbl_category WHERE category_id='".$FEapo['category_id']."'";
				$Etc=mysqli_query($conn,$tc);
		        $FEtc=mysqli_fetch_array($Etc);	

                $sg="SELECT * FROM tbl_segment WHERE id='".$FEapo['vehicle_segment_id']."'";
				$Esg=mysqli_query($conn,$sg);
			    $FEsg=mysqli_fetch_array($Esg);							  					      				
				
				$vs= "SELECT * FROM tbl_vendor_services WHERE service_id='".$FEapo['vendor_service_id']."' AND vendor_id='".$FEapo['vendor_id']."' AND  category_id='".$FEapo['category_id']."' AND vehicle_segment_id='".$FEsg['id']."'";
				$Evs=mysqli_query($conn,$vs);
		        $FEvs=mysqli_fetch_array($Evs);
				
				    $si="SELECT * FROM tbl_services WHERE id='".$FEapo['vendor_service_id']."'";
					$Esi=mysqli_query($conn,$si);
		            $FEsi=mysqli_fetch_array($Esi);
					
					 $siw="SELECT * FROM tbl_cust_service_vehicle_details WHERE customer_id='".$FEcn['customer_id']."'";
					$Esiw=mysqli_query($conn,$siw);
		            $FEsiw=mysqli_fetch_array($Esiw);
					
		                   
		   $customer_name	= $FEcn['f_name'];
           $customer_id = $FEapo['customer_id'];
           $appointment_id = $FEapo['appointment_id'];
		   $service_order_no = $FEapo['service_order_no'];
		   $vendor_name = $FEtv['vendor_name'];
		   $vendor_id = $FEapo['vendor_id'];
		   $category_name = $FEtc['category_name'];
		   $appointment_date = $FEapo['appointment_date'];
		   $appointment_time = $FEapo['appointment_time'];
		   $vendor_service_id = $FEapo['vendor_service_id'];
		   $category_id = $FEapo['category_id'];
		   $segment_id = $FEsg['id'];
		   $segment_name = $FEsg['segment'];
	       $amount =  $FEvs['amount'];
		   $service_name=$FEsi['service_name'];
		   $vehicle_no=$FEsiw['vehicle_no'];
		   $vehicle_id=$FEsiw['id'];
	    ?>	

		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Insurance | myautocart</title>      
          <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-159623414-1');			  
            </script>
	    </head>
		
		
<script> 
function getmodel() {
	
    var inputs = document.getElementById('make_brand').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_model.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#v_model").html(data);
		  }
		});
}

function getversion() {
	
    var inputs1 = document.getElementById('make_model').value;
    // alert("edfgjd"+inputs1);
	$.ajax({
	type: "POST",
	
	url: "get_version.php",
	
	data:{inputs1:inputs1},
	success: function(data){
		$("#v_version").html(data);
		  }
		});
}
function myFunction() {
  var x = document.getElementById("divInv");
  var y = document.getElementById("divInv1");
  if (x.style.display === "none") {
    x.style.display = "block";
	y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>

            <!--================Categories Banner Area =================-->
      
            <!--================End Categories Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                  <h1>Get Vehicle Details</h1>
				   <div>&nbsp;</div>
  <h3 align="left" onclick="myFunction()">Vehicle Details : <span ><button class="btn btn-primary" name="form2" type="submit">Add Vehicle +</button></span></h3>

			   </div>				 
            
			 	<div class="col-lg-12">		
                 <div class="contact_form_inner" id="divInv" style="display:none">
                    <form class="contact_us_form row" action="customer_vehicle_details_act.php" method="post">
					
                     <div class="form-group-control col-lg-3" >
						<label><b>Customer Name : </b></label>
						<input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>" placeholder="Vehicle Number" required readonly hidden>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $appointment_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>	

                      <div class="form-group-control col-lg-3 " hidden>
						<label><b>Service Order No : </b></label>
						<input type="text" class="form-control" id="service_order_no" name="service_order_no" value="<?php echo $service_order_no; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>
					 
					 <div class="form-group-control col-lg-3 " hidden>
						<label><b>Category Name : </b></label>
						<input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo $category_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>
					 
					 <div class="form-group-control col-lg-3 " >
						<label><b>Vendor Name : </b></label>
						<input type="text" class="form-control" id="vendor_name" name="vendor_name" value="<?php echo $vendor_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="vendor_id" name="vendor_id" value="<?php echo $vendor_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>
					 				
                     <div class="form-group-control col-lg-3 " hidden>
						<label><b>Appointment Date : </b></label>
						<input type="text" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo $appointment_date; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>	

                     <div class="form-group-control col-lg-3 "  >
						<label><b>Appointment Time : </b></label>
						<input type="text" class="form-control" id="appointment_time" name="appointment_time" value="<?php echo $appointment_time; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>
                     <div class="form-group-control col-lg-3" hidden>
						<label><b>Service Name : </b></label>
						<input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="vendor_service_id" name="vendor_service_id" value="<?php echo $vendor_service_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>

                      <div class="form-group-control col-lg-3" hidden>
						<label><b>Amount : </b></label>
						<input type="text" class="form-control" id="s_amount" name="s_amount" value="<?php echo $amount; ?>" required>
                     </div>				 
					
                     <div class="form-group-control col-lg-3" >
						<label><b>Vehicle Number : </b></label>
						<input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Vehicle Number" required>
                     </div>
								   					 					  
					  <div class="form-group col-lg-3">
						<label><b>Vehicle Type : </b></label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
						    <option>--- Select The Vehice Type ---</option>
						    <option value="two_wheeler">Two Wheeer</option>
						    <option value="four_wheeler">Four Wheeler</option>		
						    <option value="scooter">Scooter</option>		
                        </select>
                      </div>
						
                      <div class="form-group col-lg-3">
						<label><b>Make : </b></label>
                        <select class="form-control" name="make_brand" id="make_brand" onChange="getmodel(this.value);">
						    <option value="">--- Select The Brand ---</option>
							<?php						      
						      $qr="SELECT * FROM tbl_make ORDER BY id ASC";
							  $Eqr=mysqli_query($conn,$qr);
						      while($FEqr=mysqli_fetch_array($Eqr)){							  					      
						    ?>						  
                          <option value="<?php echo $FEqr['id']; ?>"><?php echo $FEqr['make']; ?></option>                          
						  <?php } ?>
                        </select>
                      </div>
					  
				      <div class="box-body">
				        <div  id="v_model" name="v_model"> </div>	
				      </div>
				      
    	   	          <div class="box-body">
				        <div  id="v_version" name="v_version"> </div>				
				      </div>          

                      <div class="form-group-control col-lg-3" >
						<label><b>Segment Type : </b></label>
						<input type="text" class="form-control" id="segment_name" name="segment_name" value="<?php echo $segment_name; ?>" required readonly>
						<input type="text" class="form-control" id="segment_id" name="segment_id" value="<?php echo $segment_id; ?>" required readonly hidden>                    
					 </div>					  
						
                      <div class="form-group col-lg-3">
						<label><b>Year</b></label>
                        <select class="form-control selectric" name="year" id="year">
						    <option value="">--- Select The Year ---</option>
						    <option value="2000">2000</option>
						    <option value="2001">2001</option>
						    <option value="2002">2002</option>
						    <option value="2003">2003</option>
						    <option value="2004">2004</option>
						    <option value="2005">2005</option>
						    <option value="2006">2006</option>
						    <option value="2007">2007</option>
						    <option value="2008">2008</option>
						    <option value="2009">2009</option>
						    <option value="2010">2010</option>
						    <option value="2011">2011</option>
						    <option value="2012">2012</option>
						    <option value="2013">2013</option>
						    <option value="2014">2014</option>
						    <option value="2015">2015</option>
						    <option value="2016">2016</option>
						    <option value="2017">2017</option>
						    <option value="2018">2018</option>
						    <option value="2019">2019</option>
						    <option value="2020">2020</option>					
                        </select>
                      </div>	
                    
			 <div class="form-group col-lg-10">                     
                         <button  class="btn btn-primary" name="form1" type="submit">Add Vehicle</button>
					  </div>

                 
					 					  
                    </form>
                  </div>
				  <div id="divInv1" style="" >
				  <form class="contact_us_form row" action="customer_vehicle_details_act.php" method="post">
				   <div class="form-group-control col-lg-3" >
						<label><b>Customer Name : </b></label>
						<input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>" placeholder="Vehicle Number" required readonly hidden>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $appointment_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>	

                     <div class="form-group-control col-lg-3" >
						<label><b>Service Order No : </b></label>
						<input type="text" class="form-control" id="service_order_no" name="service_order_no" value="<?php echo $service_order_no; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>
					 
					 <div class="form-group-control col-lg-3" >
						<label><b>Category Name : </b></label>
						<input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo $category_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>
					 
					 <div class="form-group-control col-lg-3" >
						<label><b>Vendor Name : </b></label>
						<input type="text" class="form-control" id="vendor_name" name="vendor_name" value="<?php echo $vendor_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="vendor_id" name="vendor_id" value="<?php echo $vendor_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>
					 				
                     <div class="form-group-control col-lg-3" >
						<label><b>Appointment Date : </b></label>
						<input type="text" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo $appointment_date; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>	

                     <div class="form-group-control col-lg-3" >
						<label><b>Appointment Time : </b></label>
						<input type="text" class="form-control" id="appointment_time" name="appointment_time" value="<?php echo $appointment_time; ?>" placeholder="Vehicle Number" required readonly>                     
					 </div>

                     <div class="form-group-control col-lg-3" >
						<label><b>Service Name : </b></label>
						<input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service_name; ?>" placeholder="Vehicle Number" required readonly>
                        <input type="text" class="form-control" id="vendor_service_id" name="vendor_service_id" value="<?php echo $vendor_service_id; ?>" placeholder="Vehicle Number" required readonly hidden>
					 </div>

                      <div class="form-group-control col-lg-3" >
						<label><b>Amount : </b></label>
						<input type="text" class="form-control" id="s_amount" name="s_amount" value="<?php echo $amount; ?>" readonly required>
                     </div>				 
					
                     <div class="form-group-control col-lg-3" >
						<label><b>Vehicle Number : </b></label>
						<select type="text" class="form-control" id="vehicle_no" name="vehicle_no" value="<?php echo $vehicle_no;?>" placeholder="Vehicle Number" required>
						<option value="">-- Select The Vehicle No --</option>
							<?php						      
						      $qr="SELECT * FROM tbl_cust_service_vehicle_details where customer_id='$customer_id' ORDER BY id ASC";
							  $Eqr=mysqli_query($conn,$qr);
						      while($FEqr=mysqli_fetch_array($Eqr)){							  					      
						    ?>						  
                          <option value="<?php echo $FEqr['vehicle_no']; ?>"><?php echo $FEqr['vehicle_no']; ?></option>                          
						  <?php } ?>
						  </select>
                     </div>
					
				      <div class="table-responsive">					  
					  <table class="table table-striped"  >
					   <thead>
                        <tr>
                          
						  <th>S.No</th>
                          <th>Customer Name</th>						  						  
                          <th>Vehicle No</th>						  						  
                          <th>Vehicle Make</th>						  						  
                          <th>Vehicle Model</th>						  						  
                          <th>Vehicle Segment</th>						  						  
                          <th>Vehicle Type</th>						  						  
                                           						  						  
                        </tr>
                       </thead>
					   <?php
            	        $i=0;
						 $trt="SELECT * FROM `tbl_cust_service_vehicle_details` WHERE customer_id='$customer_id'";
						$tpr=mysqli_query($conn,$trt);	
						while($tpp=mysqli_fetch_array($tpr)){
							
							 $cn="SELECT * FROM tbl_customer WHERE customer_id='".$tpp['customer_id']."'";
							$Ecn=mysqli_query($conn,$cn);
							$FEcn=mysqli_fetch_array($Ecn);
							
							 $cn1="SELECT * FROM tbl_make WHERE id='".$tpp['make_brand']."'";
							$Ecn1=mysqli_query($conn,$cn1);
							$FEcn1=mysqli_fetch_array($Ecn1);
							
							$cn2="SELECT * FROM tbl_model WHERE id='".$tpp['model']."'";
							$Ecn2=mysqli_query($conn,$cn2);
							$FEcn2=mysqli_fetch_array($Ecn2);
							
							$cn3="SELECT * FROM tbl_segment WHERE id='".$tpp['segment_id']."'";
							$Ecn3=mysqli_query($conn,$cn3);
							$FEcn3=mysqli_fetch_array($Ecn3);
            		    $i++;
            		   ?>
					   <tbody>
                        <tr>                     					
						<td><?php echo $i; ?></td>
						<td><?php echo $FEcn['f_name']; ?></td>
						<td><?php echo $tpp['vehicle_no']; ?></td>
						<td><?php echo $FEcn1['make']; ?></td>
						<td><?php echo $FEcn2['model']; ?></td>
						<td><?php echo $FEcn3['segment']; ?></td>
						<td><?php echo $tpp['vehicle_type']; ?></td>
                        </tr>
					   </tbody>
						<?php } ?>					   
                      </table>
					  </div>
                      <div class="form-group col-lg-12">                     
                         <button  class="btn btn-primary" id="form2" name="form2" type="submit">Add To Service</button>
					  </div>
					  </form>
				</div>  
				</div>  
            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		