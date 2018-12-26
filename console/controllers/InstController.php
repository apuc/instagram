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

        $inst = new Instagram(false,false);
        $inst->login('ekaterinka.ekaterina.88@list.ru','123edsaqw');

        foreach ($publications as $publication)
        {
            var_dump($publication->photo);
//            $photo = new InstagramPhoto($publication->getImagePath());
//            $inst->timeline->uploadPhoto($photo->getFile(), ['caption' => $publication->caption]);
//            $publication->status = InstPosts::PUBLISHED;
//            $publication->save();
        }

        $this->stdout("Complete!\n",Console::FG_GREEN);
    }

}
