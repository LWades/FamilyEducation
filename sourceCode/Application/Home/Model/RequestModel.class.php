<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/5/7
 * Time: 17:35
 */

namespace Home\Model;
use Think\Model;

class RequestModel extends Model{

    protected $_auto = array(
        array('req_time', 'getDatetime', 3, 'callback')
    );

    public function getDatetime(){
        return date('Y-m-d H:i:s');
    }

    public function getTecRequest($id){
        $request = M('request');

        $condition['req_sender'] = $id;

        $count = $request->where($condition)->count();
        $Page = new \Think\Page($count, 5);
//        $show = $Page->show();

        $Page->lastSuffix = false;//最后一页不显示为总页数
        $Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($Page->show());//重点在这里

        $result['result'] = $request->where($condition)
            ->join('fes_stu_apply ON fes_request.req_receiver = fes_stu_apply.apl_user_id')
            ->join('fes_student ON fes_stu_apply.apl_user_id = fes_student.stu_user_id')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $result['page'] = $page_show;

        return $result;
    }

    public function getStuRequest($id){
        $request = M('request');

        $condition['req_sender'] = $id;

        $count = $request->where($condition)->count();
        $Page = new \Think\Page($count, 5);

        $Page->lastSuffix = false;//最后一页不显示为总页数
        $Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($Page->show());//重点在这里

        $result['result'] = $request->where($condition)
            ->join('fes_tec_apply ON fes_request.req_receiver = fes_tec_apply.apl_user_id')
            ->join('fes_teacher ON fes_tec_apply.apl_user_id = fes_teacher.tec_user_id')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        $result['page'] = $page_show;

        return $result;
    }

    public function statusFilter(&$request){
        foreach ($request as &$r){
            switch ($r['req_status']){
                case 0:
                    $status = '尚未回应';
                    break;
                case 1:
                    $status = '已同意，等待您回复';
                    break;
                case 2:
                    $status = '双方均已同意';
                    break;
                case 3:
                    $status = '已拒绝';
                    break;
                case 4:
                    $status = '请求者已回绝';
                    break;
                default:
                    break;
            }
            $r['req_status'] = $status;
        }
    }
}