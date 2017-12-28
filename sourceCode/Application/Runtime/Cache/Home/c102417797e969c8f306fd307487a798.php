<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选择面试时间</title>
    <link rel="stylesheet" href="/Public/layui/css/layui.css">
    <script src="../../../../Public/layui/layui.js"></script>
</head>
<script src="/Public/layui/layui.js"></script>
<body>
<form>
    面试时间<input type="datetime-local">
    <div class="layui-inline">
        <input class="layui-input" placeholder="自定义日期格式" onclick="laydate({elem: this, istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
    </div>
</form>
</body>
<!--<script src="//res.layui.com/layui/build/layui.js" charset="utf-8"></script>-->
<script>
     function laydate(){
        var laydate = layui.laydate;

        var start = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };

    };
</script>
</html>