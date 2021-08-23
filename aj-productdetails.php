<?php
session_start();
//echo trim($_POST['product']);
if(!isset($_SESSION['cart']))
{
	
	$_SESSION['cart']=[
     'Product'=>[],
     'Quantity' => [],
	 'Vendor' => [],
	 'ProductVendorId'=>[],
 ];
}

if(trim($_POST['task'])=='AddCart')
{
$array=$_SESSION['cart'];
array_push($array['Product'], trim($_POST['product']));
array_push($array['Quantity'], trim($_POST['quantity']));
array_push($array['Vendor'], trim($_POST['vendor']));
array_push($array['ProductVendorId'], trim($_POST['productvendorid']));
$_SESSION['cart']= $array;

$scart_ttl=$_SESSION['cart'];
echo count($scart_ttl['Product']);
//$array1=$_SESSION['cart'];
//print_r($array1);
// for($i=0;$i<=sizeof($array1);$i++)
// {
	// echo " Product ".$array1["Product"][$i]." Quantity ".$array1["Quantity"][$i]." Vendor Id ".$array1["Vendor"][$i];
	// echo "<br>";
// }
}
if(trim($_POST['task'])=='RemoveCart')
{
$array=$_SESSION['cart'];
array_splice($array['Product'], trim($_POST['index']), 1);
array_splice($array['Quantity'], trim($_POST['index']), 1);
array_splice($array['Vendor'], trim($_POST['index']), 1);
array_splice($array['ProductVendorId'], trim($_POST['productvendorid']),1);
$_SESSION['cart']= $array;

$scart_ttl=$_SESSION['cart'];
echo count($scart_ttl['Product']);
}    
if(trim($_POST['task'])=='UpdateCart')
{
$array=$_SESSION['cart'];
//Remove Existing
// array_splice($array['Product'], trim($_POST['index']), 1);
// array_splice($array['Quantity'], trim($_POST['index']), 1);
// array_splice($array['Vendor'], trim($_POST['index']), 1);

//Update New One
// array_push($array['Product'], trim($_POST['product']));
// array_push($array['Quantity'], trim($_POST['quantity']));
// array_push($array['Vendor'], trim($_POST['vendor']));

array_splice($array['Product'], trim($_POST['index']), 1,trim($_POST['product']));
array_splice($array['Quantity'], trim($_POST['index']), 1,trim($_POST['quantity']));
array_splice($array['Vendor'], trim($_POST['index']), 1,trim($_POST['vendor']));
array_splice($array['ProductVendorId'],trim($_POST['index']), 1, trim($_POST['productvendorid']));

$_SESSION['cart']= $array;

$scart_ttl=$_SESSION['cart'];
echo count($scart_ttl['Product']);
}  

if(trim($_POST['task'])=='PaymentMethod')
{
$_SESSION['PaymentMethod']=$_POST['paymenttype'];
//echo $_SESSION['PaymentMethod'];
}  


?>	  