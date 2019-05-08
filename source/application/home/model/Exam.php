<?php

namespace app\home\model;

use app\common\model\Exam as ExamModel;
use app\home\model\ListMode;
use app\home\model\ListModel;
use app\home\model\ListDetail;
use think\Request;
use think\Db;

/**
 * 模型 
 * @package app\store\model
 */
class Exam extends ExamModel
{
    protected $error;
    /**
     * updateExam
     */
    public function updateExam($form, $form_type, $user_id, $level_option)
    {

        //         
        if ($form_type == 'person') {
            $form['work_limit'] = implode(',', $form['work_limit']);
        }
        // 
        $content = json_encode($form);
        $post = [
            'user_id' => $user_id,
            'level_option' => $level_option,
            'content' => $content,
            'type' => 10, //用户升级
            'type_bonus' => $form_type
        ];
        // 开启事务
        Db::startTrans();
        try {
            $this->allowField(true)->save($post);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }

    /**
     * 
     */
    public function getResMsg($user_id, $type)
    {
        $map = [];
        $map['user_id'] = ['=', $user_id];
        $map['type'] = ['=', 10];
        if ($type == 'success') {
            $map['status'] = ['=', 20];
            $obj = $this->where($map)->order('update_time desc')->find();
        }

        if ($type == 'reject') {
            $new_status = $this->order('update_time desc')->value('status');
            //
            if ($new_status == 30) {
                $map['update_time'] = ['between', [strtotime('-3 days'), time()]];
                $map['status'] = ['=', 30];
                // $r = $this->where($map)->order('update_time desc')->fetchSql(true)->find();            
                $obj = $this->where($map)->order('update_time desc')->find();
            }
        }
        $obj = isset($obj) ? $obj : [];

        return $obj;
    }



    /**
     * 获取提交的论文
     */
    public function getDataAjax($user_id)
    {
        //        
        $map = [];
        $map['user_id'] = ['=', $user_id];
        // 类型 论文
        $map['type'] = ['=', 20];
        if (input('list_id')) {
            $list_id = explode(',', input('list_id'));
            $map['id_bonus'] = ['in', $list_id];
        }
        if (input('status')) {
            $map['status'] = ['=', input('status')];
        }
        if (input('key_word')) {
            $map['str_bonus'] = ['like', '%' . input('key_word') . '%'];
        }
        
        $data = $this->with(['listDetail', 'listDetail.list'])->where($map)->paginate(1, false, [
            'query' => Request::instance()->request()
        ]);    

        return $data;
    }
}
