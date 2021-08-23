        <!--- Header Area --->
	      <?php include('header.php'); 
		  $imageurl="admin/dist/uploads/";
		  ?>	  
	    <!--- Header Area End --->
	<script>	
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
	</script>
	
		<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">      
		 <title>Order History | MyAutoCart</title>      
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
		
		  <style>
		   #loading
		    {
			  text-align:center;
			  background: url('loader.gif') no-repeat center;
			  height: 150px;
		   }		  
		  </style>
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
		    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>          	    
				
        <!--================Categories Banner Area =================-->
        <section class="order_history_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Order History</h3>
                     <ul>
                       <li><a href="index.php">Home</a></li>                                       
                     </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->					
        
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                  <h1>Order History</h1>
				   <div>&nbsp;</div>
				  <h3 align="left">Order Details</h3>
                </div>				 
            			 	
                <div class="row">
                    <div class="col-lg-12">
					   <?php
					    $cn="SELECT * FROM `tbl_customer` WHERE customer_id='".$_SESSION['customer_id']."'";
						$Ecn=mysqli_query($conn,$cn);
						$FEcn=mysqli_fetch_array($Ecn);
					   ?>
					   <h5>Customer Name <b style="color:red;"><?php echo $FEcn['f_name']; ?></b></h5>
                        <div class="cart_product_list">                           
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
											<th scope="col">Order Date</th>											
											<th scope="col">Category</th>
											<th scope="col">product</th>
                                            <th scope="col">product Model</th>
                                            <th scope="col">price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php																	
                                         if($_SESSION['customer_id']>0) 
                                          { 
                                          $i=0;
										  
		                                  $oh="SELECT * FROM `tbl_confirm_orders` WHERE customer_id=".$_SESSION['customer_id']."";
		                                  $Eoh=mysqli_query($conn,$oh);
		                                  while($FEoh=mysqli_fetch_array($Eoh)){

											 $pd="SELECT * FROM `tbl_products` WHERE product_id=".$FEoh['product_id']."";
											 $Epd=mysqli_query($conn,$pd);
											 $FEpd=mysqli_fetch_array($Epd);											  
											 
											 $photo=$imageurl.$FEpd['photo'];
											 $total=$FEoh['qty'] * $FEoh['amount'];
											  
											 /* $pv="SELECT * FROM `tbl_vendor_products` WHERE product_id=".$FEoh['product_id']."";
											 $Epv=mysqli_query($conn,$pv);
											 $FEpv=mysqli_fetch_array($Epv);											  											 
											  
											 $svn="select vendor_name from tbl_vendor WHERE vendor_id='".$FEoh["vendor_id"]."'";
	                                         $Esvn=mysqli_query($conn,$svn);
	                                         $FEsvn=mysqli_fetch_array($Esvn);

											 $total=$FEoh['quantity'] * $FEpv['amount']; */
											 
											 $pc="SELECT * FROM `tbl_category` WHERE category_id=".$FEoh["category_id"]."";
											 $Epc=mysqli_query($conn,$pc);
											 $FEpc=mysqli_fetch_array($Epc);
										 
										 $i++;
		                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $FEoh['order_date']; ?></td>											
											<td><?php echo $FEpc['category_name']; ?></td>
											<td>
											 <div class="d-flex">
                                               <img src="<?php echo $photo; ?>" alt="" style="width:110px">
                                             </div>
											</td>
                                            <td>
                                             <div class="media">                                                  
                                               <div class="media-body">
											      <a href="product-details-vendor.php?pid=<?php echo $FEpv["product_id"]; ?>&vid=<?php echo $FEpv["vendor_id"]; ?>&pvid=<?php echo $FEpv["id"]; ?>">
													<h4><?php echo $FEpd['product_title']; ?></h4>
												    <h6><?php echo $FEsvn['vendor_name'];?></h6>
												  </a>	
                                               </div>
                                             </div>
                                            </td>
                                            <td><p><?php echo $FEoh['amount']; ?></p></td>
                                            <td><input id="" name="" type="text" value="<?php echo $FEoh['qty']; ?>"></td>
                                            <td><p><?php echo $total; ?></p></td>
                                        </tr>
										 <?php  } 										 
										  } else { 
										 ?>										 
                                        <tr>
                                          <td colspan="5" ><div id="addmsg" style="color: red">Your Order History is Empty !</div></td>
                                        </tr> 
                                        <?php } ?>							
									</tbody>
                                </table>
                            </div>
                        </div>                      
                    </div>                    				
				</div>			

				
            </div>
        </section>
        <!--================End Contact Area =================-->
        

        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	      