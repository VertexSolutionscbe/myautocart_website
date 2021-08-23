<!--- Header Area --->
<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
$_SESSION['PaymentMethod']="COD";
$_SESSION['BillingAddressId']=1;
$_SESSION['DeliveryAddressId']=1;
?>
<!--- Header Area End --->
<script type="text/javascript">
function CopyBilling()
{
	var billingtoo =document.getElementById("f-option");
	if(billingtoo.checked == true)
	{
	document.getElementById("ShippingFirstName").value=document.getElementById("BillingFirstName").value;
	document.getElementById("ShippingLastName").value=document.getElementById("BillingLastName").value;
	document.getElementById("ShippingAddress1").value=document.getElementById("BillingAddress1").value;
	document.getElementById("ShippingAddress2").value=document.getElementById("BillingAddress2").value;
	document.getElementById("ShippingState").value=document.getElementById("BillingState").value;
	document.getElementById("ShippingPinCode").value=document.getElementById("BillingPinCode").value;
	document.getElementById("ShippingEmail").value=document.getElementById("BillingEmail").value;
	document.getElementById("ShippingPhone").value=document.getElementById("BillingPhone").value;
	}
	else
	{
	document.getElementById("ShippingFirstName").value='';
	document.getElementById("ShippingLastName").value='';
	document.getElementById("ShippingAddress1").value='';
	document.getElementById("ShippingAddress2").value='';
	document.getElementById("ShippingState").value='';
	document.getElementById("ShippingPinCode").value='';
	document.getElementById("ShippingEmail").value='';
	document.getElementById("ShippingPhone").value='';
	}
}
function myRedirect() {
  location.replace("check-method.php")
}

function AddPaymentCOD(){      
	 var taskname="PaymentMethod";
	 var paymenttype="COD";	 
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {task:taskname,paymenttype:paymenttype},
        success:function(msg){        
       }
 });
}

function AddPaymentOL(){      
	 var taskname="PaymentMethod";
	 var paymenttype="OP";	 
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {task:taskname,paymenttype:paymenttype},
        success:function(msg){        
       }
 });
}	
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

<?php 
$cst ="SELECT * FROM tbl_customer where customer_id=".$_SESSION['customer_id'];
$Ecst = mysqli_query($conn, $cst);
$FEcst = mysqli_fetch_array($Ecst);

if($FEcst['MobileVerified']==0)
{
	$cid=$_SESSION['customer_id'];
	header('location:account_details_edit.php?cid='.$cid);	
}

?>
		       
        <!--================Shopping Cart Area =================-->
		
        <section class="register_area p_100">
		
<!-- Success Msg -->		
<div class="container">
  <?php if (isset($_SESSION['success'])) :  ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
  </div>
  <?php endif; ?>
  <?php if($error_message): ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="signin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo $error_message; ?>
  </div>
