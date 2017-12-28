<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>远程面试</title>
    <link rel="stylesheet" href="/Public/client/vendor/bootstrap.min.css">
    <script src="/Public/client/vendor/jquery.js"></script>
    <script src="/Public/client/vendor/socket.io.js"></script>
    <script src="/Public/client/vendor/adapter.js"></script>
    <script src="/Public/client/AgoraRTCSDK-1.8.1.js"></script>
</head>

<body>
<div id="div_device" class="panel panel-default" style="display:none">
    <div class="select">
        <label for="audioSource">Audio source: </label><select id="audioSource"></select>
    </div>
    <div class="select">
        <label for="videoSource">Video source: </label><select id="videoSource"></select>
    </div>
</div>

<div id="div_join" class="panel panel-default">
    <div class="panel-body">
        <!--Key: <input id="key" type="text" value="" size="36"></input>-->
        <!--Channel: <input id="channel" type="text" value="1000" size="4"></input>-->
        点击加入: <input id="video" type="checkbox" checked hidden></input>
        <!--Host: <input id="video" type="checkbox" checked hidden></input>-->
        <button id="join" class="btn btn-primary" onclick="join()">加入面试</button>
        <button id="leave" class="btn btn-primary" onclick="leave()">离开</button>
        <button class="btn btn-primary" onclick="show()">好</button>
        <script>
            function show() {
//                alert($("#key").val());
                var key = '<?php echo ($channel); ?>';
//                var key = '<?php echo ($key); ?>';
                alert(key);
            }
        </script>
    </div>
</div>

<!--style>
.video__box{width:910px; margin:0 auto; overflow:hidden;}
.video__main{ width:810px; height:607px;float:left }
.video__list{ width:200px; height:607px; float:left;}
.video__item{ width:200px; height:174px; hei background:url(/img/icon_live.png) center center no-repeat; }
</style>
<div class="video__main">
</div>
<div class="video__list">
    <div class="video__item"></div>
    <div id="video" class="video__item">
        <div id="agora_local"></div>
    </div>
</div-->

<div id="video" style="width:1022px;margin:0 auto;">
    <div id="agora_local" style="float:right;width:210px;height:147px;display:inline-block;"></div>
</div>

<script language="javascript">
    var client, localStream, camera, microphone;

    var audioSelect = document.querySelector('select#audioSource');
    var videoSelect = document.querySelector('select#videoSource');

    var KEY = '<?php echo ($key); ?>';
    var CHANNEL = '<?php echo ($channel); ?>';

    function join() {
        document.getElementById("join").disabled = true;
        document.getElementById("video").disabled = true;
        // for dynamic key
        /*var dynamic_key;
         console.log("Try to get dynamic key");
         var use_https = ('https:' == document.location.protocol ? true : false);
         if (use_https) {
         var url_str = "https://ip:port/dynamic_key?channelName=" + channel.value;
         } else {
         var url_str = "http://ip:port/dynamic_key?channelName=" + channel.value;
         }
         $.ajax({
         url: url_str,
         error: function() {
         console.log("Failed to get dynamic key");
         },
         success: function(response) {
         console.log(response.key);
         dynamic_key = response.key;*/

        console.log("Init AgoraRTC client with vendor key: " + KEY);
//        console.log("Init AgoraRTC client with vendor key: " + key.value);
        //创建客户端
        client = AgoraRTC.createLiveClient();
        // for dynamic key
        /*client.init(dynamic_key, function () {*/
        //初始化客户端
//        alert('key is ' + KEY);
        client.init(KEY, function () {
//        client.init(key.value, function () {
            console.log("AgoraRTC client initialized");
            //加入频道
            client.join(CHANNEL, undefined, function(uid) {
//                alert(CHANNEL);
//            client.join(channel.value, undefined, function(uid) {
                console.log("User " + uid + " join channel successfully");
                if (document.getElementById("video").checked) {
                    camera = videoSource.value;
                    microphone = audioSource.value;
                    //创建本地音视频流
                    //音频默认启动，视频根据是否选中host决定是否启动
                    localStream = AgoraRTC.createStream({streamID: uid, audio: true, cameraId: camera, microphoneId: microphone, video: document.getElementById("video").checked, screen: false});
                    if (document.getElementById("video").checked) {
                        localStream.setVideoProfile('720p_3');
                    }
                    localStream.init(function() {
                        console.log("getUserMedia successfully");
                        localStream.play('agora_local');                //播放本地视频流

                        //将本地音视频流发布到agora service上
                        client.publish(localStream, function (err) {
                            console.log("Publish local stream error: " + err);
                        });

                        client.on('stream-published', function (evt) {
                            console.log("Publish local streamsuccessfully");
                        });
                    }, function (err) {
                        console.log("getUserMedia failed", err);
                    });
                }
            }, function(err) {
                console.log("Join channel failed", err);
            });
        }, function (err) {
            console.log("AgoraRTC client init failed", err);
        });

        //在远端视频流添加事件里面订阅远端视频流
        client.on('stream-added', function (evt) {
            var stream = evt.stream;
            console.log("New stream added: " + stream.getId());
            console.log("Subscribe ", stream);
            //订阅远端视频流
            client.subscribe(stream, function (err) {
                console.log("Subscribe stream failed", err);
            });
        });

        //在远端视频流已订阅事件里面播放远端视频流
        client.on('stream-subscribed', function (evt) {
            var stream = evt.stream;
            console.log("Subscribe remote stream successfully: " + stream.getId());
            if ($('div#video #agora_remote'+stream.getId()).length === 0) {
                $('div#video').append('<div id="agora_remote'+stream.getId()+'" style="float:left; width:810px;height:607px;display:inline-block;"></div>');
            }

            //播放远端视频流
            stream.play('agora_remote' + stream.getId());
        });

        client.on('stream-removed', function (evt) {
            var stream = evt.stream;
            stream.stop();
            $('#agora_remote' + stream.getId()).remove();
            console.log("Remote stream is removed " + stream.getId());
        });

        client.on('peer-leave', function (evt) {
            var stream = evt.stream;
            stream.stop();
            $('#agora_remote' + stream.getId()).remove();
            console.log(evt.uid + " leaved from this channel");
        });
        // for dynamic key
        /*}
         });*/
    }

    function leave() {
        document.getElementById("leave").disabled = true;
        client.leave(function () {
            console.log("Leavel channel successfully");
        }, function (err) {
            console.log("Leave channel failed");
        });
    }

    function publish() {
        document.getElementById("publish").disabled = true;
        client.publish(localStream, function (err) {
            console.log("Publish local stream error: " + err);
        });
    }

    function unpublish() {
        document.getElementById("publish").disabled = false;
        document.getElementById("unpublish").disabled = true;
        client.unpublish(localStream, function (err) {
            console.log("Unpublish local stream failed" + err);
        });
    }

    function getDevices() {
        AgoraRTC.getDevices(function (devices) {
            for (var i = 0; i !== devices.length; ++i) {
                var device = devices[i];
                var option = document.createElement('option');
                option.value = device.deviceId;
                if (device.kind === 'audioinput') {
                    option.text = device.label || 'microphone ' + (audioSelect.length + 1);
                    audioSelect.appendChild(option);
                } else if (device.kind === 'videoinput') {
                    option.text = device.label || 'camera ' + (videoSelect.length + 1);
                    videoSelect.appendChild(option);
                } else {
                    console.log('Some other kind of source/device: ', device);
                }
            }
        });
    }

    //audioSelect.onchange = getDevices;
    //videoSelect.onchange = getDevices;
    //getDevices();
</script>
</body>
</html>