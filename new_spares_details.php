        <!--- Header Area --->
<?php
//session_start();
include('header.php');
?>
<!--- Header Area End --->
		<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>New Spares Details | MyAutoCart</title>        
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
      <section class="car_spares_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>NEW CAR SPARES DETAILS</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">Car Spares</a></li>
                        <li class="current"><a href="#">Car Spares</a></li>
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
		  
			 
			 
			 $tv1="SELECT * FROM tbl_product_specifications WHERE product_id='".$_REQUEST['pid']."'";
			 $Etv1=mysqli_query($conn,$tv1);
		     $FEtv1=mysqli_fetch_array($Etv1);
			 
			  $pv1="SELECT * FROM tbl_spares WHERE photo='".trim($Fpd['photo'])."' ";
			 $Epv1=mysqli_query($conn,$pv1);
		     $FEpv1=mysqli_fetch_array($Epv1);
			 
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
                        </div>
                    </div>
				
                    <div class="col-lg-7" >
                        <div class="product_details_text">
                            <h3><?php echo $FEpv1['spare_name']; ?></h3>
                            
                            <h6>Available In <span>Stock</span></h6>
                            <h4>&#8377; <?php echo $FEpv1['spare_amount']; ?></h4>                                                   
                            	                
							<div class="product_table_details">              
							 <h4></h4>
							 <h4>Specifications : </h4>
							    
							<div class="table-responsive-md">
                               <style>
                                 table, th, td {
                                 border: 1px solid black;
                                 border-collapse: collapse;
                                }							 
                                 th, td {
                                 padding: 5px;
                                 text-align: left;
                                }
                              </style>				              
						       <table style="width:100%; font-family: Arial; font-size:12px;" class="table-bordered table-striped" > 
				                	<?php    
									if($FEtv1['spec_1']=='' OR $FEtv1['spec_1']=='null' ){ ?>
							         <tr></tr>
						              <?php }else{?>		    
								<tr> <td><b>1. </b><?php echo $FEtv1['spec_1']; ?></td></tr>
									  <?php }?>
									  <?php    
									if($FEtv1['spec_2']=='' OR $FEtv1['spec_2']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>2. </b><?php echo $FEtv1['spec_2']; ?></td></tr>
								      <?php }?>
									  <?php    
									if($FEtv1['spec_3']=='' OR $FEtv1['spec_3']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>3. </b><?php echo $FEtv1['spec_3']; ?></td></tr>
								       <?php }?>
									   <?php    
									if($FEtv1['spec_4']=='' OR $FEtv1['spec_4']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>4. </b><?php echo $FEtv1['spec_4']; ?></td></tr>
								       <?php }?>
									   <?php    
									if($FEtv1['spec_5']=='' OR $FEtv1['spec_5']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>5. </b><?php echo $FEtv1['spec_5']; ?></td></tr>
								      <?php }?>
									  <?php    
									if($FEtv1['spec_6']=='' OR $FEtv1['spec_7']=='null'){ ?>
							         <tr ></tr>
						              <?php }else{?>
							     <tr> <td><b>6. </b><?php echo $FEtv1['spec_6']; ?></td></tr>
								       <?php }?>
									   <?php    
									if($FEtv1['spec_7']=='' OR $FEtv1['spec_7']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>7. </b><?php echo $FEtv1['spec_7']; ?></td></tr>
								      <?php }?>
									  <?php    
									if($FEtv1['spec_8']=='' OR $FEtv1['spec_8']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>8. </b><?php echo $FEtv1['spec_8']; ?></td></tr>
								      <?php }?>
									  <?php    
									if($FEtv1['spec_9']=='' OR $FEtv1['spec_9']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>9. </b><?php echo $FEtv1['spec_9']; ?></td></tr>
								      <?php }?>
									  <?php    
									if($FEtv1['spec_10']=='' OR $FEtv1['spec_10']=='null'){ ?>
							         <tr></tr>
						              <?php }else{?>
							     <tr> <td><b>10. </b><?php echo $FEtv1['spec_10']; ?></td></tr>
								      <?php }?>
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
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
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
		                       	
            $qe="select * from  tbl_products where category_id='15' order by product_title LIMIT $start, $limit";
			$Eqe=mysqli_query($conn,$qe);
			$sizeProducts=mysqli_num_rows($Eqe);


            $result1 ="SELECT count(product_title) AS id FROM tbl_products Where category_id='15'";
	        $custCount =  mysqli_query($conn,$result1);
            $rowcount = mysqli_fetch_row($custCount);  
			
			$result2 ="SELECT * FROM tbl_products Where category_id='12'";
	        $custCount2 =  mysqli_query($conn,$result2);
            $rowcount2 = mysqli_fetch_array($custCount2);  
            //Listing All Products End
		 
		    $total = $rowcount[0];
	        $pages = ceil( $total / $limit );

	        $Previous = $page - 1;
	        $Next = $page + 1;                              
		 
		 $i1++;
        ?>
		<script>
				// function split() {
               // var str = "How are you doing today";
               // var res = str.split(" ");
			 // alert("testr"+res[0]);
				// document.getElementById("demo").innerHTML = typeof res;
				// }
				</script>
				<?php 
				//$i=0;
				 $sparename=$FEpv1['spare_name'];
				 // strlen($sparename)
				// for($i=0;$i < strlen($sparename);$i++){
						// echo	$res[$i];		
					// }
				?>
				<?php

         $str = $sparename;

        
        $arr2 = preg_split("~\s+~",$str);

 $arrlength = count($arr2);
