<div id="content">
    <div class="wrapper">
        <h2><?=$schoolname?></h2><br />
        <a href="../../location/<?=$provinceid?>"><?=$schoolprovince?></a>><a href=""><?=$schoolname?></a>>
        <div class="hr"><hr /></div>
        <p class="sub-heading">Lorem ipsum dolor sit  quasi minus laboriosam sit doloremque. Repellendus sint voluptatem illum, maiores in atque quaerat aspernatur ad alias!</p>
    </div>
    <div id="post">
        <div class="post_list">
            <table>
                <tr>
                    <td id="one">Forum_List</td>
                    <td id="two">From</td>
                    <td id="three">==========</td>
                </tr>
<!--                <tr>-->
<!--                    <td id="one">tietle</td>-->
<!--                    <td id="two">date</td>-->
<!--                </tr>-->
                <?php foreach ($post as $post_con):?>
                <tr>
                    <td id="one"><a href="<?=site_url('../../post/'.$post_con['post_id'])?>"><?=$post_con['post_title']?></a></td>
                    <td id="two"><?=$post_con['post_from']?></td>
                    <td id="three"><?=$post_con['post_date']?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <hr />
        <div class="post">
            <div id="usr">
                <img src="../../<?=$usr['pic']?>" alt="picture" />
                <br><br><p><?=$usr['username']?></p>
            </div>
            <div id="post_content">
                <?=$statue?>
                <?php echo validation_errors(); ?>
                <?php echo form_open('../../forum/'.$school_id); ?>
                title: <input type="text" name="post_title"><br><br>
                content:<textarea id="text_area" name="text_area"></textarea>
                <input type="submit" name=""></form>
            </div>
        </div>
    </div>
</div>

