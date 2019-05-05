<?php

namespace app\store\controller;

use app\store\model\Exam as ExamModel;
use app\common\model\UploadApiFile;

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
        $map = ExamModel::attrTextMap();
        $imgMap = ExamModel::attrImgMap();
        $fileMap = ExamModel::attrFileMap();
        $textareaMap = ExamModel::attrTextAreaMap();
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
        foreach ($data_arr as $key => $value) {
            if (in_array($key, $imgMap)) {
                $data['image'][$key] = UploadApiFile::getFilePath($value);
            } elseif (in_array($key, $fileMap)) {
                $data['file'][$key] = UploadApiFile::getFilePath($value);
            } elseif (in_array($key, $textareaMap)) {
                $data['text'][$key] = $value;
            } else {
                $data['input'][$key] = $value;
            }
        }
        //         
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
