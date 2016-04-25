<?php 
include '../../system/function.php';
$connect = new Connection();
$query = new CrudKopkar();

if (isset($_POST['submit'])) {
	
	// update tblloan
	$dataLoan = [
		'LoanStatus' => $_POST['LoanStatus'],
		'ResultName' => $_POST['ResultName'] 
	];
	$query->update('tblloan', 'Nik', $_POST['Nik'], $dataLoan);

	// insert tblpayment
	for ($i=1; $i<=$_POST['LoanTenor']; $i++) {
		$dataPayment = [
			'Nik' => $_POST['Nik'],
			'LoanDate' => $_POST['LoanDate'],
			'Tenor' => $i,
			'PaymentValue' => $_POST['LoanInstallment']
		];
		$query->insert('tblpayment', $dataPayment);
	}

	header('location:index.php');
} else {
	echo 'error';
}
?>