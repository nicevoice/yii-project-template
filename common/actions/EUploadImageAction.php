<?php
/**
 * Author: Rogee<rogeecn@gmail.com>
 * Date: 2013-12-19 14:24
 * Project: zhiyuanyun
 */

class EUploadImageAction extends CAction
{
    /**
     * AJAX上传编辑头像使用
     * 请求方式 Image/uploade?type=project
     */
    public function run ()
    {
        $fileType      = trim( H::Param( 'type' ) );
        $size          = H::Param( 'size' );
        $maxfilesize   = H::Config( 'uploadImages.maxFileSize' );
        $uploadedimage = CUploadedFile::getInstanceByName( 'img_file' );

        if ( is_object( $uploadedimage ) && get_class( $uploadedimage ) == 'CUploadedFile' ) {
            $upload = UploadImage::Upload( $uploadedimage , $fileType , $maxfilesize );
            if ( !empty( $size ) && $upload[ 0 ] != FALSE ) {
                $upload[ 1 ] = UploadedFile::getFileUrl( $upload[ 2 ] , $size );
            }
            $this->getController()->renderJSON( $upload[ 0 ] , $upload[ 1 ] , isset( $upload[ 2 ] ) ? $upload[ 2 ] : '' );
        } else {
            $this->getController()->renderJSON( FALSE );
        }
    }
} 