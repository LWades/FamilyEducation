<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>完善个人信息</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css?ver=<?php echo time(); ?>">
    <script src="/Public/js/pintuer.js"></script>

</head>
<body>


<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 40px"></div>

<div style="margin: auto;width: 1200px;background-image: url(/picture/Student/wanshan.jpg);height: 750px">


    <div style="background-color: white;height: 720px;width: 560px;margin: auto;opacity: 0.65;position: relative;top: 20px;
        border-radius: 8px">


        <div style="height: 100px">
            <h1 id="title" style=" color: black;font-size: 200%;font-family:'Adobe Song Std';margin-left: 20px">完善个人信息</h1>
            <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">带有
                <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
                的为必填项！</label>
        </div>


        <form name="fill_info" id="fill_info" action="<?php echo U('Home/Student/fillInfo');?>" method="post">

            <div style="height: 25px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">真实姓名:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="stu_name" id="stu_name"
                           style="margin-top: 3.5%;margin-left: 10px;width: 240px;height: 25px;
                           border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入姓名"><br>
                </div>
            </div>

            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px;" class="form-group" >
                <div style="float: left;width: 170px;text-align: right" >
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">性别:</label>
                </div>

                <div style="float: right;width: 360px;height:50px" class="field">
                    <div class="button-group radio" style="float: right;width: 360px;margin-top: 10px">
                        <label class="button" style="margin-left: 11px">
                            <input name="gender" value="male" checked="checked" type="radio" style="margin-top: 10px"><span class="icon icon-male"></span> 男生
                        </label>
                        <label class="button">
                            <input name="gender" value="female" type="radio" style="margin-top: 10px"><span class="icon icon-female"></span> 女生
                        </label>

                    </div>
                </div>
            </div>



            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">学校:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="stu_school" id="stu_school"
                           style="margin-top: 3.5%;margin-left: 11px;width: 240px;height: 25px;
                           border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入学校"
                    ><br>
                </div>
            </div>



            <div style="height: 10px"></div>

            <div style="background-color: white;height: 50px">
                <div style="float: left;width: 170px;text-align: right">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">教育情况:</label>
                </div>

                <div style="float: right;width: 360px;height:50px">
                    <select name="stu_education" id="stu_education" style="margin-top: 3.2%;margin-left: 11px;width: 100px;height: 27px">
                        <option id="stu_edc1" value="1" selected>小学</option>
                        <option id="stu_edc2" value="2">初中</option>
                        <option id="stu_edc3" value="3">高中</option>
                    </select><br>
                </div>
            </div>




            <div style="height: 5px"></div>

            <div style="background-color: white;height: 50px">
                <div style="float: left;width: 170px;text-align: right">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">年级:</label>
                </div>

                <div style="float: right;width: 360px;height: 50px">
                    <select name="stu_grade" id="stu_grade" style="margin-top: 3.2%;margin-left: 11px;width: 100px;height: 27px">
                        <option value="1">一年级</option>
                        <option value="2">二年级</option>
                        <option value="3">三年级</option>
                        <option id="stu_grade4" value="4">四年级</option>
                        <option id="stu_grade5" value="5">五年级</option>
                        <option id="stu_grade6" value="6">六年级</option>
                    </select><br>
                </div>
            </div>




            <div style="height: 5px">

            </div>

            <div style="background-color: white;height: 50px" class="form-group">
                <div style="float: left;width: 170px;text-align: right" class="field field-icon">
                    <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">家庭住址:</label>
                </div>

                <div style="float: right;width: 360px" class="field field-icon">
                    <input type="text" name="stu_address" id="stu_address"
                           style="margin-top: 3.5%;margin-left: 10px;width: 240px;height: 25px;
                           border-radius: 5px;border: 0.1px solid;border-color: gray"
                           data-validate="required:请输入家庭住址"><br>
                </div>
            </div>

            <div style="height: 5px">

            </div>

            <div style="background-color: white;height: 50px">
                <div style="float: left;width: 170px;text-align: right">

                    <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">个人简介：</label>
                </div>

                <div style="float: right;width: 360px">

                </div>
            </div>

            <div style="height: 100px;width: 100%">
                <textarea name="stu_introduce" id="stu_introduce"  style="resize: none;width: 400px;height: 100px;margin-left: 15%;border-radius: 5px;border: 0.1px solid;border-color: gray" ></textarea>
            </div>

            <div style="height: 50px"></div>


            <div style="height: 10px;width: 100%;text-align: center">
                <button type="submit" value="提交" class="button bg-sub" style="width: 50%" >
                    提交
                </button>

            </div>
        </form>
    </div>
</div>

<!--

<div style="height: 100px"></div>

