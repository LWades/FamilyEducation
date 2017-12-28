<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/4/30
 * Time: 19:58
 */

namespace Home\Controller;
use Think\Controller;
use Think\Upload;

class TeacherController extends Controller{
    public function teacher(){
        if (session('?user_id')) {
            $this->assign('is_login', 1);
            $this->assign('user_type', session('user_type'));

            //判断用户的个人信息是否完善，并将结果传递给模板
            if (1 == session('user_type'))
                $user = D('teacher');
            else
                $user = D('student');

            if ($user->isInfo()){
                $this->assign('is_info', 1);
                $name = $user->getName();
                $this->assign('name', $name);
            }else
                $this->assign('is_info', 0);
        }else
            $this->assign('is_login', 0);

        $this->showStu();

        $this->display();
    }

    /*
     * 展示学生的招聘信息
     */
    public function showStu(){
        $stu_apply = D('stu_apply');

        $result = $stu_apply->getStuApply();

        $this->assign('stu_apply', $result);
    }

    /*
     * 查看某个学生家教申请的详细信息，包括学生的个人信息
     */
    public function showApplyDetail(){
        $stu_id = I('get.id');
        $apply = D('stu_apply');
        $student = D('student');

        //保存一下本页url用于登录跳转
        saveUrl();

        $result = $apply->getApplyDetail($stu_id);
        $student->stuInfoFilter($result);
        $this->assign('apl_detail', $result);

        $this->display();
    }

    /*
     * 老师向学生发送家教请求
     */
    public function makeRequest(){
        $message = D('message');
        $teacher = D('teacher');

        $user_type = session('user_type');
        if (2 == $user_type)
            $this->error('您的身份是学生, 不可以应聘');

        if (!$teacher->isInfo())
            $this->error('您的信息不完整，去完善信息吧', U('teacher'));

        $stu_id = I('get.stu_id');

        if ($message->makeRequest($stu_id))
            $this->success('家教请求发送成功，请等候回复', U('Home/Teacher/teacher'));
        else
            $this->error('家教请求发送失败');
    }

    /*
     * 完善个人信息
     */
    public function fillInfo(){
        if(IS_POST){
            $teacher = D('teacher');

            if ($data = $teacher->create()){
                $data['tec_user_id'] = session('user_id');
                $tec_resume = $_FILES['tec_resume'];

                if (0 != $tec_resume['size']){
                    $upload = new CommonController();
                    $data['tec_resume'] = $upload->uploadResume($tec_resume);
                }

                if($teacher->add($data))
                    $this->success('个人信息添加成功', U('tecCenter'));  //应转到个人中心主页
                else
                    $this->error('个人信息添加失败');
            }else{
                $this->error($teacher->getError());
            }
        }else{
            trace('bucuo', 'nishuone');
            $this->display();
        }
    }

    /*
     * 个人中心主页
     */
    public function tecCenter(){
        $this->tecInfo();
        $this->tecApply();
        $this->tecRequest();
        $this->display();
    }

