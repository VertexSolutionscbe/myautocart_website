<?php
include("dbinfo.php");

// if(($_POST["inputs"])) {
	if($_POST["inputs"]==1){
?>	
<?php
                    $cor1="SELECT count(*) as count FROM `tbl_service_appointment` WHERE `appointment_date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND vendor_id='".$_POST['inputs1']."' AND booking_status='Service_Booked'";
					$Ecor1=mysqli_query($conn,$cor1);
					$FEcor1=mysqli_fetch_array($Ecor1);                        
					echo $total=$FEcor1['count'];
					?>
<?php }else if($_POST["inputs"]==2) {?>

<?php
                    $cor1="SELECT count(*) As 'count' FROM `tbl_service_appointment` WHERE `appointment_date` >= DATE_SUB(CURDATE(), INTERVAL 31 DAY) AND vendor_id='".$_POST['inputs1']."' AND booking_status='Service_Booked'";
					$Ecor1=mysqli_query($conn,$cor1);
					$FEcor1=mysqli_fetch_array($Ecor1); 

					
					echo $total=$FEcor1['count'];
					?>
<?php }else if($_POST["inputs"]==3) { ?>
<?php
                    $cor1="SELECT count(*) As 'count' FROM `tbl_service_appointment` WHERE `appointment_date` >= DATE_SUB(CURDATE(), INTERVAL 92 DAY) AND vendor_id='".$_POST['inputs1']."' AND booking_status='Service_Booked'";
					$Ecor1=mysqli_query($conn,$cor1);
					$FEcor1=mysqli_fetch_array($Ecor1);               
					echo $total=$FEcor1['count'];
					?>
<?php } ?>
<?php //} ?>
	