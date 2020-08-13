<!DOCTYPE html>
<html>
<head>
    <title>中国大学生黄页-注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
        #registe{
            margin: auto;
            width: 300px;
            height: 500px;
            padding: 20px;
            border: solid 1px black;
        }
    </style>
</head>
<body>
<div id="registe">
    <?php echo form_open_multipart('../registe');?>
    <p>=== 新用户注册 ====</p>
    UserName:<br /> <input type="text" name="name" size="20" value="<?=set_value('name')?>"><br/ >
    <?php echo form_error('name'); ?>
    Password:<br /> <input type="password" name="password" size="20" value="<?=set_value('password')?>"><br/ >
    <?php echo form_error('password'); ?>
    Ensure Password:<br /> <input type="password" name="passconf" size="20"><br />
    <?php echo form_error('passconf'); ?>
    验证码: <br /> <input type="text" size="8px" name="code"><a href="./"><img src="code.php"></a><br />
    <?=$notice?><br />
    <input type="file" name="userfile" size="20" /><br />
    <?=$error?><br />
    <input type="reset" name="Reset"> <input type="submit" name="Ensure">
    </form>
    </div>
</body>
</html>