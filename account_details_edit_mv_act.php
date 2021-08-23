<?php 
ob_start();
session_start();
/* include("settings.php"); */
include("admin/dist/dbinfo.php");
include("admin/dist/config.php"); 
error_reporting(0); 
		
// updating into the database status			        
 $ups = "UPDATE tbl_customer SET MobileVerified='1',f_name='".$_SESSION['f_name']."', l_name='".$_SESSION['l_name']."', email='".$_SESSION['email']."', address='".$_SESSION['address']."', mobile='".$_SESSION['mobile']."', password='".$_SESSION['password']."' WHERE customer_id='".$_SESSION['customer_id']."'";
$Eups = mysqli_query($conn,$ups);
// $success_message = 'Profile is updated successfully.';
//$_SESSION['success'] = 'Profile is updated successfully';		 
header('location:account_details.php?smsg=Profile is updated successfully.');	

?>