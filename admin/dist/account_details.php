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
                    <h3>Account Details</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="accont_details.php">Account Details</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->

<?php 
$cst ="SELECT * FROM tbl_customer where customer_id=".$_SESSION['customer_id'];
$Ecst = mysqli_query($conn, $cst);
$FEcst = mysqli_fetch_array($Ecst);
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
                                <h2 class="reg_title">Account Details</h2>
                                <form class="billing_inner row">
                                    <div class="col-lg-12">
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name"><b>First Name</b></label>
                                            <input type="text" id="BillingFirstName" name="BillingFirstName" value="<?php echo $FEcst['f_name']; ?>" class="form-control" aria-describedby="name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last"><b>Last Name</b> </label>
                                            <input type="text" id="BillingLastName" name="BillingLastName" value="<?php echo $FEcst['l_name']; ?>" class="form-control"  aria-describedby="last" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address"><b>Address</b> </label>
                                            <input type="text" id="BillingAddress1" name="BillingAddress1" value="<?php echo $FEcst['address']; ?>" class="form-control" aria-describedby="address" readonly>
                                        </div>
                                    </div>
                     
								
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email"><b>E-Mail</b> </label>
                                            <input type="email" class="form-control" id="BillingEmail" name="BillingEmail" value="<?php echo $FEcst['email']; ?>" aria-describedby="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone"><b>Phone</b></label>
                                            <input type="text" class="form-control" id="BillingPhone" name="BillingPhone" value="<?php echo $FEcst['mobile'];?>" aria-describedby="phone" readonly>
                                        </div>
                                    </div>
                                   
                                
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