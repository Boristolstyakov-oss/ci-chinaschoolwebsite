
       <footer><!--页尾开始-->
          <ul class="share-group">
               <!--<li><a href="#"><img src="img/wechat.png"></a></li>
               <li><a href="#"><img src="img/wechat.png"></a></li>
               <li><a href="#"><img src="img/wechat.png"></a></li>-->
               <a href="#"><span style="font-size:25px;margin-right:65px;"><i class="fa fa-qq"></i></span></a>
               <a href="#"><span style="font-size:25px;margin-right:65px;"><i class="fa fa-wechat (alias)"></i></span></a>
               <a href="#"><span style="font-size:25px;margin-right:65px;"><i class="fa fa-weibo"></i></span></a>
           </ul>
           <div class="copy">
               Copyright © 2016-2016 NetEase. All Rights Reserved.<br>
               Powerd by Wordpress1.2.3| Author by . 。o 0
           </div>

       </footer><!--页尾结束-->
</div>

                 <div id="siderbar"><!--侧边栏开始-->
         <form  action="" method="get">
              <input class="text" type="text"><!--搜索框-->
              <input class="search" type="button" value="search"><!--搜索按钮-->
         </form>
         <ul>
         <?php foreach ($list as $name): ?>
            <li><a href="<?=site_url("../../../school/".$name['id'])?>"><?=$name['schoolname']?></a></li>
         <?php endforeach; ?>
           <!--  <li><a href="">南京大学</a></li>
            <li><a href="">东南大学</a></li>
            <li><a href="">南京航空航天大学</a></li>
            <li><a href="">南京理工大学</a></li>
            <li><a href="">河海大学</a></li>
            <li><a href="">南京邮电大学</a></li>
            <li><a href="">南京农业大学</a></li>
            <li><a href="">南京工业大学</a></li>
            <li><a href="">中国药科大学</a></li>
            <li><a href="">南京医科大学</a></li>
            <li><a href="">南京师范大学</a></li>
            <li><a href="">南京财经大学</a></li>
            <li><a href="">金陵科技学院</a></li> -->
         </ul>

       </div><!--侧边栏结束-->


    </div>

    </body>
</html>