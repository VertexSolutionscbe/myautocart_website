<?php
ob_start();
session_start();
include('dbinfo.php'); 
include("config.php");

   $g="SELECT * FROM user_create WHERE phone='".$_POST['phone']."' AND password='".$_POST['password']."'";
   //$g="select * from user_create where user_name='".$_POST['username']."' and password='".$_POST['password']."'"; 
   $Eg=mysqli_query($conn,$g); 
   $n=mysqli_num_rows($Eg); 

   if($n>=1) {
   $Fg=mysqli_fetch_array($Eg);
    // Rember me function    
    if($Fg){
		
		 if($_POST['remember']!=''){
			setcookie("phone",$_POST['phone'],time()+(10*365*24*60*60));
			setcookie ("password",$_POST['password'],time()+(10*365*24*60*60));
		 }
		 else{
			if($_COOKIE['phone']){
			setcookie('phone','');					
			}
		    if($_COOKIE['password']){
			setcookie('password','');					
			}		
		 }
		 header("location:index.php");
	 }	          
    // Rember me function end
   $sc21="select * from user_role where role_name='".$Fg['user_role']."'";
   $Esc21=mysqli_query($conn,$sc21);
   $FEsc21=mysqli_fetch_array($Esc21);
   
     $vd="SELECT * FROM `tbl_vendor_types` WHERE id='".$Fg['vendor_type_id']."'";
	 $Evd=mysqli_query($conn,$vd);
	 $FEvd=mysqli_fetch_array($Evd);

       $_SESSION['email']=$_POST['email'];
       $_SESSION['phone']=$_POST['phone'];
       $_SESSION['user']=$Fg['user_name'];	  
       $_SESSION['role_name']=$FEsc21['role_id'];	  
       $_SESSION['user_role']=$Fg['user_role'];
       $_SESSION['user_create_id']=$Fg['id'];
       $_SESSION['photo']=$Fg['photo'];
       $_SESSION['bio']=$Fg['bio'];	
       $_SESSION['vendor_type']=$FEvd['vendor_type'];

       $sc="select * from tbl_vendor where vendor_id='".$Fg['company_name']."'";
       $Esc=mysqli_query($conn,$sc);
       $FEsc=mysqli_fetch_array($Esc);

       $_SESSION['UserId']=$Fg['id'];
       $_SESSION['VendorId']=$Fg['company_name'];
       $_SESSION['VendorName']=$FEsc['vendor_name']; 
       $_SESSION['UserRole']=$Fg['user_role'];
	   
      header("location:index.php");
      } else {
      header("location:login.php?m=1");
    } 
?>