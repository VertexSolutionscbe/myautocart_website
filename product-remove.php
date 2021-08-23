<?php include('admin/dist/dbinfo.php'); ?>

<?php 

$pl="DELETE FROM tbl_wishlist Where product_id='".$_REQUEST['pid']."' AND customer_id='".$_REQUEST['custid']."'";
$Epl=mysqli_query($conn,$pl); 
$Fpl=mysqli_fetch_array($Epl);

$spl="DELETE FROM tbl_service_wishlist Where service_id='".$_REQUEST['sid']."' AND customer_id='".$_REQUEST['custid']."'";
$Espl=mysqli_query($conn,$spl); 
$Fspl=mysqli_fetch_array($Espl);
	
header ('location:wish_list.php');
?>