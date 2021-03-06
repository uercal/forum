<?php

namespace app\common\library\storage\engine;

/**
 * 本地文件驱动
 * Class Local
 * @package app\common\library\storage\drivers
 */
class Local extends Server
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 上传图片文件
     * @return array|bool
     */
    public function upload($file_type = null)
    {
        // 上传目录
        $uplodDir = WEB_PATH . 'uploads';
        switch ($file_type) {
            case 'attachment':
                // 验证文件并上传
                $info = $this->file->validate([
                    'size' => 2 * 1024 * 1024
                ])
                    ->move($uplodDir, $this->fileName);
                break;                

            default:
                // 验证文件并上传
                $info = $this->file->validate([
                    'size' => 2 * 1024 * 1024, 'ext' => 'jpg,jpeg,png,gif'
                ])
                    ->move($uplodDir, $this->fileName);
                break;
        }

        if (empty($info)) {
            $this->error = $this->file->getError();
            return false;
        }
        return true;
    }

    /**
     * 返回文件路径
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }
}
