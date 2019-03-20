<?php

namespace app\store\model;

use app\common\model\ArticleEn as ArticleModel;
use think\Cache;
use think\Request;

/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class ArticleEn extends ArticleModel
{
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        if (isset($data['pic_ids'])) {
            $data['pic_ids'] = json_encode(array_values($data['pic_ids']));
        }
        if (isset($data['banner_id'])) {
            $data['banner_id'] = json_encode(array_values($data['banner_id']));
        }
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑记录
     * @param $data
     * @return bool|int
     */
    public function edit($data)
    {
        if (isset($data['pic_ids'])) {
            $data['pic_ids'] = json_encode(array_values($data['pic_ids']));
        }
        if (isset($data['banner_id'])) {
            $data['banner_id'] = json_encode(array_values($data['banner_id']));
        }
        return $this->allowField(true)->save($data);
    }


    public function remove()
    {
        return $this->delete();
    }

    public function getList()
    {
        return $this->with(['parent'])->where([])->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }

    public function getPList()
    {
        return $this->where(['pid' => 0])->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
