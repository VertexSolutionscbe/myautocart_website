<?php 
include('gmloginPHP54/config.php');

ob_start();
session_start();
include 'config.php'; 
unset($_SESSION['customer_id']);

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

header("location: signin-gmail.php"); 
?>

