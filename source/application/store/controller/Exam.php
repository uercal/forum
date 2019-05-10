<?php

namespace app\store\controller;

use app\store\model\Exam as ExamModel;
use app\store\model\User;
use app\store\model\UserNewsOption;
use app\store\model\UploadFile;
use app\common\model\UploadApiFile;
use app\store\model\ListModel;

/**
 * 审核管理控制器
 * Class 
 * @package app\store\controller
 */
class Exam extends Controller
{
    public function index()
    {
        $model = new ExamModel;
        $res = $model->getList();
        $list = $res['data'];
        $map = $res['map'];
        return $this->fetch('list', compact('list', 'map'));
    }


    // 审核
    public function detail($id)
    {
        $info = ExamModel::with(['user' => ['company', 'person']])->find($id);
        switch ($info['type']) {
            case 10:
                $map = ExamModel::attrTextMap();
                break;
            case 20:
                $map = ExamModel::attrPaperTextMap();
                break;
            default:
                # code...
                break;
        }
        $imgMap = ExamModel::attrImgMap();
        $coverMap = ExamModel::attrCoverMap();
        $fileMap = ExamModel::attrFileMap();
        $textareaMap = ExamModel::attrTextAreaMap();
        $cateArrMap = ExamModel::attrCateArrMap();
        $contentArrMap = ExamModel::attrContentArrMap();
        // 
        $type = $info['type'];
        $status = $info['status'];
        $id = $info['id'];
        $content = $info['content'];
        $data_arr = json_decode($content, true);
        // 包含图片更换 属性更替
        $data = [];
        $data['input'] = [];
        $data['image'] = [];
        $data['file'] = [];
        if (empty($data_arr) && $info['type_bonus'] == 'expert') {
            // 
            $user_data = User::get($info['user_id'], ['person'])->toArray();
            $data_arr = $user_data['person'];
        }

        if ($info['type_bonus'] == 'paper') {
            if (!empty($data_arr['option_id'])) {
                $options = UserNewsOption::whereIn('id', $data_arr['option_id'])->column('name');
                $data_arr['option_id'] = implode(',', $options);
            }
            $data_arr['list_id'] = ListModel::get($data_arr['list_id'])->value('name');
        }

        foreach ($data_arr as $key => $value) {
            if (empty($value)) unset($data_arr[$key]);
        }

        foreach ($data_arr as $key => $value) {
            if (in_array($key, $imgMap)) {
                $data['image'][$key] = UploadApiFile::getFilePath($value);
            } elseif (in_array($key, $fileMap)) {
                $data['file'][$key] = UploadApiFile::getFilePath($value);
            } elseif (in_array($key, $coverMap)) {
                $data['cover'][$key] = UploadFile::get($value)['file_path'];
            } elseif (in_array($key, $textareaMap)) {
                $data['text'][$key] = $value;
            } elseif (in_array($key, $contentArrMap)) {
                $data['content'][$key] = $value;
            } elseif (array_key_exists($key, $cateArrMap)) {
                $_arr = [];
                foreach ($value as $k => $v) {
                    if (reset($v) == '' && end($v) == '') {
                        continue;
                    }
                    $__arr = [];
                    $__arr[] = [
                        'name' => reset($cateArrMap[$key]),
                        'value' => reset($v)
                    ];
                    $__arr[] = [
                        'name' => end($cateArrMap[$key]),
                        'value' => end($v)
                    ];
                    $_arr[] = $__arr;
                }
                if (empty($_arr)) continue;
                $data['array'][$key] = $_arr;
            } else {
                $data['input'][$key] = $value;
            }
        }
        // halt([$map, $data]);
        return $this->fetch('detail', compact('data', 'map', 'id', 'type', 'status', 'info', 'content'));
    }

    // 审核 ajax
    public function examine()
    {
        $post = input();
        $model = new ExamModel;
        if (!$model->updateStatus($post)) {
            return $this->renderError('审批失败,' . $model->error);
        }
        return $this->renderSuccess('审批成功');
    }
}
