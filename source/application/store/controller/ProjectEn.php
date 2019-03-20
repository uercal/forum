<?php

namespace app\store\controller;

use app\store\model\ArticleEn as ArticleModel;
use app\common\model\ProjectEn as ProjectModel;


/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class ProjectEn extends Controller
{
    public function index()
    {
        $model = new ProjectModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }


    /**
     * 添加
     * @return array|mixed
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        $model = new ProjectModel;
        if ($model->add($this->postData('project'))) {
            return $this->renderSuccess('添加成功', url('project_en/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }


    public function delete($id)
    {
        $model = ProjectModel::get($id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($id)
    {
        // 
        $model = ProjectModel::detail($id);
        if (!$this->request->isAjax()) {
            return $this->fetch('add', compact('model'));
        }
        // 
        if ($model->add($this->postData('project'))) {
            return $this->renderSuccess('更新成功', url('project_en/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
}
