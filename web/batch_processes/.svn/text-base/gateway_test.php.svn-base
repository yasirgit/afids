<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once('afids_paymentGateway.php');

$payment = new afids_paymentGateway;

$payment->gateway_name = "novapointe";
$payment->transaction_type = "sale";
$item_data = "total=25";
$item_data.= "&tax=0";
$item_data.= "&bill_first_name=Stephan";
$item_data.= "&bill_last_name=Fopeano";
$item_data.= "&bill_address1=10554 Ohio Ave";
$item_data.= "&bill_address2=";
$item_data.= "&bill_city=Los Angeles";
$item_data.= "&bill_state=CA";
$item_data.= "&bill_zip=90024";
$item_data.= "&bill_country=USA";
$item_data.= "&bill_phone=3104701772";
$item_data.= "&ccard=475632";
$item_data.= "&expmonth=12";
$item_data.= "&expyear=2011";
$item_data.= "&cvv2=312";

$payment->item_data = $item_data;
$payment->shipping_code = "USPS";

echo $payment->submitPayment();

?>