<?php
/**
 * FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace FormBuilder\traits\form;


use FormBuilder\components\Upload;

/**
 * Class FormUploadTrait
 * @package FormBuilder\traits\form
 */
trait FormUploadTrait
{
    /**
     * @param $field
     * @param $title
     * @param $action
     * @param string $value
     * @param string $type
     * @return Upload
     */
    public static function upload($field, $title, $action, $value = '', $type = Upload::TYPE_FILE)
    {
        $upload = new Upload($field, $title, $value);
        $upload->uploadType($type)->action($action);
        return $upload;
    }

    /**
     * @param $field
     * @param $title
     * @param $action
     * @param array $value
     * @return Upload
     */
    public static function uploadImages($field, $title, $action, array $value = [])
    {
        $upload = self::upload($field, $title, $action, $value, Upload::TYPE_IMAGE);
        $upload->format(['jpg','jpeg','png','gif'])->accept('image/*');
        return $upload;

    }

    /**
     * @param $field
     * @param $title
     * @param $action
     * @param array $value
     * @return Upload
     */
    public static function uploadFiles($field, $title, $action, array $value = [])
    {
        return self::upload($field, $title, $action, $value, Upload::TYPE_FILE);
    }

    /**
     * @param $field
     * @param $title
     * @param $action
     * @param string $value
     * @return Upload
     */
    public static function uploadImageOne($field, $title, $action, $value = '')
    {
        $upload = self::upload($field, $title, $action, $value, Upload::TYPE_IMAGE);
        $upload->format(['jpg','jpeg','png','gif'])->accept('image/*')->maxLength(1);
        return $upload;
    }

    /**
     * @param $field
     * @param $title
     * @param $action
     * @param string $value
     * @return Upload
     */
    public static function uploadFileOne($field, $title, $action, $value = '')
    {
        $upload = self::upload($field, $title, $action, (string)$value, Upload::TYPE_FILE);
        $upload->maxLength(1);
        return $upload;
    }
}