<?php

namespace app\store\controller;

use app\store\model\Recruit as RecruitModel;
use app\store\model\Region;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Recruit extends Controller
{
    public function index()
    {
        $model = new RecruitModel;
        $data = $model->getList();
        $map = $data['map'];
        $list = $data['list'];
        return $this->fetch('index', compact('list', 'map'));
    }

    public function add()
    {
        if (!$this->request->isAjax()) {
            $region_data = Region::getCacheTree();
            return $this->fetch('add', compact('region_data'));
        }
        $model = new RecruitModel;
        if ($model->add($this->postData('recruit'))) {
            return $this->renderSuccess('添加成功', url('recruit/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }


    public function edit($id)
    {
        // 商品详情
        $model = RecruitModel::detail($id);
        if (!$this->request->isAjax()) {
            $region_data = Region::getCacheTree();
            return $this->fetch('edit', compact('model','region_data'));
        }
        // 更新记录
        if ($model->edit($this->postData('recruit'))) {
            return $this->renderSuccess('更新成功', url('recruit/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    public function delete($id)
    {
        $model = RecruitModel::get($id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }


    public function regionAjax($type, $pid, $cid)
    {
        $region_data = Region::getCacheTree();
        switch ($type) {
            case 'province':
                $res = $region_data[$pid];
                break;

            case 'city':
                $res = $region_data[$pid]['city'][$cid];
                break;
        }

        return $res;
    }
}
