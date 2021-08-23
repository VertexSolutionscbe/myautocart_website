<?php
// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Setting up the time zone
// date_default_timezone_set('Asia/Dhaka');
date_default_timezone_set("Asia/Calcutta");

// Host Name
// $dbhost = '13.233.251.123';
$dbhost = 'localhost';

// Database Name
$dbname = 'myautocart';

// Database Username
$dbuser = 'root';
/* $dbuser = 'myautocart'; */

// Database Password
$dbpass = '';
// $dbpass = 'vertex123';
/* $dbpass = 'J?4lB&oGdok^'; */

// Defining base url
// define("BASE_URL", "http://192.168.0.100/Myautocart_Ecom/");
// $_SESSION['path']="http://192.168.0.105/Myautocart_Ecom/";
 define("BASE_URL", "http://192.168.217.201/myautocart/"); 

// Getting Admin url
define("MyAutoCart", BASE_URL . "myautocart" . "/");

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $ex ) {
    echo "Connection error :" . $ex->getMessage();
}
