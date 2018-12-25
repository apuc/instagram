<?php
/**
 * Created by PhpStorm.
 * User: skat
 * Date: 24.12.18
 * Time: 10:53
 */

namespace common\services;

use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii;

class PublicationService
{
    const IMAGES_FOLDER = '/uploads/instagram/';

    public function saveImage($photo)
    {
        $filename = "/{$photo->getBaseName()}.{$photo->getExtension()}";

        $dir = Yii::getAlias('@backend/web').self::IMAGES_FOLDER.date('d-m-Y');

        if(!is_dir($dir))
        {
           FileHelper::createDirectory($dir);
        }

        $photo->saveAs($dir.$filename);

        return date('d-m-Y').$filename;
    }

    public function deleteImage($filename)
    {
        FileHelper::unlink(Yii::getAlias('@backend/web').self::IMAGES_FOLDER.$filename);
    }
}