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

    /**
     * 全局layout模板输出
     */
    public function layout()
    {
        $this->assign([
            'base_url' => base_url(),                      // 当前域名
            'store_url' => url('/home'),              // 后台模块url
            'group' => $this->group,
            'menus' => $this->menus(),                     // 后台菜单
            'background' => $this->background(),
            'foot_company' => $this->foot_company(),
            'is_moblie' => Request::instance()->isMobile()
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
        $company = array_values($company)[0]['data'];
        return $company;
    }

    // 
    public function getIndexData()
    {
        $model = new WxappPage;
        $items = $model::detail()['page_data']['array']['items'];
        $items = array_column($items, null, 'type');
        // halt($items['nav']['data']);
        return $items;
    }



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
