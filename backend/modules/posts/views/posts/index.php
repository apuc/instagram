<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\posts\models\InstPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отложенные пцбликации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inst-posts-index">

    <p>
        <?= Html::a('Добавить публикацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            [
               'attribute'=>'photo',
               'format'=>'raw',
               'value'=>function($post){
                  return Html::img("/admin/uploads/instagram/".$post->photo,['width'=>250,'height'=>250]);
               }
            ],
            'caption:ntext',
            [
                'attribute'=>'pub_date',
                'format'=>'raw',
                'value'=>function($post){
                    return $post->publicationDate;
                }
            ],
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => function ($post, $key, $index) {
                        return ($post->status == \common\models\InstPosts::WAITING) ? true : false;
                    }
                ]
            ],
        ],
    ]); ?>
</div>
