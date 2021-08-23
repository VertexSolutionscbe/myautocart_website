<?php require_once('header.php'); ?>
<?php
	// Delete from tbl_products
	$id=$_REQUEST['id'];
	
	$statement = $pdo->prepare("DELETE FROM tbl_packages_services WHERE id=?");
	$statement->execute(array($_REQUEST['id'])); 
		
    $id=$_REQUEST['id']; 
	$pgno=$_REQUEST['pgno']; 
	
	header("location: service_package.php");
	
	//header("location: service_package_edit.php?id=$id&&pgno=$pgno");
?>
		
	
      