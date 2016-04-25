<?php
error_reporting(0); 
include '../../system/function.php';
$connect = new Connection();
$query = new CrudKopkar();

if ($_POST['proses']) {

	for ($i=1; $i<=$_POST['num']; $i++) {
		if($_POST['check'.$i]=="on"){

			$data = $query->query("SELECT * FROM tblpayment WHERE Nik='".$_POST['Nik'.$i]."' AND LoanDate='".$_POST['LoanDate'.$i]."' AND PaymentDate='0000-00-00' ORDER BY Tenor Limit 1");
			$r=$query->mfObject($data);

			$ValuePlus = str_replace('-', '', $_POST['PaymentValue'.$i]);
			$hasil=$query->query("UPDATE 
								tblpayment 
							SET 
								`PaymentDate` = '".date('Y-m-d')."',
								`PaymentValue` = '$ValuePlus'
							WHERE
								`Nik` ='$r->Nik' AND LoanDate='$r->LoanDate' AND Tenor='$r->Tenor' 
						");
			
			header('location:index.php');
		}
	}

}

?>