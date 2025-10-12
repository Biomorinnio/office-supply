<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SearchForm $model */

$this->title = 'Продукция по договорам за выбранный месяц';
?>
<div class="report-container container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Выберите месяц (числом от 1 до 12), чтобы отобразить продукцию по договорам.</p>

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="row mb-3">
            <div class="col-md-4">
                <?= $form->field($model, 'month')->input('number', ['min' => 1, 'max' => 12, 'placeholder' => 'Например, 9'])->label('Месяц договора') ?>
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
                'label' => 'Продукт',
                'value' => fn($model) => $model->product->title ?? '-',
            ],
            [
                'label' => 'Описание',
                'value' => fn($model) => $model->product->description ?? '-',
            ],
            [
                'label' => 'Цена',
                'value' => fn($model) => $model->product->price ?? '-',
            ],
            [
                'label' => 'Количество',
                'attribute' => 'quantity',
            ],
            [
                'label' => 'Дата договора',
                'value' => fn($model) => $model->contract->date_created ?? '-',
            ],
        ],
    ]) ?>
</div>
