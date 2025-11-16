<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Вход';
?>

<div class="site-login container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, авторизуйтесь:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
