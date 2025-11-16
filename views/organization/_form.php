<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Адрес') ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон') ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
