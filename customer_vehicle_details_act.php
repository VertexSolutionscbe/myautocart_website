<?php
ob_start();
session_start();
include("admin/dist/dbinfo.php");
include("admin/dist/config.php"); 
error_reporting(0); 
?>
 <?php
	 if(isset($_POST['form1'])) {
		 
		 
		$vd="INSERT INTO tbl_cust_service_vehicle_details SET customer_id='".$_POST['customer_id']."', service_order_no='".$_POST['service_order_no']."', category_id='".$_POST['category_id']."',vendor_id='".$_POST['vendor_id']."', appointment_date='".$_POST['appointment_date']."', appointment_time='".$_POST['appointment_time']."', vendor_service_id='".$_POST['vendor_service_id']."', amount='".$_POST['s_amount']."', vehicle_no='".$_POST['vehicle_no']."', vehicle_type='".$_POST['vehicle_type']."', make_brand='".$_POST['make_brand']."', model='".$_POST['make_model']."', version='".$_POST['version']."', segment_id='".$_POST['segment_id']."', year='".$_POST['year']."'";		     		   	     
	    $Evd=mysqli_query($conn,$vd);
        $id=mysqli_insert_id($conn); 
	

       
		
		$sid=$_POST['appointment_id'];

	     header("location:customer_vehicle_details.php?id=$sid"); 	 
	}else{
	
	/*  if(isset($_POST['form2'])) { */
	
		 
		$se="SELECT * FROM tbl_cust_service_vehicle_details WHERE vehicle_no='".$_POST['vehicle_no']."'";
		$Ese=mysqli_query($conn,$se);
		$FEse=mysqli_fetch_array($Ese);		
		
		$ng="select * from tbl_number_generate where Id=1";
        $Eng=mysqli_query($conn,$ng);
        $FEng=mysqli_fetch_array($Eng);

        $invno=INV."-".$FEng['sinv'];		
		
		$cgst=$_POST['gst_amount']/2;
		$sgst=$_POST['gst_amount']/2;
		
		
	 	$qrn="INSERT INTO tbl_service_invoice_details SET inv_no='".$invno."', appointment_id='".$FEse['id']."', service_order_no='".$_POST['service_order_no']."',vehicle_no='".$FEse['vehicle_no']."',model='".$FEse['model']."',appointment_date='".$_POST['appointment_date']."',appointment_time='".$_POST['appointment_time']."',vendor_id='".$_POST['vendor_id']."',vendor_service_id='".$_POST['vendor_service_id']."',category_id='".$_POST['category_id']."',taxable_amount='".$_POST['s_amount']."',amount='".$_POST['total_amount']."',customer_id='".$_SESSION['customer_id']."',status='Active',gst_per='".$_POST['gst_per']."',gst_amount='".$_POST['gst_amount']."',cgst='".$cgst."',sgst='".$sgst."'";		     		   	     
	    $Eqrn=mysqli_query($conn,$qrn);
        $idd=mysqli_insert_id($conn);

        $ug="update tbl_number_generate set sinv=sinv+1 where Id=1";
        $Eug=mysqli_query($conn,$ug); 	
		
		 $pp="select * from tbl_number_generate where id='1'";
        $Epp=mysqli_query($conn,$pp);
        $Fpp=mysqli_fetch_array($Epp);
	   	    
		$sono=MY."-".$Fpp['son'];

        $upj="update tbl_number_generate set son=son+1 where id='1'"; 
        $upw=mysqli_query($conn,$upj);	
		
//My-Autocart_tidi start
     /* $host_name = "localhost";
                $user_name= "root";
                $password= "";
               $database2 = "tidi_web"; */
			   
			      $host_name = "localhost";
                $user_name= "tidi";
                $password= "^wGqEHRqRVnt";
               $database2 = "tidi";
                   $tidi = mysqli_connect($host_name, $user_name, $password) or die("cannot connect"); 
                   mysqli_select_db($tidi, $database2) or die("cannot select DB");
				   
     $sql1 = "INSERT INTO myautocart_service_bookings SET vehicle_number='".$_POST['vehicle_no']."',service_order_no='".$_POST['service_order_no']."',vendor_id='".$_POST['vendor_id']."',appointment_date='".$_POST['appointment_date']."',appointment_time='".$_POST['appointment_time']."',user_id='".$_POST['vendor_id']."',vendor_service_id='".$_POST['vendor_service_id']."',category_id='".$_POST['category_id']."',customer_id='".$_SESSION['customer_id']."',status='Active'"; 
    $sqli=mysqli_query($tidi,$sql1); 
//Close connection 
$tidi->close(); 
//My-Autocart_tidi end

		 
		   header("location:services_pdftomail/invoice.php?id=$idd"); 
	 }
	
	