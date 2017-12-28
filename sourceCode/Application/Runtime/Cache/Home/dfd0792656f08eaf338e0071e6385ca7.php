<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申请详情</title>

    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 40px;background-color: #eeeeee"></div>

<div style="height: 780px;width: 100%;background-color: #eeeeee">

    <div style="width: 1260px;height: 700px;background-image: url(/picture/Student/book_1.bmp);margin: auto">

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
                        <td>申请人</td>
                        <td><?php echo ($apl_detail["tec_name"]); ?></td>
                    </tr>


                    <tr>
                        <td>性别</td>
                        <td><?php echo ($apl_detail["tec_sex"]); ?></td>
                    </tr>


                    <tr>
                        <td>学历</td>
                        <td><?php echo ($apl_detail["tec_education"]); ?></td>
                    </tr>

                    <tr>
                        <td>年级</td>
                        <td><?php echo ($apl_detail["tec_grade"]); ?></td>
                    </tr>

                    <tr>
                        <td>所属院系</td>
                        <td><?php echo ($apl_detail["tec_department"]); ?></td>
                    </tr>

                    <tr>
                        <td>专业</td>
                        <td><?php echo ($apl_detail["tec_profession"]); ?></td>
                    </tr>

                    <tr>
                        <td align="right"></td>
                        <td>
                            <a id="resume">
                                <button class="button">
                                    查看附件
                                </button>

                            </a>
                            <br></td>
                    </tr>


                    <tr>
                        <td>个人简介</td>
                        <td><?php echo ($apl_detail["tec_introduce"]); ?></td>
                    </tr>

                    <tr>
                        <td>申请描述</td>
                        <td><?php echo ($apl_detail["apl_description"]); ?></td>
                    </tr>
                </table>
            </div>

            <div style="width: 100%;text-align: center;position: relative;top: 20px">
                <a name="want" id="want">
                    <button class="button bg-sub" type="submit" value="GO" style="width: 290px">
                        我想当他/她的老师</button>
                </a>

                <a href="<?php echo U('Home/Student/student');?>">
                     <button class="button">
                         返回
                     </button>

                </a>
            </div>

        </div>



    </div>

</div>


<!--









-->
<?php if(isLogin()): ?><span class="is_login" hidden>1</span>
    <?php else: ?>
    <span class="is_login" hidden>0</span><?php endif; ?>
<script>
    $(document).ready(function () {
        var is_login = $(".is_login").text();
        $("#want").click(function () {
            if (1 == is_login){
                if(confirm("确认请求吗？")){
                    var tec_id = "<?php echo ($apl_detail["apl_user_id"]); ?>";
                    var address = 'https://www.fangzhouf.org/Home/Student/makeRequest?tec_id=' + tec_id;
                    $(location).attr('href', address);
                }
            } else{
                if(confirm("您需要登录, 现在登录吗？"))
                    $(location).attr('href', 'https://www.fangzhouf.org/Home/LoginRegister/login');
            }
        });
        var file = "<?php echo ($apl_detail["tec_resume"]); ?>";
        $("#resume").attr({
            "href" : "https://www.fangzhouf.org/file/" + file
        });
    })
</script>
</body>
</html>