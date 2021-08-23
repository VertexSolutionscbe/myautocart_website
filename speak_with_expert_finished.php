        <!--- Header Area --->

<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
		  ?>
	    <!--- Header Area End --->
				   <?php
	 if(isset($_POST['form1'])) {
	 $valid = 1;

		 
		$statement = $pdo->prepare("INSERT INTO  tbl_enquiry (date,cust_name,mobile,category_id,product_id) VALUES (?,?,?,?,?)");
		$statement->execute(array($_POST['date'],$_POST['cust_name'],$_POST['mobile'],$_POST['category_id'],$_POST['product_id']));
		
       
	   }

	 ?>
 	 
        <!--================Categories Banner Area =================-->
         <title>Enquiry | myautocart</title>
		 
		<section class="swe_finish_banner_area">		
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Speak With Expert</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="insurance.php">Insurance</a></li>
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
<td colspan="5" ><div id="addmsg"  style="color: green ">Thanks For Your Interest With My AutoCart.Our Expert Will Contact You Soon...</div></td>
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