<?php 
include '../../system/function.php';
$connect = new Connection();
$query = new CrudKopkar();

if (isset($_POST['submit'])) {

	$getData = $query->query("SELECT * FROM tblperson WHERE Nik='$_POST[Nik]'");

	if ($check = mysql_num_rows($getData) > 0) {
		echo "<script>alert('Nik not avaliable'); window.history.back();</script>";
	} else {
		$salary = str_replace('.', '', $_POST['Salary']);

		$dataPost = [
			'Nik' => $_POST['Nik'],
			'FullName' => $_POST['FullName'],
			'Gender' => $_POST['Gender'],
			'Salary' => $salary
		];
		$query->insert('tblperson', $dataPost);

		header('location:index.php');
	}
	
} elseif (isset($_POST['update'])) {

	$salary = str_replace('.', '', $_POST['Salary']);

	$dataPost = [
		'FullName' => $_POST['FullName'],
		'Gender' => $_POST['Gender'],
		'Salary' => $salary
	];
	$query->update('tblperson', 'Nik', $_POST['Nik'], $dataPost);

	header('location:index.php');
} elseif (isset($_GET['id'])) {
	$query->delOne('tblperson', 'Nik', $_GET['id']);
	
	header('location:index.php');
} else {
	echo 'error';
}
?>