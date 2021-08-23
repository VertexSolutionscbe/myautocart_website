        <!--- Header Area --->

<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";

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
$desc="";
for($i=0;$i<$la;$i++)
{
	$ProductDetails="select * from tbl_products where product_id='".$scart["Product"][$i]."'";
	$EProductDetails=mysqli_query($conn,$ProductDetails);
	$FEProductDetails=mysqli_fetch_array($EProductDetails);
	$title=$FEProductDetails['product_title'];
	//Rate of the product from Vendor  productvendorid  vendor
	$pv="SELECT * FROM tbl_vendor_products WHERE id='".$scart["ProductVendorId"][$i]."'";
	$Epv=mysqli_query($conn,$pv);
	$FEpv=mysqli_fetch_array($Epv);
	$rate=$FEpv['product_amount'];
	//$rate=$FEProductDetails['product_amount'];
	$quantity=$scart["Quantity"][$i];
	$total=$quantity*$rate;
	$desc=$desc."".$quantity." Quantity Of ".$title." Worth Rs.".$total." , " ;
$CartTotal=$CartTotal+$total;
}


   
// $pname = $_REQUEST['pname']; 
// $email = $_REQUEST['email'];
// $amount = $_REQUEST['amount']; 
// $description = $_REQUEST['description'];	
//$product_list=$_REQUEST['product_list'];
//$service_list=$_REQUEST['service_list'];	
//http://www.phpexpertise.com/how-to-integrate-razorpay-payment-gateway-in-php/

$cst ="SELECT * FROM tbl_customer where customer_id=".$_SESSION['customer_id'];
$Ecst = mysqli_query($conn, $cst);
$FEcst = mysqli_fetch_array($Ecst);

$pname = $FEcst['f_name']; 
$email = $FEcst['email'];
$amount = $CartTotal; 
$description = $desc;

// $api_key="rzp_test_PKXhDprgWlL8RW";// Test 
$api_key="rzp_live_99w0lmDMieaVVY";//Live
$pay_post=$amount;
$pay=$pay_post*100;
$description=$description;
$name=$pname;
$email=$email;
?>
	    <!--- Header Area End --->
<script type="text/javascript">

</script>	 
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>checkout register</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="checkout.html">Checkout Register</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
		
        <section class="register_area p_100">		
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing_details">
                                <h2 class="reg_title">Billing Detail</h2>
                                <form class="billing_inner row" action="charge.php" method="POST">
                                    
                                    <div class="col-lg-4" hidden>
                                        <div class="form-group">
                                            <label for="name">Products <span>*</span></label>
										<input type="text" placeholder="Product" name="product" value="<?php echo $product_list; ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="col-lg-4" hidden>
                                        <div class="form-group">
                                            <label for="last">Services <span>*</span></label>
										<input type="text" placeholder="Service" name="service" value="<?php echo $service_list; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="address">Name <span>*</span></label>
                                            <input type="text" placeholder="Name*" name="name" value="<?php echo $pname; ?>" readonly>
											</div>
                                    </div>
                                   
									<div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="address">EMail <span>*</span></label>
                                             <input type="email" placeholder="Your Email*" name="email" value="<?php echo $email; ?>" readonly>
											</div>
                                    </div>
									<div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="address">Amount <span>*</span></label>
											<input type="text" placeholder="Amount*" name="amount" value="<?php echo $amount; ?>" readonly>
											</div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Description <span>*</span></label>
											<input type="text" placeholder="Description" name="sub" value="<?php echo $description; ?>" readonly size="127">
											</div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                        
                    </div>
					 <div class="row"><div class="col-lg-12">&nbsp</div></div>
					 <div class="row"><div class="col-lg-12"></div></div>
					 <div class="row"><div class="col-lg-12"></div></div>
                        
					 <div class="row">
                        <div class="col-lg-12">
						<div class="billing_details">
						 <form action="charge.php" method="POST">
                                         <script src="https://checkout.razorpay.com/v1/checkout.js"                                             
                                     data-key="<?php echo $api_key; ?>"
                                     data-amount="<?php echo $pay; ?>"
                                     data-buttontext="Confirm Payment"
                                     data-name="Vertex Solutions"
                                     data-description="<?php echo $description; ?>"
                                     data-image="http://www.vertexsolution.co.in/images/logo/logo.png"
                                     data-prefill.name="<?php echo $name; ?>"
                                     data-prefill.email="<?php echo $email; ?>"
                                     data-theme.color="#528FF0"></script>  
                                 <input type="hidden" value="Hidden Element" name="hidden">
						</form>
						</div>
						</div>
					 </div>
					
					
                </div>
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