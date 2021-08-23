<!--- Header Area --->
<?php 
//session_start();
include('header.php');
error_reporting(0);
?>
<!--- Header Area End --->

            <?php 
              $cn="SELECT * FROM tbl_customer_address where customer_id='".$_SESSION['customer_id']."'";
		      $Ecn=mysqli_query($conn,$cn);
		      $Fcn=mysqli_fetch_array($Ecn);
			  
			    $cp="SELECT * FROM `tbl_confirm_orders` WHERE customer_id='".$Fcn['customer_id']."'";
				$Ecp=mysqli_query($conn,$cp);
				$FEcp=mysqli_fetch_array($Ecp);
            ?>
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Final Jobcard Bill</title>
<style>
<style type="text/css" media="print">


a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
	padding-top:3px;
	padding-bottom:2px;
    padding-right:10px;
    padding-left:10px;
    text-decoration: none;
    color: initial;
}
@media print { 
table, table tr, table td { 
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
.tds
{
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
}


.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-size: 18px}
.style4 {font-size: 16px}
</style>
<style>
table { border-collapse: collapse; }
tr { border: none; }
td.line {
  border-right: solid 0px #000; 
  border-left: solid 0px #000;
}
table, th{
    border: 0px solid black;
}


</style>
<script>
function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>
<script>
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'SAR' : '') . $paise .;
}
</script>
</head>

<body oncontextmenu="return false;">

<div id="print-content">
<table align="center" width="600" border="0"   cellpadding="3"  cellspacing="0">
<thead>

</thead>
<tbody>

<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>Vertex Solutions</b><br/>198, Nehru Street, Ramnagar, Coimbatore - 641009.<br/>9566969517<br/>http://www.vertexsolution.co.in<br/>vertexsolution.co.in</td>
<td align="right"><img src="img/logo.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/></td>
</tr>

</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>Details</b><br/><?PHP echo $Fcn['f_name']; ?><br/><?PHP echo $Fcn['billing_address']; ?><br/><?PHP echo $Fcn['mobile']; ?><br/><?PHP echo $Fcn['email']; ?></td>
<td align="left" width="175">Invoice NO<br/>Order No<br/>DATE</td>
<td align="left" width="50">: <br/>:<br/>:</td>
<td align="left" width="125"><?php echo $FEcp['invoice_no']; ?><br/><?php echo $FEcp['OrderNo']; ?><br/><?php echo date("d-m-Y", strtotime($FEcp['order_date'])); ?></td>
</tr>

</table>
</td>
</tr>
<tr>
<td align="left"  height="50px"><b>Billing Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="1"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>S.No</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>Product Name</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>Rate</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>Qty</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>CGST</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>IGST</FONT></td>
<td bgcolor="#000000"><FONT COLOR='FFFFFF'>SGST</FONT></td>
<td align="center" bgcolor="#000000"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

 <?php
  $i=0;
        $li ="SELECT * FROM tbl_confirm_orders WHERE customer_id='".$_SESSION['customer_id']."' ORDER BY id desc";
        $Eli=mysqli_query($conn,$li);
        while($FEli=mysqli_fetch_array($Eli)) {						
        
		    $cus="SELECT * FROM `tbl_customer` WHERE customer_id='".$FEli['customer_id']."'";
		    $Ecus=mysqli_query($conn,$cus);
            $FEcus=mysqli_fetch_array($Ecus);
			
			    $pro="SELECT * FROM `tbl_products` WHERE product_id='".$FEli['product_id']."'";
				$Epro=mysqli_query($conn,$pro);
                $FEpro=mysqli_fetch_array($Epro);
				
				   $tbv="SELECT * FROM `tbl_vendor` WHERE vendor_id='".$FEli['vendor_id']."'";
				   $Etbv=mysqli_query($conn,$tbv);
				   $FEtbv=mysqli_fetch_array($Etbv);				   
				
				   $cat="SELECT * FROM `tbl_category` WHERE category_id='".$FEpro['category_id']."'";
				   $Ecat=mysqli_query($conn,$cat);
                   $FEcat=mysqli_fetch_array($Ecat);
				   
				     $order_date		   = $FEli['order_date'];
				     $order_no		       = $FEli['OrderNo'];
			         $cust_name            = $FEcus['f_name'];
				     $e_mail               = $FEcus['email'];
	                 $mobile_no            = $FEcus['mobile'];					           
				     $vendor_name		   = $FEtbv['vendor_name'];
			         $vendor_product_id    = $FEli['vendor_product_id'];
			         $category_name	       = $FEcat['category_name'];
			         $product_title	       = $FEpro['product_title'];
				     $qty	               = $FEli['qty'];
				     $amount	           = $FEli['amount'];
				     $billing_address_id   = $FEli['billing_address_id'];
				     $delivery_address_id  = $FEli['delivery_address_id'];
				     $payment_mode		   = $FEli['payment_mode'];
				     $payment_id		   = $FEli['payment_id'];
				     $photo                = $FEpro['photo'];

				     
		 
  $i++;
 ?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td><?php echo $product_title; ?></td>
<td align="right"> <?php echo $amount; ?></td>
<td align="center"><?php echo $qty; ?></td>
<td align="center"><?php echo $Fs1['cgst']; ?></td>
<td align="center"><?php echo $Fs1['igst']; ?></td>
<td align="center"><?php echo $Fs1['sgst']; ?></td>
<td align="right"> <?php echo $amount; ?></td> 
</tr>
<?php 
 }
