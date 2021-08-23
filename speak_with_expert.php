        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->

		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Enquiry | myautocart</title>      
          <meta name="description" content="Buy New Cars in India at best price. Buy Used Cars in India at unbelievable price at MyAutoCart. Buy wash,Service Equipment and Book Service online">
	   
	      <link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>
		  
		  <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-159623414-1');
            </script>

        
        <!--================Categories Banner Area =================-->
       <!-- <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Contact</h3>
                    <ul>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>-->
		<section class="speak_with_expert_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Speak With Expert</h3>
                    <ul>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contactus.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                    <h1>Speak with Expert</h1>
                </div>
	    </head>
		<?php

			 $result1 = $_REQUEST['cid'];
			 $result2 = $_REQUEST['pid'];
		
		  ?>
            
                <div class="contact_form_inner">
                    <form class="contact_us_form row" action="speak_with_expert_finished.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="form-group col-lg-4">
						<label><b>Customer Name : </b></label>
                            <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Full Name ">
                        </div>
						
                   
						
                        <div class="form-group col-lg-4">
						<label><b>Phone Number : </b></label>
                            <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Phone Number">
                        </div>
						
						<div class="form-group col-lg-4" hidden>
						<label><b>Category Name : </b></label>
                            <input type="text" class="form-control" name="category_id" id="category_id" value="<?php echo $result1; ?>" placeholder="Category ID">
                        </div>	
						
						<div class="form-group col-lg-4" hidden>
						<label><b>Product Name : </b></label>
                            <input type="text" class="form-control" name="product_id" id="product_id" value="<?php echo $result2; ?>" placeholder="Prouct ID">
                        </div>
						
						   <div class="form-group col-sm-4"  hidden>
                  <label for="date"><b> Date</b></label>
                 <input type="date" name="date" class="form-control pull-right" id="date" value="<?php echo date('Y-m-d'); ?>" onKeyPress="return tabE(this,event)">
                </div>
                       <div class="form-group col-lg-12">
                            <button type="submit" name="form1"  class="btn update_btn form-control">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		