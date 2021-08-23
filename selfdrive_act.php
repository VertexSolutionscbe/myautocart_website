	  <?php
	   include('admin/dist/dbinfo.php'); 
	   include('admin/dist/config.php'); 
	   session_start();
	
	 		    ob_start();
				
	 if($_SESSION['customer_id']=='')
    {	   
	  header('location: signin.php');
    }else{   	
				
				$valid=1;
				
	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];
	
	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
	
	if($valid == 1) {

		// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_selfdrive'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
		echo	$ai_id=$row[10];
		}
	

	     // uploading the photo into the main location and giving it a final name
		$final_name = 'SD-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'admin/dist/uploads/selfdrive/'.$final_name );

	    echo  $st="INSERT INTO tbl_selfdrive set mobile='".$_POST['mobile']."',customer_id='".$_SESSION['customer_id']."',fname='".$_POST['fname']."',lname='".$_POST['lname']."',address='".$_POST['address']."',city='".$_POST['city']."',state='".$_POST['state']."',pincode='".$_POST['pincode']."',id_proof='$final_name',from_date='".$_POST['from_date']."',to_date='".$_POST['to_date']."',pickup_city='".$_POST['pickup_city']."',vehicle_type='".$_POST['vehicle_type']."',status='Booked'";
		 $Est=mysqli_query($conn,$st); 

	      header("location: selfdrive_finished.php");
}
	}

	 ?> 