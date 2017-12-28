<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站内信</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <script src="/Public/js/pintuer.js"></script>
</head>
<body>
<style>
    .navigation {
        margin:auto auto 10px 10px;
        float:left;
    }
    .wp-paginate {
        padding:0;
        margin:0;
    }
    .wp-paginate li {
        float:left;
        list-style:none;
        margin:2px;
        padding:0;
    }
    .wp-paginate a {
        margin:0 2px;
        line-height:20px;
        text-align:center;
        text-decoration:none;
        border-radius:3px;
        -moz-border-radius:3px;
        float:left;
        min-height:20px;
        min-width:20px;
        color:#858585;
        border:2px #e3e3e3 solid;
        border-radius:13px;
        font-size:11px;
    }
    .wp-paginate a:hover {
        border:2px #858585 solid;
        color:#858585;
    }
    .wp-paginate .title {
        color:#555;
        margin:0;
        margin-right:4px;
        font-size:14px;
    }
    .wp-paginate .gap {
        color:#999;
        margin:0;
        margin-right:4px;
    }
    .wp-paginate .current {
        margin:0 2px;
        line-height:20px;
        text-align:center;
        text-decoration:none;
        border-radius:3px;
        -moz-border-radius:3px;
        float:left;
        font-weight:700;
        min-height:20px;
        min-width:20px;
        color:#262626;
        border:2px #119eda solid;
        border-radius:13px;
        font-size:11px;
        color:#119eda;
    }
    .wp-paginate .page {
        margin:0;
        padding:0;
    }
    .wp-paginate .prev {
    }
    .wp-paginate .next {
    }
</style>
<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="width: 100%;height: 630px;background-color: #eeeeee">

    <div style="background-image: url(/picture/Teacher/letter1.bmp);height: 550px;width: 1200px;position: relative;top: 30px;margin: auto">

        <div style="height: 100px;text-align: center">

            <div style="height: 20px"></div>
            <span style="font-size: 250%">
                教师站内信
            </span>

        </div>

        <div style="height: 300px; width: 600px; text-align: center;margin:auto">
            <div style="height: 300px;width: 500px; text-align: center;margin: auto;">
                <?php if(empty($tec_msg)): ?><span style="font-size: 130%">
                    您的收件箱中没有站内信!
               </span>
                    <?php else: ?>
                    <table class="table table-striped" style="width: 500px">
                        <tr class="red">
                            <td style="width: 50%">消息标题</td>
                            <td>消息类型</td>
                            <td>时间</td>
                        </tr>
                        <?php if(is_array($tec_msg)): $i = 0; $__LIST__ = $tec_msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href="<?php echo U('Home/Teacher/tecMsgContent', array('msg_id'=>$m['msg_id']));?>"><?php echo ($m["msg_title"]); ?></a></td>
                                <td><?php echo ($m["msg_type"]); ?></td>
                                <td><?php echo ($m["msg_time"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table><?php endif; ?>
                <!--<div class="navigation">-->
                    <!--<ol class="wp-paginate">-->
                        <!--<li><span class="title">Pages:</span></li>-->
                        <!--<li><span class="page current">1</span></li>-->
                        <!--<li><a href="" title="2" class="page">2</a></li>-->
                        <!--<li><a href="" title="3" class="page">3</a></li>-->
                        <!--<li><a href="" title="4" class="page">4</a></li>-->
                        <!--<li><a href="" title="5" class="page">5</a></li>-->
                        <!--<li><a href="" title="6" class="page">6</a></li>-->
                        <!--<li><a href="" title="7" class="page">7</a></li>-->
                        <!--<li><span class="gap">...</span></li>-->
                        <!--<li><a href="" title="31" class="page">31</a></li>-->
                        <!--<li><a href="" class="next">&gt;</a></li>-->
                    <!--</ol>-->
                <!--</div>-->

            </div>
            <div class="result page"><?php echo ($page); ?></div>


            <div style="height: 50px;width: 200px;margin:auto;position: relative;bottom: 1px">
                <a href="<?php echo U('Home/Teacher/tecCenter');?>">
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