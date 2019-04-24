<?php

namespace app\home\model;

use app\common\model\User as UserModel;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use think\Session;
use think\Request;
use think\Db;

/**
 * 用户模型
 * Class User
 * @package app\store\model
 */
class User extends UserModel
{

    public $error;

    public function getUsersList($mode_data)
    {
        // 
        $request = Request::instance();

        $map = [];
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'create_time asc';
        }

        if (input('type')) {
            $mode_data = input('type');
        } else {
            $mode_data = 'normal';
        }
        // 
        switch ($mode_data) {
            case 'normal':
                if (input('title')) {
                    $map['user_name'] = ['like', '%' . input('title') . '%'];
                }
                $list = $this->where($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'person':
                # code...
                break;
            case 'expert':
                # code...
                break;
            case 'company':
                # code...
                break;
            case 'supplier':
                # code...
                break;
            default:
                # code...
                break;
        }



        return compact('list');
    }



    // login
    public function login($data)
    {
        // 验证用户名密码是否正确
        if (!$user = $this->with(['avatar'])->where([
            'user_name' => $data['user_name'],
            'password' => yoshop_hash($data['password'])
        ])->find()) {
            $this->error = '登录失败, 用户名或密码错误';
            return false;
        }
        // halt($user);
        $user = $user->toArray();

        $this->lastLogin($user['user_id']);

        // 保存登录状态
        Session::set('forum_user', [
            'user' => [
                'user_id' => $user['user_id'],
                'user_name' => $user['user_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => date('Y/m/d H:i:s', $user['last_login'])
            ],
            'is_login' => true,
        ]);
        return true;
    }



    // register
    public function register($data)
    {
        if ($data['password'] != $data['_password']) {
            $this->error = '两次密码不一致';
            return false;
        }
        if (strlen($data['password']) < 6) {
            $this->error = '密码过短，请重新设置';
            return false;
        }
        $user_name = $data['user_name'];
        $password = yoshop_hash($data['password']);

        $obj = $this->where('user_name', $user_name)->find();

        if ($obj) {
            $this->error = '用户名已存在！';
            return false;
        }

        // 开启事务
        Db::startTrans();
        try {
            $this->allowField(true)->save([
                'user_name' => $user_name,
                'password' => $password
            ]);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }


    public function accessLogin($data)
    {
        // 验证用户名密码是否正确
        if (!$user = $this->with(['avatar'])->where([
            'user_name' => $data['user_name'],
            'password' => yoshop_hash($data['password'])
        ])->find()) {
            return false;
        }
        $user = $user->toArray();
        $this->lastLogin($user['user_id']);
        // 保存登录状态
        Session::set('forum_user', [
            'user' => [
                'user_id' => $user['user_id'],
                'user_name' => $user['user_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => date('Y/m/d H:i:s', $user['last_login'])
            ],
            'is_login' => true,
        ]);
        return true;
    }



    public static function freshUserSession()
    {
        $user = self::with(['avatar'])->where(['user_id' => session('forum_user')['user']['user_id']])->find()->toArray();
        Session::set('forum_user', [
            'user' => [
                'user_id' => $user['user_id'],
                'user_name' => $user['user_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => date('Y/m/d H:i:s', $user['last_login'])
            ],
            'is_login' => true,
        ]);
    }


    // 
    public function lastLogin($user_id)
    {
        $this->where('user_id', $user_id)->update([
            'last_login' => time()
        ]);
    }
}
