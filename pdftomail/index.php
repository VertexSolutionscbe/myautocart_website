<?php
session_start();
error_reporting(0);

/* $conn = mysqli_connect("localhost","root","") or die("cannot connect"); 
mysqli_select_db($conn, "myautocart") or die("cannot select DB"); */

   $conn = mysqli_connect("localhost", "myautocart", "J?4lB&oGdok^") or die("cannot connect"); 
   mysqli_select_db($conn, "myautocart") or die("cannot select DB"); 

$ng="select * from tbl_number_generate where Id=1";
$Eng=mysqli_query($conn,$ng);
$FEng=mysqli_fetch_array($Eng);

$invno=INV."-".$FEng['inv'];
$rno=$FEng['OrderNo'];
$CustomerId=$_SESSION['customer_id'];	
$BillingAddressId=$_SESSION['BillingAddressId'];
$DeliveryAddressId=$_SESSION['DeliveryAddressId'];
$PaymentMode="Cash On Delivery";
$PaymentId="";
$OrderDate=date('Y-m-d');
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
	$vendorId=$scart["Vendor"][$i];
	$iq="";
	$iqq="";
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
	$desc=$desc."".$quantity." Quantity Of ".$title." Worth Rs.".$total." , " ;
	$CartTotal=$CartTotal+$total;
	
	$sd="SELECT * From tbl_confirm_orders WHERE ";
	
	$iq.="insert into tbl_confirm_orders set inv_no='$invno',customer_id='$CustomerId' ,vendor_id='".$scart["Vendor"][$i]."',";
	$iq.="vendor_product_id='".$scart["ProductVendorId"][$i]."',category_id='$category',"; 
	$iq.="product_id='".$scart["Product"][$i]."',qty='".$scart["Quantity"][$i]."',amount='$rate',";
	$iq.="billing_address_id='$BillingAddressId',delivery_address_id='$DeliveryAddressId',";
	$iq.="payment_mode='$PaymentMode',payment_id='$PaymentId',order_date='$OrderDate',OrderNo=$rno,financial_year='".$_SESSION['financial_year']."'";	
	//echo $iq;
	$Eiq=mysqli_query($conn,$iq);
	$idd=mysqli_insert_id($conn);
    //echo $FEiq=mysqli_fetch_array($Eiq);
    
	$iqq.="insert into tbl_invoice_details set inv_no='$invno',customer_id='$CustomerId',category_id='$category',";	
	$iqq.="product_id='".$scart["Product"][$i]."',vendor_id='".$scart["Vendor"][$i]."',";
	$iqq.="order_date='$OrderDate',qty='".$scart["Quantity"][$i]."',cgst='',igst='',sgst='',"; 	
	$iqq.="grand_total='$rate',confirm_order_id='$idd',OrderNo=$rno,financial_year='".$_SESSION['financial_year']."',status='Active'";	
	//echo $iqq;
	$Eiq1=mysqli_query($conn,$iqq);	
	//echo $idd=mysqli_insert_id($conn);
	//echo $FEiq1=mysqli_fetch_array($Eiq1);	
	
    /* $ung="update tbl_number_generate set OrderNo=OrderNo+1 where Id=1";
    $Eung=mysqli_query($conn,$ung); */

    $ug="update tbl_number_generate set inv=inv+1 where Id=1";
    $Eug=mysqli_query($conn,$ug);  	
	
}
header("location:invoice.php?coid=$idd"); 
//----- exit(); ------- //






