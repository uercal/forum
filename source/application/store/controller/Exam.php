<?php

namespace app\store\controller;

use app\store\model\Exam as ExamModel;
use app\store\model\User;
use app\store\model\UserNewsOption;
use app\store\model\UploadFile;
use app\common\model\UploadApiFile;
use app\store\model\Projects;
use app\store\model\Region;
use app\store\model\ListModel;
use app\store\model\Recruit;

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
                // 判断审批部分内容  去重
                $this->checkOverParts($info);
                // 
                break;
            case 20:
                $map = ExamModel::attrPaperTextMap();
                break;
            case 30:
                $map = ExamModel::attrProjectTextMap();
                break;
            case 40:
                $map = ExamModel::attrRecruitTextMap();
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


        // 特殊字段处理
        switch ($info['type_bonus']) {

            case 'paper':
                if (!empty($data_arr['option_id'])) {
                    $options = UserNewsOption::whereIn('id', $data_arr['option_id'])->column('name');
                    $data_arr['option_id'] = implode(',', $options);
                }
                $data_arr['list_id'] = ListModel::get($data_arr['list_id'])->value('name');
                break;

            case 'project':
                $server_cate = Projects::$server_cate;
                $eng_cate = Projects::$eng_cate;
                $data_arr['region_id'] = Region::getMergeNameById($data_arr['region_id']);
                foreach ($data_arr['server_cate'] as $key => $value) {
                    $data_arr['server_cate'][$key] = $server_cate[$value];
                }
                foreach ($data_arr['eng_cate'] as $key => $value) {
                    $data_arr['eng_cate'][$key] = $eng_cate[$value];
                }
                $data_arr['server_cate'] =  implode(',', $data_arr['server_cate']);
                $data_arr['eng_cate'] =  implode(',', $data_arr['eng_cate']);
                break;

            case 'recruit':
                $recruit = new Recruit;
                $data_arr['job_address'] = Region::getMergeNameById($data_arr['job_address'][2]);
                $data_arr['job_experience'] = $recruit->getJobExperienceNameAttr('', $data_arr);
                $data_arr['job_education'] = $recruit->getJobEducationNameAttr('', $data_arr);
                $data_arr['job_price'] = implode('-', $data_arr['job_price']);

            default:
                # code...
                break;
        }


        foreach ($data_arr as $key => $value) {
            if (empty($value)) unset($data_arr[$key]);
        }



        // 组装数据
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
        // 
        if (isset($info['old_content'])) {
            $old_arr = $info['old_content'];
            $old_data = [];
            $old_data['input'] = [];
            $old_data['image'] = [];
            $old_data['file'] = [];
            // 
            foreach ($old_arr as $key => $value) {
                if (in_array($key, $imgMap)) {
                    $old_data['image'][$key] = UploadApiFile::getFilePath($value);
                } elseif (in_array($key, $fileMap)) {
                    $old_data['file'][$key] = UploadApiFile::getFilePath($value);
                } elseif (in_array($key, $coverMap)) {
                    $old_data['cover'][$key] = UploadFile::get($value)['file_path'];
                } elseif (in_array($key, $textareaMap)) {
                    $old_data['text'][$key] = $value;
                } elseif (in_array($key, $contentArrMap)) {
                    $old_data['content'][$key] = $value;
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
                    $old_data['array'][$key] = $_arr;
                } else {
                    $old_data['input'][$key] = $value;
                }
            }

            $_arr = [$data, $old_data];
            $data = $_arr[1];
            $new_data = $_arr[0];
            // halt([$data,$new_data]);
            $this->assign('new_data', $new_data);
        }




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



    /**
     * 去重
     */
    public function checkOverParts(&$info)
    {
        $last_info = ExamModel::where([
            'user_id' => $info['user_id'],
            'type' => 10,
            'status' => 20,
            'type_bonus' => $info['type_bonus']
        ])->where(['id' => ['<', $info['id']]])->order('id desc')->find();
        // 
        if (!$last_info) return true;
        // 
        $last_content = json_decode($last_info['content'], true);
        $content = json_decode($info['content'], true);
        $info['old_content'] = $content;
        foreach ($content as $key => $value) {
            if (isset($last_content[$key])) {
                if ($value == $last_content[$key]) {
                    unset($content[$key]);
                }
            }
        }
        //                 
        if (!empty($content)) {
            $info['content'] = json_encode($content);
        }
    }
}
