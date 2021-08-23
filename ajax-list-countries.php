<?php  include('header.php');

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters'])){
	echo $letters = $_GET['letters'];	
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);		
	
    $res="select product_title,product_id from tbl_products where product_title like '%".$letters."%' and product_status='Active'";
	$Eres=mysqli_query($conn,$res);					
	while($inf = mysqli_fetch_array($Eres)){
		
	echo strtoupper($inf["product_id"])."###".strtoupper($inf["product_title"])."|";
	
	}			
 }
 
?>
