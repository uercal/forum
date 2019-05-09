<?php

namespace app\home\controller;

use app\home\model\UploadFile;
use app\common\library\storage\Driver as StorageDriver;
use app\store\model\Setting as SettingModel;

/**
 * 文件库管理
 * Class Upload
 * @package app\store\controller
 */
class Upload extends Controller
{
    private $config;

    /**
     * 构造方法
     */
    public function _initialize()
    {
        parent::_initialize();
        // 存储配置信息
        $this->config = SettingModel::getItem('storage');
    }

    /**
     * 图片上传接口
     * @param int $group_id
     * @return array
     * @throws \think\Exception
     */
    public function file($upload_type, $group_id = -1)
    {
        $origin_name = input('name');
        // 实例化存储驱动
        $StorageDriver = new StorageDriver($this->config);
        // 上传图片
        if ($upload_type == 'image') {
            if (!$StorageDriver->upload()) {
                return json(['code' => 0, 'msg' => '图片上传失败' . $StorageDriver->getError()]);
            }
        } else if ($upload_type == 'attachment') {
            if (!$StorageDriver->uploadAttachment()) {
                return json(['code' => 0, 'msg' => '上传失败' . $StorageDriver->getError()]);
            }
        }
        // 上传路径
        $fileName = $StorageDriver->getFileName();
        // 信息
        $fileInfo = $StorageDriver->getFileInfo();
        // 
        $fileType = $upload_type == 'image' ? 'paper' : 'attachment';
        // 添加文件库记录
        $uploadFile = $this->addUploadFile($group_id, $fileName, $fileInfo, $fileType, $origin_name);
        // 图片上传成功
        return json(['code' => 1, 'msg' => '图片上传成功', 'data' => $uploadFile]);
    }

    /**
     * 添加文件库上传记录
     * @param $group_id
     * @param $fileName
     * @param $fileInfo
     * @param $fileType
     * @return UploadFile
     */
    private function addUploadFile($group_id, $fileName, $fileInfo, $fileType, $origin_name)
    {
        // 存储引擎
        $storage = $this->config['default'];
        // 存储域名
        $fileUrl = isset($this->config['engine'][$storage]) ? $this->config['engine'][$storage]['domain'] : '';
        // 添加文件库记录
        $model = new UploadFile;
        $model->add([
            'group_id' => $group_id > 0 ? (int)$group_id : 0,
            'storage' => $storage,
            'file_url' => $fileUrl,
            'file_name' => $fileName,
            'file_size' => $fileInfo['size'],
            'file_type' => $fileType,
            'origin_name' => $origin_name,
            'extension' => pathinfo($fileInfo['name'], PATHINFO_EXTENSION),
        ]);
        return $model;
    }
}
