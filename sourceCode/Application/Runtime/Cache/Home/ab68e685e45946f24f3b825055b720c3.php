<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>家教申请</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>

</head>
<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 40px"></div>

<div style="margin: auto;width: 1200px;background-image: url(/picture/student/wanshan2.jpg);height: 750px">

    <div style="background-color: white;height: 680px;width: 560px;margin: auto;opacity: 0.65;position: relative;top: 40px;
        border-radius: 8px">

        <div style="height: 100px">
            <h1 id="title" style=" color: black;font-size: 200%;font-family:'Adobe Song Std';margin-left: 20px">申请家教</h1>
            <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">带有
                <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
                的为必填项！</label>
        </div>


        <form name="tec_apply_form" id="tec_apply_form" action="" method="post">

            <div style="height: 5px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">申请标题:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="apl_title" id="apl_title" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入标题"><br>
                </div>
            </div>

            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">申请课程:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="apl_course" id="apl_course" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入课程名"><br>
                </div>
            </div>

            <div style="height: 10px"></div>


            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">申请薪资:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="apl_salary" id="apl_salary" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入薪资"><br>
                </div>
            </div>

            <div style="height: 10px"></div>


            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">授课频率:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="apl_frequency" id="apl_frequency" style="margin-top: 3.5%;margin-left: 10px;
            width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入授课频率"><br>
                </div>
            </div>

            <div style="height: 20px"></div>

            <div style="background-color: white;height: 50px">
                <div style="float: left;width: 170px;text-align: right">

                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">申请描述：</label>
                </div>

                <div style="float: right;width: 360px">

                </div>
            </div>

            <div style="height: 100px;width: 100%">
                <textarea name="apl_description" id="apl_description"  style="resize: none;width: 400px;height: 100px;margin-left: 15%;border-radius: 5px;border: 0.1px solid;border-color: gray" ></textarea>
            </div>

            <div style="height: 90px"></div>

            <div style="height: 10px;width: 100%;text-align: center">
                <button type="submit" value="提交" class="button bg-sub" style="width: 60%" >
                    提交
                </button>
            </div>
        </form>

    </div>

</div>



<script>
    $(document).ready(function () {

    })
</script>
</body>
</html>