<?php

namespace app\home\model;

use app\common\model\UploadApiFile as UploadApiFileModel;
use app\home\model\UploadFile;
use think\Exception;
use think\Db;


/**
 * 文件库模型
 * Class UploadFile
 * @package app\store\model
 */
class UploadApiFile extends UploadApiFileModel
{

    protected $error;
    protected $file;
    /**
     * Upload
     */
    public function upload($file, $param, $user_id)
    {
        // 
        $this->file = $file;
        // 文件信息
        $this->fileInfo = $this->file->getInfo();
        // 上传目录                
        $uplodDir = WEB_PATH . 'uploads/api';
        $salt = md5('yugu' . $user_id . $param);
        $salt = substr($salt, 0, 8);
        // if ($param == 'paperCover' || $param == 'projectCover')
        $salt = time();
        $fileName = 'u' . $user_id . $param . $salt . '.' . pathinfo($this->fileInfo['name'], PATHINFO_EXTENSION);
        // 验证文件并上传
        $info = $this->file->validate([
            'size' => 2 * 1024 * 1024, 'ext' => 'pdf,jpg,jpeg,png'
        ])
            ->move($uplodDir, $fileName);


        if (empty($info)) {
            $this->error = $this->file->getError();
            $res = ['code' => 0, 'msg' => $this->error];
            return $res;
        }
        if ($param == 'paperCover' || $param == 'projectCover') {
            $file_id = $this->addLocalUploadFile($fileName, $this->fileInfo);
        } else {
            $file_id = $this->addUploadFile($fileName, $this->fileInfo);
        }

        $res = ['code' => 1, 'file_id' => $file_id];
        return $res;
    }


    private function addUploadFile($fileName, $fileInfo)
    {
        // 添加文件库记录
        $obj = $this->where([
            'file_name' => $fileName
        ])->find();
        if ($obj) {
            return $obj['file_id'];
        } else {
            $newObj = self::create([
                'file_name' => $fileName,
                'extension' => pathinfo($fileInfo['name'], PATHINFO_EXTENSION),
            ]);
            return $newObj->file_id;
        }
    }

    private function addLocalUploadFile($fileName, $fileInfo)
    {
        $model = new UploadFile;
        $data = [
            'storage' => 'local',
            'file_name' => 'api/' . $fileName,
            'file_type' => 'paperCover',
            'extension' => pathinfo($fileInfo['name'], PATHINFO_EXTENSION)
        ];
        $model->save($data);
        return $model->file_id;
    }
}
