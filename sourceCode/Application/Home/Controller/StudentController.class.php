<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/4/30
 * Time: 19:57
 */

namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller{
    public function student(){
        if (session('?user_id')){
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
            }
            else
                $this->assign('is_info', 0);
        }else
            $this->assign('is_login', 0);
        $this->showStu();

        $this->display();
    }

    /*
     * 展示老师的应聘信息
     */
    public function showStu(){
        $tec_apply = D('tec_apply');

        $result = $tec_apply->getTecApply();

        $this->assign('tec_apply', $result);
    }

    /*
     * 查看某个老师家教申请的详细信息，包括老师的个人信息
     */
    public function showApplyDetail(){
        $tec_id = I('get.id');
        $apply = D('tec_apply');
        $teacher = D('teacher');

        //保存一下本页url用于登录跳转
        saveUrl();

        $result = $apply->getApplyDetail($tec_id);
        $teacher->tecInfoFilter($result);
        $this->assign('apl_detail', $result);

        $this->display();
    }

    /*
    * 学生向老师发送家教请求
    */
    public function makeRequest(){
        $message = D('message');
        $student = D('student');

        $user_type = session('user_type');
        if (1 == $user_type)
            $this->error('您的身份是老师, 不可以招聘');

        if (!$student->isInfo())
            $this->error('您的信息不完整，去完善信息吧', U('student'));

        $tec_id = I('get.tec_id');

        if ($message->makeRequest($tec_id))
            $this->success('家教请求发送成功，请等候回复', U('Home/Teacher/teacher'));
        else
            $this->error('家教请求发送失败');
    }

    public function fillInfo(){
        if(IS_POST){
            $student = D('student');

            if ($data = $student->create()){
                $data['stu_user_id'] = session('user_id');
                if($student->add($data))
                    $this->success('个人信息添加成功', U('stuCenter'));
                else
                    $this->error('个人信息添加成功');
            }else{
                $this->error($student->getError());
            }
        }else{
            $this->display();
        }
    }

    /*
    *  个人中心主页
    */
    public function stuCenter(){
        $this->stuInfo();
        $this->stuApply();
        $this->stuRequest();
        $this->display();
    }

    /*
     * 提取学生个人信息
     */
    public function stuInfo(){
        $student = D('student');

        $condition['stu_user_id'] = session('user_id');

        $result = $student->field('stu_name, stu_sex, stu_education, stu_grade, 
        stu_school, stu_address, stu_introduce')
            ->where($condition)->find();

        $student->stuInfoFilter($result);       //过滤学生的性别、教育、年级

        $this->assign('stu_info', $result);
    }

    /*
     * 更改学生个人信息
     */
    public function editInfo(){
        $student = D('student');

        if ($data = $student->create()){
            $condition['stu_user_id'] = session('user_id');
            if($student->where($condition)->save($data) !== false)
                $this->success('编辑成功', U('stuCenter'));  //应转到个人中心主页
            else
                $this->error('编辑失败');
        }else{
            $this->error($student->getError());
        }
    }

    /*
    * 申请信息
    */
    public function stuApply(){
        $apply = D('stu_apply');

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
            $apply = D('stu_apply');

            if ($data = $apply->create()){
                $data['apl_user_id'] = session('user_id');
                if ($apply->add($data))
                    $this->success('申请成功', U('stuCenter'));
                else
                    $this->error('申请失败，请联系系统管理员');
            }else{
                $this->error($apply->getError());
            }
        }else
            $this->display();
    }

    public function deleteApply(){
        $apply = M('stu_apply');

        $condition['apl_user_id'] = session('user_id');

        if ($apply->where($condition)->delete())
            $this->success('取消成功', U('stuCenter'));
        else
            $this->error('取消失败');
    }

    public function myApply(){
        $apply = D('stu_apply');
        $this->assign('my_apply', $apply->getApply());
        $this->display();
    }

    /*
    * 展示当前的请求
    */
    public function stuRequest(){
        $tec_id = session('user_id');

        $request = D('request');
        $result = $request->getStuRequest($tec_id);
        if ($result['result']){
            $this->assign('is_request', 1);
            $request->statusFilter($result['result']);        //过滤：状态从数字到文字
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
     * 显示学生的站内信
     */
    public function stuMsg(){
        $message = D('message');

        $result = $message->getMsg();

        $message->msgTypeFilter($result);
        $this->assign('stu_msg', $result['result']);
        $this->assign('page', $result['page']);
        $this->display();
    }

    /*
     * 获取某个站内信的内容
     */
    public function stuMsgContent(){
        $message = D('message');
        $teacher = D('teacher');
        $msg_id = I('get.msg_id');

        $result = $message->getMsgDetail($msg_id);

        $teacher->tecInfoFilter($result);
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
            $this->success('同意请求操作成功', U('stuMsg'));
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
            $this->success('拒绝成功', U('stuMsg'));
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
            $this->success('接受协议成功', U('stuMsg'));
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
            $this->success('拒绝协议成功', U('stuMsg'));
        else
            $this->error('拒绝协议失败');
    }

    public function chooseTime(){
        $this->display();
    }

    public function faceInvitation(){
        $date = I('pick_date');
        $time = I('pick_time');
        $msg_id = I('msg_id');

        $message = D('message');

        if ($message->faceInvitation($msg_id, $date, $time))
            $this->success('面试邀请发送成功', U('stuMsg'));
        else
            $this->error('邀请失败');
    }

    public function faceInvitationOut(){
        $date = I('pick_date');
        $time = I('pick_time');
        $req_id = I('req_id');

        $message = D('message');

        if ($message->faceInvitationOut($req_id, $date, $time))
            $this->success('面试邀请发送成功', U('stuCenter'));
        else
            $this->error('邀请失败');
    }
}