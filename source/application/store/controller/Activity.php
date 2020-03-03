<?php

namespace app\store\controller;

use app\store\controller\Office;
use app\store\model\Activity as ActivityModel;
use app\store\model\ActivitySupport;
use app\store\model\ActivityUserLog;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Activity extends Controller
{
    public function index()
    {
        $model = new ActivityModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    public function add()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        $model = new ActivityModel;
        if ($model->add($this->postData('activity'))) {
            return $this->renderSuccess('添加成功', url('activity/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    public function edit($id)
    {
        // 商品详情
        $model = ActivityModel::detail($id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('activity'))) {
            return $this->renderSuccess('更新成功', url('activity/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    public function delete($id)
    {
        $model = ActivityModel::get($id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * report
     * 报名人员
     */
    public function sign_report($id)
    {
        $model = new ActivityUserLog;
        $detail = ActivityModel::get($id);
        $list = $model->getReportList($id);
        return $this->fetch('sign_report', compact('list', 'detail'));
    }

    /**
     * report
     * 赞助人员
     */
    public function sup_report($id)
    {
        $model = new ActivitySupport;
        $detail = ActivityModel::get($id);
        $list = $model->getReportList($id);
        return $this->fetch('sup_report', compact('list', 'detail'));
    }

    public function outsign($act_id)
    {
        $excel = new Office;
        $detail = ActivityModel::get($act_id);
        $model = new ActivityUserLog;
        $data = $model->with(['company', 'person', 'supplier'])->where(['act_id' => $act_id])->select()->toArray();
        //设置表头：
        $head = ['序号', '联系人', '联系电话', '报名人数', '学历学位', '职位', '职称', '单位名称', '单位电话', '邮箱'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['index', 'concat_person', 'phone', 'member_count', 'education_degree', 'job', 'positio', 'company_name||sup_company_name', 'company_tel||sup_company_tel', 'email||sup_company_email'];

        $excel->outdata($detail['title'] . '报名表', $data, $head, $keys);
    }

    public function outsup($act_id)
    {
        $excel = new Office;
        $detail = ActivityModel::get($act_id);
        $model = new ActivitySupport;
        $data = $model->with(['company'])->where(['act_id' => $act_id])->select()->toArray();
        //设置表头：
        $head = ['序号', '联系人', '联系电话', '单位名称', '职位/职称', '单位电话', '邮箱'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['index', 'concat_person', 'phone', 'concat_company', 'concat_job', 'company_tel', 'concat_email'];

        $excel->outdata($detail['title'] . '赞助表', $data, $head, $keys);
    }
}
