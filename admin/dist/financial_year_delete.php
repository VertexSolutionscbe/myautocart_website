<?php require_once('header.php'); ?>

<?php
$id=$_REQUEST['id'];

$dl="DELETE FROM `financial_year` WHERE id='".$id."'";
$Edl=mysqli_query($conn,$dl);

header('location:financial_year.php');


?>