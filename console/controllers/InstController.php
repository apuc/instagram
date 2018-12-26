<?php

namespace console\controllers;

use common\models\InstPosts;
use yii\console\Controller;
use \InstagramAPI\Instagram;
use \InstagramAPI\Media\Photo\InstagramPhoto;
use Yii;
use yii\helpers\Console;

class InstController extends Controller
{
    public function actionPublish()
    {
        $publications = InstPosts::find()->where(['status'=>InstPosts::WAITING])->andWhere(['<','pub_date',time()])->all();

        if(empty($publications))
        {
            return false;
        }

        $inst = new Instagram(false,false);

        foreach ($publications as $publication)
        {
            $inst->login($publication->account['login'],$publication->account['password']);

            $photo = new InstagramPhoto($publication->getImagePath());
            $inst->timeline->uploadPhoto($photo->getFile(), ['caption' => $publication->caption]);
            $publication->status = InstPosts::PUBLISHED;
            $publication->save();
        }

        $this->stdout("Complete!\n",Console::FG_GREEN);
    }
}
