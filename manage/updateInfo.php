<?php
$schoolInfo = $_POST['info'];
$schoolName = trim($_POST['name']);
$schoolCon = $_POST['Con'];
if ($schoolName == ''||$schoolInfo==''||$schoolCon=='') {
	header("Location:manage.php?updateState=fail");
}

$db = new pdo('mysql:host=localhost;dbname=school;charset=UTF8',"root","123456");

$str = "update schoolinfo set SchoolIntro = \"".$schoolInfo."\" where SchoolName = \"".$schoolName."\"";
$sth = $db->exec($str);
$str = "update schoolinfo set schoolCon = \"".$schoolCon."\"where SchoolName = \"".$schoolName."\"";
$sth = $db->exec($str);
if ($sth == 1) {
	header("Location:manage.php?updateState=success");
}else{
	header("Location:manage.php?updateState=fail");
}
