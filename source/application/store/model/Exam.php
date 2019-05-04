<?php

namespace app\store\model;

use app\common\model\AccountMoney;
use app\common\model\Exam as ExamModel;
use app\common\model\PayLog;
use app\common\model\User;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use think\Db;

/**
 * 审核模型
 * Class Goods.
 */
class Exam extends ExamModel
{
    public static function attrTextMap()
    {
        $data = [
            // 用户升级
            // company
            'company_name' => '单位名称',
            'build_time' => '成立时间',
            'legal_person' => '单位法人',
            'company_code' => '统一社会信用码',
            'company_type' => '单位类型',
            'server_level' => '工程服务资格及等级',
            'company_tel' => '公司电话',
            'email' => '单位邮箱',
            'manager_name' => '联系人姓名',
            'manager_job' => '联系人职务',
            'manager_phone' => '联系人手机',
            'manager_wechat' => '联系人微信号',
            'company_logo' => '单位logo',
            'license_file' => '单位证件附件',
            'company_intro' => '单位简介',
        ];

        return $data;
    }

    public static function attrImgMap()
    {
        return [
            // company
            'company_logo',
        ];
    }

    public static function attrFileMap()
    {
        return [
            // company
            'license_file',
        ];
    }

    public function updateStatus($data)
    {
        $obj = $this->where('id', $data['id'])->find();

        $content = $data['content'];
        // 筛选空值 content
        foreach ($content as $key => $value) {
            if (empty($value)) {
                unset($content[$key]);
            }
        }

        // halt($data);
        // 开启事务
        Db::startTrans();
        try {
            // $type==10 用户升级
            if ($obj['type'] == 10) {
                $user = User::get($obj['user_id']);
                $role_str = $user['role'];
                $type_bonus = $obj['type_bonus'];
                switch ($type_bonus) {
                    case 'person':
                        // 个人会员
                        $role = 1;
                        $new_role = strtr($role_str, 0, $role);
                        $user_model = new UserPerson();

                        break;

                    case 'company':
                        // 单位会员
                        $role = 3;
                        $new_role = strtr($role_str, 0, $role);
                        $user_model = new UserCompany();
                        $_obj = $user_model::get(['user_id'=>$obj['user_id']]);
                        if($_obj){
                            $_obj->save($content);
                        }else{
                            $content['user_id'] = $obj['user_id'];
                            $user_model->insert($content);    
                        }
                        
                        break;

                    case 'expert':
                        $role = 2;
                        $new_role = $role_str . ',2';
                        break;

                    case 'supplier':
                        $role = 4;
                        $new_role = $role_str . ',4';
                        break;
                }
                
                
                $this->where('id', $data['id'])->update([
                    'status' => $data['status'],
                ]);
               
                // 用户认证 更新用户资料
                $user->save([
                    'role' => $new_role,
                ]);


            }
            // $type==30 线下提现 确认
            if ($obj['type'] == 30) {
                if ($data['status'] == 20) {
                    // 扣掉余额。
                    $price = $content['cash_price'];
                    $account = new AccountMoney();
                    $account_obj = $account::get($obj['user_id']);
                    $account_obj->setDec('account_money', $price * 100);
                    // payLog 添加
                    $payLog = new PayLog();
                    $payLog->save([
                        'pay_type' => 40, //提现
                        'pay_price' => $price,
                        'user_id' => $obj['user_id'],
                    ]);
                }

                $this->where('id', $data['id'])->update([
                    'status' => $data['status'],
                ]);
            }
            Db::commit();

            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            halt($e->getMessage());
        }

        return false;
    }
}
