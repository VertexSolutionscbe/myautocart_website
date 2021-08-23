    <!--- Header Area --->
    <?php include('header.php');		  
          error_reporting(0);
          include('gmlogin/config.php');
		  
   if(isset($_GET["code"]))
     {	
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
   $_SESSION['ktoken']=$token;
   //echo $token;
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
  //echo $_SESSION['ktoken']=$token;
  //print_r($token);
  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  //echo "before";
  if(!isset($token['error']))
   {
 //echo "after";
	// print_r($token['access_token']);
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];
  echo $_SESSION['access_token'];
  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();
  //echo "given_name".$data['given_name'];
 // print_r($data);
  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }  
}
?>		  
<!--- Header Area End --->
		
		
<?php
/*DB Back Start*/
function backup_db(){
/*Delete file start*/
$days = 2;
$path = 'db_back_up/prod_db_back_up/';
$filetypes_to_delete = array("sql");
// Open the directory
if ($handle = opendir($path))
{
    // Loop through the directory
    while (false !== ($file = readdir($handle)))
    {
        // Check the file we're doing is actually a file
        if (is_file($path.$file))
        {
            $file_info = pathinfo($path.$file);
            if (isset($file_info['extension']) && in_array(strtolower($file_info['extension']), $filetypes_to_delete))
            {
                // Check if the file is older than X days old
                if (filemtime($path.$file) < ( time() - ( $days * 24 * 60 * 60 ) ) )
                {
                    // Do the deletion
                    unlink($path.$file);
                }
            }
        }
    }
}
/*Delete file stop*/
 // $conn = mysqli_connect("localhost", "myautocart", "J?4lB&oGdok^") or die("cannot connect"); 
   // mysqli_select_db($conn, "myautocart") or die("cannot select DB"); 
   // $conn = mysqli_connect("localhost","root","") or die("cannot connect"); 
  // mysqli_select_db($conn, "myautocart") or die("cannot select DB"); 
/* Store All Table name in an Array */
$allTables = array();
$sq='SHOW TABLES';
$result = mysqli_query($conn,$sq);
while($row = mysqli_fetch_row($result)){
     $allTables[] = $row[0];
}
$return="";
foreach($allTables as $table){
	$sqt='SELECT * FROM '.$table;
$result = mysqli_query($conn,$sqt);
$num_fields = mysqli_num_fields($result);

$return.= 'DROP TABLE IF EXISTS '.$table.';';
$sct='SHOW CREATE TABLE '.$table;
$row2 = mysqli_fetch_row(mysqli_query($conn,$sct));
$return.= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++) {
while($row = mysqli_fetch_row($result)){
   $return.= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++){
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } 
       else { $return.= '""'; }
       if ($j<($num_fields-1)) { $return.= ','; }
     }
   $return.= ");\n";
}
}
$return.="\n\n";
}
// Create Backup Folder
$folder = 'db_back_up/prod_db_back_up/';
// if (!is_dir($folder))
// mkdir($folder, 0777, true);
// chmod($folder, 0777);
date_default_timezone_set('Asia/Calcutta');
$date = date('m-d-Y-H-i-s', time()); 
$filename = $folder."Myautocart-backup-".$date; 
$handle = fopen($filename.'.sql','w+');
fwrite($handle,$return);
fclose($handle);
}

