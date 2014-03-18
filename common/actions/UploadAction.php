<?php
class UploadAction extends CAction
{
    private $limit_file_size;
    private $_file_path;

    public function run()
    {
        $controller = $this->controller;

        $this->limit_file_size = H::Config('max_upload_file_size');
        $upload_image_model = CUploadedFile::getInstanceByName('ajax_upload_image_file_handle');

        if(is_object($upload_image_model) && get_class($upload_image_model)=='CUploadedFile')
        {
            list($status, $info, $extra) = $this->_doUpload($upload_image_model);
            $controller->renderJSON($status, $info, $extra);
        }
    }

    /**
     * 处理上传文件
     * @param $upload_image_model
     * @return array
     */
    private function _doUpload($upload_image_model)
    {
        //文件后缀不合适
        $enable_upload_ext = H::Config('enable_upload_file_ext');
        if( !in_array( $upload_image_model->extensionName, $enable_upload_ext ) )
            return array(false, '只可以上传指定后缀类型文件！');


        if( $upload_image_model->size > $this->limit_file_size )
            return array(false, '文件大小超出最大限制');


        $file_save_to = $this->_getFileSaveTo($upload_image_model);

        if(false === $file_save_to)
            return array(false, '创建目录失败');

        if($upload_image_model->saveAs($file_save_to))
            return array(true, '上传成功', $this->_getVisitUrl());
        else
            return array(false, '上传失败', $this->_getUploadError($upload_image_model->error));
    }

    /**
     * 获取可访问Url
     */
    public function _getVisitUrl()
    {
        $base_url = '/upload/';
        return $base_url . $this->_file_path;
    }

    /**
     * 获取一个上传全路径名
     * @param $upload_image_model
     */
    private function _getFileSaveTo($upload_image_model)
    {
        $upload_base_dir = sprintf("%s/%s", ROOT, H::Config('upload_path_name'));
        $upload_date_dir = date('Y/m/d');

        $upload_real_dir = $upload_base_dir . '/' . $upload_date_dir;
        if(!is_dir($upload_real_dir))
        {
            if(!mkdir($upload_real_dir, 0777, true))
                return false;
        }

        $file_ext = $upload_image_model->extensionName;
        $file_clean_name = md5(uniqid('upload_file_name', true).mt_rand(0, 1988));
        $this->_file_path = sprintf('%s/%s_%s.%s', $upload_date_dir, date('Y_m_d_H_i_s'), $file_clean_name, $file_ext);
        $file_name = sprintf('%s/%s', $upload_base_dir, $this->_file_path);
        return $file_name;
    }

    /**
     * 取得上传错误
     * @param $error 错误id
     * @return string 错误说明
     * @TODO: 这里的错误提示方案要处理下, 太机器化了
     */
    private function _getUploadError($error){
        switch ($error){
            case 0:
                $err = '文件上传成功';
                break;
            case 1:
                $err = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
                break;
            case 2:
                $err = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                break;
            case 3:
                $err = '文件只有部分被上传';
                break;
            case 4:
                $err = '没有文件被上传';
                break;
            case 5:
                $err = '找不到临时文件夹';
                break;
            case 6:
                $err = '找不到临时文件夹';
                break;
            case 7:
                $err = '文件写入失败';
                break;
            default:
                $err = '未知错误';
                break;
        }

        return $err;
    }
}