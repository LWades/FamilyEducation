<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/6
 * Time: 15:34
 */

namespace Home\Model;
use Think\Model;

class TecApplyModel extends Model{

    protected $_validate = array(
        array('apl_title', 'require', '标题不能为空'),
        array('apl_description', 'require', '申请描述不能为空'),
        array('apl_course', 'require', '课程不能为空'),
    );

    protected $_auto = array(
        array('apl_date', 'getDate', 3, 'callback')
    );

    public function getDate(){
        return date('Y-m-d');
    }

    /*
    * 是否提交了家教申请
    */
    public function getApply(){
        $apply = M('tec_apply');
        $condition['apl_user_id'] = session('user_id');

        $result = $apply->where($condition)->find();

        return $result;
    }

    public function getTecApply(){
        $apply = M('tec_apply');

        $result = $apply->select();

        return $result;
    }

    public function getApplyDetail($tec_id){
        $apply = M('tec_apply');
        $condition['apl_user_id'] = $tec_id;
        $result = $apply->where($condition)
            ->join('fes_user ON fes_tec_apply.apl_user_id = fes_user.user_id')
            ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
            ->find();

        return $result;
    }
}