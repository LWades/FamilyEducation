<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>

    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css?ver=<?php echo time(); ?>">
    <script src="/Public/js/pintuer.js"></script>
</head>
<body>


<div style="height: 41px;background-color: #379be9;width: 100%;margin: auto">

</div>

<div style="height: 50px">

</div>

<div style="margin: auto;width: 1200px;background-image: url(/picture/LoginRegister/login_background.bmp);width: 1200px;height: 527px">

    <div style="height: 400px;width: 350px;background-color: white;opacity:0.9;border-radius: 5px;position: relative;left: 70px;top: 75px">

        <label style="font-family: Microsoft YaHei;font-size: 115%;position: relative;top: 20px;left: 20px">
            密码登录
            <div style="height:30px"></div>

            <form method="post" class="form-auto" name="login_form" id="login_form" action="<?php echo U('Home/LoginRegister/login');?>">
                <div class="form-group">
                    <div class="field field-icon">
                        <input type="text" class="input" id="user_name" name="user_name" size="30" placeholder="账号"
                               name="user_name" id="user_name" style="width: 290px"
                               data-validate="required:请填写用户名/账号"/>
                        <span class="icon icon-user"></span>
                    </div>
                </div>

                <div style="height:30px"></div>
                <div class="form-group">
                    <div class="field field-icon">
                        <input type="password" class="input" id="user_pwd" name="user_pwd" size="30" placeholder="请输入密码"
                        style="width: 290px" data-validate="required:请填写密码"/>
                        <span class="icon icon-key"></span>
                    </div>
                </div>

                <div style="height: 36px"></div>

                <div class="form-button" style="text-align: center;width: 290px">
                    <button class="button bg-sub" type="submit" value="GO" style="width: 290px">
                        登录</button>
                </div>


                <div style="width: 100px;height: 30px;float: left;position: relative;top: 50px;
                    right: 2px">
                    <a  href="<?php echo U('Home/Index/homePage');?>">HOME</a>

                </div>

                <div style="width: 100px;height: 30px;float: right;position: relative;top: 50px;
                    right: 25px">
                    <a  href="<?php echo U('Home/LoginRegister/register');?>">免费注册</a>

                </div>
            </form>
        </label>
    </div>
</div>
</body>
</html>