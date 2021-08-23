<?php require_once('dbinfo.php');

	// Delete from tbl_cars
	$id=$_REQUEST['id'];
    $ds="DELETE FROM user_create WHERE id='$id'";
    $Eds=mysqli_query($conn,$ds);
	
	header('location: user_create_view.php');

?>