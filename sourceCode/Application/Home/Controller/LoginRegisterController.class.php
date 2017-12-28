<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/4/29
 * Time: 21:09
 */
namespace Home\Controller;
use Think\Controller;

class LoginRegisterController extends Controller{
    public function register(){
        if(IS_POST){
            $user = D('user');

            if($data = $user->create()){
                if($user->add($data))
                    $this->success('注册成功，去登录吧^_^', U('login'));
                else
                    $this->error('注册失败', U('register'));
            }else{
                $this->error($user->getError(), U('register'));
//                exit($user->getError());
            }
        }else{
            $url_now = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $url_forward = $_SERVER['HTTP_REFERER'];
//
//            var_dump("本页的url地址："."https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//            var_dump("前一页的url地址：".$_SERVER['HTTP_REFERER']);
//            var_dump("\n注册的url".U('register'));
            $this->display();
        }
    }

    public function login(){
        if(IS_POST){
//            var_dump('提交表单后的back_url: '.session('back_url'));
            $user = M('user');

            if (!$data = $user->create())
                $this->error($user->getError(), U('login'));

            $condition['user_name'] = $data['user_name'];
            $result = $user->where($condition)->find();

            //判断是否登录成功
            if (!$result)
                $this->error('用户名不存在', U('login'));
            elseif ($result['user_pwd'] != md5($data['user_pwd']))
                $this->error('密码不正确', U('login'));
            else{
                //设置session
                session('user_id', $result['user_id']);
                session('user_type', $result['user_type']);

//                if (1 == session('user_type'))
//                echo "<script>location.href = document.referrer;location.href = document.referrer </script>";
                $this->success('登录成功', session('back_url'));
            }
        }else{
            $url_now = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $url_forward = $_SERVER['HTTP_REFERER'];
            $url_register = "https://".$_SERVER['HTTP_HOST'].U('register');
            if ($url_now != $url_forward && $url_forward != $url_register && $_SERVER['HTTP_REFERER']){
                session('back_url', $_SERVER['HTTP_REFERER']);
            }
//            var_dump("本页的url地址："."https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//            var_dump("前一页的url地址：".$_SERVER['HTTP_REFERER']);
//            var_dump("session".session('back_url'));
//            var_dump("   url_forward为".$_SERVER['HTTP_REFERER']);
//            var_dump("   url_register"."https://".$_SERVER['HTTP_HOST'].U('register'));
            $this->display();
        }
    }

    public function quitLogin(){
        session('user_id', null);
        session('user_name', null);
        session('user_type', null);

        $temp = $_SERVER['HTTP_REFERER'];
        $url = substr($temp, 0, strlen($temp)-5);
        var_dump($temp);
        $this->redirect($url);
    }
}