backup_db();
/*DB Start End*/
	
     /* $ps="select * from tbl_products1 where product_status='Active'";
     $Eps=mysqli_query($conn,$ps); 
     $product="[";
     while($FEps=mysqli_fetch_array($Eps))
      {
	    $product.="'".$FEps['product_title']."',"; 
      }
        $product.="'']"; */
		
	 $ps="SELECT vs.id as ID,CONCAT(ts.service_name, ' - ',seg.segment) ProductName,'tbl_services' as tbl  FROM  tbl_vendor_services vs 
     left join tbl_services ts on vs.service_id=ts.id left join tbl_segment seg on seg.id=vs.vehicle_segment_id
     UNION
     SELECT product_id as ID,product_title as ProductName,'tbl_product' as tbl FROM tbl_products1
     UNION
     SELECT category_id as ID,category_name as ProductName,'tbl_category' as tbl FROM tbl_category";
     $Eps=mysqli_query($conn,$ps); 
     $product="[";
     while($FEps=mysqli_fetch_array($Eps))
      {
	    $product.="'".$FEps['ProductName']."',"; 
      }
        $product.="'']"; 		
    ?>
		
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">              
        <?php
		 $tg="SELECT * FROM tbl_seo_tags WHERE webpage='index.php'";
		 $Etg=mysqli_query($conn,$tg);
		 $FEtg=mysqli_fetch_array($Etg);
		?>
		<title><?php echo $FEtg['title_tag']; ?></title>      
        <meta name="description" content="<?php echo $FEtg['metta_content']; ?>">   
	    <meta name="google-site-verification" content="1a-7Nn_Gzk-1Qca0khko-_hq0cFHi0yJA4H9Dpx8oSk" />
		<link href="http://www.myautocart.com/cars-in-india" media="screen" rel="stylesheet" type="text/css"/>

	    <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159623414-1"></script>
          <script>
             window.dataLayer = window.dataLayer || [];
             function gtag(){dataLayer.push(arguments);}
             gtag('js', new Date());

             gtag('config', 'UA-159623414-1');
          </script>
		  <script>
            var input = document.getElementById("searchname");
            input.addEventListener("keyup", function(event) {
             if (event.keyCode === 13) {
             event.preventDefault();
              alert('Tdfgdfgdgdf');
            //document.getElementById("myBtn").click();
            //var sk=document.getElementById('searchname').value;
	        //location.replace("search_keys.php?searchname=sk");
               }
            });

           function direct()
            {
	        var sk=document.getElementById('searchname').value;
	        location.replace("search_keys.php?searchname=sk");
            }
         </script>
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: #d91522;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d91522;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}

