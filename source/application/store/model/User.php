<?php

namespace app\store\model;

use app\common\model\User as UserModel;
use app\store\model\Exam;
use app\store\model\ListDetail;
use app\store\model\Projects;
use app\store\model\Recruit;
use app\store\model\UserCompany;
use app\store\model\UserPerson;
use app\store\model\UserSup;
use think\Db;

/**
 * 用户模型
 * Class User
 * @package app\store\model
 */
class User extends UserModel
{

    protected $error;

    public function remove()
    {
        // 开启事务
        Db::startTrans();
        try {
            //
            UserPerson::where('user_id', $this->user_id)->delete();
            UserCompany::where('user_id', $this->user_id)->delete();
            UserSup::where('user_id', $this->user_id)->delete();
            Exam::where('user_id', $this->user_id)->delete();
            ListDetail::where('user_id', $this->user_id)->delete();
            Projects::where('user_id', $this->user_id)->delete();
            Recruit::where('user_id', $this->user_id)->delete();
            //
            $this->delete();
            //
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    public function removeAttach()
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->save([
                'attachment_id' => 0,
            ]);
            //
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    public function uploadAttach($file_id)
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->save([
                'attachment_id' => $file_id,
            ]);
            //
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    public function resetPass()
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->save([
                'password' => yoshop_hash('123456'),
            ]);
            //
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

    public function updateLevel()
    {
        $input = input();
        switch ($this->role) {
            case 1:
                $obj = new UserPerson();
                $data = [
                    'memberLevel' => $input['memberLevel'],
                    'expertLevel' => $input['expertLevel'],
                ];
                break;
            case 2:
                $obj = new UserPerson();
                $data = [
                    'expertLevel' => $input['expertLevel'],
                ];
                break;

            case 3:
                $obj = new UserCompany();
                $data = [
                    'memberLevel' => $input['memberLevel'],
                ];
                break;
        }

        // 开启事务
        Db::startTrans();
        try {
            $obj->save($data, [
                'user_id' => $this->user_id,
            ]);
            //
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }

}
