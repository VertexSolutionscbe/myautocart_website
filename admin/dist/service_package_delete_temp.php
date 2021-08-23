<?php require_once('header.php'); ?>
<?php
	// Delete from tbl_products
	$statement = $pdo->prepare("DELETE FROM tbl_package_service_temp WHERE id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: service_package_add.php');
?>	