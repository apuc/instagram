<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inst_posts".
 *
 * @property int $id
 * @property int $account_id
 * @property string $photo
 * @property string $caption
 * @property string $status
 * @property int $pub_date
 */
class InstPosts extends \yii\db\ActiveRecord
{
    const PUBLISHED = "Опубликован";
    const WAITING = "Ожидает публикации";

    public static function tableName()
    {
        return 'inst_posts';
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
           $this->pub_date = strtotime($this->pub_date);
           return true;
        }
    }

    /**
     * @param $caption
     * @param $date
     * @param $photo
     * @return InstPosts
     *
     */
    public static function create($caption,$date,$photo,$account)
    {
        $post = new self;
        $post->status = self::WAITING;
        $post->pub_date = $date;
        $post->photo = $photo;
        $post->caption = $caption;
        $post->account_id = $account;

        return $post;
    }

    public function getPublicationDate()
    {
        $k = date('d.m.Y H:i:s', $this->pub_date)."  HHHH  ".date('d.m.Y H:i:s');
        return $k;
    }

    public function getImagePath()
    {
       return Yii::getAlias("@backend/web/uploads/instagram/").$this->photo;
    }

}
