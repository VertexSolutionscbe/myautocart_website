        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->
				
        <!--================Categories Banner Area =================-->
        <section class="categories_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>shop grid with left sidebar</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="#">Shop Grid with Right Sidebar</a></li>
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
                            <div class="showing_fillter">
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
							<div class="categories_product_area">
							    <?php 
								// Products Start -->
								$i1=0;
								  
								  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 6;
	                              $page = isset($_GET['page']) ? $_GET['page'] : 1;
	                              $start = ($page - 1) * $limit;								  
								  
								  $pl="SELECT * FROM tbl_products Where category_id ORDER BY product_id ASC LIMIT $start, $limit";
								  $Epl=mysqli_query($conn,$pl);								  									   									 									  							    
								
								  $result1 ="SELECT count(product_id) AS id FROM tbl_products";
	                              $custCount =  mysqli_query($conn,$result1);
                                  $rowcount = mysqli_fetch_row($custCount); 
	                              $total = $rowcount[0];
	                              $pages = ceil( $total / $limit );

	                              $Previous = $page - 1;
	                              $Next = $page + 1; 																
								?>								
                                <div class="row">
								  <?php
								    while($Fpl=mysqli_fetch_array($Epl))
								     {
										  $result1 = $Fpl['photo'];
									      $result2 = $Fpl['product_title'];	
									      $result3 = $Fpl['product_content'];
									      $result4 = $Fpl['product_amount'];
									      $result5 = $Fpl['product_id'];
										  
								     $i1++;
								   ?>   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="product-details.php?pid=<?php echo $result5; ?>"><img src="admin/dist/uploads/<?php echo $result1; ?>" alt="" style="height:220px"></a>
                                                <h5 class="new" hidden>New</h5>
                                            </div>
                                            <div class="l_p_text">
                                               <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                    <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $result5; ?>">View</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                </ul>
                                                <h4><?php echo $result2; ?></h4>
                                                <h5><del>&#8377; <?php echo $result4; ?></del> &#8377; <?php echo $result4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
								   <?php } ?> 							    								
                                </div>
								
			
								<!-- Dynamic Pagination -->
								 <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">
								  
				                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                                    <li class="page-item"><a class="page-link" href="product-list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php endfor;  ?>
									                                   
                                    <li class="page-item next"><a class="page-link" href="product-list.php?page=<?php echo $Next; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>                                    
								  
								  </ul>
                                </nav>								
								<!-- Dynamic Pagination End -->	
								
								
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
                                                <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Used Cars') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Insurance') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Service Franchisee') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Services') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Spares') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Wash Equipments') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Extras') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php if($fctgry['category_name']=='Car Detailing') { ?>
											    <li class="nav-item"><a class="nav-link" href="product-list.php?cid=<?php echo $fctgry['category_id']; ?>&cname=<?php echo $fctgry['category_name']; ?>"> <?php echo $fctgry['category_name']; ?></a></li>
											  <?php } ?>
											  <?php } ?>
                                            </ul>
                                        </li>
										<li class="nav-item" hidden>
                                            <a class="nav-link" href="#">Men’s Fashion
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li> 									
                                    </ul>
                                </aside>                                
	                           					
                                <fieldset class="filter-price">
								    <div class="l_w_title">
                                        <h3>Filter section</h3>
                                    </div>
                                    <div class="price-field">
                                       <input type="range"  min="0" max="5000000" value="0" id="lower">
                                       <input type="range" min="0" max="5000000" value="5000000" id="upper">
                                    </div>
                                    <div class="price-wrap">
                                     <span class="price-title">Price :</span>
                                       <div class="price-wrap-1">                                                                               
                                         <input id="one">
									   </div>
                                     <div class="price-wrap_line">-</div>
                                      <div class="price-wrap-2">                                                                              
										 <input id="two">
                                      </div>
                                    </div>                                
                                </fieldset> 
                              
                                <aside class="l_widgest l_color_widget">
                                    <div class="l_w_title">
                                        <h3>Color</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_menufacture_widget">
                                    <div class="l_w_title">
                                        <h3>Manufacturer</h3>
                                    </div>
                                    <ul> 
									    <li><a hraf="#">Renault</a></li>
									    <li><a href="#">Maruthi Suzuki</a></li>
									    <li><a href="#">Mahindra</a></li>
									    <li><a href="#">MG</a></li>
                                        <li><a href="#">Hyundai</a></li>
                                        <li><a href="#">Chevrolet</a></li>
                                        <li><a href="#">Volkswagen</a></li>
                                        <li><a href="#">Ford</a></li>
                                        <li><a href="#">Honda</a></li>
										<li><a href="#">Kia</a></li>
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                                        <h3>Featured Products</h3>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                           <img src="img/products/new-cars/c-duster-001.jpg" alt="" style="width:100px">
                                        </div>
                                        <div class="media-body">
                                            <h4>Jeans with <br /> Frayed Hems</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                           <img src="img/products/new-cars/c-kwid-001.jpg" alt="" style="width:100px">
                                        </div>
                                        <div class="media-body">
                                            <h4>Crysp Denim<br />Montana</h4>
                                            <h5>$45.05</h5>
                                        </div>
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
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      