$i=5-$n;
for($k=0;$k<=$i;$k++)
 {
?>
     <tr>	   
       <td align="center">&nbsp;</td>
       <td align="center">&nbsp;</td>
       <td align="center">&nbsp;</td>
       <td align="center">&nbsp;</td> 
       <td align="center">&nbsp;</td> 
	   <td align="center">&nbsp;</td> 
	   <td align="center">&nbsp;</td>
	   <td align="center">&nbsp;</td>
     </tr>
<?php }
   ?>						
</table>
</td>
</tr>

<tr>
<td align="center" height="25px"><b>Payment Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="500" class="style4">Here's your Cash memo!</td>
</tr>

<tr>
<td class="style4">Terms and conditions:</td>
</tr>
<tr>
<td class="style4 hidden"></td>
<td><b>Total Amount  </b></td>
<td width="25"><b> :</b></td>
<td><b><?php echo $amount; ?></b></td>
</tr>

<td class="style4" hidden>1.Manufacturers Guarantee</td>
</tr>

<tr>
<td class="style4" hidden>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</td>
<td bgcolor=""><b></b></td>
<td width="25" bgcolor=""><b> </b></td>
<td bgcolor=""><b></b></td>
</tr>

<tr>
<td class="style4" hidden>3.Disputes if any subject to Tamilnadu</td>
<td><b></b></td>
<td width="25"><b> </b></td>
<td><b></b></td>
</tr>
<tr >
<td class="style4" hidden> Jurisdiction E &EO</td>
<td><b> </b></td>
<td width="25"><b></b></td>
<td><b></b></td>
</tr>
<tr>
  <?php						 
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
		  
 ?>

<td colspan="5" align="right"><b>Amount in words : <?php echo  $result; ?></b><br/></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td width="350" class="style4" hidden>We appreciate your prompt payment.<br/>Thanks for your business!<br/><b><?PHP echo $Frp1['franchisee_name']; ?></b></td>   
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div>&nbsp;</div>
<h4 align="center"><input type="button" name="print" class="checkout_btn" value="print" onClick="printDiv('print-content')"/>&nbsp;&nbsp;&nbsp;<a href="index.php" class="checkout_btn">Close</a></h4>

          <div align="center" hidden>
            <form class="form-horizontal" method="post" action="invoice_export.php" autocomplete="off">             
              <!-- /.box-body -->		 
              <div class="box-footer">			 
                <button  type="submit" class="btn btn-info pull-center"> EXPORT INVOICE TO EXCEL </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div> 

</body>
</html>

<!--- Footer Area --->
  <?php include('footer.php'); ?>
<!--- Footer Area End --->