    /*
     * 提取教师个人信息
     */
    public function tecInfo(){
        $teacher = D('teacher');

        $condition['tec_user_id'] = session('user_id');

        $result = $teacher->field('tec_name, tec_sex, tec_education, tec_grade, 
        tec_department, tec_profession, tec_introduce, tec_resume')
            ->where($condition)->find();

        $teacher->tecInfoFilter($result);           //过滤性别、学历好年级

        $this->assign('tec_info', $result);
    }

    /*
     * 更改教师个人信息
     */
    public function editInfo(){
        $teacher = D('teacher');

        if ($data = $teacher->create()){
            $data['tec_user_id'] = session('user_id');
            $tec_resume = $_FILES['tec_resume'];

            if (0 != $tec_resume['size']){
                $upload = new CommonController();
                $data['tec_resume'] = $upload->uploadResume($tec_resume);
            }

            $condition['tec_user_id'] = session('user_id');
            if($teacher->where($condition)->save($data) !== false)
                $this->success('编辑成功', U('tecCenter'));  //应转到个人中心主页
            else
                $this->error('编辑失败');
        }else{
            $this->error($teacher->getError());
        }
    }

    /*
     * 申请信息
     */
    public function tecApply(){
        $apply = D('tec_apply');

        //判断是否申请了家教
        if ($data = $apply->getApply()){
            $this->assign('is_apply', 0);
            $this->assign('apl_info', $data);
        }else{
            $this->assign('is_apply', 1);
        }
    }

    /*
     * 填写申请表
     */
    public function submitApply(){
        if (IS_POST){
            $apply = D('tec_apply');

            if ($data = $apply->create()){
                $data['apl_user_id'] = session('user_id');
                if ($apply->add($data))
                    $this->success('申请成功', U('tecCenter'));
                else
                    $this->error('申请失败，请联系系统管理员');
            }else{
                $this->error($apply->getError());
            }
        }else
            $this->display();
    }

    public function deleteApply(){
        $apply = M('tec_apply');

        $condition['apl_user_id'] = session('user_id');

        if ($apply->where($condition)->delete())
            $this->success('取消成功');
        else
            $this->error('取消失败');
    }

    /*
     * 展示当前的家教申请
     */
    public function myApply(){
        $apply = D('tec_apply');
        $this->assign('my_apply', $apply->getApply());
        $this->display();
    }

    /*
     * 展示当前的请求
     */
    public function tecRequest(){
        $tec_id = session('user_id');

        $request = D('request');
        $result = $request->getTecRequest($tec_id);
        if ($result['result']){
            $this->assign('is_request', 1);                     //有请求
            $request->statusFilter($result['result']);          //过滤：状态从数字到文字
            $this->assign('page', $result['page']);
            $this->assign('request', $result['result']);
        }else{
            $this->assign('is_request', 0);
        }
    }

    public function deleteRequest(){
        $req_id = I('get.req_id');
        $message = D('message');

        if ($message->deleteRequest($req_id))
            $this->success('取消成功');
        else
            $this->error('取消失败');
    }

    /*
    * 显示老师的站内信
    */
    public function tecMsg(){
        $message = D('message');

        $result = $message->getMsg();

        $message->msgTypeFilter($result);
        $this->assign('tec_msg', $result['result']);
        $this->assign('page', $result['page']);
        $this->display();
    }

    /*
     * 获取某个站内信的内容
     */
    public function tecMsgContent(){
        $message = D('message');
        $student = D('student');
        $msg_id = I('get.msg_id');

        $result = $message->getMsgDetail($msg_id);

        $student->stuInfoFilter($result);
        $this->assign('msg_type', $result['msg_type']);
        $this->assign('msg_dtl', $result);
        $this->assign('msg_accept', $result['msg_accept']);

        $this->display();
    }

    /*
    * 同意请求
    */
    public function agreeRequest(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->agreeRequest($msg_id))
            $this->success('同意请求操作成功', U('tecMsg'));
        else
            $this->error('同意请求操作失败');
    }

    /*
     * 不同意请求
     */
    public function refuseRequest(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->refuseRequest($msg_id))
            $this->success('拒绝成功', U('tecMsg'));
        else
            $this->error('拒绝失败');
    }

    /*
     * 接受协议
     */
    public function acceptAgreement(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->acceptAgreement($msg_id))
            $this->success('接受协议成功', U('tecMsg'));
        else
            $this->error('接受协议失败');
    }

    /*
     * 拒绝协议
     */
    public function refuseAgreement(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->refuseAgreement($msg_id))
            $this->success('拒绝协议成功', U('tecMsg'));
        else
            $this->error('拒绝协议失败');
    }

    public function acceptFace(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->acceptFace($msg_id))
            $this->success('接受成功', U('tecMsg'));
        else
            $this->error('接受失败');
    }

    public function refuseFace(){
        $msg_id = I('get.msg_id');
        $message = D('message');

        if ($message->refuseFace($msg_id))
            $this->success('拒绝成功', U('tecMsg'));
        else
            $this->error('拒绝失败');
    }
}