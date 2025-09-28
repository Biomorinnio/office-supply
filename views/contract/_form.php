<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Contract $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'organization_id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_executed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
