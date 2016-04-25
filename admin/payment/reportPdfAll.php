<?php
include '../../system/config.php';
include '../../system/function.php';
include '../../lib/mpdf/mpdf.php';

$connect = new Connection();
$query = new CrudKopkar();

$mpdf=new mPDF('utf-8', 'A4');
//ob_start();
$html='<html>';
$getDataLoan = $query->query('SELECT a.*, b.* FROM tblloan as a INNER JOIN tblperson as b ON a.Nik=b.Nik');
while ($join = mysql_fetch_array($getDataLoan)) {
$html.='<div style="page-break-after:always">
				<table border="0" width="100%">
					<tr>
						<td rowspan="3"><h1>Kopkar</h1></td>
						<td width="100px"><b>Nik</b></td>
						<td width="200px">'.$join['Nik'].'</td>
					</tr>
					<tr>
						<td width="100px"><b>Fullname</b></td>
						<td width="200px">'.$join['FullName'].'</td>
					</tr>
					<tr>
						<td width="100px"><b>Address</b></td>
						<td width="200px">'.$join['Address'].'</td>
					</tr>
				</table>

				<table border="0" width="100%">
					<tr>
						<td colspan="3" bgcolor="#C0C0C0"><h3>Report Payment</h3></td>
					</tr>
					<tr bgcolor="#C0C0C0">
						<td width="100px"><b>Loan Tenor</b></td>
						<td><b>Payment Date</b></td>
						<td><b>Payment Value</b></td>
					</tr>
			';
	$getDataPayment = $query->query("SELECT * FROM tblpayment WHERE Nik='".$join['Nik']."' AND LoanDate='".$join['LoanDate']."' ORDER BY Tenor ");
	$countPlus=0;
	while ($dataPayment = mysql_fetch_array($getDataPayment)) {
		if ($dataPayment['PaymentValue'] > 0){
			$countPlus+=$dataPayment['PaymentValue'];
			$html.='
				<tr>
					<td align="center">'.$dataPayment['Tenor'].'</td>
					<td>'.$dataPayment['PaymentDate'].'</td>
					<td>Rp. '.$dataPayment['PaymentValue'].'</td>
				</tr>';
		}
	}
	$sisa = $join['LoanValue'] - $resultPlus;
	
	$html.='
		<tr bgcolor="#C0C0C0">
			<td colspan="2"><b>Total</b></td>
			<td>Rp. '.$countPlus.'</td>
		</tr>
		</table>

		<table border="0" width="100%">
			<tr bgcolor="#C0C0C0">
				<td colspan="2"><h3>Detail</h3></td>
			</tr>
			<tr>
				<td><b>Salary</b></td>
				<td>Rp. '.$join['Salary'].'</td>
			</tr>
			<tr>
				<td><b>Loan Value</b></td>
				<td>Rp. '.$join['LoanValue'].'</td>
			</tr>
			<tr>
				<td><b>Total Tenor</b></td>
				<td>'.$join['LoanTenor'].'</td>
			</tr>
			<tr>
				<td><b>Payment Value</b></td>
				<td>Rp. '.str_replace('-', '', $join['LoanInstallment']).' /month</td>
			</tr>
			<tr>
				<td><b>Report Total Payment</b></td>
				<td>Rp. '.$sisa.'</td>
			</tr>
		</table>

	</div>';
}
$html.='</html>';


//$html = ob_get_contents();
//ob_end_clean();
$mpdf->WriteHTML($html);
$mpdf->Output("ReportPayment.pdf" ,'I');
exit;
?>