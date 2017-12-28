<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>
<body>


<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

</div>

<div style="height: 50px">

</div>

 <!--<div style="margin: auto;width: 1200px;background-color:white;height: 50px;border-top-left-radius: 8px;border-top-right-radius:8px ">


    <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">欢迎注册新账号！带有
        <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
        的为必填项！</label>

</div>
-->
<div style="margin: auto;width: 1200px;background-image: url(/picture/LoginRegister/register.jpg);height: 675px">

    <div style="background-color: white;height: 600px;width: 560px;margin: auto;opacity: 0.65;position: relative;top: 40px;
        border-radius: 8px">

        <div style="height: 90px">
            <h1 id="title" style=" color: black;font-size: 200%;font-family:'Adobe Song Std';margin-left: 20px">注册新账号</h1>
            <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">带有
                <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
                的为必填项！</label>
        </div>

        <form name="register_form" id="register_form" action="<?php echo U('Home/LoginRegister/register');?>" method="post">

            <div style="height: 2px"></div>
            <div style="background-color: white;height: 50px;" class="form-group" >
                <div style="float: left;width: 170px;text-align: right" >
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">您的身份:</label>
                </div>

                <div style="float: right;width: 360px;height:50px" class="field">
                    <div class="button-group radio" style="float: right;width: 360px;margin-top: 10px">
                        <label class="button" style="margin-left: 11px">
                            <input name="user_type" value="1" type="radio" id="type1">教师
                        </label>
                        <label class="button">
                            <input name="user_type" value="2" type="radio" id="type2">学生
                        </label>

                    </div>
                </div>
            </div>

            <div style="height: 5px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">用户名:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="user_name" id="user_name" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入用户名" ><br>
                </div>
            </div>



            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">密码:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="password" name="user_pwd" id="user_pwd" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入密码" ><br>
                </div>
            </div>

            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">确认密码:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="password" name="user_repwd" id="user_repwd" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请再次输入密码"><br>
                </div>
            </div>

            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">手机号:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="user_phone" id="user_phone" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入手机号"><br>
                </div>
            </div>

            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">邮箱:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="email" name="user_email" id="user_email" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入邮箱"><br>
                </div>
            </div>


            <div style="height: 50px"></div>

            <div style="height: 10px;width: 100%;text-align: center">
                <button type="submit" value="注册" class="button bg-sub" style="width: 50%" >
                    注册
                </button>

            </div>

            <div style="height: 30px">

            </div>

            <div style="height: 20px;width: 120px;text-align: center;border-radius: 5px;margin-left:54%">
                <a href="<?php echo U('Home/LoginRegister/login');?>">
                    <p style="color:dodgerblue;">
                        已有账号，去登录
                    </p>
                </a>

            </div>

        </form>

    </div>



</div>

<!--

<div id="div_entire" style="height: 680px; width: 560px;border-radius: 1%;border: 0.4px solid;text-align: left;margin: 0 auto">

   <!-- <div style="height: 100px">
        <h1 id="title" style=" color: black;font-size: 200%;font-family:'Adobe Song Std';margin-left: 20px">注册新账号</h1>
        <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">带有
            <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
            的为必填项！</label>
    </div>


    <!--直线
    <div style="width: 100%;height: 1px;background-color: #797979">
    </div>

    <form name="register_form" id="register_form" action="<?php echo U('Home/LoginRegister/register');?>" method="post">

    <div style="height: 20px"></div>
        <div style="background-color: white;height: 50px;" class="form-group" >
            <div style="float: left;width: 170px;text-align: right" >
                <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">您的身份:</label>
            </div>

            <div style="float: right;width: 360px;height:50px" class="field">
                <div class="button-group radio" style="float: right;width: 360px;margin-top: 10px">
                    <label class="button active" style="margin-left: 11px">
                        <input name="user_type" value="1" checked="checked" type="radio" id="type1">教师
                    </label>
                    <label class="button">
                        <input name="user_type" value="2" type="radio" id="type2">学生
                    </label>

                </div>
            </div>
        </div>

        <div style="height: 5px"></div>

    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">用户名:</label>
        </div>

        <div style="float: right;width: 360px">
            <input type="text" name="user_name" id="user_name" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>

    <div style="height: 5px"></div>

    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">密码:</label>
        </div>

        <div style="float: right;width: 360px">
            <input type="password" name="user_pwd" id="user_pwd" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>

    <div style="height: 5px"></div>

    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">确认密码:</label>
        </div>

        <div style="float: right;width: 360px">
            <input type="password" name="user_repwd" id="user_repwd" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>

    <div style="height: 5px"></div>

    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">手机号:</label>
        </div>

        <div style="float: right;width: 360px">
            <input type="text" name="user_phone" id="user_phone" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>

    <div style="height: 5px"></div>

    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">邮箱:</label>
        </div>

        <div style="float: right;width: 360px">
            <input type="email" name="user_email" id="user_email" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>


    <div style="height: 50px"></div>

    <div style="height: 10px;width: 100%;text-align: center">
        <button type="submit" value="注册" class="button bg-sub" style="width: 50%" >
            注册
        </button>

    </div>

        <div style="height: 30px">

        </div>
        
        <div style="height: 20px;width: 120px;text-align: center;border-radius: 5px;margin-left:54%">
            <a href="<?php echo U('Home/LoginRegister/login');?>">
               <label style="color:dodgerblue;">
                   已有账号，去登录
               </label>
            </a>
            
        </div>

    </form>

</div>

-->
</body>
</html>