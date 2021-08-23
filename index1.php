        <!--- Header Area --->
<?php
include('header.php'); 
//For Categories
$urlData="common/categories";
$url=$apiurl.$urlData;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
]);
$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
$resultCategory = $arr['resultset'];
$sizeCategory=sizeof($resultCategory);


//For Banner
$urlData="common/banners";
$url=$apiurl.$urlData;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
]);
$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
$resultBanners = $arr['resultset'];
$sizeBanners=sizeof($resultBanners);
?>
	    <!--- Header Area End --->
            
            <!--================Main Content Area =================-->
            <section class="home_sidebar_area">
                <div class="container">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
                            <div class="sidebar_main_content_area">
                                <div class="advanced_search_area">
								
                                    <select class="selectpicker">
                                        <option>All Categories</option>
										<?php 
										for($i=0;$i<$sizeCategory;$i++)
										{
										?>
                                        <option value="<?php echo $resultCategory[$i]["Id"]; ?>"><?php echo $resultCategory[$i]["CategoryName"]; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button"><i class="icon-magnifier icons"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="main_slider_area">
                                    <div id="home_box_slider" class="rev_slider" data-version="5.3.1.6">
                                        <ul>
										
											<?php 
											for($i=0;$i<$sizeBanners;$i++)
											{

											?>
                                            <li data-index="<?php echo "rs-158".$i; ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?php echo $imageurl."banners/".$resultBanners[$i]["Image"]; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    ><?php echo $resultBanners[$i]["Title"]; ?></div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        ><?php echo $resultBanners[$i]["SubTitle"]; ?>
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="#">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
											<?php } ?>
											
											
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="promotion_area">
                                    <div class="feature_inner row m0">
                                        <div class="left_promotion">
                                            <div class="f_add_item">
                                                <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-6.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="sale">Sale</div>
                                                    <h4>Unbelievable <br />offers</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right_promotion">
                                            <div class="f_add_item right_dir">
                                                <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-7.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="off">10% off</div>
                                                    <h4>New Year <br />offer</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fillter_home_sidebar">
                                    <ul class="portfolio_filter">
                                        <li class="active"><a href="#">New</a></li>
                                                                              
                                    </ul>
<?php
//Listing All Products Start
$urlData="common/products";
$url=$apiurl.$urlData;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
]);
$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
$resultProducts = $arr['resultset'];
$sizeProducts=sizeof($resultProducts);	

$lm=0;
if($sizeProducts>14)
{
	$lm=15;
}
else
{
	$lm=$sizeProducts;
}
	
//Listing All Products End
?>
                                     <div class="categories_product_area">
                                <div class="row">
										<?php 										
										for($i=0;$i<$lm;$i++)
										{
										?>
										 <div class="col-lg-4 col-sm-6">
                                         <div class="l_product_item">
                                                <div class="l_p_img">
                                                    <img src="<?php echo $imageurl.$resultProducts[$i]["Photo"]; ?>" style="height:220px" alt="">
													<?php 
												if($resultProducts[$i]["ProductSales"]==0)
												{
												?>
                                                    <h5 class="new">Service</h5>
												<?php } ?>
                                                </div>
                                                <div class="l_p_text">
                                                    <ul>
                                                        <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                        <li><a class="add_cart_btn" href="product-details.php?id=<?php echo $resultProducts[$i]["Id"]; ?>">View</a></li>
                                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                    </ul>
                                                    <h4><?php echo $resultProducts[$i]["CarTitle"]; ?></h4>
                                                    <h5>&#8377; <?php echo $resultProducts[$i]["ProductAmount"]; ?></h5>
                                                </div>
                                            </div>
											</div>
										<?php } ?>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
<?php 
//Listing All Products For Equipement Category Start
$id=14;
$urlData="common/category/".$id."/products";
$url=$apiurl.$urlData;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
]);
$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
$resultEquipements = $arr['resultset'];
$sizeEquipements=sizeof($resultEquipements);

$lm=0;
if($sizeEquipements>2)
{
	$lm=3;
}
else
{
	$lm=$sizeEquipements;
}
		
//Listing All Products For Equipement Category End
?>
                                <div class="home_sidebar_blog">
                                    <h3 class="single_title">EQUIPMENTS</h3>
                                    <div class="row">
									<?php 
									for($i=0;$i<$lm;$i++)
									{
									?>
									
                                        <div class="col-lg-4 col-sm-6">
										<a href="product-details.php?id=<?php echo $resultEquipements[$i]["Id"]; ?>">
                                            <div class="from_blog_item">
											    
                                                <img class="img-fluid" src="<?php echo $imageurl.$resultEquipements[$i]["Photo"]; ?>" alt="">
												
                                                <div class="f_blog_text">
                                                    <h5><?php echo $resultEquipements[$i]["CarTitle"]; ?></h5>
                                                    <p><?php echo substr($resultEquipements[$i]["CarContent"],0,100); ?></p>
                                                    <h6> &#8377; <?php echo $resultEquipements[$i]["ProductAmount"]; ?></h6>
                                                </div>
                                            </div>
											</a>
                                        </div>  
									
									<?php } ?>										
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="left_sidebar_area">
                                <aside class="l_widget l_categories_widget">
                                    <div class="l_title">
                                        <h3>categories</h3>
                                    </div>

                                    <ul>
									    <?php 
										for($i=0;$i<$sizeCategory;$i++)
										{
										?>
										<li><a href="product-list-category.php?id=<?php echo $resultCategory[$i]["Id"]; ?>"><?php echo $resultCategory[$i]["CategoryName"]; ?></a></li>
										<?php } ?>
                                        
                                    </ul>
                                </aside>
                                <aside class="l_widget l_supper_widget">
                                    <img class="img-fluid" src="img/supper-add-1.jpg" alt="">
                                    <h4>Super Summer Collection</h4>
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

$urlData="common/featureproducts";
$url=$apiurl.$urlData;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
]);
$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
$resultFProducts = $arr['resultset'];
$sizeFProducts=sizeof($resultFProducts);	

//Listing Feature  Products End
?>
                                        <ul class="verticalCarouselGroup vc_list">
										                        <?php 
								for($i=0;$i<$sizeFProducts;$i++)
								{
								?>
                                            <li>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="<?php echo $imageurl.$resultFProducts[$i]["Photo"]; ?>" width="100px" height="50px" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $resultFProducts[$i]["CarTitle"]; ?></h4>
                                                        <h5> &#8377; <?php echo $resultFProducts[$i]["ProductAmount"]; ?></h5>
                                                    </div>
                                                </div>
                                            </li>
								<?php } ?>
                                            
                                                                                       
                                            
                                        </ul>
                                    </div>
                                </aside>
                                <aside class="l_widget l_news_widget" hidden>
                                    <h3>newsletter</h3>
                                    <p>Sign up for our Newsletter !</p>
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="yourmail@domain.com" aria-label="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary subs_btn" type="button">Subscribe</button>
                                        </span>
                                    </div>
                                </aside>
                                <aside class="l_widget l_hot_widget" hidden>
                                    <h3>Summer Hot Sale</h3>
                                    <p>Premium 700 Product , Titles and Content Ideas</p>
                                    <a class="discover_btn" href="#">shop now</a>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Main Content Area =================-->
            
            <!--================World Wide Service Area =================-->
            <section class="world_service">
                <div class="container">
                    <div class="world_service_inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-1.png" alt="">Worldwide Service</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-2.png" alt="">247 Help Centre</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-3.png" alt="">Safe Payment</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-4.png" alt="">Quick Delivery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End World Wide Service Area =================-->

        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->		 