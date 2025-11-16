<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])
        ->label('Название') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])
        ->label('Описание') ?>

    <?= $form->field($model, 'price')->textInput()
        ->label('Цена') ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
