<?php

namespace app\store\model;

use app\common\model\ListDetail as ListDetailModel;
use app\common\model\JobSort;
use think\Cache;
use think\Request;
use think\Db;


/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class ListDetail extends ListDetailModel
{
    protected $error;
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data, $key_word)
    {
        // halt([$data, $key_word]);
        Db::startTrans();
        try {
            switch ($key_word) {
                    // 
                case 'news':
                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }
                    if (!empty($data['attachment'])) {
                        $attachment_ids = $data['attachment'];
                        $upload_ids = [];
                        foreach ($attachment_ids as $key => $value) {
                            $upload_ids[] = $value;
                        }
                        $data['attachment_ids'] = implode(',', $upload_ids);
                    }
                    if (isset($data['option_id'])) {
                        $data['option_id'] = implode(',', $data['option_id']);
                    }
                    $this->allowField(true)->save($data);
                    break;

                    // 
                case 'job':
                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }
                    $this->allowField(true)->save($data);

                    $job_model = JobSort::get(['list_id' => $data['list_id']]);
                    //    
                    $_data = [];
                    $_data[] = [
                        'name' => $data['job'],
                        'value' => 100,
                        'content' => ''
                    ];
                    $_data = json_encode($_data);
                    //  
                    if (!$job_model) {
                        $job_model = new JobSort;
                        $job_model->save(['data' => $_data, 'list_id' => $data['list_id']]);
                    } elseif ($job_model['data'] == 'null') {
                        $job_model->save(['data' => $_data, 'list_id' => $data['list_id']]);
                    } else {
                        $_data = $job_model->getInfo($data['list_id']);
                        $_data = json_encode($_data);
                        $job_model->save(['data' => $_data]);
                    }
                    //
                    break;

                    // 
                case 'mag':
                    $data['data'] = json_encode(['jumpUrl' => $data['data']]);
                    $this->allowField(true)->save($data);
                    break;

                case 'user_news':
                    $data['option_id'] = implode(',', $data['option_id']);
                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }
                    $this->allowField(true)->save($data);
                    break;
            }

            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    /**
     * 编辑记录
     * @param $data
     * @return bool|int
     */
    public function edit($data, $key_word)
    {
        Db::startTrans();
        try {
            switch ($key_word) {
                    // 
                case 'news':
                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }
                    if (!empty($data['attachment'])) {
                        $attachment_ids = $data['attachment'];
                        $upload_ids = [];
                        foreach ($attachment_ids as $key => $value) {
                            $upload_ids[] = $value;
                        }
                        $data['attachment_ids'] = implode(',', $upload_ids);
                    }
                    if (isset($data['option_id'])) {
                        $data['option_id'] = implode(',', $data['option_id']);
                    }

                    $this->allowField(true)->save($data);
                    break;

                    // 
                case 'job':
                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }
                    $this->allowField(true)->save($data);
                    break;

                    // 
                case 'mag':

                    if (isset($data['cover_id'])) {
                        $data['cover_id'] = array_values($data['cover_id'])[0];
                    }

                    if (isset($data['option_id'])) {
                        $data['option_id'] = implode(',', $data['option_id']);
                    }

                    $data['data'] = json_encode(['jumpUrl' => $data['data']]);
                    $this->allowField(true)->save($data);
                    break;
            }

            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }


    public function remove()
    {
        $exam_id = $this->exam_id;
        Db::startTrans();
        try {
            if (!empty($exam_id)) {
                $exam_model = new Exam;
                $exam_model->where(['id' => $exam_id])->delete();
            }
            $this->delete();
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    public function getList($map = [])
    {
        return $this->where($map)->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
