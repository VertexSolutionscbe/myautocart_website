<?php
ob_start();
session_start();
include("../admin/dist/dbinfo.php");
include("../admin/dist/config.php");
error_reporting(0);

//echo $file=$_SESSION['afile']; exit;

//Mail To Customer  Start
//$rno="1234567";
$sc1="select * from tbl_service_invoice_details where id='".$_REQUEST['id']."'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$sc="select f_name,email from tbl_customer where customer_id='".$_SESSION['customer_id']."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
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
$service_name = $FEsc2['service_name'];
$category1 = $FEsc3['category_name'];
$amount = $FEsc1['amount'];
$vendor = $FEsc4['vendor_name'];

$OrderNo = $FEsc1['service_order_no'];
$OrderDate = $FEsc1['appointment_date'];
$OrderTime = $FEsc1['appointment_time'];


//sender
 $from = 'sales@myautocart.com';
 $fromName = 'MyAutoCart';

//email subject
$subject = 'Auto Generated Invoice from MyAutoCart'; 

//attachment file path
//$file = "codexworld.pdf";

$file=$_SESSION['afile'];

//email body content
$htmlContent = '<p>Hi, Please Find Service Invoice in attached PDF File.</p>';
$htmlContent .= '<html><body>';
$htmlContent .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$htmlContent .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$htmlContent .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Order Confirmed.Please check the Detailed Service Below. </p>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$OrderNo.'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$OrderDate.'</b>';
//$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc1['payment_mode'].'</b>';
$htmlContent.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    <th>Vendor</th>
	<th>Service Name</th>
	<th hidden>Qty</th>
	<th>Amount</th>
	<th>Total</th>
  </tr> ';
$sc1="select * from tbl_service_invoice_details where service_order_no='".$OrderNo."'";
$Esc1=mysqli_query($conn,$sc1);
$i=0;
$ttl=0;
$attl=0;
while($FEsc1=mysqli_fetch_array($Esc1))
{
$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
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
<td style="padding:5px;">'.$FEsc2['service_name'].'</td> 
<td style="padding:5px;" align="right" hidden>'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td>                 
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






//Mail To Vendor  Start
//$rno="1234567";
$sc1="select * from tbl_service_invoice_details where id='".$_REQUEST['id']."'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$sc="select f_name,email from tbl_customer where customer_id='".$_SESSION['customer_id']."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

$sc3="select * from tbl_category where category_id='".$FEsc1['category_id']."'";
$Esc3=mysqli_query($conn,$sc3);
$FEsc3=mysqli_fetch_array($Esc3);

$sc4="select * from tbl_vendor where vendor_id='".$FEsc1['vendor_id']."'";
$Esc4=mysqli_query($conn,$sc4);
$FEsc4=mysqli_fetch_array($Esc4);

$cname=$FEsc['f_name'];
$to = 'subhasri.vertex@gmail.com';
$service_name = $FEsc2['service_name'];
$category1 = $FEsc3['category_name'];
$amount = $FEsc1['amount'];
$vendor = $FEsc4['vendor_name'];

$OrderNo = $FEsc1['service_order_no'];
$OrderDate = $FEsc1['appointment_date'];
$OrderTime = $FEsc1['appointment_time'];


//sender
 $from = 'sales@myautocart.com';
 $fromName = 'MyAutoCart';

//email subject
$subject = 'Auto Generated Invoice from MyAutoCart'; 

//attachment file path
//$file = "codexworld.pdf";

$file=$_SESSION['afile'];

//email body content
$htmlContent = '<p>Hi, Please Find Service Invoice in attached PDF File.</p>';
$htmlContent .= '<html><body>';
$htmlContent .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$htmlContent .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$htmlContent .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Order Confirmed.Please check the Detailed Service Below. </p>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$OrderNo.'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$OrderDate.'</b>';
//$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc1['payment_mode'].'</b>';
$htmlContent.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    <th>Vendor</th>
	<th>Service Name</th>
	<th hidden>Qty</th>
	<th>Amount</th>
	<th>Total</th>
  </tr> ';
$sc1="select * from tbl_service_invoice_details where service_order_no='".$OrderNo."'";
$Esc1=mysqli_query($conn,$sc1);
$i=0;
$ttl=0;
$attl=0;
while($FEsc1=mysqli_fetch_array($Esc1))
{
$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
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
<td style="padding:5px;">'.$FEsc2['service_name'].'</td> 
<td style="padding:5px;" align="right" hidden>'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td>                 
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
$returnpath1 = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath1); 
//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
unlink($file);
//Mail To vendor  End	



//================================================


//Mail To Admin  Start
//$rno="1234567";
$sc1="select * from tbl_service_invoice_details where id='".$_REQUEST['id']."'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$sc="select f_name,email from tbl_customer where customer_id='".$_SESSION['customer_id']."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

$sc3="select * from tbl_category where category_id='".$FEsc1['category_id']."'";
$Esc3=mysqli_query($conn,$sc3);
$FEsc3=mysqli_fetch_array($Esc3);

$sc4="select * from tbl_vendor where vendor_id='".$FEsc1['vendor_id']."'";
$Esc4=mysqli_query($conn,$sc4);
$FEsc4=mysqli_fetch_array($Esc4);

$cname=$FEsc['f_name'];
$to = 'nazeer.sheik@vertexsolution.co.in';
$service_name = $FEsc2['service_name'];
$category1 = $FEsc3['category_name'];
$amount = $FEsc1['amount'];
$vendor = $FEsc4['vendor_name'];

$OrderNo = $FEsc1['service_order_no'];
$OrderDate = $FEsc1['appointment_date'];
$OrderTime = $FEsc1['appointment_time'];


//sender
 $from = 'sales@myautocart.com';
 $fromName = 'MyAutoCart';

//email subject
$subject = 'Auto Generated Invoice from MyAutoCart'; 

//attachment file path
//$file = "codexworld.pdf";

$file=$_SESSION['afile'];

//email body content
$htmlContent = '<p>Hi, Please Find Service Invoice in attached PDF File.</p>';
$htmlContent .= '<html><body>';
$htmlContent .='<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"><tr bgcolor="#e9eef7"> <td style="padding:10px;">';      
$htmlContent .= '<h3 style="color:#d4311c;font-family: Arial, Helvetica, sans-serif;">Hi '.$cname.' ,</h3>';
$htmlContent .= '<p style="color:#000;font-size:14px;font-family: Arial, Helvetica, sans-serif;">Your Order Confirmed.Please check the Detailed Service Below. </p>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$OrderNo.'</b>';
$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$OrderDate.'</b>';
//$htmlContent .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$FEsc1['payment_mode'].'</b>';
$htmlContent.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    <th>Vendor</th>
	<th>Service Name</th>
	<th hidden>Qty</th>
	<th>Amount</th>
	<th>Total</th>
  </tr> ';
$sc1="select * from tbl_service_invoice_details where service_order_no='".$OrderNo."'";
$Esc1=mysqli_query($conn,$sc1);
$i=0;
$ttl=0;
$attl=0;
while($FEsc1=mysqli_fetch_array($Esc1))
{
$sc2="select * from tbl_services where id='".$FEsc1['vendor_service_id']."'";
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
<td style="padding:5px;">'.$FEsc2['service_name'].'</td> 
<td style="padding:5px;" align="right" hidden>'.number_format($FEsc1['qty'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td> 
<td style="padding:5px;" align="right">'.number_format($FEsc1['amount'],2).'</td>                 
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
$returnpath2 = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath2); 
//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
unlink($file);
//Mail To Admin  End	



header("location:../index.php?m=1"); 
?>