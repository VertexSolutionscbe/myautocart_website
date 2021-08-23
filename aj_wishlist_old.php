<div class="row" name="disprow" id="disprow">
<?php
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
	
  $product_id=trim($_POST['pid']);
  $customer_id=trim($_POST['cid']);
  $cid=trim($_POST['category']);
		
$tp="SELECT * FROM `tbl_products` WHERE product_id='".$product_id."'";
$Etp=mysqli_query($conn,$tp);
$FEtp=mysqli_fetch_array($Etp);

$tv="SELECT * FROM `tbl_vendor_products` WHERE product_id=".$FEtp['product_id']."";
$Etv=mysqli_query($conn,$tv);
$FEtv=mysqli_fetch_array($Etv);

$tc="SELECT * FROM `tbl_category` WHERE category_id=".$FEtp['category_id']."";
$Etc=mysqli_query($conn,$tc);
$FEtc=mysqli_fetch_array($Etc);
 
$query="INSERT INTO tbl_wishlist SET category_id='$cid', product_id='$product_id', vendor_id=".$FEtp['vendor_id'].", vendor_product_id=".$FEtv['id'].", customer_id='".$customer_id."',status='Active'";
$Equery=mysqli_query($conn,$query);
$nid=mysqli_insert_id($Equery);


								 // Products Start -->
								  $i1=0;
								  
								  $pl="SELECT * FROM tbl_products Where category_id='$cid' ORDER BY product_id ASC";
								  $Epl=mysqli_query($conn,$pl);								  
								  while($Fpl=mysqli_fetch_array($Epl))
								       {
										  $sg1="SELECT * FROM `tbl_segment` WHERE id='".$Fpl['body_type']."'";
									      $Esg1=mysqli_query($conn,$sg1);
									      $FEsg1=mysqli_fetch_array($Esg1);
										 										  										 
										  $result1 = $Fpl['photo'];
									      $result2 = $Fpl['product_title'];	
									      $result3 = $Fpl['product_content'];
									      $result6 = $Fpl['mrp'];
									      $result4 = $Fpl['product_amount'];
									      $result5 = $Fpl['product_id'];
										  $segment = $FEsg1['segment'];
										  
								     $i1++;																
								   ?>	
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="admin/dist/uploads/<?php echo $result1; ?>" alt="" style="height:180px"></a>
                                                <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $result5; ?>">View</a></li>
                                                   <!-- <li class="p_icon"><a href="used_car_wish_list_add.php?pid=<?php // echo $result5; ?>&&custid=<?php // echo $_SESSION['customer_id']; ?>"><i class="icon_heart_alt"></i></a></li> -->

                                                    <li>
													 <?php 
													 $wl="SELECT * FROM `tbl_wishlist` WHERE status='Active'";
													 $Ewl=mysqli_query($conn,$wl);
													 $FEwl=mysqli_fetch_array($Ewl);
													   $prodid=$FEwl['product_id'];													 
													 ?>													
                                                     <a class="button one mobile button--secondary deactivate inactive" onClick="WishList(<?php echo $result5; ?>,<?php echo $_SESSION['customer_id']; ?>,<?php echo $cid; ?>)">                                                  													  
													 <?php if($prodid > 1) { ?>	 
													  <div class="btn__effect">													 
                                                        <svg class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>                                                    													 
														<svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
													 <?php } ?> 
														<svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#0090E3">
                                                         <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"></path>
                                                         <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"></path></g>
                                                         <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"></path></svg>                                                     
														<div class="effect-group">
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                         <span class="effect"></span>
                                                        </div>													  	
                                                      </div>                                                     
													 </a>													
                                                    </li>
													
												</ul>
                                                <h4><?php echo $result2; ?></h4>
												<h5><?php echo $segment; ?></h5>
                                                <h5><del>&#8377; <?php echo $result6; ?></del> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>							       		
							    </div> 								
								