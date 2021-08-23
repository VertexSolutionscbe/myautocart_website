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
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>New Cars in India,New Cars Price,Images & Reviews | MyAutoCart</title>      
          <meta name="description" content="MyAutoCart is best place to buy New Cars in India. We have largest collections of all latest cars in India. Buy Best New Cars in India at MyAutoCart">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
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
	    </head>
				
        <!--================Categories Banner Area =================-->
        <section class="booked_selfdrive_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Booked Self Drive History</h3>
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
                  <h1>Booked Service History</h1>
				   <div>&nbsp;</div>
				  <h3 align="left">Booked Service Details</h3>
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
											<th scope="col"> Booked Customer Name</th>
											<th scope="col">Mobile</th>
											<th scope="col">City</th>											
											<th scope="col">From Date</th>
											<th scope="col">To Date</th>											
											<th scope="col">Vehicle Type</th>                                           
											<th scope="col">Status</th>                                           
                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php																	
                                         if($_SESSION['customer_id']>0) 
                                          { 
                                          $i=0;
										  
										  $sa="SELECT * FROM `tbl_selfdrive` WHERE customer_id='".$_SESSION['customer_id']."' order by id desc ";
										  $Esa=mysqli_query($conn,$sa);
		                                  while($FEsa=mysqli_fetch_array($Esa)){											  
											  										  											  											  											  											  
											  $svn="select * from tbl_segment WHERE id='".$FEsa["vehicle_type"]."'";
	                                          $Esvn=mysqli_query($conn,$svn);
	                                          $FEsvn=mysqli_fetch_array($Esvn);																					  											 											 										 
											 
													  
										 
										 $i++;
		                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $FEsa['fname']; ?></td>
											<td><?php echo $FEsa['mobile']; ?></td>
											<td><?php echo $FEsa['city']; ?></td>
				                            <td><?php echo date("d-m-Y", strtotime($FEsa ['from_date']));?></td>
				                            <td><?php echo date("d-m-Y", strtotime($FEsa ['to_date']));?></td>
											<td><?php echo $FEsvn['segment']; ?></td>
											<td><?php echo $FEsa['status']; ?></td>											                                           
                                 
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