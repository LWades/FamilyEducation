<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站内信</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>

</head>
<script src="/Public/js/jquery-3.2.1.min.js"></script>

<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 610px;background-color: #eeeeee">
    <br>
    <div style="width:70px; height: 30px;font-size: 110%;position: relative;top: 40px;left: 115px">
        <a href="<?php echo U('Home/Teacher/tecMsg');?>">&lt;返回&gt;</a>
    </div>

    <div style="height: 550px;width: 1200px;margin: auto;background-image: url(/picture/Teacher/letter1.bmp);position: relative;top: 40px">

        <?php switch($msg_type): case "3": ?><div style="height: 20px"></div>

                <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                    <?php echo ($msg_dtl["msg_title"]); ?><br>
                </div>

               <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
               </div>
                <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                    <?php echo ($msg_dtl["msg_content"]); ?><br>
                </div>


                <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                    学生姓名：<?php echo ($msg_dtl["stu_name"]); ?> &nbsp;&nbsp;性别：<?php echo ($msg_dtl["stu_sex"]); ?> &nbsp;&nbsp;学校：<?php echo ($msg_dtl["stu_school"]); ?><br>
                </div>

                <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                    学历：<?php echo ($msg_dtl["stu_education"]); ?>&nbsp;&nbsp;年级：<?php echo ($msg_dtl["stu_grade"]); ?>&nbsp;&nbsp;<br>
                </div>

                <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                    家教地址：<?php echo ($msg_dtl["stu_address"]); ?>&nbsp;&nbsp;<br>
                </div>

                <div style="width: 600px;height: 150px;margin: auto;text-align: center">
                    <div style="height: 40px">
                        简介：
                    </div>

                    <div style="height: 110px;width: 400px;margin: auto">
                        <?php echo ($msg_dtl["stu_introduce"]); ?><br>
                    </div>
                </div>

                <div style="width: 600px;height: 50px;margin: auto;text-align: center">

                    <br>
                    <?php switch($msg_accept): case "0": ?>
                        <div>
                            <a name="agree" id="agree">
                                <button class="button bg-blue">
                                    同意请求
                                </button>

                            </a>
                            <a name="disagree" id="disagree">
                                <button class="button bg-blue">
                                    不同意请求
                                </button>

                            </a>
                            <?php break;?>
                        </div>

                        <div>
                            <?php case "1": ?><span>已同意</span><?php break;?>
                        </div>

                        <div>
                            <?php case "2": ?><span>已拒绝</span><?php break;?>
                        </div><?php endswitch;?>
                </div><?php break;?>



            <?php case "1": ?><div style="height: 30px"></div>
                <div style="height: 80px;width: 600px;margin: auto;text-align: center">
                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_title"]); ?><br>
                    </div>

                    <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
                    </div>
                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_content"]); ?><br>
                    </div>

                </div><?php break;?>



            <?php case "4": ?><div style="height: 30px"></div>
                <div style="height: 80px;width: 600px;margin: auto;text-align: center">

                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_title"]); ?><br>
                    </div>
                    <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
                    </div>

                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_content"]); ?><br><br>
                    </div>
                </div>

                <div style="width: 600px;height: 50px;margin: auto;text-align: center">

                <?php switch($msg_accept): case "0": ?>
                    <div>
                        <a name="accept" id="accept">
                            <button class="button bg-blue">
                                同意请求
                            </button>

                        </a>
                        <a name="refuse" id="refuse">
                            <button class="button bg-blue">
                                不同意请求
                            </button>

                        </a>
                        <?php break;?>
                    </div>

                    <div>
                        <?php case "1": ?><span>已同意</span><?php break;?>
                    </div>

                    <div>
                        <?php case "2": ?><span>已拒绝</span><?php break;?>
                    </div><?php endswitch;?>

                </div><?php break;?>




            <?php case "5": ?><div style="height: 30px"></div>
                <div style="height: 80px;width: 600px;margin: auto;text-align: center">


                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_title"]); ?><br>
                    </div>

                    <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
                    </div>

                    <div style="height: 40px">
                        <?php echo ($msg_dtl["msg_content"]); ?><br><br>
                    </div>
                </div>



                <div style="width: 600px;height: 50px;margin: auto;text-align: center">

                <?php switch($msg_accept): case "0": ?>
                    <div>
                        <a href="<?php echo U('Home/Teacher/acceptFace', array('msg_id'=>$msg_dtl['msg_id']));?>">
                            <button class="button bg-blue">
                                接受面试邀请
                            </button>

                        </a>
                        <a href="<?php echo U('Home/Teacher/refuseFace', array('msg_id'=>$msg_dtl['msg_id']));?>">
                            <button class="button bg-blue">
                                拒绝面试邀请
                            </button>
                        </a>
                        <?php break;?>
                    </div>


                    <?php case "1": ?>
                    <div>
                        <span>已同意</span>

                        <a href="<?php echo U('Home/Common/videoCall', array('msg_id'=>$msg_dtl['msg_id']));?>" target="_blank">
                             <button class="button bg-blue">
                                 进入面试模块
                             </button>

                        </a>

                        <?php break;?>
                    </div>

                    <?php case "2": ?>
                    <div>
                        <span>已拒绝</span>
                        <?php break;?>
                    </div><?php endswitch;?>
                </div><?php break; endswitch;?>
    </div>

</div>




<script>
    $(document).ready(function () {
        var msg_id = "<?php echo ($msg_dtl["msg_id"]); ?>"
        $("#agree").click(function () {
            if(confirm("确认同意家教请求并生成合同吗？")){
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Teacher/agreeRequest?msg_id=' + msg_id);
            }
        });

        $("#disagree").click(function () {
            if (confirm("确认拒绝这次请求吗？")){
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Teacher/refuseRequest?msg_id=' + msg_id);
            }
        });

        $("#accept").click(function () {
            if (confirm("确认接受吗？"))
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Teacher/acceptAgreement?msg_id=' + msg_id);
        })

        $("#refuse").click(function () {
            if (confirm("确认拒绝吗？"))
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Teacher/refuseAgreement?msg_id=' + msg_id);
        })
    })
</script>

</body>
</html>