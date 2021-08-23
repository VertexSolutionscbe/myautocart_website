        <!--- Header Area --->
	      <?php include('header.php');

 	  ?>

 
	    <!--- Header Area End --->
		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
		  <?php
		   $tg="SELECT * FROM tbl_seo_tags WHERE webpage='new-cars.php'";
		   $Etg=mysqli_query($conn,$tg);
		   $FEtg=mysqli_fetch_array($Etg);
		  ?>
          <title><?php echo $FEtg['title_tag']; ?></title>      
          <meta name="description" content="<?php echo $FEtg['metta_content']; ?>">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
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
               url:'aj_newcars_price_filter.php',// put your real file name 
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
	    </head>
				
        <!--================Categories Banner Area =================-->
        <section class="selfdriv_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Self Drive in India</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">New Cars</a></li>
                        <li class="current"><a href="#">New Cars</a></li>
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
								
					<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

    <form  action="selfdrive_act.php" name="regForm" id="regForm" method="post" enctype="multipart/form-data">
  <h1><b>Book Your Ride</b></h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab" ><h3>Customer Details</h3>
    <p class="col-sm-12 col-md-5" ><input  placeholder="First name..." style="margin-top:10px"   name="fname"></p>
    <p class="col-sm-12 col-md-5"><input placeholder="Last name..." style="margin-top:10px"  name="lname"></p>
    <p class="col-sm-12 col-md-5"><input placeholder="Mobile No" style="margin-top:10px"  name="mobile"></p>
    <p class="col-sm-12 col-md-5" ><input placeholder="Address" style="margin-top:10px"  name="address"></p>
    <p class="col-sm-12 col-md-5" ><input placeholder="City" style="margin-top:10px"   name="city"></p>
    <p class="col-sm-12 col-md-5" ><input placeholder="State" style="margin-top:10px"  name="state"></p>
    <p class="col-sm-12 col-md-5" ><input placeholder="Pincode" style="margin-top:10px"   name="pincode"></p>
	
	
              			<style>
					             ::-webkit-file-upload-button {
                                 background: black;
                                 color: red;
                                 padding: 1em;
                                 }
                                </style>
                      <div class="col-sm-12 col-md-7">
                                  <label style="margin-top:20px"><b>Upload Your ID Proof</b></label>
                                  <input type="file"  name="photo" id="photo">								  
                                  <div>&nbsp;</div>
								  <div id="previews"></div>
								</div>
								</div>
            
  </div>
  <div class="tab">
		            <div>
                      <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"><b>From</b></label>
					  </div>
					  <div>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="from_date" id="from_date" value="<?php echo date('Y-m-d'); ?>" class="datepicker-acc-labels form-control">
                      </div>
                    </div>		
					
					<div>
                      <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"><b>To</b></label>
					  </div>
					  <div>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" name="to_date" id="to_date" value="<?php echo date('Y-m-d'); ?>" class="datepicker-acc-labels form-control">
                      </div>
                    </div>
  </div>
  
    <div class="tab">
		            <div>
                      <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"><b>City</b></label>
					  </div>
                   <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="pickup_city">
                          <option >Select Your City</option>
                          <option value="Coimbatore">Coimbatore</option>                          
                        </select>
                      </div>
		

		            <div>
                      <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"><b>Vehicle Type</b></label>
					  </div>
                     <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="vehicle_type" id="body_type">
						    <option value="">--- Select The Body Type ---</option>
							<?php
						      $i=0;
						      $statement = $pdo->prepare("SELECT * FROM tbl_segment  ORDER BY segment ASC");
						      $statement->execute();
						      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						      foreach ($result as $row) {
						    ?>						  
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['segment']; ?></option>                          
						  <?php } ?>
                        </select> 
                      </div>
		
  </div>


  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" style="margin-top:30px" name="regForm" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>

  </div>
  
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>


<script>


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
	
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
	 
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}



</script>
</form>
</body>
</html>

								
								
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
                                    </ul>
                                </aside> 

                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Vehicle Segment</h3>
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
                                                <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='2') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='3') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
                                              <?php if($FEtseg['id']=='4') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='5') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='6') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='7') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php } ?>
											  <?php if($FEtseg['id']=='8') { ?>
											    <li class="nav-item"><a class="nav-link" href="new-cars.php?sgid=<?php echo $FEtseg['id']; ?>&sgname=<?php echo $FEtseg['segment']; ?>"> <?php echo $FEtseg['segment']; ?></a></li>
											  <?php }
												 }
											  ?>											  											  
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

								<aside class="l_widgest l_p_categories_widget">
                                  <div class="l_w_title">
                                    <h3>Vehicle Types</h3>
                                  </div>
                                    <ul class="navbar-nav">                                        
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            All Vehicle
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<?php
									         $j=0;
									
									         $sg="SELECT * FROM `tbl_segment` ORDER BY id";
									         $Esg=mysqli_query($conn,$sg);
									         while($FEsg=mysqli_fetch_array($Esg)){
										 
										         $segment_id   = $FEsg['id'];
										         $segment_name = $FEsg['segment'];										 									
										 									 
									         $j++; 
									         ?>                                              												
												 <?php if($segment_id=='1'){ ?>
									                <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='2') { ?>
									                <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='3') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='4') { ?>
									               <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='5') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>	
									             <?php if($segment_id=='6') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='7') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
									             <?php } ?>
									             <?php if($segment_id=='8') { ?>
                                                   <li class="nav-item"><a class="nav-link" href="new-cars.php?sid=<?php echo $segment_id; ?>&sname=<?php echo $segment_name; ?>"><?php echo $segment_name; ?></a></li>
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
                                          $qfp="select * from  tbl_products where product_status='Active' order by product_id desc limit 3 ,13";
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
                                                        <a href="new-cars-product-details.php?pid=<?php echo $resultFProducts["product_id"]; ?>"><img src="<?php echo $resultFProducts["photo"]; ?>" width="100px" height="70px" alt=""></a>
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