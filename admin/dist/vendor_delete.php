<?php require_once('header.php'); ?>

<?php
// if(!isset($_REQUEST['id'])) {
	// header('location: logout.php');
	// exit;
// } else {
	// //Check the id is valid or not
	// $statement = $pdo->prepare("SELECT * FROM tbl_model WHERE id=?");
	// $statement->execute(array($_REQUEST['id']));
	// $total = $statement->rowCount();
	// if( $total == 0 ) {
		// header('location: logout.php');
		// exit;
	// }
// }
?>

<?php
	
	// Getting photo ID to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM tbl_vendor WHERE vendor_id=?");
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
	$statement = $pdo->prepare("DELETE FROM tbl_vendor WHERE vendor_id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: vendor.php');