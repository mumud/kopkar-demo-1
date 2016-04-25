<?php 
include '../../system/function.php';

$connect = new Connection();
$query = new CrudKopkar();

$UrlData = mysql_query("SELECT * FROM tblpayment WHERE Nik = '".$_GET['Nik']."' AND LoanDate = '".$_GET['LoanDate']."' ");

$data = $query->mfObject($UrlData);

echo $data->PaymentValue;
?>