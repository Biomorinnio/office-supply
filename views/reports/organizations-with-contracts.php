<?php
use yii\grid\GridView;

$this->title = 'Организации с более чем 2 договорами';
?>

<div class="report-container">
    <h1><?= $this->title ?></h1>
    <p>Список организаций, у которых более двух договоров.</p>

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
                'label' => 'Адрес',
                'attribute' => 'address',
                'format' => 'text',
            ],
            [
                'label' => 'Телефон',
                'attribute' => 'phone',
                'format' => 'text',
            ],
            [
                'label' => 'Количество договоров',
               'value' => fn($model) => $model['contracts_count'] ?? 0,
            ],
        ],
    ]) ?>
</div>
