<?php
ob_start();
session_start();
include("../admin/dist/dbinfo.php");
include("../admin/dist/config.php");
error_reporting(0);

//echo $file=$_SESSION['afile']; exit;
/* --------- */
$ng="select OrderNo from tbl_number_generate where Id=1";
$Eng=mysqli_query($conn,$ng);
$FEng=mysqli_fetch_array($Eng);

$rno=$FEng['OrderNo'];
$CustomerId=$_SESSION['customer_id'];
/* --------- */
//Mail To Customer  Start
//$rno="1234567";
$sc="select f_name,email from tbl_customer where customer_id='".$_SESSION['customer_id']."'";
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


//sender
 $from = 'sales@myautocart.com';
 $fromName = 'MyAutoCart';

//email subject
$subject = 'Auto Generated Invoice from MyAutoCart'; 

//attachment file path
//$file = "codexworld.pdf";

$file=$_SESSION['afile'];

//email body content
$htmlContent = '<p>Hi, Please Find Sales Invoice in attached PDF File.</p>';
$htmlContent .= '<html><body>';
$htmlContent .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$htmlContent .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$htmlContent .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Order Confirmed.Please check the Detailed Purchase Below. </p>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$FEng['OrderNo'].'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$FEsc1['order_date'].'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc1['payment_mode'].'</b>';
$htmlContent.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
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
$htmlContent.='  
<tr >                    
<td style="padding:5px;">'.$i.'</td> 
<td style="padding:5px;">'.$FEsc4['vendor_name'].'</td> 
<td style="padding:5px;">'.$FEsc2['product_title'].'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($ttl,2).'</td>                 
</tr> ';
 } 
$htmlContent.='  
<tr >                    
<td style="padding:5px;" align="right" colspan="6"> Total Rs   '.number_format($attl,2).'</td>                 
</tr> ';
$htmlContent.='</table>  ';
$htmlContent.='</td></tr>';
$htmlContent.='<tr bgcolor="#e9eef7"> <td style="padding:10px;">
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Thanks,<br></p>
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;"> Team,<br>MyAutoCart.com</p>
</td></tr></table>';
$htmlContent .= '</body></html>';

//header for sender info
// $headers = "From: $fromName"." <".$from.">";
$headers = 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion(); 

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($file)."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 
//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
unlink($file);
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

$file=$_SESSION['afile'];
 
// To send HTML mail, the Content-type header must be set
// Compose a simple HTML email message
$htmlContent = '<html><body>';
$htmlContent .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$htmlContent .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$htmlContent .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Have received new orders.Please check the Detailed Purchase Below. </p>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$FEng['OrderNo'].'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$FEsc11['order_date'].'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc11['payment_mode'].'</b>';
$htmlContent.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
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
$htmlContent.='  
<tr >                    
<td style="padding:5px;">'.$i.'</td> 

<td style="padding:5px;">'.$FEsc2['product_title'].'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($ttl,2).'</td>                 
</tr> ';
 } 
$htmlContent.='  
<tr >                    
<td style="padding:5px;" align="right" colspan="5"> Total Rs   '.number_format($attl,2).'</td>                 
</tr> ';
$htmlContent.='</table>  ';
$htmlContent.='</td></tr>';
$htmlContent.='<tr bgcolor="#e9eef7"> <td style="padding:10px;">
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Thanks,<br></p>
<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;"> Team,<br>MyAutoCart.com</p>
</td></tr></table>';

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion(); 

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($file)."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

$message .= '</body></html>'; 
$mail = @mail($to, $subject, $message, $headers, $returnpath); 
//Mail To Vendor  End	
//================================================
if (!$mail) 
{
    $errorMessage = error_get_last();
}
$_SESSION['cart']=[
     'Product'=>[],
     'Quantity' => [],
	 'Vendor' => [],
	 'ProductVendorId'=>[],
 ];

$ung="update tbl_number_generate set OrderNo=OrderNo+1 where Id=1";
$Eung=mysqli_query($conn,$ung);

/* $ug="update tbl_number_generate set inv=inv+1 where Id=1";
$Eug=mysqli_query($conn,$ug); */  

header("location:../shopping-cart.php?m=1"); 
?>