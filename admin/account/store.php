<?php 
include '../../system/function.php';
$connect = new Connection();
$query = new CrudKopkar();

if (isset($_POST['submit'])) {

	$getData = $query->query("SELECT * FROM tbluser WHERE Nik='$_POST[Nik]'");

	if ($check = mysql_num_rows($getData) > 0) {
		echo "<script>alert('Nik not avaliable'); window.history.back();</script>";
	} else {
		$dataPost = [
			'Nik' => $_POST['Nik'],
			'UserPassword' => $_POST['UserPassword'],
			'UserLevel' => $_POST['UserLevel']
		];
		$query->insert('tbluser', $dataPost);

		header('location:index.php');
	}
} elseif (isset($_POST['update'])) {
	$dataPost = [
		'UserLevel' => $_POST['UserLevel'],
		'UserEmail' => $_POST['UserEmail']
	];
	$query->update('tbluser', 'Nik', $_POST['Nik'], $dataPost);

	header('location:index.php');
} elseif (isset($_GET['id'])) {
	$query->delOne('tbluser', 'Nik', $_GET['id']);
	
	header('location:index.php');
} else {
	echo 'error';
}
?>