<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
</head>
<script src="/Public/js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/pintuer.js"></script>
<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>


<div style="width: 100%;height: 90px;background-color: #eeeeee;text-align: center;margin: auto">
    <span style="height: 90px;font-size: 250%;font-family: 'Adobe Song Std'">
        个人中心
    </span>

    <span style="position: relative;left: 190px;top: 60px;float: left;font-size: 120%">
        <a href="<?php echo U('Home/Teacher/teacher');?>"> &lt;返回&gt;</a>
    </span>


</div>

<div style="background-color: #eeeeee;height: 880px">
    <div style="background-color: #eeeeee;margin:auto;width: 1050px;height: 800px;
        background-image: url(/picture/Teacher/myApply.bmp)">

        <div style="height: 10px"></div>

        <div style="height: 200px;width: 600px;position: relative;right: 20px;top:20px;background:rgba(255,255,255,0.7);float: right;border-radius: 5px">

            <div style="height: 30px"></div>
            <div style="height: 30px;text-align: center;">
                <h3 style="font-size: 170%">申请信息</h3>
            </div>

            <?php switch($is_apply): case "0": ?><div>
                        <label style="font-size: 110%">当前的申请</label>
                        <table  class="table table-striped" style="width: 600px;table-layout: fixed; height: 20px">
                            <tr class="red" style="height: 30px">

                                <td style="width: 80%"><a href="<?php echo U('Home/Teacher/myApply');?>"><?php echo ($apl_info["apl_title"]); ?></a></td>
                                <td>
                                    <a name="cancel_apply" id="cancel_apply">
                                        <button class="button bg-blue">
                                            取消申请
                                        </button>

                                    </a>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div style="height: 20px">

                    </div><?php break;?>
                <?php case "1": ?><div style="text-align: center">
                        还未申请家教，
                        <a href="<?php echo U('Home/Teacher/submitApply');?>">
                            <button class="button bg-blue">
                                去申请
                            </button>

                        </a>
                    </div><?php break; endswitch;?>
        </div>



        <div style="border-radius:5px;width: 300px;height: 600px;position: relative;top: 20px;left: 50px;background:rgba(255,255,255,0.7)" id="info_div">


            <div style="width: 100%;height: 20px">

            </div>

            <div style="width: 100%;height: 30px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 140%">
                个人信息

            </div>

            <div style="width: 100%;height: 45px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                真实姓名：<?php echo ($tec_info["tec_name"]); ?>&nbsp;&nbsp;
            </div>

            <div style="width: 100%;height: 45px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                性别：<?php echo ($tec_info["tec_sex"]); ?><br>
            </div>

            <div style="width: 100%;height: 45px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                学历：<?php echo ($tec_info["tec_education"]); ?><br>
            </div>

            <div style="width: 100%;height: 45px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                年级：<?php echo ($tec_info["tec_grade"]); ?>&nbsp;&nbsp;
            </div>

            <div style="width: 100%;height: 45px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                学院：<?php echo ($tec_info["tec_department"]); ?><br>
            </div>

            <div style="width: 100%;height: 45px;;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                专业：<?php echo ($tec_info["tec_profession"]); ?><br>
            </div>


            <div style="width: 60%;height: 30px;margin: auto; font-family: 'Adobe Kaiti Std';font-size: 120%">
                简介：
            </div>

            <div style="margin: auto;width: 85%;height: 190px;border: 0.5px solid;border-color: black;font-family: 'Adobe Kaiti Std';font-size: 120%">
                <?php echo ($tec_info["tec_introduce"]); ?><br>
            </div>

            <div style="height: 10px"></div>

            <div style="width: 100%;height: 30px;text-align: center;font-family: 'Adobe Kaiti Std';font-size: 120%">
                <button class="button bg-sub" id="edit_info">编辑</button>

            </div>


        </div>

        <div id="edit_info_div" style="display:none;border-radius:5px;width: 300px;height: 600px;position: relative;top: 20px;left: 50px;background:rgba(255,255,255,0.7)">
            <form id="edit_info_form" name="edit_info_form" action="<?php echo U('Home/Teacher/editInfo');?>" method="post">

                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 9px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            真实姓名：
                        </label>
                    </div>


                    <div style="width: 60%;height: 100%; float: right">
                        <input type="text" id="tec_name" name="tec_name" value="<?php echo ($tec_info["tec_name"]); ?>"style="position:relative;top: 11px;
                    border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
                    </div>
                </div>

                <div style="height: 2px"></div>

                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 25px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            性别：
                        </label>
                    </div>


                    <div style="width: 60%;height: 100%; float: right">
                        <input type="radio" name="stu_sex" id="tec_sex1" value="male" style="position: relative;top: 16px">
                        <label style="position: relative;top: 16px">男</label>
                        <input type="radio" name="stu_sex" id="tec_sex2" value="female" style="position: relative;top: 16px">
                        <label style="position: relative;top: 16px">
                            女
                        </label><br>
                    </div>
                </div>

                <div style="height: 2px"></div>

                <!--     <div style="width: 100%;height: 45px">
                         <div style="width: 40%;height:100%;float: left;text-align: center">
                             <label style="position: relative;top: 9.4px;left: 25px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                                 学校：
                             </label>
                         </div>


                         <div style="width: 60%;height: 100%; float: right">
                             <input type="text" id="stu_school" name="stu_school" value="<?php echo ($stu_info["stu_school"]); ?>"style="position:relative;top: 11px;
                         border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
                         </div>
                     </div>
     -->
                <div style="height: 2px"></div>

                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 25px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            学历：
                        </label>
                    </div>

                    <div style="width: 60%;height: 100%; float: right">
                        <select name="tec_education" id="tec_education"  style="position: relative;top: 11px">
                            <option id="stu_edc1" value="1">本科生</option>
                            <option id="stu_edc2" value="2">研究生</option>

                        </select>
                    </div>
                </div>

                <div style="height: 2px"></div>

                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 25px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            年级：
                        </label>
                    </div>

                    <div style="width: 60%;height: 100%; float: right">
                        <select name="tec_grade" id="tec_grade" style="position: relative;top: 11px">
                            <option id="tec_grade1" value="1">一年级</option>
                            <option id="tec_grade2" value="2">二年级</option>
                            <option id="tec_grade3" value="3">三年级</option>
                            <option id="tec_grade4" value="4">四年级</option>

                        </select>
                    </div>
                </div>


                <div style="height: 2px"></div>


                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 9px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            院系：
                        </label>
                    </div>


                    <div style="width: 60%;height: 100%; float: right">
                        <input type="text" id="tec_department" name="tec_department" value="<?php echo ($tec_info["tec_department"]); ?>"style="position:relative;top: 11px;
                    border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
                    </div>
                </div>


                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 9px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            专业：
                        </label>
                    </div>


                    <div style="width: 60%;height: 100%; float: right">
                        <input type="text" id="tec_profession" name="tec_profession" value="<?php echo ($tec_info["tec_profession"]); ?>"style="position:relative;top: 11px;
                    border-radius: 5px;border: 0.1px solid;border-color: gray"><br>
                    </div>
                </div>



                <div style="width: 100%;height: 45px">
                    <div style="width: 40%;height:100%;float: left;text-align: center">
                        <label style="position: relative;top: 9.4px;left: 9px;font-family: 'Adobe Kaiti Std';font-size: 120%">
                            简介：
                        </label>
                    </div>


                    <div style="width: 60%;height: 100%; float: right">

                    </div>
                </div>


                <div style="width: 100%;height: 170px;text-align: center">
                    <textarea style="resize: none;width: 270px;height: 170px" id="tec_introduce" name="tec_introduce"><?php echo ($tec_info["tec_introduce"]); ?></textarea><br>

                </div>

                <div style="height: 20px">

                </div>

                <div style="width: 100%;height: 45px;text-align: center">
                    <button class="button bg-sub" id="save_info" type="submit">保存</button>
                </div>

            </form>
        </div>

        <div style="height: 400px;width: 600px;position: relative;right: 20px;bottom: 320px;background:rgba(255,255,255,0.7);float: right;border-radius: 5px">

            <div style="height: 30px"></div>
            <div style="height: 30px;text-align: center;">
                <h3 style="font-size: 170%">请求信息</h3>
            </div>

            <div style="height: 10px"></div>

            <?php switch($is_request): case "1": ?><table  class="table table-striped" style="width: 600px;table-layout: fixed; height: 20px">
                        <tr class="red" style="height: 40px">
                            <td>标题</td>
                            <td>学生</td>
                            <td>请求日期</td>
                            <td>状态</td>
                            <td></td>

                        </tr>
                        <?php if(is_array($request)): $i = 0; $__LIST__ = $request;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href=""><?php echo ($r["apl_title"]); ?></a></td>
                                <td><?php echo ($r["stu_name"]); ?></td>
                                <td><?php echo ($r["req_time"]); ?></td>
                                <td><?php echo ($r["req_status"]); ?></td>
                                <td><a name="cancel_request" id="cancel_request" req_id="<?php echo ($r["req_id"]); ?>">
                                    <button class="button bg-blue">
                                        取消
                                    </button>
                                </a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="result page" style="margin: auto;width: 600px;text-align: center;position: relative;top: 180px"><?php echo ($page); ?></div>
                    <!--<div ><?php echo ($page); ?></div>--><?php break;?>
                <?php case "0": ?><div style="height: 10px">

                    </div>
                    <div style="text-align: center">
                        没有家教请求，
                        <a href="<?php echo U('Home/Teacher/teacher');?>">
                            <button class="button bg-blue">
                                去看看
                            </button>

                        </a>
                    </div><?php break; endswitch;?>
        </div>

        <div style="height: 50px;width: 300px;background:rgba(255,255,255,0.7); float: left;position: relative;top: 50px;left: 50px;border-radius: 10px">
            <span style="float: left;width: 50%;font-size: 130%;text-align: center;height: 50px;position: relative;top: 10px;">站内信</span>

            <span style="float: right;width: 50%;position: relative;top: 6px">
                  <a href="<?php echo U('Home/Teacher/tecMsg');?>">
                    <button class="button bg-blue" style="height: 35px">
                    阅读站内信
                    </button>
                  </a>
            </span>
        </div>
    </div>
