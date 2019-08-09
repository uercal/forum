<?php

namespace app\home\model;

use app\common\model\User as UserModel;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use app\home\model\ActivityUserLog;
use app\home\model\UserSup;
use think\Db;
use think\Request;
use think\Session;

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
            $order = 'create_time desc';
        }

        if (input('type')) {
            $mode_data = input('type');
        }
        //
        switch ($mode_data) {
            case 'normal':
                if (input('title')) {
                    $map['name'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserPerson;
                $list = $model->where($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                //
                $mode_data = 'person';
                break;
            case 'person':
                if (input('title')) {
                    $map['name'] = ['like', '%' . input('title') . '%'];
                    $map['memberLevel'] = ['like', '%' . input('title') . '%'];
                    $map['belong_company'] = ['like', '%' . input('title') . '%'];
                    $map['education_degree'] = ['like', '%' . input('title') . '%'];
                    $map['education_degree_xw'] = ['like', '%' . input('title') . '%'];
                    $map['positio'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserPerson;
                $list = $model->whereOr($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'expert':
                $_map = [];
                if (input('title')) {
                    $_map['name'] = ['like', '%' . input('title') . '%'];
                }
                $map['role'] = ['like', '%2%'];
                $all_ids = $this->where($map)->column('user_id');
                $_map['user_id'] = ['in', $all_ids];
                $model = new UserPerson;
                $list = $model->where($_map)->order($order)->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'company':
                if (input('title')) {
                    $map['company_name'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserCompany;
                $list = $model->with(['user'])->where($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'supplier':
                if (input('title')) {
                    $map['sup_company_name'] = ['like', '%' . input('title') . '%'];
                    $map['sup_company_address'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserSup;
                // halt($model->fetchSql(true)->WhereOr($map)->select());
                $list = $model->with(['user'])->whereOr($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
        }

        return compact('list', 'mode_data');
    }

    // login
    public function login($data)
    {
        // 验证用户名密码是否正确
        if (!$user = $this->with(['avatar'])->where([
            'user_name' => $data['user_name'],
            'password' => yoshop_hash($data['password']),
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
                'role_name' => $user['role_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => $user['last_login'] ? date('Y/m/d H:i:s', $user['last_login']) : date('Y/m/d H:i:s', time()),
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
        if (empty($data['question_id'])) {
            $this->error = '请选择密保问题';
            return false;
        }
        if (empty($data['answer'])) {
            $this->error = '请填写密保答案';
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
                'password' => $password,
                'question_id' => $data['question_id'],
                'answer' => $data['answer'],
                'role' => '0',
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
            'password' => yoshop_hash($data['password']),
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
                'role_name' => $user['role_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => date('Y/m/d H:i:s', $user['last_login']),
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
                'role_name' => $user['role_name'],
                'role' => $user['role'],
                'avatar' => $user['avatar']['file_path'],
                'show_name' => $user['show_name'],
                'last_login' => date('Y/m/d H:i:s', $user['last_login']),
            ],
            'is_login' => true,
        ]);
    }

    //
    public function lastLogin($user_id)
    {
        $this->where('user_id', $user_id)->update([
            'last_login' => time(),
        ]);
    }

    //
    public function getActLog($num = null)
    {
        //
        $act_log = new ActivityUserLog;
        if ($num) {
            $my_act = $act_log->getAllListByUser($this->user_id, $num);
        } else {
            $my_act = $act_log->getListByUser($this->user_id);
        }

        return compact('my_act');
    }

    /**
     * 修改密码
     */
    public function resetPass($pass, $new_pass)
    {
        $password = yoshop_hash($pass);
        if ($password != $this->password) {
            $this->error = '旧密码错误！';
            return false;
        }
        $new_password = yoshop_hash($new_pass);
        // 开启事务
        Db::startTrans();
        try {
            $this->save([
                'password' => $new_password,
            ]);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }

    /**
     *
     */
    public function isPassProtect($data)
    {
        $obj = $this->where([
            'user_name' => $data['username'],
        ])->find();

        if (!$obj) {
            $this->error = '用户名不存在';
            return false;
        }

        if ($obj['question_id'] == $data['question_id'] && $obj['answer'] == $data['answer']) {
            return true;
        } else {
            $this->error = '密保或答案错误';
            return false;
        }
    }

    public function getAnswer($data)
    {
        $obj = $this->where([
            'user_name' => $data['username'],
        ])->find();

        if (!$obj) {
            $this->error = '用户名不存在';
            return false;
        }
        return $obj['question_id'];        
    }

    /**
     *
     */
    public function editPass($data)
    {
        // 开启事务
        Db::startTrans();
        try {
            //
            $this->where([
                'user_name' => $data['user_name'],
                'question_id' => $data['question_id'],
                'answer' => $data['answer'],
            ])->update([
                'password' => yoshop_hash($data['password']),
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
