<?php
  include('dbinfo.php');
  include('config.php');
?>
<?php
$id=$_REQUEST['id'];

$dq="UPDATE `tbl_seo_tags` SET status='Inactive' WHERE id='".$id."'";
$Edq=mysqli_query($conn,$dq);

header("location:setting.php");
?>