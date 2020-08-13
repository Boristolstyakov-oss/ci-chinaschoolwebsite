<?php
$school_province = $_POST['province'];
$schoolNmae = trim($_POST['schoolName']);
$schoolInfo = $_POST['schoolInfo'];
$schoolCon = $_POST['schoolCon'];
// echo $school_province." ".$schoolNmae." ".$schoolInfo;
// var_dump($GLOBALS);

if ($school_province==''||$schoolNmae==''||$schoolInfo==''||$schoolCon=='') {
	header("Location:manage.php?addState=fail");
}else{
	$db=new pdo('mysql:host=localhost;dbname=school;charset=utf8',"root","123456");
	$str = "select province from province where provinceid = \"$school_province\"";
	$sth = $db->query($str);
	$data = $sth->fetchall();
	// var_dump($data);
	$loc = $data[0]['province'];
	// echo $loc;
	$str = "select * from schoolinfo where SchoolName = \"".$schoolNmae."\"";
	$sth = $db->query($str);
	$data = $sth->fetchall();
	if(count($data)==0){
		$str = "insert into schoolinfo (School_Province, SchoolName, SchoolIntro, schoolCon) values(\"".$loc."\", \"".$schoolNmae."\", \"".$schoolInfo."\", \"".$schoolCon."\")";
		$sth = $db->exec($str);
		echo $sth;
		if ($sth == 1) {
		header("Location:manage.php?addState=success");
		}else{
		header("Location:manage.php?addState=fail");
		}
	}else{
		header("Location:manage.php?addState=fail_1");
	}
}
