<?php include('admin/dist/dbinfo.php'); ?>

<?php
$tvs="SELECT * FROM tbl_vendor_services Where id='".$_REQUEST['pid']."'";
$Etvs=mysqli_query($conn,$tvs);
$FEtvs=mysqli_fetch_array($Etvs);

/* echo $tp="SELECT * FROM `tbl_products` WHERE product_id=".$_REQUEST['pid']."";
$Etp=mysqli_query($conn,$tp);
$FEtp=mysqli_fetch_array($Etp); exit;

$tv="SELECT * FROM `tbl_vendor_products` WHERE product_id=".$FEtp['product_id']."";
$Etv=mysqli_query($conn,$tv);
$FEtv=mysqli_fetch_array($Etv); */

$tc="SELECT * FROM `tbl_category` WHERE category_id=".$FEtvs['category_id']."";
$Etc=mysqli_query($conn,$tc);
$FEtc=mysqli_fetch_array($Etc);
 
$query="INSERT INTO tbl_service_wishlist SET category_id=".$FEtc['category_id'].", service_id=".$FEtvs['service_id'].", vendor_id=".$FEtvs['vendor_id'].", vendor_services_id=".$FEtvs['id'].", customer_id='".$_REQUEST['custid']."'";
$Equery=mysqli_query($conn,$query);
		
header ('location:car_detailing.php?cid=16&cname=Car Detailing');
?>