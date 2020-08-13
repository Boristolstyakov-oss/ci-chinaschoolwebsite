<!DOCTYPE HTML>
<html>
    <head>
        <title>中国大学生黄页</title>
        <script src="/public/home/js/jquery.js"></script>
        <script src="/public/home/js/index.js"></script>
        <link href="/public/home/css/reset.css" rel="stylesheet">
        <link href="/public/home/css/main.css" rel="stylesheet">
        <link rel="dns-prefetch" href="http://cdn.staticfile.org/">
<link rel="dns-prefetch" href="//www.google-analytics.com">
        <link href="/public/home/fontawesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
	<script src="/public/home/js/code.js"></script>
        <script src="/public/home/js/unslider.js"></script>
        <meta charset="utf-8">
    </head>
    <body>
     <div class="main-wrapper">
       <div class="back">
               <ul>
                   <li><img src="/public/home/img/pic02.jpg" /></li>
                   <li><img src="/public/home/img/pic01.jpg" /></li>
                   <li><img src="/public/home/img/pic03.jpg" /></li>
               </ul>
           </div>
       <header><!--页头开始--> 
           <nav>
               <logo>中国大学黄页!!</logo>
               <ul>
                   <li class="siderbaron"><a href="#" class="siderbaron">点这里！</a></li>
                   <li><a href="./manage">登录</a></li>                
                   <li><a href="" class="active">首页</a></li>
               </ul>
           </nav>
           <div id="banner">
               <div class="inner"> 
                   <ul class="row">
                       <li class="R">  <a href="#" class="unslider-arrow prev"> <i style="color:#908c8c;font-size:150px;" class="fa fa-angle-left"></i> </a> </li>
                       <li class="L">  <a href="#" class="unslider-arrow next"> <i style="color:#908c8c;font-size:150px;" class="fa fa-angle-right"></i> </a> </li>
                  <script>
                   var unslider = $('.back').unslider();

                   $('.unslider-arrow').click(function() {
                       var fn = this.className.split(' ')[1];

                       unslider.data('unslider')[fn]();
                   });
               </script>
                   </ul>
               </div>
           </div>
       </header><!--页头结束-->
