<?php

namespace app\home\model;

use app\common\model\Exam as ExamModel;
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
        $form['build_time'] = strtotime($form['build_time']);
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
}
