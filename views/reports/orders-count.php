<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SearchForm $model */

$this->title = 'Количество заказов организаций';
?>
<div class="report-container container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Укажите минимальное количество заказов для фильтрации.</p>

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="row mb-3">
            <div class="col-md-4">
                <?= $form->field($model, 'min_orders')
                    ->input('number', ['min' => 0, 'placeholder' => 'Например, 2'])
                    ->label('Минимум заказов') ?>
            </div>
            <div class="col-md-2 d-flex justify-content-end align-items-end">
                <?= Html::submitButton('Показать', ['class' => 'btn btn-primary w-100']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Название организации',
                'attribute' => 'name',
                'format' => 'text',
            ],
            [
                'label' => 'Количество заказов',
                'value' => fn($model) => $model['orders_count'] ?? 0,
            ],
        ],
    ]) ?>
</div>
