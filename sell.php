        <!--- Header Area --->
	      <?php include('header.php'); ?>	   	  
	    <!--- Header Area End --->
		<?php	
		  if($_SESSION['customer_id']=='') {	   
	      header('location: signin.php'); }    
		?>
		<head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">              
          <title>Sell | myautocart</title>      
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
		
<script> 
function getmodel() {
	
    var inputs = document.getElementById('make_brand').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_model.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#v_model").html(data);
		  }
		});
}

function getversion() {
	
    var inputs1 = document.getElementById('make_model').value;
    // alert("edfgjd"+inputs1);
	$.ajax({
	type: "POST",
	
	url: "get_version.php",
	
	data:{inputs1:inputs1},
	success: function(data){
		$("#v_version").html(data);
		  }
		});
}

function myFunction() {
  var x = document.getElementById("divInv");
  var y = document.getElementById("divInv1");
  if (x.style.display === "none") {
    x.style.display = "block";
	y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
       
        <!--================Categories Banner Area =================-->     
		<section class="car_sell_area">
            <div class="container">
                <div class="c_banner_inner">
                    <h3 hidden>Car Sell</h3>
                    <ul hidden>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="contactus.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
		
		
<?php
if (isset($_POST['submit'])) { 
 
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["logo"]["name"]);
$extension = end($temp);

if ((($_FILES["logo"]["type"] == "image/gif")
|| ($_FILES["logo"]["type"] == "image/jpeg")
|| ($_FILES["logo"]["type"] == "image/jpg")
|| ($_FILES["logo"]["type"] == "image/png"))
&& ($_FILES["logo"]["size"] < 2097152)  
&& in_array($extension, $allowedExts)){
  
  if($_FILES["logo"]["error"] > 0){
    echo "Return Code: " . $_FILES["logo"]["error"] . "<br>";
  } else {
    $date = new DateTime(null, new DateTimeZone('America/Los_Angeles'));

    $current_date = $date->getTimestamp();
   
    $file_name = $temp[0] . $current_date;
    
    $file = $file_name.".".$temp[1];
	
	//$file ="http://192.168.1.157/Subhasri/colorlib-regform-4/newfile".$file_name.".".$temp[1];
	   
    move_uploaded_file( $_FILES["logo"]["tmp_name"], "admin/dist/uploads/" .$file);
    //echo "Success";   
   
  }
} else {
    // echo "You have uploaded an invalid file.";
    $error_message = 'You have uploaded an invalid file.';
}

    /* $valid = 1;

    $path = $_FILES['logo']['name'];
    $path_tmp = $_FILES['logo']['tmp_name'];
	 
	 if($path!='') {
        $ext = pathinfo($path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    } 
	
	    // getting auto increment id for logo renaming
		//$inc="SHOW TABLE STATUS LIKE 'tbl_vendor'";
		$inc="SHOW TABLE STATUS LIKE 'tbl_products'";
		$Einc=mysqli_query($conn,$inc);
		while($row=mysqli_fetch_array($Einc)){		
			$ai_id=$row[10];
		}	

     if($path=='') {
    
	    $cp="INSERT INTO tbl_products set category_id='".$_POST['category_id']."',make_brand='".$_POST['make_brand']."',year='".$_POST['year']."',fuel_type='".$_POST['fuel_type']."',
	    tranmission='".$_POST['transmission']."',kms='".$_POST['kms']."',owners_count='".$_POST['owners_count']."',product_title='".$_POST['product_title']."',
	    product_amount='".$_POST['product_amount']."',photo=''"; 
	    $Ecp=mysqli_query($conn,$cp);       
	  
	  }else{
		  
		  // uploading the photo into the main location and giving it a final name
		$final_name = 'Customer Product-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'admin/dist/uploads/'.$final_name); */
		
		$cp="INSERT INTO tbl_products set category_id='".$_POST['category_id']."',product_date='".$_POST['product_date']."',make_brand='".$_POST['make_brand']."',make_model='".$_POST['make_model']."',version='".$_POST['version']."',year='".$_POST['year']."',fuel_type='".$_POST['fuel_type']."',
	    tranmission='".$_POST['transmission']."',kms='".$_POST['kms']."',owners_count='".$_POST['owners_count']."',product_title='".$_POST['product_title']."',
	    product_amount='".$_POST['product_amount']."',photo='".$file."'";
	    $Ecp=mysqli_query($conn,$cp);  			  
	    
		//}
		
	    $success_message = 'Product is added successfully.'; 
     
    }
?>      
       
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                  <h1><i class="fa fa-car" style="color:#D41100;"></i> POST YOUR PRODUCTS</h1>				  
                </div>

            <!-- Success Msg -->
			<?php if($success_message): ?>
			<div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button>  <strong>Success!</strong> <?php echo $success_message; ?></div>                             
            </div>
			<?php endif; ?>
			
			<?php if($error_message): ?>
			<div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button> <strong>Error!</strong> <?php echo $error_message; ?></div>                            
            </div>
			<?php endif; ?>
			<!-- Success Msg End -->
				
               
                <div class="register_inner">
                 <div class="row justify-content-md-left">		
			        
					    <div class="col-lg-6">				  				    	
                             <form class="billing_inner row" method="post" enctype="multipart/form-data">
							    <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Categorie</b> <span>*</span></label>                                    
									<select class="form-control" name="category_id" id="category_id" readonly>									  
                                      <?php 
									   $cg="SELECT * FROM `tbl_category` WHERE category_id='2'";
									   $Ecg=mysqli_query($conn,$cg);
									   while($FEcg=mysqli_fetch_array($Ecg)){
									  ?>
									  <option value="<?php echo $FEcg['category_id']; ?>"><?php echo $FEcg['category_name']; ?></option>												
                                      <?php } ?>
									</select>
                                </div>
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Date</b> <span>*</span></label>
                                    <input class="form-control" type="date" name="product_date" value="<?php echo date('Y-m-d'); ?>" placeholder="Date" required>
                                </div>
								<div class="form-group col-lg-12" hidden>
						         <label><b>Vehicle Type : </b></label>
                                 <select class="form-control" name="vehicle_type" id="vehicle_type">
						           <option>--- Select The Vehice Type ---</option>						           
						           <option value="four_wheeler">Four Wheeler</option>								           
                                 </select>
                                </div>							    
								<div class="col-lg-12 form-group">
						        <label for="f-option"><b>Brands : </b> <span>*</span></label>
                                <select class="form-control" name="make_brand" id="make_brand" onChange="getmodel(this.value);" required>
						          <option>--- Select Brand ---</option>
							      <?php						      
						           $qr="SELECT * FROM tbl_make ORDER BY id ASC";
							       $Eqr=mysqli_query($conn,$qr);
						           while($FEqr=mysqli_fetch_array($Eqr)){							  					      
						          ?>						  
                                  <option value="<?php echo $FEqr['id']; ?>"><?php echo $FEqr['make']; ?></option>                          
						          <?php } ?>
                                </select>
                                </div>
								<div class="box-body">
				                  <div  id="v_model" name="v_model"> </div>	
				                </div>				      
    	   	                    <div class="box-body">
				                  <div  id="v_version" name="v_version"> </div>				
				                </div>								
								<div class="col-lg-12 form-group">
						          <label for="f-option"><b>Year</b> <span>*</span></label>
                                    <select class="form-control" name="year" id="year" required>
						               <option>-- Select Year --</option>
						               <option value="2000">2000</option>
                                       <option value="2001">2001</option>
						               <option value="2002">2002</option>
						               <option value="2003">2003</option>
						               <option value="2004">2004</option>
						               <option value="2005">2005</option>
						               <option value="2006">2006</option>
						               <option value="2007">2007</option>
						               <option value="2008">2008</option>
						               <option value="2009">2009</option>
						               <option value="2010">2010</option>
						               <option value="2011">2011</option>
						               <option value="2012">2012</option>
						               <option value="2013">2013</option>
						               <option value="2014">2014</option>
						               <option value="2015">2015</option>
						               <option value="2016">2016</option>
						               <option value="2017">2017</option>
						               <option value="2018">2018</option>
						               <option value="2019">2019</option>
						               <option value="2020">2020</option>					
                                    </select>
                                </div>								
								<div class="col-lg-12 form-group">                                  
                                  <label for="f-option"><b>Fuel</b> <span>*</span></label>
                                    <select class="form-control" name="fuel_type" required>
									  <option value="">--- Select Fuel ---</option>
                                      <option value="CNG & Hybrids">CNG & Hybrids</option>
									  <option value="Diesel">Diesel</option>
									  <option value="Electric">Electric</option>
                                      <option value="LPG">LPG</option>
                                      <option value="Petrol">Petrol</option>									  
                                    </select>                                  
                                </div>							
                                <div class="col-lg-12 form-group">
								  <label for="f-option"><b>Transmission</b> <span>*</span></label>
									<select class="form-control" name="transmission" required>
									  <option value="">-- Select Transmission --</option>
                                      <option value="Automatic">Automatic</option>
                                      <option value="Manual">Manual</option>									  
                                    </select>                                      							  
								</div>																								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>KM driven</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="kms" placeholder="Contact Person" required>
                                </div>								
								<div class="col-lg-12 form-group">
								  <label for="f-option"><b>No. of Owners</b> <span>*</span></label>
									<select class="form-control" name="owners_count" required>
									  <option value="">-- Select No. of Owners --</option>
                                      <option value="1">First</option>
                                      <option value="2">Second</option>	
                                      <option value="3">Third</option>
									  <option value="4">Fourth</option>
									  <option value="More then Four">More then Four</option>
                                    </select>                                      							  
								</div>								
								<div class="col-lg-12 form-group">
								    <label for="f-option"><b>Product Title</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="product_title" placeholder="Product Title">
                                </div>								
                                <div class="col-lg-12 form-group">
								    <label for="f-option"><b>Product Price</b> <span>*</span></label>
                                    <input class="form-control" type="text" name="product_amount" placeholder="Product Price" required>
                                </div> 								
                               
								<style>
					             ::-webkit-file-upload-button {
                                 background: black;
                                 color: red;
                                 padding: 1em;
                                 }
                                </style>
								<div class="form-row-control">
                                  <label><b>Logo Image</b></label>
                                  <input type="file" name="logo" id="myimg" multiple="multiple">								  
                                  <div>&nbsp;</div>
								  <div id="previews"></div>
								</div>

                                 <!-- <img id="img1" src="#" alt="your image" width="150px" height="100px"/>	
								  <img id="img2" src="#" alt="your image" width="150px" height="100px"/>
								  <img id="img3" src="#" alt="your image" width="150px" height="100px"/>
								  <img id="img4" src="#" alt="your image" width="150px" height="100px"/>
								  <img id="img5" src="#" alt="your image" width="150px" height="100px"/>	--> 							
                             
                                <div class="col-lg-12 form-group">
                                  <button type="submit" value="submit" name="submit" class="btn subs_btn form-control">Create Now</button>
                                </div>								
							
                            </form>																	                  
			            </div>
						
                        <div class="col-lg-6">
                     						
					   
						
						
						
						
						
                         
					 
					
					    </div> 					 					 
                     					 
                  </div>
			    </div>							
			</div>
        </section>		
        <!--================End Contact Area =================-->
		
		
<script>	
	/* function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img1').attr('src', e.target.result);
	  $('#img2').attr('src', e.target.result);
	  $('#img3').attr('src', e.target.result);
	  $('#img4').attr('src', e.target.result);
	  $('#img5').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file").change(function() {
  readURL(this);
}); */

$('document').ready(function() {
        var images = function(input, imgPreview) {
    
            if (input.files) {
                var filesAmount = input.files.length;
    
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
    
                    reader.onload = function(event) {
                        $($.parseHTML("<img class='pic' width='150px' height='100px'>")).attr('src', event.target.result).appendTo(imgPreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
    
        };
    
        $('#myimg').on('change', function() {
            images(this, '#previews');
        });
            
            //clear the file list when image is clicked
        $('body').on('click','img',function(){
            $('#myimg').val("");
            $('#previews').html("");
    
        });
    });

</script>
                    								
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>
        
        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->	
		