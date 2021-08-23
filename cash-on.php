<?php 
ob_start();
session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);

$ng="select OrderNo from tbl_number_generate where Id=1";
$Eng=mysqli_query($conn,$ng);
$FEng=mysqli_fetch_array($Eng);

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
	
	$iq.="insert into tbl_confirm_orders set customer_id='$CustomerId' ,vendor_id='".$scart["Vendor"][$i]."',";
	$iq.="vendor_product_id='".$scart["ProductVendorId"][$i]."',category_id='$category',"; 
	$iq.="product_id='".$scart["Product"][$i]."',qty='".$scart["Quantity"][$i]."',amount='$rate',";
	$iq.="billing_address_id='$BillingAddressId',delivery_address_id='$DeliveryAddressId',";
	$iq.="payment_mode='$PaymentMode',payment_id='$PaymentId',order_date='$OrderDate',OrderNo=$rno";	
	//echo $iq;
	$Eiq=mysqli_query($conn,$iq); 
}
//exit();	
//=============================================
//Mail To Customer  Start
//$rno="1234567";
$sc="select f_name,email from tbl_customer where customer_id='".$CustomerId."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

$sc1="select * from tbl_confirm_orders where OrderNo='".$FEng['OrderNo']."'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$sc2="select * from tbl_products where product_id='".$FEsc1['product_id']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

$sc3="select * from tbl_category where category_id='".$FEsc1['category_id']."'";
$Esc3=mysqli_query($conn,$sc3);
$FEsc3=mysqli_fetch_array($Esc3);

$sc4="select * from tbl_vendor where vendor_id='".$FEsc1['vendor_id']."'";
$Esc4=mysqli_query($conn,$sc4);
$FEsc4=mysqli_fetch_array($Esc4);




$cname=$FEsc['f_name'];
$to = $FEsc['email'];
$product = $FEsc2['product_title'];
$category1 = $FEsc3['category_name'];
$amount = $FEsc1['amount'];
$vendor = $FEsc4['vendor_name'];
$subject = 'Order Confirmation From MyAutoCart';
$from = 'sales@myautocart.com';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
// Compose a simple HTML email message
$message = '<html><body>';

$message .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$message .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$message .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Order Confirmed.Please check the Detailed Purchase Below. </p>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$FEng['OrderNo'].'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$FEsc1['order_date'].'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc1['payment_mode'].'</b>';
$message.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    <th>Vendor</th>
	<th>Item</th>
	<th>Qty</th>
	<th>Rate</th>
	<th>Total</th>
  </tr> ';
$sc1="select * from tbl_confirm_orders where OrderNo='".$FEng['OrderNo']."'";
$Esc1=mysqli_query($conn,$sc1);
$i=0;
$ttl=0;
$attl=0;
while($FEsc1=mysqli_fetch_array($Esc1))
{
$sc2="select * from tbl_products where product_id='".$FEsc1['product_id']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

$sc3="select * from tbl_category where category_id='".$FEsc1['category_id']."'";
$Esc3=mysqli_query($conn,$sc3);
$FEsc3=mysqli_fetch_array($Esc3);

$sc4="select * from tbl_vendor where vendor_id='".$FEsc1['vendor_id']."'";
$Esc4=mysqli_query($conn,$sc4);
$FEsc4=mysqli_fetch_array($Esc4);
$i++;
$ttl=$FEsc1['qty']*$FEsc1['amount'];
$attl=$attl+$ttl;
$message.='  
<tr >                    
<td style="padding:5px;">'.$i.'</td> 
<td style="padding:5px;">'.$FEsc4['vendor_name'].'</td> 
<td style="padding:5px;">'.$FEsc2['product_title'].'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($ttl,2).'</td>                 
</tr> ';
 } 
$message.='  
<tr >                    
<td style="padding:5px;" align="right" colspan="6"> Total Rs   '.number_format($attl,2).'</td>                 
</tr> ';
$message.='</table>  ';
$message.='</td></tr>';
$message.='<tr bgcolor="#e9eef7"> <td style="padding:10px;">
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Thanks,<br></p>
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;"> Team,<br>MyAutoCart.com</p>
</td></tr></table>';


$message .= '</body></html>'; 
mail($to, $subject, $message, $headers);
//Mail To Customer  End	
//================================================

//=============================================
//Mail To Vendor  Start
//$rno="1234567";
$sv="select vendor_name,email from tbl_vendor where vendor_id='".$vendorId."'";
$Esv=mysqli_query($conn,$sv);
$FEsv=mysqli_fetch_array($Esv);

$sc11="select * from tbl_confirm_orders where OrderNo='".$FEng['OrderNo']."'";
$Esc11=mysqli_query($conn,$sc11);
$FEsc11=mysqli_fetch_array($Esc11);


$cname=$FEsv['vendor_name'];//suhailm
$to = "nazeer.sheik@vertexsolution.co.in";//"kumaresan.vertex@gmail.com";//$FEsv['email'];
$subject = 'New Order Received From MyAutoCart';
$from = 'sales@myautocart.com'; 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
// Compose a simple HTML email message
$message = '<html><body>';

$message .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$message .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$message .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Have received new orders.Please check the Detailed Purchase Below. </p>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$FEng['OrderNo'].'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$FEsc11['order_date'].'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc11['payment_mode'].'</b>';
$message.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    
	<th>Item</th>
	<th>Qty</th>
	<th>Rate</th>
	<th>Total</th>
  </tr> ';
$sc1="select * from tbl_confirm_orders where OrderNo='".$FEng['OrderNo']."'";
$Esc1=mysqli_query($conn,$sc1);
$i=0;
$ttl=0;
$attl=0;
while($FEsc1=mysqli_fetch_array($Esc1))
{
$sc2="select * from tbl_products where product_id='".$FEsc1['product_id']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

$sc3="select * from tbl_category where category_id='".$FEsc1['category_id']."'";
$Esc3=mysqli_query($conn,$sc3);
$FEsc3=mysqli_fetch_array($Esc3);

$sc4="select * from tbl_vendor where vendor_id='".$FEsc1['vendor_id']."'";
$Esc4=mysqli_query($conn,$sc4);
$FEsc4=mysqli_fetch_array($Esc4);
$i++;
$ttl=$FEsc1['qty']*$FEsc1['amount'];
$attl=$attl+$ttl;
$message.='  
<tr >                    
<td style="padding:5px;">'.$i.'</td> 

<td style="padding:5px;">'.$FEsc2['product_title'].'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($ttl,2).'</td>                 
</tr> ';
 } 
$message.='  
<tr >                    
<td style="padding:5px;" align="right" colspan="5"> Total Rs   '.number_format($attl,2).'</td>                 
</tr> ';
$message.='</table>  ';
$message.='</td></tr>';
$message.='<tr bgcolor="#e9eef7"> <td style="padding:10px;">
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Thanks,<br></p>
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;"> Team,<br>MyAutoCart.com</p>
</td></tr></table>';

$message .= '</body></html>'; 
mail($to, $subject, $message, $headers);
//Mail To Vendor  End	
//================================================
$_SESSION['cart']=[
     'Product'=>[],
     'Quantity' => [],
	 'Vendor' => [],
	 'ProductVendorId'=>[],
 ];

$ung="update tbl_number_generate set OrderNo=OrderNo+1 where Id=1";
$Eung=mysqli_query($conn,$ung); 

header("location:shopping-cart.php?m=1");
?>