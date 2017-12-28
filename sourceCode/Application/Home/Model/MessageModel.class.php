<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/7
 * Time: 15:37
 */
namespace Home\Model;
use Think\Model;

class MessageModel extends Model{

    protected $_auto = array(
        array('msg_time', 'getDatetime', 3, 'callback')
    );

    public function getDatetime(){
        return date('Y-m-d H:i:s');
    }

    public function getMsg(){
        $message = M('message');

        $condition['msg_receiver'] = session('user_id');

        //分页
        $count = $message->where($condition)->count();
        $Page = new \Think\Page($count, 5);

        $Page->lastSuffix = false;//最后一页不显示为总页数
        $Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($Page->show());//重点在这里

        $result['result'] = $message->where($condition)->order('msg_time desc')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        $result['page'] = $page_show;

        return $result;
    }

    public function getMsgDetail($msg_id){
        $message = M('message');

        $condition['msg_id'] = $msg_id;

        $msg_type = $message->where($condition)->getField('msg_type');

        /*
         * 针对不同的站内信类型从不同的途径获取信息
         */
        switch ($msg_type){
            case 1:
                $result = $message->where($condition)->find();
                break;
            case 2:
                $result = $message->where($condition)
                    ->join('fes_teacher ON fes_message.msg_request_id = fes_teacher.tec_user_id')->find();
                break;
            case 3:
                $result = $message->where($condition)
                    ->join('fes_student ON fes_message.msg_request_id = fes_student.stu_user_id')->find();
                break;
            case 4:
                $result = $message->where($condition)->find();
                break;
            case 5:
                $result = $message->where($condition)->find();
                break;
            case 6:
                $result = $message->where($condition)->find();
                break;
        }
        return $result;
    }

    /*
     * 发送请求
     */
    public function makeRequest($receiver_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $sender_id = session('user_id');

        $data = array(
            'req_sender' => $sender_id,
            'req_receiver' => $receiver_id,
        );

        $condition['user_id'] = $sender_id;
        $user_type = $user->where($condition)->getField('user_type');

        if (1 == $user_type){
            $person = '老师';
            $name = $user->where($condition)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
            $msg_type = 2;
        }
        else {
            $person = '同学';
            $name = $user->where($condition)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
            $msg_type = 3;
        }

        $title = '一位'.$person.'向您发送了家教请求，请查看';
        $content = $name.$person."向您发送了家教请求他的个人信息如下:";


        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $receiver_id,
            'msg_type' => $msg_type,
            'msg_request_id' => $sender_id,
        );

