<?php

namespace app\common\model;

use app\common\model\ListModel;
use think\Request;
use think\Db;

/**
 * 设备模型
 * Class Exam
 * @package app\common\model
 */
class Exam extends BaseModel
{
    protected $name = 'exam';
    protected $insert = ['wxapp_id' => 10001];
    protected $append = ['status_text', 'id_bonus_text', 'create_time_date'];

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    // 
    public function listDetail()
    {
        return $this->hasOne('ListDetail');
    }



    public function getStatusTextAttr($value, $data)
    {
        $status = [10 => '审核中', 20 => '已通过', 30 => '已驳回'];
        return $status[$data['status']];
    }

    public function getTypeTextAttr($value, $data)
    {
        $type = [10 => '会员升级', 20 => '论文提交', 30 => '项目提交'];
        return $type[$data['type']];
    }

    public function getTypeBonusTextAttr($value, $data)
    {
        $type = [
            'person' => '个人会员',
            'company' => '单位会员',
            'expert' => '专家会员',
            'supplier' => '供应商',
            //           
        ];

        if ($data['type_bonus'] == 'paper') {
            return ListModel::where('id', $data['id_bonus'])->value('name');
        }

        if ($data['type_bonus'] == 'project') {
            return $data['str_bonus'];
        }

        return $type[$data['type_bonus']];
    }

    public function getLevelOptionAttr($value, $data)
    {
        $type = [
            '1' => '普通会员',
            '2' => '个人会员',
            '3' => '单位会员'
        ];
        return $type[$data['level_option']];
    }

    public function getIdBonusTextAttr($value, $data)
    {
        switch ($data['type']) {
            case 20:
                return ListModel::where('id', $data['id_bonus'])->value('name');
                break;

            default:
                return '';
                break;
        }
    }

    public function getCreateTimeDateAttr($value, $data)
    {
        return date('Y-m-d', $data['create_time']);
    }

    public function getList()
    {
        $request = Request::instance();
        $map = $request->request();

        $_map = [];
        if (!empty($map['user_id'])) $_map['user_id'] = ['=', $map['user_id']];
        if (!empty($map['status'])) $_map['status'] = ['=', $map['status']];
        if (!empty($map['type'])) $_map['type'] = ['=', $map['type']];
        // 默认
        if (empty($map['type'])) {
            $_map['type'] = ['=', 10];
            $map['type'] = 10;
        }


        $data = $this->with(['user'])->where($_map)
            ->order(['update_time' => 'desc'])
            ->paginate(15, false, ['query' => $request->request()]);


        return ['data' => $data, 'map' => $map];
    }
}
