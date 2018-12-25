<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstPosts */

$this->title = 'Create Inst Posts';
$this->params['breadcrumbs'][] = ['label' => 'Inst Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inst-posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