<div id="div_entire" style="height: 730px; width: 560px;border-radius: 1%;border: 0.4px solid;text-align: left;margin: 0 auto">

    <div style="height: 100px">
        <h1 id="title" style=" color: black;font-size: 200%;font-family:'Adobe Song Std';margin-left: 20px">完善个人信息</h1>
        <label  style="margin-left: 40px;margin-bottom: 5px;color: black;font-size: 110%;font-family:'Adobe Song Std'">带有
            <span style="color: red;line-height: 50px;margin-right: 5px;margin-left: 5px">*</span>
            的为必填项！</label>
    </div>


    <div style="width: 100%;height: 1px;background-color: #797979">
    </div>

    

<form name="fill_info" id="fill_info" action="<?php echo U('Home/Student/fillInfo');?>" method="post">

    <div style="height: 25px">

    </div>
    <div style="background-color: white;height: 50px">
        <div style="float: left;width: 170px;text-align: right">
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">真实姓名:</label>
        </div>

       <div style="float: right;width: 360px">
            <input type="text" name="stu_name" id="stu_name" style="margin-top: 3.5%;margin-left: 10px;width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
        </div>
    </div>

    <div style="height: 5px">

    </div>

    <div style="background-color: white;height: 50px;" class="form-group" >
        <div style="float: left;width: 170px;text-align: right" >
            <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
            <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">性别:</label>
        </div>

        <div style="float: right;width: 360px;height:50px" class="field">
            <div class="button-group radio" style="float: right;width: 360px;margin-top: 10px">
                <label class="button active" style="margin-left: 11px">
                    <input name="gender" value="male" checked="checked" type="radio" style="margin-top: 10px"><span class="icon icon-male"></span> 男生
                </label>
                <label class="button">
                    <input name="gender" value="female" type="radio" style="margin-top: 10px"><span class="icon icon-female"></span> 女生
                </label>

            </div>
        </div>
    </div>



        <div style="height: 5px">

        </div>

        <div style="background-color: white;height: 50px">
            <div style="float: left;width: 170px;text-align: right">
                <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">学校:</label>
            </div>

            <div style="float: right;width: 360px">
                <input type="text" name="stu_school" id="stu_school" style="margin-top: 3.5%;margin-left: 11px;width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
            </div>
        </div>



        <div style="height: 5px">

        </div>

        <div style="background-color: white;height: 50px">
            <div style="float: left;width: 170px;text-align: right">
                <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">教育情况:</label>
            </div>

            <div style="float: right;width: 360px;height:50px">
                <select name="stu_education" id="stu_education" style="margin-top: 3.2%;margin-left: 11px;width: 100px;height: 27px">
                    <option id="stu_edc1" value="1" selected>小学</option>
                    <option id="stu_edc2" value="2">初中</option>
                    <option id="stu_edc3" value="3">高中</option>
                </select><br>
            </div>
        </div>




        <div style="height: 5px">

        </div>

        <div style="background-color: white;height: 50px">
            <div style="float: left;width: 170px;text-align: right">
                <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">年级:</label>
            </div>

            <div style="float: right;width: 360px;height: 50px">
                <select name="stu_grade" id="stu_grade" style="margin-top: 3.2%;margin-left: 11px;width: 100px;height: 27px">
                    <option value="1">一年级</option>
                    <option value="2">二年级</option>
                    <option value="3">三年级</option>
                    <option id="stu_grade4" value="4">四年级</option>
                    <option id="stu_grade5" value="5">五年级</option>
                    <option id="stu_grade6" value="6">六年级</option>
                </select><br>
            </div>
        </div>




        <div style="height: 5px">

        </div>

        <div style="background-color: white;height: 50px">
            <div style="float: left;width: 170px;text-align: right">
                <span style="color: red;line-height: 50px;margin-right: 5px">*</span>
                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">家庭住址:</label>
            </div>

            <div style="float: right;width: 360px">
                <input type="text" name="stu_address" id="stu_address" style="margin-top: 3.5%;margin-left: 10px;width: 240px;height: 25px;border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
            </div>
        </div>

        <div style="height: 5px">

        </div>

        <div style="background-color: white;height: 50px">
            <div style="float: left;width: 170px;text-align: right">

                <label style="font-family: 'Adobe Song Std';font-size: large;line-height: 50px">个人简介：</label>
            </div>

            <div style="float: right;width: 360px">

            </div>
        </div>

        <div style="height: 100px;width: 100%">
            <textarea name="stu_introduce" id="stu_introduce"  style="resize: none;width: 400px;height: 100px;margin-left: 15%;border-radius: 5px;border: 0.1px solid;border-color: gray" ></textarea>
        </div>

        <div style="height: 50px">

        </div>


        <div style="height: 10px;width: 100%;text-align: center">
            <button type="submit" value="提交" class="button bg-sub" style="width: 50%" >
               提交
            </button>

        </div>
-->

<script>
    $(document).ready(function () {
        $("#stu_education").change(function () {
//            alert($(this).children('option:selected').val());
            if (1 == $(this).children('option:selected').val()) {
                $("#stu_grade4").show();
                $("#stu_grade5").show();
                $("#stu_grade6").show();
            }else {
                $("#stu_grade4").hide();
                $("#stu_grade5").hide();
                $("#stu_grade6").hide();
            }
        });
    });
</script>

</body>
</html>