</div>

</body>

<script>
    $(document).ready(function () {
        $("#edit_info_div").hide();
        $("#edit_info").click(function () {
            $("#info_div").hide();
            $("#edit_info_div").show();
        })

        $("#tec_education").change(function () {
            if (2 == $(this).children('option:selected').val())
                $("#tec_grade4").hide();
            else
                $("#tec_grade4").show();
        });

        //编辑时先给元素设置当前的值
        var sex = "<?php echo ($tec_info["tec_sex"]); ?>";
        if (sex == "男生")
            $("#tec_sex1").attr("checked", true);
        else
            $("#tec_sex2").attr("checked", true);

        var education = "<?php echo ($tec_info["tec_education"]); ?>";
        if ("本科生" == education)
            $("#tec_edc1").attr("selected", true);
        else
            $("#tec_edc2").attr("selected", true);

        var grade = "<?php echo ($tec_info["tec_grade"]); ?>"
        switch (grade){
            case "一年级":
                $("#tec_grade1").attr("selected", true);
                break;
            case "二年级":
                $("#tec_grade2").attr("selected", true);
                break;
            case "三年级":
                $("#tec_grade3").attr("selected", true);
                break;
            case "四年级":
                $("#tec_grade4").attr("selected", true);
                break;
            default:
                break;
        }

        $("#cancel_apply").click(function () {
            if(confirm("确认取消此申请吗？")){
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Teacher/deleteApply');
            }
        });

        $("#cancel_request").click(function () {
            if (confirm("确认取消此请求吗？")){
                var req_id = $(this).attr('req_id');
                var address = 'https://www.fangzhouf.org/Home/Teacher/deleteRequest?req_id=' + req_id;
                $(location).attr('href', address);
            }
        })
    })
</script>
</html>