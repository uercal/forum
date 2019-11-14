<?php

namespace app\common\model;

use app\home\model\UploadApiFile;
use app\store\model\UserCompany;
use app\store\model\UserPerson;
use app\store\model\UserSup;
use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class User extends BaseModel
{
    protected $name = 'users';

    protected $append = ['show_name', 'avatar', 'role_name', 'avatar_path'];
    protected $role_attr = [
        0 => '普通用户', 1 => '个人会员', 2 => '入库专家', 3 => '单位会员', 4 => '入库供应商',
    ];

    //
    public static $levelPersonOptions = [
        '会长',
        '监事长',
        '常务副会长',
        '常务副监事长',
        '副会长',
        '副监事长',
        '秘书长',
        '副秘书长',
        '常务理事',
        '常务监事',
        '理事',
        '监事',
        '会员',
    ];

    public static $levelOptions = [
        '会长单位',
        '常务副会长单位',
        '副会长单位',
        '常务理事单位',
        '理事单位',
        '监事长单位',
        '常务副监事长单位',
        '副监事长单位',
        '常务监事单位',
        '监事单位',
        '会员单位',
    ];


    public static $expertLevelOptions = [
        '高级专家',
        '资深专家',
        '顶级专家',
    ];
 
    // 个人关联
    public function person()
    {
        return $this->hasOne('UserPerson', 'user_id', 'user_id');
    }

    // 单位关联
    public function company()
    {
        return $this->hasOne('UserCompany', 'user_id', 'user_id');
    }

    // supplier
    public function supplier()
    {
        return $this->hasOne('UserSup', 'user_id', 'user_id');
    }

    public function attachment()
    {
        return $this->hasOne('UploadFile', 'file_id', 'attachment_id');
    }

    public function avatar()
    {
        return $this->hasOne('UploadApiFile', 'file_id', 'avatar');
    }

    public function getAvatarPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['avatar']);
    }

    public function getShowNameAttr($value, $data)
    {
        $name = $data['user_name'];
        return $name;
    }

    public function getRoleNameAttr($valu, $data)
    {
        $role = explode(',', $data['role']);
        $role_name = '';
        foreach ($role as $key => $value) {
            $role[$key] = $this->role_attr[$value];
        }
        $role = implode(',', $role);
        return $role;
    }

    /**
     * 获取用户列表
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList()
    {
        $request = Request::instance();
        $input = input();
        $map = [];
        !empty($input['user_id']) ? $map['user_id'] = ['=', $input['user_id']] : '';

        return $this->with(['attachment', 'person', 'company'])->where($map)->order(['create_time' => 'desc'])
            ->paginate(15, false, ['query' => $request->request()]);
    }

    public function getListByRole($role)
    {
        $request = Request::instance();
        $map = [];

        switch ($role) {
            case 0:
                # 普通用户...
                $name = '普通用户';
                $map['role'] = 0;
                !empty(input('user_id')) ? $map['user_id'] = ['=', input('user_id')] : '';
                $list = $this->with(['person', 'company', 'supplier', 'avatar', 'attachment'])->where($map)->order(['create_time' => 'desc'])
                    ->paginate(15, false, ['query' => $request->request()]);
                break;
            case 1:
                # 个人会员...
                $name = '个人会员+专家';
                $model = new UserPerson();
                !empty(input('user_id')) ? $map['user_id'] = ['=', input('user_id')] : '';
                !empty(input('memberLevel')) ? $map['memberLevel'] = ['=', input('memberLevel')] : '';
                !empty(input('expertLevel')) ? $map['expertLevel'] = ['=', input('expertLevel')] : '';
                if (!empty(input('attachment'))) {                    
                    if(input('attachment')==1){
                        $user_ids = $this->where('attachment_id is not null')->column('user_id');
                    }else{
                        $user_ids = $this->where('attachment_id is null')->column('user_id');
                    }                                        
                    $list = $model->with(['user.attachment'])->where($map)->whereNotNull('memberLevel')->whereIn('user_id', $user_ids)->order(['create_time' => 'desc'])
                        ->paginate(15, false, ['query' => $request->request()]);
                } else {
                    $list = $model->with(['user.attachment'])->where($map)->whereNotNull('memberLevel')->order(['create_time' => 'desc'])
                        ->paginate(15, false, ['query' => $request->request()]);
                }
                break;
            case 2:
                # 专家会员...
                $name = '仅专家';
                $model = new UserPerson();                
                !empty(input('user_id')) ? $map['user_id'] = ['=', input('user_id')] : '';
                !empty(input('expertLevel')) ? $map['expertLevel'] = ['=', input('expertLevel')] : '';
                if (!empty(input('attachment'))) {                    
                    if(input('attachment')==1){
                        $user_ids = $this->where('attachment_id is not null')->column('user_id');
                    }else{
                        $user_ids = $this->where('attachment_id is null')->column('user_id');
                    }                                        
                    $list = $model->with(['user.attachment'])->where('memberLevel is null')->where($map)->whereIn('user_id', $user_ids)->order(['create_time' => 'desc'])
                        ->paginate(15, false, ['query' => $request->request()]);
                } else {
                    $list = $model->with(['user.attachment'])->where('memberLevel is null')->where($map)->order(['create_time' => 'desc'])
                        ->paginate(15, false, ['query' => $request->request()]);
                }
                break;
            case 3:
                # 单位会员...
                $name = '单位会员+供应商';
                $model = new UserCompany();
                !empty(input('user_id')) ? $map['user_id'] = ['=', input('user_id')] : '';
                !empty(input('memberLevel')) ? $map['memberLevel'] = ['=', input('memberLevel')] : '';
                if (!empty(input('attachment'))) {                    
                    if(input('attachment')==1){
                        $user_ids = $this->where('attachment_id is not null')->column('user_id');
                    }else{
                        $user_ids = $this->where('attachment_id is null')->column('user_id');
                    }                                        
                    $list = $model->with(['user.attachment'])->where($map)->whereIn('user_id', $user_ids)->order(['create_time' => 'desc'])
                        ->paginate(15, false, ['query' => $request->request()]);
                } else {
                    $list = $model->with(['user.attachment'])->where($map)->order(['create_time' => 'desc'])
                    ->paginate(15, false, ['query' => $request->request()]);

                }
                break;
            case 4:
                # 供应商会员...
                $name = '仅供应商';
                !empty(input('user_id')) ? $map['user_id'] = ['=', input('user_id')] : '';
                $model = new UserSup();
                $list = $model->with(['user.attachment'])->where($map)->order(['create_time' => 'desc'])
                    ->paginate(15, false, ['query' => $request->request()]);

                break;
        }

        return compact('name', 'list');
    }

    /**
     * 获取用户信息
     * @param $where
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($where)
    {
        return self::get($where, ['avatar', 'company', 'person', 'supplier']);
    }
}
