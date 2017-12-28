<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/Public/css/Teacher/style.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="/Public/css/bootstrap/bootstrap.css">
</head>
<body>
<h3>教师端</h3><br>
<a href="<?php echo U('Home/Index/homePage');?>">HOME</a><br>
<?php switch($is_login): case "0": ?><a href="<?php echo U('Home/LoginRegister/login');?>">登录</a><?php break;?>
    <?php case "1": echo ($name); ?>
        <?php switch($user_type): case "1": ?>老师<?php break;?>
            <?php case "2": ?>同学<?php break; endswitch;?>
        ，您好
        <?php if(($is_info) == "0"): ?><a id="fill_info_href">去完善一下个人信息吧</a><br><?php endif; ?>
        <?php if(($is_info) == "1"): ?><a id="person_center" href="<?php echo U('Home/Teacher/tecCenter');?>">个人中心</a><br><?php endif; ?>
        <!--<a href="">个人中心</a>-->
        <a href="https://www.fangzhouf.org/Home/LoginRegister/quitLogin">退出登录</a><br><?php break; endswitch;?>
<br>
看看有哪些同学想找家教
<div class="w_0100 c_0100_bg3" id="thyw">

    <div class="w_1200">
        <div class="c_1200_4_other">
            <div class="t_1200_3" id="#q0">
                <!--<ul>-->
                    <?php if(is_array($stu_apply)): $i = 0; $__LIST__ = $stu_apply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sta): $mod = ($i % 2 );++$i;?><!--hahah是<?php echo ($i); ?>-->
                        <?php if(isFour($i)): ?><ul><?php endif; ?>
                        <li id="<?php echo ($sta["apl_id"]); ?>">
                            <div class="img_379">
                                <a href="<?php echo U('Home/Teacher/showApplyDetail', array('id'=>$sta['apl_user_id']));?>">
                                    <img src="/picture/Teacher/main_img157774224.jpg" width="100%">
                                </a>
                            </div>
                            <div class="d_321">
                                <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($sta["apl_title"]); ?></nobr></a></div>
                                <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($sta["apl_course"]); ?></nobr></a></div>
                                <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($sta["apl_date"]); ?></nobr></a></div>
                                <div class="t_321_2">
                                    <a href="<?php echo U('Home/Teacher/showApplyDetail', array('id'=>$sta['apl_user_id']));?>" class="a_mnew">查看详情</a>
                                </div>
                            </div>
                        </li>
                        <?php if(isThree($i)): ?></ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('.t_1200_3 li').hover(function () {
        $(this).stop().animate({ margin: "0 31px 14px 0" });
    }
    , function () {
        $(this).stop().animate({ margin: "14px 31px 0 0" });
    })

</script>
<script>
    $(document).ready(function () {
        var type = "<?php echo ($user_type); ?>";
        if (1 == type){
            $("#fill_info_href").attr({
                "href" : "https://www.fangzhouf.org/Home/Teacher/fillInfo.html"
            });

            $("#person_center").attr({
                "href" : "https://www.fangzhouf.org/Home/Teacher/tecCenter.html"
            });
        }
        else{
            $("#fill_info_href").attr({
                "href" : "https://www.fangzhouf.org/Home/Student/fillInfo.html"
            });

            $("#person_center").attr({
                "href" : "https://www.fangzhouf.org/Home/Student/stuCenter.html"
            });
        }
    })
</script>
</body>
</html>