.padding-0{
    padding-right:0;
    padding-left:0;
}
</style>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
	var prd=<?php echo $product; ?>;
    $( "#tags" ).autocomplete({
      source: prd //availableTags
    });
  } );
 
   function ajaxmagic()
        {
            $.post(                             //call the server
                "geolocation.html",                     //At this url
                {
                    field: "value",
                    name: "John"
                }                               //And send this data to it
            ).done(                             //And when it's done
                function(data)
                {
                    $('#fromAjax').html(data);  //Update here with the response
                }
            );
        }
  </script>
	</head>
	<body onload="ajaxmagic()">
	<p id="fromAjax"></p>
	</body>
            <!--================Main Content Area =================-->
            <section class="home_sidebar_area" >
                <div class="container" >
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
						    <div class="col-lg-3 float-md-right">
						      <div class="l_title">
                               <a href="car-service-franchisee.php"><h3><img src="img/icon/car-fcy.png" alt="franchisee" title="Car Service Franchisee"> Franchisee</h3></a>
                              </div>					    
						    </div>
                            <div class="sidebar_main_content_area">							                                        								                                    
									
									<form method="post" action="search_keys.php" autocomplete="off" onsubmit="direct();"> 
									 <div class="row">
									  <div class="col-md-11 padding-0">
									   <input id="tags" name="tags" placeholder="Search"  style="text-transform:uppercase;height:60px;width:100%" class="form-control" aria-label="Search">
									  </div>
									  <div class="col-md-1 padding-0" style="margin-top:-5px;margin-left:-10px">									
                                       <span class="input-group-btn left">
                                         <button class="btn btn-secondary" type="submit" id="search" style="height:59px"><i class="icon-magnifier icons"></i></button>									   
                                       </span>										                                          
									  </div>
									 </div>
                                     <div>	
                                      <div class="autocomplete" style="width:870px;"></div>  									                                       										
                                     </div>
								    </form>
									                              
								<?php 
								$qb="select * from  tbl_banners order by id desc";
								$Eqb=mysqli_query($conn,$qb);		                        
								$sizeBanners=mysqli_num_rows($Eqb);								
								$imageurl="admin/dist/uploads/";
								?>
                                <div class="main_slider_area">
                                    <div id="home_box_slider" class="rev_slider" data-version="5.3.1.6">
                                        <ul>
                                            <?php 
											while($resultBanners=mysqli_fetch_array($Eqb))
											{
											
											?>
                                            <li data-index="<?php echo "rs-158".$i; ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?php echo $imageurl."banners/".$resultBanners["banner_img_one"]; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina alt="New Cars,Used Cars,Car Wash Equipments" title="Used Car for Sale",Used Cars in India,Second Hand Cars for Sale in Coimbatore,India">
                                               
												
												<!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    ><?php echo $resultBanners["banner_title"]; ?></div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        ><?php echo $resultBanners["banner_subtitle"]; ?>
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="<?php echo $resultBanners['banner_link_one']; ?>">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
											<li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?php echo $imageurl."banners/".$resultBanners["banner_img_two"]; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->
                                                <!-- LAYERS -->

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    ><?php //echo ?> <br> <?php //echo ?></div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        ><?php //echo ?> 
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['center','center','center','center','center','center']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['center','center','center','center','center','center']">
                                                        <a class="checkout_btn" href="<?php echo $resultBanners['banner_link_two']; ?>">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
											<li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?php echo $imageurl."banners/".$resultBanners["banner_img_three"]; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->
                                                <!-- LAYERS -->

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    ><?php //echo ?> <br> <?php //echo ?></div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        ><?php //echo ?> 
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="<?php echo $resultBanners['banner_link_three']; ?>">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
											<li data-index="rs-1590" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?php echo $imageurl."banners/".$resultBanners["banner_img_four"]; ?>"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->
                                                <!-- LAYERS -->

                                                <!-- LAYER NR. 1 -->
                                                <div class="slider_text_box first_text">
                                                    <div class="tp-caption tp-resizeme first_text" 
                                                    data-x="['left','left','left','left','left','left']" 
                                                    data-hoffset="['60','60','60','60','20','0']" 
                                                    data-y="['top','top','top','top','top','top']" 
                                                    data-voffset="['70','70','70','70','70','70']" 
                                                    data-fontsize="['48','48','48','48','48','48']"
                                                    data-lineheight="['56','56','56','56','56','48']"
                                                    data-width="['none','none','none','none','none']"
                                                    data-height="none"
                                                    data-whitespace="nowrap"
                                                    data-type="text" 
                                                    data-responsive_offset="on" 
                                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                    data-textAlign="['left','left','left','left','left','left']"
                                                    ><?php //echo ?> <br> <?php //echo ?></div>

                                                    <div class="tp-caption tp-resizeme secand_text" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"  
                                                        data-fontsize="['14','14','14','14','14','14']"
                                                        data-lineheight="['24','24','24','24','24']"
                                                        data-width="['300','300','300','300','300']"
                                                        data-height="none"
                                                        data-whitespace="normal"
                                                        data-type="text" 
                                                        data-responsive_offset="on"
                                                        data-transform_idle="o:1;"
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']"
                                                        ><?php //echo ?> 
                                                    </div>

                                                    <div class="tp-caption tp-resizeme third_btn" 
                                                        data-x="['left','left','left','left','left','left']" 
                                                        data-hoffset="['60','60','60','60','20','0']" 
                                                        data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']" 
                                                        data-width="none"
                                                        data-height="none"
                                                        data-whitespace="nowrap"
                                                        data-type="text" 
                                                        data-responsive_offset="on" 
                                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                        data-textAlign="['left','left','left','left','left','left']">
                                                        <a class="checkout_btn" href="<?php echo $resultBanners['banner_link_four']; ?>">shop now</a>
                                                    </div>
                                                </div>
                                            </li>
											<?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="promotion_area">
                                    <div class="feature_inner row m0">
                                        <div class="left_promotion">
                                            <div class="f_add_item">
                                                <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-6.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="sale">Sale</div>
                                                    <h4>Unbelievable <br />offers</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right_promotion">
                                            <div class="f_add_item right_dir">
                                                <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-7.jpg" alt=""></div>
                                                <div class="f_add_hover">
                                                    <div class="off">10% off</div>
                                                    <h4>Aadi <br />offer</h4>
                                                    <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fillter_home_sidebar">
                                    <ul class="portfolio_filter">
                                        <li class="active"><a href="#">Used Cars</a></li>                                                                              
                                    </ul>
                                    <?php															                                       									     																											                                       
                                      $qp="select * from  tbl_products11 where category_id='2' AND product_status='Active' order by product_id limit 0,6";
                                      $Eqp=mysqli_query($conn,$qp);
                                      $lm=0;                                     									  									 
                                    ?>
                                    <div class="categories_product_area">
                                     <div class="row">
										<?php 										
										while($resultProducts=mysqli_fetch_array($Eqp))
										    {
										?>
										<div class="col-lg-4 col-sm-6">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                   <a href="product-details.php?pid=<?php echo $resultProducts["product_id"]; ?>"><img src="<?php echo $resultProducts["detail_image"]; ?>"  width="100%"  style="height:180px" alt=""></a>
													<?php 
												if($resultProducts["product_sales"]==0)
												{
												?>
                                                <h5 class="new" hidden>Service</h5>
												<?php } ?>
                                                </div>
                                                <div class="l_p_text">
                                                    <ul>
                                                        <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                        <li><a class="add_cart_btn" href="product-details.php?pid=<?php echo $resultProducts["product_id"]; ?>">View</a></li>
                                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                    </ul>
                                                    <h4><?php echo $resultProducts["product_title"]; ?></h4>
                                                    <h5>&#8377; <?php echo $resultProducts["product_amount"]; ?></h5>
                                                </div>
                                            </div>
										</div>
										<?php } ?>                                         
                                     </div>                                        
                                    </div>
                                </div>																								
								
								<div class="fillter_home_sidebar">
                                    <ul class="portfolio_filter">
                                        <li class="active"><a href="#">Car Detailing Equipments</a></li>                                                                              
                                    </ul>
                                    <?php																										                                       									     
								     $qp1="select * from  tbl_products1 where category_id='17' AND product_status='Active' order by product_title limit 0,6";
                                     $Eqp1=mysqli_query($conn,$qp1);
                                     $lm=0;										  								  																																	
                                    ?>
                                    <div class="categories_product_area">
                                     <div class="row">
										<?php 										
										while($resultProducts1=mysqli_fetch_array($Eqp1)) {
										?>
										<div class="col-lg-4 col-sm-6">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                  <a href="detailing_equipments_product_details.php?pid=<?php echo $resultProducts1["product_id"]; ?>"><img src="<?php echo $resultProducts1["detail_image"]; ?>" style="height:180px" alt=""></a>
													<?php 
												      if($resultProducts1["product_sales"]==0) {
												    ?>
                                                    <h5 class="new" hidden>Service</h5>
												  <?php } ?>
                                                </div>
                                                <div class="l_p_text">
                                                    <ul>
                                                        <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                        <li><a class="add_cart_btn" href="detailing_equipments_product_details.php?pid=<?php echo $resultProducts1["product_id"]; ?>">View</a></li>
                                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                    </ul>
                                                    <h4><?php echo $resultProducts1["product_title"]; ?></h4>
                                                    <h5>&#8377; <?php echo $resultProducts1["product_amount"]; ?></h5>
                                                </div>
                                            </div>
										</div>
										<?php } ?>                                         
                                     </div>                                        
                                    </div>
                                </div>
                                							
                                <div class="home_sidebar_blog" hidden>
                                    <h3 class="single_title">Car Wash Equipment</h3>
                                    <?php 
                                     $qe="select * from  tbl_products1 where category_id=14 order by product_title limit 0,3";
                                     $Eqe=mysqli_query($conn,$qe);
                                     $sizeEquipements=mysqli_num_rows($Eqe);
                                      $lm=0;
                                      if($sizeEquipements>2)
                                       {
	                                    $lm=3;
                                       }
                                      else
                                       {
	                                    $lm=$sizeEquipements;
                                       }
		
                                     //Listing All Products For Equipement Category End
                                    ?>
									<div class="row">
                                    <?php 
									while($resultEquipements=mysqli_fetch_array($Eqe))
									{
									?>
									
                                        <div class="col-lg-4 col-sm-6">
										<a href="wash_equipments_product_details.php?pid=<?php echo $resultEquipements["product_id"]; ?>">
                                            <div class="from_blog_item">
											    
                                                <img class="img-fluid" src="<?php echo $resultEquipements["detail_image"]; ?>" alt="">
												
                                                <div class="f_blog_text">
                                                    <h5><?php echo $resultEquipements["product_title"]; ?></h5>
                                                    
                                                    <h6> &#8377; <?php echo $resultEquipements["product_amount"]; ?></h6>
                                                </div>
                                            </div>
											</a>
                                        </div>  
									
									<?php } ?>	
                                    </div>
                                </div>
								
								
								
								
								<div class="fillter_home_sidebar">
                                    <ul class="portfolio_filter">
                                        <li class="active"><a href="#">Car Wash Equipment</a></li>                                                                              
                                    </ul>
                                    <?php																										                                       									     
                                     $qp12="select * from  tbl_products1 where category_id=14 order by product_title limit 0,3";
                                     $Eqp12=mysqli_query($conn,$qp12);
                                     $lm=0;										  								  																																	
                                    ?>
                                    <div class="categories_product_area">
                                     <div class="row">
										<?php 										
										while($resultProducts12=mysqli_fetch_array($Eqp12)) {
										?>
										<div class="col-lg-4 col-sm-6">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                   <a href="wash_equipments_product_details.php?pid=<?php echo $resultProducts12["product_id"]; ?>"><img src="<?php echo $resultProducts12["detail_image"]; ?>" width="100%" style="height:180px" alt=""></a>
													<?php 
												      if($resultProducts12["product_sales"]==0) {
												    ?>
												  <?php } ?>
                                                </div>
                                                <div class="l_p_text">
                                                    <ul>
                                                        <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                        <li><a class="add_cart_btn" href="wash_equipments_product_details.php?pid=<?php echo $resultProducts12["product_id"]; ?>">View</a></li>
                                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                                    </ul>
                                                    <h4><?php echo $resultProducts12["product_title"]; ?></h4>
                                                    <h5>&#8377; <?php echo $resultProducts12["product_amount"]; ?></h5>
                                                </div>
                                            </div>
										</div>
										<?php } ?>                                         
                                     </div>                                        
                                    </div>
                                </div>
								
								
								
								
                                
                            </div>
                        </div>
						<div class="col-lg-3 float-md-right" hidden>
						    <div class="l_title">
                               <a href="car-service-franchisee.php"><h3><img src="img/icon/car-fcy.png" alt="franchisee" title="Car Service Franchisee"> Franchisee</h3></a>
                            </div>					    
						</div>
						<div hidden>&nbsp;</div>
                        <div class="col-lg-3 float-md-right">
                            <div class="left_sidebar_area">							    
							    <aside class="l_widget l_categories_widget">
                                    <div class="l_title">
                                        <h3>Categories</h3>
                                    </div>
									<?php
		                             $i=0;		
		                               $ct="SELECT * from tbl_category WHERE category_id OR category_name ORDER BY category_id ASC";
		                               $Ect=mysqli_query($conn,$ct);         			 
		                               while($FEct=mysqli_fetch_array($Ect)) 
										{              
			                              $cid=$FEct['category_id'];
                                          $cname=$FEct['category_name'];			 
                                     $i++;	
		                            ?>									
                                    <ul>
									<?php if($FEct['category_name']=='New Cars') { ?>
                                       <li><a href="new-cars.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Used Cars') { ?>
									  <li><a href="used-cars.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Insurance') { ?>
									 <li><a href="insurance.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Car Service Franchisee'){ ?>
									 <li><a href="car-service-franchisee.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Car Services') { ?>
									 <li><a href="car-services.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='New Car Spares') { ?>
									 <li><a href="car-spares.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Car Wash Equipments') { ?>
									 <li><a href="car-wash-equipments.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Used Car Spares') { ?>
									 <li><a href="extras.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
									<?php } ?>
									<?php if($FEct['category_name']=='Detailing Equipments') { ?>
									 <li><a href="car_detailing_equipments.php?cid=<?php echo $FEct['category_id'];?>&cname=<?php echo $FEct['category_name'];?>"><?php echo $FEct['category_name']; ?></a></li>
								    <?php } ?>									
									</ul>
									<?php } ?>									 
                                </aside>								   

                                <aside class="l_widget l_supper_widget">
                                    <img class="img-fluid" src="img/supper-add-1.jpg" alt="">
                                    <h4>Renault</h4>
                                </aside>
                                <aside class="l_widget l_feature_widget">
                                    <div class="verticalCarousel">
                                        <div class="verticalCarouselHeader">
                                            <div class="float-md-left">
                                                <h3>Featured Products</h3>
                                            </div>
                                            <div class="float-md-right">
                                                <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                                <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                            </div>
                                        </div>
                                        <?php	
                                        //Listing Feature Products Start
                                          $qfp="select * from  tbl_products1 where product_status='Active' AND category_id='2' order by product_id desc limit 5,15";
                                          $Eqfp=mysqli_query($conn,$qfp);
                                          $sizeFProducts=mysqli_num_rows($Eqfp);	
                                        //Listing Feature  Products End
                                         ?>
                                        <ul class="verticalCarouselGroup vc_list">
                                            <?php 
								             while($resultFProducts=mysqli_fetch_array($Eqfp)) {								            
								            ?>
                                            <li>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <a href="product-details.php?pid=<?php echo $resultFProducts["product_id"]; ?>"><img src="<?php echo $resultFProducts["detail_image"]; ?>" width="100px" height="70px" alt=""></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="product-details.php?pid=<?php echo $resultFProducts["product_id"]; ?>"><h4><?php echo $resultFProducts["product_title"]; ?></h4></a>
                                                        <h5> &#8377; <?php echo $resultFProducts["product_amount"]; ?></h5>
                                                    </div>
                                                </div>
                                            </li>
								         <?php } ?>
                                        </ul>
                                    </div>
                                </aside><form>
                                <aside class="l_widget l_news_widget">
                                    <h3>newsletter</h3>
                                    <p>Sign up for our Newsletter !</p>
                                    <div class="input-group" hidden>
                                        <input type="email" name="e_mail" id="e_mail" class="form-control" placeholder="yourmail@domain.com" aria-label="Search for...">
                                        <span class="input-group-btn">
                                    </div>
						            <a class="add_cart_btn" method="post" href="newsletter.php">Subscribe</a></span>

                                </aside></form>
                                <aside class="l_widget l_hot_widget">
                                    <h3>Summer Hot Sale</h3>
                                    <p>Premium 700 Product , Titles and Content Ideas</p>
                                    <a class="discover_btn" href="used-cars.php">shop now</a>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Main Content Area =================-->
            
            <!--================World Wide Service Area =================-->
            <section class="world_service">
                <div class="container">
                    <div class="world_service_inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-1.png" alt="">Service all over PAN India</h4>
									<p></p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-2.png" alt="">24/7 Help Centre</h4>
                                    <p></p>
								</div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-3.png" alt="">Safe Payment</h4>
                                    <p></p>
								</div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="img/icon/world-icon-4.png" alt="">Quick Delivery</h4>
                                    <p></p>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End World Wide Service Area =================-->

 
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
productnames = <?php echo $product; ?>;


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("searchname"), productnames);

</script>			

        <!--- Footer Area --->
		  <?php include('footer.php'); ?>
        <!--- Footer Area End --->		 