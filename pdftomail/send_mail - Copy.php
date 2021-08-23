<?php
session_start();

//echo $file=$_SESSION['afile'];exit();

//recipient
$to = $_SESSION['mail'];
//$to=$_SESSION['supemail'];


//sender
$from = 'admnliva@gmail.com';
$fromName = 'taibapacks.com';

//email subject
$subject = 'Bill from Taiba Printing Press'; 

//attachment file path
//$file = "codexworld.pdf";

$file=$_SESSION['afile'];

//email body content
$htmlContent = '<p>Hi,Please Find Bill details in attached PDF File.</p>';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

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

if (!$mail) {
    $errorMessage = error_get_last();
}
//echo $errorMessage;
echo $mail? header("location:../s_purchase_order_view.php?msg=Mail Sent Successfully"):error_get_last();
echo $mail? header("location:../s_purchase_order_view.php?msg=Mail Sent Successfully"):header("location:../s_purchase_order_view.php?msg=Mail Sent Failed");


?>