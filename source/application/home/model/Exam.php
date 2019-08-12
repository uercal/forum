<?php

namespace app\home\model;

use app\common\model\Exam as ExamModel;
use app\home\model\ListDetail;
use app\home\model\Projects;
use app\home\model\Recruit;
use function Qiniu\json_decode;
use think\Db;
use think\Request;

/**
 * 模型
 * @package app\store\model
 */
class Exam extends ExamModel
{
    public $error;

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
                $map['update_time'] = ['between', [strtotime('-1 day'), time()]];
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
    public function getDataAjax($user_id, $type)
    {
        //
        $input = input();
        $map = [];
        $map['user_id'] = ['=', $user_id];
        // 类型 论文
        switch ($type) {
            case 'paper':
                $map['type'] = ['=', 20];
                break;
            case 'project':
                $map['type'] = ['=', 30];
                break;
            case 'recruit':
                $map['type'] = ['=', 40];
                break;
        }
        // paper
        if (!empty($input['list_id'])) {
            $map['id_bonus'] = ['in', $input['list_id']];
        }
        if (!empty($input['status'])) {
            $map['status'] = ['in', $input['status']];
        } else {
            $map['status'] = ['in', [10, 20, 30]];
        }
        // project

        // common
        if (!empty($input['key_word'])) {
            $map['str_bonus'] = ['like', '%' . $input['key_word'] . '%'];
        }

        $data = $this->with(['listDetail', 'listDetail.list', 'project', 'recruit'])->where($map)->order('create_time desc')->paginate(5, false, [
            'query' => Request::instance()->request(),
        ]);

        return $data;
    }

    /**
     * updateExam
     */
    public function updateExam($form, $form_type, $user_id, $level_option)
    {
        //
        if ($form_type == 'person' || $form_type == 'expert') {
            //
            $form['positio'] = implode(',', $form['positio']);
            $form['area'] = implode(',', $form['area']);
            $form['highPeople'] = !empty($form['highPeople']) ? implode(',', $form['highPeople']) : '';
            $form['pro_qualify'] = !empty($form['pro_qualify']) ? implode(',', $form['pro_qualify']) : '';
        }
        //
        switch ($form_type) {
            case 'paper':
                $id_bonus = $form['list_id'];
                $str_bonus = $form['title'];
                $content = json_encode($form);
                $post = [
                    'user_id' => $user_id,
                    'level_option' => $level_option,
                    'content' => $content,
                    'type' => 20, //论文提交
                    'type_bonus' => 'paper',
                    'id_bonus' => $id_bonus,
                    'str_bonus' => $str_bonus,
                ];
                break;

            case 'project':
                $str_bonus = $form['title'];
                $content = json_encode($form);
                $post = [
                    'user_id' => $user_id,
                    'level_option' => $level_option,
                    'content' => $content,
                    'type' => 30, //项目提交
                    'type_bonus' => 'project',
                    'str_bonus' => $str_bonus,
                ];
                break;

            case 'recruit':
                $str_bonus = $form['job_name'];
                $content = json_encode($form);
                $post = [
                    'user_id' => $user_id,
                    'level_option' => $level_option,
                    'content' => $content,
                    'type' => 40, //招聘提交
                    'type_bonus' => 'recruit',
                    'str_bonus' => $str_bonus,
                ];
                break;
            case 'site':
                $content = json_encode([]);
                $post = [
                    'user_id' => $user_id,
                    'level_option' => $level_option,
                    'content' => $content,
                    'type' => 50, //子站申请
                    'type_bonus' => 'site',
                ];
                break;
            default:
                $content = json_encode($form);
                $post = [
                    'user_id' => $user_id,
                    'level_option' => $level_option,
                    'content' => $content,
                    'type' => 10, //用户升级
                    'type_bonus' => $form_type,
                ];
                break;
        }

        // 修改会员信息 做判断是否有修改
        if ($post['type'] == 10) {
            $last_info = $this->where([
                'user_id' => $user_id,
                'type' => 10,
                'status' => 20,
                'type_bonus' => $form_type,
            ])->order('id desc')->find();
            //
            if ($last_info) {
                $old_content = json_decode($last_info['content'], true);
                $content_arr = json_decode($content, true);
                $equal = true;
                foreach ($old_content as $key => $value) {
                    if (in_array($key, $this::getInvalidArr())) {
                        continue;
                    }
                    if ($value != $content_arr[$key]) {
                        $equal = false;
                    }
                }
                if ($equal) {
                    $this->error = '无修改信息不予提交';
                    return false;
                }
            }
        }

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

    public function deleteExamPaper($id, $type)
    {

        //$id 为 exam_id

        switch ($type) {
            case 'paper':
                $model = new ListDetail;
                break;

            case 'project':
                $model = new Projects;
                break;

            case 'recruit':
                $model = new Recruit;
                break;
        }

        // 开启事务
        Db::startTrans();
        try {
            $model->where(['exam_id' => $id])->delete();
            $this->where(['id' => $id])->update([
                'status' => 40,
            ]);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }

    public static function getInvalidArr()
    {
        $keys = [
            'create_time',
            'update_time',
            // person
            'id_photo_path', 'gender_name', 'person_file_path', 'education_date',
            // company
            'company_logo_path', 'license_file_path', 'build_time_text',
            // sup
            'id_photo_path', 'person_file_path',
            'sup_eng_cate_text', 'sup_goods_cate_text', 'sup_server_cate_text',
            'sup_eng_cate_name', 'sup_goods_cate_name', 'sup_server_cate_name',
            'sup_build_time_text',
            //
            'memberLevel',

        ];
        return $keys;
    }
}
