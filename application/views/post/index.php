<div id="content">
<div id="web">
	<div id="head_msg">
	<h2>=== <?=$schoolname?> =========</h2><br />
        <a href="<?=site_url('../../forum/'.$main['post_school'])?>">回到论坛</a>
        <hr>
	</div>
	<div id="box">
		<div id="info">
			<img src="<?php echo $main['post_pic']; ?>" id="head_pic" alt="head_pic" />
			UserID:<br /><p id="usrName"><b><?=$main['post_from']?></b></p>
		</div>
		<div id="content_1">
            <b><strong><?=$main['post_title']?></strong></b>
			<p id="cont_head"><?=$main['post_content']?></p>
			<p id="no_"><?=$main['post_date']?></p>
		</div>
	</div>
    <?php $num = 0; ?>
    <?php foreach ($reply as $value):?>
    <div id="box">
        <div id="info">
            <img src="<?=$value['reply_pic']?>" id="head_pic" alt="head_pic" />
            UserID:<br /><p id="usrName"><b><?=$value['reply_from']?></b></p>
        </div>
        <div id="content_1">
            <p id="cont"><?=$value['reply_content']?></p>
            <p id="no_"><?=$value['reply_date']?></p><br>
            <p id="no_"> ==== <?=++$num?> 层 === </p>
        </div>
    </div>
    <?php endforeach; ?>
    <div id="notice">
        <h3>=== Input your Reply =========</h3>
    </div>
    <div id="msgbox">
        <div id="msg_usr">
            <img src="<?=$usr['pic']?>" id="head_pic" alt="user_pic" />
            UserName:<br /><p id="msg_usrName"><b><?=$usr['username']?></b></p>
        </div>
        <div id="msg_form">
            <?php echo validation_errors(); ?>
            <?php echo form_open('../../post/'.$post_id); ?>
                <textarea id="msg_content" name="content"></textarea>
                <input type="reset" name="reset" />
                <input type="submit" name="submit" />
            </form>
        </div>
    </div>

</div>

</div>