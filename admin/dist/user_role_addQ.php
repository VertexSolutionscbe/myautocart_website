 <?php
  include('dbinfo.php');
  include('config.php');
 ?> 
<?php 

$Es="select * from user_role where role_name='".$_POST['role_name']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps); 

if($duplicate==0)
{
$in="insert into user_role set role_name='".$_POST['role_name']."',status='Active'";
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);

//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";

 $iu="insert into role_pages set role_id='$id',pageno='".$selected."'";
 $Eiu=mysqli_query($conn,$iu);
 $iid1=mysqli_insert_id($conn);


if(isset($_REQUEST['check_listi'.$selected]))
{
	$ru1="update role_pages set CreateData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_liste'.$selected]))
{
	$ru1="update role_pages set EditData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listd'.$selected]))
{
	$ru1="update role_pages set DeleteData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listv'.$selected]))
{
	$ru1="update role_pages set ViewData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
//echo $_REQUEST['check_listi'.$selected];

//Select parent
$sp="select parent from leftbar_menu where id='".$selected."'";
$Esp=mysqli_query($conn,$sp);
$FEsp=mysqli_fetch_array($Esp);

$spu="select id from role_pages where pageno='".$FEsp['parent']."'";
$Espu=mysqli_query($conn,$spu); 
$nr=mysqli_num_rows($Espu);
if($nr<1)
{
 	$iu="insert into role_pages set pageno='".$FEsp['parent']."'";
	$Eiu=mysqli_query($conn,$iu);
	$iid2=mysqli_insert_id($conn); 
	
if(isset($_REQUEST['check_listi'.$selected]))
{
	$ru1="update role_pages set CreateData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_liste'.$selected]))
{
	$ru1="update role_pages set EditData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listd'.$selected]))
{
	$ru1="update role_pages set DeleteData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listv'.$selected]))
{
	$ru1="update role_pages set ViewData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}	
	
  }
 }
}

header("location:user_role_view.php?success=Data Saved Sucessfully");
}
else
{
	header("location:user_role.php?warning=Already Exits");
}
?>