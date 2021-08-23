<?php 
session_start();
unset($_SESSION['cart']);
//session_unset();
//session_destroy ();
// $_SESSION['cart']=[
     // 'Product'=>[],
     // 'Quantity' => [],
	 // 'Vendor' => [],
	 // 'ProductVendorId'=>[],
 // ];
header("location:shopping-cart.php");
?>