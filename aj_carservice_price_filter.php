<?php 
Session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
$i1=0;
		  
		  $sgmt=trim($_POST['segmentid']);
		  $cat=trim($_POST['category']);
		  $minv=trim($_POST['minval']);
		  $maxv=trim($_POST['maxval']);
		  
		  $_SESSION['cat']=$cat;
		  $_SESSION['minv']=$minv;
		  $_SESSION['maxv']=$maxv;
?>							    
  <div class="showing_fillter">
    <div class="row m0">
     <div class="first_fillter">
        <h4>Showing Price Between <b><?php echo $_SESSION['minv']; ?></b> and <b><?php echo $_SESSION['maxv']; ?></b> </h4>
     </div>                                                                                                          
    </div>
  </div>							
      <div class="row">
        <?php		  
		  $i1=0;
		  
		  $limit =6;
	      $page = isset($_GET['page']) ? $_GET['page'] : 1;
	      $start = ($page - 1) * $limit;								  
	      
		  $pl="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id where category_id='$cat' OR vehicle_segment_id='$sgmt' AND (amount between '$minv' AND '$maxv') order by amount LIMIT $start, $limit";
	      // $pl="SELECT tp.product_id as tppid,tp.photo,tp.product_title,tp.product_content,tp.mrp,tp.category_id,vp.* FROM tbl_vendor_services tp inner join tbl_vendor_products vp on tp.product_id=vp.product_id where tp.category_id='$cat' AND (vp.product_amount BETWEEN '$minv' AND '$maxv')";
		  // $pl="SELECT * FROM tbl_products Where category_id='14'  ORDER BY product_id ASC LIMIT $start, $limit";
		  $Epl=mysqli_query($conn,$pl);	
          $nr=mysqli_num_rows($Epl);

            $result1 ="SELECT tvs.*,ts.* FROM tbl_vendor_services tvs left join tbl_services ts on tvs.service_id=ts.id where category_id='$cat' OR vehicle_segment_id='$sgmt' AND (amount between '$minv' AND '$maxv') order by amount";
	        $custCount = mysqli_query($conn,$result1);
            $rowcount = mysqli_fetch_row($custCount);

            $total =  mysqli_num_rows($custCount);

			//$total=$nr;
			//echo ( $total / $limit );
            $pagesa = ceil( $total / $limit );
            $Previous = $page - 1;
            $Next = $page + 1;
				  
			  while($Fpl=mysqli_fetch_array($Epl))								     
			    {
				 
				 $result12 ="SELECT * from tbl_services where id='".$Fpl['service_id']."'";
	             $custCount2 =  mysqli_query($conn,$result12);
                 $rowcount22 = mysqli_fetch_array($custCount2);
										  
			         $result121 ="SELECT * from tbl_segment where id='".$Fpl['vehicle_segment_id']."'";
	                 $custCount21 =  mysqli_query($conn,$result121);
                     $rowcount221 = mysqli_fetch_array($custCount21);										  				  
				  
				         $pht = $Fpl['photo'];
		                 $result1 = $Fpl['vendor_id'];
					     $result2 = $Fpl['category_id'];	
						 $result3 = $rowcount22['service_name'];
						 $result4 = $rowcount221['segment'];
						 $result5 = $Fpl['amount'];
						 $result6 = $Fpl['id'];
						 $result7 = $Fpl['service_id'];
										  
						 $i1++;
		    ?>   
			<div class="col-lg-4 col-sm-6">
				<div class="l_product_item">
					<div class="l_p_img">
						<a href="product-details.php?pid=<?php echo $result5; ?>"><img src="admin/dist/uploads/<?php echo $pht; ?>" alt="" style="height:180px"></a>
						<h5 class="new" hidden>New</h5>
					</div>
					<div class="l_p_text">
					    <ul>
						  <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
						  <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $result5; ?>">View</a></li>
						  <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
						</ul>
						<h4><?php echo $result3; ?></h5>
                        <h5><?php echo $result4; ?></h6>
                        <h6> &#8377; <?php echo $result5; ?></h6>
					</div>
				</div>
			</div>
		   <?php } ?> 							    								
		</div>
		

		                    <!-- Dynamic Pagination -->
								<nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">								  
				                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                                      <li class="page-item"><a class="page-link" href="car-services.php?page=<?php echo $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>">
									  <?php 
									  if($_REQUEST['page']==$i)
									  {
									  ?>
									  <span style="color:red">
									  <?php echo $i; ?>
									  </span>
									  <?php } 
									  else
									  {
										  echo $i;
									  }
									  ?>
									  
									  </a></li>
									<?php endfor;  ?>									                                   
                                      <li class="page-item next"><a class="page-link" href="car-services.php?pages=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>&sgid=<?php echo $_REQUEST['sgid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
								  </ul>
                                </nav>								
								<!-- Dynamic Pagination End -->	