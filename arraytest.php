<?php
session_start();
  // $cars = [
    // ['Volkswagen', 22, 18],
    // ['BMW', 15, 13],
    // ['Honda', 5, 2],
    // ['Audi', 17, 15],
  // ];
  // for ($rows = 0; $rows < 4; $rows++) {
    // echo "<p><b>Row $rows</b></p>";
    // echo "<ul>";
    // for ($cols = 0; $cols < 3; $cols++) {
      // echo "<li>".$cars[$rows][$cols]."</li>";
    // }
    // echo "</ul>";
  // }
  
  
  
 // echo "</br>";
 //unset($_SESSION['cart']); 
 $array = [
     'Id' => [1,2,3],
	 'Product'=>['aaa','bbb','ccc'],
     'Quantity' => [10,20,30],
 ];
  
 $arrayId['Id'] = 4;
 $arrayProduct['Product'] ='ddd';
 $arrayQuantity['Quantity'] = 40;
 
 //before adding new values 
 echo "Before add the value:- ";
 //print_r($array); echo "<br>";
 
 //add elements/values in array
 array_push($array['Id'], 4);
 array_push($array['Product'], 'ddd');
 array_push($array['Quantity'], 40);
 //print_r($array);
 
 //after adding a new values
 echo "After add the value:- ";
 echo "<br>";
 for($i=0;$i<=sizeof($array);$i++)
 {
	 echo " Product Id ".$array["Id"][$i]." Product ".$array["Product"][$i]." Quantity ".$array["Quantity"][$i];
	 echo "<br>";
 }


echo "<br>";
echo " Session Values";
echo "<br>";
$array1=$_SESSION['cart'];
echo count($array1['Product']);
print_r($array1);

$index=2;
array_splice($array1['Product'], $index, 1);
array_splice($array1['Quantity'], $index, 1);
array_splice($array1['Vendor'], $index, 1);

print_r($array1);
//array_splice($array, 2, 1);
// for($i=0;$i<=sizeof($array1);$i++)
 // {
	 // echo " Product Id ".$array1["Id"][$i]." Product ".$array1["Product"][$i]." Quantity ".$array1["Quantity"][$i];
	 // echo "<br>";
 // }
 
?>