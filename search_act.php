<?php  
  include("admin/dist/dbinfo.php");
  include("admin/dist/config.php");

 if($_POST['searchname']!=''){ 
		
	 $letters = $_POST['searchname'];
     $letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	           
	 $qr="SELECT product_title,product_id FROM tbl_products WHERE product_title like '%".$letters."%'";
	 $Eqr=mysqli_query($conn,$qr);			
	 while($EFqr = mysqli_fetch_array($Eqr)){
		
	 /* strtoupper($EFqr["product_id"])."###".strtoupper($EFqr["product_title"])."|";	 	 */ 	 	
	
	 header("location:index.php?pname=%$letters%"); 
	
	 }
	
 }else { 
    
	 $qp="select * from  tbl_products where product_status='Active' order by product_title limit 0,15";
     $Eqp=mysqli_query($conn,$qp);
	 $EFqp = mysqli_fetch_array($Eqp);
		
     header("location:index.php?pname=");
	 
      }
    
?>