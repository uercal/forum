<?php

namespace app\store\model;

use app\common\model\Exam as ExamModel;
use app\store\model\Quota;
use app\common\model\AccountMoney;
use app\common\model\User;
use app\common\model\PayLog;

use think\Db;


/**
 * 审核模型
 * Class Goods
 * @package app\store\model
 */
class Exam extends ExamModel
{
    public static function attrTextMap()
    {
        $data = [
            // 用户升级
            // company
            'company_name'=>'单位名称',
            'build_time'=> '成立时间',
            'legal_person'=> '单位法人',
            'company_code'=> '统一社会信用码',
            'company_type'=> '单位类型',
            'server_level'=> '工程服务资格及等级',
            'company_tel'=> '公司电话',
            'email'=> '单位邮箱',
            'manager_name'=> '联系人姓名',
            'manager_job'=> '联系人职务',
            'manager_phone'=>'联系人手机',
            'manager_wechat'=>'联系人微信号',
            'company_logo'=>'单位logo',
            'license_file'=>'单位证件附件',
            'company_intro'=> '单位简介',             
        ];
        return $data;
    }


    public static function attrImgMap(){
        return [
            // company
            'company_logo'
        ];
    }

    public static function attrFileMap(){
        return [
            // company
            'license_file'
        ];
    }






    public function updateStatus($data)
    {                                
        // 
        $obj = $this->where('id', $data['id'])->find();

        $content = $data['content'];
        // 筛选空值 content
        foreach ($content as $key => $value) {
            if (empty($value)) unset($content[$key]);
            if ($key == 'idcard_ids') {
                if ($value == "0,0") unset($content[$key]);
            }
            if ($key == 'other_ids') {
                if ($value == "0,0,0,0,0,0") unset($content[$key]);
            }
        }                
        
        // halt($data);
        // 开启事务
        Db::startTrans();
        try {            
            // $type==10 用户认证 获得额度
            if ($obj['type'] == 10) {
                $model = new Quota;
                $value = bcmul($data['quota_money'], 100, 0);
                $quota_log = $model->allowField(true)->save([
                    'quota_type' => 10,
                    'quota_money' => $value,
                    'user_id' => $obj['user_id'],
                    'exam_id' => $data['id']
                ]);
                $account = new AccountMoney;
                if (!$account::get($obj['user_id'])) {
                    $account->save([
                        'user_id' => $obj['user_id']
                    ]);
                }
                $account_obj = $account::get($obj['user_id']);
                $account_obj->setInc('quota_money', $value);
                // 
                $this->where('id', $data['id'])->update([
                    'status' => $data['status']
                ]);

                
                // 用户认证 更新用户资料
                $user = new User;
                $user->save($content, ['user_id' => $obj['user_id']]);
            }
            // $type==30 线下提现 确认
            if ($obj['type'] == 30) {

                if ($data['status'] == 20) {
                    // 扣掉余额。
                    $price = $content['cash_price'];
                    $account = new AccountMoney;
                    $account_obj = $account::get($obj['user_id']);
                    $account_obj->setDec('account_money', $price * 100);
                    // payLog 添加                    
                    $payLog = new PayLog;
                    $payLog->save([
                        'pay_type' => 40,//提现                        
                        'pay_price' => $price,
                        'user_id' => $obj['user_id']
                    ]);

                }

                $this->where('id', $data['id'])->update([
                    'status' => $data['status']
                ]);

            }
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            halt($e);
        }
        return false;
    }



}
