<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的申请</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>
<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 40px;background-color: #eeeeee"></div>

<div style="height: 620px;width: 100%;background-color: #eeeeee">

    <div style="width: 1260px;height: 570px;background-image: url(/picture/Student/myApply.bmp);margin: auto">

      <div style="height: 530px;width: 400px;margin: auto;background:rgba(255,255,255,0.4);position: relative;top: 20px;
         border-radius: 8px">

        <div style="height: 20px"></div>

        <div style="width: 100%;height: 20px;text-align: center">
            <label style="font-family: 'Adobe Kaiti Std';font-size: 250%">当前的申请信息</label>
        </div>

        <div style="height: 70px"></div>

        <div>
            <table  class="table table-striped" style="width: 400px">
                <tr class="red" style="height: 30px">

                    <td>申请标题</td>
                    <td><?php echo ($my_apply["apl_title"]); ?></td>
                </tr>
                <tr>
                    <td>申请课程</td>
                    <td><?php echo ($my_apply["apl_course"]); ?></td>
                </tr>
                <tr>
                    <td>薪资</td>
                    <td><?php echo ($my_apply["apl_salary"]); ?></td>

                </tr>
                <tr>
                    <td>授课频率</td>
                    <td><?php echo ($my_apply["apl_frequency"]); ?></td>

                </tr>
                <tr>
                    <td>申请描述</td>
                    <td><?php echo ($my_apply["apl_description"]); ?></td>

                </tr>
                <tr>
                    <td>发布日期</td>
                    <td><?php echo ($my_apply["apl_date"]); ?></td>
                </tr>
            </table>
        </div>

        <div style="height: 50px;position: relative;top: 60px;width: 100%;text-align: center">
            <a href="<?php echo U('Home/Student/stuCenter');?>">
                <button class="button bg-sub" type="submit" value="GO" style="width: 290px">
                    返回</button>
            </a>

        </div>



     </div>

    </div>
</div>


</body>
</html>