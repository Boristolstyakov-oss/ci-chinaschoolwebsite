<?php
if (!(isset($_COOKIE['is_log'])&&$_COOKIE['is_log']==1)) {
    header("Location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>高校云-后台管理系统</title>
        <script src="js/jquery.js"></script>
        <!-- <script src="js/index.js"></script> -->
        <script src='jquery.js'></script>
        <script type="text/javascript">
          var lis=document.getElementsByTagName('li');
          console.log(lis.length);
          function show(self) {
          for(var i=0;i<lis.length;i++){
             lis[i].className='';
           }
          self.className='first';
          }
            $(document).ready(function(){
    $("#province").change(function(){
      var provinceid=$(this).val();
      $("#citySpan").load("index_city.php?provinceid="+provinceid);
      $("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\">请选则区</option></select>");
    });
  })
  function selectArea(){
    var cityid=$("#city").val();
    $("#areaSpan").load("index_area.php?cityid="+cityid);
  }
        </script>
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="fontawesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="js/code.js"></script>
        <script src="js/unslider.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
     <div class="main-wrapper">

       <header><!--页头开始-->
         <ul>
            <li><a href="index.php?action=out">退出</a></li>
           <li>|</li>
            <li>欢迎<?php echo " ".$_COOKIE['Name']." ";?>同学</li>
       </ul>
       </header><!--页头结束-->

       <div id="content"><!--内容开始-->

          <div class="form">
            <ul>

               <li  class="" onmousemove="show(this)">增加信息
                   <section id="one">
                   <?php
                        if (isset($_GET['addState'])&&$_GET['addState']=='success') {
                          echo "<p style=\"font-size:20px;\">已成功添加一条信息。</p>";
                        }elseif (isset($_GET['addState'])&&$_GET['addState']=='fail') {
                          echo "<p style=\"font-size:20px;\">填写信息有误！</p>";
                        }elseif (isset($_GET['addState'])&&$_GET['addState']=='fail_1') {
                          echo "<p style=\"font-size:20px;\">重复添加学校！</p>";
                        }
                      ?>
                     <table class="login">
                      <!-- 增加信息表单 -->
                      <?php
                        $conn=mysqli_connect("localhost","root","123456","school");
                        mysqli_query($conn, "set names utf8");
                        $sql="select * from province";
                        $query=mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($query)){
                          $province[]=$row;
                        }
                      ?>
                     <form action="AddInfo.php" method="POST" multiple="multiple" >
                        <tr>
                            <td class="left">学校地区：</td>
                            <td>
                            <select id="province" name="province">
                            <option value='0' >请选则省</option>
                            <?php
                              foreach($province as $k=>$v){
                            ?>
                            <option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
                            <?php
                              }
                            ?>
                            </select>
<!--                             <span id="citySpan">
                              <select id="city" name="city">
                                <option value="">请选则市</option>
                              </select>
                            </span> -->
                            </td>
                        </tr>
                       <tr>
                            <td class="left">学校名称：</td>
                            <td class="right"><input type="text" class="text" placeholder="学校名称" style="font-size:20px;" name="schoolName"></td>
                        </tr>
                        <tr>
                           <td class="left">学校简介：
                           </td>
                           <td class="right" >
                              <input type="text" class="se text" placeholder="录入学校信息" name="schoolInfo"></td>
                           </td>
                        </tr>
                        <br />
                        <tr>
                           <td class="left">学校详情：
                           </td>
                           <td class="right" >
                              <input type="text" class="se text" placeholder="录入学校信息" name="schoolCon"></td>
                           </td>
                        </tr>
                        <tr>
                           <td><button type="submit" class="submit" value="提交">提交</button></td>
                           <td><button type="reset" class="reset" value="重置">重置</button></td>
                        </tr>
                     </form>
                     </table>
               </li>

               <li class="first" onmousemove="show(this)">搜索学校
                   <section id="two">
                       <table class="login">
                       <form action="manage.php" method="POST">
                         <tr>
                            <td class="left">地区：
                            </td>
                            <td>
                               <select id="province" name="province">
                            <option value='0' >请选则省</option>
                            <?php
                              foreach($province as $k=>$v){
                            ?>
                            <option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
                            <?php
                              }
                            ?>
                            </select>
                            </td>
                            <td>
                                 <input class="search" type="submit" value="search">
                            </td>
                         </tr>
                         </form>
                       </table>
                       <?php
                        if (isset($_GET['deleteState'])&&$_GET['deleteState']=='success') {
                          echo "<p style=\"font-size:20px;\">成功删除</p>";
                        }elseif (isset($_GET['deleteState'])&&$_GET['deleteState']=='fail') {
                          echo "<p style=\"font-size:20px;\"></p>";
                        }
                       ?>
                       <table class="form">
                         <tr>
                             <td>地区</td>
                             <td>学校名称</td>
                             <td>操作</td>
                         </tr>

                         <?php
                       if ((!isset($_POST['province']))||(isset($_POST['province'])&&$_POST['province']=='0')) {
                         $db=new pdo('mysql:host=localhost;dbname=school;charset=utf8',"root","123456");
                          $str = "select * from schoolinfo";
                          $sth = $db->query($str);
                          $arrData = $sth->fetchall();
                          $count = count($arrData);
                          if ($count==0) {
                            echo "<tr><td>暂时没有数据！</td></tr>";
                          } else {
                            for ($i=0; $i < $count; $i++) {
                              echo "<tr>
                             <td>".$arrData[$i]['School_Province']."</td>
                             <td>".$arrData[$i]['SchoolName']."</td>
                             <td>

                                <button > <a href=\"deleteInfo.php?name=".$arrData[$i]['SchoolName']."\">删除</a> </button>
                             </td>
                         </tr>";
                            }
                          }
                       } elseif (isset($_POST['province'])) {
                         $db=new pdo('mysql:host=115.159.201.83;dbname=school;charset=utf8',"bitzo","bitzo");
			$str = "select * from province where provinceid =\"".$_POST['province']."\"";
			$sth = $db->query($str);
			$arrData = $sth->fetchall();
//var_dump($arrData);
			$province = $arrData[0]['province'];
                          $str = "select * from schoolinfo where School_Province=\"".$province."\"";
                          $sth = $db->query($str);
                          $arrData = $sth->fetchall();
                          $count = count($arrData);
                          if ($count==0) {
                            echo "<tr><td>暂时没有数据！</td></tr>";
                          } else {
                            for ($i=0; $i < $count; $i++) {
                              echo "<tr>
                             <td>".$arrData[$i]['School_Province']."</td>
                             <td>".$arrData[$i]['SchoolName']."</td>
                             <td>

                                <button > <a href=\"deleteInfo.php?name=".$arrData[$i]['SchoolName']."\">删除</a> </button>
                             </td>
                         </tr>";
                            }
                          }
                       }
                       ?>
                      </table>
                   </section>
               </li>

               <li  onmousemove="show(this)">更新信息
                   <section id="three">
                       <table class="login">
                       <form method="POST" action="updateInfo.php">
                        <?php
                        if (isset($_GET['updateState'])&&$_GET['updateState']=='success') {
                          echo "<p style=\"font-size:20px;\">已成功更新一条信息。</p>";
                        } elseif (isset($_GET['updateState'])&&$_GET['updateState']=='fail') {
                          echo "<p style=\"font-size:20px;\">填写信息有误！</p>";
                        }
                      ?>
                         <tr>
                            <td class="left">学校名称：</td>
                            <td class="right"><input type="text" class="textarea" placeholder="学校名称" style="font-size:20px;" name="name"></td>
                         </tr>
                         <tr>
                            <td class="left">学校简介：
                            </td>
                            <td class="right" >
                              <input type="textarea" class="se text" placeholder="录入学校信息" name="info" cols="20"></td>
                            </td>
                         </tr>
                         <tr>
                            <td class="left">学校详情：
                            </td>
                            <td class="right" >
                              <input type="text" class="se text" placeholder="录入学校信息" name="Con" cols="20"></td>
                            </td>
                         </tr>
                         <tr>
                           <td><button type="submit" class="submit" value="更新">更新</button></td>
                           <td><button type="reset" class="reset" value="重置">重置</button></td>
                         </tr>
                       </form>

                       </table>
                   </section>
              </li>


            </ul>
          </div>

       </div><!--内容结束-->

       <footer><!--页尾开始-->
       </footer><!--页尾结束-->



    </div>

    </body>
</html>
