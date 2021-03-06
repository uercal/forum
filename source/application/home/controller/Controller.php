<?php

namespace app\home\controller;

use think\Config;
use think\Session;
use app\common\model\Article;
use app\common\model\WxappPage;
use app\store\model\Setting;
use think\Request;
use think\Route;
use app\common\model\Category;
use app\home\model\ListDetail;
use app\home\model\Activity;
use app\home\model\Projects;

/**
 * 后台控制器基类
 * Class BaseController
 * @package app\store\controller
 */
class Controller extends \think\Controller
{
    /* @var array $store 商家登录信息 */
    protected $store;

    /* @var string $route 当前控制器名称 */
    protected $controller = '';

    /* @var string $route 当前方法名称 */
    protected $action = '';

    /* @var string $route 当前路由uri */
    protected $routeUri = '';

    /* @var string $route 当前路由：分组名称 */
    protected $group = '';

    /* @var array $allowAllAction 登录验证白名单 */
    protected $allowAllAction = [
        // 登录页面
        'passport/login',
    ];

    /* @var array $notLayoutAction 无需全局layout */
    protected $notLayoutAction = [
        // 登录页面
        'passport/login',
    ];

    /**
     * 后台初始化
     */
    public function _initialize()
    {        
        \think\Url::root('index.php?s=');

        // \think\Url::root('/');
        //         
        // 当前路由信息
        $this->getRouteinfo();
        // 全局layout
        $this->layout();        
    }

    public function _empty()
    { }

    /**
     * 全局layout模板输出
     */
    public function layout()
    {
        $this->assign([
            'base_url' => base_url(),                      // 当前域名
            'store_url' => url('/home'),              // 后台模块url
            'group' => $this->group,
            'menus' => $this->menus(),                     // 菜单
            'background' => $this->background(),
            'foot_company' => $this->foot_company(),
            'is_moblie' => Request::instance()->isMobile(),
            'index_data' => $this->getIndexData(),
            'login_user' => session('forum_user') ? session('forum_user')['user'] : null
            // 'index_jump' => $this->getIndexJump(),
            // 'store' => $this->store,                       // 商家登录信息
            // 'setting' => Setting::getAll() ?: null,        // 当前商城设置
        ]);
    }

    /**
     * 解析当前路由参数 （分组名称、控制器名称、方法名）
     */
    public function getRouteinfo()
    {        
        // 控制器名称
        $this->controller = toUnderScore($this->request->controller());        
        // 方法名称
        $this->action = $this->request->action();
        // 控制器分组 (用于定义所属模块)
        $groupstr = strstr($this->controller, '.', true);
        $this->group = $groupstr !== false ? $groupstr : $this->controller;
        // 当前uri
        $this->routeUri = $this->controller . '/' . $this->action;
    }

    /**
     * 菜单配置
     * @return array
     */
    private function menus()
    {
        $list = Category::getCacheTree();
        return $list;
    }


    /**
     * 轮播图
     */
    private function background()
    {
        $model = new WxappPage;
        $items = $model::detail()['page_data']['array']['items'];
        $items = array_values($items);
        $banner = array_filter($items, function ($a) {
            return $a['type'] == 'banner';
        });
        $banner = array_values($banner)[0]['data'];
        return $banner;
    }

    private function foot_company()
    {
        $model = new WxappPage;
        $items = $model::detail()['page_data']['array']['items'];
        $items = array_values($items);
        $company = array_filter($items, function ($a) {
            return $a['type'] == 'company';
        });
		if(isset(array_values($company)[0]['data'])){
			$company = array_values($company)[0]['data'];
		}else{
			$company = [];
		}        		
        return $company;
    }

    // 
    public function getIndexData()
    {
        $model = new WxappPage;
        $items = $model::detail()['page_data']['array']['items'];		
        $items = array_column($items, null, 'type');		
        if (isset($items['activity'])) {
            $activity = $items['activity']['data'];            
            $activity_ids = array_column($activity, 'id', null);                  
            $activity_order = implode(',',$activity_ids);
            $act_model = new Activity;
            $_data = $act_model->with(['cover'])->whereIn('id', $activity_ids)->orderRaw("field(id,$activity_order)")->select()->toArray();            
            $items['activity']['data'] = $_data;
        }
        if (isset($items['projects'])) {
            $projects = $items['projects']['data'];
            $projects_ids = array_column($projects, 'project_id', null);
            $projects_order = implode(',',$projects_ids);
            $pro_model = new Projects;
            $_data = $pro_model->with(['cover'])->whereIn('id', $projects_ids)->orderRaw("field(id,$projects_order)")->select()->toArray();
            $items['projects']['data'] = $_data;
        }
        if (isset($items['user_news'])) {
            $user_news = $items['user_news']['data'];
            $user_news_ids = array_column($user_news, 'id', null);
            $user_news_order = implode(',',$user_news_ids);
            $list_detail = new ListDetail;
            $_data = $list_detail->with(['user' => ['person', 'company']])->whereIn('id', $user_news_ids)->orderRaw("field(id,$user_news_order)")->select()->toArray();
            $items['user_news']['data'] = $_data;
        }
        // halt($items['projects']['data']);
        // halt($items['user_news']['data']);		
        return $items;
    }


    // 获取首页所有模块 category_id












    /**
     * 获取当前wxapp_id
     */
    protected function getWxappId()
    {
        return $this->store['wxapp']['wxapp_id'];
    }

    /**
     * 返回封装后的 API 数据到客户端
     * @param int $code
     * @param string $msg
     * @param string $url
     * @param array $data
     * @return array
     */
    protected function renderJson($code = 1, $msg = '', $url = '', $data = [])
    {
        return compact('code', 'msg', 'url', 'data');
    }

    /**
     * 返回操作成功json
     * @param string $msg
     * @param string $url
     * @param array $data
     * @return array
     */
    protected function renderSuccess($msg = 'success', $url = '', $data = [])
    {
        return $this->renderJson(1, $msg, $url, $data);
    }


    protected function renderJsonSuccess($msg = 'success', $url = '', $data = [])
    {
        return json_encode($this->renderJson(1, $msg, $url, $data));
    }


    /**
     * 返回操作失败json
     * @param string $msg
     * @param string $url
     * @param array $data
     * @return array
     */
    protected function renderError($msg = 'error', $url = '', $data = [])
    {
        return $this->renderJson(0, $msg, $url, $data);
    }


    protected function renderJsonError($msg = 'error', $url = '', $data = [])
    {
        return json_encode($this->renderJson(0, $msg, $url, $data));
    }


    /**
     * 获取post数据 (数组)
     * @param $key
     * @return mixed
     */
    protected function postData($key)
    {
        return $this->request->post($key . '/a');
    }
}
