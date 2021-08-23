<?php include('admin/dist/dbinfo.php'); ?>

<?php
$tp="SELECT * FROM `tbl_products` WHERE product_id=".$_REQUEST['pid']."";
$Etp=mysqli_query($conn,$tp);
$FEtp=mysqli_fetch_array($Etp);

 $tv="SELECT * FROM `tbl_spares` WHERE spare_name=".$FEtp['product_title']."";
$Etv=mysqli_query($conn,$tv);
$FEtv=mysqli_fetch_array($Etv);



$tc="SELECT * FROM `tbl_category` WHERE category_id=".$FEtp['category_id']."";
$Etc=mysqli_query($conn,$tc);
$FEtc=mysqli_fetch_array($Etc);
 
echo $query="INSERT INTO tbl_wishlist SET category_id=".$FEtp['category_id'].", product_id='".$FEtp['product_id']."', vendor_id='".$FEtp['vendor_id']."', customer_id='".$_REQUEST['custid']."',status='Active'";
$Equery=mysqli_query($conn,$query);
		
 header ('location:car-spares.php?cid=12&cname=New Car Spares');
?>