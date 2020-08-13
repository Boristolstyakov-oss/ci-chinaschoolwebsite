<?php
$schoolName = $_GET['name'];
echo $schoolName;
$db = new pdo('mysql:host=localhost;dbname=school;charset=UTF8',"root","123456");
$str = "delete from schoolinfo where SchoolName = \"".$schoolName."\"";
$sth = $db->exec($str);

if ($sth == 1) {
	header("Location:manage.php?deleteState=success");
}else{
	header("Location:manage.php?deleteState=fail");
}
