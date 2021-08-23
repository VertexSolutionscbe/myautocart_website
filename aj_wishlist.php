<?php
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
	
  $product_id=trim($_POST['pid']);
  $customer_id=trim($_POST['cid']);
  $cid=trim($_POST['category']);
$pvid=trim($_POST['pvid']);	
$tp="SELECT * FROM `tbl_products` WHERE product_id='".$product_id."'";
$Etp=mysqli_query($conn,$tp);
$FEtp=mysqli_fetch_array($Etp);

$tv="SELECT * FROM `tbl_vendor_products` WHERE product_id=".$product_id."";
$Etv=mysqli_query($conn,$tv);
$FEtv=mysqli_fetch_array($Etv);

$tc="SELECT * FROM `tbl_category` WHERE category_id=".$FEtp['category_id']."";
$Etc=mysqli_query($conn,$tc);
$FEtc=mysqli_fetch_array($Etc);
 
$se="select id from tbl_wishlist where customer_id='".$customer_id."' AND product_id='$product_id' AND vendor_id='".$FEtp['vendor_id']."'";
$Ese=mysqli_query($conn,$se);
$nr=mysqli_num_rows($Ese);
if($nr<1)
{
$query="INSERT INTO tbl_wishlist SET category_id='$cid', product_id='$product_id', vendor_id=".$FEtp['vendor_id'].", vendor_product_id='$pvid', customer_id='".$customer_id."',status='Active'";
$Equery=mysqli_query($conn,$query);
$nid=mysqli_insert_id($Equery);
}
else
{
	echo "1";
}
?>

								 