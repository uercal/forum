<?php

namespace app\store\model;

use app\common\model\Recruit as RecruitModel;
use think\Request;
use think\Db;

/**
 * 地区模型
 * Class Region
 * @package app\store\model
 */
class Recruit extends RecruitModel
{
    public function getList()
    {
        $map = input();
        $_map = [];
        // 
        if (!empty($map['type'])) {
            $_map['user_id'] = $map['type'] == 10 ? ['=', 0] : ['>', 0];
        }

        $list =  $this->where($_map)->order('create_time desc')->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
        return compact('map', 'list');
    }



    public function add($data)
    {
        if ($data['job_price'] > $data['_job_price']) {
            $this->error = '薪资区间错误!';
            return false;
        }
        if ($data['job_experience'] > $data['_job_experience']) {
            $this->error = '工作经验区间错误!';
            return false;
        }
        // 开启事务
        Db::startTrans();
        try {
            $data['job_price'] = $data['job_price'] . ',' . $data['_job_price'];
            $data['job_experience'] = $data['job_experience'] . ',' . $data['_job_experience'];
            $data['user_id'] = 0;
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
        if ($data['job_price'] > $data['_job_price']) {
            $this->error = '薪资区间错误!';
            return false;
        }
        if ($data['job_experience'] > $data['_job_experience']) {
            $this->error = '工作经验区间错误!';
            return false;
        }
        // 开启事务
        Db::startTrans();
        try {
            $data['job_price'] = $data['job_price'] . ',' . $data['_job_price'];
            $data['job_experience'] = $data['job_experience'] . ',' . $data['_job_experience'];            
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
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
