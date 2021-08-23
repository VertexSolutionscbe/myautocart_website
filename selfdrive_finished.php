        <!--- Header Area --->

<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
		  ?>
		  
	  <?php

	


    // $path = $_FILES['photo']['name'];
	
	
	// if($path!='') {
        // $ext = pathinfo( $path, PATHINFO_EXTENSION );
        // $file_name = basename( $path, '.' . $ext );
        // if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            // $valid = 0;
            // $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        // }
    // } 


		/* getting auto increment id for photo renaming */
		// $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_selfdrive'");
		// $statement->execute();
		// $result = $statement->fetchAll();
		// foreach($result as $row) {
			// $ai_id=$row[10];
		// }
		 
	// select the path
// $dir = "admin/dist/uploads/rc/".$ext;
// $files=mkdir($dir);

/* Upload the RC Photo Photo */
  // $target_dir = "$dir/$files";
// $target_file = $target_dir . basename($_FILES["photo"]["name"]);
// $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// $nname = mt_rand();
 // $upath=$target_dir . $nname.".".$extension;
 // $iupath=$target_dir . $nname.".".basename($_FILES["photo"]["name"]); 
// move_uploaded_file($_FILES["photo"]["tmp_name"], $upath); 
		 


		/* uploading the photo into the main location and giving it a final name */
	    // $final_name = 'SD-'.$ai_id.'.'.$ext;
        // move_uploaded_file( $path_tmp, 'admin/dist/uploads/selfdrive/'.$final_name );
		

	      // $st="INSERT INTO tbl_selfdrive set mobile='".$_POST['mobile']."',customer_id='".$_SESSION['cust_id']."',fname='".$_POST['fname']."',lname='".$_POST['lname']."',id_proof='$final_name',city='".$_POST['city']."',state='".$_POST['state']."',pincode='".$_POST['pincode']."',from_date='".$_POST['from_date']."',to_date='".$_POST['to_date']."',pickup_city='".$_POST['pickup_city']."',vehicle_type='".$_POST['vehicle_type']."',status='Booked'";
		 // $Est=mysqli_query($conn,$st); 

	     // header("location: selfdrive_finished.php");
	    
	 

	 ?>
	    <!--- Header Area End --->
 
        <!--================Categories Banner Area =================-->
        <section class="selfdriv_finished_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Self Drive in India</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li hidden><a href="#">New Cars</a></li>
                        <li class="current"><a href="#">New Cars</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
			<?php 
			if(!isset($_REQUEST['m']))
			{
			?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_product_list">
                            <div class="table-responsive-md">
                                <table class="table">
                             
                                    <tbody>


                            
<?php 
$CartTotal=$CartTotal+$total;
} 
if($la==0)
{
?>
<tr>
<td colspan="5" ><div id="addmsg" style="color: green">Our  Team Will Get Back To You Shortly...</div></td>
</tr>
<?php } ?>									
									
									</tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                 
                </div>
				<?php 
			if(isset($_REQUEST['m']))
			{
			?>

			<?php } ?>
            </div>
        </section>
        <!--================End Shopping Cart Area =================-->
        
        <!--- Footer Area --->
		   <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		<style>
.thumb-img-shopcart {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 110px; /* Set a small width */
}


</style>