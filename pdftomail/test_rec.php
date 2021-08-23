<?php 
//include("../../dbinfo.php");
session_start();
error_reporting(0);


mysql_connect("localhost","root","");
mysql_select_db("autodetailerz");

$date=date('d/m/Y');
 $s="select * from a_final_bill where inv_no='F1-5'"; 
$Es=mysql_query($s);
$Fs=mysql_fetch_array($Es);
$n=mysql_num_rows($Es);
$ino=$n;

//  $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
 $spm="select * from m_franchisee where id='5'";
$Scm=mysql_query($spm);
$Frp1=mysql_fetch_array($Scm);


 $pr1="select * from m_company where cus_name='".$_SESSION['company']."'";  
$Epr1=mysql_query($pr1);
$Fpr1=mysql_fetch_array($Epr1);


$con='
<table align="center" width="695" border="1"   cellpadding="3"  cellspacing="0">
<thead>
<tr>
<th align="center" colspan="5" ><span style="font-size:28px"><B>'.$Frp1['franchisee_name'].'</B></span><BR/>'.$Frp1['address'].',<BR/>'.$Frp1['gst_no'].',<BR/>'.$Frp1['cen_manager'].'<BR/>'.$Frp1['con_number'].'<BR/></th>
</thead>
<tbody>';

$cus="select * from a_customer where id='".$Fs['cname']."'";
$spm=mysql_query($cus);
$epm=mysql_fetch_array($spm);


$con.='<tr>
<td  boalign="LEFT" colspan="2" ><span style="font-size:18px">Customer Name  : <B>'.$epm['cust_name'].'</B></span><BR/>
  Mobile No: <B>'.$Fs['cmobile'].'</B><BR/>
  Address : <B>'.$Fs['caddrs'].'</B><BR/>
  Payment Mode: <B>'.$Fs['ptype'].'</B></td>
<td  boalign="LEFT" colspan="1" ><span style="font-size:18px">Date : <b>'.date("d-m-Y", strtotime($Fs['bill_date'])).'</b></span><br/>
  Invoice No: <b>'.$Fs['inv_no'].'</b><br/>
  Job Card No: <b>'.$Fs['job_card_no'].'</b><br/></td>
</tr>'; 
$na="select * from a_customer_vehicle_details where cust_name='".$Fs['cname']."'";  
$nam=mysql_query($na);
$vehile=mysql_fetch_array($nam);

$con.='<tr height="15px">
   <td align="center" colspan="5"><strong>VEHICLE SERVICE DETAILS </strong></td>
 </tr>';
 
$pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
 
 $con.= '<th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">PACKAGE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Package Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>';




$tr=0;
$qt=0;
$dt=0;
$trs=0;
 $gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			$sdm1="select *from s_job_card_pdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{


$i++;

$con.='<tr>
<td width="92" align="center">'.$i.'</td>
<td width="368">'.$dcm1['package_type'].'</td>
<td  width="209" align="center">'.$dcm1['package_amt'].'</td>
</tr>';
 
}
}
}

  $pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
 $con.=
  '<th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">SERVICE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Service  Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>';

$gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			
			$sdm1="select *from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{


$i++;

$con.='<tr>
<td width="92" align="center">'.$i.'</td>
<td width="368">'.$dcm1['service_type'].'</td>
<td  width="209" align="center">'.$dcm1['st_amt'].'</td>
</tr>';
 
}
}
}

$pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
  
$con.='<th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">SPARE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Spare  Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>';

$gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'"; 
$Egt1=mysql_query($gt1);
while($Fs1=mysql_fetch_array($Egt1))
{


			$sdm="select *from m_spare where sid='".$Fs1['sname']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			
			

$i++;

$con.='<tr>
<td width="92" align="center">'.$i.'</td>
<td width="368">'.$dcm['sname'].'</td>
<td  width="209" align="center">'.$dcm['smrp'].'</td>
</tr>';
 
}
}
}
$gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);

$con.= '<tr  colspan="2">

</tr>

   <tr>
<td  align="right" colspan="2" height="30px"><b> SERVICE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['ser_amt'].'</b></td>
</tr>';


$gt3="select IFNULL(sum(smrp),0) as smrp from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'"; 
$Egt3=mysql_query($gt3);
$Fs3=mysql_fetch_array($Egt3);


$con.='<tr>
<td  align="right" colspan="2" height="30px"><b> SPARE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs3['smrp'].'</b></td>
</tr>

<tr>
<td  align="right" colspan="2" height="30px"><b>OTHES CHARGE :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$Fs1['other_charge'].'</b></td>
</tr>';


$total=$Fs1['ser_amt']+$Fs3['smrp']+$Fs1['other_charge'];

$con.='<tr style="display:none">
<td  align="right" colspan="2" height="30px"><b>TOTAL AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$total.'</b></td>
</tr>';

$dis=$total*($Fs1['discount']/100);


if($Fs1['discount']!='0')
{
$con.=
'<tr>
<td  align="right" colspan="2" height="30px"><b>DISCOUNT  ('.$Fs1['discount'].'%) :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$dis.'</b></td>
</tr>';

}

$Amt=$total-$dis;
$gst=$Amt*($Fs1['gst']/100);

$con.=
'<tr>
<td  align="right" colspan="2" height="30px"><b>GST '.$Fs1['gst'].' %:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.round($gst,2).'</b></td>
</tr>
<tr>
<td  align="right" colspan="2" height="30px"><b>BILL AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.round($Fs1['bill_amt'],0).'.00</b></td>
</tr>
<tr>
<td  align="right" colspan="2" height="30px"><b>ADVANCE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$Fs1['paid_amt'].'</b></td>
</tr>';
$con.=
'<tr>
<td  align="right" colspan="2" height="30px"><b>PREMIUM PACKAGE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$Fs1['from_off_amt'].'</b></td>
</tr>';

$ro=$Fs1['paid_amt']+$Fs1['from_off_amt'];
$bal=$Fs1['bill_amt']-$ro;
$con.=
'<tr>
<td  align="right" colspan="2" height="30px"><b>BALANCE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$Fs1['bal_amt'].'</b></td>
</tr>';
$con.=
'<tr>
<td  align="right" colspan="2" height="30px"><b>RECEIVED AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b>'.$Fs1['rec_amt'].'.00</b></td>
</tr>';

$bn="select * from company where comp_name='".$_SESSION['company']."'";
$Ebn=mysql_query($bn);
$Fbn=mysql_fetch_array($Ebn);
$con.=
'<tr height="30px">
    
    <td align="center" colspan="16"><strong>Thank You For Your Business</strong></td>
  </tr>

</table>';

echo $con;

?>