<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/Public/css/bootstrap/bootstrap.min.css">
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>

<div style="height: 41px;background-color: #379be9;width: 100%;margin: auto"></div>

<div style="width: 100%;height:91px;background-color: #eeeeee">
    <div style="height: 91px;width: 1200px;margin: auto;text-align: center;background-color: white">
        <span style="font-family: LiSu; font-size: 400%;position: relative;top: 9px">家教平台</span>
    </div>

</div>

<div style="text-align: center;width: 100%;background-color: #eeeeee;height: 630px">


    <div id="myCarousel" class="carousel slide" style="width: 1200px;margin: auto" >
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li style="color: aqua" data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li style="color: aqua" data-target="#myCarousel" data-slide-to="1"></li>
            <li style="color: aqua" data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner" style="margin: auto">
            <div class="item active">


                <img src="/picture/homePage/test.bmp"/></div>

            <div class="item active1">

                <img src="/picture/homePage/test.bmp"/></div>

            <div class="item active1">

                <img src="/picture/homePage/test.bmp"/></div>


            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;</a>

        </div>



    </div>

    <div style="width: 1200px;height:100px;background-color: white;margin: auto">


        <div style="width: 600px;height: 100px;float: left">
            <a href="<?php echo U('Home/Teacher/teacher');?>">
                <button class="btn btn-primary btn-lg " style="position: relative;top: 20px;width: 200px">
                    <span style="color: white">
                        我是老师
                    </span>
                </button>
            </a>

        </div>

        <div style="width: 600px;height: 100px;float: right">
            <a href="<?php echo U('Home/Student/student');?>">
                <button class="btn btn-primary btn-lg " style="position: relative;top: 20px;width: 200px">
                    <span style="color: white">
                        我是学生
                    </span>
                </button>
            </a>
        </div>








    </div>
</div>

<!--
<br>
<a href="<?php echo U('Home/Teacher/teacher');?>">我是老师
</a>
<br>
<a href="<?php echo U('Home/Student/student');?>">我是学生</a>
<br>
<a>就是来转转</a>



-->
</body>
</html>