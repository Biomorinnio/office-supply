<?php
use yii\grid\GridView;

$this->title = 'Количество заказов организаций';
?>
<div class="report-container">
    <h1><?= $this->title ?></h1>
    <p>Список организаций с количеством их заказов.</p>

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
