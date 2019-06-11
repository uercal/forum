<?php

namespace app\common\model;

use think\Request;
use function Qiniu\json_decode;

/**
 * 用户问题类
 * Class User
 * @package app\common\model
 */
class UserQuestion extends BaseModel
{
    protected $name = 'users_question';
    protected $createTime = false;
    protected $updateTime = false;    
}
