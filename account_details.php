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

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
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
		       
        <!--================Shopping Cart Area =================-->
		
        <section class="register_area p_100">
		
<!-- Success Msg -->		
<div class="container">
  <?php //if (isset($_SESSION['success'])) :  ?>
  <?php if($_REQUEST['smsg']): ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Mobile number has been verified successfully.
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
             $cst ="SELECT * FROM tbl_customer where customer_id='".$_SESSION['customer_id']."'";
             $Ecst = mysqli_query($conn, $cst);
             $FEcst = mysqli_fetch_array($Ecst);
            ?>		
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing_details">
                                <h2 class="reg_title">Account Details</h2>
                                
								<form class="billing_inner row">
                                    
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
									
									<div class="col-lg-12" hidden>
                                        <div class="form-group">
                                            <label for="gid"><b>Google id</b> </label>
                                            <input type="text" class="form-control" id="gid" name="gid" value="<?php echo $FEcst['gid']; ?>" aria-describedby="gid" readonly>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone"><b>Mobile No </b> <span style="color:red"><?php if($FEcst['MobileVerified']!=1){ echo " Not verified !"; } ?></span></label>
                                            <input type="text" class="form-control" id="BillingPhone" name="BillingPhone" value="<?php echo $FEcst['mobile'];?>" aria-describedby="phone" readonly>
                                        </div>
                                    </div>
									
									<div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="gender"><b>Gender</b></label>
                                            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $FEcst['gender'];?>" aria-describedby="gender" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" hidden>
                                        <div class="form-group">
                                            <label for="phone"><b>Age</b></label>
                                            <input type="text" class="form-control" id="age" name="age" value="<?php echo $FEcst['age'];?>" aria-describedby="phone" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone"><b>Password</b></label>
                                            <input type="password" class="form-control" name="password" id="myInput" value="<?php echo $FEcst['password'];?>" aria-describedby="phone" readonly>                                           
										</div>
										<input type="checkbox" onclick="myFunction()"> Show Password
                                    </div>									

                                    <div class="col-lg-2 form-group">
                                      <a href="account_details_edit.php?cid=<?php echo $FEcst['customer_id']; ?>" type="submit" value="submit" name="submit" class="btn subs_btn form-control"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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