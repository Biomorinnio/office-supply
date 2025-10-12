<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\SearchForm $model */

$this->title = 'Заказы по организации';
?>
<div class="report-container container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Введите название организации, чтобы найти все её заказы.</p>

    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <?= $form->field($model, 'organization_name')->textInput(['placeholder' => 'Например, ИП Малиновский'])->label(false) ?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary w-100']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Организация',
                'value' => fn($model) => $model->contract->organization->name ?? '-',
            ],
            [
                'label' => 'Продукт',
                'value' => fn($model) => $model->product->title ?? '-',
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
