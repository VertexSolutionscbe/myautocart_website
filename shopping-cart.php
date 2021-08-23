        <!--- Header Area --->

<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
		  ?>
		  
		  
		  
		  
		  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='insurance.php'";
		 $Etg=mysqli_query($conn,$tg);
		 $FEtg=mysqli_fetch_array($Etg); 
		?>
		<title><?php echo $FEtg['title_tag']; ?></title>      
        <meta name="description" content="<?php echo $FEtg['metta_content']; ?>">   
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
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	    <!--- Header Area End --->
       <script type="text/javascript">
function RemoveCart(ind){ 
     var indexid = ind;     
	 var taskname="RemoveCart";
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {index: indexid,task:taskname},
        success:function(msg){
        //    your message will come here.  
        //document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart !";
        //alert("Item Deleted .Please Refresh Page!");
		location.reload();
       }
 });

}
function UpdateCart(ind,pid,qty,vid1,pvid1){ 
      var indexid = ind;     
	  var taskname="UpdateCart";
	  var productid = pid;
	  var vendorid=vid1;
	  var quantity=document.getElementById("scqty"+qty).value;
	  var pvid=pvid1;
 
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
		data: {index: indexid,product: productid,quantity: quantity,task:taskname,vendor:vendorid,productvendorid:pvid},
        success:function(msg){
        //    your message will come here.  
        //document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart !";
       
		location.reload();
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
function ClearFunction() {
  // location.replace("register.php")
  //location.replace("clear.php");
  
  var x = confirm("This will Delete All Items In your Cart?");
  if (x)
	  location.replace("clear.php");
      //return true;
  else
    return false;
}
</script>	 
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>shopping cart</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="shopping-cart.html">Shopping cart</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
			<?php 
			if(!isset($_REQUEST['m']))
			{
			?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_product_list">
                            <h3 class="cart_single_title">Cart List </h3> 
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">product</th>
                                            <th scope="col">price</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

								<?php 
								
if(!isset($_SESSION['cart']))
{
$la=0;	
}
else
{
	$scart=$_SESSION['cart'];
$la=count($scart['Product']);
}
$CartTotal=0;
for($i=0;$i<$la;$i++)
{
	$ProductDetails="select * from tbl_products where product_id='".$scart["Product"][$i]."'";
	$EProductDetails=mysqli_query($conn,$ProductDetails);
	$FEProductDetails=mysqli_fetch_array($EProductDetails);
	$title=$FEProductDetails['product_title'];
	
	//Rate of the product from Vendor  productvendorid  vendor
	 $pv="SELECT * FROM tbl_vendor_products WHERE product_id='".$scart["Product"][$i]."' AND vendor_id='".$scart["Vendor"][$i]."'";
	$Epv=mysqli_query($conn,$pv);
	$FEpv=mysqli_fetch_array($Epv);
	$rate=$FEpv['product_amount'];
	//pid=59&vid=17&pvid=19
	
	//echo "pid=".$FEpv["product_id"]."&vid=".$FEpv["vendor_id"]."&pvid=".$FEpv["id"];
	//Vendor Name
	$svn="select vendor_name from tbl_vendor where vendor_id='".$scart["Vendor"][$i]."'";
	$Esvn=mysqli_query($conn,$svn);
	$FEsvn=mysqli_fetch_array($Esvn);
		
	$quantity=$scart["Quantity"][$i];
	$total=$quantity*$rate;
	$photo=$FEProductDetails['photo'];
									?>
                                        <tr>
                                            <th scope="row">
                                                <img src="img/icon/close-icon.png" alt="" onclick="RemoveCart(<?php echo $i; ?>)">
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="<?php echo $photo; ?>" alt="" style="width:110px">
                                                    </div>
                                                    <div class="media-body">
													<a href="product-details-vendor.php?pid=<?php echo $FEpv["product_id"]; ?>&vid=<?php echo $FEpv["vendor_id"]; ?>&pvid=<?php echo $FEpv["id"]; ?>">
													    <h4><?php echo $title; ?></h4>
														<h6><?php echo $FEsvn['vendor_name'];?></h6>
													</a>	
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p><?php echo $rate; ?></p></td>
                                            <td><input id="<?php echo "scqty".$i; ?>" name="<?php echo "scqty".$i; ?>" type="text" placeholder="01" value="<?php echo $quantity; ?>" onblur="javascript:UpdateCart(<?php echo $i;?>,<?php echo $scart["Product"][$i]; ?>,<?php echo $i; ?>,<?php echo $scart["Vendor"][$i]; ?>,<?php echo $scart["ProductVendorId"][$i]; ?>)"></td>
                                            <td><p><?php echo $total; ?></p></td>
                                        </tr>
<?php 
$CartTotal=$CartTotal+$total;
} 
if($la==0)
{
?>
<tr>
<td colspan="5" ><div id="addmsg" style="color: red">Your Cart is Empty !</div></td>
</tr>
<?php } ?>									
									
									</tbody>
                                </table>
                            </div>
                        </div>
                        <div class="calculate_shoping_area " hidden>
                            <h3 class="cart_single_title">Calculate Shoping <span><i class="icon_minus-06"></i></span></h3>
                            <div class="calculate_shop_inner">
                                <form class="calculate_shoping_form row" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="form-group col-lg-12">
                                        <select class="selectpicker">
                                            <option>United State America (USA)</option>
                                            <option>United State America (USA)</option>
                                            <option>United State America (USA)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State / Country">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode / Zip">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button type="submit" value="submit" class="btn submit_btn form-control">update totals</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="total_amount_area">
                            
                            <div class="cart_totals">
                                <h3 style="font-size:20px;color:Black" class="cart_single_title" >Cart Summary<i class="fa fa-car" style="font-size:30px;color:Black"></i></h3>
                                <div class="cart_total_inner">
                                    <ul>
                                        <li><a href="#"><span>Cart Subtotal</span> <?php echo  number_format($CartTotal,2); ?></a></li>
                                        <li><a href="#"><span>Shipping</span> Free</a></li>
                                        <li><a href="#"><span>Total</span> <?php echo  number_format($CartTotal,2); ?></a></li>
                                    </ul>
                                </div>
								<?php 
								if($la>0)
								{
								?>
                                <button type="submit" class="btn btn-primary checkout_btn">update</button>
								<button type="submit" class="btn btn-primary update_btn" onclick="ClearFunction();">Clear</button>
                                <button type="submit" class="btn btn-primary checkout_btn" onclick="myFunction();">checkout</button>
								<?php } ?>
                            </div>
							<div class="cupon_box" hidden>
                                <h3 class="cart_single_title">Discount Cupon</h3>
                                <div class="cupon_box_inner">
                                    <input type="text" placeholder="Enter your code here">
                                    <button type="submit" class="btn btn-primary subs_btn">apply cupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php } ?>
				<?php 
			if(isset($_REQUEST['m']))
			{
			?>
				<div class="row">
				<div class="col-lg-8">
                        <div class="cart_product_list">
                            <h3 class="cart_single_title">Cart List</h3>
                            <div class="table-responsive-md">
							<table class="table">
							<tbody>
							
                            <tr>
							<td colspan="5" ><div id="addmsg" style="color: red">
							<?php
							if($_REQUEST['m']==1)
							{
								echo " Your Order Placed Successfully !. Please Check your mail";
							}
							if($_REQUEST['m']==2)
							{
								echo " Your Order Failed Please Try Again or Call our Customer Support!";
							}
							?>							
							</div></td>
							</tr>
							</tbody>
							</table>
                            </div>
                        </div>
                        
                    </div>
				</div>
			<?php } ?>
            </div>
        </section>
        <!--================End Shopping Cart Area =================-->
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		<style>
.thumb-img-shopcart {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 110px; /* Set a small width */
}


</style>