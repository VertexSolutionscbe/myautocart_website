<?php 
ob_start();
session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);

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
	echo "<br>";
	echo "<br>";
	echo "<br>";
		echo $desc="Vendor Id".$scart["Vendor"][$i]." Product Id".$scart["Product"][$i]." ProductVendorId ".$scart["ProductVendorId"][$i]." Quantity ".$scart["Quantity"][$i];
		echo "<br>";
		
		
		$vendorId=$scart["Vendor"][$i];
	$iq="";
	$ProductDetails="select * from tbl_products where product_id='".$scart["Product"][$i]."'";
	$EProductDetails=mysqli_query($conn,$ProductDetails); 
	$FEProductDetails=mysqli_fetch_array($EProductDetails);
	$category=$FEProductDetails['category_id'];
	$title=$FEProductDetails['product_title'];
	
	//Rate of the product from Vendor  productvendorid  vendor
	$pv="SELECT * FROM tbl_vendor_products WHERE id='".$scart["ProductVendorId"][$i]."'";
	$Epv=mysqli_query($conn,$pv);
	$FEpv=mysqli_fetch_array($Epv);
	$rate=$FEpv['product_amount'];
	//$rate=$FEProductDetails['product_amount'];
	$quantity=$scart["Quantity"][$i];
	$total=$quantity*$rate;
	echo $desc=$desc."".$quantity." Quantity Of ".$title." Worth Rs.".$total." , " ;
	//$CartTotal=$CartTotal+$total;
	echo "<br>";
	$iq.="insert into tbl_confirm_orders set customer_id='$CustomerId' ,vendor_id='".$scart["Vendor"][$i]."',";
	$iq.="vendor_product_id='".$scart["ProductVendorId"][$i]."',category_id='$category',"; 
	$iq.="product_id='".$scart["Product"][$i]."',qty='".$scart["Quantity"][$i]."',amount='$rate',";
	$iq.="billing_address_id='$BillingAddressId',delivery_address_id='$DeliveryAddressId',";
	$iq.="payment_mode='$PaymentMode',payment_id='$PaymentId',order_date='$OrderDate',OrderNo=$rno";	
	echo $iq;
	echo "<br>";
	//$Eiq=mysqli_query($conn,$iq);
		
}
?>