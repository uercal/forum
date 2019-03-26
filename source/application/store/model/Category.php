<?php

namespace app\store\model;

use app\common\model\Category as CategoryModel;
use app\store\model\Detail;
use think\Cache;
use think\Db;

/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class Category extends CategoryModel
{
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        //        if (!empty($data['image'])) {
        //            $data['image_id'] = UploadFile::getFildIdByName($data['image']);
        //        }
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑记录
     * @param $data
     * @return bool|int
     */
    public function edit($data)
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->deleteCache();
            //             
            $this->allowField(true)->save($data);
            //                  
            if ($data['mode'] == 'detail') {
                $detail = new Detail;
                $detail->category_id = $this->category_id;
                $detail->detail_mode_id = $data['detail_mode_id'];
                $detail->content = $data['detail']['content'];
                $detail->save();
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
     * 删除商品分类
     * @param $category_id
     * @return bool|int
     */
    public function remove($category_id)
    {
        // 判断是否存在商品
        if ($goodsCount = (new Goods)->where(compact('category_id'))->count()) {
            $this->error = '该分类下存在' . $goodsCount . '个商品，不允许删除';
            return false;
        }
        // 判断是否存在子分类
        if ((new self)->where(['parent_id' => $category_id])->count()) {
            $this->error = '该分类下存在子分类，请先删除';
            return false;
        }
        $this->deleteCache();
        return $this->delete();
    }

    /**
     * 删除缓存
     * @return bool
     */
    private function deleteCache()
    {
        return Cache::rm('category_' . self::$wxapp_id);
    }
}
