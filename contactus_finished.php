        <!--- Header Area --->

<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
		  ?>
	    <!--- Header Area End --->
		<?php
		    $to = "nazeer.sheik@vertexsolution.co.in";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $mobile = $_REQUEST['mobile'];
    $subject = "Enquiry";
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . 'sales@myautocart.com' . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "MyAutoCart Enquiry .";


	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td></br>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td></br>";
	$body .= "<td style='border:none;'><strong>Mobile Number:</strong> {$mobile}</td></br>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
		
 if(isset($_POST['form1'])) {
	 $valid = 1;

	    $statement = $pdo->prepare("INSERT INTO tbl_contactus (name,email,mobile,message) VALUES (?,?,?,?)");
		$statement->execute(array($_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['message']));

   
header("location: contactus_finished.php");
    }
?>
       <script type="text/javascript">
function RemoveCart(ind){ 
     var indexid = ind;     
	 var taskname="RemoveCart";
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
        data: {index: indexid,task:taskname},
        success:function(msg){
        //    your message will come here.  
        //document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart !";
        //alert("Item Deleted .Please Refresh Page!");
		location.reload();
       }
 });

}
function UpdateCart(ind,pid,qty,vid1,pvid1){ 
      var indexid = ind;     
	  var taskname="UpdateCart";
	  var productid = pid;
	  var vendorid=vid1;
	  var quantity=document.getElementById("scqty"+qty).value;
	  var pvid=pvid1;
 
$.ajax({
      type:'post',
        url:'aj-productdetails.php',// put your real file name 
		data: {index: indexid,product: productid,quantity: quantity,task:taskname,vendor:vendorid,productvendorid:pvid},
        success:function(msg){
        //    your message will come here.  
        //document.getElementById("addmsg").innerText = qty + " Quatity Added In Your Cart !";
       
		location.reload();
       }
 });

}
function myFunction() {
  // location.replace("register.php")
  var x = confirm("Please Confirm Before Your to Proceed");
  if (x)
	  location.replace("signin.php");
      //return true;
  else
    return false;
  
}
function ClearFunction() {
  // location.replace("register.php")
  //location.replace("clear.php");
  
  var x = confirm("This will Delete All Items In your Cart?");
  if (x)
	  location.replace("clear.php");
      //return true;
  else
    return false;
}
</script>	 
        <!--================Categories Banner Area =================-->
        <section class="contactus_finish_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
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
<td colspan="5" ><div id="addmsg" style="color: green">Our Expert Will Contact You soon...</div></td>
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