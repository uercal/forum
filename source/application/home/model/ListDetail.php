<?php

namespace app\home\model;

use app\common\model\ListDetail as ListDetailModel;
use app\home\model\ListMode;
use app\home\model\ListModel;
use think\Cache;
use think\Request;
use think\Db;
use app\home\model\Exam;
use app\common\model\JobSort;

/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class ListDetail extends ListDetailModel
{
    public function getListDetail($list_id, $key_word, $user_id = null)
    {
        if ($key_word == 'job') {
            // 
            $job_sort = JobSort::where('list_id', $list_id)->value('data');
            $job_sort = array_column(json_decode($job_sort, true), null, 'name');
            $list = $this->with(['cover'])->where('list_id', $list_id)->select()->toArray();
            foreach ($list as $key => $value) {
                $job_sort[$value['job']]['data'][] = $value;
            }
            usort($job_sort, function ($a, $b) {
                return $a['value'] > $b['value'];
            });
            // halt(end($job_sort)['data'][0]['cover']);
            return $job_sort;
            // 
        } else {
            $map = [];
            $mapRaw = '';
            if ($user_id) {
                $map['user_id'] = ['=', $user_id];
            }
            if (input('option_id')) {
                $option_id = input('option_id');
                $mapRaw = "concat(',',option_id,',') LIKE '%$option_id%'";
            }
            if (input('title')) {
                $map['title'] = ['like', '%' . input('title') . '%'];
            }
            if (input('sort')) {
                $order = 'create_time ' . input('sort');
            } else {
                $order = 'create_time asc';
            }
            $map['list_id'] = ['=', $list_id];
            // 
            switch ($key_word) {
                case 'news':
                    $pageNum = 6;
                    break;
                case 'mag':
                    $pageNum = 10;
                    break;
                case 'user_news':
                    $pageNum = 10;
                    break;
                default:
                    $pageNum = 10;
                    break;
            }

            if (empty($mapRaw)) {
                return $this->with(['cover', 'user'])->where($map)->order($order)->paginate($pageNum, false, [
                    'query' => Request::instance()->request()
                ]);
            }
            return $this->with(['cover', 'user'])->where($map)->whereRaw($mapRaw)->order($order)->paginate($pageNum, false, [
                'query' => Request::instance()->request()
            ]);
            // 

        }
    }


    public function deleteExamPaper($detail_id)
    {
        $exam_id = $this->where(['id' => $detail_id])->value('exam_id');
        // 开启事务
        Db::startTrans();
        try {
            $this->where(['id' => $detail_id])->delete();
            $model = new Exam;
            $model->where(['id' => $exam_id])->update([
                'status' => 40
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
