<?php
namespace app\home\controller;

use app\home\model\UserSite;
use app\home\model\ListMode;
use app\home\model\ListModel;
use app\home\model\Projects;
use app\home\model\User;
use app\home\model\ListDetail;
use app\home\model\Recruit;
// 
use think\Request;

/**
 * 
 * Class 
 * @package app\store\controller
 */
class Site extends Controller
{

    protected $user_id;


    public function _initialize()
    {
        $model = new UserSite;
        $code = $this->request->path();
        $code = strtoupper(explode('/', $code)[0]);
        $obj = $model->with(['user', 'company'])->where(['site_code' => $code])->find();
        // 
        $this->user_id = $obj['user']['user_id'];
        // 
        $user_id = $obj['user']['user_id'];
        $company = $obj['company'];
        // 获取首页数据        
        $list_mode_id = ListMode::where(['key_word' => 'user_news'])->value('id');
        // 会员动态（带图）
        $img_list = ListModel::with(['listDetail' => function ($query) use ($user_id) {
            $query->with(['cover'])->where(['user_id' => $user_id])->order('create_time desc')->limit(4);
        }])->where(['list_mode_id' => $list_mode_id, 'cover_exist' => 1])->find();
        // 学术天地（不带图）
        $normal_list = ListModel::with(['listDetail' => function ($query) use ($user_id) {
            $query->with(['user'])->where(['user_id' => $user_id])->order('create_time desc')->limit(2);
        }])->where(['list_mode_id' => $list_mode_id, 'cover_exist' => 0])->find();
        //         
        $project_list = Projects::where(['user_id' => $user_id])->order('create_time desc')->limit(3)->select();
        
        $index_data = compact('img_list', 'normal_list', 'project_list');

        // 
        $action = $this->request->action();

        $this->assign('action', $action);
        $this->assign('index_data', $index_data);
        $this->assign('company', $company);
        $this->view->engine->layout('site_layout/layout');
    }


    public function index()
    {
        return $this->fetch('/site/index');
    }


    public function companyinfo()
    {
        $detail = User::get($this->user_id, ['company']);
        return $this->fetch('/site/company_info', compact('detail'));
    }

    // 
    public function listNews()
    {
        $list_mode_id = ListMode::where(['key_word' => 'user_news'])->value('id');
        $user_id = $this->user_id;
        $list_obj = ListModel::with(['userNewsOption'])->where(['list_mode_id' => $list_mode_id, 'cover_exist' => 1])->find();
        $list_id = $list_obj['id'];
        $model = new ListDetail;
        $detail_list = $model->getListDetail($list_id, 'user_news', $this->user_id);
        return $this->fetch('/site/list_news', compact('detail_list', 'list_obj'));
    }


    public function listProject()
    {
        $project = new Projects;
        $data = $project->getListData($this->user_id);
        return $this->fetch('/site/project', compact('data'));
    }


    public function listNormal()
    {
        $list_mode_id = ListMode::where(['key_word' => 'user_news'])->value('id');
        $user_id = $this->user_id;
        $list_obj = ListModel::with(['userNewsOption'])->where(['list_mode_id' => $list_mode_id, 'cover_exist' => 0])->find();
        $list_id = $list_obj['id'];
        $model = new ListDetail;
        $detail_list = $model->getListDetail($list_id, 'user_news', $this->user_id);
        return $this->fetch('/site/list_normal', compact('detail_list', 'list_obj'));
    }


    public function listRecruit()
    {
        $recruit_model = new Recruit;
        $data = $recruit_model->getDataList('', $this->user_id);
        return $this->fetch('/site/list_recruit', compact('data'));
    }


    /**
     * 详情
     */
    public function listDetail($id)
    {
        $detail = ListDetail::detail($id);
        if ($detail['user_id'] != $this->user_id) {
            return false;
        }
        //         
        return $this->fetch('/site/list_detail', compact('detail', 'model'));
    }


    public function projectDetail($id)
    {
        $detail = Projects::detail($id);
        //         
        return $this->fetch('/site/project_detail', compact('detail'));
    }

    public function recruitDetail($id)
    {
        $detail =  Recruit::detail($id);
        return $this->fetch('/site/recruit', compact('detail'));
    }
}
