<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/6
 * Time: 15:35
 */

namespace Home\Model;
use Think\Model;

class StuApplyModel extends Model{
    protected $_validate = array(
        array('apl_title', 'require', '标题不能为空'),
        array('apl_description', 'require', '申请描述不能为空'),
        array('apl_course', 'require', '课程不能为空'),
        array('apl_salary', 'require', '薪资不能为空'),
        array('apl_frequency', 'require', '授课频率不能为空'),
    );

    protected $_auto = array(
        array('apl_date', 'getDate', 3, 'callback')
    );

    public function getDate(){
        return date('Y-m-d');
    }

    /*
    * 是否提交了家教申请，提交则返回详细信息
    */
    public function getApply(){
        $apply = M('stu_apply');
        $condition['apl_user_id'] = session('user_id');

        $result = $apply->where($condition)->find();

        return $result;
    }

    public function getStuApply(){
        $apply = M('stu_apply');

        $result = $apply->select();

        return $result;
    }

    public function getApplyDetail($stu_id){
        $apply = M('stu_apply');
        $condition['apl_user_id'] = $stu_id;
        $result = $apply->where($condition)
                        ->join('fes_user ON fes_stu_apply.apl_user_id = fes_user.user_id')
                        ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                        ->find();

        return $result;
    }
}