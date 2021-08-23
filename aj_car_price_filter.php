							    
							
<div class="row">
<?php
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
		  $i1=0;
		  
		  $cat=trim($_POST['category']);
		  $minv=trim($_POST['minval']);
		  $maxv=trim($_POST['maxval']);
		  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6;
		  $page = isset($_GET['page']) ? $_GET['page'] : 1;
		  $start = ($page - 1) * $limit;								  
		  $pl="SELECT tp.product_id as tppid,tp.photo,tp.product_title,tp.product_content,tp.mrp,tp.category_id,vp.* FROM tbl_products tp inner join tbl_vendor_products vp on tp.product_id=vp.product_id where tp.category_id='$cat' AND (vp.product_amount BETWEEN '$minv' AND '$maxv')";
		//  $pl="SELECT * FROM tbl_products Where category_id='14'  ORDER BY product_id ASC LIMIT $start, $limit";
		  $Epl=mysqli_query($conn,$pl);	
 $nr=mysqli_num_rows($Epl);		
			while($Fpl=mysqli_fetch_array($Epl))								     
			  {
				  $result1 ="SELECT count(product_id) AS id FROM tbl_products Where category_id='$cat' ";
				  $custCount =  mysqli_query($conn,$result1);
				  $rowcount = mysqli_fetch_row($custCount);
				  
				  $total = $rowcount[0];
				  $pages = ceil( $total / $limit );

				  $Previous = $page - 1;
				  $Next = $page + 1;
				  
				  $result1 = $Fpl['photo'];
				  $result2 = $Fpl['product_title'];	
				  $result3 = $Fpl['product_content'];
				  $result6 = $Fpl['mrp'];
				  $result4 = $Fpl['product_amount'];
				  $result5 = $Fpl['product_id'];
				  
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
						<h5><del>&#8377; <?php echo $result6; ?></del> &#8377; <?php echo $result4; ?></h5>
					</div>
				</div>
			</div>
		   <?php } ?> 							    								
		</div>
		

		<!-- Dynamic Pagination -->
		 <nav aria-label="Page navigation example" class="pagination_area">
		  <ul class="pagination">							  
			<?php for($i = 1; $i<= $pages; $i++) : ?>
			  <li class="page-item"><a class="page-link" href="new-cars.php?page=<?php echo $i; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><?php echo $i; ?></a></li>
			<?php endfor;  ?>									                                   
			  <li class="page-item next"><a class="page-link" href="new-cars.php?pages=<?php echo $Next; ?>&cid=<?php echo $_REQUEST['cid']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    								  
		  </ul>
		</nav>								
		<!-- Dynamic Pagination End -->