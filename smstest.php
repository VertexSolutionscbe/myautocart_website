<?php 
$ch = curl_init();
$user="nazeer.sheik@vertexsolution.co.in:vertex";
$receipientno="7339015392";
$senderID="TEST SMS";
$msgtxt="Hi,New Order received from MyAutocart.Please note Order no is 4354" ;
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch);

?>