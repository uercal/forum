<?php

namespace app\store\model;

use app\common\model\ListDetail as ListDetailModel;
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
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data, $key_word)
    {
        // halt([$data,$key_word]);
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
                    $data['data'] = json_encode(['jumpUrl' => $data['data']]);
                    $this->allowField(true)->save($data);
                    break;

                case 'user_news':
                    $data['option_id'] = implode(',',$data['option_id']);
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
        return $this->delete();
    }

    public function getList($map = [])
    {
        return $this->where($map)->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
