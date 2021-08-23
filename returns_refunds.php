        <!--- Header Area --->
	      <?php include('header.php'); ?>
	    <!--- Header Area End --->

		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Returns & Refunds | myautocart</title>      
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
	    </head>
        
        <!--================Categories Banner Area =================-->      
		<section class="returns_refunds_banner_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3 hidden>Terms & Conditions</h3>
                    <ul hidden>
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
                <div class="contact_title" hidden>
                  <h1>Track Your Order</h1>
				  <div>&nbsp;</div>
                </div>				
                <div class="col-lg-12" hidden>
                 <div class="contact_form_inner">
                    <form class="contact_us_form row" action="order_tracking_finished.php" method="post" id="contactForm">
                        <div class="form-group col-lg-4">
						<label><b>Order Number: </b></label>
                            <input type="ematextil" class="form-control" id="order_no" name="order_no" placeholder="Your Order Number" required>
                        </div>
						
           
                        <div class="form-group col-lg-12">
                            <button type="submit" name="form1"  class="btn update_btn form-control">Track</button>
                        </div>
                    </form>
                 </div>
			   </div>	
            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		