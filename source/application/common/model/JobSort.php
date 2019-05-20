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
        $data = $model->field(['job','create_time'])->where(['list_id' => $list_id])->select()->toArray();        
        $data = array_column($data, null, 'job');
        $_data = [];
        foreach ($data as $key => $value) {
            $_data[] = [
                'name' => $key,
                'value' => 100,
                'content' => ''
            ];
        }
        $_data = array_column($_data, null, 'name');

        $origin = self::where('list_id', $list_id)->value('data');

        if (!$origin) { } else {
            $origin = json_decode($origin, true);
            $origin = array_column($origin, null, 'name');
            foreach ($_data as $key => $value) {
                if (isset($origin[$key])) {
                    $_data[$key]['value'] = $origin[$key]['value'];
                    $_data[$key]['content'] = $origin[$key]['content'];
                }
            }
        }
        
        usort($_data, function ($a, $b) {
            return $a['value'] > $b['value'];
        });

        return $_data;
    }


    public function updateData($list_id, $data)
    {
        Db::startTrans();
        try {
            $data = json_encode($data);
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
