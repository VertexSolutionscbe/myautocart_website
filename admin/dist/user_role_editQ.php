<?php 
include('dbinfo.php');
include("config.php");
?>
<?php
 $role_id=$_POST['role_id'];

 $in="update user_role set role_name='".$_POST['role_name']."',status='".$_POST['status']."' where role_id='".$_POST['role_id']."'";
 $Ein=mysqli_query($conn,$in);

//to run PHP script on submit
if(!empty($_POST['check_list']))
{
	$dp="delete from role_pages where role_id='".$role_id."'";
	$Edp=mysqli_query($conn,$dp);
	
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";

 $iu="insert into role_pages set role_id='".$role_id."',pageno='".$selected."'";
$Eiu=mysqli_query($conn,$iu);
$iid1=mysqli_insert_id($conn);


if(!empty($_POST['check_listi'.$selected]))
{
	$ru1="update role_pages set CreateData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_liste'.$selected]))
{
	$ru1="update role_pages set EditData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listd'.$selected]))
{
	$ru1="update role_pages set DeleteData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listv'.$selected]))
{
	$ru1="update role_pages set ViewData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}



//Select parent
 $sp="select parent from leftbar_menu where id='".$selected."'";
$Esp=mysqli_query($conn,$sp);
$FEsp=mysqli_fetch_array($Esp);

  $spu="select id from role_pages where role_id='".$_POST['role_id']."' AND pageno='".$FEsp['parent']."'";
$Espu=mysqli_query($conn,$spu);
$nr=mysqli_num_rows($Espu);
if($nr<1)
{
	//echo "</br>";
	$iu="insert into role_pages set role_id='".$_POST['role_id']."',pageno='".$FEsp['parent']."'";echo "</br>";
	$Eiu=mysqli_query($conn,$iu);
	$iid2=mysqli_insert_id($conn);
	
	
	if(!empty($_POST['check_listi'.$selected]))
{
	$ru1="update role_pages set CreateData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_liste'.$selected]))
{
	$ru1="update role_pages set EditData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listd'.$selected]))
{
	$ru1="update role_pages set DeleteData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listv'.$selected]))
{
	$ru1="update role_pages set ViewData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
}
}
}
header("location:user_role_view.php?msg=1");
?>