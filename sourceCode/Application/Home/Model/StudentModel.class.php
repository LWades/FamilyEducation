<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/2
 * Time: 20:21
 */

namespace Home\Model;
use Think\Model;

class StudentModel extends Model{

    protected $_validate = array(
        array('stu_name', 'require', '姓名不能为空'),
        array('stu_sex', 'require', '性别不能不选择'),
        array('stu_school', 'require', '学校不能为空'),
        array('stu_address', 'require', '住址不能为空'),
    );

    public function isInfo(){
        $student = M('student');
        $condition['stu_user_id'] = session('user_id');

        $result = $student->where($condition)->find();

        return $result;
    }

    public function getName(){
        $student = M('student');
        $condition['stu_user_id'] = session('user_id');

        $result = $student->field('stu_name')->where($condition)->find();

        return $result['stu_name'];
    }

    /*
    * 学号信息过滤器
    */
    public function stuInfoFilter(&$student){
        switch ($student['stu_sex']){
            case 'male':
                $sex = '男生';
                break;
            case 'female':
                $sex = '女生';
                break;
            default:
                break;
        }
        $student['stu_sex'] = $sex;

        switch ($student['stu_education']){
            case 1:
                $education = '小学';
                break;
            case 2:
                $education = '初中';
                break;
            case 3:
                $education = '高中';
                break;
            default:
                break;
        }
        $student['stu_education'] = $education;

        switch ($student['stu_grade']){
            case 1:
                $grade = '一年级';
                break;
            case 2:
                $grade = '二年级';
                break;
            case 3:
                $grade = '三年级';
                break;
            case 4:
                $grade = '四年级';
                break;
            case 5:
                $grade = '五年级';
                break;
            case 6:
                $grade = '六年级';
                break;
            default:
                break;
        }
        $student['stu_grade'] = $grade;
    }
}