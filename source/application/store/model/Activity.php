<?php

namespace app\store\model;

use app\common\model\Activity as ActivityModel;
use think\Db;
use think\Request;

/**
 * 模型
 * @package app\store\model
 */
class Activity extends ActivityModel
{
    public function getList()
    {
        return $this->with(['cover'])->where([])->order('create_time desc')->paginate(15, false, [
            'query' => Request::instance()->request(),
        ]);
    }

    public function add($data)
    {
        if (!isset($data['sign_begin']) || !isset($data['sign_end']) || !isset($data['active_begin']) || !isset($data['active_end'])) {
            $this->error = '时间没有选择!';
            return false;
        }
        // 开启事务
        Db::startTrans();
        try {
            $data['sign_begin'] = strtotime($data['sign_begin']);
            $data['sign_end'] = strtotime($data['sign_end'] . ' 23:59:59');
            $data['active_begin'] = strtotime($data['active_begin']);
            $data['active_end'] = strtotime($data['active_end'] . ' 23:59:59');
            //
            if (isset($data['cover_id'])) {
                $data['cover_id'] = array_values($data['cover_id'])[0];
            }

            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }

    public function edit($data)
    {        
		if (isset($data['cover_id'])) {
			$data['cover_id'] = array_values($data['cover_id'])[0];
		}        
        unset($data['sign_begin']);
        unset($data['sign_end']);
        unset($data['active_begin']);
        unset($data['active_end']);
        return $this->allowField(true)->save($data);
    }

    public function remove()
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->delete();
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }
}
