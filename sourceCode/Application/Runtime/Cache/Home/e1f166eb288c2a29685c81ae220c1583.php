<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申请详情</title>

    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 40px;background-color: #eeeeee"></div>

<div style="height: 780px;width: 100%;background-color: #eeeeee">

    <div style="width: 1260px;height: 700px;background-image: url(/picture/Teacher/book_1.bmp);margin: auto">

        <div style="height: 630px;width: 400px;margin: auto;background:rgba(186,228,252,0.4);position: relative;top: 20px;
         border-radius: 8px">


            <div style="height: 20px"></div>

            <div style="width: 100%;height: 20px;text-align: center">
                <label style="font-family: 'Adobe Kaiti Std';font-size: 220%">申请详情</label>
            </div>

            <div style="height: 30px"></div>

            <div>
                <table  class="table table-striped" style="width: 400px;table-layout: fixed">
                    <tr class="red" style="height: 30px">

                        <td width="30%">申请标题</td>
                        <td><?php echo ($apl_detail["apl_title"]); ?></td>
                    </tr>

                    <tr>
                        <td>申请课程</td>
                        <td><?php echo ($apl_detail["apl_course"]); ?></td>
                    </tr>

                    <tr>
                        <td>薪资</td>
                        <td><?php echo ($apl_detail["apl_salary"]); ?></td>
                    </tr>

                    <tr>
                        <td>授课频率</td>
                        <td><?php echo ($apl_detail["apl_frequency"]); ?></td>
                    </tr>

                    <tr>
                        <td>学生</td>
                        <td><?php echo ($apl_detail["stu_name"]); ?></td>
                    </tr>

                    <tr>
                        <td>性别</td>
                        <td><?php echo ($apl_detail["stu_sex"]); ?></td>
                    </tr>

                    <tr>
                        <td>所在学校</td>
                        <td><?php echo ($apl_detail["stu_school"]); ?></td>
                    </tr>

                    <tr>
                        <td>学历</td>
                        <td><?php echo ($apl_detail["stu_education"]); ?></td>
                    </tr>

                    <tr>
                        <td>年级</td>
                        <td><?php echo ($apl_detail["stu_grade"]); ?></td>
                    </tr>

                    <tr>
                        <td>家教地址</td>
                        <td><?php echo ($apl_detail["stu_address"]); ?></td>
                    </tr>

                    <tr>
                        <td>学生简介</td>
                        <td><?php echo ($apl_detail["stu_introduce"]); ?></td>
                    </tr>

                    <tr>
                        <td>发布日期</td>
                        <td><?php echo ($apl_detail["apl_date"]); ?></td>
                    </tr>
                </table>
            </div>

            <div style="width: 100%;text-align: center;position: relative;top: 20px">
                <a name="want" id="want">
                    <button class="button bg-sub" type="submit" value="GO" style="width: 290px">
                        我想当他/她的老师</button>
                </a>
                <a href="<?php echo U('Home/Teacher/teacher');?>">
                    <button class="button">返回</button>
                </a>
            </div>

        </div>



    </div>

</div>

<script src="/Public/js/jquery-3.2.1.min.js"></script>
<body>


<?php if(isLogin()): ?><span class="is_login" hidden>1</span>
    <?php else: ?>
    <span class="is_login" hidden>0</span><?php endif; ?>
<script>
    $(document).ready(function () {
        var is_login = $(".is_login").text();
        $("#want").click(function () {
            if (1 == is_login){
                if(confirm("确认应聘吗？")){
                    var stu_id = "<?php echo ($apl_detail["apl_user_id"]); ?>";
                    var address = 'http://118.89.151.243/Home/Teacher/makeRequest?stu_id=' + stu_id;
                    $(location).attr('href', address);
                }
            } else{
                if(confirm("您需要登录, 现在登录吗？"))
                    $(location).attr('href', 'http://118.89.151.243/Home/LoginRegister/login');
            }
        });
    })
</script>
</body>
</html>