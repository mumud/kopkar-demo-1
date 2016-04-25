<?php
require_once 'function.php';
$con=new Connection();
$crudKopkar=new CrudKopkar();

$username=$_POST['username'];
$password=$_POST['password'];

$sql=$crudKopkar->query("select * from tbluser where Nik='$username' and UserPassword='$password'");
$exSql=$crudKopkar->mfArray($sql);
if($exSql){
	$role=$exSql['UserLevel'];
	if($role=='admin'){
		header('location:../admin/dashboard/');
	}else{
		
		header('location:../user');
	}
}
?>