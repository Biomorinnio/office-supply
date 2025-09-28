<?php
use yii\grid\GridView;

$this->title = 'Продукция для организации "ИП Малиновский А.С."';
?>
<div class="report-container">
    <h1><?= $this->title ?></h1>
    <p>Отчёт по заказам конкретной организации.</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-hover table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Организация',
                'value' => fn($model) => $model->contract->organization->name ?? '',
            ],
            [
                'label' => 'Название продукта',
                'value' => fn($model) => $model->product->title ?? '',
            ],
            [
                'label' => 'Количество',
                'attribute' => 'quantity',
                'format' => 'text',
            ],
            [
                'label' => 'Дата договора',
                'value' => fn($model) => $model->contract->date_created ?? '',
            ],
        ],
    ]) ?>
</div>
