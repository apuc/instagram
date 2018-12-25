<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\InstPosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inst-posts-form">



    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'pub_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выбери дату и время публикации'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

    <?php  echo $form->field($model, 'account_id')->widget(Select2::classname(), [
        'data' => $model->accounts,
        'options' => ['placeholder' => 'Выбери аккаунт'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'photo')->fileInput(['class'=>'form-control','name'=>'post_photo'])?>

    <?= $form->field($model, 'caption')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
