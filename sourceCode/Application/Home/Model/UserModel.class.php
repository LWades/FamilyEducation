<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/4/29
 * Time: 14:01
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    /*
     * 自动验证
     * 验证输入合法性
     */
    protected $_validate = array(
        array('user_name', 'require', '用户名不能为空'),
        array('user_pwd', 'require', '密码不能为空'),
        array('user_email', 'require', '邮箱不能为空'),
        array('user_phone', 'require', '手机不能为空'),
        array('user_repwd', 'user_pwd', '两次密码不同', 0, 'confirm'),
        array('user_name', '', '该用户名已被注册', 0, 'unique', 1),
        array('user_phone','/^1[34578]\d{9}$/', '输入格式正确的手机号码', 0),
        array('user_email', '', '该邮箱已被注册', 0, 'unique', 1),
        array('user_phone', '', '该手机号已被注册', 0, 'unique', 1),
    );
    /*
     * 自动完成
     * 利用md5对密码进行加密
     */
    protected $_auto = array(
        array('user_pwd', 'md5', 3, 'function')
    );

    public function getText(){
        return "这里是模板的信息";
    }
}