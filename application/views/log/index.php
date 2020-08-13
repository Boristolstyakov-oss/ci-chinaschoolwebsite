<!DOCTYPE HTML>
<html>
<head>
    <title>请登录！高校云-后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
        #log{
            margin: auto;
            width: 300px;
            height: 300px;
            padding: 20px;
            border: solid 1px black;
        }
        #link{
            /*position: absolute;*/
            margin-left: 120px;
        }
    </style>
</head>
<body>
<div id="log">
    <?php echo validation_errors(); ?>
    <?php echo form_open('../../log'); ?>
        <p>=== Log in (Normal)====</p>
        <p><?=$notice?></p>
        UserName:<input type="text" name="name" size="20" value="<?=set_value('name')?>"><br/ ><br />
        Password:<input type="password" name="password" size="20" value="<?=set_value('password')?>"><br/ ><br />
        验证码: <input type="text" size="8px" name="code"><a href="./"><img src="code.php"></a><br /><br />
        <input type="reset" name="Reset"> <input type="submit" name="Ensure"><a href="<?=site_url("../registe")?>" id="link">新用户注册</a>
    </form>
</div>

</body>
</html>
