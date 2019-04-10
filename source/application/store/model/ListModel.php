<?php

namespace app\store\model;

use app\common\model\ListModel as ListModelModel;
use think\Cache;
use think\Request;
use think\Db;


/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class ListModel extends ListModelModel
{
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        Db::startTrans();
        try {
            $this->allowField(true)->save($data);
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
    public function edit($data)
    {
        Db::startTrans();
        try {
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }


    // public function remove()
    // {
    //     return $this->delete();
    // }


    public function getListByModeId($mode_id)
    {
        return $this->where(['list_mode_id' => $mode_id])->select()->toArray();
    }
}
