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
    public $error;
    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        if (isset($data['options'])) {
            $data['options'] = str_replace('，', ',', $data['options']);
            $options = explode(',', $data['options']);
            $options_data = [];
            foreach ($options as $key => $value) {
                $_options_data = [];
                $_options_data['name'] = $value;
                $options_data[] = $_options_data;
            }
        }

        Db::startTrans();
        try {
            //           
            $this->allowField(true)->save($data);
            // 
            if (isset($data['options'])) {
                $this->userNewsOption()->saveAll($options_data);
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
    public function edit($data)
    {
        if (isset($data['options'])) {
            $data['options'] = str_replace('，', ',', $data['options']);
            $options = explode(',', $data['options']);
            $options_data = [];
            foreach ($options as $key => $value) {
                $_options_data = [];
                $_options_data['name'] = $value;
                $options_data[] = $_options_data;
            }
        }
        
        Db::startTrans();
        try {
            // 
            $this->userNewsOption()->delete();
            // 
            if (isset($options_data)) {
                $this->userNewsOption()->saveAll($options_data);
            }
            //             
            $this->allowField(true)->save($data);
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
        Db::startTrans();
        try {            
            $list_id = $this->id;
            $detail_model = new ListDetail;
            $detail_model->where(['list_id' => $list_id])->delete();
            $this->delete();
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }


    public function getListByModeId($mode_id)
    {
        return $this->where(['list_mode_id' => $mode_id])->select()->toArray();
    }
}
