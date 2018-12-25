<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inst_accounts".
 *
 * @property int $id
 * @property string $username
 * @property string $login
 * @property string $password
 */
class InstAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inst_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'login', 'password'], 'required',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя аккаунта',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}
