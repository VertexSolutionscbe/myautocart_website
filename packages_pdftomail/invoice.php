<?php
session_start();
error_reporting(0);

/* $conn = mysqli_connect("localhost","root","") or die("cannot connect"); 
mysqli_select_db($conn, "myautocart") or die("cannot select DB"); */

$conn = mysqli_connect("localhost", "myautocart", "J?4lB&oGdok^") or die("cannot connect"); 
mysqli_select_db($conn, "myautocart") or die("cannot select DB");

$message = '';

// $connect = new PDO("mysql:host=localhost;dbname=myautocart", "root", "");
function fetch_customer_data($conn)
{
	$i=0;
     
     $rd="SELECT * FROM tbl_service_invoice_details where id='".$_REQUEST['id']."'";
     $Erd=mysqli_query($conn,$rd);
     $EFrd=mysqli_fetch_array($Erd);
    
     $mo="SELECT * FROM tbl_model where id='".$EFrd['model']."'";
     $Emo=mysqli_query($conn,$mo);
     $FEmo=mysqli_fetch_array($Emo); 	

     $cn="SELECT * FROM tbl_customer_address where customer_id='".$EFrd['customer_id']."'";
     $Ecn=mysqli_query($conn,$cn);
     $Fcn=mysqli_fetch_array($Ecn);
			 	 
	 $dc=$Fcn['f_name'];

$output='<div class="table-responsive">
<table align="center" width="550" border="0" cellpadding="3"  cellspacing="0">
<tbody>

<tr>
<td>
<table align="center" width="550" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>Vertex Solutions</b><br/>198, Nehru Street, Ramnagar, Coimbatore - 641009.<br/>9566969517<br/>http://www.vertexsolution.co.in/<br/>vertexsolution.co.in</td>
<td><img src="../img/logo.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/></td>
</tr>
</table>
</td>
</tr>';

$output.='<tr>
<td>
<table align="center" width="550" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>

<td align="left" width="230"><b>Customer Details</b><br/><b>Name</b><br/><b>Address</b><br/><b>Mobile</b><br/><b>Email</b><br/><b>Vehicle No</b><br/><b>Model</b></td>
<td align="left" width="10"><br/><b> : </b><br/><b> : </b><br/><b> : </b><br/><b> : </b><br/><b> : </b><br/><b> : </b></td>
<td align="left" width="500"><br/>'.$Fcn['f_name'].'<BR/>'.$Fcn['billing_address'].'<BR/>'.$Fcn['mobile'].'<BR/>'.$Fcn['email'].'<BR/>'.$EFrd['vehicle_no'].'<BR/>'.$FEmo['model'].'</td>
<td width="150"><b>Invoice No</b><br/><b>Order No</b><br/><b>Date</b><br/><b>Time</b></td>
<td width="10"><b> : </b><br/><b> : </b><br/><b> : </b><br/><b> : </b></td>
<td width="170">'.$EFrd['inv_no'].'<br/>'.$EFrd['service_order_no'].'<br/>'.date("d-m-Y", strtotime($EFrd['appointment_date'])).'<br/>'.$EFrd['appointment_time'].'</td>
</tr>
</table>
</td>
</tr>';

$output.='<tr><td align="left"  height="50px"><b>Package Details :</b></td></tr>
<tr>
<td>
<table align="center" width="550" border="1" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">S.No</FONT></td>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">Package Name</FONT></td>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">Rate</FONT></td>
<td bgcolor="#000000" align="center" hidden><FONT COLOR="FFFFFF">Qty</FONT></td>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">CGST</FONT></td>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">IGST</FONT></td>
<td bgcolor="#000000" align="center"><FONT COLOR="FFFFFF">SGST</FONT></td>
<td align="center" bgcolor="#000000"><FONT COLOR="FFFFFF">Amount</FONT></td>
</tr>';

    $i=0;
        $li ="SELECT * FROM tbl_service_invoice_details WHERE id='".$_REQUEST['id']."' AND customer_id='".$_SESSION['customer_id']."' ORDER BY id desc";
        $Eli=mysqli_query($conn,$li);
        while($FEli=mysqli_fetch_array($Eli)) {						
        //$FEli=mysqli_fetch_array($Eli);
		
		    $cus="SELECT * FROM `tbl_customer` WHERE customer_id='".$FEli['customer_id']."'";
		    $Ecus=mysqli_query($conn,$cus);
            $FEcus=mysqli_fetch_array($Ecus);
			
			    $pro="SELECT * FROM `tbl_packages` WHERE id='".$FEli['vendor_service_id']."'";
				$Epro=mysqli_query($conn,$pro);
                $FEpro=mysqli_fetch_array($Epro);
				
				   $tbv="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$FEli['vendor_id']."'";
				   $Etbv=mysqli_query($conn,$tbv);
				   $FEtbv=mysqli_fetch_array($Etbv);				   
				
				   $cat="SELECT * FROM `tbl_category` WHERE category_id='".$FEli['category_id']."'";
				   $Ecat=mysqli_query($conn,$cat);
                   $FEcat=mysqli_fetch_array($Ecat);
				   
				     
				     $service_name         = $FEpro['package_name'];
					 $amount	           = $FEli['amount'];					 
				     
					 /* $order_date		   = $FEli['order_date'];
				     $order_no		       = $FEli['OrderNo'];
			         $cust_name            = $FEcus['f_name'];
				     $e_mail               = $FEcus['email'];
	                 $mobile_no            = $FEcus['mobile'];					           
				     $vendor_name		   = $FEtbv['vendor_name'];
			         $vendor_product_id    = $FEli['vendor_product_id'];
			         $category_name	       = $FEcat['category_name'];			         
				     $qty	               = $FEli['qty'];				     
				     $billing_address_id   = $FEli['billing_address_id'];
				     $delivery_address_id  = $FEli['delivery_address_id'];
				     $payment_mode		   = $FEli['payment_mode'];
				     $payment_id		   = $FEli['payment_id'];
				     $photo                = $FEpro['photo']; */
				     		 
    $i++;

$output.='<tr>
<td bgcolor="#FFFFFF" align="center">'.$i.'</td>
<td bgcolor="#FFFFFF">'.$service_name.'</td>
<td bgcolor="#FFFFFF" align="right">'.$amount.'</td>
<td bgcolor="#FFFFFF" align="center" hidden>'.$qty.'</td>
<td bgcolor="#FFFFFF" align="center">'.$Fs1['cgst'].'</td>
<td bgcolor="#FFFFFF" align="center">'.$Fs1['igst'].'</td>
<td bgcolor="#FFFFFF" align="center">'.$Fs1['sgst'].'</td>
<td bgcolor="#FFFFFF" align="right">'.$amount.'</td> 
</tr>';
}
$i=5-$n;
for($k=0;$k<=$i;$k++)
 { 
$output.='<tr>	   
       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
       <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
       <td align="center" bgcolor="#FFFFFF">&nbsp;</td> 
       <td align="center" bgcolor="#FFFFFF">&nbsp;</td> 
	   <td align="center" bgcolor="#FFFFFF">&nbsp;</td> 
	   <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
	   <td align="center" bgcolor="#FFFFFF" hidden>&nbsp;</td>
     </tr>';
 }
 
$output.='</table>
</td>
</tr>

<tr>
<td align="center"><b>Payment Details :</b></td>
</tr>

<tr><td class="style4"><b> Terms and conditions: </b></td></tr>
<tr><td class="style4">1. Service warranty should be claimed from service centers at a particular location only.</td></tr>
<tr><td class="style4">2. Warranty will be provided by service centers.</td></tr>
<tr><td class="style4">&nbsp;</td></tr>

<tr><td colspan="5" align="center"><b>Total Amount :'.$amount.'</b><br/></td></tr>
';
						 
   $number = $amount;		 
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';		  
          $result; 		   

$output.='<tr><td colspan="5" align="center"><b>Amount in words :'.$result.'</b><br/></td></tr>';
'</tbody>
</table></div>';	
	return $output;			
}
  
if(isset($_POST["action"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	$html_code .= fetch_customer_data($conn);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	$_SESSION['afile']=$file_name;
	// header("location:send_mail.php");
	$id=$_REQUEST['id'];
    header("location:send_to_mail.php?id=$id");	
 }	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Invoice Details</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<br/>
		<div class="container">
			<h3 align="center">Package Invoice</h3>
			<br/>
			<form method="post">
				<input type="submit" name="action" class="btn btn-info" value="Send Invoice To Mail" /><?php echo $message; ?>
			</form>
			<br/>
			<?php
			echo fetch_customer_data($conn);
			?>			
		</div>		
	  <tr><td><h4 align="center" type="button"><a href="../index.php" class="button style1"><b>Close</b></a></h4></td></tr>	
	</body>	
</html>





