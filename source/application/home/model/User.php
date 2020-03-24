<?php

namespace app\home\model;

use app\common\model\User as UserModel;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use app\home\model\ActivityUserLog;
use app\home\model\UserSup;
use app\home\model\UploadApiFile;
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
                $_map = [];
                if (input('title')) {
                    $_map['name'] = ['like', '%' . input('title') . '%'];
                    $_map['memberLevel'] = ['like', '%' . input('title') . '%'];
                    $_map['belong_company'] = ['like', '%' . input('title') . '%'];
                    $_map['education_degree'] = ['like', '%' . input('title') . '%'];
                    $_map['education_degree_xw'] = ['like', '%' . input('title') . '%'];
                    $_map['positio'] = ['like', '%' . input('title') . '%'];
                    $_map['pro_qualify'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserPerson;
                $list = $model->where($map)->whereOr($_map)->where('memberLevel', 'not null')->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'expert':
                $_map = [];
                if (input('title')) {
                    $_map['name'] = ['like', '%' . input('title') . '%'];
                    $_map['expertLevel'] = ['like', '%' . input('title') . '%'];
                    $_map['education_major'] = ['like', '%' . input('title') . '%'];
                    $_map['education_degree'] = ['like', '%' . input('title') . '%'];
                    $_map['education_degree_xw'] = ['like', '%' . input('title') . '%'];
                    $_map['positio'] = ['like', '%' . input('title') . '%'];
                    $_map['pro_qualify'] = ['like', '%' . input('title') . '%'];
                }
                $model = new UserPerson;
                $list = $model->where($map)->whereOr($_map)->order($order)->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'company':
                $_map = [];
                if (input('title')) {
                    $_map['company_name'] = ['like', '%' . input('title') . '%'];
                    $_map['memberLevel'] = ['like', '%' . input('title') . '%'];
                    $_map['company_type'] = ['like', '%' . input('title') . '%'];
                    $_map['address'] = ['like', '%' . input('title') . '%'];
                    //
                    $json_text = str_replace("\\", "_", json_encode(input('title')));
                    $json_text = str_replace('"', "", $json_text);
                    $json_text = trim($json_text);
                    $json_text = strval($json_text);
                    $_map['server_cate'] = ['like', '%' . $json_text . '%'];
                }
                $model = new UserCompany;
                $list = $model->with(['user'])->where($map)->whereOr($_map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'supplier':
                $_map = [];	//sup
                $__map = []; //company
                if (input('title')) {
                    $_map['sup_company_name'] = ['like', '%' . input('title') . '%'];
                    $_map['sup_company_address'] = ['like', '%' . input('title') . '%'];
                    //
                    $json_text = str_replace("\\", "_", json_encode(input('title')));
                    $json_text = str_replace('"', "", $json_text);
                    $json_text = trim($json_text);
                    $json_text = strval($json_text);
                    $__map['server_cate'] = ['like', '%' . $json_text . '%'];
                    $__map['eng_cate'] = ['like', '%' . $json_text . '%'];
                    $__map['goods_cate'] = ['like', '%' . $json_text . '%'];
                    //
                    $__map['company_name'] = ['like', '%' . input('title') . '%'];
                    $__map['address'] = ['like', '%' . input('title') . '%'];
                }
                
                
                $sql = Db::table('forum_users_company')
                    ->field('user_id,create_time,company_logo as id_photo,company_name as sup_company_name,company_tel as sup_company_tel,
				address as sup_company_address,company_type as sup_company_type,email as sup_company_email')
                    ->where($map)
                    ->whereOr($__map)
                    ->buildSql();

                //构建sys表 union 联合
                $data = Db::table('forum_users_sup')
                    ->field('user_id,create_time,id_photo,sup_company_name,
				sup_company_tel,sup_company_address,sup_company_type,sup_company_email')
                    ->union($sql, true)
                    ->where($map)
                    ->whereOr($_map)
                    ->buildSql();

                //获得查询结果
                $list = Db::table($data.' as  a')
                    ->order('a.create_time desc')
                    ->paginate(10, false, ['query'=>$request->request()]);
                                                                                                                                       
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
                'last_login' => !empty($user['last_login']) ? date('Y/m/d H:i:s', $user['last_login']) : date('Y/m/d H:i:s', time()),
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
        // username
        $user_name = $data['user_name'];
        if(empty($user_name)){
            $this->error = '用户名不能为空';
            return false;
        }
        if(strlen($user_name)<5){
            $this->error = '用户名长度不能小于5位';
            return false;
        }
        // password
        $password = yoshop_hash($data['password']);
        $obj = $this->where('user_name', $user_name)->find();

        if ($obj) {
            $this->error = '此用户名已经存在，请您更换其他用户名注册！';
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
        
        //
        $sup_log = new ActivitySupport;
        if ($num) {
            $my_sup = $sup_log->getAllListByUser($this->user_id, $num);
        } else {
            $my_sup = $sup_log->getListByUser($this->user_id);
        }
                        
        return compact('my_act', 'my_sup');
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
