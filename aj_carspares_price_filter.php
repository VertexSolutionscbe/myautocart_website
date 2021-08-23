<?php 
Session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
$i1=0;
		  
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
		  $limit = 6;
		  $page = isset($_GET['page']) ? $_GET['page'] : 1;
		  $start = ($page - 1) * $limit;								  
	       
		   $pl="SELECT * FROM tbl_products where category_id='$cat' AND (product_amount between '$minv' AND '$maxv') order by product_amount LIMIT $start, $limit";	
		   $Epl=mysqli_query($conn,$pl);	
           $nr=mysqli_num_rows($Epl);

            $result1 ="SELECT * FROM tbl_products where category_id='$cat' AND (product_amount between '$minv' AND '$maxv') order by product_amount";
	        $custCount = mysqli_query($conn,$result1);
            $rowcount = mysqli_fetch_row($custCount);

            $total =  mysqli_num_rows($custCount);
										  				  
            $pagesa = ceil( $total / $limit );

            $Previous = $page - 1;
            $Next = $page + 1;
				  
			while($Fpl=mysqli_fetch_array($Epl))								     
			  {														  
				 $result121 ="SELECT * from tbl_segment where id='".$Fpl['vehicle_segment_id']."'";
	             $custCount21 =  mysqli_query($conn,$result121);
                 $rowcount221 = mysqli_fetch_array($custCount21);										 				  
				  
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
                   <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                 </ul>
                  <h4><?php echo $result2; ?></h4>
		          <h5><?php echo $segment; ?></h5>
                  <h5><del>&#8377; <?php echo $result6; ?></del> &#8377; <?php echo $result4; ?></h5>
                </div>
              </div>
            </div>
		   <?php } ?> 							    								
		</div>
		

		<!-- Dynamic Pagination -->
		 <nav aria-label="Page navigation example" class="pagination_area">
		  <ul class="pagination">							  
			<?php for($i = 1; $i<= $pagesa; $i++) : ?>
			  <li class="page-item"><a class="page-link" href="car-services.php?page=<?php echo $i; ?>&cid=<?php echo $cat; ?>"><?php echo $i; ?></a></li>
			<?php endfor;  ?>									                                   
			  <li class="page-item next"><a class="page-link" href="car-services.php?pagesa=<?php echo $Next; ?>&cid=<?php echo $cat; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
		  </ul>
		</nav>								
		<!-- Dynamic Pagination End -->