        if ($request->add($data) && $message->add($msg_data))
            return true;
        else
            return false;
    }

    public function agreeRequest($msg_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 1;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        $condition2 = array(
            'req_sender' => $msg_result['msg_request_id'],
            'req_receiver' => $msg_result['msg_receiver']
        );

        $data['req_status'] = 1;

        //查找一下是老师还是学生以及他们的个人信息
        $condition3['user_id'] = $msg_result['msg_receiver'];
        $user_type = $user->where($condition3)->getField('user_type');

        if (1 == $user_type){
            $person = '老师';
            $name = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
        }
        else {
            $person = '同学';
            $name = $user->where($condition3)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
        }

        $title = '一份合同';
        $content = $name.$person.'经过考虑决定接受您的家教请求，请决定是否接受这份家教合同';

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_request_id' => $msg_result['msg_receiver'],
            'msg_type' => 4
        );

        if ($request->where($condition2)->save($data) !== false && $message->add($msg_data))
            return true;
        else
            return false;
    }

    public function refuseRequest($msg_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 2;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->find();

        $condition2 = array(
            'req_sender' => $msg_result['msg_request_id'],
            'req_receiver' => $msg_result['msg_receiver']
        );

        $data['req_status'] = 3;

        //查找一下是老师还是学生以及他们的个人信息
        $condition3['user_id'] = $msg_result['msg_receiver'];
        $user_type = $user->where($condition3)->getField('user_type');

        if (1 == $user_type){
            $person = '老师';
            $name = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
        }
        else {
            $person = '同学';
            $name = $user->where($condition3)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
        }

        $title = '一封拒信';
        $content = '由于一些原因,'.$name.$person.'拒绝了您的请求，去看看其他'.$person.'吧';

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id']
        );

        if ($request->where($condition2)->save($data) !== false && $message->add($msg_data))
            return true;
        else
            return false;
    }

    /*
     * 接受协议
     */
    public function acceptAgreement($msg_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 1;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        $condition2 = array(
            'req_sender' => $msg_result['msg_receiver'],
            'req_receiver' => $msg_result['msg_request_id']
        );

        $data['req_status'] = 2;

        //查找一下是老师还是学生以及他们的个人信息
        $condition3['user_id'] = $msg_result['msg_receiver'];
        $user_type = $user->where($condition3)->getField('user_type');

        if (1 == $user_type){
            $person = '老师';
            $name = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
            $phone2 = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_phone');
            $email2 = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_email');
        }
        else {
            $person = '同学';
            $name = $user->where($condition3)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
            $phone2 = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('stu_phone');
            $email2 = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('stu_phone');
        }

        $phone = $user->where($condition3)->getField('user_phone');
        $email = $user->where($condition3)->getField('user_email');

        $title = '您与一名'.$person.'达成协议';
        $content = $name.$person.'与您达成协议，开启这段家教之旅吧<br>'.$person.'的联系电话：'.$phone.
                    '  电子邮箱：'.$email;

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_type' => 1
        );

        if ($person == '老师')
        $title2 = "您与一名";

        $msg_data2 = array(
            'msg_title' => $title2,
            'msg_receiver' => $msg_result['msg_receiver'],
            'msg_type' => 1
        );

        if ($request->where($condition2)->save($data) && $message->add($msg_data))
            return true;
        else
            return false;
    }

    /*
     * 拒绝协议
     */
    public function refuseAgreement($msg_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 2;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        $condition2 = array(
            'req_sender' => $msg_result['msg_receiver'],
            'req_receiver' => $msg_result['msg_request_id']
        );

        $data['req_status'] = 4;

        //查找一下是老师还是学生以及他们的个人信息
        $condition3['user_id'] = $msg_result['msg_receiver'];
        $user_type = $user->where($condition3)->getField('user_type');

        if (1 == $user_type){
            $person = '老师';
            $name = $user->where($condition3)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
        }
        else {
            $person = '同学';
            $name = $user->where($condition3)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
        }

        $title = $person.'未能与您达成协议';
        $content = $name.$person.'由于一些原因未能与您达成协议，主动去进行家教请求吧';

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_type' => 1
        );

        if ($request->where($condition2)->save($data) && $message->add($msg_data))
            return true;
        else
            return false;
    }

    public function deleteRequest(){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        //查找一下是老师还是学生以及他们的个人信息
        $condition['req_id'] = I('get.req_id');
        $user_result = $request->where($condition)
            ->join('fes_user ON fes_request.req_sender = fes_user.user_id')
            ->field('user_type,user_id, req_receiver')->find();

        $condition2['user_id'] = $user_result['user_id'];

        if (1 == $user_result['user_type']){
            $person = '老师';
            $name = $user->where($condition2)
                ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
                ->getField('tec_name');
        }
        else {
            $person = '同学';
            $name = $user->where($condition2)
                ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
                ->getField('stu_name');
        }

        $title = $name.$person.'取消了请求';
        $content = $name.$person.'由于一些原因取消了家教请求，我们对对您带来的不便表示抱歉';

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $user_result['req_receiver'],
            'msg_type' => 1
        );

        if ($request->where($condition)->delete() && $message->add($msg_data))
            return true;
        else
            return false;
    }

    public function faceInvitation($msg_id, $date, $time){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        //请求表的数据更新条件和内容
        $condition2 = array(
            'req_sender' => $msg_result['msg_request_id'],
            'req_receiver' => $msg_result['msg_receiver']
        );
        $req_data['req_facetime'] = $date.' '.$time.':00';

        $condition3['user_id'] = $msg_result['msg_receiver'];
        $name = $user->where($condition3)
            ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
            ->getField('stu_name');

        $content = $name.'同学向你发出了面试邀请，希望您能按时参加，时间是'.$date.' '.$time;

        $msg_data = array(
            'msg_title' => '面试邀请',
            'msg_content' => $content,
            'msg_type' => 5,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_request_id' => $msg_result['msg_receiver']
        );

        if ($request->where($condition2)->save($req_data) && $message->add($msg_data))
            return true;
        else
            return false;
    }

    public function faceInvitationOut($req_id, $date, $time){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['req_id'] = $req_id;

        $req_result = $request->where($condition)->find();

        $req_data['req_facetime'] = $date.' '.$time.':00';

        $condition2['user_id'] = $req_result['req_sender'];

        $name = $user->where($condition2)
            ->join('fes_student ON fes_user.user_id = fes_student.stu_user_id')
            ->getField('stu_name');

        $content = $name.'同学向你发出了面试邀请，希望您能按时参加，时间是'.$date.' '.$time;

        $msg_data = array(
            'msg_title' => '面试邀请',
            'msg_content' => $content,
            'msg_type' => 5,
            'msg_receiver' => $req_result['req_receiver'],
            'msg_request_id' => $req_result['req_sender']
        );

        if ($request->where($condition)->save($req_data) && $message->add($msg_data))
            return true;
        else
            return false;
    }

    /*
     * 接受面试邀请
     */
    public function acceptFace($msg_id){
        $message = M('message');
        $user = M('user');
        $request = M('request');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 1;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        $condition2 = array(
            'req_sender' => $msg_result['msg_request_id'],
            'req_receiver' => $msg_result['msg_receiver']
        );

        $req_result = $request->where($condition2)->getField('req_facetime');

        $condition3['user_id'] = $msg_result['msg_receiver'];

        $name = $user->where($condition3)
            ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
            ->getField('tec_name');

        $title = '一位老师接受了您的面试邀请';
        $content = $name.'老师接受了你的面试邀请，请按时加入面试模块，时间是'.$req_result;

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_request_id' => $msg_result['msg_receiver'],
            'msg_type' => 6
        );

        if ($message->add($msg_data))
            return true;
        else
            return false;
    }

    /*
     * 拒绝面试邀请
     */
    public function refuseFace($msg_id){
        $message = M('message');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_change['msg_accept'] = 2;

        if ($message->where($condition)->save($msg_change) !== false)
            ;
        else
            return false;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        $condition3['user_id'] = $msg_result['msg_receiver'];

        $name = $user->where($condition3)
            ->join('fes_teacher ON fes_user.user_id = fes_teacher.tec_user_id')
            ->getField('tec_name');

        $title = '一位老师拒绝了您的面试邀请';
        $content = $name.'老师拒绝了你的面试邀请';

        $msg_data = array(
            'msg_title' => $title,
            'msg_content' => $content,
            'msg_receiver' => $msg_result['msg_request_id'],
            'msg_type' => 1
        );

        if ($message->add($msg_data))
            return true;
        else
            return false;
    }

    public function getFaceReq($msg_id){
        $message = M('message');
        $request = M('request');
        $user = M('user');

        $condition['msg_id'] = $msg_id;

        $msg_result = $message->where($condition)->field('msg_receiver,msg_request_id')->find();

        //请求表的数据更新条件和内容
        $condition2 = array(
            'req_sender' => $msg_result['msg_request_id'],
            'req_receiver' => $msg_result['msg_receiver']
        );

        $req_result = $request->where($condition2)->getField('req_id');

        if (!$req_result){
            $condition2 = array(
                'req_sender' => $msg_result['msg_receiver'],
                'req_receiver' => $msg_result['msg_request_id']
            );
            $req_result = $request->where($condition2)->getField('req_id');
        }

        return $req_result;
    }

    /*
     * 消息类型过滤器
     */
    public function msgTypeFilter(&$message){
        foreach ($message as &$r0){
            foreach ($r0 as &$r){
                switch ($r['msg_type']) {
                    case 1:
                        $type = '消息';
                        break;
                    case 2:
                        $type = '请求';
                        break;
                    case 3:
                        $type = '请求';
                        break;
                    case 4:
                        $type = '回复';
                        break;
                    case 5:
                        $type = '面试';
                        break;
                    case 6:
                        $type = '面试';
                    default:
                        break;
                }
                $r['msg_type'] = $type;
            }
        }
    }
}