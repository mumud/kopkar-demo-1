<?php 
include '../../system/function.php';

$connect = new Connection();
$query = new CrudKopkar();

$UrlData = mysql_query("SELECT * FROM tblresult WHERE ResultGroupId = '".$_GET['ResultGroupId']."'");

echo "<option value=''>- Choose Reason -</option>";
while ($data = $query->mfArray($UrlData)) {
	echo "<option value='".$data['ResultId']."'>".$data['ResultName']."</option>";
}
?>