 <?php
  include('dbinfo.php');
  include('config.php');
 ?>
<?php
 
 $qry="INSERT INTO tbl_seo_tags SET webpage='".$_POST['webpage']."',title_tag='".$_POST['title_tag']."',metta_content='".$_POST['metta_content']."',status='Active'";
 $Eqry=mysqli_query($conn,$qry);
 $id=mysqli_insert_id($conn); 

 header("location:setting.php");
?>
