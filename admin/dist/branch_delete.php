<?php require_once('header.php'); ?>



<?php
	
	// Getting photo ID to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM tbl_branch WHERE branch_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$photo = $row['photo'];
	}

	// Unlink the photo
	if($photo!='') {
		unlink('../dist/uploads/'.$photo);	
	}

	// Delete from tbl_products
	$statement = $pdo->prepare("DELETE FROM tbl_branch WHERE branch_id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: vendor.php');