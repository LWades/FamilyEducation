<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/10
 * Time: 15:26
 */

namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    public function uploadResume($resume){
        $upload_config = array(
            'maxSize' => 3145728,
            'exts' => array('doc', 'docx', 'pdf', 'txt'),
            'rootPath' => '/yjdata/www/thinkphp/file/',
            'savePath' => 'resume/',
        );

        $upload = new \Think\Upload($upload_config);
        $info = $upload->uploadOne($resume);

        if (!$info){
            trace($info,'测试');
            $this->error($upload->getError());
        } else {
            return $info['savepath'].$info['savename'];
        }
    }

    public function videoCall($msg_id){
        $message = D('message');

        $req_id = $message->getFaceReq($msg_id);

        $this->assign('key', getFaceKey());
        $this->assign('channel', $req_id);
//        var_dump($req_id);
        $this->display();
    }

    public function videoCall2(){
        $this->display();
    }
}