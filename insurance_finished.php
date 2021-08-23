<!--- Header Area --->
<?php 
//session_start();
include('header.php');
$imageurl="admin/dist/uploads/";
?>
<!--- Header Area End --->

		<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>Insurance Finished | MyAutoCart</title>        
         <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">  
		 <meta name="viewport" content="width=20px, initial-scale=1">
         <meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" /> 

         <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
		 <!-- <link rel="icon" href="admin/dist/img/favicon.png" type="image/x-icon" />
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->       

         <!-- Icon css link -->
         <link href="css/font-awesome.min.css" rel="stylesheet">
         <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
         <link href="vendors/elegant-icon/style.css" rel="stylesheet">
         <!-- Bootstrap -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
        
         <!-- Rev slider css -->
         <link href="vendors/revolution/css/settings.css" rel="stylesheet">
         <link href="vendors/revolution/css/layers.css" rel="stylesheet">
         <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
         <!-- Extra plugin css -->
         <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
         <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
         <link href="vendors/vertical-slider/css/jQuery.verticalCarousel.css" rel="stylesheet">
        
         <link href="css/style.css" rel="stylesheet">
         <link href="css/responsive.css" rel="stylesheet">
		
		 <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/> 
		
         <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
         <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
        </head>
        <!--- Heade Area End --->
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
        <section class="insure_finish_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Get Insurance</h3>
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
<td colspan="5" ><div id="addmsg" style="color: green">Our Insurance Team Will Get Back To You Shortly...</div></td>
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