<?php
namespace backend\modules\posts\forms;

use common\models\InstAccounts;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class CreateForm extends Model
{
    public $account_id;
    public $photo;
    public $pub_date;
    public $caption;

    public $accounts;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->accounts = ArrayHelper::map(InstAccounts::find()->asArray()->all(),'id','username');

        $this->photo = UploadedFile::getInstanceByName('post_photo');
    }


    public function rules()
    {
        return [
            [['caption'], 'string'],
            [['pub_date'], 'required'],
            [['photo'], 'required'],
            [['account_id'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Фото',
            'caption' => 'Описание',
            'pub_date' => 'Дата публикации',
            'status' => 'Статус',
            'account_id' => 'Аккаунт',
        ];
    }

}
