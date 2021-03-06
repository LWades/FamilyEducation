<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>站内信</title>
    <link rel="stylesheet" href="/Public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/time_dropper/datedropper.css">
    <link rel="stylesheet" href="/Public/css/time_dropper/timedropper.min.css">
    <script src="/Public/js/jquery-3.2.1.min.js"></script>
    <!--<link rel="stylesheet" href="/Public/css/pintuer.css">-->
    <script src="/Public/js/layer.js?ver=<?php echo time(); ?>"></script>
    <script src="/Public/js/bootstrap.js"></script>

    <script src="/Public/js/time_dropper/datedropper.min.js"></script>
    <script src="/Public/js/time_dropper/timedropper.min.js"></script>
    <!--<script src="/Public/js/pintuer.js"></script>-->
    <style type="text/css">
        .demo{margin:20px auto 40px auto;width:320px}
        .input{padding:6px;border:1px solid #d3d3d3}
    </style>
</head>

<body>

<div style="height: 41px;background-color: #379be9;width:100%;margin: auto"></div>

<div style="height: 650px;background-color: #eeeeee">
    <br>
    <div style="width:70px; height: 30px;font-size: 110%;position: relative;top: 40px;left: 115px">
        <a href="<?php echo U('Home/Student/stuMsg');?>">&lt;返回&gt;</a>
    </div>

    <div style="height: 550px;width: 1200px;margin: auto;background-image: url(/picture/Student/letter1.bmp);position: relative;top: 40px">

          <?php switch($msg_type): case "2": ?><div style="height: 20px"></div>

                  <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                      <?php echo ($msg_dtl["msg_title"]); ?><br>
                  </div>

                  <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
                  </div>
                  <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                      <?php echo ($msg_dtl["msg_content"]); ?><br>
                  </div>


                  <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                      教师姓名：<?php echo ($msg_dtl["tec_name"]); ?> &nbsp;&nbsp;性别：<?php echo ($msg_dtl["tec_sex"]); ?><br> &nbsp;&nbsp;学历：<?php echo ($msg_dtl["tec_education"]); ?>&nbsp;&nbsp;<br>
                  </div>

                  <div style="width: 600px;height: 40px;margin: auto;text-align: center">
                      年级：<?php echo ($msg_dtl["tec_grade"]); ?><br>&nbsp;&nbsp;学院：<?php echo ($msg_dtl["tec_department"]); ?>&nbsp;&nbsp;专业：<?php echo ($msg_dtl["tec_profession"]); ?><br><br>
                  </div>



                  <div style="width: 600px;height: 150px;margin: auto;text-align: center">
                      <div style="height: 40px">
                          简介：
                      </div>

                      <div style="height: 110px;width: 400px;margin: auto">
                          <?php echo ($msg_dtl["tec_introduce"]); ?><br>
                      </div>
                  </div>

                  <div style="width: 600px;height: 50px;margin: auto;text-align: center">

                      <br>
                      <?php switch($msg_accept): case "0": ?>
                          <div>
                              <a name="agree" id="agree">
                                  <button class="btn btn-primary">
                                  <!--<button class="button bg-blue">-->
                                      同意请求
                                  </button>

                              </a>
                              <a name="disagree" id="disagree">
                                  <button class="btn btn-primary">
                                      不同意请求
                                  </button>

                              </a>
                              <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">远程面试邀请</button>
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
                                  <button class="btn btn-primary">
                                      同意请求
                                  </button>

                              </a>
                              <a name="refuse" id="refuse">
                                  <button class="btn btn-primary">
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

                  </div>

                  <div style="height: 25px"></div>

                  <div style="width: 600px;height: 50px;margin: auto;text-align: center">
                      <a name="facetoface2" id="facetoface2">远程面试邀请</a>
                  </div><?php break;?>


              <?php case "6": ?><div style="height: 30px"></div>
              <div style="height: 80px;width: 600px;margin: auto;text-align: center">
                  <div style="height: 40px">
                      <?php echo ($msg_dtl["msg_title"]); ?><br>
                  </div>

                  <div style="border: 1px solid;border-color: black;width: 600px;margin: auto">
                  </div>
                  <div style="height: 40px">
                      <?php echo ($msg_dtl["msg_content"]); ?><br>
                  </div>

                  <a href="<?php echo U('Home/Common/videoCall', array('msg_id'=>$msg_dtl['msg_id']));?>" target="_blank">
                      <button class="button bg-blue">
                          进入面试模块
                      </button>

                  </a>

              </div><?php break; endswitch;?>


    </div>
</div>





<a href="<?php echo U('Home/Student/stuMsg');?>">返回</a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">请选择面试时间</h4>
            </div>
            <form name="choose_time_form" id="choose_time_form" action="<?php echo U('Home/Student/faceInvitation');?>" method="post">
                <div class="modal-body">
                    <div id="main">
                        <div class="demo">
                            <p>请选择日期：<input type="text" class="input" id="pick_date" name="pick_date"/></p><br/>
                            <p>请选择时间：<input type="time" class="input" id="pick_time" name="pick_time"/></p>
                            <input name="msg_id" id="msg_id" hidden value="<?php echo ($msg_dtl["msg_id"]); ?>">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div><
    </div>
</div>



<script>
    $(document).ready(function () {
        var msg_id = "<?php echo ($msg_dtl["msg_id"]); ?>"
        $("#agree").click(function () {
            if (confirm("确认同意家教请求并生成合同吗？")) {
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Student/agreeRequest?msg_id=' + msg_id);
            }
        });

        $("#disagree").click(function () {
            if (confirm("确认拒绝这次请求吗？")) {
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Student/refuseRequest?msg_id=' + msg_id);
            }
        });

        $("#accept").click(function () {
            if (confirm("确认接受吗？"))
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Student/acceptAgreement?msg_id=' + msg_id);
        })

        $("#refuse").click(function () {
            if (confirm("确认拒绝吗？"))
                $(location).attr('href', 'https://www.fangzhouf.org/Home/Student/refuseAgreement?msg_id=' + msg_id);
        });

    });
</script>
<script>
    $("#pick_date").dateDropper({
        animate: false,
        format: 'Y-m-d',
        maxYear: '2020',
        minDate: 0
    });
    $("#pick_time").timeDropper({
        meridians: false,
        format: 'HH:mm',
    });

    function showTime() {
        var temp = $("#pickdate").val();
        var temp2 = $("#picktime").val();
        alert(temp + temp2);
    }
</script>
</body>
</html>