<?php
namespace backend\modules\posts\forms;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use common\models\InstAccounts;



class UpdateForm extends Model
{
    public $photo;
    public $pub_date;
    public $caption;
    public $account_id;
    public $accounts;

    public function __construct($post,array $config = [])
    {
        parent::__construct($config);

        $this->accounts = ArrayHelper::map(InstAccounts::find()->asArray()->all(),'id','username');

        $this->pub_date = date("d-m-Y",$post->pub_date);
        $this->caption = $post->caption;
        $this->account_id = $post->account_id;
        $this->photo = UploadedFile::getInstanceByName('post_photo');
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caption'], 'safe'],
            [['pub_date'], 'safe'],
            [['photo'], 'safe'],
            [['account_id'], 'safe'],
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
        ];
    }

}
