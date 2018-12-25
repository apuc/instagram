<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstPosts */

$this->title = 'Обновить публикацию';

?>
<div class="inst-posts-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
