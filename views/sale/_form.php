<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\Contract;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-form mt-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_id')->dropDownList(
        ArrayHelper::map(Contract::find()->all(), 'id', 'id'),
        ['prompt' => 'Выберите договор']
    )->label('Договор') ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        ArrayHelper::map(Product::find()->all(), 'id', 'title'),
        ['prompt' => 'Выберите продукт']
    )->label('Продукт') ?>

    <?= $form->field($model, 'quantity')->textInput()->label('Количество') ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>