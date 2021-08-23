<!--- Header Area --->
<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
$_SESSION['PaymentMethod']="COD";
$_SESSION['BillingAddressId']=1;
$_SESSION['DeliveryAddressId']=1;

 $otp=rand(100000,999999);


$ch = curl_init();
$user="nazeer.sheik@vertexsolution.co.in:vertex";
$receipientno=$_SESSION['mobile'];
$senderID="TEST SMS";
$msgtxt="Your MyAutoCart confirmation code is ".$otp ;
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
// if(empty ($buffer))
// { echo " buffer is empty "; }
// else
// { echo $buffer; }
curl_close($ch);



?>
<!--- Header Area End --->

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function CheckOtp() {
 var x = document.getElementById("MobileOtpc").value; 
 var y = document.getElementById("MobileOtp").value;  
 if(x!=y)
 {
	alert('Invalid OTP!');
	return false;
 }
}
</script>
	 
        <!--================Categories Banner Area =================-->
        <section class="accont_details_banner_area">
            <div class="container">
                <div class="c_banner_inner">
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
		if(isset($_POST['submit'])) {
			// $_SESSION['f_name']=$_POST['BillingFirstName'];
			// $_SESSION['l_name']=$_POST['BillingLastName'];
			// $_SESSION['email']=$_POST['BillingEmail'];
			// $_SESSION['address']=$_POST['BillingAddress1'];
			// $_SESSION['mobile']=$_POST['BillingPhone'];
			// $_SESSION['gender']=$_POST['gender'];
			// $_SESSION['password']=$_POST['password'];
			// $_SESSION['customer_id']=$_POST['cid'];
		
				
		
		}		
		?>
		       
        <!--================Shopping Cart Area =================-->
		
        <section class="register_area p_100">
		
<!-- Success Msg -->		
<div class="container">
  <?php //if (isset($_SESSION['success'])) :  ?>
  <?php if($success_message): ?>
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

            <?php 
             $cst ="SELECT * FROM tbl_customer where customer_id='".$_REQUEST['cid']."'";
             $Ecst = mysqli_query($conn, $cst);
             $FEcst = mysqli_fetch_array($Ecst);
            ?>		
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing_details">
                                <h2 class="reg_title">Account Details</h2>
                                
								<form class="billing_inner row" method="post" onSubmit="return CheckOtp();" action="account_details_edit_mv_act.php">
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name"><b>First Name</b></label>
                                            <input type="text" id="BillingFirstName" name="BillingFirstName" value="<?php echo $_SESSION['f_name']; ?>" class="form-control" aria-describedby="name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last"><b>Last Name</b> </label>
                                            <input type="text" id="BillingLastName" name="BillingLastName" value="<?php echo $_SESSION['l_name']; ?>" class="form-control"  aria-describedby="last" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email"><b>E-Mail</b> </label>
                                            <input type="email" class="form-control" id="BillingEmail" name="BillingEmail" value="<?php echo $_SESSION['email']; ?>" aria-describedby="email" readonly>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone"><b>Mobile No.</b></label>
                                            <input type="text" class="form-control" id="BillingPhone" name="BillingPhone" value="<?php echo $_SESSION['mobile'];?>" aria-describedby="phone" readonly>
                                        </div>
                                    </div>									
									
									<div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><b>Enter OTP</b></label>
                                            <input type="text" class="form-control" id="MobileOtpc" name="MobileOtpc" value="" aria-describedby="phone">
                                        </div>
                                    </div>
									<div class="col-lg-6" hidden>
                                        <div class="form-group">
                                            <label for="phone"><b> OTP</b></label>
                                            <input type="hidden" class="form-control" id="MobileOtp" name="MobileOtp" value="<?php echo $otp;?>" aria-describedby="phone">
                                        </div>
                                    </div>
									
									<div class="col-lg-5 form-group">
                                      <button type="submit" value="submit" name="submit" class="btn subs_btn form-control"><i class="fa fa-floppy-o" aria-hidden="true"></i>Confirm</button>
                                    </div>                                                                   
                                </form>								
                            </div>
                        </div>
						
						<div class="col-lg-5" hidden>
						  <div class="billing_details">
						    <img src="img/supper-add-1.jpg" alt="" title="">
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