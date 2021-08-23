<?php
  include('dbinfo.php');
  include('config.php');
?>
<?php
 //if(isset($_POST['form1'])) {
 $id=$_REQUEST['id'];
 
 $qry="UPDATE tbl_seo_tags SET webpage='".$_POST['webpage']."',title_tag='".$_POST['title_tag']."',metta_content='".$_POST['metta_content']."',status='Active' WHERE id='$id'";
 $Eqry=mysqli_query($conn,$qry);
 
// }
 header("location:setting_tagedit.php?uid=$id");
?>
