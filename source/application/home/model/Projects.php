<?php

namespace app\home\model;

use app\common\model\Projects as ProjectsModel;
use app\common\model\Region;
use think\Db;
use think\Request;

/**
 * 项目模型
 * Class Region
 * @package app\store\model
 */
class Projects extends ProjectsModel
{
    public function getListData($user_id = null)
    {
        $map = input();
        $_map = [];
        if ($user_id) {
            $_map['user_id'] = ['=', $user_id];
        }
        if (input('title')) {
            $_map['title'] = ['like', '%' . input('title') . '%'];
        }
        if (input('sort')) {
            $order = 'assignment_date ' . input('sort');
        } else {
            $order = 'assignment_date desc';
        }

        //
        $filter_arr = [
            'server_cate',
            'eng_cate',
            'region_option',
            'assignment_money',
            'total_invest',
            'assignment_date',
        ];
        $filter = $map;
        foreach ($filter as $key => $value) {
            if (!in_array($key, $filter_arr) || empty($value)) {
                unset($filter[$key]);
            } else {
                if ($key == 'assignment_money') {
                    $filter[$key] .= '万元';
                }
                if ($key == 'total_invest') {
                    $filter[$key] .= '万元';
                }
                if ($key == 'assignment_date') {
                    $_t = explode(',', $value);
                    $filter[$key] = $_t[0] . '至' . $_t[1];
                }
            }
        }
        if (input('region_option')) {            
            $region_ids = explode(',', input('region_option'));
            $_map['province_id'] = ['=', $region_ids[0]];
            isset($region_ids[1]) ? $_map['city_id'] = ['=', $region_ids[1]] : '';
            isset($region_ids[2]) ? $_map['region_id'] = ['=', $region_ids[2]] : '';
            $region_name = Region::getMergeNameById(end($region_ids));
            $filter['region_option'] = $region_name;            
        }

        //

        $cates = $this->getCates();
        //
        if (!empty($map['server_cate'])) {
            $_map['server_cate'] = ['like', '%' . $map['server_cate'] . '%'];
            $filter['server_cate'] = $cates['server_cate'][$map['server_cate']];
        }
        if (!empty($map['eng_cate'])) {
            $_map['eng_cate'] = ['like', '%' . $map['eng_cate'] . '%'];
            $filter['eng_cate'] = $cates['eng_cate'][$map['eng_cate']];
        }
        //
        if (!empty($map['assignment_money'])) {
            $_assignment_money = explode('-', $map['assignment_money']);
            $_map['assignment_money'] = ['between', $_assignment_money];
        }
        if (!empty($map['total_invest'])) {
            $_total_invest = explode('-', $map['total_invest']);
            $_map['total_invest'] = ['between', $_total_invest];
        }

        if (!empty($map['assignment_date'])) {
            $_t = explode(',', $map['assignment_date']);
            $_map['assignment_date'] = ['between', strtotime($_t[0]) . ',' . strtotime($_t[1])];
        }

        // $r = $this->where($_map)->fetchSql(true)->select();
        // halt($r);

        $list = $this->where($_map)->order($order)->paginate(10, false, [
            'query' => Request::instance()->request(),
        ]);

        // $list =  $this->where($_map)->order($order)->select()->toArray();

        // halt($list[0]);
        //
        $regionData = Region::getCacheTree();

        foreach ($regionData as $key => $value) {
            $regionData[$key]['children'] = [];
            $regionData[$key]['value'] = $value['id'];
            $regionData[$key]['label'] = $value['name'];
            foreach ($value['city'] as $k => $v) {
                $v['label'] = $v['name'];
                $v['value'] = $v['id'];
                $v['children'] = [];
                foreach ($v['region'] as $_k => $_v) {
                    $_v['label'] = $_v['name'];
                    $_v['value'] = $_v['id'];
                    $v['children'][] = $_v;
                }
                $regionData[$key]['children'][] = $v;
            }
        }
        $regionData = array_values($regionData);

        return compact('map', 'list', 'cates', 'filter', 'regionData');
    }

    public function deleteExamProject($project_id)
    {
        $exam_id = $this->where(['id' => $project_id])->value('exam_id');
        // 开启事务
        Db::startTrans();
        try {
            $this->where(['id' => $project_id])->delete();
            $model = new Exam;
            $model->where(['id' => $exam_id])->update([
                'status' => 40,
            ]);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }
}
