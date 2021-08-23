<?php 
session_start();

if($_SESSION['PaymentMethod']=='OP')
{
	header("location:make-payment-act.php");
}
if($_SESSION['PaymentMethod']=='COD')
{
	// header("location:cash-on.php");
	header("location:pdftomail/index.php");
}
?>