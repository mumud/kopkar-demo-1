<?php 
include '../../system/function.php';

$connect = new Connection();
$query = new CrudKopkar();

$UrlData = mysql_query("SELECT * FROM tblpayment WHERE Nik = '".$_GET['Nik']."' GROUP BY LoanDate");

echo "<option value=''>- Choose Loan Date -</option>";
while ($data = $query->mfArray($UrlData)) {
	echo "<option value='".$data['LoanDate']."'>".$data['LoanDate']."</option>";
}
?>