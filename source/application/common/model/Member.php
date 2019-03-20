<?php

namespace app\common\model;

use think\Hook;
use think\Request;


/**
 * member 
 * @package app\common\model
 */
class Member extends BaseModel
{
    protected $name = 'store_member';
   




    public function roleNameAttr()
    {
        return $this->hasOne('Role', 'id', 'role_id')->bind('role_name');
    }


    // 关联权限表
    public function role()
    {
        return $this->hasOne('Role', 'id', 'role_id');
    }


    public function wxapp()
    {
        return $this->belongsTo('Wxapp');
    }




    public static function detail($id)
    {
        return self::with(['role'])->find($id);
    }





}
