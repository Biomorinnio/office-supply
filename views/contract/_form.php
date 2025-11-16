<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Organization;

/* @var $this yii\web\View */
/* @var $model app\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="contract-form mt-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'organization_id')->dropDownList(
        ArrayHelper::map(Organization::find()->all(), 'id', 'name'),
        ['prompt' => 'Выберите организацию']
    )->label('Организация') ?>

    <?= $form->field($model, 'date_created')->input('date')->label('Дата создания') ?>
    <?= $form->field($model, 'date_executed')->input('date')->label('Дата исполнения') ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
