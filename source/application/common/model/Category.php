<?php

namespace app\common\model;

use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\common\model
 */
class Category extends BaseModel
{
    protected $name = 'category';

    /**
     * 分类图片
     * @return \think\model\relation\HasOne
     */
    public function image()
    {
        return $this->hasOne('uploadFile', 'file_id', 'image_id');
    }


    // 
    public function detail()
    {
        return $this->hasOne('Detail', 'category_id', 'category_id');
    }



    public function parent()
    {
        return $this->hasOne('Category', 'category_id', 'parent_id');
    }


    public function list()
    {
        return $this->hasOne('ListModel', 'id', 'list_id');
    }


    public function listMode()
    {
        return $this->hasOne('ListMode', 'id', 'list_mode_id');
    }


    /**
     * 所有分类
     * @return mixed
     */
    public static function getALL()
    {
        $model = new static;
        if (!Cache::get('category_' . $model::$wxapp_id)) {
            $data = $model->with(['image'])->order(['sort' => 'asc'])->select();
            $all = !empty($data) ? $data->toArray() : [];
            $tree = [];
            foreach ($all as $first) {
                if ($first['parent_id'] !== 0) continue;
                $twoTree = [];
                foreach ($all as $two) {
                    if ($two['parent_id'] !== $first['category_id']) continue;
                    $threeTree = [];
                    foreach ($all as $three)
                        $three['parent_id'] === $two['category_id']
                            && $threeTree[$three['category_id']] = $three;
                    !empty($threeTree) && $two['child'] = $threeTree;
                    $twoTree[$two['category_id']] = $two;
                }
                if (!empty($twoTree)) {
                    array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
                    $first['child'] = $twoTree;
                }
                $tree[$first['category_id']] = $first;
            }
            Cache::set('category_' . $model::$wxapp_id, compact('all', 'tree'));
        }
        return Cache::get('category_' . $model::$wxapp_id);
    }

    /**
     * 获取所有分类
     * @return mixed
     */
    public static function getCacheAll()
    {
        return self::getALL()['all'];
    }

    /**
     * 获取所有分类(树状结构)
     * @return mixed
     */
    public static function getCacheTree()
    {
        return self::getALL()['tree'];
    }
}
