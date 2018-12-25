<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstAccounts */

$this->title = 'Добавить аккаунт';

?>
<div class="inst-accounts-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
