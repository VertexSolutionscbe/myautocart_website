<?php require_once('dbinfo.php');

	// Delete from tbl_cars
	$id=$_REQUEST['id'];
    $ds="DELETE FROM user_role WHERE role_id='$id'";
    $Eds=mysqli_query($conn,$ds);
	
	header('location: user_role_view.php?success=Data Deleted Sucessfully');

?>