//print_r(count($arr2));
for ($x = 0; $x < $arrlength; $x++) {
   $arr2[$x]."<br>";
   
   	            $spv="select * from tbl_products where  MATCH (product_title) AGAINST ('$arr2[$x]') AND category_id='12' ";
					  $Espv=mysqli_query($conn,$spv);
					 while($spv1=mysqli_fetch_array($Espv)){
						   $id=$spv1['product_title']."<br>";
						 // $arr2[$x]."<br>";
					 }
					 
}
// comma in the array 
//$List = implode(' ', $arr2); 
  
// Display the comma separated list 
//echo $List; 

?>
		<body onload="split()">
        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner" >
                    <h2 class="single_c_title">Other Products </h2>
                    <div class="row">
					  <?php 
					 
					  $spv="select * from tbl_products where  MATCH (product_title) AGAINST ('$id') AND category_id='12' ";
					  //$spv="select * from tbl_products where product_title like '%".$letters."%' AND category_id='12'";
					  $Espv=mysqli_query($conn,$spv);
					  while($resultProductsVendor=mysqli_fetch_array($Espv))
					  {
					  $qe1="select * from  tbl_products where product_id='".$resultProductsVendor['product_id']."'";
					  $Eqe1=mysqli_query($conn,$qe1);
					  $sizeProducts=mysqli_num_rows($Eqe1);
					  $resultProducts=mysqli_fetch_array($Eqe1);	
						$PId=$resultProducts["product_id"];
						if($PId!=$_REQUEST['pid']){
							
						
					  ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                  <a href="new_spares_details.php?pid=<?php echo $resultProducts["product_id"]; ?>"><img src="<?php echo $resultProducts["photo"]; ?>" style="height:220px;width:100%" alt=""></a>									
                                    <h5 class="new" hidden>Service</h5>									
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                      <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                      <li><a class="add_cart_btn" href="new_spares_details.php?pid=<?php echo $resultProducts["product_id"]; ?>">View</a></li>
                                      <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                 <h4><?php echo $resultProducts["product_title"]; ?></h4>
								 <h6><?php echo $resultProductsVendor["vendor_name"]; ?></h6>
                                 <h5>  &#8377; <?php echo $resultProductsVendor["product_amount"]; ?></h5>
                                </div>
                            </div>
                        </div>                                    
					  <?php 
					  }
					  } ?>                                                                    
                    </div>
					
					
         	                    <!-- Dynamic Pagination -->
							    <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <li class="page-item next"><a class="page-link" href="car_detailing_view.php?page=<?= $Previous; ?>&pid=<?php echo $_REQUEST['pid']; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
									<?php for($i = 1; $i<= $page; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="product-details.php?page=<?php echo $i; ?>&pid=<?php echo $_REQUEST['pid']; ?>">
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
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	