</div> 
<?php endif; ?>
<!-- Success Msg End -->	
		
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing_details">
                                <h2 class="reg_title">Billing Detail</h2>
                                <form class="billing_inner row">
                                    <div class="col-lg-12">
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">First Name <span>*</span></label>
                                            <input type="text" id="BillingFirstName" name="BillingFirstName" value="<?php echo $FEcst['f_name']; ?>" class="form-control" aria-describedby="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last">Last Name <span>*</span></label>
                                            <input type="text" id="BillingLastName" name="BillingLastName" value="<?php echo $FEcst['l_name']; ?>" class="form-control"  aria-describedby="last" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Address <span>*</span></label>
                                            <input type="text" id="BillingAddress1" name="BillingAddress1" value="<?php echo $FEcst['address']; ?>" class="form-control" aria-describedby="address" required>
                                            <input type="text" id="BillingAddress2" name="BillingAddress2" class="form-control"  aria-describedby="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cun">State <span>*</span></label>
                                            <select class="selectpicker" id="BillingState" name="BillingState">
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
												<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Chandigarh">Chandigarh</option>
												<option value="Chhattisgarh">Chhattisgarh</option>
												<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
												<option value="Daman and Diu">Daman and Diu</option>
												<option value="Delhi">Delhi</option>
												<option value="Lakshadweep">Lakshadweep</option>
												<option value="Puducherry">Puducherry</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Himachal Pradesh">Himachal Pradesh</option>
												<option value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerala</option>
												<option value="Madhya Pradesh">Madhya Pradesh</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Meghalaya">Meghalaya</option>
												<option value="Mizoram">Mizoram</option>
												<option value="Nagaland">Nagaland</option>
												<option value="Odisha">Odisha</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Sikkim">Sikkim</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Telangana">Telangana</option>
												<option value="Tripura">Tripura</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="Uttarakhand">Uttarakhand</option>
												<option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last2">Pincode <span>*</span></label>
                                            <input type="text" id="BillingPinCode" name="BillingPinCode" value="" class="form-control"  aria-describedby="last2" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email <span>*</span></label>
                                            <input type="email" class="form-control" id="BillingEmail" name="BillingEmail" value="<?php echo $FEcst['email']; ?>" aria-describedby="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Phone <span>*</span></label>
                                            <input type="text" class="form-control" id="BillingPhone" name="BillingPhone" value="<?php echo $FEcst['mobile'];?>" aria-describedby="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="creat_account">
                                                <input type="checkbox" id="f-option" name="f-option" onclick="javascript:CopyBilling();">
                                                <label for="f-option">Ship & Billing address same?</label>
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name2">First Name <span>*</span></label>
                                            <input type="text" class="form-control" id="ShippingFirstName" name="ShippingFirstName" aria-describedby="name2" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last2">Last Name <span>*</span></label>
                                            <input type="text" class="form-control" id="ShippingLastName" name="ShippingLastName" aria-describedby="last2" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Address <span>*</span></label>
                                            <input type="text" class="form-control" id="ShippingAddress1" name="ShippingAddress1" aria-describedby="address" required>
                                            <input type="text" class="form-control" id="ShippingAddress2" name="ShippingAddress2" aria-describedby="address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cun">State <span>*</span></label>
                                            <select class="selectpicker" id="ShippingState" name="ShippingState">
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
												<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Chandigarh">Chandigarh</option>
												<option value="Chhattisgarh">Chhattisgarh</option>
												<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
												<option value="Daman and Diu">Daman and Diu</option>
												<option value="Delhi">Delhi</option>
												<option value="Lakshadweep">Lakshadweep</option>
												<option value="Puducherry">Puducherry</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Himachal Pradesh">Himachal Pradesh</option>
												<option value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerala</option>
												<option value="Madhya Pradesh">Madhya Pradesh</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Meghalaya">Meghalaya</option>
												<option value="Mizoram">Mizoram</option>
												<option value="Nagaland">Nagaland</option>
												<option value="Odisha">Odisha</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Sikkim">Sikkim</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Telangana">Telangana</option>
												<option value="Tripura">Tripura</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="Uttarakhand">Uttarakhand</option>
												<option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last2">Pincode <span>*</span></label>
                                            <input type="text" class="form-control" id="ShippingPinCode" name="ShippingPinCode" aria-describedby="last2" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email <span>*</span></label>
                                            <input type="email" class="form-control" id="ShippingEmail" name="ShippingEmail" aria-describedby="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Phone <span>*</span></label>
                                            <input type="text" class="form-control" id="ShippingPhone" name="ShippingPhone" aria-describedby="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="order">Order Notes <span>*</span></label>
                                            <textarea class="form-control" id="ShippingOrderNotes" name="ShippingOrderNotes" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
						<form class="billing_inner row" action="check-method.php">
                            <div class="order_box_price">
                                <h2 class="reg_title">Your Order</h2>
                                <div class="payment_list">
                                    <div class="price_single_cost">
<?php 
	$total=0;							
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
	$rate=$FEProductDetails['product_amount'];
	$quantity=$scart["Quantity"][$i];
	$total=$quantity*$rate;
	$photo=$imageurl.$FEProductDetails['photo'];
	$CartTotal=$CartTotal+$total;
									?>
                                        <h5><?php echo $title; ?> <span><?php echo $rate; ?></span></h5>
<?php } ?>
                                        <h4>Cart Subtotal <span><?php echo $CartTotal; ?></span></h4>
                                        <h3><span class="normal_text">Order Total</span> <span><?php echo $CartTotal; ?></span></h3>
                                    </div>
                                    <div id="accordion" role="tablist" class="price_method">                                                                
                                      
										<div class="card">
                                            <div class="card-header" role="tab" id="headingfour">
                                                <h5 class="mb-0">
                                                    <label><input type="radio" name="optradio" checked onclick="AddPaymentCOD()">  Cash On Delivery  </label>
                                                </h5>
                                            </div>
                                            <div id="collapsefour1" class="collapse show" role="tabpanel" aria-labelledby="headingfour1" data-parent="#accordion">
                                                <div class="card-body">
                                                   You can pay for 'Cash on Delivery' orders by cash at all locations.
                                                </div>
                                            </div>
                                        </div>
										<div class="card">
                                            <div class="card-header" role="tab" id="headingfour">
                                                <h5 class="mb-0">
                                                    <label><input type="radio" name="optradio" onclick="AddPaymentOL()">  Online Payment  </label>
                                                </h5>
                                            </div>
                                            <div id="collapsefour1" class="collapse show" role="tabpanel" aria-labelledby="headingfour1" data-parent="#accordion">
                                                <div class="card-body">
                                                    You can pay for orders by Debit card / Credit card / Net Banking .
                                                </div>
                                            </div>
                                        </div>
										
										
                                    </div>
                                </div>
								
                                <button type="submit" value="submit" class="btn subs_btn form-control" onclick="myRedirect();" >place order</button>
                                
								<a href="pdftomail/index.php?customer_id=<?php echo $_SESSION['customer_id']; ?>" Title="Send Mail" class="btn-box-tool" target="_blank" hidden><i class="fa fa-file-pdf-o custom-icon1" style="font-size:20px;color:Red"></i></a>
			    
							</div>
							</form>
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