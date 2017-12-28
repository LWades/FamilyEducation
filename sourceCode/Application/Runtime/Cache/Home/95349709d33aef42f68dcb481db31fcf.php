<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站内信</title>

    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>
<style>
    .hwh-page-info a{color: #CCC;}.hwh-page-info a em{font-style: normal;margin: 0 2px;}
</style>
<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="width: 100%;height: 630px;background-color: #eeeeee">

    <div style="background-image: url(/picture/Student/letter1.bmp);height: 550px;width: 1200px;position: relative;top: 30px;margin: auto">

        <div style="height: 100px;text-align: center">

            <div style="height: 20px"></div>
            <span style="font-size: 250%">
                学生站内信
            </span>

        </div>

        <div style="height: 300px; width: 600px; text-align: center;margin:auto">
            <div style="height: 300px;width: 500px; text-align: center;margin: auto;">
                <?php if(empty($stu_msg)): ?><span style="font-size: 130%">
                    您的收件箱中没有站内信!
               </span>
                    <?php else: ?>
                    <table class="table table-striped" style="width: 500px">
                        <tr class="red">
                            <td style="width: 50%">消息标题</td>
                            <td>消息类型</td>
                            <td>时间</td>
                        </tr>
                        <?php if(is_array($stu_msg)): $i = 0; $__LIST__ = $stu_msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href="<?php echo U('Home/Student/stuMsgContent', array('msg_id'=>$m['msg_id']));?>"><?php echo ($m["msg_title"]); ?></a></td>
                                <td><?php echo ($m["msg_type"]); ?></td>
                                <td><?php echo ($m["msg_time"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table><?php endif; ?>
            </div>
            <!--<div class="hwh-page-info page"><?php echo ($page); ?></div>-->
            <!--<div class="hwh-page-info"><?php echo ($page); ?></div>-->
            <div class="result page"><?php echo ($page); ?></div>



            <div style="height: 50px;width: 200px;margin:auto;position: relative;bottom: 1px">
                <a href="<?php echo U('Home/Student/stuCenter');?>">
                    <button class="button bg-blue" style="width: 100px">
                        返回
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>