<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生主页</title>

    <link rel="stylesheet" href="/Public/css/Teacher/style.css">
    <link rel="stylesheet" href="/Public/css/bootstrap/bootstrap.css">
    <script src="/Public/js/jquery-3.2.1.min.js"></script>


</head>
<body>
<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

        <div style="width: 1200px;height: 80px;text-align: center;margin: auto">

            <div style="float: left;height: 90px;width: 300px">
                <a href="<?php echo U('Home/Index/homePage');?>">
                 <span style="font-size: 130%;position: relative;right:40px">
                   HOME
                </span>
                </a><br>
            </div>


<div style="width: 400px;height: 50px;float: right">



            <?php switch($is_login): ?><!--     <?php case "0": ?><div style="width: 100%;height: 30px">
                              <a href="<?php echo U('Home/LoginRegister/login');?>">
                                  <button class="btn bg-primary" style="width: 300px;background-color: #379be9;position: relative;top: 40px;left: 140px">
                                      登录
                                  </button>
                              </a>
                          </div><?php break;?>

                     -->

                <?php case "1": ?><div style="width: 500px;height: 80px;margin: auto;text-align: center;float: right">

                        <?php echo ($name); ?>
                        <?php echo ($name); ?>
                        <?php switch($user_type): case "1": ?>老师<?php break;?>



                            <?php case "2": ?>同学<?php break; endswitch;?>
                        ，您好
                        <?php if(($is_info) == "0"): ?><a id="fill_info_href">去完善一下个人信息吧</a><?php endif; ?>
                        <?php if(($is_info) == "1"): ?><a id="person_center" href="<?php echo U('Home/Student/stuCenter');?>">个人中心</a><?php endif; ?>

                        <a href="https://www.fangzhouf.org/Home/LoginRegister/quitLogin">

                                退出登录

                        </a><br>
                    </div><?php break; endswitch;?>

</div>

            <div style="width: 300px;float: right">


                 <span style="font-size: 300%;width: 300px">
                学生端
                  </span>

            </div>


        </div>

<div style="height: 10px;width: 1200px;margin: auto">




 </div>

           <div style="height: 30px;width: 100%;font-size: 130%;position: relative;top: 45px; margin: auto;text-align: center">
               看看哪些大学生想应聘家教
           </div>
           <div class="w_0100 c_0100_bg3" id="thyw" >

               <div class="w_1200">
                   <div class="c_1200_4_other">
                       <div class="t_1200_3" id="#q0">

                           <?php if(is_array($tec_apply)): $i = 0; $__LIST__ = $tec_apply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tea): $mod = ($i % 2 );++$i; if(isFour($i)): ?><ul><?php endif; ?>
                               <li id="<?php echo ($tea["apl_id"]); ?>">
                                   <div class="img_379">
                                       <a href="<?php echo U('Home/Student/showApplyDetail', array('id'=>$tea['apl_user_id']));?>">
                                           <img src="../Resource/main_img157774224.jpg" width="100%">
                                       </a>
                                   </div>
                                   <div class="d_321">
                                       <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($tea["apl_title"]); ?></nobr></a></div>
                                       <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($tea["apl_course"]); ?></nobr></a></div>
                                       <div class="t_321_1"><a href="javascript:void(0)"><nobr><?php echo ($tea["apl_date"]); ?></nobr></a></div>
                                       <div class="t_321_2">
                                           <a href="<?php echo U('Home/Student/showApplyDetail', array('id'=>$tea['apl_user_id']));?>" class="a_mnew">查看详情</a>
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