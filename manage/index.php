<!--增加学校-->
<!--增加信息-->
<!--还有删除信息-->
<!--修改信息-->
<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'post') {
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$code = $_POST['code'];
	if ($_SESSION['code'] == $code) {
		//连接数据库
		$db = new pdo('mysql:host=115.159.201.83;dbname=school',"bitzo","bitzo");
		$str = "select * from admininfo where AdminName = \"$name\"";
		$sth = $db->query($str);
		var_dump($sth);
   		$arrData = $sth->fetch(PDO::FETCH_ASSOC);
		var_dump($arrData);
   		if ($pass == $arrData['AdminPass']) {
   			echo "hello4";
			setcookie('Name',$name,time()+60*30);
   			setcookie('is_log',1,time()+60*30);
   			header("Location:manage.php");
   		}else header("Location:index.php");
	}
}
if (isset($_GET['action'])&&$_GET['action']=='out') {
	setcookie('is_log','',time()-1);
	setcookie('Name','',time()-1);
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>请登录！高校云-后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    	#log{
    		margin: auto;
    		width: 300px;
    		height: 200px;
    		padding: 20px;
    		border: solid 1px black;
    	}
    </style>
</head>
<body>
<div id="log">
	<form action="index.php?action=post" method="POST">
	<p>=== Log in (Administrator) ====</p>
	UserName:<input type="text" name="name" size="20"><br/ ><br />
	Password:<input type="password" name="password" size="20"><br/ ><br />
	验证码: <input type="text" size="8px" name="code"><a href="./"><img src="code.php"></a><br /><br />
	<input type="reset" name="Reset"> <input type="submit" name="Ensure">
	</form>
</div>

</body>
</html>
