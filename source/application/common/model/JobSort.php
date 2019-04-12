<?php

namespace app\common\model;

use think\Request;
use think\Db;
use app\common\model\ListDetail;

/**
 * 模型
 * Class Exam
 * @package app\common\model
 */
class JobSort extends BaseModel
{
    protected $name = 'job_sort';
    protected $insert = ['wxapp_id' => 10001];
    protected $updateTime = false;

    public function getInfo($list_id)
    {
        $model = new ListDetail;
        $data = $model->field(['job'])->where(['list_id' => $list_id])->select()->toArray();
        $data = array_column($data, null, 'job');
        foreach ($data as $key => $value) {
            $data[$key]['value'] = 100;
        }
        $origin = self::where('list_id', $list_id)->value('data');

        if (!$origin) { } else {
            $origin = json_decode($origin, true);
            foreach ($data as $key => $value) {
                $data[$key]['value'] = $origin[$key];
            }
        }

        // rebuild        
        $_data = [];
        foreach ($data as $key => $value) {
            $_data[] = [
                'name' => $key,
                'value' => $value['value']
            ];
        }

        usort($data, function ($a, $b) {
            return $a['value'] > $b['value'];
        });

        return $_data;
    }


    public function updateData($list_id, $data)
    {
        Db::startTrans();
        try {
            $data = json_encode(array_column($data, 'value', 'name'));
            $_this = $this->get($list_id);
            if ($_this) {
                $_this->save(['data' => $data]);
            } else {
                $this->save([
                    'list_id' => $list_id,
                    'data' => $data
                ]);
            }
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }


    // 
    public function getInfoForUser($list_id)
    {
        $obj = $this->where(['list_id' => $list_id])->find();
        $data = $obj ? json_decode($obj['data'], true) : [];
        $is_exist = $obj ? $obj['is_exist'] : 0;
        return compact('data', 'is_exist');
    }


    public function updateForUser($list_id, $data)
    {
        Db::startTrans();
        try {
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]['index'] = $key;
            }
            $data['data'] = json_encode($data['data']);
            $_this = $this->get($list_id);
            if ($_this) {
                $_this->save([
                    'data' => $data['data'],
                    'is_exist' => $data['is_exist'],
                ]);
            } else {
                $this->save([
                    'list_id' => $list_id,
                    'data' => $data['data'],
                    'is_exist' => $data['is_exist'],
                ]);
            }
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }
}
