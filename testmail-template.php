<?php 
ob_start();
session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php");
error_reporting(0);
//=============================================
//Mail To Customer  Start

$odate=date('d.m.Y');
$pmode="Cash on Delivery";
$rno="1234567";
$cname="Kumaresan";
$to = 'kumaresan.vertex@gmail.com';
$subject = 'Order Confirmation From MyAutoCart';
$from = 'kumaresan.vertex@gmail.com'; 
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

$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order No : '.$rno.'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Order Date : '.$odate.'</b>';
$message .='</td></tr> <tr bgcolor="#e9eef7"><td style="padding:5px;" align="left"><b> Payment Mode : '.$pmode.'</b>';

$message.='</td></tr> <tr bgcolor="#f2f3f5"> <td style="padding:10px;"><table cellpadding="0" cellspacing="0" width="600px" align="left" border="1">  
<tr style="padding:5px;">
    <th>S.No</th>
    <th>Vendor</th>
	<th>Item</th>
	<th>Qty</th>
	<th>Rate</th>
	<th>Total</th>
  </tr> ';
  
$sc1="select * from tbl_confirm_orders where OrderNo='26'";
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
?>