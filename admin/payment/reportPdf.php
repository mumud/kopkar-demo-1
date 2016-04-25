<?php
include '../../system/config.php';
include '../../system/function.php';
include '../../lib/mpdf/mpdf.php';

$connect = new Connection();
$query = new CrudKopkar();

$mpdf=new mPDF('utf-8', 'A4');
ob_start();

if (isset($_GET['ProcessReport'])) {
$getData = $query->query("SELECT * FROM tblpayment WHERE Nik='".$_GET['Nik']."' AND LoanDate='".$_GET['LoanDate']."' ");

$getDataPerson = $query->query("SELECT * FROM tblperson WHERE Nik='".$_GET['Nik']."' ");
$dataPerson = $query->mfObject($getDataPerson);

$getDataLoan = $query->query("SELECT * FROM tblloan WHERE Nik='".$_GET['Nik']."' AND LoanDate='".$_GET['LoanDate']."' ");
$dataLoan = $query->mfObject($getDataLoan);
?>

<html>
<head>
	<title></title>
</head>
<style type="text/css">
.table-border td {
	border: 1px solid #000;
}
</style>
<body>

	<table border='0' width='100%'>
		<tr>
			<td rowspan="3"><h1>Kopkar</h1></td>
			<td width='100px'><b>Nik</b></td>
			<td width='200px'><?php echo $dataPerson->Nik ?></td>
		</tr>
		<tr>
			<td width='100px'><b>Fullname</b></td>
			<td width='200px'><?php echo $dataPerson->FullName ?></td>
		</tr>
		<tr>
			<td width='100px'><b>Address</b></td>
			<td width='200px'><?php echo $dataPerson->Address ?></td>
		</tr>
	</table>

	<hr>

	<table border='0' width='100%'>
		<tr>
			<td colspan='3' bgcolor="#C0C0C0"><h3>Report Payment</h3></td>
		</tr>
		<tr bgcolor='#C0C0C0'>
			<td width='100px'><b>Loan Tenor</b></td>
			<td><b>Payment Date</b></td>
			<td><b>Payment Value</b></td>
		</tr>

		<?php 
		while ($data = mysql_fetch_array($getData)) {
			
			if ($data['PaymentValue'] > 0){
				echo '<tr>';
					echo '<td align="center">'.$data['Tenor'].'</td>';
					echo '<td>'.$data['PaymentDate'].'</td>';
					echo '<td>Rp. '.$data['PaymentValue'].'</td>';
				echo '</tr>';

				$countPlus = $query->query("SELECT * FROM tblpayment WHERE PaymentValue='".$data['PaymentValue']."' ");
				$resultCountPlus = mysql_num_rows($countPlus);
				$resultPlus = $data['PaymentValue']*$resultCountPlus;
			}

		}

		echo '<tr bgcolor="#C0C0C0">';
			echo '<td colspan="2"><b>Total</b></td>';
			
			if (!empty($resultCountPlus)) {
				echo '<td>Rp. '.$resultPlus.'</td>';
			} else {
				echo '<td>Rp. 0</td>';
			}

		echo '</tr>';
		?>
	</table>

	<p>
		<table border="0" width="100%">
			<tr bgcolor="#C0C0C0">
				<td colspan="2"><h3>Detail</h3></td>
			</tr>
			<tr>
				<td><b>Salary</b></td>
				<td><?php echo "Rp. ".$dataPerson->Salary ?></td>
			</tr>
			<tr>
				<td><b>Loan Value</b></td>
				<td><?php echo "Rp. ".$dataLoan->LoanValue ?></td>
			</tr>
			<tr>
				<td><b>Total Tenor</b></td>
				<td><?php echo $dataLoan->LoanTenor ?></td>
			</tr>
			<tr>
				<td><b>Payment Value</b></td>
				<td>
					<?php 
					$replace = str_replace('-', '', $dataLoan->LoanInstallment);
					echo "Rp. ".$replace." /month";
					?>
				</td>
			</tr>
			<tr>
				<td><b>Report Total Payment</b></td>
				<td>
					<?php 
					$sisa = $dataLoan->LoanValue - $resultPlus;
					echo "Rp. ".$sisa;
					?>
				</td>
			</tr>
		</table>
	</p>

</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("ReportPayment.pdf" ,'I');
exit;

} else {
	echo "<script>alert('Please select data'); window.location.href='report.php';</script>";
} 
?>