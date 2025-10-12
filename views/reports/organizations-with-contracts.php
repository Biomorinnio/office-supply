<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SearchForm $model */

$this->title = 'Организации с более чем N договорами';
?>
<div class="report-container container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Укажите минимальное количество договоров для фильтрации.</p>

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="row mb-3">
            <div class="col-md-4">
                <?= $form->field($model, 'min_contracts')->input('number', ['min' => 1, 'placeholder' => 'Например, 2'])->label('Минимум договоров') ?>
            </div>
            <div class="col-md-2 d-flex justify-content-end align-items-end">
                <?= Html::submitButton('Показать', ['class' => 'btn btn-primary w-100']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-bordered table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'name', 'label' => 'Название организации'],
            ['attribute' => 'address', 'label' => 'Адрес'],
            ['attribute' => 'phone', 'label' => 'Телефон'],
            [
                'label' => 'Количество договоров',
                'value' => fn($model) => $model['contracts_count'] ?? 0,
            ],
        ],
    ]) ?>
</div>
