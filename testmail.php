<?php
//=============================================
//Mail To Customer  Start
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
$message .= '<h1 style="color:#f40;">Hi '.$cname.' ,</h1>';
$message .= '<p style="color:#080;font-size:18px;">Your Order Confirmed.Please note this Referance No'.$rno.' for further queries.Thanks for your Business with us!.</p>';
$message .= '</body></html>'; 
mail($to, $subject, $message, $headers);
//Mail To Customer  End	
//================================================

//=============================================
//Mail To Vendor  Start
$rno="1234567";
$cname="Kumaresan";//suhailm
$to = 'kumaresan.vertex@gmail.com';
$subject = 'New Order Received From MyAutoCart';
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
$message .= '<h1 style="color:#f40;">Hi '.$cname.' ,</h1>';
$message .= '<p style="color:#080;font-size:18px;">Your Have received new order.Please note this Referance No'.$rno.' for further queries.All the best for your Business!.</p>';
$message .= '</body></html>'; 
mail($to, $subject, $message, $headers);
//Mail To Vendor  End	
//================================================
?>