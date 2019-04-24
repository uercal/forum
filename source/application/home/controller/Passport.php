<?php

namespace app\store\controller;

use app\store\model\StoreUser;
use app\home\model\User;
use think\Session;

/**
 * Class Passport
 * @package app\store\controller
 */
class Passport extends Controller
{    
    public function login()
    {
        if ($this->request->isAjax()) {
            $model = new StoreUser;
            if ($model->login($this->postData('User'))) {
                return $this->renderSuccess('登录成功', url('index/index'));
            }
            return $this->renderError($model->getError() ?: '登录失败');
        }
        // 取消模板
        $this->view->engine->layout(false);
        // 
        return $this->fetch('login');
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear('yoshop_store');
        $this->redirect('passport/login');
    }

}
