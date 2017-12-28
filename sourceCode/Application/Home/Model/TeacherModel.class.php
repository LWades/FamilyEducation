<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/2
 * Time: 19:56
 */

namespace Home\Model;
use Think\Model;

class TeacherModel extends Model{

    protected $_validate = array(
        array('tec_name', 'require', '姓名不能为空'),
        array('tec_sex', 'require', '性别不能不选择'),
        array('tec_department', 'require', '院系不能为空'),
        array('tec_profession', 'require', '专业不能为空'),
    );

    /*
     * 是否完善了个人信息
     */
    public function isInfo(){
        $teacher = M('teacher');
        $condition['tec_user_id'] = session('user_id');

        $result = $teacher->where($condition)->find();

        return $result;
    }

    public function getName(){
        $teacher = M('teacher');
        $condition['tec_user_id'] = session('user_id');

        $result = $teacher->field('tec_name')->where($condition)->find();

        return $result['tec_name'];
    }

    public function getInfo($id){
        $teacher = M('teacher');
        $condition['tec_user_id'] = $id;
        $result = $teacher->where($condition)->find();

        return $result;
    }

    /*
     * 教师信息过滤器
     */
    public function tecInfoFilter(&$teacher){
        switch ($teacher['tec_sex']){
            case 'male':
                $sex = '男生';
                break;
            case 'female':
                $sex = '女生';
                break;
            default:
                break;
        }
        $teacher['tec_sex'] = $sex;

        switch ($teacher['tec_education']){
            case 1:
                $education = '本科生';
                break;
            case 2:
                $education = '研究生';
                break;
            default:
                break;
        }
        $teacher['tec_education'] = $education;

        switch ($teacher['tec_grade']){
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
            default:
                break;
        }
        $teacher['tec_grade'] = $grade;
    }

    /*
     * 处理简历的上传工作，返回文件的路径
     */
    public function uploadResume($tec_resume){
        $upload_config = array(
            'maxSize' => 3145728,
            'exts' => array('doc', 'docx', 'pdf', 'txt'),
            'rootPath' => '/yjdata/www/thinkphp/picture',
            'savePath' => 'resume/'
        );

        $upload = new \Think\Upload($upload_config);
        $info = $upload->uploadOne($tec_resume);

        if ($info)
            return $info['savepath'].$info['savename'];
        else
            $this->error($upload->getError());
    }
}